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

        $this->Authentication->addUnauthenticatedActions(['index', 'cart', 'addCart', 'removeCart']);
    }

    public function index() {
        $modsLocator = $this->getTableLocator()->get('Mods');
        $keywordsLocator = $this->getTableLocator()->get('Keywords');
        $keywords = $keywordsLocator->find()
            ->select(['keyword'])
            ->group('keywords.`keyword`')
            ->toArray();

        $params = $this->request->getParam('keyword') ?? array();

        if (!empty($params)){
            $modsArray = $modsLocator->find()
                ->innerJoinWith('Keywords', function (Query $q) use ($params){
                    return $q
                        ->where(['Keywords.keyword' => $params]);
                })
                ->limit(6)
                ->where(['Mods.isShown' => 1])
                ->toArray();
        }
        else {
            $modsArray = $modsLocator->find()
                ->limit(6)
                ->where(['Mods.isShown' => 1])
                ->toArray();
        }

        $this->set(compact("modsArray", 'keywords'));
    }

    public function cart() {
        $session = new Session();
        $cart = $session->read("cart");
        $cartArray = array();
        $totalPrice = 0;

        if ($cart != null) {
            $modsLocator = $this->getTableLocator()->get('Mods');

            $cartArray = $modsLocator->find()
                ->where(function ($expression, $query) use ($cart) {
                    return $expression->in('id', $cart);
                })
                ->limit(6)
                ->toArray();
        }

        foreach ($cartArray as $k => $v) {
            $totalPrice += $v["price"];
        }


        $this->set(compact("cartArray", "totalPrice"));
    }

    public function addCart() {
        $id = $this->request->getParam('id') ?? "0";

        $session = new Session();
        $cart = $session->read("cart");
        if ($cart == null)
            $cart = array();


        if (!in_array($id, $cart)) {
            array_push($cart, $id);
            $session->write('cart', $cart);
            $this->Flash->success('Added to cart !');
        } else {
            $this->Flash->error('Already in cart !');
        }



        return $this->redirect($this->referer());
    }

    public function removeCart() {
        $id = $this->request->getParam('id')[0] ?? "0";

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
