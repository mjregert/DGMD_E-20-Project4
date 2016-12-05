<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Display a the main page.
 *
 * @return show.blade.php main page
 */
class PageController extends Controller
{
    public function __invoke() {
        return view('index');
    }
}
