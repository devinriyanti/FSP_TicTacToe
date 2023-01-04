<?php
    $con = new mysqli("localhost","root","","fsp_uas");

    $sql ="UPDATE game set user_id = null";
    $rslt=$con->prepare($sql);
    $rslt->execute();

    if (mysqli_query($con, $sql)) {
        
        echo "Success";
    } else {

        echo "Error: " . mysqli_error($con);
    }

    $sql2 = "UPDATE user SET status = 'off'";
    $update = $con ->prepare($sql2);
    $update->execute();

?>