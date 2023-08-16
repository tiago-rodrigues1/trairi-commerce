<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Comentario extends Component {
    public $objectData;
    public $tipoDeComentario;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($objectData, $tipoDeComentario) {
        $this->objectData = $objectData;
        $this->tipoDeComentario = $tipoDeComentario;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('components.comentario');
    }
}
