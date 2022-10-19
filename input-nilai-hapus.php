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

    if ( isset($_GET["nis"]) && $_SESSION["role"] == "walas" ){
        $nis = $_GET["nis"];

            //DELETE - Menghapus Data 

        $query = "
            DELETE FROM nilai
            WHERE nis = '$nis';
        ";
        
        $delete = mysqli_query($mysqli, $query);

        if ($delete){
            echo "
                <script>
                alert('Data berhasil dihapus');
                window.location='input-nilai.php';
                </script>
            ";
        }else{
            echo " 
            <script>
            alert('Data berhasil dihapus');
            window.location='input-nilai.php';
            </script>
        ";
            
        }
          }

?>