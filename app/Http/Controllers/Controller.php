<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //insert data
    function insert(Request $req) {
      $year = $req->input('year');
      $weight = $req->input('weight');
      $data = array('year' => $year, 'weight' => $weight);
      DB::table('beehiver')->insert($data);
      return redirect('beehive');
    }
       //getData
    function getData() {
        $data['data'] = DB::table('beehiver')->get();
        return view('about',$data);
    }

      //delete

    function delete($year){
        DB::table('beehiver')->where('year',$year)->delete();
        return redirect('beehive');
    }
}
