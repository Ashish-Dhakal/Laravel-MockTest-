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

    // public function submit(Request $request)
    // {
    //     // Get the user's answers from the request
    //     $userAnswers = $request->input('answers');
    
    //     // Fetch all the questions based on the order they were presented (assuming same order as on form)
    //     $questionIds = array_keys($userAnswers);
    //     $questions = Question::whereIn('id', $questionIds)->orderByRaw("FIELD(id, " . implode(',', $questionIds) . ")")->get();
    
    //     // Prepare an array to store the result
    //     $results = [];
    
    //     foreach ($questions as $question) {
    //         $userAnswer = $userAnswers[$question->id]; // User's answer for this question
    //         $isCorrect = $userAnswer === $question->correct_answer; // Compare user's answer with the correct answer
    
    //         // Store the result including the options
    //         $results[] = [
    //             'question' => $question->question,
    //             'options' => $question->options, // Ensure 'options' is available
    //             'user_answer' => $userAnswer,
    //             'correct_answer' => $question->answer,
    //             'is_correct' => $isCorrect,
    //             'reason' => $question->reason,
    //         ];
    //     }
    
    //     // Return the result view with the results in the original order
    //     return view('tests.result', ['results' => $results]);
    // }

    public function submit(Request $request)
{
    $questions = Question::whereIn('id', array_keys($request->input('answers')))->get();
    $userAnswers = $request->input('answers');
    
    $results = [];
    $correctCount = 0;

    foreach ($questions as $question) {
        $correctAnswer = $question->answer;
        $userAnswer = $userAnswers[$question->id];

        $data['results'][] = [
            'question' => $question->question,
            'options' => $question->options,
            'user_answer' => $userAnswer,
            'correct_answer' => $correctAnswer,
            'reason' => $question->reason,  // assuming this field holds the explanation
        ];

        // Count correct answers
        if ($userAnswer === $correctAnswer) {
            $correctCount++;
        }
    }

    // Calculate total score
    // $totalQuestions = count($questions);
    $totalQuestions =100 ;
    $data['score'] = ($correctCount / $totalQuestions) * 100;

    // Pass score and results to the view
    // return view('tests.result', compact('results', 'score'));
    return view('tests.result',$data);
}

    
    
    
}
