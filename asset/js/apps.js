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
				console.log(response);
			}
		})
	})
});
