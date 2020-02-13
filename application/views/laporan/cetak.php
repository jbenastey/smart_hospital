<?php
$bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

?>

<style type="text/css">
    p {
        margin-bottom: 1.5px;
        font-size: 12pt;
        font-family: 'Times New Rowman';
    }

    @page {
        size: A4;
        margin: 0;
    }

    .logo {
        width: 120px;
        height: 110px;
    }

    @media print {
        .page {
            margin: 0;
            padding: 0.3cm;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }

        h4 {
            font-size: 14pt;
            font-family: 'Times New Rowman';
        }

        .card {

        }

        td {
            font-size: 12pt;
        }

</style>
<div class="col-md-12">

    <div class="card">
        <div class="card-header">

            <div class="col-3 d-print-none">
                <button onclick="window.print()" class="btn btn-info"><i class="fa fa-print"></i></button>
            </div>
            <div class="col-9">
                <form action="" method="post">

                </form>
            </div>


        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2 ml-8 mt-2 text-right"><img src="<?php echo base_url() ?>asset/image/download.jpg"
                                                             class="logo"></div>
                <div class="col-8 text-center mt-6">
                    <h4>DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA</h4>
                    <h4>SMK TARUNA MANDIRI PEKANBARU</h4>
                    <p style="margin-top: -10px;font-size: 12pt;">Alamat Jl. Rajawali Sakti No.90, RT.03/RW.01, Simpang
                        Baru, Tampan, Kota Pekanbaru, Riau 28294</p>
                    <p style="margin-top: -10px;font-size: 12pt;">Email :info@sekolahtarunpekanbaru.sch.id website
                        :http://sekolahtarunapekanbaru.sch.id/</p>
                </div>
                <div style="margin-left: -24px;" class="col-2 ml-8 mt-2 text-right"><img
                            src="<?php echo base_url() ?>asset/image/download.png" class="logo" style="margin-bottom: 10px"></div>
                <hr style="z-index: 999; margin-top: 0;width: 90%;border:2px solid black;background-color: black; ">

            </div>
            <div class="row" style="margin-top:-10px;margin-left: 20px;">
                <div class="col-6 ml-9">
                    <?php
                    if ($tingkat == 'ringan'):
                    ?>
                        <p>Hal : Surat Peringatan</p>
                    <?php
                    elseif ($tingkat == 'sedang'):
                        ?>
                        <p>Hal : Surat Panggilan Orang Tua</p><?php
                    elseif ($tingkat == 'berat'):
                        ?>
                        <p>Hal : Surat Diskorsing</p>
                    <?php
                    endif;
                    ?>
                    <p>Sifat : Penting</p>
                    <p>Lamp : -</p>
                </div>
                <div class="col-4 float-right text-right">
                    <p>Pekanbaru, <?=date_indo($laporan['laporan_tanggal'])?></p>

                </div>
            </div>

            <div class="row mt-2" style="margin-left: 10%;">
                <div class="col-6 ml-9">
                    <p> Kepada Yth.
                    <p>Bpk Ibu Orang Tua /Wali </p>
                    <p>Dari <?=$this->session->userdata('session_name');?></p>
                    <p>Di tempat</p> <br>
                </div>
            </div>

            <div class="row mt-2" style="margin-left: 10%;">
                <div class="col-9 ml-9">
                    <p><b>Assalammu'alaikum wr. wb.</b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-10" style="margin: 0 auto;">

                </div>
            </div>

            <div class="row mt-3" style="margin-left: 10%;">
                <div class="col-9 ml-9" style="text-align: justify ">
                    <?php
                    if ($tingkat == 'ringan'):
                    ?>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oleh karena itu kami memberikan Surat Teguran Tertulis. Dengan Surat Teguran Tertulis ini
                        diharapkan agar kiranya Bapak/Ibu Wali lebih mengawasi kegiatan siswa, baik dari segi sikap
                        individu , sosial dan spiritual. Agar dikemudian hari siswa tidak mengulangi kesalahan yang sama
                        dan atau kesalahan lainnya, sehingga tercipta perilaku siswa yang lebih baik. Demikian surat ini
                        kami sampaikan , atas kerjasamanya kami ucapkan terima kasih. </p>
                    <?php
                    elseif ($tingkat == 'sedang'):
                        ?>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Puji syukur mari kita panjatkan ke hadirat Allah SWT. Semoga Bapak/Ibu selalu ada dalam lindungan-Nya.
                            Dengan ini, kami dari pihak sekolah memanggil Bapak/Ibu selaku Orang Tua dari anak yang bernama <b><?=$siswa['siswa_nama']?></b> kelas <b><?=$siswa['siswa_kelas']?></b> untuk datang ke sekolah pada:</p>
                            <p>
                            Hari, tanggal&nbsp;: <?=date_indo(date('Y-m-d'))?></p>
                            <p>
                            Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Ruang BP/BK SMK Taruna Mandiri</p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengingat ada permasalahan penting yang harus diberitahukan terkait siswa kami tersebut (anak Bapak/Ibu sekalian), kami sangat mengharapkan kehadiran Bapak/Ibu pada waktu dan tempat yang disebutkan.</p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat panggilan ini kami sampaikan. Atas perhatiannya kami ucapkan terima kasih.
                            Wassalamualaikum Wr.Wb
                        </p>
                    <?php
                    elseif ($tingkat == 'berat'):
                        ?>
                    <p>Yang bertanda tangan di bawah ini Kepala SMK Taruna Mandiri memberitahukan bahwa, sehubungan dengan pelanggaran tata tertib sekolah yang dilakukan oleh putra bapak / ibu</p>
                    <table style="margin-left: 25%">
                        <tr>
                            <td><p>Nama</p></td>
                            <td><p> : </p></td>
                            <td><p><?=$siswa['siswa_nama']?></p></td>
                        </tr>
                        <tr>
                            <td><p>Kelas</p></td>
                            <td><p> : </p></td>
                            <td><p><?=$siswa['siswa_kelas']?>  <?=$siswa['siswa_jurusan']?></p></td>
                        </tr>
                        <tr>
                            <td><p>NISN</p></td>
                            <td><p> : </p></td>
                            <td><p><?=$siswa['siswa_nisn']?></p></td>
                        </tr>
                        <tr>
                            <td><p>Alamat</p></td>
                            <td><p> : </p></td>
                            <td><p><?=$siswa['siswa_alamat']?></p></td>
                        </tr>
                    </table>
                    <p>Maka dengan ini kami pihak sekolah dengan sangat terpaksa memberikan skorsing kepada siswa di atas untuk tidak mengikuti kegiatan belajar mengajar disekolah selama 14 hari(2 minggu). Dengan tujuan memberi sanksi terhadap siswa atas pelanggaran yang di lakukan dan sekaligusmemberikan kesempatan kepada orang tua siswa untuk lebih dekat dengan putra/putrinya danmemberikan pembinaan di rumah.</p>
                    <p>Demikian surat ini kami sampaikan atas perhatian dan kerja sama dari bapak / ibu kami ucapkan terima kasih.</p>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
            <br>

            <div class="row mt-4" style="width: 70%; margin: 0 auto;font-size: 18px;">
                <div class="col-4 text-left">

                </div>

                <div class="col-4 float-right" style="margin-left: 80%;">
                    <div style="margin-left: 20px;">
                        <p style="margin-left: -80px;">Mengetahui</p>
                        <p style="margin-left: -80px;">Kepala Sekolah</p>
                        <br><br><br>
                        <p style="margin-left: -80px;">Muhammad Khairy Dzaky</p>
                        <p style="margin-left: -80px;">NIP. 11651103377</p>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>