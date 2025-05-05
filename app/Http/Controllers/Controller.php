<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function addFlashMessage()
    {
        $text = 'Agregado correctamente.';
        session()->flash('success', $text);
    }

    protected function updateFlashMessage()
    {
        $text = 'Actualizado correctamente.';
        session()->flash('success', $text);
    }

    protected function deleteFlashMessage($message = '')
    {
        $text = $message. ' Eliminado correctamente.'; 
        session()->flash('success', $text);
    }
}
