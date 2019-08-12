<?php
require_once 'MyExceptionClass.php'; /*Para poder referenciar essa Classe MyExceptionClass.php dentro de outra classe
dentro de outra classe.*/
require_once 'EmailClass.php'; /*Para poder referenciar essa Classe EmailClass.php  dentro de outra classe
dentro de outra classe.*/
/**
 * Class SendEmailClass
 *
 * Prepara os e-mails e chama o método de envio
 *
 * @copyright <lincense key>
 * @version 1.0
 */

//Relaciona a Classe EmailClass fazendo com que a class sendEmailClass herde tudo dela através do extends.

class SendEmailClass extends EmailClass 
{


    /**
     * Prepara e envia o e-mail, exibindo a mensagem de sucesso ou erro para o usuário
     * 
     * @param $email
     * @return mixed
     */
    //Este método retorna uma mensagem de erro
    public function showMessage()
    {
        return "Comunicado enviado com sucesso!";
          
    }

    //Este metodo trata as excessões do email.
    public function send($email) 
    {
    //$email = $email->prepareEmailFunction();
        
        $email = new EmailClass();
        $email->body = $this->getBody();
    
        $myExceptionClass = new MyExceptionClass();
            
       
        try {

             if (!$email->body) {
                throw new Exception($myExceptionClass::MessageHelper());
            }
            
            $MyExceptionClass = new MyExceptionClass();
            $message = $MyExceptionClass->messageHelper2();
        } catch (Exception $e) {
           
           echo 'Exceção capturada: ',  $e->getMessage();
        } finally {

            echo $this->showMessage();   

        ?>
        <script type="text/javascript">
           history.go(-1);
        </script>       
            
        <?php     
        }
        
    }

    /**
     * @return string
     */
    
    //Este metodo retorna um texto para a função getSubject.
    
    public function getSubject()
    {
        return 'Comunicado para os torcedores';
    }

    /**
     * @return string
     */

    //Este metodo retorna um texto para a função getBody.
    public function getBody()
    {
       return 'Torcedores do All Blacks: ';
    }
    //Este metodo acessa outro metodo através da função parent.
    public function chamarEmailHeaders() {
       parent::getEmailHeaders();
   }
   
}



//cria um objeto SendEmailClass dentro de uma variável 

$sendEmailClass = new SendEmailClass();

//cria um objeto EmailClass dentro de uma variável 

$email = new EmailClass();

//seta o metodo send e recebe o objeto do tipo EmailClass

$sendEmailClass->send($email);


//chama os metodos  
$sendEmailClass->prepareEmailFunction();

$sendEmailClass->chamarEmailHeaders();




