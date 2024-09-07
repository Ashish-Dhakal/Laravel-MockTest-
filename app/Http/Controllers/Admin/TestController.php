<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        // $data['questions'] = Question::get();
        $data['questions'] = Question::inRandomOrder()->limit(100)->get();
        return view('tests.test', $data);
    }

    // TestController.php

    public function submit(Request $request)
    {
        // dd($request->all());
        $questions = Question::all(); // Fetch all questions
        $userAnswers = $request->input('answers');
        $correctAnswers = $request->input('correct_answers');

        // Calculate the results
        $results = [];
        foreach ($questions as $question) {
            $questionId = $question->id;
            $userAnswer = $userAnswers[$questionId] ?? null;
            $correctAnswer = $correctAnswers[$questionId];

            $results[] = [
                'question' => $question->question,
                'options' => $question->options,
                'user_answer' => $userAnswer,
                'correct_answer' => $correctAnswer,
            ];
        }

        // Pass the results to the view
        return view('test.results', compact('results'));
    }
}
