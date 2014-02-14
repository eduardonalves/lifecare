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
	
	<?php echo $this->Html->charset(); ?>
	
	<title>
		
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	
	</title>
	
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('lifecare');
		echo $this->fetch('css');
		echo $this->Html->script('jquery.js');
		echo $this->Html->css('bootstrap');
		echo $this->Html->script('bootstrap');
		echo $this->fetch('script');
		echo $this->Html->script('funcoes_globais.js');
	?>
</head>

<body>
	<header id="top">
		<section class="content-top">
			
			<?php 
				echo $this->Html->image('logo.png', array('id' => 'logo', 'alt' => 'LifeCare', 'title' => 'LifeCare', 'border' => '0'));
				echo $this->Html->image('usuario.png', array('id' => 'img-usuario', 'alt' => 'Usuario', 'title' => 'Usuario', 'border' => '0')); 
				echo $this->Html->image('logout.png', array('id'=>'img-logout','alt' => 'Sair','url' => array('controller' => 'users', 'action' => 'logout'))); 
			?>

			<nav id="menu">
				<ul>
					<li class='active'><a href='<?php echo $this->Html->url(array("controller"=>"dashboard","action"=>"index"),true);?>'><span>Home</span></a></li>
					<li><a href='<?php echo $this->Html->url(array("controller"=>"Notas","action"=>"index"),true);?>/?parametro=produtos'><span>Estoque</span></a></li>
					<!--
						<li><a href='#'><span>Financeiro</span></a></li>
						<li><a href='#'><span>Comercial</span></a></li>
						<li><a href='#'><span>Compras</span></a></li>
					-->
					<li class='last'><a href='#'><span>Usuario</span></a></li>
				</ul>
			</nav>
		</section><!-- holder-1 -->
	</header>

	<section class="content holder">			

		<section class="conteudo-dashboard">

			<?php 
				echo $this->Session->flash();
				echo $this->fetch('content');
			?>

			<!-- ############## CODIGOS DOS MODAIS ################# -->

			<?php echo $this->fetch('modais'); ?>

			<!-- ##############  FIM CODIGOS DOS MODAIS ################# -->

			</section><!-- conteudo-principal -->
	</section><!-- content -->
</body>
</html>
