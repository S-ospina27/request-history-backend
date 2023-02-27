<?php

namespace App\Http\Controllers;

use App\Models\AssignmentRequirementsModel;
use Carbon\Carbon;
use Database\Class\AssignmentRequirements;

class AssignmentRequirementsController {

	private AssignmentRequirementsModel $assignmentRequirementsModel;

	public function __construct() {
		$this->assignmentRequirementsModel = new AssignmentRequirementsModel();
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

	public function  update_assignment_requirements() {
		$responseUpdate=$this->assignmentRequirementsModel->update_assignment_requirementsDB(
			AssignmentRequirements::formFields()->setAssignmentRequirementsFinishDate(
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
}