<div style="font-family:arial; background-color:#F9F9F9; border:2px solid #CCCCCC; margin:0 auto; min-height:300px; width:700px;">
	<header style="margin-top:10px; ">
		<p style="text-align:center;">
			<img src="http://lifecare.vento-consulting.com/img/login-title.png">
		</p>
		<p style="font-size:18px; margin:35px 10px; text-align:left;">
			<span style="font-size:22px; font-weight:bold;"><?php echo ($_SESSION['extraparams']['Mensagem']['empresa']);?></span>
			<br/>
			<?php echo ($_SESSION['extraparams']['Mensagem']['endereco']);?>, RJ - Telefone <?php echo ($_SESSION['extraparams']['Mensagem']['telefone']);?>
			<br/>
			<a style="text-decoration:none; color:inherit;" href="<?php echo ($_SESSION['extraparams']['Mensagem']['site']);?>"><?php echo ($_SESSION['extraparams']['Mensagem']['site']);?></a>
		</p>
		<p style="color:#008000; margin:35px 10px; text-align:left;">
			<?php echo ($_SESSION['extraparams']['Mensagem']['corpo']);?>
		</p>
	</header>
</div>

<pre>
	<?php print_r($_SESSION); ?>
</pre>
