<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Historique;
use App\Antecedent;

class AntecedentController extends Controller
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
        //return view('antecedents.create');
    }

    public function addAntecedent($id)
    {
        $patient = Patient::findOrFail($id);

        $name = $patient->name.' '.$patient->firstname;

        return view('antecedents.create', compact('patient', 'id', 'name'));
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

        $antecedent= new Antecedent();
        $antecedent->medical_history = $request->input('medical_history');
        $antecedent->family_history = $request->input('family_history');
        $antecedent->surgical_history = $request->input('surgical_history');
        $antecedent->allergy = $request->input('allergy');
        $antecedent->patient_id = $patient->id;
        $antecedent->user_id = auth()->user()->id;

        $historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Antecedent';
        $historique->user_id = auth()->user()->id;

        $antecedent->save();

        $historique->save();

        //Redirect to the users.index view and display message
        return redirect()->route('patients.show', $patient->id)
            ->with('success',
             'Antécédent du Patient ajouté avec succès.');
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
