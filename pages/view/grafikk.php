<!DOCTYPE html>
<html>
<head>
	<title>GRAFIK</title>
	<script type="text/javascript" src="../../assets/js/chartjs/Chart.js"></script>
</head>
<body>
	<style type="text/css">
	body{
		font-family: roboto;
	}
 
	table{
		margin: 0px auto;
	}
	</style>
 
 
	<center>
		<h2>Grafik Siswa Bermasalah</h2>
	</center>
 
 
	<?php 
	include '../models/koneksi.php';

	$kelas = $user['kelas'];
	$date = date('Y-m-d');

	$query = "SELECT * FROM tb_ranking Where kelas_sw ='$kelas' AND id_rank IN (SELECT MAX(id_rank) FROM tb_ranking GROUP BY id_sw) ";
    $nama= mysqli_query($connect,$query);

    $queryk = "SELECT prefrensi FROM tb_ranking Where kelas_sw ='$kelas' AND id_rank IN (SELECT MAX(id_rank) FROM tb_ranking GROUP BY id_sw)";
    $siswa= mysqli_query($connect,$queryk);

	?>
 
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
 
 
	<script>

	  var ctx = document.getElementById("myChart").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: [<?php while ($b = mysqli_fetch_array($nama)) { echo '"' . $b['nama_sw'] . '",';}?>],
					datasets: [{
						label: 'Data Siswa Bermasalah',
						data: [<?php while ($p = mysqli_fetch_array($siswa)) { echo '"' . $p['prefrensi'] . '",'; }?>],
						backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)'
		               
						],
						borderColor: [
							
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});

	</script>
</body>
</html>