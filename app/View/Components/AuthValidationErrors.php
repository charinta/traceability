<?php
// app/View/Components/AuthValidationErrors.php

// app/View/Components/AuthValidationErrors.php

namespace App\View\Components;

use Illuminate\View\Component;

class AuthValidationErrors extends Component
{
    /**
     * The validation errors.
     *
     * @var \Illuminate\Support\ViewErrorBag
     */
    public $errors;

    /**
     * Create a new component instance.
     *
     * @param  \Illuminate\Support\ViewErrorBag  $errors
     * @return void
     */
    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.auth-validation-errors');
    }
}
