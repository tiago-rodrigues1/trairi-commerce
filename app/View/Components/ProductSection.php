<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductSection extends Component {
    public $sectionTitle;

    public function __construct($sectionTitle) {
        $this->sectionTitle = $sectionTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('components.product-section');
    }
}
