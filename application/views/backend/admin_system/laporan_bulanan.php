<?php
$this->load->helper('px_helper');
$years = get_unique_year($data);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Barang Dipinjam</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="text-right">
                    <div class="pull-left panel-title">Lihat laporan berdasarkan :</div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form class="form-inline" id="filterForm">
                            <div class="form-group pr-2">
                                <select name="tahun" id="tahun" class="form-control" required>
                                    <option value="" selected disabled>Pilih tahun</option>
                                    <?php
                                        foreach($years as $year) {
                                            echo "<option value='$year'>$year</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="bulan" id="bulan" class="form-control" required>
                                    <option value="" selected >Pilih bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Lihat</button>
                        </form>
                    </div>
                </div>
                <br>
                <div id="tabel" class="row d-none">
                    <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="tableMonth">
                            <thead>
                            <tr>
                                <th>ID Pinjam</th>
                                <th>Nama Peminjam</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Pinjam</th>
                                <th>Tanggal Pinjam</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $d1) { ?>
                                <tr>
                                    <td><?php echo $d1->id_pinjam ?></td>
                                    <td><?php echo $d1->name_peminjam ?></td>
                                    <td><?php echo $d1->name_barang ?></td>
                                    <td><?php echo $d1->jml ?></td>
                                    <td><?php echo $d1->tgl_pinjam ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<script>

</script>