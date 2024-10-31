<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengeluaran</title>
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
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            max-width: 600px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn {
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Pengeluaran</h1>
        <form action="{{ route('expenses.update', $expense->id) }}" method="POST" onsubmit="return confirmEdit()">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category">Kategori:</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ $expense->category }}" required>
            </div>
            <div class="form-group">
                <label for="amount">Jumlah:</label>
                <input type="text" class="form-control" id="amount" name="amount" value="{{ number_format($expense->amount, 0, ',', '.') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea class="form-control" id="description" name="description">{{ $expense->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="date">Tanggal:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $expense->date }}" required>
            </div>
            <button type="submit" class="btn btn-block">Simpan Perubahan</button>
        </form>
    </div>
    <script>
        function confirmEdit() {
            return confirm('Apakah Anda yakin ingin menyimpan perubahan pengeluaran ini?');
        }

        document.getElementById('amount').addEventListener('keyup', function (e) {
            let value = this.value.replace(/[^,\d]/g, '').toString();
            let split = value.split(',');
            let remainder = split[0].length % 3;
            let currency = split[0].substr(0, remainder);
            let thousands = split[0].substr(remainder).match(/\d{3}/gi);

            if (thousands) {
                let separator = remainder ? '.' : '';
                currency += separator + thousands.join('.');
            }

            this.value = currency + (split[1] ? ',' + split[1] : '');
        });
    </script>
</body>
</html>
