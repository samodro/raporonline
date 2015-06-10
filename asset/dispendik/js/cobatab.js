$(document).ready(function(){
	
        /*
	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})*/
        
        
        $('.tab-child').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('.tab-child').removeClass('current');
                $('.tab-grandchild').removeClass('current');
		
                //$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})
        
        $('.tab-root').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		
                $('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})
        

})