$(document).ready(function () {
	$("label").inFieldLabels();
	$("label").hover(function(){ $(this).next().addClass('hover'); },function() { $(this).next().removeClass('hover'); });
	$(".post").first().css('border-top',  'none');
	$(".post").last().css('border-bottom','none;');
});