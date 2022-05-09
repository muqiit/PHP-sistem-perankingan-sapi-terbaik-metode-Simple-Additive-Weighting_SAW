<html>
    <header>
        <title>Ranking Sapi Terbaik</title>
    </header>
    <body>
        

        <h3>Nilai Tertinggi</h3>
        <table border=1px>
                <tr>
                    <td>Berat/Tinggi</td>
                    <td>Bentuk Kaki</td>
                    <td>Warna Mata</td>
                    <td>Kesehatan</td>
                </tr>
                <?php
                include "koneksi.php";
                $sql1 = mysqli_query($connect, "SELECT MAX(kri_1) as berat FROM tbl_alternatif");
                $data1 = mysqli_fetch_array($sql1); 
                $berat = $data1['berat'];
                
                $sql2 = mysqli_query($connect, "SELECT MAX(kri_2) as kaki FROM tbl_alternatif");
                $data2 = mysqli_fetch_array($sql2); 
                $kaki = $data2['kaki'];

                $sql3 = mysqli_query($connect, "SELECT MAX(kri_3) as mata FROM tbl_alternatif");
                $data3 = mysqli_fetch_array($sql3); 
                $mata = $data3['mata'];

                $sql4 = mysqli_query($connect, "SELECT MAX(kri_4) as sehat FROM tbl_alternatif");
                $data4 = mysqli_fetch_array($sql4); 
                $sehat = $data4['sehat'];

                    echo "<tr>";
                    echo "<td>".$berat."</td>";
                    echo "<td>".$kaki."</td>";
                    echo "<td>".$mata."</td>";
                    echo "<td>".$sehat."</td>";
                    echo "</tr>";
            ?>
        </table>

        <h2>Normalisasi</h2>
        <table border=1px>
                <tr>
                    <td>No</td>
                    <td>Berat/Tinggi</td>
                    <td>Bentuk Kaki</td>
                    <td>Warna Mata</td>
                    <td>Kesehatan</td>
                </tr>
                <?php
                    function format_decimal($value)
                    {
                        return round($value, 4);
                    }
                    function bagi($satu, $dua)
                    {
                        $hasil = $satu / $dua;
                         return format_decimal($hasil);    
                    }
                    $sql5 = mysqli_query($connect, "SELECT * FROM tbl_alternatif");
                    
                    $sql6 = mysqli_query($connect, "SELECT MAX(kri_1) as berat_all FROM tbl_alternatif");
                    $data6 = mysqli_fetch_array($sql6); 
                    $berat_all = $data6['berat_all'];

                    $sql7 = mysqli_query($connect, "SELECT MAX(kri_2) as kaki_all FROM tbl_alternatif");
                    $data7 = mysqli_fetch_array($sql7); 
                    $kaki_all = $data7['kaki_all'];

                    $sql8 = mysqli_query($connect, "SELECT MAX(kri_3) as mata_all FROM tbl_alternatif");
                    $data8 = mysqli_fetch_array($sql8); 
                    $mata_all = $data8['mata_all'];

                    $sql9 = mysqli_query($connect, "SELECT MAX(kri_4) as sehat_all FROM tbl_alternatif");
                    $data9 = mysqli_fetch_array($sql9); 
                    $sehat_all = $data9['sehat_all'];
                   
                    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                    while($data = mysqli_fetch_array($sql5)){ // Ambil semua data dari hasil eksekusi $sql
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".bagi($data['kri_1'], $berat_all)."</td>";
                        echo "<td>".bagi($data['kri_2'], $kaki_all)."</td>";
                        echo "<td>".bagi($data['kri_3'], $mata_all)."</td>";
                        echo "<td>".bagi($data['kri_4'], $sehat_all)."</td>";
                        echo "</tr>";
                        $no++; // Tambah 1 setiap kali looping
                    }
                ?>
        </table>


        <h2>Normalisasi dan Bobot</h2>
        <table border=1px>
                <tr>
                    <td>No</td>
                    <td>Berat/Tinggi</td>
                    <td>Bentuk Kaki</td>
                    <td>Warna Mata</td>
                    <td>Kesehatan</td>
                    <td>Jumlah</td>
                </tr>
                <?php
                    function jumlah($satu, $dua, $tiga, $empat)
                    {
                        $hasil = $satu + $dua + $tiga +$empat;
                        return format_decimal($hasil);
                    }
                    $sql10 = mysqli_query($connect, "SELECT * FROM tbl_alternatif");
                    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                    while($data = mysqli_fetch_array($sql10)){ // Ambil semua data dari hasil eksekusi $sql
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".bagi($data['kri_1'], $berat_all) * 5.00."</td>";
                        echo "<td>".bagi($data['kri_2'], $kaki_all) * 3.666."</td>";
                        echo "<td>".bagi($data['kri_3'], $mata_all) * 3.666."</td>";
                        echo "<td>".bagi($data['kri_4'], $sehat_all) * 5.00."</td>";
                        echo "<td>".((bagi($data['kri_1'], $berat_all) * 5) + (bagi($data['kri_2'], $kaki_all) * 3.666) + (bagi($data['kri_3'], $mata_all) * 3.666) + (bagi($data['kri_4'], $sehat_all) * 5))."</td>";
                        
                        
                        $hasil = ((bagi($data['kri_1'], $berat_all) * 5) + (bagi($data['kri_2'], $kaki_all) * 3.666) + (bagi($data['kri_3'], $mata_all) * 3.666) + (bagi($data['kri_4'], $sehat_all) * 5));
                        
                        if(isset($_POST['simpan']))
                        {
                        $a="INSERT INTO tbl_ranking values ('".$no."','".$data['id_alt']."','".$hasil."')";
                        $proses=mysqli_query($connect,$a);

                        $b=mysqli_query($connect, "SELECT * FROM tbl_ranking");
                        }
                        echo "</tr>";
                        $no++; // Tambah 1 setiap kali looping
                    }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <button name="simpan" type="submit">SImpan</button>
                </form>
        </table>


        <h3>Ranking</h3>
        <table>
                    <tr>
                        <td>Ranking</td>
                        <td>Nama Alternatif</td>
                        <td>Jumlah</td>
                    </tr>
                    <?php
                    
                    $sql11 = mysqli_query($connect, "SELECT  tbl_alternatif.nama_alt as nama, tbl_ranking.hasil as ranki
                    FROM tbl_ranking, tbl_alternatif
                    WHERE tbl_ranking.id_alt=tbl_alternatif.id_alt
                    ORDER by hasil DESC
                    LIMIT 10");
                    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                    while($data = mysqli_fetch_array($sql11)){ // Ambil semua data dari hasil eksekusi $sql
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$data['nama']."</td>";
                        echo "<td>".$data['ranki']."</td>";
                        echo "</tr>";
                        $no++; // Tambah 1 setiap kali looping
                    }
                ?>
        </table>
    </body>
</html>