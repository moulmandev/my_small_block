<?php

namespace App\Controller;

use \Cake\ORM\Query;
use App\Controller\AppController;

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
}
