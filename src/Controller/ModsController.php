<?php

namespace App\Controller;

use App\Controller\AppController;

class ModsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
    }

    public function index() {
        $id = $this->request->getParam('id')[0] ?? "0";

        $mod = $this->Mods->find()
            ->where([
                "id = " => $id
            ])
            ->toArray();
        $mod = $mod[0];
        $this->set(compact("mod"));
    }
}
