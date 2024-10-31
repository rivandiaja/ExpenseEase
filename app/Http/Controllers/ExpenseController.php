<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
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
            'user_id' => auth()->id(), // Ensure user_id is assigned
        ]);

        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil ditambahkan');
    }

    public function index()
    {
        $expenses = Expense::where('user_id', auth()->id())->get();
        return view('expenses.index', compact('expenses'));
    }

    public function edit($id)
    {
        $expense = Expense::where('user_id', auth()->id())->findOrFail($id);
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::where('user_id', auth()->id())->findOrFail($id);

        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $expense = Expense::where('user_id', auth()->id())->findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil dihapus');
    }
}
