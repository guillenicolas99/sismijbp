<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected function setFlashMessage($icon, $title, $text)
    {
        session()->flash('swal', compact('icon', 'title', 'text'));
    }
}
