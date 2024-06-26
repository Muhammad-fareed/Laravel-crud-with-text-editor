<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Facade\FlareClient\View;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class FormController extends Controller
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
        return view('form.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required|numeric',
            'place' => 'required',
            'time' => 'required',
            'mood' => 'required',
            'experience' => 'required'
        ]);



        $result = Form::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'place' => $request->place,
            'time' => $request->time,
            'mood' => json_encode($request->mood),
            'experience' => $request->experience
        ]);

        return redirect()->route('show.data')->with('success', 'Car data saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form,Request $request)
    {
        $data=Form::all();
        return view('form.view-data',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form,$id)
    {
        $data_all=Form::all();
        $data_id=Form::find($id);
        return view('form.edit-data',compact('data_all','data_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form,$id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required|numeric',
            'place' => 'required',
            'time' => 'required',
            'mood' => 'required',
            'experience' => 'required'
        ]);

        $Form = Form::find($id);
        $Form->name = $request->name;
        $Form->email = $request->email;
        $Form->number= $request->number;
        $Form->place = $request->place;
        $Form->time = $request->time;
        $Form->mood = $request->mood;
        $Form->experience = $request->experience;
        $Form->update();
        return redirect()->route('show.data')->with('success', 'Car data saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form,$id)
    {
        $deleted=Form::find($id)->delete();
        return back()->with('success', 'Car data Deleted successfully.');;
    }
}
