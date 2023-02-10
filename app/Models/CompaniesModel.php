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

	public function updateCompaniesDB(Companies $companies) {
		return DB::call("update_companies",[
			$companies->getIdcompanies(),
			$companies->getIdstates(),
			$companies->getCompaniesNit(),
			$companies->getCompaniesBusinessName(),
			$companies->getCompaniesEmail(),
			$companies->getCompaniesUsername()
		])->execute();

	}

	public function verifyCompanyExistenceDB(Companies $companies){
		return DB::table('companies')
            ->select(DB::as(DB::count('*'), 'cont'))
            ->where(DB::equalTo('companies_nit'), $companies->getCompaniesNit())
            ->and(DB::equalTo('companies_email'), $companies->getCompaniesEmail())
            ->get();
	}
}