<?php

use Fuel\Core\Controller_Template;
use Fuel\Core\Fieldset;
use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Signin extends Controller_Template
{
  const PASS_LENGTH_MIN = 6;
  const PASS_LENGTH_MAX = 20;

  public $template = 'template/index';

  public function action_index()
  {
    // ログイン済みの場合はマイページにリダイレクト
    if (Auth::check()) {
      Response::redirect('/member/mypage');
    }

    $error = '';
    $formData = '';

    $form = Fieldset::forge('signinform');

    $form->add('email', 'Email', array('type' => 'email', 'placeholder' => 'Email'))
      ->add_rule('required')
      ->add_rule('valid_email')
      ->add_rule('min_length', 1)
      ->add_rule('max_length', 255);

    $form->add('password', 'Password', array('type' => 'password', 'placeholder' => 'Password'))
      ->add_rule('required')
      ->add_rule('min_length', self::PASS_LENGTH_MIN)
      ->add_rule('max_length', self::PASS_LENGTH_MAX);

    $form->add('submit', '', array('type' => 'submit', 'value' => 'ログイン'));

    if (Input::method() === 'POST') {
      $val = $form->validation();

      if ($val->run()) {
        $formData = $val->validated();
        $auth = Auth::instance();
        if ($auth->login($formData['email'], $formData['password'])) {
          Session::set_flash('sucMsg', 'ログインしました。');
          Response::redirect('/member/mypage');
        } else {
          Session::set_flash('errMsg', 'ログインに失敗しました。');
        }
      } else {
        $error = $val->error();
        Session::set_flash('errMsg', 'ログインに失敗しました。');
      }
      // フォームにPOSTされた値をリセット
      $form->repopulate();
    }

    $view = View::forge('template/index');
    $view->set('head', View::forge('template/head'));
    $view->set('header', View::forge('template/header'));
    $view->set('contents', View::forge('auth/signin'));
    $view->set('footer', View::forge('template/footer'));
    $view->set_global('signinform', $form->build(''), false);
    $view->set_global('error', $error);

    return $view;
  }
}
