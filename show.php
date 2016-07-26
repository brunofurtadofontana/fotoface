<?php require('config/conexao.php'); ?>
<html>
<head>
	<title>Mensageiro mundo senai</title><!--titulo do site no navegador-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen"/>
    <link href="css/style.css" rel="stylesheet" media="screen"/>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-1.10.0.min.js"></script>
    <meta http-equiv="refresh" content="60;URL=show.php">
    <script src=""></script>
<script type="text/javascript">
//script que muda as cores do background fazendo um efeito graadiente e fadein
var colors = new Array(
  [62,35,255],
  [60,255,60],
  [255,35,98],
  [45,175,230],
  [255,0,255],
  [255,128,0]);

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

//transition speed
var gradientSpeed = 0.002;

function updateGradient()
{
var c0_0 = colors[colorIndices[0]];
var c0_1 = colors[colorIndices[1]];
var c1_0 = colors[colorIndices[2]];
var c1_1 = colors[colorIndices[3]];

var istep = 1 - step;
var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
var color1 = "#"+((r1 << 16) | (g1 << 8) | b1).toString(16);

var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
var color2 = "#"+((r2 << 16) | (g2 << 8) | b2).toString(16);

 $('body').css({
   background: "-webkit-gradient(linear, left bottom, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
  
  step += gradientSpeed;
  if ( step >= 1 )
  {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];
    
    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    
  }
}
setInterval(updateGradient,10);
</script>
<script type="text/javascript">
 $(document).ready(function(){
	$(".load").show("fast");
	$(".box").hide("slow");
	$(".load").hide(7000);
	$(".box").show(3000);
});
</script>
</head>

<body id="corpo">
	<div class="container">
	<div class="row-fluid">
	<header>
		<center><h1 style="color:#fff;text-shadow: 0px 2px 3px #666;">#mundosenaichapeco</h1></center>
		<center><img class="load" src="img/loading.gif" width="100" /></center>
	</header>

		<?php
			$result = mysql_query("SELECT *FROM fotos JOIN mensagem WHERE fotos_id = mensagem_fotos_id order by mensagem_id desc")or die(mysql_error());
			if(count($result)>0){ ?>
				
		<?php
			while ($exibe = mysql_fetch_assoc($result)) {
				$id = $exibe['mensagem_id'];
		?>
			<?php if($id % 2 == 1){ ?>
			<div class="box" style="width:100%;height:auto;float:left;">
			<div class="img">
				<span style=""><img class="img-polaroid"  src="photobooth2/uploads/thumbs/<?php echo $exibe['fotosThumb']; ?>" /></span>
			</div>
			<div class="balaodialogo">

					<h2 style="border-bottom:1px solid #ccc;color:#fff;text-shadow: 0px 2px 3px #777;"><?php echo $exibe['mensagem_nome']; ?></h2>
					<span style="min-height:100px;font-weight:bold;color:#ccc;font-size:18px;"><span style="border: 1px solid #ccc;border-radius:5px;background:#111;color:#0099cc;">#MUNDOSENAICHAPECO</span> <?php echo $exibe['mensagem_txt']; ?></span><br>
					<span style="margin-top:98px;float:right;font-weight:bold;color:#ccc;">POSTADO NO FACEBOOK: <?php echo $exibe['mensagem_data']; ?></span>
					
			</div>
			</div>
			<?php }
			else{  ?>
			<div class="box" style="width:100%;height:auto;float:left;">
				<div class="imgRight">
				<span style=""><img class="img-polaroid"  src="photobooth2/uploads/thumbs/<?php echo $exibe['fotosThumb']; ?>" /></span>
			</div>
			<div class="balaodialogoRight">
					<h2 style="text-align:right;border-bottom:1px solid #ccc;color:#fff;text-shadow: 0px 2px 3px #777;"><?php echo $exibe['mensagem_nome']; ?></h2>
					<span style="text-align:right;min-height:100px;font-weight:bold;color:#ccc;font-size:18px;"><span style="border: 1px solid #ccc;border-radius:5px;background:#111;color:#0099cc;">#MUNDOSENAICHAPECO</span> <?php echo $exibe['mensagem_txt']; ?></span><br>
					<span style="margin-top:98px;float:left;font-weight:bold;color:#ccc;">POSTADO NO FACEBOOK: <?php echo $exibe['mensagem_data']; ?></span>
			</div>
			</div>

			<?php } ?>

		<?php } 

			}
			else{
				echo "<h2>Nenhuma mensagem cadastrada</h2>";
			}
			?>
	</div>
</div>
</body>
</html>