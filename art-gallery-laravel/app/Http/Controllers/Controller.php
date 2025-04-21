<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Provides authorization capabilities to controllers.
     * Mixes in the AuthorizesRequests trait.
     */
    use AuthorizesRequests;

    /**
     * Provides validation capabilities to controllers.
     * Mixes in the ValidatesRequests trait.
     */
    use ValidatesRequests;

    // You can add common methods or properties here if needed by multiple controllers.
}