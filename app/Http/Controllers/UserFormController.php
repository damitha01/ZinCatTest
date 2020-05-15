<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Forms;
use App\UserForms;

class UserFormController extends Controller
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
        $dataArray = array();

        $forms = Forms::all();
        $dataArray['forms'] = $forms;

        $users = User::whereNotIn('id', [1])->get();

        foreach($users as &$user){ 
            foreach($user->forms as &$form){ 
                $user->myforms = $form; 
                $form->userformId = UserForms::select('id')->where(['user_id'=>$user->id,'forms_id'=>$form->id])->get();
            }
        }
        
        $dataArray['users'] = $users;
        
// echo \json_encode($dataArray);
        return view('userforms.index')->with($dataArray);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \App\User::find($request->input('user'));

        $user->forms()->syncWithoutDetaching($request->input('forms'));

        return redirect('/userforms')->with('success', 'User Forms Added.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userform = UserForms::find($id);
        $userform->delete();

        return redirect('/userforms')->with('success', 'User Form Deleted.');

    }
}
