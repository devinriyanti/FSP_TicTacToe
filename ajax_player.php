<?php 
	$con = new mysqli("localhost","root","","fsp_uas");

	$nama = $_POST['playerName'];
	$pilih = $_POST['player'];

	if($pilih == "X"){
		$id = 1;
	}else if($_POST['player'] == "O"){
		$id = 2;
	}
	session_start();
	$_SESSION['id'] = $id;
	$_SESSION['nama'] = $nama;


	$sql = "SELECT * FROM user WHERE id = $id";
	$rslt = $con->query($sql);
	while($row=$rslt->fetch_assoc()){
		$status = $row['status'];
		if($status == "off"){
			$sql2 = "UPDATE user SET tim = '$pilih', status = 'on' WHERE id = $id";
			$rslt2 = $con->prepare($sql2);
			$rslt2->execute();

			if (mysqli_query($con, $sql2)) {
            	echo "Success";
            	if($id == 2){
                	$sql3 = "UPDATE user SET status = 'off' WHERE id = '$id'";
                	$rslt3 = $con ->prepare($sql);
                	$rslt3->execute();
                }
            }
            else {
            	echo "Error: " . mysqli_error($con);
        	}
		}else{
			echo("Player $pilih sudah digunakan");
   		}
	}
 ?>