<?php

	function include_template($name, array $data = []) {
	    $name = $name;
	    $result = '';

	    if (!is_readable($name)) { // проверка читаемости файла
	        return $result;
	    }

	    ob_start(); // начало буферизации
	    extract($data); // превращение элементов массива в переменные
	    require $name; // подключение шаблона с извлеченными данными

	    $result = ob_get_clean(); // конец буферизации

	    return $result; // возвращение  html кода с переданными данными
	}

?>