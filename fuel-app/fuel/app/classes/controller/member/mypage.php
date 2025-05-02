<?php

use Fuel\Core\Controller;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;
use Model\Welcome;

class Controller_Member_Mypage extends Controller
{
  public function before()
  {
    // ログインチェック
    if (!Auth::check()) {
      Session::set_flash('infoMsg', 'すでにログインしています。');
      Response::redirect('/signin');
    }
  }

  public function action_index()
  {
    // ログインユーザーの取得
    $user = array();
    $user['user_name'] = Auth::get_screen_name(); // ユーザー名を取得
    $user['user_id'] = Arr::get(Auth::get_user_id(), 1); //ユーザIDを取得

    //変数としてビューを割り当てる
    $view = View::forge('template/index');
    $view->set('head', View::forge('template/head'));
    $view->set('header', View::forge('template/header'));
    $view->set('contents', View::forge('member/mypage', ['user' => $user]));
    $view->set('footer', View::forge('template/footer'));
    return $view;
  }
}
