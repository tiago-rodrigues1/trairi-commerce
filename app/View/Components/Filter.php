<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Filter extends Component {
    public $filters, $termo, $filtrosUsuario, $action;

    public function __construct($filters, $termo, $filtrosUsuario, $action) {
        $this->filters = $filters;
        $this->termo = $termo;
        $this->filtrosUsuario = $filtrosUsuario;
        $this->action = $action;
    }


    public function render() {
        return view('components.filter');
    }
}
