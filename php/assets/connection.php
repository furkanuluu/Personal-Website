<?php 

$connection = @ mysql_connect('localhost','root','') or die("MySQL Bağlantısı Sağlanamadı.");
mysql_select_db('uyelik_sistemi', $connection) or die("Veritabanı Bağlantısı Sağlanamadı.");
mysql_query("SET NAMES utf8");

session_start();

if(isset($_SESSION['login'])){
	if($_SESSION['login'] == 5){

		$id = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_SESSION['id']))));

		$uyequery = mysql_query("SELECT * FROM hesaplar WHERE id='".$id."'");

		while($uyesonuc = mysql_fetch_array($uyequery)){

			$a_id = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['id']))));
			$a_ad = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['ad']))));
			$a_soyad = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['soyad']))));
			$a_email = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['email']))));
			$a_sifre = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['sifre']))));

			$girissorgu = 1;

		}
	} else {
		$girissorgu = 0;
	}
} else {
	$girissorgu = 0;
}

 ?>