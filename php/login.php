<?php 
require_once 'assets/connection.php';

if(isset($_GET['adim'])){
	$adim = mysql_real_escape_string(trim($_GET['adim']));
} else {
	$adim = "";
}

if(isset($_GET['error'])){
	$error = mysql_real_escape_string(trim($_GET['error']));
} else {
	$error = "";
}

switch ($adim) {
	case "":
	if($girissorgu == 1){
		header("Location: index.php");
		exit();
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Login Ekranı</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body>



		<?php 
		if($error == "1"){
			echo '<div class="alert alert-danger" role="alert">Email hesabı hatalı, kontrol ediniz.</div>';
		} elseif ($error == "2"){
			echo '<div class="alert alert-warning" role="alert">Şifre veya Email alanı boş, kontrol ediniz.</div>';
		} elseif ($error == "4"){
			echo '<div class="alert alert-success" role="alert">Başarıyla kayıt yaptınız. Hesabınızla giriş yapınız.</div>';
		}

		?>


		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-12 align-self-center" style="margin-top: 50px;">
					<h2 class="text-center">Login Paneli</h2>
					<hr>
				</div>
					<div class="col-6">
						<form action="login.php?adim=basarili" method="POST">
							<div class="row justify-content-center">
								<div class="col-12" style="margin-top: 15px;">
									<label>Email:</label>
									<input type="email" class="form-control" name="email" placeholder="Email Hesabınız">
								</div>
								<div class="col-12" style="margin-top: 15px;">
									<label>Şifre:</label>
									<input type="password" class="form-control" name="sifre" placeholder="Password">
								</div>
								<div class="col-12" style="margin-top: 15px;">
									<button type="submit" class="btn btn-block btn-dark" name="login"><b>LOGIN</b></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>






		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
	</html>
	<?php 
	break;

	case "basarili":

	if(isset($_POST['login'])){

		$email = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_POST['email']))));
		$sifre = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_POST['sifre']))));

		if($email == "" OR $sifre == "" OR $email == "	" OR $sifre == "	" OR $email == " " OR $sifre == " "){

			header("Location: login.php?error=2");
			exit();

		} 
		else {

			if(filter_var($email, FILTER_VALIDATE_EMAIL)){

				$uyeler = mysql_query("SELECT * FROM hesaplar WHERE email='".$email."' AND sifre='".$sifre."'");

				$uyebul = mysql_num_rows($uyeler);

				if($uyebul > 0){
					$query = mysql_query("SELECT * FROM hesaplar WHERE email='".$email."' AND sifre='".$sifre."'");
					while($sonuc = mysql_fetch_array($query)){

						$_SESSION['id'] = $sonuc['id'];
						$_SESSION['login'] = 5;
						header("Location: index.php");
						exit();
					}
				}

			} else {
				header("Location: login.php?error=1");
				exit();
			}

		}

	}

	echo '<script type="text/javascript">alert("'.$email.'");</script>';

	break; 
}

?>