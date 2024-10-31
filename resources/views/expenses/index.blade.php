<!DOCTYPE html>
<html>
<head>
    <title>ExpenseEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body {
            background: url('/images/background.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #fff;
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }
        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        td {
            background-color: #f9f9f9;
        }
        .actions {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }
        .btn {
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            border: none;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn-edit {
            background-color: #f0ad4e;
        }
        .btn-delete {
            background-color: #d9534f;
        }
        .btn:hover {
            opacity: 0.9;
        }
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }
            .btn {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ExpenseEase</h1>
        <div class="actions">
            <a href="{{ route('expenses.create') }}" class="btn"><i class="fas fa-plus"></i> Tambah Pengeluaran</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                    <tr>
                        <td>{{ $expense->category }}</td>
                        <td class="amount">{{ number_format($expense->amount, 2, ',', '.') }}</td>
                        <td>{{ $expense->description }}</td>
                        <td>{{ $expense->date }}</td>
                        <td>
                            <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-edit" onclick="return confirm('Apakah Anda yakin ingin mengedit pengeluaran ini?')"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengeluaran ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" data-toggle="tooltip" title="Hapus Pengeluaran"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $('.amount').each(function() {
                let value = parseFloat($(this).text().replace(/\D/g, ''));
                $(this).text(value.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
            });
        });
    </script>
</body>
</html>
