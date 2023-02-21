<?php

namespace App\Models;

use LionSQL\Drivers\MySQL as DB;
use Database\Class\AssignmentRequirements;
class AssignmentRequirementsModel {

	public function __construct() {
		
	}

	public function createAssignmentrequirementsDB(AssignmentRequirements $assignmentRequirements){

		return DB::call("create_assignment_requirements",[
			$assignmentRequirements->getIdrequirements(),
			$assignmentRequirements->getIdstates(),
			$assignmentRequirements->getAssignmentRequirementsDate(),
			$assignmentRequirements->getAssignmentRequirementsDeadline()
		])->execute();

	}

	public function update_assignment_requirementsDB(AssignmentRequirements $assignmentRequirements){

		return DB::call("update_assignment_requirements",[
			$assignmentRequirements->getIdstates(),
			$assignmentRequirements->getAssignmentRequirementsDeadline(),
			$assignmentRequirements->getAssignmentRequirementsFinishDate(),
			$assignmentRequirements->getIdassignmentRequirements()
		])->execute();

	}

	public function ReadAssignmentRequirementsSelectDB(){
		return DB::view("read_assigment_requirements_select")
			->select()
			->getAll();
	}

}