
<?php 
	require('config/conexao.php'); //Arquivo que faz a conexao com o banco de dados
	if(isset($_POST["Enviar"])){ // se o botão enviar for setado
		$nome = $_POST["nome"]; //Pega via post o nome digitado no furmulário
		$mensagem = $_POST['mensagem'];//Pega via Post a mensagem digitada no textarea
		$palavroes = array(//vetor com palavrões para evitar bagunça nos posts
			'PORRA',
			'CARALHO',
			'CUZAO',
			'MERDA',
			'BUCETA',
			'CÚ',
			'CU',
			'PENIS',
			'PÊNIS',
			'ANUS',
			'-NUS',
			'BABA-OVO',
			'BABAOVO',
			'BABACA',
			'BACURA',
			'BAGOS',
			'BAITOLA',
			'BEBUM',
			'BESTA',
			'BICHA',
			'BISCA',
			'BIXA',
			'BOAZUDA',
			'BOCETA',
			'BOCO',
			'BOC+',
			'BOIOLA',
			'BOLAGATO',
			'BOQUETE',
			'BOLCAT',
			'BOSSETA',
			'BOSTA',
			'bostas',
			'BOSTANA',
			'BRECHA',
			'BREXA',
			'BRIOCO',
			'BRONHA',
			'BUCA',
			'BUCETA',
			'BUNDA',
			'BUNDUDA',
			'BURRA',
			'BURRO',
			'BUSSETA',
			'CACHORRA',
			'CACHORRO',
			'CADELA',
			'CAGA',
			'CAGADO',
			'CAGAO',
			'CAGONA',
			'CANALHA',
			'CARALHO',
			'CASSETA',
			'CASSETE',
			'CHECHECA',
			'CHERECA',
			'CHIBUMBA',
			'CHIBUMBO',
			'CHIFRUDA',
			'CHIFRUDO',
			'CHOTA',
			'CHOCHOTA',
			'CHUPADA',
			'CHUPADO',
			'CLITORIS',
			'CLIT+RIS',
			'COCAINA',
			'COCA-NA',
			'COCO',
			'COC+',
			'CORNA',
			'CORNO',
			'CORNUDA',
			'CORNUDO',
			'CORRUPTA',
			'CORRUPTO',
			'CRETINA',
			'CRETINO',
			'CRUZ-CREDO',
			'CU',
			'C+',
			'CULHAO',
			'CULH+O',
			'CULH+ES',
			'CURALHO',
			'CUZAO',
			'CUZ+O',
			'CUZUDA',
			'CUZUDO',
			'DEBIL',
			'DEBILOIDE',
			'DEFUNTO',
			'DEMONIO',
			'DEM+NIO',
			'DIFUNTO',
			'DOIDA',
			'DOIDO',
			'EGUA',
			'+GUA',
			'ESCROTA',
			'ESCROTO',
			'ESPORRADA',
			'ESPORRADO',
			'ESPORRO',
			'ESP+RRO',
			'ESTUPIDA',
			'EST+PIDA',
			'ESTUPIDEZ',
			'ESTUPIDO',
			'EST+PIDO',
			'FEDIDA',
			'FEDIDO',
			'FEDOR',
			'FEDORENTA',
			'FEIA',
			'FEIO',
			'FEIOSA',
			'FEIOSO',
			'FEIOZA',
			'FEIOZO',
			'FELACAO',
			'FELA¦+O',
			'FENDA',
			'FODA',
			'FODAO',
			'FOD+O',
			'FODE',
			'FODIDA',
			'FODIDO',
			'FORNICA',
			'FUDENDO',
			'FUDECAO',
			'FUDE¦+O',
			'FUDIDA',
			'FUDIDO',
			'FURADA',
			'FURADO',
			'FURAO',
			'FUR+O',
			'FURNICA',
			'FURNICAR',
			'FURO',
			'FURONA',
			'GAIATA',
			'GAIATO',
			'GAY',
			'GONORREA',
			'GONORREIA',
			'GOSMA',
			'GOSMENTA',
			'GOSMENTO',
			'GRELINHO',
			'GRELO',
			'HOMO-SEXUAL',
			'HOMOSEXUAL',
			'HOMOSSEXUAL',
			'IDIOTA',
			'IDIOTICE',
			'IMBECIL',
			'ISCROTA',
			'ISCROTO',
			'JAPA',
			'LADRA',
			'LADRAO',
			'LADR+O',
			'LADROEIRA',
			'LADRONA',
			'LALAU',
			'LEPROSA',
			'LEPROSO',
			'LESBICA',
			'L+SBICA',
			'MACACA',
			'MACACO',
			'MACHONA',
			'MACHORRA',
			'MANGUACA',
			'MANGUA¦A',
			'MASTURBA',
			'MELECA',
			'MERDA',
			'MIJA',
			'MIJADA',
			'MIJADO',
			'MIJO',
			'MOCREA',
			'MOCR+A',
			'MOCREIA',
			'MOCR+IA',
			'MOLECA',
			'MOLEQUE',
			'MONDRONGA',
			'MONDRONGO',
			'NABA',
			'NADEGA',
			'NOJEIRA',
			'NOJENTA',
			'NOJENTO',
			'NOJO',
			'OLHOTA',
			'OTARIA',
			'OT-RIA',
			'OTARIO',
			'OT-RIO',
			'PACA',
			'PASPALHA',
			'PASPALHAO',
			'PASPALHO',
			'PAU ',
			'PEIA',
			'PEIDO',
			'PEMBA',
			'PENIS',
			'P-NIS',
			'PENTELHA',
			'PENTELHO',
			'PERERECA',
			'PERU',
			'PER+',
			'PICA',
			'PICAO',
			'PIC+O',
			'PILANTRA',
			'PIRANHA',
			'PIROCA',
			'PIROCO',
			'PIRU',
			'PORRA',
			'PREGA',
			'PROSTIBULO',
			'PROST-BULO',
			'PROSTITUTA',
			'PROSTITUTO',
			'PUNHETA',
			'PUNHETAO',
			'PUNHET+O',
			'PUS',
			'PUSTULA',
			'P+STULA',
			'PUTA',
			'PUTO',
			'PUXA-SACO',
			'PUXASACO',
			'RABAO',
			'RAB+O',
			'RABO',
			'RABUDA',
			'RABUDAO',
			'RABUD+O',
			'RABUDO',
			'RABUDONA',
			'RACHA',
			'RACHADA',
			'RACHADAO',
			'RACHAD+O',
			'RACHADINHA',
			'RACHADINHO',
			'RACHADO',
			'RAMELA',
			'REMELA',
			'RETARDADA',
			'RETARDADO',
			'RIDICULA',
			'RID-CULA',
			'ROLA',
			'ROLINHA',
			'ROSCA',
			'SACANA',
			'SAFADA',
			'SAFADO',
			'SAPATAO',
			'SAPAT+O',
			'SIFILIS',
			'S-FILIS',
			'SIRIRICA',
			'TARADA',
			'TARADO',
			'TESTUDA',
			'TEZAO',
			'TEZ+O',
			'TEZUDA',
			'TEZUDO',
			'TROCHA',
			'TROLHA',
			'TROUCHA',
			'TROUXA',
			'TROXA',
			'VACA',
			'VADIA',
			'VÁDIA',
			'VAGABUNDA',
			'VAGABUNDO',
			'VAGINA',
			'VEADA',
			'VIADINHO',
			'VEADAO',
			'VEAD+O',
			'VEADO',
			'VIADA',
			'VIADO',
			'VIADAO',
			'VIAD+O',
			'XAVASCA',
			'XERERECA',
			'XEXECA',
			'XIBIU',
			'XIBUMBA',
			'XOTA',
			'XOCHOTA',
			'XOXOTA',
			'XANA',
			'XANINHA');
		
		$mensagemUpper = strtoupper($mensagem);//Transforma toda a mensagem em maiusculo
		$mensagem =str_replace($palavroes, " ****** ", $mensagemUpper); //verifica se possui palavrões e troca por asteriscos
		$resultFotos = "SELECT MAX(fotos_id) FROM fotos";
		$mostrarFotos = mysql_query($resultFotos);
		$max = mysql_result($mostrarFotos,0,0);
		//echo $max;

		$fotos = mysql_query("SELECT *FROM fotos WHERE fotos_id = '$max' ")or die(mysql_error());
		$mostrar = mysql_fetch_assoc($fotos);
		$fotos_id = $mostrar['fotos_id'];//id da foto sempre será 1 pois sempre que é postado no facebook e deletada as imagens e deletado o banco de dados
		$data = date('d/m/y - H:m:s');//pega a data e a hora da postagem
		
		/* Faz a inserção no banco de dados 'msg' na tabela 'mensagem' nos campos mensagem_fotos_id(fk) - mensagem_nome, mensagem_txt,mensagem_data */
		$res = mysql_query("insert into mensagem(mensagem_fotos_id,mensagem_nome,mensagem_txt,mensagem_data)VALUES('$fotos_id','$nome','$mensagem','$data')")or die(mysql_error());
		
		if($res){// se a inserção estiver ok aparece a mensagem de sucesso
			echo "<div class='alertSus'><p><img src='img/checked.png' width='30'/>Mensagem enviada com sucesso!</p></div>";
		}
		else{//senao mostra uma mensagem de erro
			echo "<div class='alertEr'><p>Erro ao enviar sua mensagem!</p></div>";
		}	
	}
