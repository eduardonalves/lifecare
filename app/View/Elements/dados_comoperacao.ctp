<section> <!---section Baixo--->	
<header class="">Últimos Pedidos</header>
			<table>
				<thead>			
					<th>Ações</th>
					<th>Data Inicial</th>
					<th>Data Final</th>				
					<th>Forma Pagamento</th>				
					<th>Prazo Entrega</th>
					<th>Prazo Pagamento</th>	
					<th>Status</th>	
				</thead>

				<?php
					
					foreach($parceirodenegocio['Comoperacao'] as $pedidos){
						echo '<tr><td>';
						 //echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Operação','title'=>'Visualizar Operação','url'=>array('controller' => 'Comoperacaos','action' => 'view',$comoperacao['Comoperacao']['id'])));
						echo '</td>';
						echo '<td>'. $pedidos['data_inici'] .'</td>';
						echo '<td>'. $pedidos['data_fim'] .'</td>';
						echo '<td>'. $pedidos['forma_pagamento'] .'</td>';
						echo '<td>'. $pedidos['prazo_entrega'] .'</td>';
						echo '<td>'. $pedidos['prazo_pagamento'] .'</td>';
						echo '<td>'. $pedidos['status'] .'</td>';
						echo '</tr>';
					}
					
				?>
			</table>



<pre>
<?php
	//print_r($parceirodenegocio['Comoperacao']);
?>
</pre>

