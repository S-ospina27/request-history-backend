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
            ->where(DB::equalTo('idstates'), 1)
            ->and(DB::equalTo('idcompanies'), $requirements->getIdcompanies())
            ->get();
	}


}