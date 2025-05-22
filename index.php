<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="operasi-data-minuman.php" method="POST">
        <button type="submit" name="tambah-data">Minuman (+)</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Nama Minuman
                </th>
                <th>
                    Harga(Rp)
                </th>

                <th>
                    Aksi
                </th>

            </tr>
        </thead>

        <tbody>
            <?php
            require_once 'Minuman.php';
            $minuman = new Minuman();
            $dataMinuman = $minuman->getDataMinuman();
            foreach ($dataMinuman as $row) {
                echo "<tr>";
                echo "<td>" . $row['id_minuman'] . "</td>";
                echo "<td>" . $row['nama_minuman'] . "</td>";
                echo "<td>" . $row['harga_minuman'] . "</td>";

                echo "<td>";
                echo "<form action='operasi-data-minuman.php' method='POST'>";
                echo "<input type='hidden' name='id' value='" . $row['id_minuman'] . "'>";
                echo "<button type='submit' name='edit-data'>Edit (+)</button>";
                echo "</form>";
                echo "<form action='operasi-data-minuman.php' method='POST' onsubmit='return konfirmasiHapus();'>";
                echo "<input type='hidden' name='id' value='" . $row['id_minuman'] . "'>";
                echo "<button type='submit' name='hapus-data'>Hapus (-)</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>



    </table>

    <script>
        function konfirmasiHapus() {
            return confirm("Apakah Anda yakin ingin Menghapus?");
        }
    </script>
</body>

</html>