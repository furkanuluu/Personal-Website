<?php 
require_once 'assets/connection.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Anasayfa</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand text-light">Navbar</a>
  <form class="form-inline">
    <?php if ($girissorgu == 1) {
    	echo '<a href="logout.php" class="btn btn-outline-light my-2 my-sm-0">Çıkış Yap</a>';
    } ?>
  </form>
</nav>

<div class="container-fluid" style="margin-top: 50px;">
	<div class="row">
		<div class="col-6">
			<?php if($girissorgu == 1){
				echo $a_ad.' '.$a_soyad.' Hoş Geldin.';
			} else {
				echo 'Merhaba ziyaretçi, sitemize hoş geldin. Kayıt olmak için hemen aşağıdaki butonu kullan.';
				echo '<a href="register.php" class="btn btn-block btn-dark" style="margin-top: 20px;"><b>HEMEN KAYIT OL</b></a>';
				echo '<a href="login.php" class="btn btn-block btn-dark" style="margin-top: 5px;"><b>HESABIM ZATEN VAR</b></a>';
			} ?>
		</div>
		<div class="col-6">
			<h3 class="text-center">Başlık</h3>
			<hr>
			Boş yazı alanı. Boş yazı alanı. Boş yazı alanı. Boş yazı alanı. Boş yazı alanı. Boş yazı alanı. Boş yazı alanı. Boş yazı alanı. Boş yazı alanı. Boş yazı alanı. Boş yazı alanı.
		</div>
	</div>
	<div >
		
	</div>
</div>


</body>
</html>