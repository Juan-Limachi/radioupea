<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view("test");
    }
    public function save() {
        dd($_FILES);
    }

}