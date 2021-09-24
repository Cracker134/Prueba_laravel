<?php
namespace App\Http\Controllers;

class HolaController extends Controller
{
    public function saludo(string $name): string
    {
    return view("saludo", compact("name"));
    }


}