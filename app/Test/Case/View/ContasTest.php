<?php

require_once("LoginTest.php");
require_once("LocatorStrategy.php");

class ContasTest extends LoginTest
{
	protected function setUp()
	{
		$url = 'http://dev.lifecare.vento-consulting.com/';
		$this->setBrowser('firefox');
		$this->setBrowserUrl($url);
		$this->prepareSession();
		$this->url('http://dev.lifecare.vento-consulting.com/users/login');
		$this->currentWindow()->maximize();
		
		}
	
	public function testFinanceiroAction(){
		
		//Realiza login
		$this->testLoginAction();
		
		//Redireciona para a página de Contas (aba Financeiro)
		$this->url('http://dev.lifecare.vento-consulting.com/Contas');
		$this->testTitle('LifeCare: Contas');
		
		}
		
	public function testAddPesquisaRapida(){
		
		$text = 'Teste';
		
		$this->testFinanceiroAction();
		$this->byId('quick-salvar')->click();
		$this->byId('QuicklinkNome')->value($text);
		$this->byId('bt-salvar-quicklink')->click();
		$this->testTitle('LifeCare: Contas');
		$element = $this->byId('quick-select');
		//$option = $element->findElementBy(LocatorStrategy::xpath, 'option[normalize-space(text())="'.$text.'"]');
		$option->click();
		$this->assertEquals($test, $this->byId('quick-select')->value());
		
		}
}

?>
