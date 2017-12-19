<?php
namespace App\Controllers;

use App\Models\Comment;
use App\Models\Listmusic;
use Sirius\Validation\Validator;

class ListmusicController extends BaseController {

    /**
     * Ruta [GET] /listmusic/new que muestra el formulario de añadir una nueva distribución.
     *
     * @return string Render de la web con toda la información.
     */
    public function getNew(){
        $errors = array();  // Array donde se guardaran los errores de validación

        $webInfo = [
            'h1'        => 'Añadir Song',
            'submit'    => 'Añadir',
            'method'    => 'POST'
        ];

        // Se construye un array asociativo $listmusic con todas sus claves vacías
        $listmusic = array_fill_keys(["name","image", "genero", "anio", "origin", "arch", "duracion", "lugarencontrado", "aniocreation", "recomiendas", "album", "valoracion", "youtube", "errorTracker", "description"], "");

        return $this->render('formListmusic.twig', [
            'listmusic'        => $listmusic,
            'errors'        => $errors,
            'webInfo'       => $webInfo
        ]);
    }

    /**
     * Ruta [POST] /listmusic/new que procesa la introducción de una nueva distribución.
     *
     * @return string Render de la web con toda la información.
     */
    public function postNew(){
        $webInfo = [
            'h1'        => 'Añadir Song',
            'submit'    => 'Añadir',
            'method'    => 'POST'
        ];

        if (!empty($_POST)) {
            $validator = new Validator();

            $requiredFieldMessageError = "El {label} es requerido";

            $validator->add('name:Nombre', 'required',[],$requiredFieldMessageError);
            $validator->add('genero:Genero', 'required', [], $requiredFieldMessageError);
            $validator->add('anio:anio', 'required',[], $requiredFieldMessageError);
            $validator->add('origin:Origen','required',[],$requiredFieldMessageError);
            $validator->add('creado:Creado','required',[],$requiredFieldMessageError);
            $validator->add('duracion:Duracion','required',[],$requiredFieldMessageError);
            $validator->add('lugarencontrado:lugar','required',[],$requiredFieldMessageError);
            $validator->add('aniocreation:Año creacion','required',[],$requiredFieldMessageError);
            $validator->add('album:Sitio album', 'required',[], $requiredFieldMessageError);
            $validator->add('description:Descripción','required',[],$requiredFieldMessageError);

            // Extraemos los datos enviados por POST
            $listmusic['name'] = htmlspecialchars(trim($_POST['name']));
            $listmusic['image'] = htmlspecialchars(trim($_POST['image']));
            $listmusic['genero'] = $_POST['genero'];
            $listmusic['anio'] = $_POST['anio'];
            $listmusic['origin'] = htmlspecialchars(trim($_POST['origin']));
            $listmusic['creado'] = $_POST['creado'];
            $listmusic['duracion'] = $_POST['duracion'];
            $listmusic['lugarencontrado'] = $_POST['lugarencontrado'];
            $listmusic['aniocreation'] = htmlspecialchars(trim($_POST['aniocreation']));
            $listmusic['recomiendas'] = htmlspecialchars(trim($_POST['recomiendas']));
            $listmusic['album'] = htmlspecialchars(trim($_POST['album']));
            $listmusic['valoracion'] = htmlspecialchars(trim($_POST['forum']));
            $listmusic['youtube'] = htmlspecialchars(trim($_POST['youtube']));
            $listmusic['description'] = htmlspecialchars(trim($_POST['description']));

            if ($validator->validate($_POST)) {
                $listmusic = new Listmusic([
                    'image'         => $listmusic['image'],
                    'name'          => $listmusic['name'],
                    'genero'        => $listmusic['genero'],
                    'anio'       => $listmusic['anio'],
                    'origin'        => $listmusic['origin'],
                    'creado'  => $listmusic['creado'],
                    'duracion'       => $listmusic['duracion'],
                    'lugarencontrado'      => $listmusic['lugarencontrado'],
                    'aniocreation'        => $listmusic['aniocreation'],
                    'recomiendas'       => $listmusic['recomiendas'],
                    'album'           => $listmusic['album'],
                    'youtube'           => $listmusic['youtube'],
                    'valoracion'        => $listmusic['valoracion'],
                    'description'   => $listmusic['description']
                ]);
                $listmusic->save();

                // Si se guarda sin problemas se redirecciona la aplicación a la página de inicio
                header('Location: ' . BASE_URL);
            }else{
                $errors = $validator->getMessages();
            }
        }

        return $this->render('formListmusic.twig', [
            'listmusic'        => $listmusic,
            'errors'        => $errors,
            'webInfo'       => $webInfo
        ]);
    }

