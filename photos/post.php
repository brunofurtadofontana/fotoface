<?php
// biblioteca do facebook
require 'src/facebook.php';
 
include "../config/conexao.php";
// consultas no banco de dados

$id_mensagem=$_GET['id']; //Pega o id da mensagem via metodo get que vem da pagina index.php
$fotos_id=$_GET['fotos_id']; //Pega o id da foto via metodo get que vem da pagina index.php

    $result = mysql_query("SELECT *FROM mensagem WHERE mensagem_id='".$id_mensagem."'")or die(mysql_error());
        $exibe=mysql_fetch_array($result);
        $nome =  $exibe['mensagem_nome'];
        $txt =  $exibe['mensagem_txt'];


    $result2 = mysql_query("SELECT *FROM fotos WHERE  fotos_id='".$fotos_id."'")or die(mysql_error());
        $mostrar = mysql_fetch_assoc($result2);
        $foto = $mostrar['fotosDelete'];
// ATENCAO, configurar os parametros abaixo
$APP_ID = "537072076424768"; // id da app
$SECRET = "50207bc3f13d3b4dbb70e861d3aa2d7d"; // secret da app
$FANPAGE_ID = "575818662454461"; // id da fanpage que vai publicar
$IMAGEM_UPLOAD = '../photobooth2/uploads/main/'.$foto; // local do arquivo de imagem do upload
$ACCESS_TOKEN = "CAAHodtZAVhkABALpDOmbsC7eyXkMjuFcjLVIMsroo9TMEv4nw8qnGTuan2yZAGTWwjbuHBSWJBwJABkFeTdKTRNEBDDJNFXgVrKZBFd34gSpTifzX71RNaMbuRlulDeSBNbtqthVpZAWXrZBopoXzZAASUCo9ovuE3F2vq8BxptyHFXobChCxu2RAa1ab9x3pJ6Rt7VKvlMBZAyrts8sNXZC"; // token obtido pelo gera-token.php
// objeto do facebook
$facebook = new Facebook(array(
  'appId'  => $APP_ID,
  'secret' => $SECRET,
));
 
// obtendo o access token da fanpage a partir do access token do usuario administrador
$graph_url = "https://graph.facebook.com/me/accounts?access_token=" . $ACCESS_TOKEN;
$accounts = json_decode(file_get_contents($graph_url));
 
$FANPAGE_ACCESS_TOKEN = null;
foreach($accounts->data as $result) {
        if($result->id == $FANPAGE_ID) {
                $FANPAGE_ACCESS_TOKEN = $result->access_token;
        }
}
 
// encontrou o access token da fanpage
if($FANPAGE_ACCESS_TOKEN) {
        // determina que sera realizado upload de arquivos
        $facebook->setFileUploadSupport(true);
 
        try {
                // parametros da postagem
                $post_data = array(
                        "message" => "#mundosenai " . $txt,
                        "image" => '@' . realpath($IMAGEM_UPLOAD),
                        'access_token' => $FANPAGE_ACCESS_TOKEN,
                );
 
                // postando a imagem na fanpage
                $data['photo'] = $facebook->api("/$FANPAGE_ID/photos", 'post', $post_data);
                echo "<div style='width:100%;height:30px;color:green;background:#ccc;text-align:center;'><p>Publicado com sucesso</p></div>";

                //$deleta = mysql_query("DELETE FROM fotos WHERE fotos_id='".$fotos_id."'")or die(mysql_error());
                //$delete = mysql_query("ALTER TABLE fotos AUTO_INCREMENT = 1; ")or die(mysql_error());
                
                if(unlink($IMAGEM_UPLOAD));

                echo "<script>window.location.assign('../photobooth2/index.php?fotos_id=$fotos_id');</script>";
                
        } catch (FacebookApiException $e) {
                var_dump($e);
                $user = null;
        }
}