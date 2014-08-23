<?= $this->load->view('site/chunks/header')?>
<?= $this->load->view('site/chunks/menu')?>
	<div class="content">
		<?= breadcrumbs::get() ?>
		<div class="articles">
			<?foreach($list as $article):?>
				<?= $this->load->view('site/chunks/articles/list', $article)?>
			<?endforeach?>
		</div>
		<?= $this->pagination->create_links() ?>
	</div>
<?= $this->load->view('site/chunks/footer')?>