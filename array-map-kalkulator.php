<?php
$operasi = [
    'tambah' => fn($a, $b) => $a + $b,
    'kurang' => fn($a, $b) => $a - $b,
    'kali'   => fn($a, $b) => $a * $b,
    'bagi'   => fn($a, $b) => $b != 0 ? $a / $b : "Error: Tidak bisa dibagi 0",
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $op = $_POST['operasi'];

    $hasil = $operasi[$op]($angka1, $angka2);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2); /* ungu modern */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0px 8px 25px rgba(0,0,0,0.25);
            width: 350px;
            text-align: center;
            transition: 0.3s;
        }
        .container:hover {
            transform: scale(1.02);
            box-shadow: 0px 12px 30px rgba(0,0,0,0.35);
        }
        h2 {
            margin-bottom: 20px;
            color: #444;
        }
        input, select, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 16px;
            transition: 0.3s;
        }
        input:focus, select:focus {
            border-color: #667eea;
            box-shadow: 0 0 8px rgba(102,126,234,0.5);
            outline: none;
        }
        button {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
        }
        .hasil {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 12px;
            color: #333;
            border-left: 6px solid #667eea;
            box-shadow: 0px 3px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Array Map Kalkulator</h2>
        <form method="post">
            <input type="number" name="angka1" placeholder="Masukkan angka pertama" required>
            <input type="number" name="angka2" placeholder="Masukkan angka kedua" required>
            <select name="operasi">
                <option value="tambah">Tambah (+)</option>
                <option value="kurang">Kurang (-)</option>
                <option value="kali">Kali (×)</option>
                <option value="bagi">Bagi (÷)</option>
            </select>
            <button type="submit">Hitung</button>
        </form>
        <?php if(isset($hasil)) echo "<div class='hasil'>Hasil: $hasil</div>"; ?>
    </div>
</body>
</html>
