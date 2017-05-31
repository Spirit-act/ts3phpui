$(document).ready(function(e){
	// Modal Script
	$('#close').click(function(){
		$('#mod').css('display', 'none');
	});
	
	// Functions
	var $functions_nav = $("#functionsnav");
	var current_panel = "#msg";

	$("#msg").show();
	$functions_nav.click(function(e){
		e.preventDefault();
		$(current_panel).slideUp("1000");
		var selected_panel = $(e.target).data("target");
		current_panel = selected_panel;
		$(selected_panel).slideDown("1000");
	});

	// Ban
	var $eve = $('#self');
	var $tar = $('#banmsginput');
	$('#spam').change(function(){
		$tar.prop('disabled', true);
	});
	$eve.change(function(){
		$tar.prop('disabled', false);
	});
	$('#undis').change(function(){
		$tar.prop('disabled', true);
	});

	var $sel = $('#bansel');
	var $trig = $('#perm');
	var $tar_two = $('#bantimevalue');
	$sel.change(function(){
		var data = $(this).val();
		if (data == 'perm') {
			$tar_two.prop('disabled', true);
		} else {
			$tar_two.prop('disabled', false);
		};
	});
});
