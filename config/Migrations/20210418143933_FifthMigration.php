<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class FifthMigration extends AbstractMigration
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
        $this->table('users')
            ->addColumn('email', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('password', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
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
        $this->table('users')->drop()->save();
    }
}
