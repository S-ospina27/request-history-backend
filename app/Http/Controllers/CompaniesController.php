<?php

namespace App\Http\Controllers;

use App\Models\CompaniesModel;
use Database\Class\Companies;

class CompaniesController
{

	private CompaniesModel $companiesModel;

	public function __construct()
	{
		$this->companiesModel = new CompaniesModel();
	}

	public function createCompanies() {
	$responseCreate=$this->companiesModel->createCompaniesDB(
			Companies::formFields()->setIdstates(4)
		);
		if ($responseCreate->status === 'database-error') {
			return response->error('Ha ocurrido un error al crear la empresa');
		}

		return response->success('Empresa creado correctamente');
	}
}
