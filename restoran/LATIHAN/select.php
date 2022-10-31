<div style="margin:auto; width: 1000px;">

<h3><a href="http://localhost/rpl/php%20mysql%2017-22/restoran/kategori/insert.php">TAMBAH DATA</a></h3>

<?php 
    require_once "../function.php";

    if (isset($_GET['ubah'])) {
        $id=$_GET['ubah'];
        require_once 'update.php';
    }

    if (isset($_GET['hapus'])) {
        $id=$_GET['hapus'];
        require_once 'delete.php';
    }

    $sql = "SELECT idkategori FROM tblkategori";
    $result = mysqli_query($koneksi,$sql);
    $jumblahdata = mysqli_num_rows($result);

    $banyak = 3;

    $halaman =ceil($jumblahdata / $banyak);
    for ($i=1; $i <= $halaman; $i++) { 
        echo '<a href="?p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp'; //untuk memberi spasi
    }
    echo '<br><br>';

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai =  ($p * $banyak) - $banyak;
    }else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM tblkategori LIMIT $mulai,$banyak";
    $result = mysqli_query($koneksi,$sql);
    $jumblah = mysqli_num_rows($result);

    echo '
        <table border="1px">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Hapus Data</th>
            <th>Ubah Data</th>
        </tr>
    ';

    $no=$mulai+1; //+1 untk memulai dri angka 1
    if ($jumblah > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>'.$no++.'<br>';
            echo '<td>'.$row['kategori'].'<br>';
            echo '<td><a href="?hapus='.$row['idkategori'].'">'.'Hapus'.'</a></td>';
            echo '<td><a href="?ubah='.$row['idkategori'].'">'.'Ubah'.'</a></td>';
            echo '<tr>';
        }
    }

    echo '</table>';
?>

</div>
