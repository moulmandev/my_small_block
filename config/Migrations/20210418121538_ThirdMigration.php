<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class ThirdMigration extends AbstractMigration
{
    public function up()
    {
        $this->table('mods')
            ->addColumn('isShown', 'integer', [
                'default' => 0,
                'limit' => null,
                'null' => true,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('mods')
            ->removeColumn('isShown')
            ->update();
    }
}
