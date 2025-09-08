<?php
function tambah($a, $b) { return $a + $b; }
function kurang($a, $b) { return $a - $b; }
function kali($a, $b)   { return $a * $b; }
function bagi($a, $b)   { return $b != 0 ? $a / $b : "Error: Tidak bisa dibagi 0"; }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $op = $_POST['operasi'];

    if ($op == "tambah") $hasil = tambah($angka1, $angka2);
    elseif ($op == "kurang") $hasil = kurang($angka1, $angka2);
    elseif ($op == "kali") $hasil = kali($angka1, $angka2);
    elseif ($op == "bagi") $hasil = bagi($angka1, $angka2);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator PHP</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #121212;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #1e1e1e;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0px 6px 20px rgba(0,0,0,0.6);
            width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #00ffcc;
        }
        input, select, button {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 10px;
            border: none;
            font-size: 16px;
        }
        input, select {
            background: #2a2a2a;
            color: #fff;
        }
        button {
            background: #00ffcc;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #00cca3;
        }
        .hasil {
            margin-top: 20px;
            background: #000;
            color: #0f0;
            padding: 15px;
            border-radius: 10px;
            font-size: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🧮 Funcition Kalkulator</h2>
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
