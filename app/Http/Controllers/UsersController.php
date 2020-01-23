<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Respect\Validation\Validator as v;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use DB;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAddUser()
    {
        $estados = DB::table('estados')->get();

        return view('addUser',[
            'estados' => $estados,
        ]);
    }
    
    public function postSaveUser(Request $request){
        $responseMessage = null;
        $estados = DB::table('estados')->get();
        $userValidator = v::key('nombre', v::stringType()->notEmpty())
                  ->key('apellido', v::stringType()->notEmpty())
                  ->key('email', v::email()->notEmpty())
                  ->key('password', v::stringType()->notEmpty());

        
        
        if($userValidator){
            $nombre = $request->input('nombre');
            $apellido = $request->input('apellido');
            $email = $request->input('email');
            $id_estado = $request->input('id_estado');

            $password = password_hash($request->input('password'),PASSWORD_DEFAULT);
            
            $id_usuario = DB::table('users')->insertGetId(
                [
                    'nombre' => $nombre, 
                    'apellido' => $apellido,
                    'email' => $email,
                    'password' => $password,
                ]
            );


            if($id_usuario){
                $user = DB::table('users')->where('id', $id_usuario)->first();
                
                $id_team = DB::table('teams')->insert(
                    [
                        'nombre' => $request->input('nombre_equipo'), 
                        'id_usuario' => $id_usuario,
                        'id_estado' => $id_estado
                    ]
                );

                $mail = new PHPMailer();
                try {
                    $mail->isSMTP();
                    
                    $mail->Host       = env('MAIL_HOST');
                    $mail->SMTPAuth   = true;
                    $mail->Username   = env('MAIL_USERNAME');
                    $mail->Password   = env('MAIL_PASSWORD');
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = env('MAIL_PORT');
                
                    //Recipients
                    $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                    $mail->addAddress($user->email,$user->nombre.' '.$user->apellido);
                    //$mail->addCC('copacampeche@hotmail.com');
                    
                        $tpl = '
                        <h1>!Hola '.$user->nombre.'!<h1>
                        <p>El registro de tu usuario para la <b>Copa Campeche 2020</b>, <br>
                            ha sido satisfactorio.
                        </p>
                        <p>Estamos trabajando en la plataforma para que puedas registrar
                            las categorias de tu equipo y jugadores.
                        </p>
                        <p>Estos son tus datos de acceso: <br>
                            Email: '.$user->email.'<br>
                            Contraseña: '.$request->input('password').'
                        </p>
                    ';
                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Registro Copa Campeche';
                    $mail->Body    = $tpl;
                
                    if($mail->send()){
                        $success = true;
                        $responseMessage = 'Registro exitoso, pronto recibiras un correo en tu bandeja de entrada';
                    }else{
                            $success = false;
                        $responseMessage = 'Hubo un problema al enviar el correo';
                    }
                
                    
                    //echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
               
            }
            
            
            
        } else  {
            $success = false;
            $responseMessage = "Hubo un problema al guardar";
        }
            
        

        return view('addUser',[
            'user' => $user,
            'success' => $success,
            'responseMessage' => $responseMessage,
            'estados' => $estados,
        ]);
    }
}