<?php

use Fuel\Core\Controller_Template;
use Fuel\Core\View;
use Model\Welcome;

class Controller_Home extends Controller_Template
{

  public $template = 'template/index';

  public function action_index($param1 = null, $param2 = null)
  {
    //変数としてビューを割り当てる
    $this->template->head = View::forge('template/head');
    $this->template->contents = View::forge('home/content');
    $this->template->footer = View::forge('template/footer');
    $data = Welcome::get_results();
    $this->template->data = $data;
  }
}
