<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Mcq;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{

    function login(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where([
            'name' => $request->name,
            'password' => $request->password,
        ])->first();

        if ($admin) {
            Session::put('admin', $admin);
            return redirect('dashboard');
        } else {
            $validation = $request->validate(
                [
                    'user' => 'required',
                ],
                [
                    'user.required' => 'User does not exist!',
                ],
            );
        }
    }

    function dashboard()
    {
        $admin = Session::get('admin');
        if ($admin) {
            return view('admin', ['admin' => $admin->name]);
        } else {
            return redirect('admin-login');
        }
    }

    function categories()
    {
        $categories = Category::get();
        $admin = Session::get('admin');
        if ($admin) {
            return view('categories', ['admin' => $admin->name, 'categories' => $categories]);
        } else {
            return redirect('admin-login');
        }
    }

    function logout()
    {
        Session::forget('admin');
        return redirect('admin-login');
    }

    function addCategory(Request $request)
    {
        $validation = $request->validate(
            [
                'name' => 'required | min:3 | unique:categories,name',
            ],
            [
                'name.required' => 'Category name is required!',
                'name.min' => 'Category name must be at least 3 characters!',
            ],
        );

        $admin = Session::get('admin');
        $category = new Category();
        $category->name = $request->name;
        $category->creator = $admin->name;
        if ($category->save()) {
            Session::flash('success', 'Category ' . $request->name . ' added successfully!');
            return redirect('admin-categories');
        } else {
            Session::flash('error', 'error in adding category!');
            return redirect('admin-categories');
        }
    }

    function deleteCategory($id)
    {
        $isDelete = Category::find($id)->delete();
        if ($isDelete) {
            Session::flash('success', 'Category deleted successfully!');
            return redirect('admin-categories');
        } else {
            Session::flash('error', 'error in deleting category!');
            return redirect('admin-categories');
        }
    }

    function addQuiz(Request $request)
    {
        $categories = Category::get();
        $admin = Session::get('admin');
        $totalMcq = 0;
        if ($admin) {
            $quizName = $request->name;
            $category = $request->category;
            if ($quizName && $category && !Session::has('quizDetails')) {
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $category;
                if ($quiz->save()) {
                    Session::put('quizDetails', $quiz);
                }
            } else {
                $quiz = Session::get('quizDetails');
                $totalMcq = $quiz && Mcq::where('quiz_id', $quiz->id)->count();
            }
            return view('add-quiz', ['admin' => $admin->name, 'categories' => $categories, 'totalMcq' => $totalMcq]);
        }
    }

    function addMCQs(Request $request)
    {
        $request->validate([
            'question' => 'required | min:5',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'correct_ans' => 'required',
        ]);

        $quiz = Session::get('quizDetails');
        $admin = Session::get('admin');
        $mcq = new Mcq();
        $mcq->question = $request->question;
        $mcq->a = $request->a;
        $mcq->b = $request->b;
        $mcq->c = $request->c;
        $mcq->d = $request->d;
        $mcq->correct_ans = $request->correct_ans;

        $mcq->admin_id = $admin->id;
        $mcq->quiz_id = $quiz->id;
        $mcq->category_id = $quiz->category_id;

        if ($mcq->save()) {
            if ($request->add_more) {
                return redirect(URL::previous());
            } else {
                Session::forget('quizDetails');
                return redirect('add-quiz');
            }
        }
    }

    function  showmcqs($id) 
    {
        $admin = Session::get('admin');
        $quiz = Session::get('quizDetails');
        if ($quiz) {
            $mcqs = Mcq::where('quiz_id', $quiz->id)->get();
            return view('show-mcqs', ['admin' => $admin, 'mcqs' => $mcqs]);
        } else {
            $mcqs = Mcq::where('quiz_id', $id)->get();
            return view('show-mcqs', ['admin' => $admin, 'mcqs' => $mcqs]);
        }
    }

    function showQuiz($id, $category)
    {
        $quiz = Quiz::where('category_id', $id)->get();
        $admin = Session::get('admin');
        return view('show-quiz', ['quiz' => $quiz, 'admin' => $admin->name, 'category' => $category]);
    }

    function finish()
    {
        Session::forget('quizDetails');
        return redirect('add-quiz');
    }
}
