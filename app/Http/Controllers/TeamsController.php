<?php
    namespace App\Http\Controllers;
    
    use Respect\Validation\Validator as v;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
	use DB;
	
    class TeamsController extends Controller {
        public function getIndex(){
	        $teams = DB::table('teams')->get();
			
			
	        return view('teams', [
	        		'teams' => $teams
	        ]);
		}
		
		public function getTeam($id){
	        $team = DB::table('teams')->where('id', $id)->first();
			$subc = DB::table('subcategorias')->get();
			$ramas = DB::table('ramas')->get();
			$pagos = DB::table('pagos')->where('id_equipo',$id)->get();
			
			$teams = DB::table('equipos_ramas_subcat')
							->leftJoin('ramas', 'equipos_ramas_subcat.rama_id', '=', 'ramas.id')
							->leftJoin('subcategorias', 'equipos_ramas_subcat.subcategoria_id', '=', 'subcategorias.id')
							->leftJoin('categorias', 'subcategorias.id_categoria', '=', 'categorias.id')
							->select('subcategorias.nom_subcategoria', 'ramas.nom_rama','categorias.costo')
							->where('equipos_ramas_subcat.equipo_id',$id)
							->get();


	        return view('team', [
					'id' => $id,
					'team' => $team,
					'subcs' => $subc,
					'ramas' => $ramas,
					'teams' => $teams,
					'pagos' => $pagos
	        ]);
		}
		

		public function postSaveTeam(Request $request){
			$responseMessage = null;
			
			
			$id_subc = $request->input('id_subcategoria');
			$id_rama = $request->input('id_rama');
			
			$id_equipo = $request->input('id_equipo');
			// $team = DB::table('teams')
            //   ->where('id','=',$id_equipo)
			//   ->update(['id_estado' => $id_estado]);
			  
			$id_equipo_rama = DB::table('equipos_ramas_subcat')->insertGetId(
				[
					'equipo_id' => $id_equipo, 
					'rama_id' => $id_rama,
					'subcategoria_id' => $id_subc,
				]
			);
	
			return redirect("/ccadmin/equipos/$id_equipo");
		}
    }