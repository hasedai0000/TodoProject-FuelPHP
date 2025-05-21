<?php

use Fuel\Core\Controller;
use Fuel\Core\Date;
use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;

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


  public function action_update($user_id = null)
  {
    if ($user_id === null) {
      return Response::redirect('member/mypage');
    }
    $user = Model_User::find($user_id);

    if (Input::method() === 'GET') {
      $valuesOfView['user_id'] = $user_id;
      return Response::forge(View::forge('member/update', $valuesOfView));
    }

    $username = Input::post('username');

    $user = Model_User::find($user_id);
    $user->username = $username;
    $user->updated = Date::forge()->format("%Y-%m-%d %H:%M:%S");
    $user->save();

    return Response::redirect('member/mypage');
  }

  // public function action_update()
  // {
  //   $username = Input::post('username');
  //   $user_id = Input::post('user_id');


  //   $user = Model_User::find($user_id);
  //   $user->username = $username;
  //   $user->updated = Date::forge()->format("%Y-%m-%d %H:%M:%S");
  //   $user->save();

  //   $userInfo = array(
  //     'user_id' => $user->id,
  //     'username' => $user->username,
  //     'email' => $user->email,
  //   );

  //   $view = View::forge('template/index');
  //   $view->set('head', View::forge('template/head'));
  //   $view->set('contents', View::forge('member/', ['user' => $userInfo]));
  //   $view->set('footer', View::forge('template/footer'));
  //   return $view;
  // }
}
