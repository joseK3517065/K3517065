<?php
	// mulai 
	session_start();

	if (isset($_COOKIE['username'])){
		$status = true;
	} else {
		$status = false;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Game CrazyMath</title>
</head>
<body>
	<h1>Crazy Math</h1>
	<form method="post" action="action.php" enctype="multipart/form-data">
		<?php
			
			if ($status == false){
		?>
			Masukkan Nama Anda <input type="text" name="username"><br>
			Masukkan Foto Anda <input type="file" name="userfile"><br>
			<input type="submit" name="submit1" value="Start !!">
		<?php		
			} else {
			// jika status = true (cookie username ada), maka tampilkan username
			// tanggal terakhir kali main, dan score. Data ini diambil dari cookie
			// serta tampilkan tombol submit dg nama 'submit2'	
			echo "<p>Welcome back, ".$_COOKIE['username']."</p>";
			if(empty($_COOKIE['lastime']) && empty($_COOKIE['score'])){
				//do nothing
			}else{
				echo "<p>Sebelumnya, terakhir kali Anda main game ini tanggal ".$_COOKIE['lasttime']." dengan score ".$_COOKIE['score']."</p>";
			}
		?>
			<input type="submit" name="submit2" value="Start !!!">
		<?php		
			}
		?>

		
	</form>
	<?php
		if(isset($_COOKIE['username'])){
	?>
		<a href="logout.php"><input type="submit" name="submit2" value="Bukan saya"></a>
	<?php
		}
	?>
	<?php
		// nilai inisialisasi lives dan score (simpan ke session)
		$_SESSION['lives'] = 5;
		$_SESSION['score'] = 0;
	?>
</body>
</html>