<!DOCTYPE html>
<html>
<head>
    <title>Upload Gambar</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
        }
        
        h3 {
            color: #2c3e50;
            margin-top: 40px;
        }
        
        form {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }
        
        select, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        select {
            cursor: pointer;
        }
        
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }
        
        button:hover {
            background-color: #2980b9;
        }
        
        hr {
            border: 0;
            height: 1px;
            background: #ddd;
            margin: 40px 0;
        }
        
        ul {
            list-style-type: none;
            padding: 0;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        
        li {
            padding: 10px 15px;
            border-bottom: 1px solid #eee;
            transition: background-color 0.2s;
        }
        
        li:last-child {
            border-bottom: none;
        }
        
        li:hover {
            background-color: #f8f9fa;
        }
        
        a {
            color: #3498db;
            text-decoration: none;
        }
        
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Upload Gambar</h2>
    <form action="{{ route('proses') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Pilih Tipe Proses:</label>
        <select name="tipe" required>
            <option value="grayscale">Grayscale</option>
            <option value="biner">Biner</option>
            <option value="negatif">Negatif</option>
        </select>

        <label>Pilih Gambar:</label>
        <input type="file" name="gambar" required>

        <button type="submit">Proses Gambar</button>
    </form>

    <hr>

    <h3>Riwayat Pengolahan Gambar</h3>
    <ul>
        @foreach ($riwayat as $item)
            <li>{{ $item->tipe_proses }} - <a href="{{ route('hasil', $item->nama_file) }}" target="_blank">{{ $item->nama_file }}</a></li>
        @endforeach
    </ul>
</body>
</html>