<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Default Tab</h4>
                            </div>
                            <div class="card-body">
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Normalisasi</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Normalisasi x Bobot</a>
                                            
                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td>5.00</td>
                                                    <td>3.66</td>
                                                    <td>3.66</td>
                                                    <td>5.00</td>
                                                </tr>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Berat/Tinggi</th>
                                                    <th>Bentuk Kaki</th>
                                                    <th>Warna Mata</th>
                                                    <th>Kesehatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            include "koneksi.php";
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
                                            
                                            </tbody>
                                        </table>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Berat/Tinggi</th>
                                                    <th>Bentuk Kaki</th>
                                                    <th>Warna Mata</th>
                                                    <th>Kesehatan</th>
                                                    <th>Jumlah</th>
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
                                                        if(isset($_POST['simpan']))
                                                        {
                                                            // $alt = mysqli_query($connect,"SELECT b.id_rank as rank, a.id_alt as id1, b.id_alt as id2 FROM tbl_alternatif a, tbl_ranking b WHERE a.id_alt=b.id_alt");
                                                            // if($alt['id1']=$alt['id2'])
                                                            // {
                                                            //     $b="UPDATE tbl_ranking set id_alt='".$data['id_alt']."', hasil='".$hasil."' WHERE id_rank='".$alt['rank']."'";
                                                            //     $pro=mysqli_query($connect,$b);
            
                                                            //     $c=mysqli_query($connect, "SELECT * FROM tbl_ranking");
                                                            // }
                                                            // else{
                                                                $a="INSERT INTO tbl_ranking values ('".$no."','".$data['id_alt']."','".$hasil."')";
                                                                $proses=mysqli_query($connect,$a);
                                                            // }
                                                            // header('Location:index.php?id=6');
                                                            echo "<meta http-equiv='refresh' content='0; index.php?id=6'>";
                                                        }
                                                        
                                                        echo "<tr>";
                                                        echo "<td>".$no."</td>";
                                                        echo "<td>".bagi($data['kri_1'], $berat_all) * 5.00."</td>";
                                                        echo "<td>".bagi($data['kri_2'], $kaki_all) * 3.666."</td>";
                                                        echo "<td>".bagi($data['kri_3'], $mata_all) * 3.666."</td>";
                                                        echo "<td>".bagi($data['kri_4'], $sehat_all) * 5.00."</td>";
                                                        echo "<td>".format_decimal(((bagi($data['kri_1'], $berat_all) * 5.00) + (bagi($data['kri_2'], $kaki_all) * 3.666) + (bagi($data['kri_3'], $mata_all) * 3.666) + (bagi($data['kri_4'], $sehat_all) * 5.00)))."</td>";
                                                        
                                                        $hasil = ((bagi($data['kri_1'], $berat_all) * 5.00) + (bagi($data['kri_2'], $kaki_all) * 3.666) + (bagi($data['kri_3'], $mata_all) * 3.666) + (bagi($data['kri_4'], $sehat_all) * 5.00));
                                                       
                                                        
                                                        echo "</tr>";
                                                        $no++; // Tambah 1 setiap kali looping
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
                            </div>
                        </div>
                    </div>

                

