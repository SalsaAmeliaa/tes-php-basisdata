<?php
    include('./config.php');
    if ($_SESSION["login"] != TRUE){
        header('location:login-siswa.php');
    }

    echo"<div class='container'>";
    echo "Selamat Datang, " . $_SESSION["username"] . "<br>";
    echo "Anda sebagai :" . $_SESSION["role"];
    echo "-";
    echo "<a class='btn btn-secondary btn-sm' href='logout.php'>logout</a>";
    echo "<hr>";
    echo "<a class='btn btn-primary btn-sm' href='input-nilai-tambah.php'>Tambah Data</a>";
    echo "-";
    echo "<a class='btn btn-warning btn-sm' href='input-nilai-pdf.php'>Download PDF</a>";
    echo "<hr>";

    // READ - Menampilkan data diri dari database
    $tabledata = "";
    $data = mysqli_query($mysqli,"SELECT * FROM nilai ");
    while($row = mysqli_fetch_array($data)){

        $nilai_akhir=(
            $row["nilai_kehadiran"] +
            $row ["nilai_tugas"] + 
            $row["nilai_uts"] + 
            $row["nilai_uas"])/4;
        $tabledata .= "
            <tr>
                <td>".$row["nis"]."</td>
                <td>".$row["nama_lengkap"]."</td>
                <td>".$row["kelas"]."</td>
                <td>".$row["nilai_kehadiran"]."</td>
                <td>".$row["nilai_tugas"]."</td>
                <td>".$row["nilai_uts"]."</td>
                <td>".$row["nilai_uas"]."</td>
                <td>".$nilai_akhir."</td>
                <td>
                    <a class='btn btn-success btn-sm' href='input-nilai-edit.php?nis=".$row["nis"]."'>Edit</a>
                    &nbsp;-&nbsp;
                    <a class='btn btn-danger btn-sm' href='input-nilai-hapus.php?nis=".$row["nis"]."' onclick='return confirm_delete(/'Yakin Dek?=".$row["nis"]."'>Hapus</a>
                </td>
            </tr>
        ";
        
    }

    echo "
        <table class='table table-dark table-bordered table-striped'>
            <tr>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Kelas</th>
                <th>Nilai Kehadiran</th>
                <th>Nilai Tugas</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Aksi</th>
            </tr>
            $tabledata
        </table>
    ";
?>