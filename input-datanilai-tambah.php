<div class='container'>
<h1>Tambah Data</h1>
<form action="input-datanilai-tambah.php" method="POST">
      <label for="nis">Nomor Induk Siswa :</label><br>
      <input class="form-control" type="number" name="nis" placeholder="Ex. 12100283" /><br>

      <label for="namalengkap">Nama Lengkap :</label><br>
      <input class="form-control" type="text" name="namalengkap" placeholder="Ex. Tasya" /><br>

      <label for="jk">Jenis Kelamin :</label><br>
      <input class="form-control" type="text" name="jk" placeholder="" /><br>

      <label for="kelas">Kelas :</label><br>
      <input class="form-control" type="text" name="kelas" placeholder="Ex. 11 RPL 1" /><br>

      <label for="nilai_kehadiran">Nilai Kehadiran:</label><br>
      <input class="form-control" type="number" name="nilai_kehadiran" placeholder="Ex. 80.56" /><br>

      <label for="nilai_tugas">Nilai Tugas:</label><br>
      <input class="form-control" type="number" name="nilai_tugas" placeholder="Ex. 80.56" /><br>

      <label for="nilai_pts">Nilai PTS:</label><br>
      <input class="form-control" type="number" name="nilai_pts" placeholder="Ex. 80.56" /><br>

      <label for="nilai_pas">Nilai PAS :</label><br>
      <input class="form-control" type="number" name="nilaipas" placeholder="Ex. 80.56" /><br>
      <br>
      <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" />
      <a class='btn btn-sm btn-secondary' href="input-datanilai.php">Kembali</a>
</form>
</div>

<?php
      include ('./input-config.php');
      if( $_SESSION["login"] !=TRUE) {
            header('location:login.php');
      }
      if( $_SESSION["role"] !="admin") {
            echo "
                  <script>
                        alert('Akses tidak diberikan, kamu bukan admin');
                        window.location='input-datanilai.php';
                  </script>
                  ";
      }

      if( isset($_POST["simpan"]) ){
            $nis = $_POST["nis"];
            $namalengkap = $_POST["namalengkap"];
            $jk = $_POST["jk"];
            $kelas = $_POST["kelas"];
            $nilai_kehadiran = $_POST["nilai_kehadiran"];
            $nilai_tugas = $_POST["nilai_tugas"];
            $nilai_pts = $_POST["nilai_pts"];
            $nilai_pas = $_POST["nilai_pas"];

            // CREATE - Menambahkan Data ke Database
            $query = "
                  INSERT INTO datanilai VALUES
                  ('$nis', '$namalengkap', '$jk', '$kelas', '$nilai_kehadiran', '$nilai_tugas', '$nilai_pts', '$nilai_pas');
            ";

           
            $insert = mysqli_query($mysqli, $query);

            if ($insert){
                  echo "
                        <script>
                              alert('Data berhasil ditambahkan');
                              window.location='input-datanilai.php';
                        </script>
                  ";
            }

      }
?>