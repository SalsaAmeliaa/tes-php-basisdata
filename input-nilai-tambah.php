<h1>Tambah Data</h1>
<form action="input-nilai-tambah.php" method="POST">
    <label for="nis">Nomor Induk Siswa :</label><br>
    <input class="form-control" type="number" name="nis" placeholder="Ex.12003456"/><br>

    <label for="nama_lengkap">Nama Lengkap :</label><br>
    <input class="form-control" type="text" name="nama_lengkap" placeholder="Ex.Kharisya"/><br>

    <label for="kelas">Kelas :</p>
    <input class="form-control" type="text" name="kelas"/><br>

    <label for="nilai_kehadiran">Nilai Kehadiran</label><br>
    <input type="number" name="nilaikehadiran" placeholder="Ex.99.99" /><br>
    <label for="nilai_tugas">Nilai Tugas</label><br>
    <input type="number" name="nilaitugas" placeholder="Ex.99.99" /><br>
    <label for="nilai_uts">Nilai UTS</label><br>
    <input type="number" name="nilaiuts" placeholder="Ex.99.99" /><br>
    <label for="nilai_uas">Nilai UAS</label><br>
    <input type="number" name="nilaiuas" placeholder="Ex.99.99" /><br>
    <input class="btn btn-success btn-sm" type="submit" name="simpan" value="Simpan Data"/>
    <a class="btn btn-secondary btn-sm" href="input-nilai.php">Kembali</a><br>
    
</form>

<?php
    include('./config.php');
    if($_SESSION["login"]!= TRUE) {
        header('location:login-siswa.php');
    }
    if ( $_SESSION["role"] != "walas" ) {
        echo "
            <script>
                alert('Akses tidak diberikan, kamu bukan walas');
                window.location='input-nilai.php';
            </script>
        ";
    }
    if( isset($_POST["simpan"]) ){
        $nis = $_POST["nis"];
        $namalengkap = $_POST["nama_lengkap"];
        $kelas = $_POST["kelas"];
        $nilaikehadiran = $_POST["nilaikehadiran"];
        $nilaitugas = $_POST["nilaitugas"];
        $nilaiuts = $_POST["nilaiuts"];
        $nilaiuas = $_POST["nilaiuas"];
        // CREATE - Menambahkan Data ke Database
        $query = "
                INSERT INTO nilai VALUES
                ('$nis', '$namalengkap', '$kelas',  '$nilaikehadiran', '$nilaitugas', '$nilaiuts', '$nilaiuas');
        ";
        
        $insert = mysqli_query($mysqli, $query);

        if ($insert){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    window.location='input-nilai.php';
                </script>
            ";
        }
    }