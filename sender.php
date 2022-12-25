<?

// Универсальный отправщик
add_action('wp_ajax_newsendr', 'newsendr');
add_action('wp_ajax_nopriv_newsendr', 'newsendr');

function newsendr()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
       
		$send_adr = "rudikov-web@yandex.ru";
	
		$subj = "Сообщение с сайта";
		$content = "<h2>Новое сообщение с сайта</h2>";
		$content_tg = "Новое сообщение с сайта\n\r";

		for ($i =0; $i < count($_REQUEST["fildname"]); $i++) {
			$content .= $_REQUEST["fildval"][$i].": <strong>".$_REQUEST[$_REQUEST["fildname"][$i]]."</strong><br/>";
			$content_tg .= $_REQUEST["fildval"][$i].": ".$_REQUEST[$_REQUEST["fildname"][$i]]."\n\r";
		}

		message_to_telegram($content_tg);

		$headers = array(
			'From: Soffitto-57 <noreply@mirturizma46.ru>',
			'content-type: text/html',
		);

		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		if (wp_mail($send_adr, $subj, $content, $headers))
		{
			wp_die(true);
		} else {
			wp_die("NO ОК", '', 403 );
		}

	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

?>