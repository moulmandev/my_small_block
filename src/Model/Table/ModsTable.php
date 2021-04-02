<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ModsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->hasMany('Keywords');
        $this->addBehavior('Timestamp');
    }
}