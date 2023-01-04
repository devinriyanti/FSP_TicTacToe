<?php
session_start();
if ($_SESSION["nama"] != null) {
	$id = $_SESSION["id"];
    $nama = $_SESSION["nama"];
} else {
    echo ("Error!");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TIC TAC TOE</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="../jquery-3.5.1.min.js"></script>
</head>
<body>
	<section>
		<h1 class="game--title">TIC TAC TOE</h1>
		<h2 class=".game--welcome">Selamat Bermain <?php echo $nama?>!</h2>
		<div class="game--container">
			<div id="C1" class="cell"></div>
            <div id="C2" class="cell"></div>
            <div id="C3" class="cell"></div>
            <div id="C4" class="cell"></div>
            <div id="C5" class="cell"></div>
            <div id="C6" class="cell"></div>
            <div id="C7" class="cell"></div>
            <div id="C8" class="cell"></div>
            <div id="C9" class="cell"></div>
		</div>
		<h2 class="game--status"></h2>
		<a href="index.php">
			<button class="game--button" id="btnPlayAgain">Play Again</button>
		</a>
	</section>
	<script type="text/javascript">
		var idPlayer = <?php echo $id;?>;
		$(".cell").click(function(){
			var id = $(this).attr('id');
			$.post("ajax_playGame.php",{
				idButton: id,
				idPlayer: idPlayer
			})
			.done(function(data){
				if(data == "OK"){

				}else{
					alert(data);
				}
			});
		});

        $('#btnPlayAgain').click(function() {
            $.post("ajax_playAgain.php", {})
            .done(function(data) {});
            session_destroy();
        });

		var win = 'win';

		$(document).ready(function() {
            setInterval(function() {
                get_data()
            }, 1000);

            function get_data() {
                $.post("ajax_game.php", {})
                .done(function(data) {
                    var jResult = JSON.parse(data);

                    for(i=0; i<jResult.length ; i++){
						if(jResult[i].user_id == 1){
							$("#"+ jResult[i].kotak).text("X");
						}else if(jResult[i].user_id == 2){
							$("#"+ jResult[i].kotak).text("O");
						}else{
							$("#"+ jResult[i].kotak).text("");
						}
					}

                    //win X
                    if (jResult[0].user_id == 1 && jResult[1].user_id == 1 && jResult[2].user_id == 1) {
                        win = 'X';
                    }
                    if (jResult[3].user_id == 1 && jResult[4].user_id == 1 && jResult[5].user_id == 1) {
                        win = 'X';
                    }
                    if (jResult[6].user_id == 1 && jResult[7].user_id == 1 && jResult[8].user_id == 1) {
                        win = 'X';
                    }
                    if (jResult[0].user_id == 1 && jResult[3].user_id == 1 && jResult[6].user_id == 1) {
                        win = 'X';
                    }
                    if (jResult[1].user_id == 1 && jResult[4].user_id == 1 && jResult[7].user_id == 1) {
                        win = 'X';
                    }
                    if (jResult[2].user_id == 1 && jResult[5].user_id == 1 && jResult[8].user_id == 1) {
                        win = 'X';
                    }

                    if (jResult[0].user_id == 1 && jResult[4].user_id == 1 && jResult[8].user_id == 1) {
                        win = 'X';
                    }
                    if (jResult[2].user_id == 1 && jResult[4].user_id == 1 && jResult[6].user_id == 1) {
                        win = 'X';
                    }


                    //Win O
                    if (jResult[0].user_id == 2 && jResult[1].user_id == 2 && jResult[2].user_id == 2) {
                        win = 'O';
                    }
                    if (jResult[3].user_id == 2 && jResult[4].user_id == 2 && jResult[5].user_id == 2) {
                        win = 'O';
                    }
                    if (jResult[6].user_id == 2 && jResult[7].user_id == 2 && jResult[8].user_id == 2) {
                        win = 'O';
                    }

                    if (jResult[0].user_id == 2 && jResult[3].user_id == 2 && jResult[6].user_id == 2) {
                        win = 'O';
                    }
                    if (jResult[1].user_id == 2 && jResult[4].user_id == 2 && jResult[7].user_id == 2) {
                        win = 'O';
                    }
                    if (jResult[2].user_id == 2 && jResult[5].user_id == 2 && jResult[8].user_id == 2) {
                        win = 'O';
                    }

                    if (jResult[0].user_id == 2 && jResult[4].user_id == 2 && jResult[8].user_id == 2) {
                        win = 'O';
                    }
                    if (jResult[2].user_id == 2 && jResult[4].user_id == 2 && jResult[6].user_id == 2) {
                        win = 'O';
                    }
                });

                if (win == 'X') {
                    $(".game--status").html("Selamat Pemain Cross (X) Menang!");
					win = 'win';
                } else if (win == 'O') {
                    $(".game--status").html("Selamat Pemain Circle (O) Menang!");
					win = 'win';
                }
            }
        });
	</script>
</body>
</html>