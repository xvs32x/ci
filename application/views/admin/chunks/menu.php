<div class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Переключить меню</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="admin/"><?=Settings::get('site_name')?></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a target="_blank" href="#"><span class="glyphicon glyphicon-home"></span> Перейти на сайт</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Админ <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="admin/logout/"><span class="glyphicon glyphicon-lock"></span> Выход</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="container">
<div class="row admin_menu">
	<div class="col-xs-4 col-md-2">
        <?= show_link(Settings::get('site_url').'admin/settings/', 'Настройки', TRUE, $icon = 'glyphicon glyphicon-cog')?>
	</div>
	<div class="col-xs-4 col-md-2">
        <?= show_link(Settings::get('site_url').'admin/categs/', 'Категории', TRUE, $icon = 'glyphicon glyphicon-th')?>
	</div>
	<div class="col-xs-4 col-md-2">
        <?= show_link(Settings::get('site_url').'admin/articles/', 'Статьи', TRUE, $icon = 'glyphicon glyphicon-file')?>
	</div>
    <div class="col-xs-4 col-md-2">
        <?= show_link(Settings::get('site_url').'admin/gallery/', 'Галерея', TRUE, $icon = 'glyphicon glyphicon-camera')?>
    </div>
	<div class="col-xs-4 col-md-2">
        <?= show_link(Settings::get('site_url').'admin/pages/', 'Страницы', TRUE, $icon = 'glyphicon glyphicon-book')?>
	</div>

	<div class="col-xs-4 col-md-2">
        <?= show_link(Settings::get('site_url').'admin/statistic/', 'Статистика', TRUE, $icon = 'glyphicon glyphicon-stats')?>
	</div>
</div>