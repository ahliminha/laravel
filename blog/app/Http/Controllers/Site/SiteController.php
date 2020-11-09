<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index(){
        $title = 'Curso';

        $xss = '<script>alert("ataque XSS");</script>';

        $var1 = 123;

        $array = [1,2,3,4,5,6];

        return view("site.home.index", compact('title', 'xss', 'var1', 'array'));
    }

    public function categoria($id){
        return "Categoria {$id}";
    }
    
    public function contato(){
        return view("site.contato.contato");
    }
    
    public function categoriaOp($id = 1){
        return "Categoria {$id}";
    }
}
