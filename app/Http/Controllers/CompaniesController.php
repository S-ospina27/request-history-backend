<?php

namespace App\Http\Controllers;

use App\Models\CompaniesModel;
use Database\Class\Companies;

class CompaniesController {

	private CompaniesModel $companiesModel;

	public function __construct() {
		$this->companiesModel = new CompaniesModel();
	}

	public function createCompanies() {
		$companies = Companies::formFields();
		$verifyCompanyExistence = $this->companiesModel->verifyCompanyExistenceDB(Companies::formFields());

		if ($verifyCompanyExistence->cont === 0) {
			$responseCreate = $this->companiesModel->createCompaniesDB(
				$companies->setIdstates(5)->setIdroles(2)
			);

			if ($responseCreate->status === 'database-error') {
				return response->error('Ha ocurrido un error al ingresar la empresa');
			}

			return response->error("La cuenta no existe", $companies);
		}

        $idcompanies = $this->companiesModel->readCompaniesByNit($companies);

        if ($verifyCompanyExistence->idstates === 5) {
            $responseUpdate = $this->companiesModel->updateCompaniesDB(
                $companies->setIdstates(4)->setIdroles(2)->setIdcompanies($idcompanies->getIdcompanies())
            );

            if ($responseUpdate->status === 'database-error') {
                return response->error('Ha ocurrido un error al ingresar la empresa', $companies);
            }
        }

        return response->info("Ingreso exitoso", [
            'idcompanies' => $idcompanies->getIdcompanies(),
            'idroles' => $idcompanies->getIdroles(),
            'companies_nit' => $companies->getCompaniesNit()
        ]);
    }

    public function updateCompanies() {
        $responseUpdate = $this->companiesModel->updateCompaniesDB(Companies::formFields());
        if ($responseUpdate->status === 'database-error') {
            return response->error('Ha ocurrido un error al actualizar la empresa');
        }

        return response->success('Empresa actualizada correctamente');
    }

    public function readCompaniesSelector() {
        $data = [];
        $companies = $this->companiesModel->readCompaniesDB();

        if (!isset($companies->status)) {
            foreach ($companies as $key => $company) {
                $cont = $this->companiesModel->readCompaniesSelectorDB(
                    (new Companies())
                    ->setIdcompanies((int) $company->idcompanies)
                );

                if ($cont->cont > 0) {
                    array_push($data, $company);
                }
            }
        }

        return $data;
    }

}