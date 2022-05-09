<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Grafik</h4>
                            </div>
                            <div class="card-body">
                                <div class="default-tab">

                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <html>
                                            <head>
                                        <script src="js/jquery.min.js" type="text/javascript"></script>
                                        <script src="js/highcharts.js" type="text/javascript"></script>
                                        <script type="text/javascript">
                                            var chart1; // globally available
                                        $(document).ready(function() {
                                            chart1 = new Highcharts.Chart({
                                                chart: {
                                                    renderTo: 'container',
                                                    type: 'column'
                                                },   
                                                title: {
                                                    text: 'Grafik Ranking Sapi Berkualitas'
                                                },
                                                xAxis: {
                                                    categories: ['Nama Jenis Sapi']
                                                },
                                                yAxis: {
                                                    title: {
                                                    text: 'Jumlah Nilai'
                                                    }
                                                },
                                                    series:             
                                                    [
                                                    <?php 
                                                    include "koneksi.php";
                                                    $sql   = "SELECT b.nama_alt FROM tbl_ranking a, tbl_alternatif b WHERE a.id_alt=b.id_alt";
                                                    $query = mysqli_query($connect, $sql)  or die(mysqli_error());
                                                    while( $ret = mysqli_fetch_array( $query ) ){
                                                        $nama_alt=$ret['nama_alt'];                     
                                                        $sql_hasil   = "SELECT a.hasil FROM tbl_ranking a, tbl_alternatif b WHERE b.nama_alt='$nama_alt' and a.id_alt=b.id_alt";        
                                                        $query_hasil = mysqli_query($connect, $sql_hasil ) or die(mysqli_error());
                                                        while( $data = mysqli_fetch_array( $query_hasil ) ){
                                                            $hasil = $data['hasil'];                 
                                                        }             
                                                        ?>
                                                        {
                                                            name: '<?php echo $nama_alt; ?>',
                                                            data: [<?php echo $hasil; ?>]
                                                        },
                                                        <?php } ?>
                                                    ]
                                            });
                                        });	
                                        </script>
                                            </head>
                                            <body>
                                                <div id='container'></div>		
                                            </body>
                                        </html>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    