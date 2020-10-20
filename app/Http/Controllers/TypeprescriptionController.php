<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypePrescription;
use App\Historique;

class TypeprescriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','doctor']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all typeprescriptions and pass it to the view
        $typeprescriptions = TypePrescription::all();


        return view('typeprescriptions.index')->with('typeprescriptions', $typeprescriptions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeprescriptions.create');
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
            'title' => 'required',
        ]);

        $typeprescription = new TypePrescription();
        $typeprescription->title = $request->input('title');
        $typeprescription->description = $request->input('description');

        $historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'TypePrescription';
        $historique->user_id = auth()->user()->id;

        $typeprescription->save();
        $historique->save();

        //Redirect to the typeprescriptions.index view and display message
        return redirect()->route('typeprescriptions.index')
            ->with('success',
             'Type Ordonnance ajouté avec succès.');
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
        $typeprescription = TypePrescription::findOrFail($id); //Get typeprescription with specified id

        return view('typeprescriptions.edit', compact('typeprescription')); //pass typeprescription data to view
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
        $typeprescription = TypePrescription::findOrFail($id);
        
        $this->validate($request, [
            'title' => 'required',
        ]);

        $typeprescription->title = $request->input('title');
        $typeprescription->description = $request->input('description');

        $historique = new Historique();
        $historique->action = 'Update';
        $historique->table = 'TypePrescription';
        $historique->user_id = auth()->user()->id;

        $typeprescription->save();
        $historique->save();

        //Redirect to the typeprescriptions.index view and display message
        return redirect()->route('typeprescriptions.index')
            ->with('success',
             'Type Ordonnance édité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeprescription = TypePrescription::findOrFail($id);
        $typeprescription->delete();

        return redirect()->route('typeprescriptions.index')
            ->with('success',
             'Type Ordonnance supprimé avec succès.');
    }
}
