<?= $this->load->view('site/chunks/header') ?>
<?= $this->load->view('site/chunks/menu') ?>

<? if(Settings::get('site_jumbotron')):?>
	<div class="jumbotron">
		<?= Settings::get('site_jumbotron') ?>
	</div>
<? endif ?>

<? if (count($favorites)): ?>
	<div class="row">
		<? foreach ($favorites as $article): ?>
			<div class="col-md-<?= 12 / Settings::get('articles_favorites_count') ?>">
				<?= $this->load->view('site/chunks/articles/favorite', $article) ?>
			</div>
		<? endforeach ?>
	</div>
	<hr/>
<? endif ?>

<?= $this->load->view('site/chunks/footer') ?>