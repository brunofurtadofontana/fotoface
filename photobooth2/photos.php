<!DOCTYPE HTML>
<html lang="en">
<head>

<!-- charset -->
<meta charset="UTF-8">

<!-- Title, description and keywords -->
<title>Fotos</title>
<meta name="description" content="A premium (X)HTML &amp; CSS template designed and developed by TahaH Studio">
<meta name="keywords" content="xero, XHTM, CSS, Template, Professional, Mulicolour, TahaH, Themeforest">
<meta http-equiv="refresh" content="150;url=photos.php" />

<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/slider.css" media="screen">
<link rel="stylesheet" type="text/css" id="skin" href="css/skins/sky-blue.css" media="screen">

<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie.css" media="all">
<![endif]-->

<!-- Javascripts -->
<script type="text/javascript" src="js/jquery.min.js"></script>


<script type="text/javascript" src="js/jquery.nivoslider.pack.js"></script>
<script type="text/javascript" src="js/xero.forms.js"></script>
<script type="text/javascript" src="js/xero.js"></script>

<script type="text/javascript">
	// Nivo Slider Options
	$(document).ready(function(){	
		$("#slider").nivoSlider({
			effect:				'random',	//Specify sets like: 'fold, fade, sliceDown'
			slices:				20,
			pauseTime:			5000,
			directionNavHide:	false,
			pauseOnHover:		true,		//Stop animation while hovering
			manualAdvance:		false,		//Force manual transitions
			captionOpacity:		0.8		//Universal caption opacity
		});
	});
</script>
</head>
<center>
<div id="slider_container">				
				<div id="slider">
				
				<?php 
					$pasta = 'uploads/original/';
					$arquivo = glob("$pasta{*.jpg,*.png,*.gif,*.bmp}", GLOB_BRACE);
					foreach($arquivo as $img){
				?>
					<a href="<?echo $img; ?>" target="_blank">
						<img src="<?php echo $img; ?>"  width="520" height="350" alt="SENAI" title='MUNDO SENAI CHAPECÓ-SC'>
					</a>
					<?}?>
					
				</div>
				<!-- actual slider--> 
				</div>
</center>
</body>

</html>