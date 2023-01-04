<?php
	$con = new mysqli("localhost","root","","fsp_uas");
	$pilihCell = $_POST['idButton'];
	$idPlayer = $_POST['idPlayer'];

	//echo $pilihCell;
	//echo $idPlayer;
	$sql = "SELECT * FROM user WHERE id = $idPlayer";
	$rslt = $con->query($sql);
	while($row = $rslt->fetch_assoc()){
		$status = $row['status'];
		if($status == "on"){
			$sql2 = "SELECT * FROM game WHERE kotak = '$pilihCell'";
			$rslt2 = $con->query($sql2);
			while($row2 = $rslt2->fetch_assoc()){
				$playerID = $row2['user_id'];
				//echo $playerID;
				if($playerID == ""){
					$update = "UPDATE game SET user_id = '$idPlayer' WHERE kotak='$pilihCell'";
					$updateRslt = $con->prepare($update);
					$updateRslt->execute();

					if(mysqli_query($con, $update)){
						echo "OK";

						if($idPlayer == 1){
							$sql1 = "UPDATE user SET status = 'off' WHERE id='$idPlayer'";
							$update1 = $con->prepare($sql1);
							$update1->execute();

							$sql2 = "UPDATE user SET status ='on' WHERE id ='2'";
							$update2 = $con->prepare($sql2);
							$update2->execute();
						}else{
							$sql1 = "UPDATE user SET status = 'off' WHERE id='$idPlayer'";
							$update1 = $con->prepare($sql1);
							$update1->execute();

							$sql2 = "UPDATE user SET status ='on' WHERE id ='1'";
							$update2 = $con->prepare($sql2);
							$update2->execute();
						}
					}else{
						echo "Error!";
					}
				}else{
					echo "Tidak dapat dipilih!";
				}
			}
		}else{
			echo "Belum Giliranmu!";
		}
	}
?>