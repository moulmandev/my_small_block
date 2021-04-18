<?php

namespace App\Controller;

use App\Controller\AppController;

class ModsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->Authentication->addUnauthenticatedActions(['index', 'api']);
    }

    public function index() {
        $id = $this->request->getParam('id')[0] ?? "0";

        $mod = $this->Mods->find()
            ->where([
                "id = " => $id
            ])
            ->contain('Keywords')
            ->toArray();
        $mod = $mod[0];
        $this->set(compact("mod"));
    }

    public function api()
    {
        $mods = $this->Mods->find()
            ->contain('Keywords')
            ->toArray();

        return $this->response
            ->withStringBody(json_encode($mods))
            ->withType('application/json');
    }
}
