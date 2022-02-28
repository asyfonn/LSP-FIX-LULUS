<?php 
    require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata</title>
</head>
<!--Pilih data barang dengan combo box-->
<body>
    <h1> Pilih Wisata</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td> Pilih Wisata </td>
                <td>:</td>
                <td>

                    <select name="id" value="">
                        <?php
                        include "koneksi.php";
                        $sql = "SELECT * FROM tbl_wisata";
                        $hasil = mysqli_query($conn, $sql);

                        while ($data = mysqli_fetch_array($hasil)) {
                            $ket = "";
                            if (isset($_GET['id'])) {
                                $id = trim($_GET['id']);

                                if ($id == $data['id']) {
                                    $ket = "selected";
                                }
                            }
                        ?>

                            <option <?php echo $ket; ?> value="<?php echo $data['id']
                                                                ?>"> <?php echo $data['id']; ?>
                                - <?php echo $data['tempat']; ?>
                            </option>
                        <?php
                        }
                        ?>

                    </select>
                </td>
                <td>
                    <button type="submit" name="submit">Pilih</button>
                </td>
            </tr>
        </table>
        </from>

        <?php
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $sql = "SELECT * FROM tbl_wisata WHERE id = $id";
            $hasil = mysqli_query($conn, $sql);
            $data =  mysqli_fetch_assoc($hasil);
        }
        ?>
        <h2>Form Pemesanan</h2>
        <form action="">
            <table>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><input type="text" nama="nama_lengkap" value=""></td>
                </tr>
                <tr>
                    <td>Nomor Identitas</td>
                    <td>:</td>
                    <td><input type="text" nama="nomor_identitas" value=""></td>
                </tr>
                <tr>
                    <td>No.HP</td>
                    <td>:</td>
                    <td><input type="text" nama="no_hp" value=""></td>
                </tr>
                <tr>
                    <td>Nama Wisata</td>
                    <td>:</td>
                    <td><input type="text" id="tempat" nama="tempat" value="<?php if (isset($data['tempat'])) echo $data['tempat']; ?>"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td><input type="text" id="harga" nama="harga" value="<?php if (isset($data['harga'])) echo $data['harga']; ?>"></td>
                </tr>
                <tr>
                    <td>Tanggal Kunjungan</td>
                    <td>:</td>
                    <td><input type="date"  nama="kunjungan" value=""></td>
                </tr>
                <tr>
                    <td>Jumlah Pengunjung</td>
                    <td>:</td>
                    <td><input type="number" id="jumlahpengunjung" nama="Stok" value=""></td>
                </tr>
                <tr>
                    <td>Pengunjung Anak-Anak</td>
                    <td>:</td>
                    <td><input type="number" id="jumlahBarang" nama="Stok" value=""></td>
                </tr>
                <tr>
                    <td>Total Bayar</td>
                    <td>:</td>
                    <td><input type="text" id="total" nama="Stok" value=""></td>
                </tr>
            </table>
            <br>

            <button id="jumlah">Hitung Total Bayar</button>
            <input type="submit" name="PesanTiket" value="PesanTiket">
            <input type="submit" name="Cancel" value="Cancel">
        </form>

        <script>
            const jumlah = document.querySelector('form #jumlah')
            jumlah.onclick = (e) => {
                e.preventDefault();
                var bil1 = document.querySelector('form #harga').value;
                var bil2 = document.querySelector('form #jumlahpengunjung').value;
                var hasil = bil1 * bil2;

                document.querySelector('form #total').value = hasil;
            }
        </script>


</body>

</html>