<!-- В этом файле описываем все  всплывающие окна -->

<!-- Popup-JS -->
<div class="popup popup_callback">
	<div class="popup__content">
		<div class="popup__body">
			<div class="popup__close" aria-label="Закрыть модальное окно"></div> 
			<div class="popup__item d-flex">
				<div class="popup__img">
						<img src="<?php echo get_template_directory_uri(); ?>/images/popup.jpg" alt="">
				</div>
				<div class="popup__form-block">  
					<h2>Заказать звонок</h2> 

						<p class="popup__notific">Оставьте заявку и мы свяжемся с Вами в течении 15 минут</p>
						<form id="request_call" class="form">
							
							<div class="SendetMsg form_msg" style="display:none;"> 
								Ваше сообщение успешно отправлено.
							</div>
							<div class="headen_form_blk">

							<div class="form__line">
								<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Заказать звонок">
								<input type="hidden" name = "form_address" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://forestsea.ru/kontakty":get_the_permalink()?>">
								<input required type="text" name="name" data-valuem = "Имя" placeholder="Имя*" class="popup__form-input input">
								<input required type="tel" name="tel" data-valuem = "Телефон" placeholder="Телефон*" class="popup__form-input input _phone"> 
							</div>
							<p class="popup__policy">Заполняя данную форму вы соглашаетесь с <a href="#">политикой
									конфиденциальности</a></p>
							<button type = "submit" class="popup__form-btn btn new_send_btn" data-formid = "request_call">Заказать</button>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <a href="#callback" class="header__popup-link _popup-link">ЗАКАЗАТЬ ЗВОНОК</a> -->
<!-- Popup-JS End -->
