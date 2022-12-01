<?php

namespace App\View\Components;

use Illuminate\View\Component;

class nav-menu extends Component {
    public $isAuthenticated;
    
    public function __construct($isAuthenticated) {
        $this->isAuthenticated = $isAuthenticated;
    }

    public function render() {
        return view('components.nav-menu');
    }
}
