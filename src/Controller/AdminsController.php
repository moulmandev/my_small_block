<?php

namespace App\Controller;

class AdminsController extends AppController {

    public function initialize(): void
    {
        parent::initialize();
    }

    public function index()
    {
        $level = $this->request->getQuery('level');
        $page = $this->request->getParam('page') ?? 1;
        $modsLocator = $this->getTableLocator()->get('Mods');

        if ($level != null){
            $modsArray = $modsLocator->find()
            ->limit(12)
            ->where([
                'Mods.show' => 0,
                'Mods.level' => (int) $level
            ])
            ->page($page)
            ->toArray();
        }
        else {
            $modsArray = $modsLocator->find()
            ->limit(12)
            ->where(['Mods.show' => 0,])
            ->page($page)
            ->toArray();
        }

        $this->set(compact('modsArray', 'page'));
    }

}