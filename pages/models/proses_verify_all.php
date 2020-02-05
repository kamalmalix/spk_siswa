<?php
	include "koneksi.php";

	$status3 = "Verifikasi";

	$post = $_POST['data_nis'];

	//print_r($post);



	for($i=0;$i<count($post);$i++){

	$query3 = "UPDATE dt_sw SET status = '$status3'  WHERE nis = '".$post[$i]['nis']."'";
        $sql3 = mysqli_query($connect,$query3);

        $query2 = "UPDATE tb_quesioner SET status = '$status3'  WHERE nis = '".$post[$i]['nis']."'";
        $sql2 = mysqli_query($connect,$query2);

        // $query4 = "SELECT * FROM tb_ranking WHERE id_sw='".$post[$i]['id']."'";
        // $sql4 = mysqli_query($connect, $query4);

        // $count = mysqli_num_rows($sql4);

        // if($count==0){
        	$query = "INSERT INTO tb_ranking VALUES('',
        	'".$post[$i]['id']."',
        	'".$post[$i]['nis']."',
        	'".$post[$i]['nama']."',
        	'".$post[$i]['kelas']."',
        	'".$post[$i]['preferensi']."',
        	'".$post[$i]['note']."',
        	'".date('Y-m-d')."')";
        	$sql = mysqli_query($connect,$query);
        // }
     

	}

	echo json_encode(array('result'=>TRUE));
	return;

?>