<?php
    include('koneksi.php');
    if(isset($_POST['ubah']))
    {
      // Ubah Data
      $a=" UPDATE tbl_alternatif set
      nama_alt      = '{$_POST['nama_alt']}', 
      kri_1         = '{$_POST['kri_1']}',
      kri_2         = '{$_POST['kri_2']}',
      kri_3         = '{$_POST['kri_3']}',
      kri_4         = '{$_POST['kri_4']}'
      where id_alt = '".$_GET['view']."'";
      $proses=mysqli_query($connect,$a);

      //http_redirect('http://localhost:8080/mufa/index.php?id=1');
      header("location: http://localhost:8080/mufa/index.php?id=1");
      echo"<script>Berhasil Mengubah Data</script>";
      
    }

    if (isset($_GET['view'])) 
    {
      $a2="SELECT * FROM tbl_alternatif where id_alt='".$_GET['view']."'";
      $b2=mysqli_query($connect,$a2);
      $data2=mysqli_fetch_object($b2);
    }
?>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"></strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Ubah Data Sapi</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            <div class="form-group text-right">
                                                <a href="index.php?id=1"><h4>Kembali</h4></a>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Jenis Sapi</label>
                                                <input id="cc-pament" name="id_alt" type="text" value="<?php echo $data2->id_alt; ?>" hidden="true" class="form-control" aria-required="true" aria-invalid="false">
                                                <input id="cc-pament" name="nama_alt" value="<?php echo $data2->nama_alt; ?>" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-name" class="control-label mb-1">Berat/Tinggi</label>
                                                    <input id="cc-name" name="kri_1" value="<?php echo $data2->kri_1; ?>" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Bentuk Kaki</label>
                                                    <input id="cc-number" name="kri_2" value="<?php echo $data2->kri_2; ?>" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Warna Mata</label>
                                                            <input id="cc-exp" name="kri_3" value="<?php echo $data2->kri_3; ?>" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY" autocomplete="cc-exp">
                                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="x_card_code" class="control-label mb-1">Kesehatan</label>
                                                        <div class="input-group">
                                                            <input id="x_card_code" name="kri_4" value="<?php echo $data2->kri_4; ?>" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button id="payment-button" type="submit" name="ubah" class="btn btn-lg btn-info btn-block">
                                                
                                                        <span id="payment-button-amount">Update</span>
                                                        
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->

</div>