<?php

namespace App\Models;

use LionSQL\Drivers\MySQL as DB;
use Database\Class\Developers;
use Database\Class\ReadDevelopers;

class DevelopersModel {

	public function __construct() {
		
	}

	public function createDevelopersDB(Developers $developers) {
		return DB::call("create_developers", [
            $developers->getIdstates(),
			$developers->getIdroles(),
            $developers->getDevelopersName(),
            $developers->getDeveloperscolType(),
            $developers->getDevelopersEmail(),
            $developers->getDevelopersPassword()
		])->execute();
	}

	public function updateDevelopersDB(Developers $developers) {
		return DB::call("update_developers", [
			$developers->getIdstates(),
            $developers->getIdroles(),
            $developers->getDevelopersName(),
            $developers->getDeveloperscolType(),
            $developers->getDevelopersEmail(),
			$developers->getIddevelopers()
		])->execute();
	}

    public function readDevelopersDB() {
        return DB::fetchClass(ReadDevelopers::class)
            ->view('read_developers')
            ->select()
            ->getAll();
    }

	public function readDevelopersSelectDB() {
		return DB::view("read_developers_selector")
			->select()
			->getAll();
	}

}