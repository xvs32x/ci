<?php
class articles_model extends CI_Model {

	public $table = 'articles';


	function __construct()
	{
		parent::__construct();
	}

	/*
	 * Список всех статей
	 * */
	public function get_list(){
		return $this->db->get($this->table)
			->result();
	}

	/*
	 * Получить записи текущей категории
	 * */
	public function get_category_list($id) {
		return $this->db->get_where($this->table, array('category_id' => $id))
			->result();
	}

	/*
	 * Получить записи favorites
	 * */
	public function get_favorites($count = 20) {
		return $this->db->get_where($this->table, array('favorite' => 1, 'publish' => 1), $count)
			->result();
	}

	/*
	 * Получиить запись по id
	 * */
	public function get_record($value, $mode = 'id') {
		return $this->db->get_where($this->table, array($mode => $value))
			->row();
	}


	/*
	 * Добавить запись в Mysql
	 * */
	public function add_record() {
		$data = array(
			'id' => NULL,
			'name' => $this->input->post('name'),
			'alias' => $this->input->post('alias'),
			'category_id' => $this->input->post('category_id'),
			'preview' => $this->input->post('preview'),
			'text' => $this->input->post('text'),
			'publish' => $this->input->post('publish'),
			'favorite' => $this->input->post('favorite'),
			'seo_title' => $this->input->post('seo_title'),
			'seo_description' => $this->input->post('seo_description'),
			'seo_keywords' => $this->input->post('seo_keywords'),
		);
		$this->db->insert($this->table, $data);
	}

	/*
	 * Обновить запись в Mysql
	 * */
	public function update($id){
		$data = array(
			'name' => $this->input->post('name'),
			'alias' => $this->input->post('alias'),
			'category_id' => $this->input->post('category_id'),
			'preview' => $this->input->post('preview'),
			'text' => $this->input->post('text'),
			'publish' => $this->input->post('publish') OR NULL,
			'favorite' => $this->input->post('favorite') OR NULL,
			'seo_title' => $this->input->post('seo_title'),
			'seo_description' => $this->input->post('seo_description'),
			'seo_keywords' => $this->input->post('seo_keywords'),
		);
		return $this->db->update($this->table, $data, array('id' => $id));
	}

	/*
	 * Удалить запись из Mysql
	 * */
	public function delete($id){
		return $this->db->delete($this->table, array('id' => (int)$id));
	}

	/*
	 * Валидация формы добавление параметра
	 * */
	public function validate() {
		$this->form_validation->set_rules('name', 'Название', 'trim|required');
		$this->form_validation->set_rules('alias', 'Псевдоним', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Категория', 'required');
		$this->form_validation->set_rules('preview', 'Вступление', 'trim|required');
		$this->form_validation->set_rules('text', 'Подробный текст', 'trim|required');
		$this->form_validation->set_rules('publish', 'Опубликовано', 'not_required');
		$this->form_validation->set_rules('favorite', 'Избранное', 'not_required');
		$this->input->post('id') AND $this->form_validation->set_rules('id', 'id', 'not_required');
	}


}