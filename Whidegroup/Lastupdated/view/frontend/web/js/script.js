require(['jquery'], function($) {

			$(document).ready(function() {

					$(".product-attribute").hover(function() {
				 
				  $(".product-attribute-hover").css("display", "block");
				  }, function() {
				  $(".product-attribute-hover").css("display", "none");
				 
				 });

			});

});