    /**
     * Ruta [GET] /listmusic/edit/{id} que muestra el formulario de actualización de una nueva distribución.
     *
     * @param id Código de la distribución.
     *
     * @return string Render de la web con toda la información.
     */
    public function getEdit($id){
        $errors = array();  // Array donde se guardaran los errores de validación

        $webInfo = [
            'h1'        => 'Actualizar Song',
            'submit'    => 'Actualizar',
            'method'    => 'PUT'
        ];

        // Recuperar datos
        $listmusic = Listmusic::find($id);

        if( !$listmusic ){
            header('Location: home.twig');
        }

        return $this->render('formListmusic.twig',[
            'listmusic'        => $listmusic,
            'errors'        => $errors,
            'webInfo'       => $webInfo
        ]);
    }

    /**
     * Ruta [PUT] /listmusic/edit/{id} que actualiza toda la información de una distribución. Se usa el verbo
     * put porque la actualización se realiza en todos los campos de la base de datos.
     *
     * @param id Código de la distribución.
     *
     * @return string Render de la web con toda la información.
     */
    public function putEdit($id){
        $errors = array();  // Array donde se guardaran los errores de validación

        $webInfo = [
            'h1'        => 'Actualizar Song',
            'submit'    => 'Actualizar',
            'method'    => 'PUT'
        ];

        if( !empty($_POST)){
            $validator = new Validator();

            $requiredFieldMessageError = "El {label} es requerido";

            $validator->add('name:Nombre', 'required',[],$requiredFieldMessageError);
            $validator->add('genero:Genero', 'required', [], $requiredFieldMessageError);
            $validator->add('anio:Anio', 'required',[], $requiredFieldMessageError);
            $validator->add('origin:Origen','required',[],$requiredFieldMessageError);
            $validator->add('creado:Creado','required',[],$requiredFieldMessageError);
            $validator->add('duracion:Duracion','required',[],$requiredFieldMessageError);
            $validator->add('lugarencontrado:lugar','required',[],$requiredFieldMessageError);
            $validator->add('aniocreation:Año creacion','required',[],$requiredFieldMessageError);
            $validator->add('album:Album', 'required',[], $requiredFieldMessageError);
            $validator->add('description:Descripción','required',[],$requiredFieldMessageError);

            // Extraemos los datos enviados por POST
            $listmusic['id'] = $id;
            $listmusic['name'] = htmlspecialchars(trim($_POST['name']));
            $listmusic['image'] = htmlspecialchars(trim($_POST['image']));
            $listmusic['genero'] = $_POST['genero'];    // Si no se recibe nada se carga un array vacío
            $listmusic['anio'] = $_POST['anio'];
            $listmusic['origin'] = htmlspecialchars(trim($_POST['origin']));
            $listmusic['creado'] = $_POST['creado'];
            $listmusic['duracion'] = $_POST['duracion'];
            $listmusic['lugarencontrado'] = $_POST['lugarencontrado'];
            $listmusic['aniocreation'] = htmlspecialchars(trim($_POST['aniocreation']));
            $listmusic['recomiendas'] = htmlspecialchars(trim($_POST['recomiendas']));
            $listmusic['album'] = htmlspecialchars(trim($_POST['album']));
            $listmusic['valoracion'] = htmlspecialchars(trim($_POST['forum']));
            $listmusic['youtube'] = htmlspecialchars(trim($_POST['youtube']));
            $listmusic['description'] = htmlspecialchars(trim($_POST['description']));

            if ( $validator->validate($_POST) ){
                $listmusic = Listmusic::where('id', $id)->update([
                    'id'            => $listmusic['id'],
                    'image'         => $listmusic['image'],
                    'name'          => $listmusic['name'],
                    'genero'        => $listmusic['genero'],
                    'anio'       => $listmusic['anio'],
                    'origin'        => $listmusic['origin'],
                    'creado'  => $listmusic['creado'],
                    'duracion'       => $listmusic['duracion'],
                    'lugarencontrado'      => $listmusic['lugarencontrado'],
                    'aniocreation'        => $listmusic['aniocreation'],
                    'recomiendas'       => $listmusic['recomiendas'],
                    'album'           => $listmusic['album'],
                    'youtube'           => $listmusic['youtube'],
                    'valoracion'        => $listmusic['valoracion'],
                    'description'   => $listmusic['description']
                ]);

                // Si se guarda sin problemas se redirecciona la aplicación a la página de inicio
                header('Location: ' . BASE_URL);
            }else{
                $errors = $validator->getMessages();
            }
        }
        return $this->render('formlistmusic.twig', [
            'listmusic'        => $listmusic,
            'errors'        => $errors,
            'webInfo'       => $webInfo
        ]);
    }

