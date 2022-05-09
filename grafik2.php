
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Grafik Ranking Sapi Berkualitas</h4>
        </div>
        <div class="card-body">
            <div class="default-tab">
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                <?php
                    $koneksi     = mysqli_connect("localhost", "root", "", "dbs_saw");
                    $merek          = mysqli_query($koneksi, "SELECT b.nama_alt FROM tbl_ranking a, tbl_alternatif b where a.id_alt=b.id_alt order by a.id_rank asc");

                    $penjualan      = mysqli_query($koneksi, "SELECT hasil FROM tbl_ranking order by id_rank asc");
                    
                    ?>
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset="utf-8">
                        
                        <script src="js/Chart.js"></script>
                        <style type="text/css">
                                .container {
                                    width: 50%;
                                    margin: 15px auto;
                                }
                        </style>
                    </head>
                    <body>

                        <div class="container">
                                <canvas id="demobar" width="100" height="100"></canvas>
                        </div>

                            <script  type="text/javascript">

                            var ctx = document.getElementById("demobar").getContext("2d");
                            var data = {
                                        labels: [<?php while ($p = mysqli_fetch_array($merek)) { echo '"' . $p['nama_alt'] . '",';}?>],
                                        datasets: [
                                        {
                                        label: "Nilai Sapi Berkualitas",
                                        data: [<?php while ($p = mysqli_fetch_array($penjualan)) { echo '"' . $p['hasil'] . '",';}?>],
                                        backgroundColor: [
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)",
                                        "rgba(161, 161, 161, 1)"
                                        ]
                                        }
                                        ]
                                        };

                            var myBarChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: data,
                                        options: {
                                        barValueSpacing: 20,
                                        scales: {
                                        yAxes:  [{
                                            ticks: {
                                                min: 0,
                                            }
                                        }],
                                        xAxes: [{
                                                    gridLines: {
                                                        color: "rgba(0, 0, 0, 0)",
                                                    }
                                                }]
                                        }
                                    }
                                    });
                            </script>

                    </body>
                    </html>

                </div>
            </div>
        </div>
    </div>
</div>
                    