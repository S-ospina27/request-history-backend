<?php

namespace App\Models\Manage;

use LionSQL\Drivers\MySQL as DB;

class RolesModel {

	public function __construct() {
		
	}

    public function readRolesDB() {
        return DB::table('roles')->select()->getAll();
    }

}