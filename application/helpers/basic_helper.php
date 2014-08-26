<?php

/*
 * Проверка на админа
 * Просто обёртка для метода
 * */
function is_admin()
{
	$self = get_instance();
	$self->load->model('login_model');
	return $self->login_model->is_admin();
}

/*
 * Дебагер переменной
 * */
function debug($arr, $return = FALSE)
{
	$dump = '';
	if (is_admin()) {
		$dump = '<pre>' . print_r($arr, TRUE) . '</pre>';
		if (!$return) {
			ob_end_clean();
			exit($dump);
		}
	}
	return $dump;
}

/*
 * Системные сообщения
 * */
function show_message($message)
{
	if ($message) {
		switch ($message) {
			case 'success':
				return '<div class="alert alert-success" role="alert">Успешно!</div>';
				break;
			case 'failed':
				return '<div class="alert alert-danger" role="alert">Ошибка!</div>';
				break;
			case 'added':
				return '<div class="alert alert-success" role="alert">Добавлено!</div>';
				break;
			case 'edited':
				return '<div class="alert alert-success" role="alert">Отредактировано!</div>';
				break;
			default:
				return '<div class="alert alert-danger" role="alert">' . $message . '</div>';
				break;
		}
	} else {
		return FALSE;
	}
}

/*
 * Функция выводит дропдаун со значением по умолчанию
 * */
function show_dropdown($name, $options, $selected = FALSE, $id = 'select')
{
	$result = '<select id="' . $id . '" name="' . $name . '" class="form-control">';
	$count = 0;
	foreach ($options as $key => $value) {
		($count == 0 AND !set_value($name)) ? $is_selected = TRUE : $is_selected = FALSE;
		$result .= '<option value="' . $key . '" ' . set_select($name, $key, $is_selected) . '>' . $value . '</option>';
		$count++;
	}
	$result .= '</select>';
	return $result;
}

/*
 * Обрезаем статью
 * */
function cute_text($string, $count)
{
	$length = strlen($string);
	if ($length > $count) {
		$length = 0;
		$result = '';
		$arr_string = explode(' ', $string);
		foreach ($arr_string as $word) {
			$length += strlen($word);
			if ($length < $count) {
				$result[] = $word;
			} else {
				break;
			}
		}
		return implode(' ', $result) . '...</p>';
	}
	return $string;
}

/*
 * Удаление одного уровня массива
 * */
function delete_keys($arr, $k = 'id', $v = 'name')
{
	$result = array();
	if (count($arr)) {
		foreach ($arr as $key => $value) {
			$result[$value->$k] = $value->$v;
		}
	}
	return $result;
}

/*
 * Вывести элемент меню
 * */
function show_link($link, $name, $admin = FALSE, $icon = FALSE)
{
	$active = '';
	$self = get_instance();
	$url = $admin ? (isset($self->uri->segments['2']) ? $self->uri->segments['2'] : TRUE) : (isset($self->uri->segments['1']) ? $self->uri->segments['1'] : TRUE);
	(($url == 'FALSE' AND $link == Settings::get('site_url')) OR substr_count($link, $url)) AND $active = 'active';
    if($admin){
        $result = '
        <a href="'.$link.'" class="thumbnail color-blue text-center '.$active.'">
			<span style="font-size: 100px;" class="'.$icon.'"></span>
			<ul class="list-group no-margin no-padding">
				<li class="list-group-item">'.$name.'</li>
			</ul>
		</a>';
    } else {
        $result =  '<li class="' . $active . '"><a href="' . $link . '">' . $name . '</a></li>';
    }
    return $result;
}

/*
 * Получение свойств объекта или массива
 * */
function get_value($obj, $key) {
	$obj = (array)$obj;
	if(isset($obj[$key])) {
		return $obj[$key];
	} else {
		return FALSE;
	}

}