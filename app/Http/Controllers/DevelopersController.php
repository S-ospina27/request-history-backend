<?php

namespace App\Http\Controllers;

use App\Models\DevelopersModel;
use Database\Class\Developers;

class DevelopersController {

	private DevelopersModel $developersModel;
	public function __construct() {
		$this->developersModel = new DevelopersModel();
	}

	public function createDevelopers(){

		$responseCreate=$this->developersModel->createDevelopersDB(
			Developers::formFields()->setIdstates(4)
		);
		if ($responseCreate->status === 'database-error') {
			return response->error('Ha ocurrido un error al crear el desarrollador');
		}

		return response->success('Desarrollador creado correctamente');
	}

	public function updateDevelopers(){

		$responseUpdate=$this->developersModel->updateDevelopersDB(Developers::formFields());

		if ($responseUpdate->status === 'database-error') {
			return response->error('Ha ocurrido un error al actualizar el desarrollador');
		}

		return response->success('Desarrollador actualizado correctamente');
	}






}




