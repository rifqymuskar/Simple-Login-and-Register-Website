<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<!-- custom link -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700,800,300"/>
	
	<?php require 'public/css.php'; ?>

</head>
<body data-url="<?=site_url()?>">
	<?=isset($navbar) ? $navbar : '' ?>
	<?=isset($content) ? $content : '' ?>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
	<?php require 'public/js.php'; ?>

</body>
</html>

