<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\User;
use App\Models\Hospital;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("home");
    }
    public function hospitals()
    {
        $hospitals = $users = Hospital::select('name')
        ->groupBy('name')
        ->get();
        return view("hospitals",['hospitals'=>$hospitals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("patient.create");

    }
    public function createCEO()
    {
        return view("ceo.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         User::create([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'address' => $request['address'],
            'ak' => $request['ak'],
            'phone' => $request['phone'],
            'permission_lvl' => 1,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('patient.index');
    }
    public function storeCEO(Request $request)
    {   
        $user = User::create([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'address' => $request['address'],
            'ak' => $request['ak'],
            'phone' => $request['phone'],
            'permission_lvl' => 100,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        Hospital::create([
            'name' => $request['hospital'],
            'user_id' => $user->id
        ]);
        return redirect()->route('patient.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
