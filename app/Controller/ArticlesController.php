<?php

App::uses('AppController', 'Controller');

/**
 * Articles Controller
 *
 * @property Article $Article
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ArticlesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Paginator', 'Session', 'Flash'];
    public $helpers = ['Gallery.Gallery'];

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Article->recursive = 0;
        $this->set('articles', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Article->exists($id)) {
            throw new NotFoundException(__('Invalid article'));
        }
        $options = ['conditions' => ['Article.' . $this->Article->primaryKey => $id]];
        $this->set('article', $this->Article->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Article->create();
            if ($this->Article->save($this->request->data)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $parentArticles = $this->Article->ParentArticle->find('list');
        $areas = $this->Article->Area->find('list');
        $this->set(compact('parentArticles', 'areas'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Article->exists($id)) {
            throw new NotFoundException(__('Invalid article'));
        }
        if ($this->request->is(['post', 'put'])) {
            if ($this->Article->save($this->request->data)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        } else {
            $options = [
                'conditions' => ['Article.' . $this->Article->primaryKey => $id],
            ];
            $this->request->data = $this->Article->find('first', $options);
        }
        $parentArticles = $this->Article->ParentArticle->find('list');
        $areas = $this->Article->Area->find('list');
        $this->set(compact('parentArticles', 'areas'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Article->id = $id;
        if (!$this->Article->exists()) {
            throw new NotFoundException(__('Invalid article'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Article->delete()) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index($parentId = null) {

//        $tree = $this->Article->find('threaded', [
//            'conditions' => ['parent_id' => $parentId],
//            'fields' => [
//                'id', 'lft', 'rght', 'parent_id', 'title',
//            ],
//            'order' => ['lft' => 'ASC']
//        ]);
        $tree = $this->Article->children(
                $parentId,
                false,
                ['id', 'lft', 'rght', 'parent_id', 'title',],
                ['lft' => 'ASC']
            );
        $roots = $this->Article->find('list', [
            'conditions' => ['parent_id' => null],
            'order' => ['lft' => 'ASC']
        ]);
        $this->set(compact('tree', 'roots', 'parentId'));
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Article->exists($id)) {
            throw new NotFoundException(__('Invalid article'));
        }
        $options = ['conditions' => ['Article.' . $this->Article->primaryKey => $id]];
        $this->set('article', $this->Article->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add($parentId = null) {
        if ($this->request->is('post')) {
            $this->Article->create();
            if ($this->Article->save($this->request->data)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $parents = $this->Article->ParentArticle->generateTreeList(null, null, null, '->');
//        debug($parents);
        $areas = $this->Article->Area->find('list', ['order' => ['name' => 'ASC']]);
        $this->set(compact('parents', 'areas', 'parentId'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Article->exists($id)) {
            throw new NotFoundException(__('Invalid article'));
        }
        if ($this->request->is(['post', 'put'])) {
            if ($this->Article->save($this->request->data)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        } else {
            $options = ['conditions' => ['Article.' . $this->Article->primaryKey => $id],
                'contain' => ['Area']
            ];
            $this->request->data = $this->Article->find('first', $options);
        }
        $parents = $this->Article->ParentArticle->generateTreeList(null, null, null, '->');
        $areas = $this->Article->Area->find('list', ['order' => ['name' => 'ASC']]);
        $this->set(compact('parents', 'areas'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Article->id = $id;
        if (!$this->Article->exists()) {
            throw new NotFoundException(__('Invalid article'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Article->delete()) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function admin_up($id = null) {
        if ($id == null) {
            die(__('Neplatná stránka.'));
        }
        $this->Article->id = $id;
        if ($this->Article->moveUp() == false) {
            $this->Flash->message(__('Stránka už nemůže být posunuta výše.'));
        }
        $this->redirect(array('action' => 'admin_index'));
    }

    public function admin_down($id = null) {
        if ($id == null) {
            die(__('Neplatná stránka.'));
        }
        $this->Article->id = $id;

        if ($this->Article->moveDown() == false) {
            $this->Flash->message(__('Stránka už nemůže být posunuta níže'));
        }
        $this->redirect(array('action' => 'admin_index'));
    }

}
