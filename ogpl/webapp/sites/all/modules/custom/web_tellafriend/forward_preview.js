$(document).ready(function() {var boxes = '<div id="boxes"> <div id="dialog" class="window"><a href="#" id="close_right" style="float:right" class="close"><b><img alt="X "src="'+$('#edit-base-url').val()+'/sites/all/themes/ogpl_css3/images/popup_close_button.png"></b></a><br> <br><div id="dialog_content"></div> <br><br></div></div> <div id="mask"></div>';// move the boxes div at the top of the page i.e. after <body>$('body').children().eq(0).before(boxes);     //select all the a tag with name equal to modal    $('button[id="edit-preview"]').click(function(e) {		e.preventDefault();	var feedback_id = $(this).parent().parent().attr('id');	var full_text_wrapper_id = 'full_'+feedback_id;            //Get the A tag        var clicked_id = $(this).parent().parent().attr('id');        var id = '#dialog';              //Get the window height and width        var winH = $(window).height();        var winW = $(window).width();				//Get the screen height and width        var maskHeight = $(document).height();        var maskWidth = $(window).width();             //Set height and width to mask to fill up the whole screen        $('#mask').css({'width':maskWidth,'height':maskHeight});                 //transition effect             $('#mask').fadeIn(1000);            $('#mask').fadeTo("slow",0.8);		var recipients = $('textarea#edit-recipients').val();recipients = recipients.replace(new RegExp( "\\n", "g" ),",").replace(new RegExp( "@", "g" ), "[at]").replace(new RegExp( "\\.", "g" ), "[dot]");var message_content = $('textarea#edit-message').val();message_content = message_content.replace(new RegExp( "\\n", "g" ),"<br>");		var message = "<span style='font-weight:bold'>To: " + recipients + "</span><br><br>" +"Your friend "+$('input#edit-name').val() + " has invited you to visit <a  target='_blank' href='"+$('input#edit-base-url').val()+"' style='color:darkblue;'>Open Government Platform (OGPL)</a> .<br><br>" +"Your friend's Comments : <br> " +message_content +"<br><br><span style='font-weight:bold'>Regards,<br>" +"Open Government Platform (OGPL)</span> ";                       //Set the popup window to center        $('#dialog_content').html(message);        $(id).css('top',  winH/2-$(id).height()/2);        $(id).css('left', winW/2-$(id).width()/2);             //transition effect        $(id).fadeIn(1000); 				//if mask is clicked		$('#mask').click(function () {			$(this).hide();			$('.window').hide();		});           });         //if close button is clicked    $('.window .close').click(function (e) {        //Cancel the link behavior        e.preventDefault();        $('#mask, .window').hide();    });     });