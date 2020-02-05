<?php
// mencari ID kriteria
function getKriteriaID($no_urut) {
	include('koneksi.php');
	$query  = "SELECT id FROM kriteria ORDER BY id";
	$result = mysqli_query($connect, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id'];
	}

	return $listID[($no_urut)];
}

// mencari nama kriteria
function getKriteriaNama($no_urut) {
	include('koneksi.php');
	$query  = "SELECT nama FROM kriteria ORDER BY id";
	$result = mysqli_query($connect, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama'];
	}

	return $nama[($no_urut)];
}

// mencari priority vector kriteria
function getKriteriaPV($id_kriteria) {
	include('koneksi.php');
	$query = "SELECT nilai FROM pv_kriteria WHERE id_kriteria=$id_kriteria";
	$result = mysqli_query($connect, $query);
	while ($row = mysqli_fetch_array($result)) {
		$pv = $row['nilai'];
	}

	return $pv;
}

// mencari jumlah kriteria
function getJumlahKriteria() {
	include('koneksi.php');
	$query  = "SELECT count(*) FROM kriteria";
	$result = mysqli_query($connect, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

// menambah data kriteria 
function tambahData($tabel,$nama) {
	include('koneksi.php');

	$query 	= "INSERT INTO $tabel (nama) VALUES ('$nama')";
	$tambah	= mysqli_query($connect, $query);

	if (!$tambah) {
		echo "Gagal mmenambah data".$tabel;
		exit();
	}
}

// hapus kriteria
function deleteKriteria($id) {
	include('koneksi.php');

	// hapus record dari tabel kriteria
	$query 	= "DELETE FROM kriteria WHERE id=$id";
	mysqli_query($connect, $query);

	// hapus record dari tabel pv_kriteria
	$query 	= "DELETE FROM pv_kriteria WHERE id_kriteria=$id";
	mysqli_query($connect, $query);

	// hapus record dari tabel pv_alternatif
	$query 	= "DELETE FROM pv_alternatif WHERE id_kriteria=$id";
	mysqli_query($connect, $query);

	$query 	= "DELETE FROM perbandingan_kriteria WHERE kriteria1=$id OR kriteria2=$id";
	mysqli_query($connect, $query);

	$query 	= "DELETE FROM perbandingan_alternatif WHERE pembanding=$id";
	mysqli_query($connect, $query);
}

// memasukkan nilai priority vektor kriteria
function inputKriteriaPV ($id_kriteria,$pv) {
	include ('koneksi.php');

	$query = "SELECT * FROM pv_kriteria WHERE id_kriteria=$id_kriteria";
	$result = mysqli_query($connect, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO pv_kriteria (id_kriteria, nilai) VALUES ($id_kriteria, $pv)";
	} else {
		$query = "UPDATE pv_kriteria SET nilai=$pv WHERE id_kriteria=$id_kriteria";
	}


	$result = mysqli_query($connect, $query);
	if(!$result) {
		echo "Gagal memasukkan / update nilai priority vector kriteria";
		exit();
	}

}

// memasukkan bobot nilai perbandingan kriteria
function inputDataPerbandinganKriteria($kriteria1,$kriteria2,$nilai) {
	include('koneksi.php');

	$id_kriteria1 = getKriteriaID($kriteria1);
	$id_kriteria2 = getKriteriaID($kriteria2);

	$query  = "SELECT * FROM perbandingan_kriteria WHERE kriteria1 = $id_kriteria1 AND kriteria2 = $id_kriteria2";
	$result = mysqli_query($connect, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO perbandingan_kriteria (kriteria1,kriteria2,nilai) VALUES ($id_kriteria1,$id_kriteria2,$nilai)";
	} else {
		$query = "UPDATE perbandingan_kriteria SET nilai=$nilai WHERE kriteria1=$id_kriteria1 AND kriteria2=$id_kriteria2";
	}

	$result = mysqli_query($connect, $query);
	if (!$result) {
		echo "Gagal memasukkan data perbandingan";
		exit();
	}

}

// mencari nilai bobot perbandingan kriteria
function getNilaiPerbandinganKriteria($kriteria1,$kriteria2) {
	include('koneksi.php');

	$id_kriteria1 = getKriteriaID($kriteria1);
	$id_kriteria2 = getKriteriaID($kriteria2);

	$query  = "SELECT nilai FROM perbandingan_kriteria WHERE kriteria1 = $id_kriteria1 AND kriteria2 = $id_kriteria2";
	$result = mysqli_query($connect, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	if (mysqli_num_rows($result)==0) {
		$nilai = 1;
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['nilai'];
		}
	}

	return $nilai;
}

// menampilkan nilai IR
function getNilaiIR($jmlKriteria) {
	include('koneksi.php');
	$query  = "SELECT nilai FROM ir WHERE jumlah=$jmlKriteria";
	$result = mysqli_query($connect, $query);
	while ($row = mysqli_fetch_array($result)) {
		$nilaiIR = $row['nilai'];
	}

	return $nilaiIR;
}

// mencari Principe Eigen Vector (λ maks)
function getEigenVector($matrik_a,$matrik_b,$n) {
	$eigenvektor = 0;
	for ($i=0; $i <= ($n-1) ; $i++) {
		$eigenvektor += ($matrik_a[$i] * (($matrik_b[$i]) / $n));
	}

	return $eigenvektor;
}

// mencari Cons Index
function getConsIndex($matrik_a,$matrik_b,$n) {
	$eigenvektor = getEigenVector($matrik_a,$matrik_b,$n);
	$consindex = ($eigenvektor - $n)/($n-1);

	return $consindex;
}

// Mencari Consistency Ratio
function getConsRatio($matrik_a,$matrik_b,$n) {
	$consindex = getConsIndex($matrik_a,$matrik_b,$n);
	$consratio = $consindex / getNilaiIR($n);

	return $consratio;
}

function showTabelPerbandingan($jenis,$kriteria) {
	include('koneksi.php');

	if ($kriteria == 'kriteria') {
		$n = getJumlahKriteria();
	} else {
		$n = getJumlahAlternatif();
	}

	$query = "SELECT nama FROM $kriteria ORDER BY id";
	$result	= mysqli_query($connect, $query);
	if (!$result) {
		echo "Error koneksi database!!!";
		exit();
	}

	// buat list nama pilihan
	while ($row = mysqli_fetch_array($result)) {
		$pilihan[] = $row['nama'];
	}

	// tampilkan tabel
	?>

	<form class="form" action="proses.php" method="post">
	<table>
		<thead>
			<tr>
				<th colspan="2">pilih yang lebih penting</th>
				<th>nilai perbandingan</th>
			</tr>
		</thead>
		<tbody>

	<?php

	//inisialisasi
	$urut = 0;

	for ($x=0; $x <= ($n - 2); $x++) {
		for ($y=($x+1); $y <= ($n - 1) ; $y++) {

			$urut++;

	?>
			<tr>
				<td>
					<div class="field">
						<div class="ui radio checkbox">
							<input name="pilih<?php echo $urut?>" value="1" checked="" class="hidden" type="radio">
							<label><?php echo $pilihan[$x]; ?></label>
						</div>
					</div>
				</td>
				<td>
					<div class="field">
						<div class="ui radio checkbox">
							<input name="pilih<?php echo $urut?>" value="2" class="hidden" type="radio">
							<label><?php echo $pilihan[$y]; ?></label>
						</div>
					</div>
				</td>
				<td>
					<div class="field">

	<?php
	if ($kriteria == 'kriteria') {
		$nilai = getNilaiPerbandinganKriteria($x,$y);
	} else {
		$nilai = getNilaiPerbandinganAlternatif($x,$y,($jenis-1));
	}

	?>
						<input type="text" name="bobot<?php echo $urut?>" value="<?php echo $nilai?>" required>
					</div>
				</td>
			</tr>
			<?php
		}
	}

	?>
		</tbody>
	</table>
	<input type="text" name="jenis" value="<?php echo $jenis; ?>" hidden>
	<br><br><input class="ui submit button" type="submit" name="submit" value="SUBMIT">
	</form>

	<?php
}

?>