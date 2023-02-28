<?php

namespace App\Models;

use LionSQL\Drivers\MySQL as DB;
use Database\Class\AssignmentRequirements;
use Database\Class\Requirements;

class AssignmentRequirementsModel {

	public function __construct() {
		
	}

	public function createAssignmentrequirementsDB(AssignmentRequirements $assignmentRequirements) {
		return DB::call("create_assignment_requirements", [
			$assignmentRequirements->getIdrequirements(),
			$assignmentRequirements->getIdstates(),
			$assignmentRequirements->getAssignmentRequirementsDate(),
			$assignmentRequirements->getAssignmentRequirementsDeadline()
		])->execute();
	}

    public function ReadAssignmentRequirementsSelectDB() {
        return DB::view("read_assigment_requirements_select")
            ->select()
            ->getAll();
    }

    public function readAssignmentRequirementsByRequerimentDB(Requirements $requirements) {
        return DB::view("read_assigment_requirements_select")
            ->select(DB::as(DB::count('*'), 'cont'))
            ->where(DB::equalTo('idrequirements'), $requirements->getIdrequirements())
            ->get();
    }

	public function updateAssignmentRequirementsDB(AssignmentRequirements $assignmentRequirements) {
		return DB::call("update_assignment_requirements", [
			$assignmentRequirements->getIdstates(),
			$assignmentRequirements->getAssignmentRequirementsDeadline(),
			$assignmentRequirements->getAssignmentRequirementsFinishDate(),
			$assignmentRequirements->getIdassignmentRequirements()
		])->execute();
	}

    public function updateRequirementStateDB(AssignmentRequirements $assignmentRequirements) {
        return DB::table('assignment_requirements')->update([
            'idstates' => $assignmentRequirements->getIdstates()
        ])->where(
            DB::equalTo('idassignment_requirements'), $assignmentRequirements->getIdassignmentRequirements()
        )->execute();
    }

	public function verifyExistenAssigmentsDB(AssignmentRequirements $assignmentRequirements) {
		return DB::table('assignment_requirements')
            ->select(DB::as(DB::count('*'), 'cont'))
            ->where(DB::equalTo('idrequirements'), $assignmentRequirements->getIdrequirements())
            ->get();
	}

	public function readAssigmentsRequirementsDB(){
		return DB::view("read_assigments_requirements")
			->select()
			->getAll();
	}

}