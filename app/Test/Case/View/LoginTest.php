<?php

class LoginTest extends PHPUnit_Extensions_Selenium2TestCase
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
	
	public function testTitle($title = null)
	{
		if (!$title)
			$title = 'LifeCare: Users';
		$this->assertEquals($title,$this->title());
		}
		
	public function testLoginFormExists()
	{
		//Verifica se está na tela de login
		$this->testTitle();
		
		$name = $this->byName('data[User][username]');
		$passwd = $this->byName('data[User][password]');
		
		$this->assertEquals('',$name->value());
		$this->assertEquals('',$passwd->value());
		
		}
		
	public function testLoginAction()
	{
		//Verifica se o form de login existe
		$this->testLoginFormExists();
		
		$form = $this->byId('UserLoginForm');
		$action = $form->attribute('action');
		$this->assertEquals('http://dev.lifecare.vento-consulting.com/users/login', $action);
		
		$this->byName('data[User][username]')->value('admin');
		$this->byName('data[User][password]')->value('ventovento');
		
		$form->submit();
		
		//Verifica se logou corretamente
		$this->testTitle('LifeCare: Dashboard');
		
		}
		
	public function testLogoutAction()
	{
		//Verifica se realiza login
		$this->testLoginAction();
		
		//Realiza logout
		$this->byId('img-logout')->click();
		
		//Verifica se realizou logout corretamente
		$this->testTitle();
		}

}

?>
