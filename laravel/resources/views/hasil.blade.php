<!DOCTYPE html>
<html>
<head>
    <title>Hasil Gambar</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        h2 {
            color: #2c3e50;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
            text-align: center;
            width: 100%;
        }
        
        .image-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        
        img {
            max-width: 100%;
            max-height: 70vh;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            object-fit: contain;
        }
        
        .action-buttons {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .btn {
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-download {
            background-color: #3498db;
            color: white;
            border: 2px solid #3498db;
        }
        
        .btn-download:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        
        .btn-back {
            color: #3498db;
            border: 2px solid #3498db;
            background-color: transparent;
        }
        
        .btn-back:hover {
            background-color: #f8f9fa;
        }
        
        .btn-icon {
            margin-right: 8px;
            font-size: 1.1em;
        }
        
        @media (max-width: 600px) {
            .action-buttons {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h2>Hasil Gambar</h2>

    <div class="image-container">
        <img src="{{ asset('gambar_hasil/' . $file) }}" alt="Hasil Gambar">
    </div>

    <div class="action-buttons">
        <a href="{{ asset('gambar_hasil/' . $file) }}" download class="btn btn-download">
            <span class="btn-icon"></span> Download Gambar
        </a>
        <a href="{{ route('upload') }}" class="btn btn-back">
            <span class="btn-icon">←</span> Kembali ke Upload
        </a>
    </div>
</body>
</html>