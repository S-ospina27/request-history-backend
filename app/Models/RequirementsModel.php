<?php

namespace App\Models;
use LionSQL\Drivers\MySQL as DB;
use Database\Class\Requirements;

class RequirementsModel {

	public function __construct() {
		
	}

	public function createRequirementsDB(Requirements $requirements){
		return DB::call("create_requirements",[
			$requirements->getIdcompanies(),
			$requirements->getRequirementsName(),
			$requirements->getRequirementsPriority(),
			$requirements->getRequirementsDescription(),
			$requirements->getIdstates(),
			$requirements->getRequirementsDate()
		])->execute();

	}

	public function updateRequirementsDB(Requirements $requirements){

		return DB::call("update_requirements",[
			$requirements->getRequirementsName(),
			$requirements->getRequirementsPriority(),
			$requirements->getRequirementsDescription(),
			$requirements->getIdstates(),
			$requirements->getIdrequirements()
		])->execute();
	}

	public function verifyRequirementsExistenceDB(Requirements $requirements){
		return DB::table('requirements')
		->select(DB::as(DB::count('*'), 'cont'))
		->where(DB::equalTo('idstates'), 3)
		->and(DB::equalTo('idcompanies'), $requirements->getIdcompanies())
		->get();
	}

	public function readRequirementsByClientsDB(Requirements $requirements){
		return DB::view("read_requirements_clients")
		->select()
		->where(DB::equalTo('idcompanies'), $requirements->getIdcompanies())
		->getAll();
	}

	public function pendingRequirementsDB(){
		return DB::table("requirements")
		->select(DB::as(DB::count('*'),'pendientes'))
		->where(DB::equalTo('idstates'),1)
		->get();
	}

	public function acceptedRequirementsDB(){
		return DB::table("requirements")
		->select(DB::as(DB::count('*'),'aceptado'))
		->where(DB::equalTo('idstates'),3)
		->get();
	}

	public function finishedRequirementsDB(){
		return DB::table("requirements")
		->select(DB::as(DB::count('*'),'terminado'))
		->where(DB::equalTo('idstates'),7)
		->get();
	}

	public function readRequirementsAdminDB(){
		return DB::view("read_requirements_admin")
		->select()
		->getAll();
	}

	public function requirementsSelectorDB() {
		return DB::table("requirements")
		->select(
			DB::column("idrequirements"),
			DB::column("requirements_name")
			)
		->where(DB::equalTo("idstates"),3)
		->getAll();
	}
	public function stateSelectorDB(){
		return DB::table("states")
					->select()
					->getAll();

	}

}