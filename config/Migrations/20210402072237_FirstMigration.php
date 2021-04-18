<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class FirstMigration extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('keywords')
            ->addColumn('mod_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('keyword', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'mod_id',
                ]
            )
            ->create();

        $this->table('mods')
            ->addColumn('price', 'float', [
                'default' => '0',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('picture', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('keywords')
            ->addForeignKey(
                'mod_id',
                'mods',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {
        $this->table('keywords')
            ->dropForeignKey(
                'mod_id'
            )->save();

        $this->table('keywords')->drop()->save();
        $this->table('mods')->drop()->save();
    }
}
