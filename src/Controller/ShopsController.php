<?php

namespace App\Controller;

use \Cake\ORM\Query;
use App\Controller\AppController;
use Cake\Http\Session;

class ShopsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
    }

    public function index() {
        //TODO filters
        $modsLocator = $this->getTableLocator()->get('Mods');
        $keywordsLocator = $this->getTableLocator()->get('Keywords');
        $keywords = $keywordsLocator->find()
            ->select(['key'])
            ->group('keywords.`key`')
            ->toArray();
        $params = $this->request->getQuery();
        if (!empty($params)){

            $modsArray = $modsLocator->find()
                ->innerJoinWith('Keywords', function (Query $q) use ($params){
                    return $q
                        ->where(['Keywords.key' => $params['key']]);
                })
                ->limit(6)
                ->toArray();

        }
        else {

            $modsArray = $modsLocator->find()
                ->limit(6)
                ->toArray();
        }

        $this->set(compact("modsArray", 'keywords'));
    }

    public function cart() {

    }

    public function addCart() {
        $id = $this->request->getParam('id')[0] ?? "0";

        $session = new Session();
        $cart = $session->read("cart");
        if ($cart == null) {
            $cart = array();
            $session->write('cart', $cart);
        }
        array_push($cart, $id);
        $session->write('cart', $cart);
        $this->Flash->success('Added to cart !');

        return $this->redirect($this->referer());
    }

    public function removeCart() {
        $id = $this->request->getParam('id')[0] ?? "0";

        //TODO: ça fonctionne pas il faut recup l'array et pop l'id correspondant
        $session = new Session();
        $session->delete('cart.'.$id);
        $this->Flash->success('Removed from cart !');

        return $this->redirect($this->referer());
    }
}
