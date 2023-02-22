<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\LoginModel;
use Database\Class\Developers;
use LionSecurity\JWT;
use LionSecurity\RSA;

class LoginController {

    private LoginModel $loginModel;

	public function __construct() {
        $this->loginModel = new LoginModel();
	}

    public function auth() {
        $developers = Developers::formFields();

        $cont = $this->loginModel->authDB($developers);
        if ($cont->cont === 0) {
            return response->error("El email/password es incorrecto");
        }

        $session = $this->loginModel->sessionDB($developers);
        $rsa_decode = RSA::decode([
            'developers_password' => $session->getDevelopersPassword()
        ]);

        if (!password_verify($developers->getDevelopersPassword(), $rsa_decode->developers_password)) {
            return response->error("El email/password es incorrecto");
        }

        if (!in_array($session->getIdroles(), [1, 3, 4])) {
            return response->warning("Esta cuenta no tiene permiso para acceder a esta plataforma");
        }

        if ($session->getIdstates() === 5) {
            return response->warning("La cuenta está inactiva");
        }

        return response->success("Bienvenido: {$session->getDevelopersName()}", [
            'jwt' => JWT::encode([
                'session' => true,
                'iddevelopers' => $session->getIddevelopers(),
                'idroles' => $session->getIdroles()
            ])
        ]);
    }

}