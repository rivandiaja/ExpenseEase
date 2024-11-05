@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pengeluaran</h1>
    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="category">Kategori:</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ $expense->category }}" required>
        </div>
        <div class="form-group">
            <label for="amount">Jumlah:</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $expense->amount }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea class="form-control" id="description" name="description">{{ $expense->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="date">Tanggal:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $expense->date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Pengeluaran</button>
    </form>
</div>
@endsection
