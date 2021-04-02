<?php

namespace App\Controller;

use App\Controller\AppController;

class ShopsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
    }

    public function index() {
        $modsLocator = $this->getTableLocator()->get('Mods');

        $modsArray = $modsLocator->find()
            ->limit(6)
            ->toArray();

        $this->set(compact("modsArray"));
    }
}
