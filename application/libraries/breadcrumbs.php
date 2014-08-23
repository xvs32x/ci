<?php

class Breadcrumbs {

	public static $breadcrumbs = array();

	/*
	 * Формирование осуществляется вручную вызовом set в контроллере.
	 * */
	public function __Construct(){
		$self = get_instance();
		$self->load->library('Settings');
		//Добавляем главную в крошки
		self::$breadcrumbs[0] = array(
			'link' => Settings::get('site_url'),
			'name' => 'Главная'
		);

	}

	/*
	 * Добавление крошек
	 * */
	public static function set($link, $name){
		self::$breadcrumbs[] = array(
			'link' => $link,
			'name' => $name
		);
	}

	/*
	 * Выводим хлебные крошки
	 * */
	public function get(){
		//Определяем последний элемент с помошью счётчика
		$count = count(self::$breadcrumbs);
		$i = 1;
		$result[] = '<ol class="breadcrumb">';
		foreach(self::$breadcrumbs as $item){
			if($i != $count) {
				$result[] = '<li><a href="'.$item['link'].'">'.$item['name'].'</a></li>';
			} else {
				$result[] = '<li class="active">'.$item['name'].'</li>';
			}
			$i++;
		}
		$result[] = '</ol>';
		return implode('', $result);
	}

//	/*
//	 * Beta. Возможны ошибки
//	 * */
//	public function __Construct(){
//		$self = get_instance();
//		$self->load->helper('URL');
//		$self->load->library('Settings');
//		$components = Settings::get('components');//Список компонентов берём из конфига
//		isset($prev) AND $prev = 'articles';
//		$count = isset($self->uri->segments) ? count($self->uri->segments) : array();
//		$i = 0;
//		$component_name = 'pages_model';
//		//Главную показываем всегда
//		self::$breadcrumbs = '
//			<ol class="breadcrumb">
//				<li><a href="'.Settings::get('site_url').'">Главная</a></li>';
//		if(isset($self->uri->segments) AND isset($self->uri->segments[1]) AND $self->uri->segments[1] != 'admin') {
//			foreach($self->uri->segments as $alias) {
//				$i++;//Счётчик для определения последнего пункта
//				if(file_exists(APPPATH.'models/'.$alias.'_model.php')){
//					$name = isset($components[$alias]) ? $components[$alias] : 'empty';//вывести название компонента или empty
//					$component_name = $alias;//Установка текущего компонента
//				} elseif(!file_exists(APPPATH.'models/'.$alias.'_model.php')) {
//					$model = $component_name.'_model';
//					$self->load->model($model);
//					$name = get_value($self->$model->get_record($alias, 'alias'), 'name');
//				}
//				$active = ($i == $count ? 'class="active"' : FALSE);
//				(isset($name) AND $name != FALSE) AND self::$breadcrumbs .= $active ? '<li '.$active.'>'.$name.'</li>' : '<li '.$active.'><a href="'.$alias.'">'.$name.'</a></li>';
//
//			}
//		}
//		self::$breadcrumbs .= '</ol>';
//	}



}