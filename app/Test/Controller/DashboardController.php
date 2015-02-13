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
 
	public function graficoperiodo() {
			
			$this->layout = 'loadGrafico1';
			$this->loadModel('Parcela');
			
			//DATA INICIAL
			if(isset($_GET['anoI'])){
				if(empty($_GET['anoI'])){
					$anoI = '0000';
				}else{
					$anoI = $_GET['anoI'];
				}
				
			}else{
				$anoI = '0000';	
			}
			
			if(isset($_GET['mesI'])){
				if(empty($_GET['mesI'])){
					$mesI = '-00';
				}else{
					$mesI = '-'.$_GET['mesI'];
				}
			}else{
				$mesI = '-00';
			}
			
			if(isset($_GET['diaI'])){
			
				if(empty($_GET['diaI'])){
					$diaI = '-00';
				}else{
					
					$diaI = '-'.$_GET['diaI'];
				}
			}else{
				$diaI = '-00';
			}
			
			//DATA FINAL
			if(isset($_GET['anoF'])){
				if(empty($_GET['anoF'])){
					$anoF = date('Y');
				}else{
					$anoF = $_GET['anoF'];
				}
				
			}else{
				$anoF = date('Y');	
			}
			
			if(isset($_GET['mesF'])){
				if(empty($_GET['mesF'])){
					$mesF = '-'.date('m');
				}else{
					$mesF = '-'.$_GET['mesF'];
				}
			}else{
				$mesF = '-'.date('m');
			}
			
			if(isset($_GET['diaF'])){
			
				if(empty($_GET['diaF'])){
					$diaF = '-'.date('d');
				}else{
					
					$diaF = '-'.$_GET['diaF'];
				}
			}else{
				$diaF = '-'.date('d');
			}
		//QUERY
		$parcelas = $this->Parcela->find('all',array('conditions' => array('Parcela.data_vencimento >= ' => $anoI.$mesI.$diaI ,'Parcela.data_vencimento <= ' => $anoF.$mesF.$diaF )));
				
				
		$totalJanReceberP = 0;
		$totalFevReceberP = 0;
		$totalmarReceberP = 0;
		$totalabrReceberP = 0;
		$totalmaiReceberP = 0;
		$totaljunReceberP = 0;
		$totaljulReceberP = 0;
		$totalagoReceberP = 0;
		$totalsetReceberP = 0;
		$totaloutReceberP = 0;
		$totalnovReceberP = 0;
		$totaldezReceberP = 0;
			
		$totalJanPagarP = 0;
		$totalFevPagarP = 0;
		$totalmarPagarP = 0;
		$totalabrPagarP = 0;
		$totalmaiPagarP = 0;
		$totaljunPagarP = 0;
		$totaljulPagarP = 0;
		$totalagoPagarP = 0;
		$totalsetPagarP = 0;
		$totaloutPagarP = 0;
		$totalnovPagarP = 0;
		$totaldezPagarP = 0;
		
		//debug($parcelas);
		
		foreach($parcelas as $parcela){
				$tipoConta="";
				foreach($parcela['Conta'] as $conta){
					$tipoConta = $conta['tipo'];
				}
				if($tipoConta == "A RECEBER"){
					
					$mes =substr($parcela['Parcela']['data_vencimento'],5, 2);
					if($mes==01){
						$totalJanReceberP = $totalJanReceberP + $parcela['Parcela']['valor'];
						
					}				
					if($mes==02){
						$totalFevReceberP = $totalFevReceberP + $parcela['Parcela']['valor'];
					}				
					if($mes==03){
						$totalmarReceberP  = $totalmarReceberP + $parcela['Parcela']['valor'];

					}				
					if($mes==04){
						$totalabrReceberP = $totalabrReceberP + $parcela['Parcela']['valor'];

					}				
					if($mes==05){
						$totalmaiReceberP = $totalmaiReceberP + $parcela['Parcela']['valor'];
			
					}				
					if($mes==06){
						$totaljunReceberP = $totaljunReceberP + $parcela['Parcela']['valor'];
					
					}				
					if($mes==07){
						$totaljulReceberP = $totaljulReceberP + $parcela['Parcela']['valor'];
					
					}
					if($mes==08){
						$totalagoReceberP = $totalagoReceberP + $parcela['Parcela']['valor'];
				
					}
					if($mes==09){
						$totalsetReceberP = $totalsetReceberP + $parcela['Parcela']['valor'];
					
					}
					if($mes==10){
						$totaloutReceberP = $totaloutReceberP + $parcela['Parcela']['valor'];
				
					}
					if($mes==11){
						$totalnovReceberP = $totalnovReceberP + $parcela['Parcela']['valor'];
				
					}
					if($mes==12){
						$totaldezReceberP = $totaldezReceberP + $parcela['Parcela']['valor'];
					
					}
				
					
				}
				
				
				if($tipoConta == "A PAGAR"){
					$mes =substr($parcela['Parcela']['data_vencimento'],5, 2);
					if($mes==01){
						$totalJanPagarP = $totalJanPagarP + $parcela['Parcela']['valor'];
				
					}				
					if($mes==02){
						$totalFevPagarP = $totalFevPagarP + $parcela['Parcela']['valor'];
				
					}				
					if($mes==03){
						$totalmarPagarP = $totalmarPagarP + $parcela['Parcela']['valor'];
				
					}				
					if($mes==04){
						$totalabrPagarP = $totalabrPagarP + $parcela['Parcela']['valor'];
				
					}				
					if($mes==05){
						$totalmaiPagarP = $totalmaiPagarP + $parcela['Parcela']['valor'];
				
					}				
					if($mes==06){
						$totaljunPagarP = $totaljunPagarP + $parcela['Parcela']['valor'];
					
					}				
					if($mes==07){
						$totaljulPagarP = $totaljulPagaPr + $parcela['Parcela']['valor'];
					
					}
					if($mes==08){
						$totalagoPagarP = $totalagoPagarP + $parcela['Parcela']['valor'];
				
					}
					if($mes==09){
						$totalsetPagarP = $totalsetPagarP + $parcela['Parcela']['valor'];
				
					}
					if($mes==10){
						$totaloutPagarP = $totaloutPagarP + $parcela['Parcela']['valor'];
				
					}
					if($mes==11){
						$totalnovPagarP = $totalnovPagarP + $parcela['Parcela']['valor'];
					
					}
					if($mes==12){
						$totaldezPagarP = $totaldezPagarP + $parcela['Parcela']['valor'];
		
					}
				}
				
			}
			
			
			$this->set(compact('totalJanReceberP','totalFevReceberP','totalmarReceberP','totalabrReceberP','totalmaiReceberP','totaljunReceberP','totaljulReceberP','totalagoReceberP','totalsetReceberP','totaloutReceberP','totalnovReceberP','totaldezReceberP'));
			$this->set(compact('totalJanPagarP','totalFevPagarP','totalmarPagarP','totalabrPagarP','totalmaiPagarP','totaljunPagarP','totaljulPagarP','totalagoPagarP','totalsetPagarP','totaloutPagarP','totalnovPagarP','totaldezPagarP'));	
		
			
	}
	
	public function graficoperiodo2() {
			
			$this->loadModel('Parcela');
			
			//DATA INICIAL
			if(isset($_GET['anoI'])){
				if(empty($_GET['anoI'])){
					$anoI = '0000';
				}else{
					$anoI = $_GET['anoI'];
				}
				
			}else{
				$anoI = '0000';	
			}
			
			if(isset($_GET['mesI'])){
				if(empty($_GET['mesI'])){
					$mesI = '-00';
				}else{
					$mesI = '-'.$_GET['mesI'];
				}
			}else{
				$mesI = '-00';
			}
			
			if(isset($_GET['diaI'])){
			
				if(empty($_GET['diaI'])){
					$diaI = '-00';
				}else{
					
					$diaI = '-'.$_GET['diaI'];
				}
			}else{
				$diaI = '-00';
			}
			
			//DATA FINAL
			if(isset($_GET['anoF'])){
				if(empty($_GET['anoF'])){
					$anoF = date('Y');
				}else{
					$anoF = $_GET['anoF'];
				}
				
			}else{
				$anoF = date('Y');	
			}
			
			if(isset($_GET['mesF'])){
				if(empty($_GET['mesF'])){
					$mesF = '-'.date('m');
				}else{
					$mesF = '-'.$_GET['mesF'];
				}
			}else{
				$mesF = '-'.date('m');
			}
			
			if(isset($_GET['diaF'])){
			
				if(empty($_GET['diaF'])){
					$diaF = '-'.date('d');
				}else{
					
					$diaF = '-'.$_GET['diaF'];
				}
			}else{
				$diaF = '-'.date('d');
			}
		//QUERY
		$parcelas = $this->Parcela->find('all',array('conditions' => array('Parcela.data_vencimento >= ' => $anoI.$mesI.$diaI ,'Parcela.data_vencimento <= ' => $anoF.$mesF.$diaF )));
				
				
		$totalJanReceberP = 0;
		$totalFevReceberP = 0;
		$totalmarReceberP = 0;
		$totalabrReceberP = 0;
		$totalmaiReceberP = 0;
		$totaljunReceberP = 0;
		$totaljulReceberP = 0;
		$totalagoReceberP = 0;
		$totalsetReceberP = 0;
		$totaloutReceberP = 0;
		$totalnovReceberP = 0;
		$totaldezReceberP = 0;
			
		$totalJanPagarP = 0;
		$totalFevPagarP = 0;
		$totalmarPagarP = 0;
		$totalabrPagarP = 0;
		$totalmaiPagarP = 0;
		$totaljunPagarP = 0;
		$totaljulPagarP = 0;
		$totalagoPagarP = 0;
		$totalsetPagarP = 0;
		$totaloutPagarP = 0;
		$totalnovPagarP = 0;
		$totaldezPagarP = 0;
		
		foreach($parcelas as $parcela){
				$tipoConta="";
				foreach($parcela['Conta'] as $conta){
					$tipoConta = $conta['tipo'];
				}
				if($tipoConta == "A RECEBER"){
					
					$mes =substr($parcela['Parcela']['data_vencimento'],5, 2);
					if($mes==01){
						$totalJanReceberP = $totalJanReceberP + $parcela['Parcela']['valor'];
					}				
					if($mes==02){
						$totalFevReceberP = $totalFevReceberP + $parcela['Parcela']['valor'];
					}				
					if($mes==03){
						$totalmarReceberP  = $totalmarReceberP + $parcela['Parcela']['valor'];

					}				
					if($mes==04){
						$totalabrReceberP = $totalabrReceberP + $parcela['Parcela']['valor'];

					}				
					if($mes==05){
						$totalmaiReceberP = $totalmaiReceberP + $parcela['Parcela']['valor'];
			
					}				
					if($mes==06){
						$totaljunReceberP = $totaljunReceberP + $parcela['Parcela']['valor'];
					
					}				
					if($mes==07){
						$totaljulReceberP = $totaljulReceberP + $parcela['Parcela']['valor'];
					
					}
					if($mes==08){
						$totalagoReceberP = $totalagoReceberP + $parcela['Parcela']['valor'];
				
					}
					if($mes==09){
						$totalsetReceberP = $totalsetReceberP + $parcela['Parcela']['valor'];
					
					}
					if($mes==10){
						$totaloutReceberP = $totaloutReceberP + $parcela['Parcela']['valor'];
				
					}
					if($mes==11){
						$totalnovReceberP = $totalnovReceberP + $parcela['Parcela']['valor'];
				
					}
					if($mes==12){
						$totaldezReceberP = $totaldezReceberP + $parcela['Parcela']['valor'];
					
					}
				
					
				}
				
				
				if($tipoConta == "A PAGAR"){
					$mes =substr($parcela['Parcela']['data_vencimento'],5, 2);
					if($mes==01){
						$totalJanPagarP = $totalJanPagarP + $parcela['Parcela']['valor'];
				
					}				
					if($mes==02){
						$totalFevPagarP = $totalFevPagarP + $parcela['Parcela']['valor'];
				
					}				
					if($mes==03){
						$totalmarPagarP = $totalmarPagarP + $parcela['Parcela']['valor'];
				
					}				
					if($mes==04){
						$totalabrPagarP = $totalabrPagarP + $parcela['Parcela']['valor'];
				
					}				
					if($mes==05){
						$totalmaiPagarP = $totalmaiPagarP + $parcela['Parcela']['valor'];
				
					}				
					if($mes==06){
						$totaljunPagarP = $totaljunPagarP + $parcela['Parcela']['valor'];
					
					}				
					if($mes==07){
						$totaljulPagarP = $totaljulPagaPr + $parcela['Parcela']['valor'];
					
					}
					if($mes==08){
						$totalagoPagarP = $totalagoPagarP + $parcela['Parcela']['valor'];
				
					}
					if($mes==09){
						$totalsetPagarP = $totalsetPagarP + $parcela['Parcela']['valor'];
				
					}
					if($mes==10){
						$totaloutPagarP = $totaloutPagarP + $parcela['Parcela']['valor'];
				
					}
					if($mes==11){
						$totalnovPagarP = $totalnovPagarP + $parcela['Parcela']['valor'];
					
					}
					if($mes==12){
						$totaldezPagarP = $totaldezPagarP + $parcela['Parcela']['valor'];
		
					}
				}
				
			}
			
			//Conversão
			//number_format($totalmarPagarP, 2, ',', '.');
			
			//debug($totalmarPagarP);
		
			$this->set(compact('totalJanReceberP','totalFevReceberP','totalmarReceberP','totalabrReceberP','totalmaiReceberP','totaljunReceberP','totaljulReceberP','totalagoReceberP','totalsetReceberP','totaloutReceberP','totalnovReceberP','totaldezReceberP'));
			$this->set(compact('totalJanPagarP','totalFevPagarP','totalmarPagarP','totalabrPagarP','totalmaiPagarP','totaljunPagarP','totaljulPagarP','totalagoPagarP','totalsetPagarP','totaloutPagarP','totalnovPagarP','totaldezPagarP'));			
	}
	
	public function loadgrafico() {
			
			$this->layout = 'loadGrafico1';
			
			$this->loadModel('Parcela');
			$hoje = date('Y-m-d');
			
			if(isset($_GET['ano'])){
				if(empty($_GET['ano'])){
					$ano = date('Y');
				}else{
					$ano = $_GET['ano'];
				}
				
			}else{
				$ano = '';	
			}
			
			if(isset($_GET['mes'])){
				if(empty($_GET['mes'])){
					$mes = '';
				}else{
					$mes = '-'.$_GET['mes'];
				}
			}else{
				$mes = '';
			}
			
			if(isset($_GET['dias'])){
			
				if(empty($_GET['dias'])){
					$dia = '';
				}else{
					
					$dia = '-'.$_GET['dias'];
				}
			}else{
				$dia = '';
			}
				
				
			$parcelas = $this->Parcela->find('all',array('conditions' => array('Parcela.data_vencimento LIKE'=> "%".$ano.$mes.$dia."%")));
			
			
		
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
	
	public function loadgrafico2() {
			
			
			
			$this->loadModel('Parcela');
			$hoje = date('Y-m-d');
			
			if(isset($_GET['ano'])){
				if(empty($_GET['ano'])){
					$ano = date('Y');
				}else{
					$ano = $_GET['ano'];
				}
				
			}else{
				$ano = '';	
			}
			
			if(isset($_GET['mes'])){
				if(empty($_GET['mes'])){
					$mes = '';
				}else{
					$mes = '-'.$_GET['mes'];
				}
			}else{
				$mes = '';
			}
			
			if(isset($_GET['dias'])){
			
				if(empty($_GET['dias'])){
					$dia = '';
				}else{
					
					$dia = '-'.$_GET['dias'];
				}
			}else{
				$dia = '';
			}
				
				
			$parcelas = $this->Parcela->find('all',array('conditions' => array('Parcela.data_vencimento LIKE'=> "%".$ano.$mes.$dia."%")));
			
			
		
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
		
	$this->set(compact('parcelas','totalJanReceber','totalFevReceber','totalmarReceber','totalabrReceber','totalmaiReceber','totaljunReceber','totaljulReceber','totalagoReceber','totalsetReceber','totaloutReceber','totalnovReceber','totaldezReceber'));
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
		
		$this->loadgrafico2();
		$this->graficoperiodo2();
		
		$this->loadModel('Parcela');
		$anosModel = $this->Parcela->find('all',array('order'=>array('Parcela.data_vencimento'=>'asc'),'recursive' => 0, 'fields' => array('DISTINCT YEAR(Parcela.data_vencimento)')));
		
		$this->loadModel('Conta');
		$contasPagars = $this->Conta->find('all', array('conditions' => array('Conta.tipo' => 'A PAGAR'),'recursive'=>0));
	
		
		$this->set(compact('lotes','produtos','anosModel','contasPagars'));
	}
	
	
}
