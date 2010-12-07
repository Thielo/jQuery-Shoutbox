$(document).ready(function () {
	$("label").inFieldLabels();
	$("label").hover(function(){ $(this).next().addClass('hover'); },function() { $(this).next().removeClass('hover'); });
	$(".post").first().css('border-top',  'none');
	$(".post").last().css('border-bottom','none;');
});


//AJAX
function getXMLHTTP() {
	var result = false;
	if( typeof XMLHttpRequest != "undefined" ) {
		result = new XMLHttpRequest();
	} else {
		try { result = new ActiveXObject("Msxml2.XMLHTTP");	} catch (e) {
			try { result = new ActiveXObject("Microsoft.XMLHTTP"); } catch (ie) {}
		}
	}
	if (typeof netscape != 'undefined' && typeof netscape.security !='undefined') {
		try { netscape.security.PrivilegeManager.enablePrivilege('UniversalBrowserRead'); }
		catch (e) { }
 	}
	return result;
}

//Shout something
function shout(){
	document.getElementById("ajax_butt").value = "Sende...";
	document.getElementById("ajax_butt").disabled = true; 
	

	
	var timestamp = new Date().getTime();
	xmlget = getXMLHTTP();
	// 	xmlget.overrideMimeType('text/xml; charset=ISO-8859-1');   //Funktioniert nur im Mozilla, ist hier auch nicht nötig
	xmlget.open("GET", "backend.inc.php?action=write&nick="+escape($("#name").val())+"&msg="+escape($("#msg").val()));
	xmlget.onreadystatechange = function(){
		if ( xmlget.readyState == 4 ) {
			document.getElementById("ajax_butt").value = "Senden";
			document.getElementById("ajax_butt").disabled = false; 
			document.getElementById("name").value = "";
			document.getElementById("msg").value = "";
		}
	}
	xmlget.send(null);
	return true;
}
 
//Fetch entries of the shoutbox
function fetch(){
	var timestamp = new Date().getTime();
	xmlget = getXMLHTTP();
	//xmlget.overrideMimeType('text/xml; charset=ISO-8859-1');
	xmlget.open("GET", "backend.inc.php?action=fetch");
	xmlget.onreadystatechange = function(){
		if ( xmlget.readyState == 4 && xmlget.responseText) {
			if( document.getElementById("entries").innerHTML != xmlget.responseText){
				var eintraege = xmlget.responseText.split("||||");
				var show = "";
				for(var i = 0; i < eintraege.length; i++){
					var things = eintraege[i].split("|||");
					if(things[0]!="" && things[1]!="" && things[2]!=""){
						
						show = show+'<div class="post odd"><div class="metaInfo"><abbr title="'+things[1]+'">'+things[0]+'</abbr> schrieb:</div><div class="text">&laquo;'+things[2]+'&raquo;</div></div>';
					}
				}
				document.getElementById("entries").innerHTML = show;
			}
		}
	}
	xmlget.send(null);
	return true;
}
window.onload = "fetch()";
interval = window.setInterval("fetch();", 5000);