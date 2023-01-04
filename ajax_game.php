<?php
    $con = new mysqli("localhost","root","","fsp_uas");

    $arr = array();

    $sql = "SELECT * FROM game";
    $rslt = $con->query($sql);
    while($row = $rslt->fetch_assoc()){

        $row_array['user_id']=$row['user_id'];
        $row_array['kotak'] =$row['kotak'];
        array_push($return_arr,$row_array);
    }
    echo json_encode($arr);
    $con->close();
?>