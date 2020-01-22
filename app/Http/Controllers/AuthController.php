<?php
    namespace App\Http\Controllers;
    
    use Respect\Validation\Validator as v;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    


    use DB;

    class AuthController extends Controller {
        public function getLogin(){
            return view('login');
        }

        public function postLogin(Request $request){
            
            $responseMessage = null;
            $input = $request->all();

            $user = DB::table('users')->where('email', $input['email'])->first();


            if($user){
                if(password_verify($input['password'],$user->password)){
                    $_SESSION['userId'] = $user->id;
                    return redirect('/ccadmin');
                }else{
                    $responseMessage = 'Contraseña Incorrecta';
                }
            }else{
                $responseMessage = 'Correo incorrecto';
                
            }

            return view('login',[
                'responseMessage' => $responseMessage
            ]);
        }

        public function getLogout(){
            unset($_SESSION['userId']);
            return redirect('/login');
        }
    }