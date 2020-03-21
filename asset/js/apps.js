$(document).ready(function () {
    $('.js-example-basic-single').select2();

    var local = window.location.origin + '/sbk/';

	$('#double-scroll').doubleScroll();

    $('#nama').change(function () {
        var id = $(this).val();
        var getUrl = local + 'laporan/ajaxSiswa/' + id;
        var nisn = '';
        var kelas = '';
        var jurusan = '';
        $.ajax({
            url: getUrl,
            type: 'ajax',
            dataType: 'json',
            success: function (response) {
                if (response != null) {
                    nisn = '' +
                        '<input type="text" class="form-control" id="exampleInputEmail1" value="' + response.siswa_nisn + '"placeholder="Input Nisn Siswa" name="Nisn" readonly="">';
                    kelas = '' +
                        '<input type="text" class="form-control" id="exampleInputEmail1" value="' + response.siswa_kelas + '"placeholder="Input Nisn Siswa" name="Kelas" readonly="">';
                    jurusan = '' +
                        '<input type="text" class="form-control" id="exampleInputEmail1" value="' + response.siswa_jurusan + '"placeholder="Input Nisn Siswa" name="Jurusan" readonly="">';
                    $('#nisnnya').html(nisn);
                    $('#kelasnya').html(kelas);
                    $('#jurusannya').html(jurusan);
                } else {
                    nisn = '' +
                        '<input type="text" class="form-control" id="exampleInputEmail1" value=""placeholder="Input Nisn Siswa" name="Nisn" readonly="">';
                    kelas = '' +
                        '<input type="text" class="form-control" id="exampleInputEmail1" value=""placeholder="Input Nisn Siswa" name="Kelas" readonly="">';
                    jurusan = '' +
                        '<input type="text" class="form-control" id="exampleInputEmail1" value=""placeholder="Input Nisn Siswa" name="Jurusan" readonly="">';
                    $('#nisnnya').html(nisn);
                    $('#kelasnya').html(kelas);
                    $('#jurusannya').html(jurusan);
                }
            },
            error: function (response) {
                console.log(response.status);
            }
        });
    });

    $('#see').click(function () {
        var tahun = $('#tahun').val();
        var bulan = $('#bulan').val();
        var getUrl = local + 'rekap/view/' + tahun + '/' + bulan;
        var html = '';
        var click = '';
        var no = 1;
        $.ajax({
            url: getUrl,
            type: 'ajax',
            dataType: 'json',
            success: function (response) {
                if (response != null) {
                    console.log(response);
                    html += '' +
                        '<thead>' +
                        '<tr>' +
                        '<th >No</th>' +
                        '<th >Nama</th>' +
                        '<th >Kelas</th>' +
                        '<th >Jurusan</th>' +
                        '<th >Poin</th>' +
                        '</tr>' +
                        '</thead>';
                    for (var i = 0; i < response.length; i++) {
                        html += '' +
                            '<tbody>' +
                            '<tr>' +
                            '<td>' + no + '</td>' +
                            '<td>' + response[i].siswa_nama + '</td>' +
                            '<td>' + response[i].siswa_kelas + '</td>' +
                            '<td>' + response[i].siswa_jurusan + '</td>' +
                            '<td>' + response[i].jumlah_poin + '</td>' +
                            '</tr>' +
                            '</tbody>';
                        no++;
                    }
                    click += '' +
                        '<button type="button" onclick="window.print()" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>';
                    $('.print').html(html);
                    $('#clickprint').html(click);
                }
            },
            error: function (response) {
                console.log(response.status);
            }
        });
    });
});
