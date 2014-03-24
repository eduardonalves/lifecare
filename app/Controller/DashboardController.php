<?php
App::uses('AppController', 'Controller');
/**
 * Dashboard Controller
 *
 * @property Produto $Produto
 * @property PaginatorComponent $Paginator
 */
class DashboardController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','lifecareDataFuncs');

/**
 * index method
 *
 * @return void
 */
	public function getContasMeseses() {
		$this->loadModel('Parcela');
		$hoje = date('Y-m-d');
		$ano = date('Y');
		$parcelas = $this->Parcela->find('all',array('conditions' => array('Parcela.data_vencimento LIKE'=> "%".$ano."%")));
		
		$totaReceber=0;
		$totaPagar=0;
		
		$totalJanReceber = 0;
		$totalFevReceber = 0;
		$totalmarReceber = 0;
		$totalabrReceber = 0;
		$totalmaiReceber = 0;
		$totaljunReceber = 0;
		$totaljulReceber = 0;
		$totalagoReceber = 0;
		$totalsetReceber = 0;
		$totaloutReceber = 0;
		$totalnovReceber = 0;
		$totaldezReceber = 0;
		foreach($parcelas as $parcela){
			$tipoConta="";
			foreach($parcela['Conta'] as $conta){
				$tipoConta = $conta['tipo'];
			}
			if($tipoConta == "A RECEBER"){
				
				$mes =substr($parcela['Parcela']['data_vencimento'],5, 2);
				if($mes==01){
					$totalJanReceber = $totalJanReceber + $parcela['Parcela']['valor'];
				}				
				if($mes==02){
					$totalFevReceber = $totalFevReceber + $parcela['Parcela']['valor'];
				}				
				if($mes==03){
					$totalmarReceber= $totalmarReceber + $parcela['Parcela']['valor'];

				}				
				if($mes==04){
					$totalabrReceber= $totalabrReceber + $parcela['Parcela']['valor'];

				}				
				if($mes==05){
					$totalmaiReceber= $totalmaiReceber + $parcela['Parcela']['valor'];
		
				}				
				if($mes==06){
					$totaljunReceber= $totaljunReceber + $parcela['Parcela']['valor'];
				
				}				
				if($mes==07){
					$totaljulReceber= $totaljulReceber + $parcela['Parcela']['valor'];
				
				}
				if($mes==08){
					$totalagoReceber= $totalagoReceber + $parcela['Parcela']['valor'];
			
				}
				if($mes==09){
					$totalsetReceber= $totalsetReceber + $parcela['Parcela']['valor'];
				
				}
				if($mes==10){
					$totaloutReceber= $totaloutReceber + $parcela['Parcela']['valor'];
			
				}
				if($mes==11){
					$totalnovReceber= $totalnovReceber + $parcela['Parcela']['valor'];
			
				}
				if($mes==12){
					$totaldezReceber= $totaldezReceber + $parcela['Parcela']['valor'];
				
				}
			
				
			}
			
			$totalJanPagar = 0;
			$totalFevPagar = 0;
			$totalmarPagar = 0;
			$totalabrPagar = 0;
			$totalmaiPagar = 0;
			$totaljunPagar = 0;
			$totaljulPagar = 0;
			$totalagoPagar = 0;
			$totalsetPagar = 0;
			$totaloutPagar = 0;
			$totalnovPagar = 0;
			$totaldezPagar = 0;
			if($tipoConta == "A PAGAR"){
				$mes =substr($parcela['Parcela']['data_vencimento'],5, 2);
				if($mes==01){
					$totalJanPagar = $totalJanPagar + $parcela['Parcela']['valor'];
			
				}				
				if($mes==02){
					$totalFevPagar= $totalFevPagar + $parcela['Parcela']['valor'];
			
				}				
				if($mes==03){
					$totalmarPagar= $totalmarPagar + $parcela['Parcela']['valor'];
			
				}				
				if($mes==04){
					$totalabrPagar= $totalabrPagar + $parcela['Parcela']['valor'];
			
				}				
				if($mes==05){
					$totalmaiPagar= $totalmaiPagar + $parcela['Parcela']['valor'];
			
				}				
				if($mes==06){
					$totaljunPagar= $totaljunPagar + $parcela['Parcela']['valor'];
				
				}				
				if($mes==07){
					$totaljulPagar= $totaljulPagar + $parcela['Parcela']['valor'];
				
				}
				if($mes==08){
					$totalagoPagar= $totalagoPagar + $parcela['Parcela']['valor'];
			
				}
				if($mes==09){
					$totalsetPagar= $totalsetPagar + $parcela['Parcela']['valor'];
			
				}
				if($mes==10){
					$totaloutPagar= $totaloutPagar + $parcela['Parcela']['valor'];
			
				}
				if($mes==11){
					$totalnovPagar= $totalnovPagar + $parcela['Parcela']['valor'];
				
				}
				if($mes==12){
					$totaldezPagar= $totaldezPagar + $parcela['Parcela']['valor'];
	
				}
			}
			
		}
		
	$this->set(compact('totalJanReceber','totalFevReceber','totalmarReceber','totalabrReceber','totalmaiReceber','totaljunReceber','totaljulReceber','totalagoReceber','totalsetReceber','totaloutReceber','totalnovReceber','totaldezReceber'));
	$this->set(compact('totalJanPagar','totalFevPagar','totalmarPagar','totalabrPagar','totalmaiPagar','totaljunPagar','totaljulPagar','totalagoPagar','totalsetPagar','totaloutPagar','totalnovPagar','totaldezPagar'));

	}
	
	public function index() {
		$this->layout = 'dashboard';
		
		$this->loadModel('Lote');
		$lotes = $this->Lote->find('all',array('conditions' => array('OR' => array('Lote.status' => array('AMARELO', 'VERMELHO'))),'order'=>array('Lote.status'=>'asc'),'recursive'=>0));
		
		foreach($lotes as $id => $lote){
			$lotes[$id]['Lote']['data_validade'] = $this->lifecareDataFuncs->formatDateToView($lotes[$id]['Lote']['data_validade']);
		}
		
		$this->loadModel('Produto');
		$produtos = $this->Produto->find('all', array('conditions' => array('OR' => array('Produto.nivel'=>array('AMARELO','VERMELHO'))),'order'=>array('Produto.nivel'=>'asc'),'recursive'=>0));
		
		$this->getContasMeseses();
		
		
		$this->set(compact('lotes','produtos'));
	}
	
	
}
