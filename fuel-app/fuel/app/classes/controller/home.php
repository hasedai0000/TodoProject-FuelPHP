<?php

/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
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
