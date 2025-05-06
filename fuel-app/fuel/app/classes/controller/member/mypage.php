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
    $user_id = Arr::get(Auth::get_user_id(), 1); //ユーザIDを取得

    $user = Model_User::find($user_id);

    $userInfo = array(
      'user_id' => $user->id,
      'username' => $user->username,
      'email' => $user->email,
    );

    //変数としてビューを割り当てる
    $view = View::forge('template/index');
    $view->set('head', View::forge('template/head'));
    $view->set('header', View::forge('template/header'));
    $view->set('contents', View::forge('member/mypage', ['user' => $userInfo]));
    $view->set('footer', View::forge('template/footer'));
    return $view;
  }
}
