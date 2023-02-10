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

	public function create_assignment_requirements() {

		$this->assignmentRequirementsModel->create_assignment_requirementsDB(
			AssignmentRequirements::formFields()
			->setIdstates(6)
			->setAssignmentRequirementsDate(Carbon::now()->format('Y-m-d'))
		);
	}

	public function  update_assignment_requirements() {
		$responseUpdate=$this->assignmentRequirementsModel->update_assignment_requirementsDB(
			AssignmentRequirements::formFields()
		);
		if ($responseUpdate->status === 'database-error') {
			return response->error('Ha ocurrido un error al actualizar la  asignación');
		}

		return response->success('Asignación  actualizada correctamente');
	}
}