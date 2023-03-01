<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
  public function create()
  {
    return view('quizzes.create');
  }
  public function store(Request $request)
  {

  }
}

