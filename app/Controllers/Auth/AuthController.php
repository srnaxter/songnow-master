<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Log;
use App\Models\User;
use App\Models\Invitations;
use Sirius\Validation\Validator;

class AuthController extends BaseController {

    public function getLogin(){
        return $this->render('auth/login.twig',[]);
    }

    public function postLogin(){
        $validator = new Validator();

        $validator->add('inputEmail:Email', 'required', [], 'El {label} es requerido');
        $validator->add('inputEmail:Email', 'email',[],'No es un email válido');
        $validator->add('inputPassword:Password', 'required',[],'La {label} es requerida.');

        if($validator->validate($_POST)){
            $user = User::where('email', $_POST['inputEmail'])->first();
            if ($user){
            if( password_verify($_POST['inputPassword'], $user->password) ){
                $_SESSION['userId'] = $user->id;
                $_SESSION['userName'] = $user->name;
                $_SESSION['userEmail'] = $user->email;

                header('Location: '. BASE_URL);
                return null;
            }
            }

            $validator->addMessage('authError','Los datos son incorrectos');
        }

        Log::logInfo('Intento fallido de login '. $_POST['inputEmail']);

        $errors = $validator->getMessages();

        return $this->render('auth/login.twig', [
            'errors' => $errors
        ]);
    }

    public function getLogout(){
        //session_destroy();
        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        unset($_SESSION['userEmail']);


        header("Location: ". BASE_URL);
    }

    public function getInvitacion(){
        return $this->render('auth/invitacion.twig',[]);
    }

    public function postInvitacion(){
        $errors = [];
        $validator = new Validator();

        $validator->add('inputEmail:Email', 'required', [], 'El {label} es requerido');
        $validator->add('inputEmail:Email', 'email',[],'No es un email válido');

        if ($validator->validate($_POST)){
            $invitations = new Invitations();

            $invitations->email = $_POST['inputEmail'];

            $invitations->save();

            header('enviada.twig');
        }else{
            $errors = $validator->getMessages();
        }
        //$validator->addMessage('authError','Los datos son incorrectos');

        return $this->render('auth/invitacion.twig',['errors' => $errors]);

    }
}