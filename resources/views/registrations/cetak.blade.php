<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .card {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .card-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card-body {
            margin-bottom: 20px;
        }

        .info-row {
            margin-bottom: 10px;
        }

        .info-label {
            font-weight: bold;
        }

        .card-footer {
            text-align: center;
            font-size: 14px;
            border-top: 1px solid #333;
            padding-top: 10px;
            margin-top: 10px;
        }

        /* Print Styles */
        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .card {
                border: 2px solid #000;
                box-shadow: none;
            }

            .card-footer {
                border-top: 1px solid #000;
            }
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">
            Kartu Peminjaman Buku
        </div>

        <div class="card-body">
            <div class="info-row">
                <span class="info-label">ID Peminjaman:</span>
                <span>{{ $peminjaman->id }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Nama:</span>
                <span>{{ $user->name }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email:</span>
                <span>{{ $user->email }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">No. Telepon:</span>
                <span>{{ $peminjaman->no_telepon }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Alamat:</span>
                <span>{{ $peminjaman->alamat }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Buku:</span>
                <span>{{ $peminjaman->book->judul }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Tanggal Pinjam:</span>
                <span>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d-m-Y') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Tanggal Kembali:</span>
                <span>{{ $peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d-m-Y') : '-' }}</span>
            </div>
        </div>

        <div class="card-footer">
            Perpustakaan Umum - {{ now()->format('Y') }} <br>
            Harap membawa kartu ini saat pengembalian buku.
        </div>
    </div>

</body>
</html>
