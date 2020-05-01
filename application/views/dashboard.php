<div class="card">
    <div class="card-header">
        <h3 class="card-title">Dashboard</h3>
    </div>
    <div class="card-body">
        Selamat Datang <?= $this->session->userdata('session_level');?>, <?= $this->session->userdata('session_name');?>
    </div>
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info-gradient">
                <div class="inner">
                    <h3><?= $this->db->count_all_results('user')-1?></h3>
                    <p>Staff</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="<?=base_url('staff')?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger-gradient">
                <div class="inner">
                    <h3><?= $this->db->count_all_results('poli')?></h3>

                    <p>Poli</p>
                </div>
                <div class="icon">
                    <i class="fa fa-pie-chart"></i>
                </div>
                <a href="<?=base_url('poli')?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning-gradient">
                <div class="inner">
                    <h3><?= $prediksi?></h3>

                    <p>Prediksi</p>
                </div>
                <div class="icon">
                    <i class="fa fa-line-chart"></i>
                </div>
                <a href="<?=base_url('prediksi')?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success-gradient">
                <div class="inner">
                    <h3><?= $tahun ?></h3>

                    <p>Laporan</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file-o"></i>
                </div>
                <a href="<?=base_url('kunjungan')?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    </div>
</div>
