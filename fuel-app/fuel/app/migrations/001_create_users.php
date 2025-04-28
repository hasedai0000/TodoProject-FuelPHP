<?php

namespace Fuel\Migrations;

class Create_users
{
  const TABLE_NAME = 'users';
  public function up()
  {
    \DBUtil::create_table(
      self::TABLE_NAME,
      array(
        'id' => array(
          'type' => 'int',
          'constraint' => 11,
          'auto_increment' => true,
          'unsigned' => true,
          'null' => false,
        ),
        'username' => array(
          'type' => 'varchar',
          'constraint' => 50,
          'character_set' => 'utf8',
          'collate' => 'utf8_unicode_ci',
          'null' => false,
        ),
        'password' => array(
          'type' => 'varchar',
          'constraint' => 255,
          'character_set' => 'utf8',
          'collate' => 'utf8_unicode_ci',
          'null' => false,
        ),
        'salt' => array(
          'type' => 'varchar',
          'constraint' => 255,
          'character_set' => 'utf8',
          'collate' => 'utf8_unicode_ci',
          'null' => false,
        ),
        '`group`' => array(
          'type' => 'int',
          'constraint' => 11,
          'null' => false,
          'default' => 1,
        ),
        'email' => array(
          'type' => 'varchar',
          'constraint' => 255,
          'character_set' => 'utf8',
          'collate' => 'utf8_unicode_ci',
          'null' => false,
        ),
        'last_login' => array(
          'type' => 'varchar',
          'constraint' => 25,
          'character_set' => 'utf8',
          'collate' => 'utf8_unicode_ci',
          'null' => false,
          'default' => '0',
        ),
        'login_hash' => array(
          'type' => 'varchar',
          'constraint' => 255,
          'character_set' => 'utf8',
          'collate' => 'utf8_unicode_ci',
          'null' => false,
        ),
        'profile_fields' => array(
          'type' => 'text',
          'character_set' => 'utf8',
          'collate' => 'utf8_unicode_ci',
          'null' => false,
        ),
        'created_at' => array(
          'type' => 'int',
          'constraint' => 11,
          'unsigned' => true,
          'null' => false,
        ),
      ),
      array('id')
    );

    // ユニークインデックスを別途追加
    \DBUtil::create_index(self::TABLE_NAME, array('username', 'email'), 'username', 'UNIQUE');
  }

  public function down()
  {
    \DBUtil::drop_index(self::TABLE_NAME, 'username');

    \DBUtil::drop_table(self::TABLE_NAME);
  }
}
