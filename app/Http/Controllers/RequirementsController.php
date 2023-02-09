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

	public function createRequirements(){

		$responseCreate =$this->requirementsModel->createRequirementsDB(
			Requirements::formFields()
				->setRequirementsDate(Carbon::now()->format('Y-m-d'))
				->setIdstates(1)
			);

		if ($responseCreate->status === 'database-error') {
			return response->error('Ha ocurrido un error al crear el requerimiento');
		}

		return response->success('Requerimiento creado correctamente');
	}


}