<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller{
    public function getIndex(){
        $teams = DB::table('teams')->get();
		
		
        return view('admin', [
        		'teams' => $teams
        ]);
    }
}