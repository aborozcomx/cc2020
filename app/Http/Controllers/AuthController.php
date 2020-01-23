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
                    $_SESSION['admin'] = $user->es_admin;

                    $team = DB::table('teams')->where('id_usuario', $user->id)->first();
                    if($user->es_admin){
                        return redirect('/ccadmin');
                    }

                    return redirect("/ccadmin/equipos/$team->id");
                }else{
                    $responseMessage = 'Datos Incorrectos';
                }
            }else{
                $responseMessage = 'Datos Incorrectos';
                
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