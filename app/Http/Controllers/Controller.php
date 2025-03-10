<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function setFlashMessage($icon, $title, $text)
    {
        session()->flash('swal', compact('icon', 'title', 'text'));
    }
}
