$(document).ready(function(){
	// Back to top button
	if ($('#back-to-top').length) {
	    var scrollTrigger = 100, // px
	        backToTop = function () {
	            var scrollTop = $(window).scrollTop();
	            if (scrollTop > scrollTrigger) {
	                $('#back-to-top').addClass('show');
	            } else {
	                $('#back-to-top').removeClass('show');
	            }
	        };
	    backToTop();
	    $(window).on('scroll', function () {
	        backToTop();
	    });
	    $('#back-to-top').on('click', function (e) {
	        e.preventDefault();
	        $('html,body').animate({
	            scrollTop: 0
	        }, 700);
	    });
	} // End of back to top button



	//Slick Slider (Brand Logo Slider)
	$('.brands').slick({
	  slidesToShow: 5,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 2000,
	  arrows: false,
      dots: false,
      pauseOnHover: false,
	  responsive: [{
        breakpoint: 768,
        settings: {
            slidesToShow: 4
        }
      }, {
        breakpoint: 520,
        settings: {
            slidesToShow: 3
        }
      }]
	}); // End of Slick Slider (Brand Logo Slider)


	//Hide and show the Sub-menu under "My Account"
	$('.my-accout').click(function() {
	    $('#myaccount-menu').toggle();
	    $(this).toggleClass('orange');
	    event.stopPropagation();
	});
	//Hide and show the Sub-menu under "Sign In"
	$('.login-text').click(function() {
	    $('#login-menu').toggle();
	    $(this).toggleClass('orange');
	});
	$(document).click(function() {
		$('#myaccount-menu').hide();
		$('.my-accout').removeClass('orange');
	});
	// end of code for "Sign in" and "My Account"


	//Add to cart 
	$('body').on('click', '.addCartButton', function(){
		var index = $(this).data('id');
		var quantity = $(this).siblings('input').val();
		$.ajax ({
			method: 'post',
			url: 'add_to_cart.php?index='+index,
			data: {
				orderQuantity: quantity
			},
			success: function (data) {
				$('.fa-shopping-cart').load(' .badge');
				$('.notificationText').text('Item added into cart').addClass('alert alert-success').css("border", "1px solid #3c763d").delay(1500).fadeOut();			
			}
		})
	});

	//Delete Product in Admin Panel
	$('body').on('click', '.deleteButton', function(){
		var index = $(this).data('id');
		$.ajax ({
			method: 'post',
			url: 'delete.php',
			data: {
				index: index
			},
			success: function (data) {
				$('.productTable').load(' .productTable');
			}
		})
	});
	
	//Edit Product in Admin Panel
	$('body').on('click', '.editButton', function(){
		var index = $(this).data('id');
		var productName = $(this).parent().siblings().find('#editProductName').val();
		var sku = $(this).parent().siblings().find('#editsku').val();
		var shortDescription = $(this).parent().siblings().find('#editShortDescription').val();
		var longDescription = $(this).parent().siblings().find('#editLongDescription').val();
		var features = $(this).parent().siblings().find('#editFeatures').val();
		var price = $(this).parent().siblings().find('#editPrice').val();
		var quantity = $(this).parent().siblings().find('#editQuantity').val();
		var metaTitle = $(this).parent().siblings().find('#editMetaTitle').val();
		var metaDescription = $(this).parent().siblings().find('#editMetaDescription').val();
		var metaKeywords = $(this).parent().siblings().find('#editMetaKeywords').val();
		$.ajax ({
			method: 'post',
			url: 'edit.php',
			data: {
				index: index,
				productName: productName,
				sku: sku,
				shortDescription: shortDescription,
				longDescription: longDescription,
				features: features,
				price: price,
				quantity: quantity,
				metaTitle: metaTitle,
				metaDescription: metaDescription,
				metaKeywords: metaKeywords
			},
			success: function (data) {
				$('.productTable').load(' .productTable');
				console.log(index);
				console.log(sku);
				console.log(productName);
				console.log(shortDescription);
				console.log(longDescription);
				console.log(features);
				console.log(price);
				console.log(quantity);
				console.log(metaTitle);
				console.log(metaDescription);
			}
		})
	});

	//Order Complete in Admin Panel
	$('body').on('click', '.orderComplete', function(){
		var invoice = $(this).data('invoice');
		$.ajax ({
			method: 'post',
			url: 'order_complete.php',
			data: {
				invoice: invoice
			},
			success: function(data) {
				$('.orderTable').load(' .orderTable');
			}
		});
	});

	//Search Box in Navbar
	$('#search').on('keyup', function(){
		var search = $(this).val();
		$.ajax ({
			method: 'post',
			url: 'search.php',
			data: {
				search: search
			},
			success: function(data) {
				$('#searchResult').html(data);
			}
		});
	});
})

//Menu Open in Mobile
function openMenu() {
	document.getElementById('mySidemenu').style.transform = "translate(0, 0)";
	document.body.style.overflow = "hidden"; // Disabled scroll for body when sidenav is open
}


//Menu Close in Mobile
function closeMenu() {
	document.getElementById('mySidemenu').style.transform = "translate(-100%, 0)";
	document.body.style.overflow = "scroll";
}


