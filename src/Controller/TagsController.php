<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Tags Controller
 *
 * @property \App\Model\Table\TagsTable $Tags
 */
class TagsController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->Tags = TableRegistry::get('App.Tags');
        $query = $this->Tags->find('all');
        $query->where($this->filteredWhereConditions());        
        $query->limit(1000);
        $this->set('data', $query->toArray());
        $this->set('_serialize', ['data']);
    }
    
    /**
     * View method
     *
     * @param string|null $id Tag id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $tag = $this->Tags->get($id, [
            'contain' => ['Bookmarks']
        ]);
        $this->set('tag', $tag);
        $this->set('_serialize', ['tag']);
    }
    
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $tag = $this->Tags->newEntity();
        if ($this->request->is('post')) {
            $tag = $this->Tags->patchEntity($tag, $this->request->data);
            if ($this->Tags->save($tag)) {
                $this->Flash->success('The tag has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The tag could not be saved. Please, try again.');
            }
        }
        $this->set(compact('tag'));
        $this->set('_serialize', ['tag']);
        $this->filteredSelectOptions();
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Tag id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $tag = $this->Tags->get($id, [
            'contain' => ['Bookmarks']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tag = $this->Tags->patchEntity($tag, $this->request->data);
            if ($this->Tags->save($tag)) {
                $this->Flash->success('The tag has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The tag could not be saved. Please, try again.');
            }
        }
        $this->set(compact('tag'));
        $this->set('_serialize', ['tag']);
        $this->filteredSelectOptions();
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Tag id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $tag = $this->Tags->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Tags->delete($tag)) {
                $this->Flash->success('The tag has been deleted.');
            } else {
                $this->Flash->error('The tag could not be deleted. Please, try again.');
            }
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('tag'));
    }
    
    /**
     * Filter method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function filter($action = 'set') {
        $tag = $this->Tags->newEntity();
        if ($this->request->session()->check('Tags')) {
            $session = $this->request->session()->read('Tags');
            $tag = $this->Tags->patchEntity($tag,  $session);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($action == 'unset') {
                $this->request->session()->delete('Tags');
            } else {
                $this->request->session()->write('Tags', $this->request->data);
            }
            $this->Flash->success('The tag has been saved.');
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('tag'));
        $this->set('_serialize', ['tag']);
    }

    /**
     * This function is used to filter where conditions
     * 
     * @return type
     */
    public function filteredWhereConditions() {
        $filter = [];
        return $filter;
    }

    /**
     * This function is used to filter select options
     */
    public function filteredSelectOptions() {
        $bookmarks = $this->Tags->Bookmarks->find('list', ['limit' => 200]);
        $this->set(compact('bookmarks'));
    }
    
}