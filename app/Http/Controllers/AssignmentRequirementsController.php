<?php

namespace App\Http\Controllers;

use App\Models\AssignmentRequirementsHasDevelopersModel;
use App\Models\AssignmentRequirementsModel;
use Carbon\Carbon;
use Database\Class\AssignmentRequirements;
use Database\Class\AssignmentRequirementsHasDevelopers;
use LionHelpers\Arr;

class AssignmentRequirementsController {

	private AssignmentRequirementsModel $assignmentRequirementsModel;
    private AssignmentRequirementsHasDevelopersModel $assignmentRequirementsHasDevelopersModel;

	public function __construct() {
		$this->assignmentRequirementsModel = new AssignmentRequirementsModel();
        $this->assignmentRequirementsHasDevelopersModel = new AssignmentRequirementsHasDevelopersModel();
	}

	public function createAssignmentrequirements() {
		$verifyExist = $this->assignmentRequirementsModel->verifyExistenAssigmentsDB(
			(new  AssignmentRequirements())
                ->setIdrequirements((int) request->idrequirements)
		);

		if ($verifyExist->cont > 0) {
			return response->error("ya existe una asignación creada para ese requerimiento");
		}

		$responseCreate=$this->assignmentRequirementsModel->createAssignmentrequirementsDB(
			AssignmentRequirements::formFields()
			->setIdstates(1)
			->setAssignmentRequirementsDate(Carbon::now()->format('Y-m-d'))
		);

		if ($responseCreate->status === 'database-error') {
			return response->error('Ha ocurrido un error al actualizar la  asignación');
		}

		return response->success('Asignación  creada correctamente');
	}

	public function  updateAssignmentRequirements() {
        $assignmentRequirements = AssignmentRequirements::formFields();

        $validateStates = $this->assignmentRequirementsHasDevelopersModel->readAssigmentHasDevelopersByAssignmentRequirementsDB(
            (new AssignmentRequirementsHasDevelopers())
                ->setIdassignmentRequirements($assignmentRequirements->getIdassignmentRequirements())
        );

        $size = Arr::of($validateStates)->length();
        $count = Arr::of($validateStates)->where(fn($value, $key) => $value->getIdstates() === 7);
        if (Arr::of($count)->length() < $size) {
            return response->error("Todos los desarrolladores deben haber TERMINADO su asignacion para TERMINAR la asignacion");
        }

		$responseUpdate = $this->assignmentRequirementsModel->updateAssignmentRequirementsDB(
			$assignmentRequirements->setAssignmentRequirementsFinishDate(
				(int) request->idstates === 7 ? Carbon::now()->format('Y-m-d') : null
			)
		);

		if ($responseUpdate->status === 'database-error') {
			return response->error('Ha ocurrido un error al actualizar la  asignación');
		}

		return response->success('Asignación  actualizada correctamente');
	}

	public function ReadAssignmentRequirementsSelect(){
		return $this->assignmentRequirementsModel->ReadAssignmentRequirementsSelectDB();
	}

	public function readAssigmentsRequirements(){
		return $this->assignmentRequirementsModel->readAssigmentsRequirementsDB();

	}
}