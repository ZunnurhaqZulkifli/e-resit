<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Pelajar</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
        }

        /* Container for the content */
        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: #ffffff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            overflow: hidden;
        }

        /* Responsive table */
        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #ffffff;
        }

        .table th, .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
            text-align: center;
        }

        .table td {
            font-size: 16px;
            text-align: center;
        }

        /* Styling for the form */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            font-weight: bold;
            color: #333333;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Button styling */
        .submit-button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #2ecc71;
            color: #ffffff;
            text-align: center;
            border: none;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .submit-button:hover {
            background-color: #27ae60;
        }

        /* Caption for receipt */
        .text-left.new-caption {
            font-size: 20px;
            color: #3498db;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Responsive table rows */
        @media (max-width: 768px) {
            .table th, .table td {
                padding: 12px 8px;
                font-size: 14px;
            }
        }

    </style>
</head>
<body>

    <!-- Main Container -->
    <div class="container">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" placeholder="Masukkan Nama" required>
        </div>
        <div class="form-group">
            <label for="ndp">No. NDP:</label>
            <input type="text" id="ndp" name="ndp" placeholder="Masukkan No. NDP" required>
        </div>
        <div class="form-group">
            <label for="sesi">Sesi:</label>
            <select id="sesi" name="sesi">
                <option value="1">Sesi 1</option>
                <option value="2">Sesi 2</option>
                <option value="3">Sesi 3</option>
            </select>
        </div>
        <div class="form-group">
            <label for="semester">Semester:</label>
            <select id="semester" name="semester">
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3">Semester 3</option>
            </select>
        </div>

        <!-- Table for payment details -->
        <div class="table-responsive">
            <table class="table">
                <caption class="text-left new-caption">RESIT BAYARAN TUNAI</caption>
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Senarai Keperluan</th>
                        <th>Harga (RM)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <select>
                                <option value="Senarai Pelajar Latihan dan Asrama">Senarai Pelajar Latihan & Asrama</option>
                                <option value="-">-</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value="RM 451.00">RM 451.00</option>
                                <option value="-">-</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <select>
                                <option value="Dobi + Buku Outing">Dobi + Buku Outing</option>
                                <option value="-">-</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value="RM 81.00">RM 81.00</option>
                                <option value="-">-</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><strong>JUMLAH</strong></td>
                        <td>
                            <select>
                                <option value="RM 532.00">RM 532.00</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Submit Button -->
        <button class="submit-button">Submit</button>
    </div>

</body>
</html>