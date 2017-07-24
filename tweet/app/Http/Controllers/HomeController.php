<?php

namespace Tweet\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}