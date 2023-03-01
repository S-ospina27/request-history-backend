<?php

namespace App\Http\Controllers;

use App\Models\AssignmentRequirementsHasDevelopersModel;
use App\Models\AssignmentRequirementsModel;
use Carbon\Carbon;
use Database\Class\AssignmentRequirements;
use Database\Class\AssignmentRequirementsHasDevelopers;

class AssignmentRequirementsHasDevelopersController {

	private AssignmentRequirementsHasDevelopersModel $assignmentRequirementsHasDevelopersModel;
	private AssignmentRequirementsModel $assignmentRequirementsModel;

	public function __construct() {
		$this->assignmentRequirementsHasDevelopersModel = new AssignmentRequirementsHasDevelopersModel();
		$this->assignmentRequirementsModel = new AssignmentRequirementsModel();
	}

	public function createAssignmentRequirementsHasDevelopers() {
		$assignmentRequirementsHasDevelopers = AssignmentRequirementsHasDevelopers::formFields();

		$verify = $this->assignmentRequirementsHasDevelopersModel->verifyExistAssigmentsDevelopersDB(
			$assignmentRequirementsHasDevelopers
		);

		if ($verify->cont > 0) {
			return response->error("ya este desarrollador existe en esta asignación");
		}

		$responseCreate = $this->assignmentRequirementsHasDevelopersModel->createAssigmentDevelopers(
			$assignmentRequirementsHasDevelopers->setIdstates(6)
			->setAssignmentRequirementsHasDevelopersDate(Carbon::now()->format('Y-m-d'))
		);

		if ($responseCreate->status === 'database-error') {
			return response->error('Ha ocurrido un error al asignar el desarrolladores');
		}

		$responseUpdate = $this->assignmentRequirementsModel->updateRequirementStateDB(
			(new AssignmentRequirements())
			->setIdstates(9)
			->setIdassignmentRequirements(
				(int) $assignmentRequirementsHasDevelopers->getIdassignmentRequirements()
			)
		);

		if ($responseUpdate->status === 'database-error') {
			return response->error('Ha ocurrido un error al asignar el desarrolladores [2]');
		}

		return response->success('Desarrollador asignado correctamente');
	}

	public function  updatessignmentRequirementsHasDevelopers(){

		$responseUpdate= $this->assignmentRequirementsHasDevelopersModel->updatessignmentRequirementsHasDevelopersDB(AssignmentRequirementsHasDevelopers::formFields()->setAssignmentRequirementsHasDevelopersFinishDate(
			(int) request->idstates === 7 ? Carbon::now()->format('Y-m-d') : null
		)
	);

		if ($responseUpdate->status === 'database-error') {
			return response->error('Ha ocurrido un error al actualizar la asignacion del desarrollador');
		}

		return response->success('asignacion del desarrollador actualizada correctamente');

	}

	public function  deletesignmentRequirementsHasDevelopers(){
		$responseDelete= $this->assignmentRequirementsHasDevelopersModel->deletesignmentRequirementsHasDevelopersDB(
			request->idassignment_requirements_has_developers
		);

		if ($responseDelete->status === 'database-error') {
			return response->error('Ha ocurrido un error al eliminar la asignacion del desarrollador');
		}

		return response->success(' Desarrollador eliminado  correctamente');

	}

	public function readAssigmentHasDevelopers(){

		return $this->assignmentRequirementsHasDevelopersModel->readAssigmentHasDevelopersDB();
	}

	public function readAssigmentDevelopers(string $iddevelopers){
		return $this->assignmentRequirementsHasDevelopersModel->readAssigmentDevelopersDB(
			(new AssignmentRequirementsHasDevelopers())->setIddevelopers( (int) $iddevelopers)
		);
	}

	public function tasksAssignedStatus(string $iddevelopers){
		return $this->assignmentRequirementsHasDevelopersModel->tasksAssignedStatusDB(
			(new AssignmentRequirementsHasDevelopers())->setIddevelopers( (int) $iddevelopers)
		);
	}

	public function tasksFinishedStatus(string $iddevelopers){
		return $this->assignmentRequirementsHasDevelopersModel->tasksFinishedStatusDB(
				(new AssignmentRequirementsHasDevelopers())->setIddevelopers( (int) $iddevelopers)
		);
	}
}