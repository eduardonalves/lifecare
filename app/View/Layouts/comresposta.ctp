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
		echo $this->Html->css('jquery-ui/jquery-ui.css');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
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
				//echo $this->Html->image('logo.png', array('id' => 'logo', 'alt' => 'LifeCare', 'title' => 'LifeCare', 'border' => '0'));
				echo $this->Html->image('logout.png', array('id'=>'img-logout','alt' => 'Sair','url' => array('controller' => 'users', 'action' => 'logout'))); 
				
			?>
				

			<nav id="menu">
				<ul>
					
				</ul>
			</nav>
		</section><!-- holder-1 -->
	</header>

	<section class="content holder">			
		<nav id="nav-lateral">	
			<ul>
				
			</ul>
		</nav><!-- nav-lateral -->

		<section class="conteudo-principal">

			<?php 
				echo $this->Session->flash();
				echo $this->Session->flash('auth');
				echo $this->fetch('content');
			?>


		</section><!-- conteudo-principal -->	
	</section><!-- content -->
</body>
</html>
