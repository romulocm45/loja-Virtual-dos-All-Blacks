<?php

//Esta class possui dois metodos que retornam o valor das constantes definidas.
class MyExceptionClass
{	
	const MG01 = 'O e-mail não foi enviado com sucesso!';
	const MG02 = 'O e-mail foi enviado com sucesso!';
	


	public function messageHelper(){
			return self::MG01;
	}
	public function messageHelper2(){
			return self::MG02;
	}
}	





