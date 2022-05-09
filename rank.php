
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Ranking Sapi Berkualitas</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Alternatif</th>
                                            <th>Hasil</th>
                                            <th>Ranking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include "koneksi.php";
                                        $sql11 = mysqli_query($connect, "SELECT * FROM vw_ranking order by rank asc");
                                        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                                        while($data = mysqli_fetch_array($sql11)){ // Ambil semua data dari hasil eksekusi $sql
                                            echo "<tr>";
                                            echo "<td>".$no."</td>";
                                            echo "<td>".$data['nama_alt']."</td>";
                                            echo "<td>".$data['hasil']."</td>";
                                            echo "<td>".$data['rank']."</td>";
                                            echo "</tr>";
                                            $no++; // Tambah 1 setiap kali looping
                                        }
                                    ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>