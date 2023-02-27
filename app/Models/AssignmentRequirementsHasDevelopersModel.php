<?php

namespace App\Models;

use LionSQL\Drivers\MySQL as DB;
use Database\Class\AssignmentRequirementsHasDevelopers;
class AssignmentRequirementsHasDevelopersModel {

	public function __construct() {
		
	}

	public function createAssigmentDevelopers(AssignmentRequirementsHasDevelopers $assignmentRequirementsHasDevelopers){
		return DB::call("create_assignment_requirements_has_developers",[
			$assignmentRequirementsHasDevelopers->getIdassignmentRequirements(),
			$assignmentRequirementsHasDevelopers->getIddevelopers(),
			$assignmentRequirementsHasDevelopers->getAssignmentRequirementsHasDevelopersDate(),
			$assignmentRequirementsHasDevelopers->getIdstates()
		])->execute();

	}

	public function updatessignmentRequirementsHasDevelopersDB(AssignmentRequirementsHasDevelopers $assignmentRequirementsHasDevelopers){

		return DB::call("update_assignment_requirements_has_developers",[
			$assignmentRequirementsHasDevelopers->getIdstates(),
			$assignmentRequirementsHasDevelopers->getAssignmentRequirementsHasDevelopersFinishDate(),
			$assignmentRequirementsHasDevelopers->getIdassignmentRequirementsHasDevelopers()
		])->execute();
	}

	public function deletesignmentRequirementsHasDevelopersDB(array $idassignment_requirements_has_developers){
		return DB::table("assignment_requirements_has_developers")
			->delete()
			->where("idassignment_requirements_has_developers")
			->in(...$idassignment_requirements_has_developers)
			->execute();
	}

	public function readAssigmentHasDevelopersDB() {
		return DB::view("read_assigments_developers")
		->select()
		->getAll();
	}

	public function verifyExistAssigmentsDevelopersDB(AssignmentRequirementsHasDevelopers $assignmentRequirementsHasDevelopers){
		return DB::table("assignment_requirements_has_developers")
			->select(DB::as(DB::count('*'), 'cont'))
			->where(DB::equalTo('idassignment_requirements'),$assignmentRequirementsHasDevelopers->getIdassignmentRequirements() )
		->and(DB::equalTo('iddevelopers'), $assignmentRequirementsHasDevelopers->getIddevelopers())
		->get();
	}


public function readAssigmentDevelopersDB(AssignmentRequirementsHasDevelopers $assignmentRequirementsHasDevelopers) {
		return DB::view("read_developers_table")
		->select()
		->where(DB::equalTo("iddevelopers"),$assignmentRequirementsHasDevelopers->getIddevelopers())
		->getAll();
	}

	public function tasksAssignedStatusDB() {
		return DB::view("assignment_requirements_has_developers")
		->select(DB::as(DB::count('*'), 'cont'))
		->where(DB::equalTo("idstates"),6)
		->get();
	}

	public function tasksFinishedStatusDB() {
		return DB::view("assignment_requirements_has_developers")
		->select(DB::as(DB::count('*'), 'cont'))
		->where(DB::equalTo("idstates"),7)
		->get();
	}

}