<?php

use Fuel\Core\Controller_Template;

class Controller_Home extends Controller_Template
{

  public $template = 'template/index';

  public function action_index($param1 = null, $param2 = null)
  {
    //変数としてビューを割り当てる
    $this->template->head = View::forge('template/head');
    $this->template->contents = View::forge('home/content');
    $this->template->footer = View::forge('template/footer');
  }
}
