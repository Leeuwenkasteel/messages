<?php

namespace Leeuwenkasteel\Messages\Http\Livewire;

use Livewire\Component;
use Auth;
use DB;
class Notifications extends Component{

    public function render(){
        $notes = Auth::user()->notifications;
        return view('mess::livewire.notifications', compact('notes'));
    }

    public function read($id){
        DB::table('notifications')->whereId($id)->update(['read_at' => date('Y-m-d H:i:s')]);
        $this->emitTo('component-to-refresh', 'read');
    }

}