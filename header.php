<?php
  session_start();
  require 'db.php';

  $select = "SELECT * FROM main_logos";
  $select_res = mysqli_query($db_connect, $select);
  $select_assoc = mysqli_fetch_assoc($select_res); 

  $f_select = "SELECT * FROM footer_logo";
  $f_select_res = mysqli_query($db_connect, $f_select);
  $f_select_assoc = mysqli_fetch_assoc($f_select_res);

  $c_select = "SELECT * FROM footer_contents";
  $c_select_res = mysqli_query($db_connect, $c_select);
  $c_select_assoc = mysqli_fetch_assoc($c_select_res);

  $h_select = "SELECT * FROM hero_area";
  $h_select_res = mysqli_query($db_connect, $h_select);
  $h_select_assoc = mysqli_fetch_assoc($h_select_res);

  $m_select = "SELECT * FROM main_menu";
  $m_select_res = mysqli_query($db_connect, $m_select);
  $m_select_assoc = mysqli_fetch_assoc($m_select_res);

  $select_ex = "SELECT * FROM expertise WHERE status=1";
  $select_ex_res = mysqli_query($db_connect, $select_ex);

  $select_portfolio = "SELECT * FROM portfolios";
  $select_portfolio_res = mysqli_query($db_connect, $select_portfolio);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="portfolio,creative,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="themeturn.com">

  <title>Ratsaan | Portfolio</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Themeify Icon Css -->
  <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="plugins/animate-css/animate.css">
  <link rel="stylesheet" href="plugins/aos/aos.css">
  <!-- owl carousel -->
  <link rel="stylesheet" href="plugins/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="plugins/owl/assets/owl.theme.default.min.css" >
  <!-- Slick slider CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="portfolio" id="top">

<!-- Navigation start -->
<nav class="navbar navbar-expand-lg bg-transprent py-4 fixed-top navigation" id="navbar">
	<div class="container">
	  <a class="navbar-brand" href="index.html">
	  	<img src="uploads/logos/<?=$select_assoc['main_logo']?>" width="200" alt="logo"/>
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
		<span class="ti-view-list"></span>
	  </button>
  
	  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
         <?php foreach($m_select_res as $value) { ?>
          <li class="nav-item">
            <a class="nav-link smoth-scroll" href="<?=$value['sec_id']?>"><?=$value['menu_name']?></a>
          </li>
        <?php } ?>
			</ul>
	  </div>
	</div>
</nav>
<!-- Navigation End -->