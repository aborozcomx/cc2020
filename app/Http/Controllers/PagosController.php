<?php
    namespace App\Http\Controllers;
    
    use Respect\Validation\Validator as v;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
	use DB;
	
    class PagosController extends Controller {
        
		public function addPago(Request $request){
			$responseMessage = null;
			
			
            $monto = $request->input('monto');
            $id_equipo = $request->input('id_equipo');
            
            
            
            
            if ($request->hasFile('comprobante')) {
                
                if($request->file('comprobante')->isValid()){
                    $picName = $request->file('comprobante')->getClientOriginalName();
                    $picName = uniqid() . '_' . $picName;
                    $path = 'uploads' . DIRECTORY_SEPARATOR;
                    $request->file('comprobante')->move($path, $picName);
                }
            }
			$id_pago = DB::table('pagos')->insertGetId(
				[
					'monto' => $monto, 
					'comprobante' => $picName,
					'id_equipo' => $id_equipo,
				]
			);
	
			return redirect("/ccadmin/equipos/$id_equipo");
		}
    }