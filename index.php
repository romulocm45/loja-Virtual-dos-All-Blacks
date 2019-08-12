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
                                        <form action="gerarXmlClass.php" method="post" name="upload" enctype="multipart/form-data">
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
                                        <form action="inserirXmlClass.php" method="post" name="upload" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="nome_torcedor" class="form-control"  placeholder="Nome">
                                            </div>
                                            <div class="form-group">
                                                <label>CPF</label>
                                                <input type="text"  name="documento" class="form-control" maxlength="14" placeholder="CPF">
                                            </div>
                                            <div class="form-group">
                                                <label>CEP</label>
                                                <input type="text"  name="cep" class="form-control"  placeholder="Cep">
                                            </div>
                                            <div class="form-group">
                                                <label>ENDERECO</label>
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
                                                <input type="text"  name="ativo" class="form-control"  placeholder="SIM/NAO">
                                            </div> 
                                            <input class="btn btn-primary" type="submit" value="Enviar" name="incluirXML" />
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
                                        <form action="SendEmailClass.php" method="POST">
                                            <h1>Comunicado para os Torcedores</h1><br />
                                            <textarea class="form-control col-8" rows="5" cols="10" name="mensagem" placeholder="Comunicado" required /></textarea>
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


