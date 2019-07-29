# lojaVirtual
Projeto P21
Criei o arquivo bootstrap para criação do CSS, para formatação da página, criei um formulario para criação do upload utilizando enctype="multipart/form-data" para
poder fazer o upload criei um input do type="file" e utilizei um tratamento em php para procurar o arquivo na pasta xml e fazer upload para a pasta local,
criei um link para referenciar o download da planilha excel na minha pasta local. Criei um formulário para inserir os campos manualmente com excessão dos 
campos(e-mail e telefone), utilizei um tratamento em php para puxar os arquivos enviados pelo formulário e inserir eles via PHP documento clientes.xml. 
Criei um arquivo e-mail.xml para manipular os campos a serem enviados, utilizei um "IF para a contagem de e-mails enviados e mostrando dados a data do envio
no arquivo email.php, fiz um "foreach para procurar todos os emails no arquivo clientes.xml para poder enviar o comunicado via email, utilizei também a função
mail() para enviar os emails". 
No arquivo XML tive que arrumar as tags para fazer o arquivo funcionar. Na planilha do excel para poder importar os campos da nova planilha para o XML configurei
o arquivo planilha clientes.xlsx, na aba Desenvolvedor para popular a base XML com os novos dados da planilha excel.
