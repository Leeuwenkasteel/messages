<?php

namespace Leeuwenkasteel\Messages\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class NotifyController extends Controller{ 
    public function page(){
        return view('mess::notify');
    }

    public function store(Request $req){
        foreach($req->check as $id){
            $note = DB::table('notifications')->whereId($id)->get()->first();
            if($note->notifiable_id == Auth::user()->id){
                DB::table('notifications')->whereId($id)->delete();
            }
        }
        return redirect()->back();

    }
}