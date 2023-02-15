<?php

namespace App\Http\Controllers;
use App\Models\RequirementsModel;
use Carbon\Carbon;
use Database\Class\Requirements;

class RequirementsController {
	private RequirementsModel $requirementsModel;

	public function __construct() {
		$this->requirementsModel = new RequirementsModel();

	}

	public function createRequirements() {
		$verifyRequirementsExistence = $this->requirementsModel->verifyRequirementsExistenceDB(
			Requirements::formFields()
		);

		if ($verifyRequirementsExistence->cont === 0) {
			$responseCreate =$this->requirementsModel->createRequirementsDB(
				Requirements::formFields()
				->setRequirementsDate(Carbon::now()->format('Y-m-d'))
				->setIdstates(1)
			);

			if ($responseCreate->status === 'database-error') {
				return response->error('Ha ocurrido un error al crear el requerimiento');
			}

			return response->success('Requerimiento creado correctamente');

		}else{

			return response->info("tienees requerimientos pendientes no puedes agregar mas"
		);
		}
	}

	public function updateRequirements(){
		$responseUpdate= $this->requirementsModel->updateRequirementsDB(Requirements::formFields());

		if ($responseUpdate->status === 'database-error') {
			return response->error('Ha ocurrido un error al actualizar el requerimiento');
		}

		return response->success('Requerimiento actualizado correctamente');
	}


	public function readRequirementsByClients(){
		return $this->requirementsModel->readRequirementsByClientsDB(Requirements::formFields());
	}

	public function pendingRequirements(){

		return $this->requirementsModel->pendingRequirementsDB();
	}

	public function acceptedRequirements() {

		return $this->requirementsModel->acceptedRequirementsDB();
	}

	public function finishedRequirements() {

		return $this->requirementsModel->finishedRequirementsDB();
	}

}