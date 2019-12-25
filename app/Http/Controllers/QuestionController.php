<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Question::paginate(18);

        return view('admin.add_question', compact('shares'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get the  assesment_id of title
        $reverse = $request->input('reverse');
        if($reverse==''){
            $reverse='0';
        }

        $question = new Question([
            'assesment_id' => $request->input('assesment_id'),
            'question_name' => $request->input('question_name'),
            'cluster' => $request->input('cluster'),
            'adt' => $request->input('adt'),
            'sub_cluster' => $request->input('sub_cluster'),
            'trait_type' => $request->input('trait_type'),
            'reverse' =>$reverse ,

        ]);
        $question->save();
       return redirect('/create_question')->with('status', 'Assesment has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('admin.show_question',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('admin.edit_question',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return redirect()->route('questions.index')
            ->with('status','Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')
            ->with('status','Question deleted successfully');
    }
}
