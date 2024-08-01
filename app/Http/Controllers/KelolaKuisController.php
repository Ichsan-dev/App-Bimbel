<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class KelolaKuisController extends Controller
{
    // Menampilkan semua pertanyaan
    public function index()
    {
        $questions = Question::all();
        return view('poinAkses/admin/KelolaKuis/index', compact('questions'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'question' => 'required',
            'answers' => 'required|array|min:1', // Pastikan jawaban merupakan array dengan minimal satu elemen
            'correct_answer' => 'required|integer|between:1,' . count($request->answers), // Jawaban benar harus dalam rentang 1 hingga jumlah jawaban yang diberikan
        ]);

        // Simpan pertanyaan ke dalam database
        $question = new Question();
        $question->question = $request->question;
        $question->answers = $request->answers;
        $question->correct_answer = $request->correct_answer;
        $question->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('KelolaKuis')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }   
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'question' => 'required',
            'answers' => 'required|array|min:1', // Memastikan answers merupakan array dengan minimal 1 elemen
            'answers.*' => 'required|string', // Memastikan setiap elemen dalam answers adalah string
            'correct_answer' => 'required|integer|min:1', // Pastikan correct_answer adalah integer dan minimal 1
        ]);

        $question->update([
            'question' => $request->question,
            'answers' => $request->answers,
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect()->route('KelolaKuis')->with('success', 'Pertanyaan berhasil diperbarui.');
    }


    // Menghapus pertanyaan dari database
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('KelolaKuis')->with('success', 'Pertanyaan berhasil dihapus.');
    }
}
