<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Historique;
use App\Biometry;


class BiometryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('biometries.create');
    }

    public function addBiometry($id)
    {
        $patient = Patient::findOrFail($id);

        $name = $patient->name.' '.$patient->firstname;

        return view('biometries.create', compact('patient', 'id', 'name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient_id = $request->input('patient_id');

        $patient = Patient::findOrFail($patient_id);

        $biometry = new Biometry();
        $biometry->height = $request->input('height');
        $biometry->weight = $request->input('weight');
        $biometry->temperature = $request->input('temperature');
        $biometry->pulse = $request->input('pulse');
        $biometry->blood_pressure = $request->input('blood_pressure');
        $biometry->biological_indicator = $request->input('biological_indicator');
        $biometry->imc = 0;
        $biometry->patient_id = $patient->id;
        $biometry->user_id = auth()->user()->id;

        $historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Biometry';
        $historique->user_id = auth()->user()->id;

        $biometry->save();

        $historique->save();

        //Redirect to the biometries.index view and display message
        return redirect()->route('patients.show', $patient->id)
            ->with('success',
             'Biometrie du Patient ajouté avec succès.');
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
