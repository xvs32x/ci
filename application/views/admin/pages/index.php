<?= $this->load->view('admin/chunks/header')?>
<?= $this->load->view('admin/chunks/menu')?>
	<div class="row content">
		<h3><a href="<?= Settings::get('site_url')?>admin/pages	"><span class="glyphicon glyphicon-book"></span> Статичные страницы</a></h3>
		<div class="well well-sm">
			<a href="admin/pages/add" class="text-left btn btn-default btn-block"><span class="glyphicon glyphicon-plus"></span> Добавить страницу</a>
		</div>
		<?= show_message($form_success)?>
		<?if($list):?>
			<div class="list-group">
				<?foreach($list as $item):?>
					<li class="list-group-item" id="id_<?= get_value($item, 'id')?>">
						<a href="admin/pages/edit/<?= $item->id?>">
							<?= $item->name?>
						</a>
						<a class="delete" href="admin/page_delete/<?= $item->id?>">
							<span class="glyphicon glyphicon-remove pull-right"></span>
						</a>
					</li>
				<?endforeach?>
			</div>
		<?endif?>
	</div>
<?= $this->load->view('admin/chunks/footer')?>