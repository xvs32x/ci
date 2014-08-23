<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/*
	 * Главная странциа
	 * */
	public function index()
	{
		$data['favorites'] = $this->articles_model->get_favorites(Settings::get('articles_favorites_count'));
		$this->load->view('site/index', $data);
	}

	/*===============================================Articles===================================================================*/
	/*
	* Cписок статей сайта
	* */
	public function articles($form_success = FALSE){
		$list = $this->articles_model->get_list();
		$this->load->view('admin/articles/index', array(
			'form_success' => $form_success,
			'list' => $list,
		));
	}
}
