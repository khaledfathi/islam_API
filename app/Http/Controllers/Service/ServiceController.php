<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index ()
    {
        return view('service.index'); 
    } 
    public function store (Request $request)
    {
        return "ServiceController::store()"; 
    }
    public function show(Request $request)
    {

    }
    public function edit(Request $request)
    {

    }
    public function create()
    {
        return view('service.create'); 
    }
    public function update(Request $request)
    {

    }
    public function destroy(Request $request)
    {

    }

}
