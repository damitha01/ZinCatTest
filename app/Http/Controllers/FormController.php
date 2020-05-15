<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Forms;


class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Forms::all();
        return view('form.index')->with('forms', $forms);
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
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255']
        ]);
        
        // Create Form
        Forms::create([
            'name' => $request->input('name'),
            'url' => $request->input('url')
        ]);

        return redirect('/listofforms')->with('success', 'Form Created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Forms::find($id);
        return view('form.edit')->with('form', $form);
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
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255']
        ]);
        
        // Update Form
        $form = Forms::find($id);
        $form->name = $request->input('name');
        $form->url = $request->input('url');
        $form->save();

        return redirect('/listofforms')->with('success', 'Form Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = Forms::find($id);
        $form->delete();

        return redirect('/listofforms')->with('success', 'Form Deleted.');

    }
}
