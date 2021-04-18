<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions(['login', 'addAdmin']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Shops',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Shops', 'action' => 'index']);
        }
    }

    public function addAdmin() {
        $user = ['email' => 'admin@admin.fr', 'password' => 'admin'];
        $userEntity = $this->Users->newEntity($user);

        $this->Users->save($userEntity);
        $this->Flash->success(__('Compte admin crée (admin@admin.fr admin)'));

        return $this->redirect($this->referer());
    }
}
