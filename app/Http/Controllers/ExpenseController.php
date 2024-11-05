<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::where('user_id', auth()->id())->get();
        return view('home', compact('expenses'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        Expense::create([
            'category' => $request->category,
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $expense = Expense::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $expense = Expense::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $expense = Expense::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil dihapus');
    }
}
