<?php

namespace App\Models;

use LionSQL\Drivers\MySQL as DB;
use Database\Class\AssignmentRequirementsHasDevelopers;
class Assignment_requirements_has_developers {

	public function __construct() {
		
	}

	public function createAssigmentDevelopers(AssignmentRequirementsHasDevelopers $assignmentRequirementsHasDevelopers){
		return DB::call("create_assignment_requirements_has_developers",[
			$assignmentRequirementsHasDevelopers->getIdassignmentRequirements(),
			$assignmentRequirementsHasDevelopers->getIddevelopers(),
			$assignmentRequirementsHasDevelopers->getAssignmentRequirementsHasDevelopersDate(),
		])->execute();

	}
}