<div class='btn-group w-100 mb-3'>
    <?= $this->Html->link(
            'Tous',
            ['controller' => 'Admins', 'action' => 'index', 1],
            ['class' => 'btn btn-outline-primary']
        ); ?>
    <?php 
    for ($i = 1; $i < 6; $i++){
        echo $this->Html->link(
            'Niveau '.$i,
            ['controller' => 'Admins', 'action' => 'index', 1, '?' => ['level' => $i]],
            ['class' => 'btn btn-outline-primary']
        );
    }
    ?>
</div>

<div>
    <?php
    /** @var array $modsArray */
    foreach ($modsArray as $k => $v) {
        echo $this->element('front/mod', array("data" => $v));
    }
    ?>
</div>

<div>
    <?= $this->Html->link(
            'Précédent',
            /** @var int $page */
            ['controller' => 'Admins', 'action' => 'index', $page-1],
            [
                'class' => ($page == 1)?'btn btn-outline-primary ml-3 disabled':'btn btn-outline-primary ml-3',
            ]
        ); ?>

<?= $this->Html->link(
            'Suivant',
            ['controller' => 'Admins', 'action' => 'index', $page+1],
            [
                'class' => (count($modsArray) < 12)?'btn btn-outline-primary float-right mr-3 disabled':'btn btn-outline-primary float-right mr-3',
            ]
        ); ?>
</div>