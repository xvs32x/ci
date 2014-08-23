<?= $this->load->view('admin/chunks/header')?>
<?= $this->load->view('admin/chunks/menu')?>
	<div class="row content">
		<h3><?= isset($edit) ? 'Редактирование' : 'Добавление'?> альбома</h3>
		<hr />
		<?= show_message(validation_errors())?>

			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#main" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-pencil"></span> Альбом</a></li>
				<?if(isset($edit)):?>
					<li><a href="#images" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-picture"></span> Изображения</a></li>
				<?endif?>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="main">
					<?= form_open(Settings::get('site_url').'admin/album_edit', array('role' => 'form', 'class' => 'form-horizontal'))?>
						<br />
						<input type="hidden" name="id" value="<?= set_value('id')?>">
						<div class="form-group">
							<label for="input1" class="col-sm-2 control-label">Название</label>
							<div class="col-sm-10">
								<?= form_input(array('name' => 'name', 'value' => set_value('name'), 'id' => 'input1', 'placeholder' => 'Название', 'class' => 'form-control friendly_url'))?>
							</div>
						</div>
						<div class="form-group">
							<label for="friendly_url_title" class="col-sm-2 control-label">Псевдоним</label>
							<div class="col-sm-10">
								<?= form_input(array('name' => 'alias', 'value' => set_value('alias'), 'id' => 'friendly_url_title', 'placeholder' => 'Псевдоним', 'class' => 'form-control', 'readonly' => 'readonly'))?>
							</div>
						</div>
						<div class="form-group">
							<label for="select1" class="col-sm-2 control-label">Категория</label>
							<div class="col-sm-10">
								<?= show_dropdown('category_id', $this->categs_model->as_list(), 'select1');?>
							</div>
						</div>
						<div class="form-group">
							<label for="input3" class="col-sm-2 control-label">Описание</label>
							<div class="col-sm-10">
								<?= form_textarea(array('name' => 'description', 'value' => set_value('description'), 'id' => 'input3', 'placeholder' => 'Описание', 'class' => 'form-control editor', 'rows' => '10'))?>
							</div>
						</div>
						<div class="col-sm-2"></div><?= form_checkbox('public', 1, set_checkbox('public', 1));?> Опубликовано
						<div class="clearfix"></div>
						<hr />
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<a href="admin/gallery/" class="btn btn-default">Отмена</a>
								<button type="submit" class="btn btn-primary"><?= isset($edit) ? 'Редактировать' : 'Добавить'?></button>
							</div>
						</div>
					</form>
				</div>
				<?if(isset($edit)):?>
					<div class="tab-pane" id="images">
						<?= form_open_multipart(Settings::get('site_url').'admin/album_upload/'.set_value('id'), array('role' => 'form', 'class' => 'form-horizontal', 'id' => 'gallery_upload'))?>
							<br />
							<div class="col-sm-12">
								<div class="well well-sm">
									<?= form_input(array('name' => 'file',  'id' => 'input10', 'placeholder' => 'Изображения', 'class' => 'form-control file-control', 'type' => 'file', 'multiple' => 'multiple'))?>
								</div>
								<hr />
							</div>
							<div id="thumbs"></div>
							<?if(count($images)):?>
								<div id="old_thumbs">
									<div class="col-sm-12">
										<h3>Изображения в альбоме <span class="label label-default old_count"><?=count($images)?></span></h3>
										<hr />
									</div>
									<?foreach($images as $image):?>
										<div class="col-sm-6 col-md-4 col-xs-12 col-lg-3" id="id_<?=get_value($image, 'id')?>">
											<div class="thumbnail">
												<a href="<?=$this->gallery_model->resizes_url.get_value($image, 'image')?>" class="colorbox" rel="gallery">
													<img src="<?=$this->gallery_model->thumbs_url.get_value($image, 'image')?>" alt="">
												</a>
												<div class="caption">
													<p class="text-center">
														<a class="btn btn-sm btn-danger delete_image" href="<?=Settings::get('site_url').'admin/delete_image/'.get_value($image, 'id')?>" data-id="<?=get_value($image, 'id')?>"><span class="glyphicon glyphicon-remove"></span> Удалить</a>
														<a href="#" data-image="<?=$this->gallery_model->resizes_url.get_value($image, 'image')?>" class="btn btn-sm btn-default edit_image" data-id="<?=get_value($image, 'id')?>" data-url="<?=Settings::get('site_url').'admin/edit_image/'.get_value($image, 'id')?>"><span class="glyphicon glyphicon-edit"></span> Редактировать</a>
													</p>
												</div>
											</div>
										</div>
									<?endforeach?>
								</div>
							<?endif?>
							<div class="clearfix"></div>
						</form>
					</div>
				<?endif?>
			</div>

		</form>
	</div>
<?= $this->load->view('admin/chunks/footer')?>