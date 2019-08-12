<?php

/**
 * Class para tratar os e-mail
 * Responsável por controlar os e-mails
 *
 * @copyright <lincense key>
 * @version 1.0
 */
class EmailClass {

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    protected $cc;

    /**
     * @var string
     */
    protected $bcc;

    /**
     * @var string
     */
    protected $to;

    /**
     * @return mixed
     */
    public function getTo() {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($t) {
        $this->to = $t;
    }

    /**
     * @var string
     */
    protected $subject;
    protected $body;

    /**
     * @return mixed
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($b) {
        $this->body = $b;
    }

    public function getSubject() {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($s) {
        $this->subject = $s;
    }

    /**
     * @return mixed
     */
    public function getBcc() {
        return $this->bcc;
    }

    /**
     * @param mixed $bcc
     */
    public function setBcc($bcc) {
        $this->bcc = $bcc;
    }

    /**
     * @return mixed
     */
    public function getCc() {
        return $this->cc;
    }

    /**
     * @param mixed $cc
     */
    public function setCc($cc) {
        $this->cc = $cc;
    }

    /**
     * @return mixed
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user) {
        $this->user = $user;
    }

    /**
     * @return string
     */
    private function getDomainEmail() {
        return 'contato@' . $_SERVER['SERVER_NAME'];
    }

    /**
     * Envia o e-mail
     *
     * @param null   $template
     * @param string $path
     * @return bool
     */

    //metodo para passar os parametros para função mail.
    public function enviarEmail($to) {

        $comunicado = $_POST['mensagem'];
        
        $body = $this->getBody() . $comunicado;
        
        $headers = $this->getEmailHeaders();

        $domainEmail = $this->getDomainEmail();

        $subject = $this->getSubject();

        $envio = mail($to, $subject, $body, $headers, $domainEmail);
    }

    /*
     * @return string
     */

    //Neste método a cria uma variável $caminhoDoXml que recebe o xml clientes.xml 
    public function prepareEmailFunction() {
        ini_set("error_reporting", E_ALL);
        $caminhoDoXml = simplexml_load_file("clientes.xml");

        foreach ($caminhoDoXml as $TORCEDORES) {
            $emails = $TORCEDORES->EMAIL;

            if (filter_var($emails, FILTER_VALIDATE_EMAIL)) {
                $to = "$emails";
            } else {
                continue;
            }

           $this->enviarEmail($to);
        }
        
    }

    //Neste método prepara o Cabeçalho do email.
    protected function getEmailHeaders() {
        $headers  = "MIME-Version: 1.0" . PHP_EOL;
        $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
        $headers .= "From: {$this->getDomainEmail()}" . PHP_EOL;
        $headers .= $this->getCc();
        $headers .= $this->getBcc();
        $headers .= "Return-Path: {$this->getDomainEmail()}" . PHP_EOL;

        return $headers;
    }

    /**
     * Renderiza o template do corpo do e-mail
     *
     * @param $template
     * @return false|string
     */
  

}
