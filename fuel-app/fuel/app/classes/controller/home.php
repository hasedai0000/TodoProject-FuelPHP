<?php
class Controller_Home extends Controller
{
  public function action_index()
  {
    //変数としてビューを割り当てる
    $view = View::forge('home/index'); //テンプレートとなるビューファイルの読込み
    $view->set('head', View::forge('template/head'));
    $view->set('contents', View::forge('home/content'));
    $view->set('footer', View::forge('template/footer'));
    $view->set_global('username', 'Daichi');

    // レンダリングした HTML をリクエストに返す
    return $view;
  }
}
