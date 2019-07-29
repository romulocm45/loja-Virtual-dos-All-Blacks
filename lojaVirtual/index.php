<html>
    <head>
        <meta charset="utf-8" />
        <link href="style/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="style/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="style/js/jquery.min.js" type="text/javascript"></script>
        <link href="style/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="style/js/jquery.min.js" type="text/javascript"></script>
        <script src="style/js/bootstrap.min.js" type="text/javascript"></script>

        <title> Loja virtual  </title>
    </head>
    <body>
        <div class="container">  
            <div class="row justify-content-md-center">

                <h2>Bem vindo a loja virtual ALL BLACKS</h2>


                <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
                <div class="container-fluid">

                    <div id="faq" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="questionOne">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faq" href="#answerOne" aria-expanded="false" aria-controls="answerOne">
                                        Arquivo XML
                                    </a>
                                </h5>
                            </div>
                            <div id="answerOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionOne">
                                <div class="panel-body">


                                    <div style="border: 1px solid red; padding: 50px">

                                        <form action="index.php" method="post" name="upload" enctype="multipart/form-data">

                                            <b>Abrir arquivo XML</b>
                                            <input type="file" name="arquivo" />	
                                            <br />
                                            <div class="form-control">

                                                <b>Clique aqui para :</b>
                                                <button type="submit" name="botao" class=" btn-outline-danger" >Baixar</button>
                                            </div>
                                            <br />

                                            <div class="form-control">
                                                <b>Planilha com a base dos torcedores:</b>
                                                <a href="clientes.xlsx" target="_blank">clique aqui</a>	
                                                </tr>
                                            </div>
                                            <?php
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
                                                } else {
                                                    echo '<br /><div class="alert alert-danger" role="alert">O Upload não foi realizado com sucesso!</div>';
                                                }
                                            }
                                            ?>				
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="questionTwo">
                                <h5 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerTwo" aria-expanded="false" aria-controls="answerTwo">
                                        Inserir Torcedores
                                    </a>
                                </h5>
                            </div>
                            <div id="answerTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
                                <div class="panel-body">
                                    <div style="border: 1px solid red; padding: 75px">
                                        <h2>Inserir os torcedores</h2>
                                        <br />


                                        <form action="index.php" method="post" name="upload" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="nome_torcedor" class="form-control"  placeholder="Nome">
                                            </div>
                                            <div class="form-group">
                                                <label>CPF</label>
                                                <input type="text"  name="documento" class="form-control" maxlength="11" placeholder="CPF">
                                            </div>
                                            <div class="form-group">
                                                <label>CEP</label>
                                                <input type="text"  name="cep" class="form-control"  placeholder="Cep">
                                            </div>
                                            <div class="form-group">
                                                <label>ENDEREÇO</label>
                                                <input type="text"  name="endereco" class="form-control"  placeholder="Endereço">
                                            </div>
                                            <div class="form-group">
                                                <label>BAIRRO</label>
                                                <input type="text"  name="bairro" class="form-control"  placeholder="Bairro">
                                            </div>
                                            <div class="form-group">
                                                <label>CIDADE</label>
                                                <input type="text"  name="cidade" class="form-control"  placeholder="Cidade">
                                            </div>
                                            <div class="form-group">
                                                <label>UF</label>
                                                <input type="text"  name="uf" class="form-control"  placeholder="UF">
                                            </div>
                                            <div class="form-group">
                                                <label>TORCEDOR E ATIVO?</label>
                                                <input type="text"  name="ativo" class="form-control"  placeholder="SIM/NÃO">
                                            </div> 
                                            <input class="btn btn-primary" type="submit" value="Enviar" name="incluirXML" />
                                        </form>

                                        <?php
                                        if (isset($_REQUEST['incluirXML'])) {
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
                                            } else {
                                                echo '<br /><div class="alert alert-danger" role="alert">Erro ao inserir os dados, Tente Novamente</div>';
                                            }
                                        }
                                        ?>

                                        </form>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="questionThree">
                                <h5 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerThree" aria-expanded="true" aria-controls="answerThree">
                                        Comunicado para os Torcedores
                                    </a>
                                </h5>
                            </div>
                            <div id="answerThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionThree">
                                <div class="panel-body">
                                    <div style="border: 1px solid red; padding: 10px; ">
                                        <form action="email.php" method="POST">
                                            <h1>Comunicado para os Torcedores</h1><br />
                                            <textarea class="form-control col-8" rows="5" cols="10" name="mensagem" placeholder="mensagem" required /></textarea>
                                            <br />
                                            <div style="text-align: center" >

                                                <input class="btn btn-success" type="submit" value="Enviar" />	
                                                <input class="btn btn-danger" type="reset" value="Apagar" />	
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </body>

</html>

<script>
    // Iniciando componente tooltip 
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Iniciando componente popover 
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>


