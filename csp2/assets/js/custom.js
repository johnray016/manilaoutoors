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


	//Delete products in admin panel
	$(".delete_modal_body").click(function(){
		var index = $(this).data('index')
		$.ajax({
			method: 'post',
			url: 'delete_modal_body_endpoint.php',
			data: {
				index : index
			},
			success: function(data){
				$("#modal-body").html(data);
			}
		})
	})

	
	
	
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


