<?php

namespace Leeuwenkasteel\Messages\View\Components;

use Illuminate\View\Component;

class Css extends Component{
 
    public function __construct(){
        
    }

    public function render(){
        return view('mess::components.css');
    }
}