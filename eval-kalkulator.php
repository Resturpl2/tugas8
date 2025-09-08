<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ekspresi'])) {
    $ekspresi = $_POST['ekspresi'];
    if (preg_match('/^[0-9+\-*\/(). ]+$/', $ekspresi)) {
        $hasil = @eval("return $ekspresi;");
    } else {
        $hasil = "Error";
    }
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
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .calc {
        background: #222;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.4);
        width: 300px;
    }
    .screen {
        background: #000;
        color: #0f0;
        font-size: 24px;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 15px;
        text-align: right;
        overflow-x: auto;
    }
    .buttons {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
    }
    button {
        padding: 15px;
        font-size: 18px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        background: #333;
        color: white;
        transition: 0.3s;
    }
    button:hover {
        background: #555;
    }
    .equal {
        background: #4CAF50;
        grid-column: span 2;
    }
    .clear {
        background: #f44336;
    }
</style>
</head>
<body>
    <div class="calc">
        <form method="post" id="calcForm">
            <div class="screen" id="display"><?php echo isset($hasil) ? $hasil : ''; ?></div>
            <input type="hidden" name="ekspresi" id="ekspresi">
            <div class="buttons">
                <button type="button" onclick="tambah('7')">7</button>
                <button type="button" onclick="tambah('8')">8</button>
                <button type="button" onclick="tambah('9')">9</button>
                <button type="button" onclick="tambah('/')">÷</button>

                <button type="button" onclick="tambah('4')">4</button>
                <button type="button" onclick="tambah('5')">5</button>
                <button type="button" onclick="tambah('6')">6</button>
                <button type="button" onclick="tambah('*')">×</button>

                <button type="button" onclick="tambah('1')">1</button>
                <button type="button" onclick="tambah('2')">2</button>
                <button type="button" onclick="tambah('3')">3</button>
                <button type="button" onclick="tambah('-')">-</button>

                <button type="button" onclick="tambah('0')">0</button>
                <button type="button" onclick="tambah('.')">.</button>
                <button type="button" onclick="tambah('+')">+</button>
                <button type="button" class="clear" onclick="clearDisplay()">C</button>

                <button type="submit" class="equal">=</button>
            </div>
        </form>
    </div>

<script>
    let display = document.getElementById("display");
    let ekspresi = document.getElementById("ekspresi");

    function tambah(val) {
        display.innerText += val;
        ekspresi.value = display.innerText;
    }
    function clearDisplay() {
        display.innerText = "";
        ekspresi.value = "";
    }
</script>
</body>
</html>
