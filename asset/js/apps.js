$(document).ready(function () {
	$('.js-example-basic-single').select2();

	var local = window.location.origin + '/smart_hospital/';

	$('#double-scroll').doubleScroll();

	$('#prediksi').click(function () {
		$.ajax({
			url: local + 'prediksi/praproses',
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				var nama = [];
				var Ex = [];
				var Ey = [];
				var Exy = [];
				var Ex2 = [];
				var Ey2 = [];
				var n = [];
				var b = [];
				var a = [];
				var Y = [];
				for (var i = 0; i < response.length; i++) {
					nama.push(response[i].nama_poli);
					Ex.push(0);
					Ey.push(0);
					Exy.push(0);
					Ex2.push(0);
					Ey2.push(0);
					n.push(0);
					for (var j = 0; j < response[i].praproses.length; j++) {
						var x = j + 1;
						var y = parseInt(response[i].praproses[j]);
						var xy = x * y;
						var x2 = x * x;
						var y2 = y * y;

						Ex[i] += x;
						Ey[i] += y;
						Exy[i] += xy;
						Ex2[i] += x2;
						Ey2[i] += y2;
						n[i] = x;
					}
					b.push(cariB(Ex[i], Ey[i], Exy[i], Ex2[i], Ey2[i], n[i]));
					a.push(cariA(Ex[i], Ey[i], b[i], n[i]));
					Y.push(cariY(a[i], b[i], (n[i] + 1)));

					$('#hasil-table > tbody:last-child').append(
						'<tr>' +
						'<td>'+(i+1)+'</td>' +
						'<td>'+response[i].nama_poli+'</td>' +
						'<td>'+cekMinus(Math.round(Y[i]))+'</td>' +
						'<td>'+keterangan(y,Y[i])+'</td>' +
						'<td>'+saran(Y[i])+'</td>' +
						'</tr>'
					);
				}
			}
		})
	})
});

function cariB(Ex, Ey, Exy, Ex2, Ey2, n) {
	var hasil = ((n * Exy) - (Ex * Ey)) / ((n * Ex2) - (Ex * Ex));
	return hasil;
}

function cariA(Ex, Ey, b, n) {
	var hasil = (Ey - (b * Ex)) / n;
	return hasil
}

function cariY(a, b, n) {
	var hasil = a + (b * n);
	return hasil
}

function saran(y) {
	var hasil = '';
	if (y <= 20){
		hasil = 'Tutup';
	} else if (y > 20 && y <= 700){
		hasil = 'Buka';
	} else {
		hasil = 'Penambahan SDM dan Sarana'
	}
	return hasil;
}

function keterangan(y,Y) {
	var hasil = '';
	if (y < Y){
		hasil = 'Meningkat';
	} else if (y > Y){
		hasil = 'Menurun'
	} else {
		hasil = 'Stabil'
	}
	return hasil;
}

function cekMinus(Y) {
	var hasil = 0;
	if (Y < 0){
		hasil = 0;
	} else {
		hasil = Y;
	}
	return hasil;
}

