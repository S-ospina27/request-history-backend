<?php

namespace App\Models;
use Database\Class\Companies;

use LionSQL\Drivers\MySQL as DB;

class CompaniesModel {

	public function __construct() {
		
	}

	public function createCompaniesDB(Companies $companies){
		return DB::call("create_companies",[
			$companies->getIdstates(),
			$companies->getCompaniesNit(),
			$companies->getCompaniesBusinessName(),
			$companies->getCompaniesEmail(),
			$companies->getCompaniesUsername()
		])->execute();
	}

}