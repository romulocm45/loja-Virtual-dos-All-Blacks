<?php
ini_set("error_reporting", E_ALL);

$caminhoDoXml = simplexml_load_file("clientes.xml");
$i = 0;
foreach ($caminhoDoXml as $TORCEDORES) {
    $emails = $TORCEDORES->EMAIL;

    if(filter_var($emails, FILTER_VALIDATE_EMAIL)){
        $dest = "$emails";
        }else{
            continue;
        }
    
		$mensagem = $_POST['mensagem'];
		$subject = "Comunicado para os torcedores";
		$conteudo = '';
		$conteudo .= "Mensagem: " . $mensagem . " ";
		$envio = mail($dest, $subject, $conteudo);
			$i++;
}

if ($envio) {

    $date = date('H:i');
    ?>
    <script>
        alert("Foi enviado <?= $i ?> comunicados às <?= $date ?> ");
        location.href = "index.php"
    //        history.go(-1);
    </script>
    <?php
} else {
    //var_dump($i);die;
    ?>
    
    <script>
        
        alert("Erro, entre em contato com administrador");
        history.go(-1);
    </script>
    <?php
}
?>