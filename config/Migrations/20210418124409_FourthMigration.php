<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class FourthMigration extends AbstractMigration
{
    public function up()
    {
        $this->table('mods')
            ->addColumn('level', 'integer', [
                'default' => 1,
                'limit' => null,
                'null' => true,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('mods')
            ->removeColumn('level')
            ->update();
    }
}
