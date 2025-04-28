<?php

use Fuel\Core\Controller_Template;
use Fuel\Core\Fieldset;
use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Signout extends Controller_Template
{
  public $template = 'template/index';

  public function action_index()
  {
    $error = '';

    $form = Fieldset::forge('signoutform');

    $form->add('submit', '', array('type' => 'submit', 'value' => 'ログアウト'));

    if (Input::method() === 'POST') {
      $auth = Auth::instance();
      if ($auth->logout()) {
        Session::set_flash('sucMsg', 'ログアウトしました。');
        Response::redirect('/signin');
      } else {
        Session::set_flash('errMsg', 'ログアウトに失敗しました。');
      }
    }

    $view = View::forge('template/index');
    $view->set('head', View::forge('template/head'));
    $view->set('header', View::forge('template/header'));
    $view->set('contents', View::forge('auth/signout'));
    $view->set('footer', View::forge('template/footer'));
    $view->set_global('signoutform', $form->build(''), false);
    $view->set_global('error', $error);

    return $view;
  }
}
