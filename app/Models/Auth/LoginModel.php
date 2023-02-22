<?php

namespace App\Models\Auth;

use Database\Class\Developers;
use LionSQL\Drivers\MySQL as DB;

class LoginModel {

	public function __construct() {

	}

    public function authDB(Developers $developers) {
        return DB::table('developers')
            ->select(DB::as(DB::count('*'), "cont"))
            ->where(DB::equalTo("developers_email"), $developers->getDevelopersEmail())
            ->get();
    }

    public function sessionDB(Developers $developers): Developers {
        return DB::fetchClass(Developers::class)
            ->table('developers')
            ->select('iddevelopers', 'idstates', 'idroles', 'developerscol_type', 'developers_name', 'developers_password')
            ->where(DB::equalTo("developers_email"), $developers->getDevelopersEmail())
            ->get();
    }

}