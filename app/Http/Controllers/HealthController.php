<?php

namespace App\Http\Controllers;

use App\Models\Health;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\User;
use App\Models\Hospital;
use Auth;
class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $healths = Health::where('user_id','=',$id)->get();
       return view('health.index',['patient'=> User::find($id),'healths'=>$healths]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       return view('health.create',['patient_id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $health = new Health();
        $health->user_id = $request->patient_id;
        $health->temperature = $request->temperature;
        $health->taste = $request->taste;
        $health->smell = $request->smell;
        $health->energetic = $request->energy;
        $health->nose = $request->nose;
        $health->throught = $request->throught;
        $health->cough = $request->cough;
        $health->respiration = $request->respiration;
        $health->pain = $request->pain;
        $health->save();
        // dd($request->patient_id);
        // return redirect()->back();
        return redirect()->route('health.index',$request->patient_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function show(Health $health)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function edit(Health $health)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Health $health)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function destroy(Health $health)
    {
        //
    }
}
