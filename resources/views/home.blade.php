@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Tampilan Utama</h1>
        <a href="{{ route('expenses.create') }}" class="btn btn-primary">Tambah Pengeluaran</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">Data Pengeluaran</div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Perubahan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expenses as $expense)
                        <tr>
                            <td>{{ $expense->category }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td>{{ $expense->description }}</td>
                            <td>{{ $expense->date }}</td>
                            <td>
                                <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">About ExpenseEase</div>
        <div class="card-body">
            <p>ExpenseEase is your personal finance tracker, helping you manage your money better. Track expenses, set budgets, and achieve financial goals with ease.</p>
            <h5>Features:</h5>
            <ul>
                <li>Expense Tracking</li>
                <li>Budget Management</li>
                <li>Financial Goals</li>
                <li>Detailed Reports</li>
                <li>Secure and Private</li>
            </ul>
        </div>
    </div>
</div>
@endsection