?>
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
    <script src="js/ajax.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body style="background:#222;color:#eee;">
	<div class="container" >
	<div class="row-fluid">
		<center><h1>#mundosenaichapeco</h1></center>
		<?php
			sleep(3);//timer de 3 segundos até carregar a imagem
			$resultFotos = "SELECT MAX(fotos_id) FROM fotos";
			$mostrarFotos = mysql_query($resultFotos);
			$max = mysql_result($mostrarFotos,0,0);
			//echo $max;

			$fotos = mysql_query("SELECT *FROM fotos WHERE fotos_id = '$max' ")or die(mysql_error());
			$mostrar = mysql_fetch_assoc($fotos);

			if($mostrar>0){
		?>
		<center><span><img style="box-shadow:2px 2px 10px #ccc;" class="img-polaroid" src="photobooth2/uploads/main/<?php echo $mostrar['fotosDelete']; ?>" /></span></center>
		<?php } 
		else{
			echo "<center><h2 style='color:red'>Ops tire uma foto primeiro</h2></center>";
		}

		?>
		<h3>Digite seu nome e uma mensagem para postar na fã page do SENAI INFORMÁTICA</h3>
	</div>
	<div class="row-fluid">
		
		<form id="form-msg" action="" method="post">
			<input type="text" class="input-large"  name="nome" placeholder="Nome" required="required"><br>
			<textarea cols="45" id="campo" rows="5" placeholder="Digite sua mensagem..." name="mensagem" onkeyup="mostrarResultado(this.value,160,'spcontando');contarCaracteres(this.value,160,'sprestante')"></textarea><br />
			<span id="spcontando" style="font-family:Georgia;color:red;">Ainda não temos nada digitado..</span><br />
			<span id="sprestante" style="font-family:Georgia;"></span><br>
			<br><input class="btn" type="submit" value="Enviar" name="Enviar">

		</form>
	</div>
	<div class="row-fluid" style="color:#222;">
		
		<?php
			$result = mysql_query("SELECT *FROM fotos JOIN mensagem WHERE fotos_id = mensagem_fotos_id order by mensagem_id desc LIMIT 2")or die(mysql_error());
			if($result){ ?>
				<h1>Histórico de mensagens</h1>
		<?php
			while ($exibe = mysql_fetch_assoc($result)) {
				$id = $exibe['mensagem_id'];
		?>
			<div class="desc">
					<h2 style="border-bottom:1px solid #ccc;"><?php echo $exibe['mensagem_nome']; ?></h2>
					<span><?php echo $exibe['mensagem_txt']; ?></span><br>
				<?php if($exibe>0){ ?>
					<span style=""><img class="img-polaroid"  src="photobooth2/uploads/thumbs/<?php echo $exibe['fotosThumb']; ?>" /></span>
				<?php } ?>
					<span style="float:right;"><?php echo $exibe['mensagem_data']; ?></span>
					<br><br><a class="btn btn-danger" href="config/deletar_post.php?id=<?php echo $exibe['mensagem_id']?>&fotos_id=<?php echo $exibe['fotos_id']?>">Deletar</a>&nbsp;<a class="btn btn-primary" href="photos/post.php?id=<?php echo $exibe['mensagem_id']?>&fotos_id=<?php echo $mostrar['fotos_id']?>">Postar no facebook?</a>
			</div>
		<?php } 

			}
			else{
				echo "<h2>Nenhuma mensagem cadastrada</h2>";
			}
			?>
	</div>
	</div>
	<div id="show"></div>
</body>
</html>