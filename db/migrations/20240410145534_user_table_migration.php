<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UserTableMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('user');

        $table->addColumn('name', 'string', ['length' => 20])
            ->addColumn('username', 'string', ['length' => 20])
            ->addColumn('nickname', 'string', ['length' => 20])
            ->addColumn('email', 'string', ['length' => 255])
            ->addColumn('role', 'string', ['length' => 20])
            ->addColumn('password_hash', 'string', ['length' => 255])
            ->addColumn('auth_token', 'string', ['length' => 255])
            ->addColumn('is_confirmed', 'integer', ['length' => 11, 'default' => 0])
            ->create();
    }
}
