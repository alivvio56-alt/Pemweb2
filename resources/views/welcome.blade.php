<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Pemrograman Web II</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            font-size: 2em;
            border-bottom: 3px solid #667eea;
            padding-bottom: 20px;
        }

        .info-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .info-item {
            margin: 15px 0;
            font-size: 1.1em;
        }

        .info-item strong {
            color: #667eea;
            display: inline-block;
            width: 100px;
            text-align: left;
        }

        .info-item span {
            color: #555;
            font-weight: 500;
        }

        .footer {
            margin-top: 30px;
            color: #999;
            font-size: 0.9em;
        }

        .badge {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85em;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎓 Praktikum Pemrograman Web II</h1>
        
        <div class="info-box">
            <div class="info-item">
                <strong>Nama:</strong>
                <span>Ardhis Alivio</span>
            </div>
            <div class="info-item">
                <strong>NIM:</strong>
                <span>H1H024031</span>
            </div>
            <div class="info-item">
                <strong>Program Studi:</strong>
                <span>Teknik Komputer</span>
            </div>
        </div>

        <div class="badge">Framework: Laravel 13</div>

        <div class="footer">
            <p>Modul 1: Penyiapan Lingkungan Pengembangan</p>
            <p>© 2026 UNSOED Purbalingga</p>
        </div>
    </div>
</body>
</html>