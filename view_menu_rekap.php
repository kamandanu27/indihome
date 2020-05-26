<?php
require_once "koneksi/config.php";
?>
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="panel panel-danger">
                <div class="panel-heading">
                   Laporan Rekap
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-horizontal">
                            <div class="box-body">

                                <div class="form-group"> 
                                    <label class="col-sm-4  control-label">Nama Laporan</label>
                                    <div class="col-sm-8">
                                    <?php
                                    if($_GET['cari'] == 'pelanggan'){
                                        echo "<input type='text' class='form-control' id='type_lapor' value='Laporan Rekap Pelanggan' readonly>";
                                    }
                                    if($_GET['cari'] == 'gangguan'){
                                        echo "<input type='text' class='form-control' id='type_lapor' value='Laporan Rekap Gangguan' readonly>";
                                    }
                                    if($_GET['cari'] == 'pendapatan'){
                                        echo "<input type='text' class='form-control' id='type_lapor' value='Laporan Rekap Pendapatan' readonly>";
                                    }
                                    ?>
                                    </div>
                                </div>

                                <?php
                                    if($_GET['cari'] == 'gangguan'){
                                ?>
                                    <div class="form-group"> 
                                        <label class="col-sm-4  control-label">Tanggal Awal</label>
                                        <div class="col-sm-8">
                                        <input type="date" class="form-control" id="t1" value="<?php echo date("Y-m-d") ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-4  control-label">Tanggal Akhir</label>
                                        <div class="col-sm-8">
                                        <input type="date" class="form-control" id="t2" value="<?php echo date("Y-m-d") ?>" required>
                                        </div>
                                    </div>
                                <?php
                                    }else{ 
                                ?>
                                    <div class="form-group"> 
                                        <label class="col-sm-4  control-label"></label>
                                        <div class="col-sm-8">
                                        <input type="hidden" class="form-control" id="t1" value="<?php echo date("Y-m-d") ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-4  control-label"></label>
                                        <div class="col-sm-8">
                                        <input type="hidden" class="form-control" id="t2" value="<?php echo date("Y-m-d") ?>" required>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>

                                
                            </div>
                            <div class="box-footer" style="margin-top:50px;">
                                <button type="submit" class="btn btn-primary pull-right btn-sm btnlaporrekap"><i class='fa fa-save'></i> Cetak</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    