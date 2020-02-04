<?php
include "models/m_riwayat.php";
$rwt = new Riwayat($connection);
?>
        <div class="row">
          <div class="col-lg-12">
            <h1>Selamat Datang <small> ini adalah Data Riwayat Perjalanan Kereta Api</small></h1>
            <ol class="breadcrumb">
                <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="?page=data_kereta"><i class="fa fa-bar-chart-o"></i> Data Kereta Api </a></li>
                <li><a href="?page=data_stasiun"><i class="fa fa-table"></i> Data Stasiun </a></li>
                <li><a href="?page=data_riwayat"><i class="fa fa-edit"></i> Data Riwayat Perjalanan Stasiun</a></li>
            </ol>
          </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="tabel_stasiun">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kereta</th>
                                <th>Destinasi Stasiun </th>
                                <th>Stasiun Sebelumnya</th>
                                <th>Stasiun Sekarang </th>
                                <th>Tiba Pada</th>
                                <th>Stasiun Selanjutnya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $tampil = $rwt->tampil_riwayat();
                                while ($data = $tampil->fetch_object())
                                {
                            ?>
                                <tr>
                                    <td align="center"><?php echo $no++."."; ?></td>
                                    <td><?php echo $data->nama_kereta; ?></td>
                                    <td><?php echo $data->nama_station; ?></td>
                                    <td><?php echo $data->prev_station; ?></td>
                                    <td><?php echo $data->curr_station; ?></td>
                                    <td><?php echo $data->waktu_tiba_curr; ?></td>
                                    <td><?php echo $data->next_station; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>