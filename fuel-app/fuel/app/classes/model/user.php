<?php
class Model_User extends \Orm\Model
{
  //使用するtable
  protected static $_table_name = "users";

  //プライマリキー
  protected static $_primary_key = array('id');

  //フィールド名
  protected static $_properties = array(
    'id',
    'username',
    'password',
    'salt',
    'group',
    'email',
    'last_login',
    'login_hash',
    'profile_fields',
  );
}