    /**
     * Ruta raíz [GET] /listmusic para la dirección home de la aplicación. En este caso se muestra la lista de distribuciones.
     *
     * @return string Render de la web con toda la información.
     *
     * Ruta [GET] /listmusic/{id} que muestra la página de detalle de la distribución.
     * todo: La vista de detalle está pendiente de implementar.
     *
     * @param id Código de la distribución.
     *
     * @return string Render de la web con toda la información.
     */
    public function getIndex($id = null){
        if( is_null($id) ){
            $webInfo = [
                'title' => 'Página de Inicio - SongNow'
            ];

            $listmusic = listmusic::query()->orderBy('id','desc')->get();
            //$listmusic = listmusic::all();

            return $this->render('home.twig', [
                'listmusic' => $listmusic,
                'webInfo' => $webInfo
            ]);

        }else{
            // Recuperar datos

            $webInfo = [
                'title' => 'Página de listmusic - SongNow'
            ];

            $listmusic = listmusic::find($id);

            if( !$listmusic ){
                return $this->render('404.twig', ['webInfo' => $webInfo]);
            }

            //dameDato($listmusic);
            return $this->render('listmusic/listmusic.twig', [
                'listmusic'    => $listmusic,
                'webInfo'   => $webInfo,
            ]);
        }

    }

    public function postIndex($id){
        $errors = [];
        $validator = new Validator();

        $validator->add('name:Nombre','required', [], 'El {label} es necesario para comentar');
        $validator->add('name:Nombre','minlength', ['min' => 5], 'El {label} debe tener al menos 5 caracteres');
        $validator->add('email:Email','required', [], 'El {label} no es válido');
        $validator->add('email:Email','required', [], 'El {label} es necesario para comentar');
        $validator->add('comment:Comentario', 'required', [], 'Aunque los silencios a veces dicen mucho no se permiten comentarios vacíos');

        if($validator->validate($_POST)){
            $comment = new Comment();

            $comment->listmusic_id = $id;
            $comment->user = $_POST['name'];
            $comment->email = $_POST['email'];
            $comment->ip = getRealIP();
            $comment->text = $_POST['comment'];
            $comment->approved = true;

            $comment->save();

            header("Refresh: 0 " );
        }else{
            $errors = $validator->getMessages();
        }

        $webInfo = [
            'title' => 'Página de listmusic - SongNow'
        ];

        $listmusic = listmusic::find($id);
        $comments = Comment::all();
        $webInfo = [
            'title' => 'Página de listmusic - SongNow'
        ];

        if( !$listmusic ){
            return $this->render('404.twig', ['webInfo' => $webInfo]);
        }

        return $this->render('listmusic/listmusic.twig', [
            'errors'    => $errors,
            'webInfo'   => $webInfo,
            'listmusic'    => $listmusic,
            'comments'  => $comments
        ]);
    }

    /**
     * Ruta [DELETE] /listmusic/delete para eliminar la distribución con el código pasado
     */
    public function deleteIndex(){
        $id = $_REQUEST['id'];

        $listmusic = listmusic::destroy($id);

        header("Location: ". BASE_URL);
    }
}