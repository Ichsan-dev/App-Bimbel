<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class ApiKuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Question::get();
        return response()->json([
            'status'    => true,
            'message'   => 'Data ditemukan',
            'data'      => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Gunakan data yang telah didekode untuk menyimpan ke database
        $question = new Question();
        $question->question = $request->question;
        $question->answers = $request->answers;
        $question->correct_answer = $request->correct_answer;
        $question->save();


        return response()->json([
            'status' => true,
            'message' => 'Suskses memasukan data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Question::find($id);
        if($data){
            return response()->json([
                'status'    => true,
                'message'   => 'Data ditemukan',
                'data'      => $data
            ], 200);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Data tidak ditemukan',

            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
