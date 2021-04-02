<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class KeywordsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->belongsTo('Mods');
    }
}