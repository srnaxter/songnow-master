<?php
namespace App\Controllers;

use App\Controllers\Auth\AuthController;
use App\Controllers\Auth\InviController;
use App\Controllers\Auth\RegisterController;
use App\Models\User;

class HomeController extends BaseController {

    /**
     * Ruta / donde se muestra la página de inicio del proyecto.
     *
     * @return string Render de la página
     */
    public function getIndex(){
        $listmusic = new listmusicController();

        return $listmusic->getIndex();
    }

    public function getContacto(){
        return 'Información de contacto';
    }

    public function getLogin(){
        $auth = new AuthController();

        return $auth->getLogin();
    }

    public function postLogin(){
        $auth = new AuthController();

        return $auth->postLogin();
    }

    public function getRegistro(){
        $register = new RegisterController();

        return $register->getRegister();
    }

    public function postRegistro(){
        $register = new RegisterController();

        return $register->postRegister();
    }


    public function getLogout(){
        $auth = new AuthController();

        return $auth->getLogout();
    }

    public function getInvitacion(){
        $invitacion = new AuthController();

        return $invitacion->getInvitacion();
    }

    public function postInvitacion(){
        $invitacion = new AuthController();

        return $invitacion->postInvitacion();
    }

}












