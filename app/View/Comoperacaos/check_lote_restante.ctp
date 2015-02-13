<?php
$lotes = $resposta;
$j = 0;
foreach($lotes as $lote){
	
	?>
												<tr class="ilote">
													<td><?php echo $lote['Lote']['numero_lote']?></td>
													<td><?php echo $lote['Comlotesoperacao']['qtde']?></td>
													<td class="td-status-com-<?php echo $lote['Comlotesoperacao']['id']; ?>"></td>
													<td>
														<?php
															
															echo $this->Html->image('bt-completarLote.png',array('alt'=>'Completar','class' => 'completar','id'=>'completar'.$j,'title'=>'Completar'));
															
															echo "<div id='encontrada".$j."' style='display:none;'>";
																echo $this->Form->input('vazio.qtd_encontrada',array('label'=>'Qtd. Encontrada:','id'=>'encontradaInput'.$j,'class'=>'q-ip tamanho-pequeno qtdEncontrada'));

																echo "<a href='myModal_add-troca_lote".$j."' class='bt-showmodal'>";
																	echo $this->Html->image('bt-ok.png',array('alt'=>'Organizar Lotes','data-produtoId'=>$lote['Comitensdaoperacao']['produto_id'],'class' => 'orglotes img-lista','id'=>'Orglote'.$j,'title'=>'Organizar Lotes'));
																echo "</a>";

																echo $this->Html->image('bt-XLote.png',array('alt'=>'Cancelar','class' => 'cancelCompleta','id'=>'cancelCompleta'.$j,'title'=>'Cancelar'));

															echo "</div>";
															
															// HIDDENS' PARA ENVIAR PARA O MODAL
																echo $this->Form->input('vazio.qtd_operacao',array('value'=> $lote['Comlotesoperacao']['qtde'],'id' => 'vazio-qtd_operacao'.$j, 'type' => 'hidden'));
																echo $this->Form->input('vazio.qtd_achada',array('value'=> $lote['Comlotesoperacao']['qtde'],'id' => 'vazio-qtd_achada'.$j, 'type' => 'hidden'));
																echo $this->Form->input('vazio.comloteitem',array('value'=> $lote['Comlotesoperacao']['id'], 'id' => 'vazio-comloteitem'.$j, 'type' => 'hidden'));
																echo $this->Form->input('vazio.comoperacao_id',array('value'=> $lote['Comoperacao']['id'], 'id' => 'vazio-comoperacaoid'.$j, 'type' => 'hidden'));
																//echo $this->Form->input('vazio.lote_id',array('value'=>$lote['Comlotesoperacao']['lote_id'] ,'id'=>'vazio-loteid'.$j,'type'=>'hidden'));
																echo $this->Form->input('vazio.produto_id',array('value'=> $lote['Produto']['id'] ,'id'=>'vazio-produtoid'.$j,'type'=>'hidden'));
																echo $this->Form->input('vazio.comitensdeoperacao',array('value'=>$lote['Comlotesoperacao']['comitensdaoperacao_id'] ,'id'=>'vazio-comitensdaoperacaoid'.$j,'type'=>'hidden'));																
																//echo $this->Form->input('vazio.qtde',array('value'=>$lote['Comlotesoperacao']['qtde'] ,'id'=>'vazio-qtde'.$j,'type'=>'hidden'));
																echo $this->Form->input('vazio.tipo',array('id'=>'vazio-tipo'.$j,'value'=>'SAIDA','type'=>'hidden'));
															// HIDDENS' PARA ENVIAR PARA O MODAL
															
														?>													
													</td>
													<td>
														<?php
															echo $this->Html->image('bt-confirmaLote.png',array('style'=>'cursor:pointer','data-lotesoperacao-id'=>$lote['Comlotesoperacao']['id'], 'alt'=>'Organizar Lotes','class' => 'orglote img-lista','id'=>'Orglote'.$j,'title'=>'Organizar Lotes'));
															
														?>
														
													</td>											
												</tr>										
<?php
$j++;
}
?>


?>
