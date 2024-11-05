<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class HomeController extends Controller
{
    public function index()
    {
        $expenses = Expense::where('user_id', auth()->id())->get();
        return view('home', compact('expenses'));
    }
}
