<?php
App::uses('AppController', 'Controller');
/**
 * Saidas Controller
 *
 * @property Saida $Saida
 * @property PaginatorComponent $Paginator
 */
class SaidasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Saida->recursive = 0;
		$this->set('saidas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Saida->exists($id)) {
			throw new NotFoundException(__('Invalid saida'));
		}
		$options = array('conditions' => array('Saida.' . $this->Saida->primaryKey => $id));
		$this->set('saida', $this->Saida->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Saida->create();
			if ($this->Saida->save($this->request->data)) {
				$this->Session->setFlash(__('The saida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The saida could not be saved. Please, try again.'));
			}
		}
		$parceirodenegocios = $this->Saida->Parceirodenegocio->find('list');
		$transportadores = $this->Saida->Transportadore->find('list');
		$cufs = $this->Saida->Cuf->find('list');
		$clientes = $this->Saida->Cliente->find('list');
		$pedidovendas = $this->Saida->Pedidovenda->find('list');
		$comoperacaos = $this->Saida->Comoperacao->find('list');
		$indpags = $this->Saida->Indpag->find('list');
		$mods = $this->Saida->Mod->find('list');
		$series = $this->Saida->Serie->find('list');
		$tpnfs = $this->Saida->Tpnf->find('list');
		$cmunfgs = $this->Saida->Cmunfg->find('list');
		$tpimps = $this->Saida->Tpimp->find('list');
		$cdvs = $this->Saida->Cdv->find('list');
		$tpambs = $this->Saida->Tpamb->find('list');
		$finnves = $this->Saida->Finnfe->find('list');
		$procemis = $this->Saida->Procemi->find('list');
		$verprocs = $this->Saida->Verproc->find('list');
		$transps = $this->Saida->Transp->find('list');
		$natops = $this->Saida->Natop->find('list');
		$produtos = $this->Saida->Produto->find('list');
		$this->set(compact('parceirodenegocios', 'transportadores', 'cufs', 'clientes', 'pedidovendas', 'comoperacaos', 'indpags', 'mods', 'series', 'tpnfs', 'cmunfgs', 'tpimps', 'cdvs', 'tpambs', 'finnves', 'procemis', 'verprocs', 'transps', 'natops', 'produtos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Saida->exists($id)) {
			throw new NotFoundException(__('Invalid saida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Saida->save($this->request->data)) {
				$this->Session->setFlash(__('The saida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The saida could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Saida.' . $this->Saida->primaryKey => $id));
			$this->request->data = $this->Saida->find('first', $options);
		}
		$parceirodenegocios = $this->Saida->Parceirodenegocio->find('list');
		$transportadores = $this->Saida->Transportadore->find('list');
		$cufs = $this->Saida->Cuf->find('list');
		$clientes = $this->Saida->Cliente->find('list');
		$pedidovendas = $this->Saida->Pedidovenda->find('list');
		$comoperacaos = $this->Saida->Comoperacao->find('list');
		$indpags = $this->Saida->Indpag->find('list');
		$mods = $this->Saida->Mod->find('list');
		$series = $this->Saida->Serie->find('list');
		$tpnfs = $this->Saida->Tpnf->find('list');
		$cmunfgs = $this->Saida->Cmunfg->find('list');
		$tpimps = $this->Saida->Tpimp->find('list');
		$cdvs = $this->Saida->Cdv->find('list');
		$tpambs = $this->Saida->Tpamb->find('list');
		$finnves = $this->Saida->Finnfe->find('list');
		$procemis = $this->Saida->Procemi->find('list');
		$verprocs = $this->Saida->Verproc->find('list');
		$transps = $this->Saida->Transp->find('list');
		$natops = $this->Saida->Natop->find('list');
		$produtos = $this->Saida->Produto->find('list');
		$this->set(compact('parceirodenegocios', 'transportadores', 'cufs', 'clientes', 'pedidovendas', 'comoperacaos', 'indpags', 'mods', 'series', 'tpnfs', 'cmunfgs', 'tpimps', 'cdvs', 'tpambs', 'finnves', 'procemis', 'verprocs', 'transps', 'natops', 'produtos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Saida->id = $id;
		if (!$this->Saida->exists()) {
			throw new NotFoundException(__('Invalid saida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Saida->delete()) {
			$this->Session->setFlash(__('The saida has been deleted.'));
		} else {
			$this->Session->setFlash(__('The saida could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
