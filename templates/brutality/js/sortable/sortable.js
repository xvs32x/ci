$(function(){

	//helper for block width
	var fixHelper = function(e, ui) {
		ui.children().each(function() {
			$(this).width($(this).width());
		});
		return ui;
	};
	$('.sortable').sortable({
		helper: fixHelper,
		cursor: 'move'
	}).disableSelection();
});