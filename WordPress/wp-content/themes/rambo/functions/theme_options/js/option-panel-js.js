// js to active the link of option pannel
 jQuery(document).ready(function() {
	jQuery('ul li.active ul').slideDown();
	// menu click	
	jQuery('#nav > li > a').click(function(){		
		if (jQuery(this).attr('class') != 'active')
		{ 		
			jQuery('#nav li ul').slideUp(350);
			jQuery(this).next().slideToggle(350);
			jQuery('#nav li a').removeClass('active');
			jQuery(this).addClass('active');
		  
			jQuery('ul.options_tabs li').removeClass('active');
			jQuery(this).parent().addClass('active');		
			var divid =  jQuery(this).attr("id");	
			var add="div#option-"+divid;
			var strlenght = add.length;
			
			if(strlenght<17)
			{	
				var add="div#option-ui-id-"+divid;
				var ulid ="#ui-id-"+divid;
				jQuery('ul.options_tabs li li ').removeClass('currunt');
				jQuery(ulid).parent().addClass('currunt');	
			}			
			jQuery('div.ui-tabs-panel').addClass('deactive');
			jQuery('div.ui-tabs-panel').removeClass('active');
			jQuery(add).removeClass('deactive');		
			jQuery(add).addClass('active');		
		}
	});
	
	// child submenu click
	jQuery('ul.options_tabs li li ').click(function() {			
		jQuery('ul.options_tabs li li ').removeClass('currunt');
		jQuery(this).addClass('currunt');
		var sub_a_id =  jQuery(this).children("a").attr("id");
		var option_add="div#option-"+sub_a_id;
		jQuery('div.ui-tabs-panel').addClass('deactive');
		jQuery('div.ui-tabs-panel').removeClass('active');
		jQuery(option_add).removeClass('deactive');		
		jQuery(option_add).addClass('active');
		
	});
	
	/********media-upload******/
	// media upload js
	var uploadID = ''; /*setup the var*/
	jQuery('.upload_image_button').click(function() {
		uploadID = jQuery(this).prev('input'); /*grab the specific input*/
		
		formfield = jQuery('.upload').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		
		window.send_to_editor = function(html)
		{
			imgurl = jQuery('img',html).attr('src');
			uploadID.val(imgurl); /*assign the value to the input*/
			tb_remove();
		};		
		return false;
	});	
	
});

/*Admin options pannal data value*/
	function rambo_option_data_save(id) 
	{ 	
		var rambo_settings_save= "#rambo_settings_save_"+id;
		var rambo_theme_options = "#rambo_theme_options_"+id;
		var rambo_settings_save_success = rambo_settings_save+"_success";
		
		jQuery(rambo_settings_save).val("1");        
	    jQuery.ajax({
				   url:'admin.php?page=rambo',
				   type:'post',
				   data : jQuery(rambo_theme_options).serialize(),
				   success : function(data)
					{  	//alert('Options data successfully saved');
						jQuery(rambo_settings_save_success).show();
						jQuery(rambo_settings_save_success).fadeOut(5000);
					}			
				});
	}
	
	/*Admin options value reset */
	function rambo_option_data_reset(id) 
	{   var r=confirm("Do you want reset your theme setting!")
		if (r==true)
		  {		var rambo_settings_save= "#rambo_settings_save_"+id;
				var rambo_theme_options = "#rambo_theme_options_"+id;
				var rambo_settings_save_reset = rambo_settings_save+"_reset";				
				jQuery(rambo_settings_save).val("2");       
				jQuery.ajax({
						   url:'admin.php?page=rambo',
						   type:'post',
						   data : jQuery(rambo_theme_options).serialize(),
						   success : function(data)
							{  	jQuery(rambo_settings_save_reset).show();
								jQuery(rambo_settings_save_reset).fadeOut(5000);
							}			
						});
		  }
		else
		  {
			alert("Cancel! reset theme setting process")
		  }		
	}