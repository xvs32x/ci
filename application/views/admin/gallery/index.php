<?= $this->load->view('admin/chunks/header')?>
<?= $this->load->view('admin/chunks/menu')?>
	<div class="row content">
		<h3><a href="<?= Settings::get('site_url')?>admin/gallery"><span class="glyphicon glyphicon-camera"></span> Альбомы</a></h3>
		<div class="well well-sm">
			<a href="admin/album_edit" class="text-left btn btn-default btn-block"><span class="glyphicon glyphicon-plus"></span> Добавить альбом</a>
		</div>
		<?= show_message($form_success)?>
		<?if($list):?>
			<div class="list-group">
				<?foreach($list as $item):?>
					<li class="list-group-item" id="id_<?= get_value($item, 'id')?>">
						<a href="admin/album_edit/<?= $item->id?>">
							<?= $item->name?>
						</a>
						<a class="delete" href="admin/album_delete/<?= $item->id?>">
							<span class="glyphicon glyphicon-remove pull-right"></span>
						</a>
					</li>
				<?endforeach?>
			</div>
		<?endif?>
	</div>
<?= $this->load->view('admin/chunks/footer')?>