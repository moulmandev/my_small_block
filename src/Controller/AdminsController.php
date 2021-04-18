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
                'Mods.level' => (int) $level
            ])
            ->page($page)
            ->toArray();
        }
        else {
            $modsArray = $modsLocator->find()
            ->limit(12)
            ->page($page)
            ->toArray();
        }

        $this->set(compact('modsArray', 'page'));
    }

    public function add(){
        $modsLocator = $this->getTableLocator()->get('Mods');
        $modEntity = $modsLocator->newEmptyEntity();

        if (!empty($this->request->getData())){
            
            $modsLocator->patchEntity($modEntity, array_merge($this->request->getData(), [
                'level' => 5,
                'show' => false,
            ]));
            
            $modsLocator->save($modEntity);


        }

        $this->set(compact('modEntity'));
    }

}