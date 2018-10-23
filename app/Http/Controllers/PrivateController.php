<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('index');
/*        or 
        $this->middleware('auth')->except(['show', 'create']);
 */    }

    public function index(){
    return 'This is Private';}



    public function show(){
        return 'This is private show';}

}
