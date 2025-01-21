jQuery(document).ready(function(){
	jQuery("div.cwvn-tabs > div.item").click(function(e){
		if(!jQuery(this).hasClass('disabled')) {
			var parent = jQuery(this).parents('.cwvn-tab-content');
			if(parent.length) {
				if (!jQuery(this).hasClass("active")) {
					var activetabitem = parent.find('div.cwvn-tabs > div.item.active');
					if(activetabitem.length) {
						activetabitem.removeClass("active");
					}
					jQuery(this).addClass("active");
					var tabNum = jQuery(this).index();
					var nthChild = tabNum+1;
					var activetabcontentitem = parent.find('div.cwvn-tab > div.item.active');
					if(activetabcontentitem.length) {
						activetabcontentitem.removeClass("active");
					}
					var activeitem = parent.find("div.cwvn-tab > div.item:nth-child("+nthChild+")");
					if(activeitem.length) {
						activeitem.addClass("active");
					}
				}
			}
		}
	});
	jQuery('.cwvn-toggle > .item.active').each(function(index){
		var contentid = jQuery(this).attr('for');
			jQuery('#'+contentid).show();
	});
	jQuery('.cwvn-toggle > .item').click(function(){
		if(!jQuery(this).hasClass('active')) {
			jQuery('.cwvn-toggle > .toggle-content ').hide();
			jQuery('.cwvn-toggle > .item').removeClass('active');
			jQuery(this).addClass('active');
			var contentid = jQuery(this).attr('for');
			jQuery('#'+contentid).toggle();
		}
	});
	jQuery('.bsiffancybox-large, .bsiffancybox-small, .bsiffancybox-full, .bsiffancybox').each(function(index){
		var myurl = jQuery(this).attr('href');
		if(myurl.indexOf("?") < 0) {
			myurl = myurl + '?bsif=true';
		} else {
			myurl = myurl + '&bsif=true';
		}
		jQuery(this).attr('href', myurl);
	});
});
