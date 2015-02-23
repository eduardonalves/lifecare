<?php
	/**
	*
	* PHP 5
	*
	* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
	* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
	*
	* Licensed under The MIT License
	* For full copyright and license information, please see the LICENSE.txt
	* Redistributions of files must retain the above copyright notice.
	*
	* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
	* @link          http://cakephp.org CakePHP(tm) Project
	* @package       app.View.Layouts
	* @since         CakePHP(tm) v 0.10.0.1076
	* @license       http://www.opensource.org/licenses/mit-license.php MIT License
	*
	*/

	$cakeDescription = __d('lifecare', 'LifeCare');
?>

<!DOCTYPE html>
<html>
<head>
	
<script>
	var urlInicio = '<?php echo Router::url("/", true)?>';
</script>	

	
	
	<?php echo $this->Html->charset(); ?>
	
	<title>
		
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	
	</title>
	
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('lifecare');
		//echo $this->Html->css('jquery-ui/jquery-ui.css');
		//echo $this->Html->css('jquery-ui/jquery.ui.all.css');
		//echo $this->Html->css('jquery-ui/custom-combobox.css');
		//echo $this->Html->css('saidas.css');
		echo $this->fetch('css');
		echo $this->Html->script('jquery_novo.js');
		echo $this->Html->script('jquery-ui/jquery-ui.js');
		echo $this->Html->script('jquery-ui/custom-combobox.js');
		echo $this->Html->script('jquery.mask.min.js');
		echo $this->Html->script('jquery.mask.js');
		echo $this->Html->script('jquery.price_format.1.8.js');
		echo $this->Html->script('jquery.price_format.1.8.min.js');
		echo $this->Html->css('bootstrap');
		echo $this->Html->script('bootstrap');
		echo $this->Html->script('funcoes_globais.js');
		echo $this->fetch('script');
	?>

</head>

<body>
	<header id="top">
		<section class="content-top">
			
			<?php 
				echo $this->Html->image('logo.png', array('id' => 'logo', 'alt' => 'LifeCare', 'title' => 'LifeCare', 'border' => '0'));
				echo $this->Html->image('usuario.png', array('id' => 'img-usuario', 'alt' => 'Usuario', 'title' => 'Usuario', 'border' => '0')); 
				//echo $this->Html->link($this->Html->image('logout.png'.__('Logout'), array('controller' => 'users', 'action' => 'logout'));
				
				echo $this->Html->image('logout.png', array('id'=>'img-logout','alt' => 'Sair','url' => array('controller' => 'users', 'action' => 'logout'))); 
				
			?>
				

			<nav id="menu">
				<ul>
					<li><a href='<?php echo $this->Html->url(array("controller"=>"dashboard","action"=>"index"),true);?>'><span>Home</span></a></li>
					<li class='active'><a href='<?php echo $this->Html->url(array("controller"=>"Notas","action"=>"index"),true);?>/?parametro=produtos'><span>Estoque</span></a></li>
					<li><a href='<?php echo $this->Html->url(array("controller"=>"Contas","action"=>"index"),true);?>/?parametro=contas'><span>Financeiro</span></a></li>
					<li><a href='<?php echo $this->Html->url(array("controller"=>"Comoperacaos","action"=>"index"),true);?>/?parametro=operacoes'><span>Compras</span></a></li>
					<li><a href='<?php echo $this->Html->url(array("controller"=>"Comoperacaos","action"=>"comercial"),true);?>/?parametro=operacoes'><span>Vendas</span></a></li>

					<li><a href='<?php echo $this->Html->url(array("controller"=>"Saidas","action"=>"fatindex"),true);?>'><span>Faturamento</span></a></li>

					<li class='last'><a href='<?php echo $this->Html->url(array("controller"=>"Comparecimentos","action"=>"index"),true);?>'><span>RH</span></a></li>
					<li class='last'><a href=<?php echo $this->Html->url(array("controller"=>"Users","action"=>"index"),true);?>><span>Usuário</span></a></li>
				</ul>
			</nav>
		</section><!-- holder-1 -->
	</header>

	<section class="content holder">			
		<nav id="nav-lateral">	
			<ul>
				<li class="item">
					<a class="menuLink" href='<?php echo $this->Html->url(array("controller"=>"Saidas","action"=>"fatindex"),true);?>/?parametro=produtos'>
						
						<?php 
							echo $this->Html->image('consultas.png', array('id' => 'consultar-icon', 'alt' => 'Consultar', 'title' => 'Consultar'));
						?>

						<span class="label">Consultas</span>
					</a>
				</li>

				
			
			</ul>
		</nav><!-- nav-lateral -->

		<section class="conteudo-principal">

			<?php 
				echo $this->Session->flash();
				echo $this->Session->flash('auth');
				echo $this->fetch('content');
			?>

			<!-- ############## CODIGOS DOS MODAIS ################# -->

			<?php echo $this->fetch('modais'); ?>

			<!-- ##############  FIM CODIGOS DOS MODAIS ################# -->

		</section><!-- conteudo-principal -->	
	</section><!-- content -->
</body>
</html>
