<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $op = $_POST['operasi'];

    switch ($op) {
        case "tambah":
            $hasil = $angka1 + $angka2;
            break;
        case "kurang":
            $hasil = $angka1 - $angka2;
            break;
        case "kali":
            $hasil = $angka1 * $angka2;
            break;
        case "bagi":
            $hasil = $angka2 != 0 ? $angka1 / $angka2 : "Error: Tidak bisa dibagi 0";
            break;
        case "modulus":
            $hasil = $angka2 != 0 ? $angka1 % $angka2 : "Error: Tidak bisa modulus 0";
            break;
        case "pangkat":
            $hasil = pow($angka1, $angka2);
            break;
        default:
            $hasil = "Operasi tidak valid";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kalkulator Cyber</title>
<style>
    body {
        font-family: 'Consolas', monospace;
        background: radial-gradient(circle at top left, #0f2027, #203a43, #2c5364);
        color: #0ff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .container {
        background: rgba(20, 20, 20, 0.95);
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 0 25px #0ff, 0 0 50px #0ff inset;
        width: 380px;
        text-align: center;
    }
    h2 {
        color: #0ff;
        text-shadow: 0 0 10px #0ff, 0 0 20px #0ff;
        margin-bottom: 20px;
    }
    input, select, button {
        margin: 10px 0;
        padding: 12px;
        width: 90%;
        border-radius: 8px;
        border: none;
        font-size: 16px;
        background: #111;
        color: #0ff;
        outline: none;
        box-shadow: 0 0 10px #0ff inset;
    }
    select {
        cursor: pointer;
    }
    button {
        background: #0ff;
        color: #111;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        box-shadow: 0 0 15px #0ff, 0 0 30px #0ff;
    }
    button:hover {
        background: #00e5ff;
        box-shadow: 0 0 25px #0ff, 0 0 40px #0ff;
    }
    .hasil {
        margin-top: 20px;
        padding: 15px;
        background: #111;
        border-radius: 10px;
        font-weight: bold;
        color: #0f0;
        text-shadow: 0 0 10px #0f0, 0 0 20px #0f0;
        box-shadow: 0 0 20px #0f0 inset;
    }
</style>
</head>
<body>
    <div class="container">
        <h2>Switch Kalkulator</h2>
        <form method="post">
            <input type="number" name="angka1" placeholder="Masukkan angka pertama" required>
            <input type="number" name="angka2" placeholder="Masukkan angka kedua" required>
            <select name="operasi">
                <option value="tambah">Tambah (+)</option>
                <option value="kurang">Kurang (-)</option>
                <option value="kali">Kali (×)</option>
                <option value="bagi">Bagi (÷)</option>
                <option value="modulus">Modulus (%)</option>
                <option value="pangkat">Pangkat (^)</option>
            </select>
            <button type="submit">Hitung</button>
        </form>
        <?php if(isset($hasil)) echo "<div class='hasil'>Hasil: $hasil</div>"; ?>
    </div>
</body>
</html>
