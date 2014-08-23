<?= $this->load->view('admin/chunks/header')?>
<?= $this->load->view('admin/chunks/menu')?>
	<div class="row content">
		<h3><a href="<?=Settings::get('site_url')?>admin/articles/"><span class="glyphicon glyphicon-file"></span> Статьи</a></h3>
		<div class="well well-sm">
			<a href="admin/article_edit" class="text-left btn btn-default btn-block"><span class="glyphicon glyphicon-plus"></span> Добавить статью</a>
		</div>
		<?= show_message($form_success)?>
		<?if($list):?>
			<div class="list-group">
				<?foreach($list as $item):?>
					<li class="list-group-item" id="id_<?= get_value($item, 'id')?>">
						<a href="<?=Settings::get('site_url')?>admin/article_edit/<?= get_value($item, 'id')?>">
							<?= get_value($item, 'name')?>
						</a>
						<?if(get_value($item, 'favorite')):?>
							<span class="label label-primary">Избранная</span>
						<?endif?>
						<?if(!get_value($item, 'publish')):?>
							<span class="label label-danger">Неопубликована</span>
						<?endif?>
						<a class="delete" href="<?=Settings::get('site_url')?>admin/article_delete/<?= get_value($item, 'id')?>">
							<span class="glyphicon glyphicon-remove pull-right"></span>
						</a>
					</li>
				<?endforeach?>
			</div>
		<?endif?>
	</div>
<?= $this->load->view('admin/chunks/footer')?>