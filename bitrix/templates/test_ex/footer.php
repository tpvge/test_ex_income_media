</div>
</div>
<div class="sb_sidebar">
	<div class="sb_nav">
		<? $APPLICATION->IncludeComponent(
			"bitrix:menu",
			"menu_left",
			array(
				"ALLOW_MULTI_SELECT" => "N",
				"CHILD_MENU_TYPE" => "left",
				"DELAY" => "N",
				"MAX_LEVEL" => "1",
				"MENU_CACHE_GET_VARS" => array(),
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_TYPE" => "N",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"ROOT_MENU_TYPE" => "left",
				"USE_EXT" => "Y",
				"COMPONENT_TEMPLATE" => "menu_left"
			),
			false
		); ?>
	</div>

	<!--<div class="sb_event">
						<div class="sb_event_header"><h4>Ближайшие события</h4></div>
						<p><a href="">29 августа 2012, Москва</a></p>
						<p>Семинар производителей мебели России и СНГ, Обсуждение тенденций.</p>
					</div>-->

	<div class="sb_event">
		<div class="sb_event_header">
			<h4>Информация</h4>
		</div>
		<p>Семинар производителей мебели России и СНГ, Обсуждение тенденций.</p>
	</div>

	<div class="sb_action">
		<a href=""> <img src="<?= SITE_TEMPLATE_PATH ?>/content/11.png" alt=""> </a>
		<h4>Акция</h4>
		<h5><a href="">Мебельная полка всего за 560 Р</a></h5>
		<a href="" class="sb_action_more">Подробнее &rarr;</a>
	</div>
	<div class="sb_reviewed">
		<img src="<?= SITE_TEMPLATE_PATH ?>/content/8.png" class="sb_rw_avatar" alt="">
		<span class="sb_rw_name">Сергей Антонов</span>
		<span class="sb_rw_job">Руководитель финансового отдела “Банк+”</span>
		<p>“Покупал офисные стулья и столы, остался очень доволен! Низкие цены, быстрая доставка, обслуживание на высоте! Спасибо!”</p>
		<div class="clearboth"></div>
		<div class="sb_rw_arrow"></div>
	</div>
</div>
<div class="clearboth"></div>
</div>
</div>

<div class="ft_footer">
	<div class="ft_container">
		<div class="ft_about">
			<h4>О магазине</h4>
			<? $APPLICATION->IncludeComponent(
				"bitrix:menu",
				"bottom_menu",
				array(
					"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					"CHILD_MENU_TYPE" => "my_bottom_menu",	// Тип меню для остальных уровней
					"DELAY" => "N",	// Откладывать выполнение шаблона меню
					"MAX_LEVEL" => "1",	// Уровень вложенности меню
					"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
					"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"MENU_CACHE_TYPE" => "N",	// Тип кеширования
					"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
					"ROOT_MENU_TYPE" => "my_bottom_menu",	// Тип меню для первого уровня
					"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
					"COMPONENT_TEMPLATE" => "menu_left"
				),
				false
			); ?>
			<!-- <ul>
				<li><a href="">История</a></li>
				<li><a href="">Руководство</a></li>
				<li><a href="">Контакты</a></li>
			</ul> -->
		</div>
		<div class="ft_catalog">
			<h4>Каталог товаров</h4>
			<ul>
				<li><a href="">Кухни</a></li>
				<li><a href="">Кровати и кушетки</a></li>
				<li><a href="">Гарнитуры</a></li>
				<li><a href="">Тумобчки и прихожие</a></li>
				<li><a href="">Спальни и матрасы</a></li>
				<li><a href="">Аксессуары</a></li>
				<li><a href="">Столы и стулья</a></li>
				<li><a href="">Каталоги мебели</a></li>
				<li><a href="">Раскладные диваны</a></li>
				<li><a href="">Кресла</a></li>
			</ul>

		</div>
		<div class="ft_contacts">
			<h4>Контактная информация</h4>
			<!-- vCard        http://help.yandex.ru/webmaster/hcard.pdf      -->
			<p class="vcard">
				<span class="adr">
					<span class="street-address">ул. Летняя стр.12, офис 512</span>
				</span>
				<?
				$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"PATH" => "/include/telephone.php"
	),
	false
); ?>
				
				<strong>Время работы:</strong> <br /> <span class="workhours">ежедневно с 9-00 до 18-00</span><br />
			</p>
			<ul class="ft_solcial">
				<li><a href="" class="fb"></a></li>
				<li><a href="" class="tw"></a></li>
				<li><a href="" class="ok"></a></li>
				<li><a href="" class="vk"></a></li>
			</ul>
			<div class="ft_copyright">© 2000 - 2012 "Мебельный магазин" </div>


		</div>

		<div class="clearboth"></div>
	</div>
</div>
</div>
</body>

</html>