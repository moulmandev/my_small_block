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
        $modsLocator = $this->getTableLocator()->get('Mods');
        $keywordsLocator = $this->getTableLocator()->get('Keywords');
        $keywords = $keywordsLocator->find()
            ->select(['key'])
            ->group('keywords.`key`')
            ->toArray();

        $params = $this->request->getParam('keyword') ?? array();

        if (!empty($params)){
            $modsArray = $modsLocator->find()
                ->innerJoinWith('Keywords', function (Query $q) use ($params){
                    return $q
                        ->where(['Keywords.key' => $params]);
                })
                ->limit(6)
                ->where(['Mods.show' => 1])
                ->toArray();
        }
        else {
            $modsArray = $modsLocator->find()
                ->limit(6)
                ->where(['Mods.show' => 1])
                ->toArray();
        }

        $this->set(compact("modsArray", 'keywords'));
    }

    public function cart() {
        $session = new Session();
        $cart = $session->read("cart");
        $cartArray = array();

        if ($cart != null) {
            $modsLocator = $this->getTableLocator()->get('Mods');

            $cartArray = $modsLocator->find()
                ->where(function ($expression, $query) use ($cart) {
                    return $expression->in('id', $cart);
                })
                ->limit(6)
                ->toArray();
        }
        $this->set(compact("cartArray"));
    }

    public function addCart() {
        $id = $this->request->getParam('id') ?? "0";

        $session = new Session();
        $cart = $session->read("cart");
        if ($cart == null)
            $cart = array();
        array_push($cart, $id);
        $session->write('cart', $cart);
        $this->Flash->success('Added to cart !');

        return $this->redirect($this->referer());
    }

    public function removeCart() {
        $id = $this->request->getParam('id')[0] ?? "0";

        //TODO: ça fonctionne pas il faut recup l'array et pop l'id correspondant
        $session = new Session();
        $cart = $session->read("cart");
        if ($cart != null) {
            foreach ($cart as $k => $v) {
                if ($v == $id) {
                    unset($cart[$k]);
                }
            }
            $session->write('cart', $cart);
        }

        $this->Flash->success('Removed from cart !');

        return $this->redirect($this->referer());
    }
}
