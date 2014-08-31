<?= $this->load->view('site/chunks/header') ?>
<?= $this->load->view('site/chunks/menu') ?>

<div class="row">
		<div class="col-sm-12">
			<?= breadcrumbs::get() ?>
		</div>
		<div class="article">
			<div class="col-sm-3 col-xs-6"><img src="http://placehold.it/320x200" class="img-rounded img-responsive" alt=""></div>
			<div class="col-sm-3 col-xs-6"><img src="http://placehold.it/320x200" class="img-rounded img-responsive" alt=""></div>
			<div class="col-sm-3 col-xs-6"><img src="http://placehold.it/320x200" class="img-rounded img-responsive" alt=""></div>
			<div class="col-sm-3 col-xs-6"><img src="http://placehold.it/320x200" class="img-rounded img-responsive" alt=""></div>
			<div class="clearfix"></div>
			<div class="col-sm-12">
				<h1><?= $name ?></h1>
				<p><?= $text ?></p>
			</div>
		</div>
</div>

<?= $this->load->view('site/chunks/footer') ?>