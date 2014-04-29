<?php
App::uses('AppController', 'Controller');
/**
 * Centrocustos Controller
 *
 * @property Centrocusto $Centrocusto
 * @property PaginatorComponent $Paginator
 */
class CentrocustosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler','lifecareFuncs');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'contas';
		$this->Paginator->settings = array(
				'Centrocusto' => array(
					'fields' => array('DISTINCT Centrocusto.id', 'Centrocusto.*'),
					'fields_toCount' => 'DISTINCT Centrocusto.id',
					'limit' => $this->request['url']['limit'],
					'order' => 'Centrocusto.nome ASC',
					'conditions' => $this->Filter->getConditions()
				)
			);
		$centrocustos = $this->Centrocusto->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Centrocusto.id', 'Centrocusto.*'), 'order' => 'Centrocusto.nome ASC'));
		$centrocustos = $this->Paginator->paginate('Centrocusto');
		
		$this->set(compact('centrocustos'));
	}
	
	public function getMes(&$numero) {
		
		
		switch ($numero){
			case '01':
			$meuMes="Janeiro";
			return $meuMes;
		
			break;
			
			case '02':
			
			$meuMes="Fevereiro";
			return $meuMes;
			
			break;
			
			case '03':
			
			$meuMes="Março";
			return $meuMes;
			
			break;
			
			case '04':
			
			$meuMes="Abril";
			return $meuMes;
			
			break;
			
			case '05':
		
			$meuMes="Maio";
			return $meuMes;
		
		
			break;
			
			case '06':
		
			$meuMes="Junho";
			return $meuMes;
			
		
			break;
			
			case '07':
		
			$meuMes="Julho";
			return $meuMes;
			
			
			case '08':
		
			$meuMes="Agosto";
			return $meuMes;
			
			
			break;
			
			case '09':
			$meuMes= "Setembro";
			return $meuMes;
			break;
			
			case '10':
		
			$meuMes="Outubro";
			return $meuMes;
			//código se var1 for 4
		
			break;
			
			case '11':
		
			$meuMes="Novembro";
			return $meuMes;
			//código se var1 for 4
		
			break;
			
			case '12':
		
			$meuMes="Dezembro";
			return $meuMes;
			//código se var1 for 4
		
			break;
		
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 
 	public function getReceitasDespesas(&$idCentro, &$mes, &$ano) {
 		$contas = $this->Conta->find('all', array('recursive' => -1,'conditions' => array('Conta.centrocusto_id' => $idCentro, 'AND' => array('Conta.data_emissao LIKE' => '%'.$ano.'-'.$mes.'%'))));
		
		
		$this->loadModel('Orcamentocentro');
		
		$orcamento= $this->Orcamentocentro->find('first', array('recursive' => -1,'conditions' => array('Orcamentocentro.centrocusto_id' => $idCentro, 'AND' => array('Orcamentocentro.periodo_final Like' => '%'.$ano.'-'.$mes.'%'))));
		 
		if(!empty($contas)){
			$resultadoGetRD = array();
			$resultadoGetRD['receita']=0;
			$resultadoGetRD['despesa']=0;
	 		foreach($contas as $conta){
	 			
	 			if($conta['Conta']['tipo'] == 'A RECEBER'){
	 				
					
	 				$conta['Conta']['valor']= floatval($conta['Conta']['valor']);
	 				$resultadoGetRD['receita'] =$resultadoGetRD['receita'] + $conta['Conta']['valor'];
					
					$resultadoGetRD['mes']= $this->getMes($mes);
					
					if(!empty($orcamento['Orcamentocentro']['id'])){
						$resultadoGetRD['IdOrcamento']=$orcamento['Orcamentocentro']['id'];
					}
					
					
	 			}
			
				if($conta['Conta']['tipo'] == 'A PAGAR'){
					$conta['Conta']['valor']= floatval($conta['Conta']['valor']);
	 				$resultadoGetRD['despesa'] = $resultadoGetRD['despesa'] + $conta['Conta']['valor'];
					$resultadoGetRD['limite'] = $orcamento['Orcamentocentro']['limite'];
					$resultadoGetRD['mes']= $this->getMes($mes);
	 			}
	 		}
			return $resultadoGetRD;
		}
		
	}
	
	public function view($id = null) {
		$this->layout = 'contas';
		
		$this->loadModel('Conta');
		
		
		if(!isset($_GET['y'])){
		
			$ano = date('Y');
		}else{
			
			$ano = $_GET['y'];
		}
			
			
		$recdespAux= array();
		$recdesp =array();
		for($i = 1; $i <= 12; $i++){
			
			if($i < 10){
				$mes ='0'.$i;	
			}else{
				$mes =$i;
			}
			
			
			$recdespAux = $this->getReceitasDespesas($id, $mes, $ano);	
			
			
			
		
			//$recdespAux['mes']=$nomeMes;
			
			array_push($recdesp, $recdespAux);
			
			
		}
		
		
		
		$anos= $this->Conta->find('all', array('recursive' => -1,'fields' => 'DISTINCT YEAR(Conta.data_emissao)','conditions' => array('Conta.centrocusto_id' => $id)));
		
		
	
		if (!$this->Centrocusto->exists($id)) {
			throw new NotFoundException(__('Invalid centrocusto'));
		}
		$options = array('conditions' => array('Centrocusto.' . $this->Centrocusto->primaryKey => $id));
		$this->set('centrocusto', $this->Centrocusto->find('first', $options));
		$this->set(compact('contas', 'recdesp','ano', 'mes','anos'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'contas';
		if ($this->request->is('post')) {
			$this->Centrocusto->create();
			$this->lifecareFuncs->converterMoedaToBD($this->request->data['Centrocusto']['limite']);
			if ($this->Centrocusto->saveAll($this->request->data)) {
				//$this->Session->setFlash(__('The centrocusto has been saved.'));
				
				
				$ultimoCentrocusto = $this->Centrocusto->find('first', array('order' => array('Centrocusto.id' => 'desc')));
				$this->set(compact('ultimoCentrocusto'));
				
				if(! $this->request->is('ajax'))
				{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$ultimoCentrocusto = array('Centrocusto'=>array("id"=>"0"));

				$errors = $this->Centrocusto->invalidFields();

				$str_erros = "Erro ao adicionar Centrocusto. ";
				
				foreach ($errors as $error)
				{
					$str_erros .= $error[0] . "\n";
				}

				$this->Session->setFlash(__($str_erros));
				$this->set(compact('ultimoCentrocusto'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'contas';
		
		$this->loadModel('Conta');
		if(!isset($_GET['y'])){
		
			$ano = date('Y');
		}else{
			
			$ano = $_GET['y'];
		}
			
			
		$recdespAux= array();
		$recdesp =array();
		for($i = 1; $i <= 12; $i++){
			
			if($i < 10){
				$mes ='0'.$i;	
			}else{
				$mes =$i;
			}
			
			
			$recdespAux = $this->getReceitasDespesas($id, $mes, $ano);	
			
			
			
		
			//$recdespAux['mes']=$nomeMes;
			
			array_push($recdesp, $recdespAux);
			
			
		}
		
		
		
		$anos = $this->Conta->find('all', array('recursive' => -1,'fields' => 'DISTINCT YEAR(Conta.data_emissao)','conditions' => array('Conta.centrocusto_id' => $id)));
		
		$this->set(compact('contas', 'recdesp','ano', 'mes','anos'));
		
		if (!$this->Centrocusto->exists($id)) {
			throw new NotFoundException(__('Invalid centrocusto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			
			if ($this->Centrocusto->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The centrocusto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The centrocusto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Centrocusto.' . $this->Centrocusto->primaryKey => $id));
			$this->request->data = $this->Centrocusto->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Centrocusto->id = $id;
		if (!$this->Centrocusto->exists()) {
			throw new NotFoundException(__('Invalid centrocusto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Centrocusto->delete()) {
			$this->Session->setFlash(__('The centrocusto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The centrocusto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
