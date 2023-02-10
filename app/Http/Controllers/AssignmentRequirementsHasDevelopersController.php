<?php

namespace App\Http\Controllers;

use App\Models\AssignmentRequirementsHasDevelopersModel;
use Carbon\Carbon;
use Database\Class\AssignmentRequirementsHasDevelopers;

class AssignmentRequirementsHasDevelopersController {
	private AssignmentRequirementsHasDevelopersModel $assignmentRequirementsHasDevelopersModel;

	public function __construct() {
		$this->assignmentRequirementsHasDevelopersModel = new AssignmentRequirementsHasDevelopersModel();
	}

	public function createAssignmentRequirementsHasDevelopers(){
		$responseCreate = $this->assignmentRequirementsHasDevelopersModel->createAssigmentDevelopers(
			AssignmentRequirementsHasDevelopers::formFields()
				->setIdstates(6)
				->setAssignmentRequirementsHasDevelopersDate(Carbon::now()->format('Y-m-d'))
		);

		if ($responseCreate->status === 'database-error') {
			return response->error('Ha ocurrido un error al asignar el desarrolladores');
		}

		return response->success('Desarrollador asignado  correctamente');
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
				AssignmentRequirementsHasDevelopers::formFields()
		);

		if ($responseDelete->status === 'database-error') {
			return response->error('Ha ocurrido un error al eliminar la asignacion del desarrollador');
		}

		return response->success(' Desarrollador eliminado  correctamente');

	}

}