$(document).ready(function () {
	$("label").inFieldLabels();
	$("label").hover(function(){ $(this).next().addClass('hover'); },function() { $(this).next().removeClass('hover'); });
	$(".post").first().css('border-top',  'none');
	$(".post").last().css('border-bottom','none;');
	$("form").css('width','177px');
	$('#entries').html('<span class="loader"><img src="_img/indicator.gif" alt="loading&hellip; Please wait"/><br />Lade Beitr&auml;ge&hellip;</span>')
	fetch();
	$('input[type=submit]').click(function(){ $name = $('#name').attr('value'); $message = $('#message').attr('value'); write($name, $message); return false; });
});

/* Fetch from Database */
function fetch(){ $.ajax({ url: "backend.inc.php", context: document.body, success: function(msg){ $("#entries").html(msg); }}); }

/* Write to Database */
function write($n, $m){ $.ajax({ type: "POST", url: "backend.inc.php", data: "action=write&name=" + $n + "&message=" + $m, success: function(msg){ fetch(); } }); }

/* Set interval for Autoreload */
window.setInterval("fetch();", 5000);