<?php require_once 'assets/connection.php';
if(isset($_GET['page'])){
	$page = mysql_real_escape_string(trim($_GET['page']));
} else {
	$page = "";
}
if(isset($_GET['sonuc'])){
	$sonuc = mysql_real_escape_string(trim($_GET['sonuc']));
} else {
	$sonuc = "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil Ekranı</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<?php if($girissorgu == "1"){ ?>

		<div class="container-fluid" style="margin-top: 50px;">
			<div class="row justify-content-center">
				<div class="col-11 bg-light" style="border-radius: 10px;">
					<div class="row" style="margin-bottom: 50px;">
						<div class="col-12 bg-dark" style="border-radius: 50px;">
							<ul class="nav justify-content-center" style="margin-top: 5px; margin-bottom: 5px;">
								<li class="nav-item">
									<a class="nav-link text-white" href="profile.php?page=1"><b>Profil Bilgileri</b></a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-white" href="profile.php?page=2"><b>Ayarlar</b></a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-white" href="profile.php?page=3"><b>BlaBla</b></a>
								</li>
							</ul>
						</div>
					</div>
					



					<?php 
					switch ($page) {
						case '1': ?>

						<div class="col-12">
							<h3 class="text-center">Profil Bilgileri</h3>
							<hr>
							<div class="row">
								<div class="col-12">
									<p><b>Ad Soyad:</b> <?=$a_ad;?> <?=$a_soyad;?></p><br>
									<p><b>Email Adresi:</b> <?=$a_email;?></p>
								</div>
							</div>
						</div>

						<?php	
						break;
						
						case '2':
						?>

						<div class="col-12">
							<h3 class="text-center">Ayarlar</h3>
							<hr>
							<?php if($sonuc == "1"){
								echo '<div class="alert alert-success" role="alert">Şifreniz başarıyla değiştirildi.</div>';
								echo '<meta http-equiv="refresh" content="5;URL=profile.php?page=2">';
							} elseif ($sonuc == "2"){
								echo '<div class="alert alert-warning" role="alert">Eski şifreniz doğru değil.</div>';
							} elseif ($sonuc == "3"){
								echo '<div class="alert alert-warning" role="alert">Yeni şifreleriniz birbiriyle uyuşmuyor.</div>';
							} elseif ($sonuc == "4"){
								echo '<div class="alert alert-danger" role="alert">Boş bıraktığınız alanlar var!</div>';
							}?>
							<div class="row justify-content-center">
								<div class="col-6">
									<form action="profile.php?page=2" method="POST">
										<div class="form-group">
											<label>Eski Şifreniz:</label>
											<input type="password" class="form-control" name="eskisifre">
										</div>
										<div class="form-group">
											<label>Yeni Şifreniz:</label>
											<input type="password" class="form-control" name="yenisifre">
										</div>
										<div class="form-group">
											<label>Yeni Şifreniz Tekrar:</label>
											<input type="password" class="form-control" name="yenisifretekrar">
										</div>
										<div class="form-group">
											<a title="Değiştir" type="button" class="btn btn-dark btn-block text-" data-toggle="modal" data-target="#exampleModal">
												<b class="text-white">Şifreyi Değiştir</b>
											</a>

											<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Değişiklik yapmak istediğinizden emin misiniz?</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															Yaptığınız bu değişiklik geri döndürülemez. Emin misiniz?
														</div>
														<div class="modal-footer">
															<a title="Geri Dön" type="button" class="btn btn-secondary" data-dismiss="modal">Geri Dön</a>
															<button type="submit" name="sifredegistir" class="btn btn-warning">Eminim, Şifremi Değiştir.</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>

						<?php
						break;

						default:
						?>

						<div class="col-12">
							<h3 class="text-center">Profil Bilgileri</h3>
							<hr>
							<div class="row">
								<div class="col-12">
									<p><b>Ad Soyad:</b> <?=$a_ad;?> <?=$a_soyad;?></p><br>
									<p><b>Email Adresi:</b> <?=$a_email;?></p>
								</div>
							</div>
						</div>

						<?php
						break;
					} ?>

				</div>
			</div>
		</div>

	<?php } ?>
</body>
</html>
<?php 
if(isset($_POST['sifredegistir'])){
	$eskisifre = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_POST['eskisifre']))));
	$yenisifre = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_POST['yenisifre']))));
	$yenisifretekrar = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_POST['yenisifretekrar']))));

	if($eskisifre == "" OR $yenisifre == "" OR $yenisifretekrar == "" OR $eskisifre == " " OR $yenisifre == " " OR $yenisifretekrar == " " OR $eskisifre == "	" OR $yenisifre == "	" OR $yenisifretekrar == "	"){

		header("Location: profile.php?page=2&sonuc=4");
		exit();

	} else {

		if($eskisifre == $a_sifre){

			if($yenisifre == $yenisifretekrar){

				mysql_query("UPDATE hesaplar SET sifre='".$yenisifre."' WHERE id='".$a_id."'");
				header("Location: profile.php?page=2&sonuc=1");
				exit();

			} else {
				header("Location: profile.php?page=2&sonuc=3");
				exit();
			}

		} else {
			header("Location: profile.php?page=2&sonuc=2");
			exit();
		}

	}
}

?>