<?= $this->load->view('site/chunks/header') ?>
<?= $this->load->view('site/chunks/menu') ?>


<? if(Settings::get('site_jumbotron')):?>
	<div class="jumbotron">
		<?= Settings::get('site_jumbotron') ?>
	</div>
<? endif ?>


<? if (count($favorites['articles'])): ?>
	<div class="row">
		<? foreach ($favorites['articles'] as $article):
			isset($favorites['images'][$article->id]) ? $image = $favorites['images'][$article->id] : $image = FALSE;
			?>
			<div class="col-sm-6 col-xs-6 col-md-<?= 12 / Settings::get('articles_favorites_count') ?>">
				<?= $this->load->view('site/chunks/articles/favorite', array(
					'name' => get_value($article, 'name'),
					'alias' => get_value($article, 'alias'),
					'categ_alias' => get_value($article, 'categ_alias'),
					'preview' => get_value($article, 'preview'),
					'image' => $image,
				)) ?>
			</div>
		<? endforeach ?>
	</div>
	<hr/>
<? endif ?>


	<div class="row">
		<div class="col-md-12">
			<div class="well"><?= Settings::get('site_index_text') ?></div>
		</div>
	</div>



<?= $this->load->view('site/chunks/footer') ?>