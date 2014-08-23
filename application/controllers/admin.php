<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
//		debug($this->config);
		$this->load->view('admin/index');
	}

	/*
	 * Страница входа
	 * */
	public function login($form_success = FALSE){
		is_admin() AND redirect('/admin/');
		$this->load->helper(array('form', 'url'));
		$this->load->view('admin/login/index', array(
			'form_success' => $form_success,
		));
		if ($this->input->post()) {
			$this->load->library('form_validation');
			$this->login_model->validate();
			//Валидация данных
			if ($this->form_validation->run() == FALSE) {
				redirect('/admin/login/failed');
			} else {
				if($this->login_model->login_as_admin()) {
					$this->session->set_userdata('admin', TRUE);
					redirect('/admin/');
				} else {
					redirect('/admin/login/failed');
				}
			}
		}
	}

	/*
	 * Выход из админки
	 * */
	public function logout(){
		$this->session->unset_userdata('admin');
		redirect('/');
	}

	/*===============================================Settings===================================================================*/
	/*
	 * Главная страница
	 * Выводим список всех параметров
	 * */
	public function settings($form_success = FALSE){
		$list = $this->settings_model->get_list();
		$this->load->view('admin/settings/index', array(
			'form_success' => $form_success,
			'list' => $list,
		));
	}

	/*
	 * Редактирование настройки
	 * Форма редактирования настройки с вводом названия и выбором типа
	 * */
	public function setting_edit($id = FALSE)
	{
		Scripts::set(Settings::get('editor_scripts'));
		$this->load->helper(array('form', 'url'));
		//Если форма отправлена
		if ($this->input->post()) {
			$this->load->library('form_validation');
			$this->settings_model->validate();
			//Валидация данных
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/settings/edit');
			} else {
				//Обновить или добавить данные?
				if ($this->input->post('id')) {
					$this->settings_model->update($this->input->post('id'));
					redirect('/admin/settings/edited');
				} else {
					$this->settings_model->add_record();
					redirect('/admin/settings/added');
				}
			}
		} //Если параметр редактируется, а не создаётся
		elseif ($id) {
			$row = $this->settings_model->get_record((int)$id);
			if (count($row)) {
				foreach ($row as $key => $value) {
					$_POST[$key] = $value;
				}
				$this->load->view('admin/settings/edit', array('edit' => TRUE));
			} else {
				redirect('/admin/settings/failed');
			}
		} //Форма добавления параметра
		else {
			$this->load->view('admin/settings/edit');
		}
	}

	/*
	 * Удаление выбранного параметра
	 * */
	public function setting_delete($id, $ajax = FALSE) {
		if((int)$id){
			$this->settings_model->delete($id);
			if(!$ajax){
				redirect('/admin/settings/success');
			} else {
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('id' => $id)));
			}
		} else {
			redirect('/admin/settings/failed');
		}
	}

	/*===============================================Categories===================================================================*/
	/*
	* Cписок категорий сайта
	* */
	public function categs($form_success = FALSE){
		$list = $this->categs_model->get_list();
		$this->load->view('admin/categs/index', array(
			'form_success' => $form_success,
			'list' => $list,
		));
	}

	/*
	 * Редактирование категории
	 * Форма редактирования категории статей
	 * */
	public function categ_edit($id = FALSE)
	{
		Scripts::set(Settings::get('editor_scripts'));
		Scripts::set(Settings::get('friendly_url_scripts'));
		$this->load->helper(array('form', 'url'));
		//Если форма отправлена
		if ($this->input->post()) {
			$this->load->library('form_validation');
			$this->categs_model->validate();
			//Валидация данных
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/categs/edit');
			} else {
				//Обновить или добавить данные?
				if ($this->input->post('id')) {
					$this->categs_model->update($this->input->post('id'));
					redirect('/admin/categs/edited');
				} else {
					$this->categs_model->add_record();
					redirect('/admin/categs/added');
				}
			}
		} //Если категория редактируется, а не создаётся
		elseif ($id) {
			$row = $this->categs_model->get_record((int)$id);
			if (count($row)) {
				foreach ($row as $key => $value) {
					$_POST[$key] = $value;
				}
				$this->load->view('admin/categs/edit', array('edit' => TRUE));
			} else {
				redirect('/admin/categs/failed');
			}
		} //Форма добавления категории
		else {
			$this->load->view('admin/categs/edit');
		}
	}

	/*
	 * Удаление выбранного параметра
	 * */
	public function categ_delete($id, $ajax = FALSE) {
		if((int)$id){
			$this->categs_model->delete($id);
			if(!$ajax){
				redirect('/admin/categs/success');
			} else {
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('id' => $id)));
			}
		} else {
			redirect('/admin/categs/failed');
		}
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

	/*
	 * Редактирование статьи
	 * Форма редактирования категории статей
	 * */
	public function article_edit($id = FALSE)
	{
		Scripts::set(Settings::get('editor_scripts'));
		Scripts::set(Settings::get('friendly_url_scripts'));
		$this->load->helper(array('form', 'url'));
		//Если форма отправлена
		if ($this->input->post()) {
			$this->load->library('form_validation');
			$this->articles_model->validate();
			//Валидация данных
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/articles/edit');
			} else {
				//Обновить или добавить данные?
				if ($this->input->post('id')) {
					$this->articles_model->update($this->input->post('id'));
					redirect('/admin/articles/edited');
				} else {
					$this->articles_model->add_record();
					redirect('/admin/articles/added');
				}
			}
		} //Если категория редактируется, а не создаётся
		elseif ($id) {
			$row = $this->articles_model->get_record((int)$id);
			if (count($row)) {
				foreach ($row as $key => $value) {
					$_POST[$key] = $value;
				}
				$this->load->view('admin/articles/edit', array('edit' => TRUE));
			} else {
				redirect('/admin/articles/failed');
			}
		} //Форма добавления категории
		else {
			$this->load->view('admin/articles/edit');
		}
	}

	/*
	 * Удаление выбранной категории
	 * */
	public function article_delete($id, $ajax = FALSE) {
		if((int)$id){
			$this->articles_model->delete($id);
			if(!$ajax){
				redirect('/admin/articles/success');
			} else {
				$this->output
				->set_content_type('application/json')
					->set_output(json_encode(array('id' => $id)));
			}
		} else {
			redirect('/admin/articles/failed');
		}
	}


	/*===============================================Gallery===================================================================*/
	/*
	* Cписок альбомов сайта
	* */
	public function gallery($form_success = FALSE){
		$list = $this->gallery_model->get_list();
		$this->load->view('admin/gallery/index', array(
			'form_success' => $form_success,
			'list' => $list,
		));
	}

	/*
	 * Редактирование статьи
	 * Форма редактирования категории статей
	 * */
	public function album_edit($id = FALSE)
	{
//		$this->output->enable_profiler(TRUE);
		Scripts::set(Settings::get('editor_scripts'));
		Scripts::set(Settings::get('gallery_scripts'));
		Scripts::set(Settings::get('friendly_url_scripts'));
		Scripts::set(Settings::get('cropper_scripts'));
		$this->load->helper(array('form', 'url'));
		//Если форма отправлена
		if ($this->input->post()) {
			$this->load->library('form_validation');
			$this->gallery_model->validate();
			//Валидация данных
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/gallery/edit');
			} else {
				//Обновить или добавить данные?
				if ($this->input->post('id')) {
					$this->gallery_model->update($this->input->post('id'));
					redirect('/admin/gallery/edited');
				} else {
					$this->gallery_model->add_record();
					redirect('/admin/gallery/added');
				}
			}
		} //Если альбом редактируется, а не создаётся
		elseif ($id) {
			$row = $this->gallery_model->get_record((int)$id);
			if (count($row)) {
				foreach ($row as $key => $value) {
					$_POST[$key] = $value;
				}
				$images = $this->gallery_model->get_images_by_album($id);
				$this->load->view('admin/gallery/edit', array(
					'edit' => TRUE,
					'images' => $images));
			} else {
				redirect('/admin/gallery/failed');
			}
		} //Форма добавления альбома
		else {
			$this->load->view('admin/gallery/edit');
		}
	}

	/*
	 * Удаление выбранного альбома
	 * */
	public function album_delete($id, $ajax = FALSE) {
		if((int)$id){
			$this->gallery_model->delete($id);
			if(!$ajax){
				redirect('/admin/articles/success');
			} else {
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('id' => $id)));
			}
		} else {
			redirect('/admin/articles/failed');
		}
	}

	/*
	 * Загрузка изображений средствами js
	 * */
	public function album_upload($id = FALSE){
		if($id){
			$result = array();
			$config = array(
				'upload_path' => $this->gallery_model->originals_path,
				'allowed_types' => 'jpg|jpeg|png|gif',
			);
			$this->load->library('upload', $config);
			if($this->upload->do_upload('file')){
				$result = $this->gallery_model->upload_images($this->upload->data());
			} else {
				$result['error'] = $this->upload->display_errors();
			}
			//Добавляем изображение в БД
			if(!is_array($result)) {
				$id = $this->gallery_model->add_image((int)$id, $result);
				$data = array(
					'result' => 'ok',
					'id' => $id,
					'thumb' => $this->gallery_model->thumbs_url.$result,
					'resized' => $this->gallery_model->resizes_url.$result,
					'delete_link' => Settings::get('site_url').'admin/delete_image/',
					'edit_link' => Settings::get('site_url').'admin/edit_image/'
				);
			} else {
				$data = array(
					'error' => $result['error']
				);
			}
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
		}
	}

	/*
	 * AJAX удаление изображений
	 * */
	public function delete_image($id, $ajax = FALSE){
		if((int)$id){
			$this->gallery_model->delete_image((int)$id);
			if(!$ajax){
				redirect('/admin/gallery/success');
			} else {
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('id' => $id)));
			}
		} else {
			redirect('/admin/gallery/failed');
		}
	}

}

