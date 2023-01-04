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
	<h1 class="game--title">TIC TAC TOE</h1>
	<div class="container">
		<div class="child">
			<div class="content">
				<p>YOUR NAME</p>
				<input type="text" id="txtPlayer" required><br>
			</div>
			<div class="content">
				<input type="radio" name="rdoPilih"  value="X" checked>Cross
				<input type="radio" name="rdoPilih"  value="O">Circle<br>
			</div>
			<div class="button">
				<button type="button" id="btnPlay" class="game--button">PLAY!</button>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		$("#btnPlay").click(function(){
			var nama = $("#txtPlayer").val();
			$.post("ajax_player.php",{
				player:$('input[name="rdoPilih"]:checked').val(),
				playerName:nama
			})
			.done(function(data){
				if(data == 'Success'){
					window.location = 'play.php';
				}
				alert(data);
			})
		});
	</script>
</body>
</html>