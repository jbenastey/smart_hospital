$(document).ready(function () {
	'use strict';

	var root = window.location.origin + '/smart_hospital/';

	var ticksStyle = {
		fontColor: '#495057',
		fontStyle: 'bold'
	};

	var mode = 'index';
	var intersect = true;


	$('.poli').change(function () {
		$('#chartnya').html(
			'<div class="chart">' +
			'<canvas id="chart-hospital" width="1000" height="380"></canvas>' +
			'</div>'
		);
		var id = $(this).val();
		$.ajax({
			url: root + 'data-grafik/'+id,
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				var $chart = $('#chart-hospital');
				var salesChart = new Chart($chart, {
					type: 'line',
					data: {
						labels: response.label,
						datasets: [
							{
								label: 'Hasil Prediksi',
								backgroundColor: 'rgba(0,123,255,0.49)',
								borderColor: '#007bff',
								data: response.jumlah
							},
						]
					},
					options: {
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						legend: {
							display: true,
							position: 'bottom',
						},
						scales: {
							yAxes:[{
								ticks: {
									beginAtZero : true
								}
							}]
						},
						title: {
							display: false,
							text: 'Grafik'
						},
					}
				});
			},
			error: function (response) {
				console.log(response)
			}
		})
	})


})
