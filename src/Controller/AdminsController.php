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
        $keywordsLocator = $this->getTableLocator()->get('Keywords');
        $modEntity = $modsLocator->newEmptyEntity();

        $data = $this->request->getData();

        if (!empty($data)){

            $modsLocator->patchEntity($modEntity, [
                'name' => $data["name"],
                'description' => $data["description"],
                'price' => $data["price"],
                'picture' => $data["picture"],
                'level' => 5,
                'show' => false,
            ]);
            $modsLocator->save($modEntity);

            $tags = explode(",", $data["tags"]);
            foreach ($tags as $k => $v) {
                $tagEntity = $keywordsLocator->newEmptyEntity();
                $keywordsLocator->patchEntity($tagEntity, [
                    'mod_id' => $modEntity["id"],
                    'keyword' => $v,
                ]);
                $keywordsLocator->save($tagEntity);
            }

            return $this->redirect(['controller' => 'Shops', 'action' => 'index']);
        }

        $this->set(compact('modEntity'));
    }

    public function addToCatalogue() {
        $id = $this->request->getParam('id') ?? "0";

        $modsLocator = $this->getTableLocator()->get('Mods');
        $entity = $modsLocator->get($id);

        $entity->isShown = 1;

        $modsLocator->save($entity);
        $this->Flash->success('Mod visible dans le catalogue');
        return $this->redirect($this->referer());
    }

    public function removeFromCatalogue() {
        $id = $this->request->getParam('id') ?? "0";

        $modsLocator = $this->getTableLocator()->get('Mods');
        $entity = $modsLocator->get($id);

        $entity->isShown = 0;

        $modsLocator->save($entity);
        $this->Flash->success('Mod non-visible dans le catalogue');
        return $this->redirect($this->referer());
    }

    public function removeFromDb() {
        $id = $this->request->getParam('id') ?? "0";

        $modsLocator = $this->getTableLocator()->get('Mods');
        $entity = $modsLocator->get($id);
        $modsLocator->delete($entity);

        $this->Flash->success('Mod supprimé');
        return $this->redirect(['controller' => 'Admins', 'action' => 'index']);
    }

    public function setStars() {
        $id = $this->request->getParam('id') ?? "0";
        $stars = $this->request->getQuery('stars') ?? "1";

        if ($stars > 0 && $stars < 6) {
            $modsLocator = $this->getTableLocator()->get('Mods');
            $entity = $modsLocator->get($id);

            $entity->level = $stars;

            $modsLocator->save($entity);
            $this->Flash->success('Notation changée');
        }
        return $this->redirect($this->referer());
    }
}
