<?php
	require_once('helpers.php');

		$result = '';

		if(isset($_POST['submit'])){
			$incomingLink = $_POST['link'];
			$date = $_POST['date'];

			if ($date == '') {
				$date = date('o-m-d');
			}

			$type_traffic = $_POST['type_traffic'];

			if ($type_traffic == 'other') {
				$type_traffic = $_POST['type_traffic_other'];
			}

			if ($incomingLink != '') {
				$utm = urlencode("utm_source=social&utm_medium=".$type_traffic."&utm_campaign=");
				$preUtm = "?";
				for ($i = 0; $i < strlen($incomingLink); $i++) {
					if ($incomingLink[$i] === "?") {
						$preUtm = urlencode("&");
					}
				}
				$click = "https://clck.ru/--?url=";
				$collectedLink = $incomingLink.$preUtm.$utm.$date;
				$result = file_get_contents($click.$collectedLink);
			}
		}

		if(isset($_POST['reset'])){
			$result = '';
		}

		if ($result != '') {
			$content = include_template('template.php', ['title' => 'Автоматические сокращение ссылок для соц сетей', 'result' => $result]);
		} else if (isset($incomingLink) and $incomingLink == '') {
			$content = include_template('template.php', ['title' => 'Автоматические сокращение ссылок для соц сетей', 'empty_link' => 'Заполните поле для ссылки']);
		} else {
			$content = include_template('template.php', ['title' => 'Автоматические сокращение ссылок для соц сетей']);
		}

		print($content);

?>