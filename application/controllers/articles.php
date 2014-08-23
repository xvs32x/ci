<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller {

	/*===============================================Articles===================================================================*/

	/*
	* Cписок статей сайта
	* */
	public function index($page = 1){
		Breadcrumbs::set(Settings::get('site_url').'articles/', 'Статьи');
		$this->db->limit(Settings::get('articles_items_per_pages'), Settings::get('articles_items_per_pages')*($page-1));
		$list = $this->articles_model->get_list() OR show_404();
		$config = array(
			'base_url' => Settings::get('site_url').'articles/',
			'total_rows' => $this->db->count_all($this->articles_model->table),
			'per_page' => Settings::get('articles_items_per_pages'),
			'uri_segment' => 2,
		);
		$this->pagination->initialize($config);
		$this->load->view('site/articles/index', array('list' => $list));
	}

	/*
	* Cписок статей сайта c категориями
	* */
	public function with_categs($category_alias, $page = 1){
		$category = $this->categs_model->get_record($category_alias, 'alias');
		Breadcrumbs::set(Settings::get('site_url').'articles/', 'Статьи');
		Breadcrumbs::set(Settings::get('site_url').'articles/'.get_value($category, 'alias'), get_value($category, 'name'));
		$count = $this->db
			->where('category_id', get_value($category, 'id'))
			->count_all_results($this->articles_model->table);
		$this->db->limit(Settings::get('articles_items_per_pages'), Settings::get('articles_items_per_pages')*($page-1));
		$list = $this->articles_model->get_category_list(get_value($category, 'id')) OR show_404();
		$config = array(
			'base_url' => Settings::get('site_url').'articles/'.$category_alias.'/',
			'total_rows' => $count,
			'per_page' => Settings::get('articles_items_per_pages'),
			'uri_segment' => 3,
		);
		$this->pagination->initialize($config);
		$this->load->view('site/articles/index', array('list' => $list));
	}

	/*
	 * Вывод одной статьи
	 * */
	public function view($alias = FALSE) {
		!$alias AND redirect(Settings::get('site_url').'articles/');
		$article = $this->articles_model->get_record($alias, 'alias');
		$category = $this->categs_model->get_record(get_value($article, 'category_id'));
		//Хлебные крошки
		Breadcrumbs::set(Settings::get('site_url').'articles/', 'Статьи');
		Breadcrumbs::set(Settings::get('site_url').'articles/'.get_value($category, 'alias'), get_value($category, 'name'));
		Breadcrumbs::set(get_value($article, 'alias'), get_value($article, 'name'));
		//Шаблон
		$this->load->view('site/articles/item', $article);



	}
}