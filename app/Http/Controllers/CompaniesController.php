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
		$verifyCompanyExistence = $this->companiesModel->verifyCompanyExistenceDB(companies::formFields());

		if ($verifyCompanyExistence->cont === 0) {
			$responseCreate=$this->companiesModel->createCompaniesDB(
				Companies::formFields()->setIdstates(4)
			);

			if ($responseCreate->status === 'database-error') {
				return response->error('Ha ocurrido un error al crear la empresa');
			}

			return response->success('Empresa creado correctamente');

		}else{
			return response->info("ya se encuentra registrado con nosotros");
		}


	}

	public function updateCompanies() {
		$responseUpdate=$this->companiesModel->updateCompaniesDB(companies::formFields());
		if ($responseUpdate->status === 'database-error') {
			return response->error('Ha ocurrido un error al actualizar la empresa');
		}

		return response->success('Empresa actualizada correctamente');
	}

	public function verifyCompanyExistence(){
		$verifyCompanyExistence = $this->companiesModel->verifyCompanyExistenceDB(companies::formFields());
		if ($verifyCompanyExistence->cont === 1) {
			return response->success("ya se encuentra registrado con nosotros");
		}
		return response->error("usted todavia no cuenta con un registro con nosotros");
	}
}
