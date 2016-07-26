<?php
	include("config/conexao.php");

			$result = mysql_query("SELECT *FROM fotos JOIN mensagem WHERE fotos_id = mensagem_fotos_id order by mensagem_id desc")or die(mysql_error());
			if($result){ ?>
				
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
			<div style="width:100%;height:auto;float:left;">
				<div class="imgRight">
				<span style=""><img class="img-polaroid"  src="photobooth2/uploads/thumbs/<?php echo $exibe['fotosThumb']; ?>" /></span>
			</div>
			<div class="balaodialogoRight">
					<h2 style="text-align:right;border-bottom:1px solid #ccc;color:#fff;text-shadow: 0px 2px 3px #777;"><?php echo $exibe['mensagem_nome']; ?></h2>
					<span style="text-align:right;min-height:100px;font-weight:bold;color:#ccc;font-size:18px;"><span style="border: 1px solid #ccc;border-radius:5px;background:#111;color:#0099cc;">#MUNDOSENAICHAPECO</span> <?php echo $exibe['mensagem_txt']; ?></span><br>
					<span style="margin-top:98px;float:left;font-weight:bold;color:#ccc;">POSTADO NO FACEBOOK: <?php echo $exibe['mensagem_data']; ?></span>
			</div>
			</div>

			<?php }?>

		<?php } 

			}
			else{
				echo "<h2>Nenhuma mensagem cadastrada</h2>";
			}
			?>
