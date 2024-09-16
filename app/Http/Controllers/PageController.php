<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PageController extends Controller
{
    public function index(){

        $title = 'Layout base - HOME';
        $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo modi, iusto dolore eaque laudantium optio, adipisci perspiciatis voluptate obcaecati sit perferendis natus velit ut! Tempora voluptatum ipsam modi rem voluptas.';
        return view('home', compact('text', 'title'));
    }

    public function about(){
        return view('about');
    }

    public function contacts(){
        return view('contacts');
    }
}

