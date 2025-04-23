<?php

use Fuel\Core\Controller_Template;
use Fuel\Core\Fieldset;
use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;

class Controller_Signup extends Controller_Template
{
  const PASS_LENGTH_MIN = 6;
  const PASS_LENGTH_MAX = 20;

  public $template = 'template/index';

  public function action_index()
  {
    $error = '';
    $formData = '';

    $form = Fieldset::forge('signupform');

    $form->add('username', 'ユーザー名', array('type' => 'text', 'placeholder' => 'ユーザー名'))
      ->add_rule('required')
      ->add_rule('min_length', 1)
      ->add_rule('max_length', 255);

    $form->add('email', 'Email', array('type' => 'email', 'placeholder' => 'Email'))
      ->add_rule('required')
      ->add_rule('valid_email')
      ->add_rule('min_length', 1)
      ->add_rule('max_length', 255);

    $form->add('password', 'Password', array('type' => 'password', 'placeholder' => 'Password'))
      ->add_rule('required')
      ->add_rule('min_length', self::PASS_LENGTH_MIN)
      ->add_rule('max_length', self::PASS_LENGTH_MAX);

    $form->add('password_confirm', 'Password（再入力）', array('type' => 'password', 'placeholder' => 'Password（再入力）'))
      ->add_rule('match_field', 'password')
      ->add_rule('required')
      ->add_rule('min_length', self::PASS_LENGTH_MIN)
      ->add_rule('max_length', self::PASS_LENGTH_MAX);

    $form->add('submit', '', array('type' => 'submit', 'value' => '登録'));

    if (Input::method() === 'POST') {
      $val = $form->validation();

      if ($val->run()) {
        $formData = $val->validated();
        $auth = Auth::instance();
        if ($auth->create_user($formData['username'], $formData['password'], $formData['email'])) {
          Session::set_flash('sucMsg', 'ユーザー登録が完了しました。');
          Response::redirect('/member/mypage');
        } else {
          Session::set_flash('errMsg', 'ユーザー登録に失敗しました。');
        }
      } else {
        $error = $val->error();
        Session::set_flash('errMsg', 'ユーザー登録に失敗しました。');
      }
      // フォームにPOSTされた値をリセット
      $form->repopulate();
    }

    $view = View::forge('template/index');
    $view->set('head', View::forge('template/head'));
    $view->set('header', View::forge('template/header'));
    $view->set('contents', View::forge('auth/signup'));
    $view->set('footer', View::forge('template/footer'));
    $view->set_global('signupform', $form->build(''), false);
    $view->set_global('error', $error);

    return $view;
  }
}
