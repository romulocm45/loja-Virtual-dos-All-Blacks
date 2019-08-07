<?php

class XML{
	function geraXml(){

		if (isset($_POST['botao'])) {
            $arquivo = $_FILES['arquivo']['name'];

            $arquivo = str_replace(" ", "_", $arquivo);
            $arquivo = str_replace("ç", "c", $arquivo);

            if (file_exists("xml/$arquivo")) {
                $x = 1;

                while (file_exists("xml/[$x]$arquivo")) {
                    $x++;
                }

                $arquivo = "[" . $x . "]" . $arquivo;
                }
                if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivo)) {
                    echo '<br /><div class="alert alert-success" role="alert">
                          Upload realizado com sucesso!
                                </div>';
                ?>
                <script>
                	history.back();
                </script>                
                <?php
                } else {
                    echo '<br /><div class="alert alert-danger" role="alert">O Upload não foi realizado com sucesso!</div>';
            }
        }
	}
}
$xml = new XML();
$xml->geraXML();
