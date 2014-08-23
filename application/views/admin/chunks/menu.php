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
		<a href="admin/settings" class="thumbnail color-blue text-center">
			<span style="font-size: 100px;" class="glyphicon glyphicon-cog"></span>
			<ul class="list-group no-margin no-padding">
				<li class="list-group-item">Настройки</li>
			</ul>
		</a>
	</div>
	<div class="col-xs-4 col-md-2">
		<a href="admin/categs" class="thumbnail color-orange text-center">
			<span style="font-size: 100px;" class="glyphicon glyphicon-th"></span>
			<ul class="list-group no-margin no-padding">
				<li class="list-group-item">Категории</li>
			</ul>
		</a>
	</div>
	<div class="col-xs-4 col-md-2">
		<a href="admin/articles" class="thumbnail color-green text-center">
			<span style="font-size: 100px;" class="glyphicon glyphicon-file"></span>
			<ul class="list-group no-margin no-padding">
				<li class="list-group-item">Статьи</li>
			</ul>
		</a>
	</div>
	<div class="col-xs-4 col-md-2">
		<a href="admin/pages" class="thumbnail color-red text-center">
			<span style="font-size: 100px;" class="glyphicon glyphicon-book"></span>
			<ul class="list-group no-margin no-padding">
				<li class="list-group-item">Страницы</li>
			</ul>
		</a>
	</div>
	<div class="col-xs-4 col-md-2">
		<a href="admin/gallery" class="thumbnail color-red text-center">
			<span style="font-size: 100px;" class="glyphicon glyphicon-camera"></span>
			<ul class="list-group no-margin no-padding">
				<li class="list-group-item">Галерея</li>
			</ul>
		</a>
	</div>
	<div class="col-xs-4 col-md-2">
		<a href="admin/statistic" class="thumbnail color-red text-center">
			<span style="font-size: 100px;" class="glyphicon glyphicon-stats"></span>
			<ul class="list-group no-margin no-padding">
				<li class="list-group-item">Статистика</li>
			</ul>
		</a>
	</div>
</div>