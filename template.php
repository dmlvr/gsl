<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta charset="utf-8">
	<title><?php print($title);?></title>
	<link href="style.css" rel="stylesheet"/>
	<link href="flatpickr.min.css" rel="stylesheet"/>
</head>
<body>
	<form method="post">
		<h1>Сокращатель</h1>
		<p>Автоматическое сокращение ссылок с добавлением UTM меток. Используется для размещения в социальных сетях.</p>
		<label for="link">
			<span>Ссылка</span>
			<input id="link" type="text" name="link" onFocus="this.select()" autofocus="autofocus" placeholder="Скопируйте ссылку, которую необходимо сократить" value="<?php if(isset($result)):?><?php print($result);?><?php endif;?>">
			<?php if(isset($empty_link)): ?>
				<span style="color: red; margin-top: 5px;"><?php print($empty_link); ?></span>
			<?php endif; ?>
		</label>
		<?php if ($result == ''): ?>
		<label for="date">
			<span>Дата размещения (по умолчанию всегда сегодня)</span> 
			<input class="flatpickr-input" id="date" type="text" name="date" placeholder="Выберите дату в формате ГГГГ-ММ-ДД">
		</label>
		<span>Тип трафика</span>
		<div class="radio_buttons">
			<label class="adv_hide-field" for="organik_traffic">
	      <input type="radio" name="type_traffic" id="organik_traffic" checked="" value="post">
	      <span>Органика</span>
	    </label>
	    <label class="adv_hide-field" for="adv_traffic">
	      <input type="radio" name="type_traffic" id="adv_traffic" value="adv">
	      <span>Реклама</span>
	    </label>
	    <label class="adv_show-field" for="adv_other">
	      <input type="radio" name="type_traffic" id="adv_other" value="other">
	      <span>Другой</span>
	    </label>
  	</div>
  	<label class="field hidden" for="adv_other_value">
			<span>Укажите тип трафика латиницей без пробелов</span> 
			<input id="adv_other_value" type="text" name="type_traffic_other" placeholder="Введите тип трафика латицицей без пробелов">
		</label>
		<?php endif; ?>
		<?php if ($result == ''): ?>
		<button class="button" name="submit">
			<span class="get_link">Получить ссылку</span>
			<span class="download hidden">Загрузка...</span>
		</button>
		<?php else: ?>
		<button class="button" name="reset"><span>Сократить еще ссылку</span></button>
		<?php endif; ?>
	</form>
	<script src="flatpickr.js"></script>
	<script type="text/javascript" src="main.js"></script>
</body>
</html>