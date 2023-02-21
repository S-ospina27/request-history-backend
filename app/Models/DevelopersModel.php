<?php

namespace App\Models;

use LionSQL\Drivers\MySQL as DB;
use Database\Class\Developers;

class DevelopersModel {

	public function __construct() {
		
	}
	public function createDevelopersDB(Developers $developers) {
		return DB::call("create_developers",[
			$developers->getDevelopersName(),
			$developers->getDeveloperscolType(),
			$developers->getIdstates()
		])->execute();
	}

	public function updateDevelopersDB(Developers $developers) {
		return DB::call("update_developers",[
			$developers->getDevelopersName(),
			$developers->getDeveloperscolType(),
			$developers->getIdstates(),
			$developers->getIddevelopers()
		])->execute();
	}

	public function readDevelopersSelectDB() {
		return DB::view("read_developers_selector")
			->select()
			->getAll();
	}
}