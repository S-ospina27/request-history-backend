<?php

namespace App\Http\Controllers;

use App\Models\DevelopersModel;
use Database\Class\Developers;
use LionSecurity\RSA;
use LionSecurity\Validation;

class DevelopersController {

	private DevelopersModel $developersModel;

	public function __construct() {
		$this->developersModel = new DevelopersModel();
	}

	public function createDevelopers() {
        $rsa_encode = RSA::encode([
            'developers_password' => Validation::passwordHash(
                request->developers_password
            )
        ]);

		$responseCreate = $this->developersModel->createDevelopersDB(
			Developers::formFields()
                ->setIdstates(4)
                ->setIdroles(3)
                ->setDevelopersPassword($rsa_encode->developers_password)
		);

		if ($responseCreate->status === 'database-error') {
			return response->error('Ha ocurrido un error al crear el desarrollador');
		}

		return response->success('Desarrollador creado correctamente');
	}

	public function updateDevelopers() {
		$responseUpdate = $this->developersModel->updateDevelopersDB(Developers::formFields());

		if ($responseUpdate->status === 'database-error') {
			return response->error('Ha ocurrido un error al actualizar el desarrollador');
		}

		return response->success('Desarrollador actualizado correctamente');
	}

    public function readDevelopers() {
        return $this->developersModel->readDevelopersDB();
    }

	public function readDevelopersSelect() {
		return $this->developersModel->readDevelopersSelectDB();
	}

}