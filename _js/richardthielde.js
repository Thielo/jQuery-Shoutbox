$(document).ready(function () {
	$(".clickable h1, .clickable a#pageLink").click(function(){
		$t = $('.clickable');
		if($t.hasClass('expanded')){
			$t.removeClass('expanded'); $t.find('span').fadeOut('fast'); $t.animate({width: "55px", height: "55px"}); $t.find('a').css('width','35px');
		}else{ $t.animate({width: "326px", height: "180px"}); $t.find('a').css('width','318px'); $t.addClass('expanded'); }
		return false;
	});
});