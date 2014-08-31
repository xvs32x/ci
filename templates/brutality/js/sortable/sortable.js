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
		cursor: 'move',
        update: function(event, ui){
            console.log($(this).data('url') + '/?' + $(this).sortable('serialize'));
            $.ajax({
              url: $(this).data('url') + '/?' + $(this).sortable('serialize'),
              success: function(data){
                    console.log(data);
              }
            });
        }
	}).disableSelection();
});