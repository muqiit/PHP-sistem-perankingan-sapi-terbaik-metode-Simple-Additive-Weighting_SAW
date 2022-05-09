<?php
include "koneksi.php";
?>

<div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Normalisasi</strong>
                                <a href="index.php?id=5"><strong class="card-title pull-right">Bobot</strong></a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        <td>No</td>
                                        <td>Berat/Tinggi</td>
                                        <td>Bentuk Kaki</td>
                                        <td>Warna Mata</td>
                                        <td>Kesehatan</td>
                                        <td>Jumlah</td>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                                $alt = mysqli_query($connect,"SELECT a.id_alt as id1, b.id_alt as id2 FROM tbl_alternatif a, tbl_ranking b WHERE a.id_alt=b.id_alt");
                                                if($alt['id1']=$alt['id2'])
                                                {
                                                    $b="UPDATE tbl_ranking set id_alt='".$data['id_alt']."', hasil='".$hasil."'";
                                                    $pro=mysqli_query($connect,$b);

                                                    $c=mysqli_query($connect, "SELECT * FROM tbl_ranking");
                                                }
                                                else{
                                                    $a="INSERT INTO tbl_ranking values ('".$no."','".$data['id_alt']."','".$hasil."')";
                                                    $proses=mysqli_query($connect,$a);

                                                    $b=mysqli_query($connect, "SELECT * FROM tbl_ranking");
                                                }
                                            
                                            }
                                            echo "</tr>";
                                            $no++; // Tambah 1 setiap kali looping
                                            header('Location:index.php?id=6');
                                        }
                                    ?>
                                       
                                    </tbody>
                                </table>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <button name="simpan" type="submit">Cek Ranking</button>
                                </form>
                            </div>
                        </div>
                    </div>