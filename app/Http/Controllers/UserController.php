<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function welcome()
    {
        $category = Category::withCount('quizzes')->get();
        return view('welcome', ['categories' => $category]);
    }

    function usershowQuiz($id, $category)
    {
        $quiz = Quiz::Where('category_id', $id)->get();
        return view('user-quiz-list', ['quiz' => $quiz, 'category' => $category]);
    }

    function startQuiz($category)
    {
        return view('start-quiz', ['category' => $category]);
    }

    function userSignup(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required | min:3',
            'email' => 'required | email',
            'password' => 'required | min:6 | confirmed',
        ]);
    }
}
