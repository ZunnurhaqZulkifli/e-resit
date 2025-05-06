<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resit Bayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            width: 70%;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        th {
            text-align: center;
        }

        .form-input {
            margin: 20px 0;
        }

        .print-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn-print, .btn-email {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: 0 10px;
        }

        .btn-print:hover, .btn-email:hover {
            background-color: #45a049;
        }

        .btn-email {
            background-color: #2196F3;
        }

        .btn-email:hover {
            background-color: #0b79d0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>KELAB SUKAN DAN KEBAJIKAN</h1>
        <h2>RESIT BAYARAN TUNAI</h2>

        <table>
            <thead>
                <tr>
                    <th>Bil</th>
                    <th>Senarai Keperluan</th>
                    <th>Harga (RM)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>
                        <select>
                            <option selected>Senarai Pelajar Latihan & Asrama</option>
                        </select>
                    </td>
                    <td>RM 451.00</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>
                        <select>
                            <option selected>Dobi + Buku Outing</option>
                        </select>
                    </td>
                    <td>RM 81.00</td>
                </tr>
                <tr>
                    <td colspan="2">JUMLAH KESELURUHAN</td>
                    <td>RM 532.00</td>
                </tr>
            </tbody>
        </table>

        <div class="form-input">
            <label for="diterima-oleh">Diterima oleh:</label>
            <input type="text" id="diterima-oleh" name="diterima-oleh" style="width: 100%; padding: 8px;">
        </div>

        <div class="print-button">
            <button class="btn-print" onclick="printReceipt()">Print Resit</button>
            <button class="btn-email" onclick="sendReceipt()">Hantar ke Email</button>
        </div>
    </div>

    <script>
        function printReceipt() {
            window.print();
        }

        function sendReceipt() {
            var email = prompt("Sila masukkan alamat emel penerima:");
            if (email) {
                // Perlu menggunakan API atau backend untuk menghantar emel
                alert("Resit akan dihantar ke " + email);
                // Anda boleh menggantikan kod ini dengan panggilan API sebenar untuk menghantar emel
            }
        }
    </script>
</body>
</html>
