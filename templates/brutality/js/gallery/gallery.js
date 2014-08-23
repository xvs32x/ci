$(function(){

	/*
	 * Шаблон вывода thumbnail для галереи
	 * */
	function showThumb(data) {
		return '' +
			'<div class="col-sm-6 col-md-4 col-xs-12 col-lg-3" id="id_'+data.id+'">' +
			'	<div class="thumbnail">' +
			'		<a href="'+data.resized+'" class="colorbox">'+
			'			<img src="'+data.thumb+'" alt="">' +
			'		</a>'+
			'		<div class="caption">' +
			'			<p class="text-center">' +
			'				<a class="btn btn-sm btn-danger delete_image" href="'+data.delete_link+''+data.id+'" class="btn btn-sm btn-danger delete_image" data-id="'+data.id+'"><span class="glyphicon glyphicon-remove"></span> Удалить</a>' +
			'				<a href="#" data-image="'+data.resized+'" data-url="'+data.edit_link+''+data.id+'" class="btn btn-sm btn-default edit_image" data-id="'+data.id+'"><span class="glyphicon glyphicon-edit"></span> Обрезать</a>' +
			'			</p>' +
			'		</div>' +
			'	</div>' +
			'</div>';
	}

	/*
	 * Шаблон вывода заголовка "Новые изображения"
	 * */
	function showNewsImagesTitle(){
		return ''+
			'<div class="col-sm-12">' +
			'		<h3>Новые изображения <span class="label label-danger">Загруженные</span></h3>' +
			'		<hr />' +
			'</div>'
	}


	/*
	 * Ajax удаление изображений из альбома
	 * */
	function deleteImageFromDom(id){
		if(id){
			$this = $('#id_'+id);
			$this.fadeOut(function(){
				$this.remove();
				count = $('#old_thumbs').find('.thumbnail').length;
				$('.old_count').html(count);
			});

		}
	}


	/*
	 * Ajax загрузка изображений в галерею
	 * */
	$('#gallery_upload').fileupload({
		dataType: 'json',
		done: function (e, data) {
			$box = $('#thumbs');
			if(!$box.html()){
				$box.append(showNewsImagesTitle());
			}
			if(data.result.error){
				BootstrapDialog.show({
					type: BootstrapDialog.TYPE_DANGER,
					title: 'Предупреждение',
					message: data.result.error,
					buttons: [{
						label: 'Скрыть',
						action: function(dialog) {
							dialog.close();
						}
					}]
				});
			} else {
				$box.append(showThumb(data.result));
			}
		}
	});

	/*
	 * Подтверждение удаления изображения
	 * */
	$(document).on('click', 'a.delete_image', function(){
		$this = $(this);
		link = $this.attr('href');
		BootstrapDialog.show({
			type: BootstrapDialog.TYPE_DANGER,
			title: 'Подтверждение удаления',
			message: 'Вы действительно хотите удалить этот элемент?',
			buttons: [{
				label: 'Удалить',
				cssClass: 'btn-danger',
				action: function(dialog) {
					$.ajax({
						url: link+'/ajax',
						success: function(data){
							if(data.id){
								dialog.close();
								deleteImageFromDom(data.id)
							}
						}
					});
				}
			}, {
				label: 'Отменить',
				action: function(dialog) {
					dialog.close();
				}
			}]
		});
		return false;
	});

	/*
	* Изображение для кроппера
	* */
	$(document).on('click', 'a.edit_image', function(){
		$this = $(this);
		id = $this.data('id');
		url = $this.data('url');
		image = $this.data('image');
		cropperData = {
			x: 0,
			y: 0,
			width: 640,
			height: 400
		};
		$image = {};
		BootstrapDialog.show({
			title: 'Изменить миниатюру',
			message: function(){
				$image = $('<img data-image_id="'+id+'" src="'+image+'" width="100%" />');
				return $image;
			},
			buttons: [{
				id: 'btn-1',
				label: 'Сохранить изменения.',
				action: function(){
					$.ajax({
						url: url,
						type: 'POST',
						dataType: 'json',
						success: function(data){
							console.log(data);
						}
					});
				}
			}],
			onshown: function(){
				$('.bootstrap-dialog-message').imagesLoaded( function() {
					$image.cropper({
						aspectRatio: 16 / 10,
						multiple: true,
						data: cropperData,
						done: function(data){
							cropperData = data;
						}
					});
				});
			}
		});
		return false;
	});
});
