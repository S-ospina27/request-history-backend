<?php

namespace App\Http\Controllers;

use App\Models\AssignmentRequirementsModel;
use App\Models\RequirementsModel;
use Carbon\Carbon;
use Database\Class\Companies;
use Database\Class\Requirements;

class RequirementsController {

	private RequirementsModel $requirementsModel;
    private AssignmentRequirementsModel $assignmentRequirementsModel;

	public function __construct() {
		$this->requirementsModel = new RequirementsModel();
        $this->assignmentRequirementsModel = new AssignmentRequirementsModel();
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
        }

        return response->info("tienes requerimientos pendientes, no puedes agregar mas");
    }

    public function updateRequirements() {
        $responseUpdate = $this->requirementsModel->updateRequirementsDB(Requirements::formFields());
        if ($responseUpdate->status === 'database-error') {
            return response->error('Ha ocurrido un error al actualizar el requerimiento');
        }

        return response->success('Requerimiento actualizado correctamente');
    }

    public function readRequirementsByClients() {
        return $this->requirementsModel->readRequirementsByClientsDB(Requirements::formFields());
    }

    public function pendingRequirements() {
        return $this->requirementsModel->pendingRequirementsDB();
    }

    public function acceptedRequirements() {
        return $this->requirementsModel->acceptedRequirementsDB();
    }

    public function finishedRequirements() {
        return $this->requirementsModel->finishedRequirementsDB();
    }

    public function readRequirementsAdmin() {
        return $this->requirementsModel->readRequirementsAdminDB();
    }

    public function readRequirementsSelector(string $idcompanies) {
        $data = [];
        $requeriments = $this->requirementsModel->readRequirementsSelectorDB(
            (new Companies())->setIdcompanies((int) $idcompanies)
        );

        foreach ($requeriments as $key => $requeriment) {
            $cont = $this->assignmentRequirementsModel->readAssignmentRequirementsByRequerimentDB(
                $requeriment
            );

            if ($cont->cont === 0) {
                array_push($data, $requeriment);
            }
        }

        return $data;
    }

    public function stateSelector() {
        return $this->requirementsModel->stateSelectorDB();
    }

}