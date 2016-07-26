<html>
<head>
<script type="text/javascript" src="js/jqueryCycle.js"></script>
<script>
$('#slider').cycle({ 
    fx:      'turnDown', 
    delay:   -4000 
});
</script>
</head>
<body>
			<div id="slider">
				<?php 
					$pasta = 'uploads/original/';
					$arquivo = glob("$pasta{*.jpg,*.png,*.gif,*.bmp}", GLOB_BRACE);
					foreach($arquivo as $img){
				?>
					<a href="<?echo $img; ?>" target="_blank">
						<img src="<?php echo $img; ?>"  width="500" height="250" alt="">
					</a>
					<?}?>
					
			</div>
</body>
</html>