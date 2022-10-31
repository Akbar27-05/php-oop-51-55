<?php 
    $email=$_SESSION['pelanggan'];
    $jumblahdata = $db->rowCOUNT("SELECT idorder FROM vorder WHERE email = '$email'");
    $banyak = 4;

    $halaman =ceil($jumblahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai =  ($p * $banyak) - $banyak;
    }else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM vorder WHERE email = '$email' ORDER BY tglorder DESC LIMIT $mulai,$banyak";
    $row = $db->getALL($sql);

    $no=1+$mulai;
?>

<h3>Histori Pembelian</h3>
<table class="table table-bordered w-70 mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Tgl. Order</th>
            <th>Total</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)){?>
        <?php foreach ($row as $r): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['tglorder']?></td>
            <td><?php echo $r['total']?></td>
            <td><a href="?f=home&m=detail&id=<?php echo $r['idorder']?>">Detail</a></td>
        </tr>
        <?php endforeach ?>
        <?php }else{ echo "<h6>Kategori Belum Ada, Tambahkan Kategori!</h6>";}?>
    </tbody>
</table>

<?php 
    for ($i=1; $i <= $halaman; $i++) { 
        echo '<a href="?f=home&m=histori&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }
?>