<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Toast extends Component {
    protected $type;

    public function __construct($type) {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        $styles = [
            'error' => [
                'typeLabel' => 'Erro',
                'icon' => 'alert-octagon.svg',
                'backgroundColor' => '#FFE6DF',
                'color' => '#F25F5C'
            ],

            'success' => [
                'typeLabel' => 'Sucesso',
                'icon' => 'check.svg',
                'backgroundColor' => '#E5F4E7',
                'color' => '#72B01D'
            ]
        ];

        $componentSetup = $styles[$this->type];

        return view('components.toast', compact('componentSetup'));
    }
}
