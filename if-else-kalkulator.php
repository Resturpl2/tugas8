<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka = explode(",", $_POST['angka']); // pisah input jadi array angka
    $angka = array_map('floatval', $angka); // ubah ke number
    $op = $_POST['operasi'];

    switch ($op) {
        case "tambah":
            $hasil = array_sum($angka); // jumlah semua angka
            break;
        case "kurang":
            $hasil = array_shift($angka); 
            foreach ($angka as $a) { $hasil -= $a; }
            break;
        case "kali":
            $hasil = array_product($angka); // kali semua angka
            break;
        case "bagi":
            $hasil = array_shift($angka);
            foreach ($angka as $a) {
                if ($a == 0) { $hasil = "Error: Tidak bisa dibagi 0"; break; }
                $hasil /= $a;
            }
            break;
        case "rata":
            $hasil = array_sum($angka) / count($angka);
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
    <title>Kalkulator Multi Angka</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #36d1dc, #5b86e5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            width: 400px;
            text-align: center;
        }
        input, select, button {
            margin: 10px 0;
            padding: 10px;
            width: 90%;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        button {
            background: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #45a049;
        }
        .hasil {
            margin-top: 15px;
            padding: 15px;
            background: #f3f3f3;
            border-radius: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>If Else Kalkulator</h2>
        <form method="post">
            <input type="text" name="angka" placeholder="Masukkan angka, pisahkan dengan koma (cth: 10,20,30)" required>
            <select name="operasi">
                <option value="tambah">Tambah</option>
                <option value="kurang">Kurang</option>
                <option value="kali">Kali</option>
                <option value="bagi">Bagi</option>
                <option value="rata">Rata-rata</option>
            </select>
            <button type="submit">Hitung</button>
        </form>
        <?php if(isset($hasil)) echo "<div class='hasil'>Hasil: $hasil</div>"; ?>
    </div>
</body>
</html>
