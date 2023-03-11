<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id='dataTables-example'>
                      <thead>
                        <tr>
                          <th>ID Pinjam</th>
                          <th>Nama Peminjam</th>
                          <th>Nama Barang</th>
                          <th>Jumlah Pinjam</th>
                          <th>Tanggal Pinjam</th>
                          <th>Tanggal Kembali</th>
                          <th>Status</th>
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
                          <td class="text-center"><?php if($d1->tgl_kembali == '0000-00-00 00:00:00')echo 'N/A'; else echo $d1->tgl_kembali; ?></td>
                          <td>
                            <?php if($d1->status == '0') echo "<div class='text-danger'>Pinjam Ditolak</div>";
                                  elseif($d1->status == '1') echo "<div class='text-success'>Dikembalikan</div>"; ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <!-- /.table-responsive -->
                  </div>