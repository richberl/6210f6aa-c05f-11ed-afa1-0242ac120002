<?php
$this->load->helper('px_helper');
$years = get_unique_year($data);
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Riwayat Peminjaman</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-body">
                      <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#tab-tabel">Riwayat</a></li>
                          <li><a data-toggle="tab" href="#tab-grafik">Grafik</a></li>
                      </ul>

                      <div class="tab-content">
                          <div id="tab-tabel" class="tab-pane fade in active">
                              <br>
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
                          </div>

                          <div id="tab-grafik" class="tab-pane fade">
                              <br>
                              <div class="col-lg-2">
                                  <div class="form-group pr-2">
                                      <label for="tahun">Pilih tahun</label>
                                      <select name="tahun" id="tahun" class="form-control">
                                          <?php
                                          foreach($years as $year) {
                                              echo "<option value='$year'>$year</option>";
                                          }
                                          ?>
                                      </select>
                                  </div>
                              </div>
                              <div><canvas style="height: 100px" id="grafik"></canvas></div>
                          </div>
                      </div>
                  </div>
                  <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
              </div>
              <!-- /.col-lg-12 -->
            </div>
            <script>
                let myChart;
                const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', "Des"];
                const datasets = JSON.parse('<?= json_encode($dataGrafik) ?>');
                const selectTahun = document.getElementById('tahun');

                document.addEventListener('DOMContentLoaded', function() {
                    const config = {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: datasets[selectTahun.value]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: 'Chart.js Line Chart'
                                }
                            }
                        },
                    };
                    myChart = new Chart(document.getElementById('grafik'), config);
                });

                selectTahun.onchange = function(evt) {
                    myChart.data.datasets = datasets[selectTahun.value];
                    myChart.update();
                }
            </script>
