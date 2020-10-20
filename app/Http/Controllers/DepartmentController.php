<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Historique;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all departments and pass it to the view
        $departments = Department::all();

        return view('departments.index')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
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
        ]);

        $department = new Department();
        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->status = $request->input('status');
        $department->user_id = auth()->user()->id;

        $historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Department';
        $historique->user_id = auth()->user()->id;

        $department->save();
        $historique->save();

        //Redirect to the departments.index view and display message
        return redirect()->route('departments.index')
            ->with('success',
             'Départment ajouté avec succès.');
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
        $department = Department::findOrFail($id); //Get department with specified id

        return view('departments.edit', compact('department')); //pass department data to view
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        $department = Department::findOrFail($id);
        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->status = $request->input('status');
        $department->user_id = auth()->user()->id;

        $historique = new Historique();
        $historique->action = 'Update';
        $historique->table = 'Department';
        $historique->user_id = auth()->user()->id;

        $department->save();
        $historique->save();

        //Redirect to the departments.index view and display message
        return redirect()->route('departments.index')
            ->with('success',
             'Départment '.$department->name.' édité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')
            ->with('success',
             'Départment supprimé avec succès.');

    }
}
