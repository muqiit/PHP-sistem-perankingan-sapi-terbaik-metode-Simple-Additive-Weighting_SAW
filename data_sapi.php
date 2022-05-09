<?php
include('koneksi.php');

      if (isset($_GET['view'])) 
      {
        $a2="SELECT * FROM tbl_alternatif where id_alt='".$_GET['view']."'";
        $b2=mysqli_query($connect,$a2);
        $data2=mysqli_fetch_object($b2);
      }
     
      if(isset($_POST['simpan']))
      {
        if (empty($_POST['nama_alt']) or empty($_POST['kri_1']) or empty($_POST['kri_2']) or empty($_POST['kri_3'] or empty($_POST['kri_4']))) 
        {
          echo"Data Belum Lengkap";
        }
        else
        {
        // Simpan ke Database
        $a="INSERT INTO tbl_alternatif values ('".$_POST['id_alt']."','".$_POST['nama_alt']."','".$_POST['kri_1']."','".$_POST['kri_2']."','".$_POST['kri_3']."','".$_POST['kri_4']."')";
        $proses=mysqli_query($connect,$a);
    
        echo"<script>Berhasil Menyimpan Data</script>";
    
        // http_redirect('http://localhost:8080/mufa/index.php?id=1');
    
        }
      }
      if(isset($_GET['delete']))
        {
        if (empty($_GET['delete']))
            {
            echo"  <div id='pesan' class='alert alert-warning' style='display:none;'>Pilih Data Terlebih Dahulu</div>";
            }
            else{
            $a="DELETE FROM tbl_ranking where id_alt='".$_GET['delete']."'";
            $a="DELETE FROM tbl_alternatif where id_alt='".$_GET['delete']."'";
            $b="SELECT * FROM tbl_alternatif where id_alt='".$_GET['view']."'";
            $c=mysqli_query($connect, $b);
            $d=mysqli_fetch_array($c);
            $proses=mysqli_query($connect,$a);
                if($proses)
                {
                echo"  <div id='pesan' class='alert alert-success' style='display:none;'>Berhasil Menghapus Data</div>";
                header('location:index.php?id=1');
                // http_redirect('http://localhost:8080/board/index.php?id=1');
                }
                else
                {
                echo"  <div id='pesan' class='alert alert-danger' style='display:none;'>Gagal Menghapus Data</div>";
                } 
            }
        }



      if (isset($_GET['view'])) 
      {
        $a2="SELECT * FROM tbl_alternatif where id_alt='".$_GET['view']."'";
        $b2=mysqli_query($connect,$a2);
        $data2=mysqli_fetch_object($b2);
      }
?> 

<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Sapi</h4>
                            </div>
                            <div class="card-body">
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Data Sapi</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Input Data Sapi</a>
                                            
                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                <td>No</td>
                                                <td>Nama</td>
                                                <td>Berat/Tinggi</td>
                                                <td>Bentuk Kaki</td>
                                                <td>Warna Mata</td>
                                                <td>Kesehatan</td>
                                                <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    include "koneksi.php";
                                                    $sql6 = mysqli_query($connect, "SELECT MAX(kri_1) as berat_all FROM tbl_alternatif");
                                                    $data6 = mysqli_fetch_object($sql6); 
                                                    

                                                    $sql7 = mysqli_query($connect, "SELECT MAX(kri_2) as kaki_all FROM tbl_alternatif");
                                                    $data7 = mysqli_fetch_object($sql7); 
                                                    

                                                    $sql8 = mysqli_query($connect, "SELECT MAX(kri_3) as mata_all FROM tbl_alternatif");
                                                    $data8 = mysqli_fetch_object($sql8); 
                                                    

                                                    $sql9 = mysqli_query($connect, "SELECT MAX(kri_4) as sehat_all FROM tbl_alternatif");
                                                    $data9 = mysqli_fetch_object($sql9); 
                                                    

                                                    $sql = mysqli_query($connect, "SELECT * FROM tbl_alternatif");	
                                                    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                                                
                                                    while($data = mysqli_fetch_object($sql)){
                                                ?> 
                                                
                                                        <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $data->nama_alt; ?></td>
                                                        <td><?php echo $data->kri_1; ?></td>
                                                        <td><?php echo $data->kri_2; ?></td>
                                                        <td><?php echo $data->kri_3; ?></td>
                                                        <td><?php echo $data->kri_4; ?></td>
                                                        <td><a href="index.php?id=3&view=<?php echo $data->id_alt; ?>" class="btn btn-warning btn-sm"><i class="fa fa-map-marker"></i>&nbsp; Edit</a>
                                                        <a onClick="return confirm('Are you sure you want to delete?')" href="index.php?id=1&delete=<?php echo $data->id_alt; ?>" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>&nbsp; Delete</a>
                                                        </td>
                                                        </tr>
                                                    
                                                <?php
                                                $no++; // Tambah 1 setiap kali looping
                                                    }
                                                ?>
                                                    <tr>
                                                        <td colspan="2">Nilai Maksimal</td>
                                                        <td><?php echo $data6->berat_all; ?></td>
                                                        <td><?php echo $data7->kaki_all; ?></td>
                                                        <td><?php echo $data8->mata_all; ?></td>
                                                        <td><?php echo $data9->sehat_all; ?></td>
                                                </tr>
                                                <?php
                                                    
                                                ?>
                                            
                                            </tbody>
                                        </table>
                                        </div>


                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Input Data Sapi</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            <div class="form-group text-center">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Jenis Sapi</label>
                                                <input id="cc-pament" name="id_alt" type="text" hidden="true" class="form-control" aria-required="true" aria-invalid="false">
                                                <input id="cc-pament" name="nama_alt" type="text" class="form-control" aria-required="true" placeholder="jenis sapi" aria-invalid="false">
                                            </div>
                                            <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-name" class="control-label mb-1">Berat/Tinggi</label>
                                                    <input id="cc-name" name="kri_1" type="number" step=".01" min="0" maxlength="4" class="form-control cc-name valid" data-val="true"  placeholder="berat/tinggi sapi" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Bentuk Kaki</label>
                                                    <input id="cc-number" name="kri_2" type="number" step=".01" min="0" maxlength="4" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" placeholder="bentuk kaki sapi" autocomplete="cc-number">
                                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Warna Mata</label>
                                                            <input id="cc-exp" name="kri_3" type="number" step=".01" min="0" maxlength="4" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="warna mata sapi" autocomplete="cc-exp">
                                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="x_card_code" class="control-label mb-1">Kesehatan</label>
                                                        <div class="input-group">
                                                            <input id="x_card_code" name="kri_4" type="number" step=".01" min="0" maxlength="4" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" 
                                                            placeholder="kesehatan sapi" autocomplete="off">
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button id="payment-button" type="submit" name="simpan" class="btn btn-lg btn-info btn-block">
                                                        <span id="payment-button-amount">Insert</span>
                                                        
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                        </div>
                                       
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    
                   