<?php

namespace App\Http\Middleware;

use LionSecurity\JWT;

class RolesMiddleware {

    private object $jwt;

	public function __construct() {
        $this->jwt = JWT::decode(JWT::get());
	}

    public function allAccess() {
        if (!in_array($this->jwt->data->idroles, [1, 2, 3, 4])) {
            finish(response->error("No tiene acceso para realizar esta accion"));
        }
    }

    public function noDeveloperAccess() {
        if ($this->jwt->data->idroles === 3) {
            finish(response->error("No tiene acceso para realizar esta accion"));
        }
    }

    public function noAccessClients() {
        if ($this->jwt->data->idroles === 2) {
            finish(response->error("No tiene acceso para realizar esta accion"));
        }
    }

}