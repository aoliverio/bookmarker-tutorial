<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 */
class BookmarksController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->Bookmarks = TableRegistry::get('App.Bookmarks');
        $query = $this->Bookmarks->find('all');
        $query->contain(['Users']);
        $query->where($this->filteredWhereConditions());        
        $query->limit(1000);
        $this->set('data', $query->toArray());
        $this->set('_serialize', ['data']);
    }
    
    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Users', 'Tags']
        ]);
        $this->set('bookmark', $bookmark);
        $this->set('_serialize', ['bookmark']);
    }
    
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('post')) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success('The bookmark has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The bookmark could not be saved. Please, try again.');
            }
        }
        $this->set(compact('bookmark'));
        $this->set('_serialize', ['bookmark']);
        $this->filteredSelectOptions();
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success('The bookmark has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The bookmark could not be saved. Please, try again.');
            }
        }
        $this->set(compact('bookmark'));
        $this->set('_serialize', ['bookmark']);
        $this->filteredSelectOptions();
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $bookmark = $this->Bookmarks->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Bookmarks->delete($bookmark)) {
                $this->Flash->success('The bookmark has been deleted.');
            } else {
                $this->Flash->error('The bookmark could not be deleted. Please, try again.');
            }
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('bookmark'));
    }
    
    /**
     * Filter method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function filter($action = 'set') {
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->session()->check('Bookmarks')) {
            $session = $this->request->session()->read('Bookmarks');
            $bookmark = $this->Bookmarks->patchEntity($bookmark,  $session);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($action == 'unset') {
                $this->request->session()->delete('Bookmarks');
            } else {
                $this->request->session()->write('Bookmarks', $this->request->data);
            }
            $this->Flash->success('The bookmark has been saved.');
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('bookmark'));
        $this->set('_serialize', ['bookmark']);
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
        $users = $this->Bookmarks->Users->find('list', ['limit' => 200]);
        $tags = $this->Bookmarks->Tags->find('list', ['limit' => 200]);
        $this->set(compact('users', 'tags'));
    }
    
}