<?php
class InserirXmlClass{
	function incluirXML(){
		

		if (isset($_POST['incluirXML'])) {
            $xml = new DOMDocument("1.0", "UTF-8");
            $xml-> load("clientes.xml");
            $rootTag = $xml->getElementsByTagName("TORCEDORES")->item(0);
            $torcedoresTag = $xml->createElement("TORCEDOR");
            $addNome = $xml->createElement("NOME", $_REQUEST['nome_torcedor']);
            $addDocumento = $xml->createElement("DOCUMENTO", $_REQUEST['documento']);
            $addCep = $xml->createElement("CEP", $_REQUEST['cep']);
            $addEndereco = $xml->createElement("ENDEREÇO", $_REQUEST['endereco']);
            $addBairro = $xml->createElement("BAIRRO", $_REQUEST['bairro']);
            $addCidade = $xml->createElement("CIDADE", $_REQUEST['cidade']);
            $addUf = $xml->createElement("UF", $_REQUEST['uf']);
            $addAtivo = $xml->createElement("ATIVO", $_REQUEST['ativo']);

            $torcedoresTag->appendChild($addNome);
            $torcedoresTag->appendChild($addDocumento);
            $torcedoresTag->appendChild($addCep);
            $torcedoresTag->appendChild($addEndereco);
            $torcedoresTag->appendChild($addBairro);
            $torcedoresTag->appendChild($addCidade);
            $torcedoresTag->appendChild($addUf);
            $torcedoresTag->appendChild($addAtivo);


            $rootTag->appendChild($torcedoresTag);

            if ($xml->save("clientes.xml")) {
                echo '<br /><div class="alert alert-success" role="alert">
                             Os Dados Foram inserido no XML!
                            </div>';
			?>
            <script>
                history.back();
            </script>                
                <?php                            
           } else {
                echo '<br /><div class="alert alert-danger" role="alert">Erro ao inserir os dados, Tente Novamente</div>';
            }
        }
	}
}

$inserirXml = new InserirXmlClass();
$inserirXml->incluirXML();