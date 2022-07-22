<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextField extends Component
{
    public $fieldId;

    public $label;

    public $helpText;

    public $model;

    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fieldId, $label, $helpText, $type, $model)
    {
        $this->fieldId = $fieldId;
        $this->label = $label;
        $this->helpText = $helpText;
        $this->model = $model;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.text-field');
    }
}
