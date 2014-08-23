<div class="row">
	<div class="article">
		<div class="col-sm-3"><a href="articles/view/<?= $alias ?>"><img src="http://placehold.it/320x200" class="img-rounded img-responsive" alt=""></a></div>
		<div class="col-sm-9">
			<h3><a href="articles/view/<?= $alias ?>"><?= $name ?></a></h3>
			<p><?= cute_text($preview, 200) ?></p>
			<p><a class="btn btn-default" href="articles/view/<?= $alias ?>" role="button">Подробнее »</a></p>
		</div>
		<div class="clearfix"></div>
		<div class="col-sm-12"><hr /></div>
	</div>
</div>