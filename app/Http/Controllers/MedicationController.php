<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medication;
use App\Historique;

class MedicationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'doctor']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all medications and pass it to the view
        $medications = Medication::all();

        return view('medications.index')->with('medications', $medications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'dosage' => 'required',
        ]);
        
        $medication = new Medication();
        
        $medication->name = $request->input('name');
        $medication->medecine_family = $request->input('medecine_family');
        $medication->form = $request->input('form');
        $medication->dosage = $request->input('dosage');
        $medication->presentation = $request->input('presentation');
        $medication->observation = $request->input('observation');

        $historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Medication';
        $historique->user_id = auth()->user()->id;

        $medication->save();
        $historique->save();

        //Redirect to the users.index view and display message
        return redirect()->route('medications.index')
            ->with('success',
             'Nouveau Médicament ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medication = Medication::findOrFail($id); //Get medication with specified id

        return view('medications.show', compact('medication')); //pass medication data to view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medication = Medication::findOrFail($id); //Get medication with specified id

        return view('medications.edit', compact('medication')); //pass medication data to view
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
        $medication = Medication::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'dosage' => 'required',
        ]);
        
        $medication->name = $request->input('name');
        $medication->medecine_family = $request->input('medecine_family');
        $medication->form = $request->input('form');
        $medication->dosage = $request->input('dosage');
        $medication->presentation = $request->input('presentation');
        $medication->observation = $request->input('observation');

        $historique = new Historique();
        $historique->action = 'Update';
        $historique->table = 'Medication';
        $historique->user_id = auth()->user()->id;

        $medication->save();
        $historique->save();

        //Redirect to the users.index view and display message
        return redirect()->route('medications.index')
            ->with('success',
             'Médicament édité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medication = Medication::findOrFail($id);

        $historique = new Historique();
        $historique->action = 'Delete';
        $historique->table = 'Medication';
        $historique->user_id = auth()->user()->id;

        $medication->delete();
        $historique->save();

        return redirect()->route('medications.index')
            ->with('success',
             'Médicament supprimé avec succès.');
    }
}
