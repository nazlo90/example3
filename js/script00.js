if (navigator.userAgent.indexOf('Mac') > 0) {
	var elemHTML = document.getElementsByTagName('html')[0];
	
	elemHTML.className += " mac-os";
	
	if (navigator.userAgent.indexOf('Safari') > 0) elemHTML.className += " mac-safari";
	if (navigator.userAgent.indexOf('Chrome') > 0) elemHTML.className += " mac-chrome";
}

$(document).ready(function(){

	$('.comment-cloud').prev('p').addClass('face_comment');
	
	// $(document).on('click','.news_block',function(){
	// 	var a  = $(this);
	// 	if(a.hasClass('check')){
	// 		a.removeClass('check');
	// 	}
	// 	else{
	// 		a.addClass('check');
	// 	}
	// });


	$('.tab_content .tab1 a').on('click', function(event){
		event.preventDefault();
		var youtube = $(this).attr('youtube');
		$(this).children('img').remove();
		$(this).append('<iframe  src="https://www.youtube.com/embed/'+youtube+'?autoplay=1" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>');
		console.log(href);
		
		
	});


	//mobil button
	$(document).on('click','.mobil_button',function(){
		var tut = $(this);
		if(tut.hasClass('active')){
			tut.removeClass('active');
			$('nav ul').removeClass('opened');
			$('.back_fon').css({'top': '-45px'});
		}
		else{
			tut.addClass('active');
			$('.step_up').click();
			$('nav ul').addClass('opened');
			$('.back_fon').css({'top': '-45px'});
		}
	});
	//mobil button

	// step up
	$(document).on("click", ".step_up", function(event) {
		event.preventDefault();
		var id = $(this).attr('href'),
		top = $(id).offset().top;
		$('body,html').animate({
			scrollTop: top - 100
		}, 1500);
	});

	// numbering programs
	function program_blocks(){
		var r = -1;
		$('.program_info:even').each(function() {
			r = r + 2;
			$(this).find('.program_numbers').text(r);
		});

		var l = 0;
		$('.program_info:odd').each(function() {
			l = l + 2;
			$(this).find('.program_numbers').text(l);
		});
	};
	program_blocks();
	// numbering programs

	// owl wrap
	function owl_wrap(){
		var a = $('.other_courses a').length;
		if (a > 4) {
			$('.other_courses').parents('.similar_courses').removeClass('hide');
			$('.other_courses').removeClass('flex').addClass('owl-carousel owl-theme slider_one');
			$('.slider_one').owlCarousel({loop:true,margin:1,nav:true,dots:false,responsive:{0:{items:1,autoplay:true,dots:true,autoplayHoverPause:true},768:{items:2},992:{items:3},1200:{items:4}}});
			$('.slider_twoo').owlCarousel({items:3,loop:true,margin:1,nav:true,dots:false,responsive:{0:{items:1,autoplay:true,autoplayHoverPause:true,dots:true},850:{items:2},1190:{items:3}}});
			$('.slider_three').owlCarousel({loop:true,margin:1,nav:true,autoplay:true,responsive:{0:{items:1,dots:true,autoplayHoverPause:true},530:{items:2,},768:{items:3,dots:false},992:{items:4,dots:false},1160:{items:5,dots:false}}});
		}
		else if (a == 0) {
			$('.other_courses').parents('.similar_courses').addClass('hide');
		}
		else {
			$('.other_courses').parents('.similar_courses').removeClass('hide');
			$('.other_courses').addClass('flex').removeClass('owl-carousel owl-theme slider_one');
		}
	};
	owl_wrap();
	// owl wrap
	
	
	// show/hide fixed menu
	function fixed_menu(){
		var a = $(document).scrollTop();
		if (a >= 100) {
			$('.fixed_menu').addClass('active');
		}
		else {
			$('.fixed_menu').removeClass('active');
		}
	};
	// show/hide fixed menu

	// baner paralax
	function banner_fon(){
		var a = $(document).scrollTop();
		var tut_down = a / 1.5;
		$('.back_fon div').css({'transform':'translate3d(0px, '+tut_down+'px, 0px)'});
	};
	banner_fon();
	// baner paralax

	//show  button, step for header
	function step_up(){
		var a = $(document).scrollTop();
		if (a >= 100) {
			$('.step_up').addClass('active');
		}
		else {
			$('.step_up').removeClass('active');
		}
	};
	//show  button, step for header


	function scroll_number(){
		$('.numbers_line li').each(function() {
			var tut = $(this).children('h2');
			var tut_val = tut.attr('value');
			tut.animate({ num: tut_val - 0 }, {
				duration: 5000,
				step: function (num){
					this.innerHTML = (num + 0).toFixed(0)
				}
			});
		});
	};
	function run_numbers(){
		try {var a = $(document).scrollTop();
			var b = $('.start_numbers').offset().top;
			if(a >= b) {
				scroll_number();
			}}

			catch(e){}
		};


		$(document).scroll(function(){
			banner_fon();
			fixed_menu();
			step_up();
			run_numbers();
		});



	// step up and fixed menu

	// effect for hed text
	// load page gallery
	if($(document).load()) {
		$('.wrap_gallery ul').addClass('active')
		setTimeout(function(){
			$('.banner_content').addClass('active');
		},100);
	}
	// effect for hed text

	// open images, takes attribut "full"
	function open_img(){
		var a = $('.gallery_events').find('.open').children('img').attr('full');// full
		$('.opened_foto').attr('src',a);
		$('body').addClass('scroll_none');
	};

	// open images, takes attribut "full"

	//open mofal
	$(document).on('click','.gallery_events li',function(){
		$('.gallery_events').find('.open').removeClass();
		var a = $(this);
		var b = a.addClass('open');
		$('.modal_box').addClass('foto');
		open_img();
	});

	

	$(document).on('click','.opened_foto',function(){
		$('.step_next').click();
	});

	$(document).keydown(function(events){
		if ($('.modal_box').hasClass('foto')){
			if ( events.keyCode == 39)    {
				$('.step_next').click();
			}
			else if ( events.keyCode == 37)     {
				$('.step_prev').click();
			}
			else if ( events.keyCode == 27)     {
				$('.close_modal').click();
			}
		}
	});

	//autoclick arrow next 
	var click_play;
	$(document).on('click','.play',function(){
		var a = $(this);

		if(!a.hasClass('active')){
			a.addClass('active');
			a.children('i').removeClass().addClass('fa fa-pause');
			click_play = setInterval(function(){
				$('.step_next').click();
			},3000);
		}
		else{
			a.removeClass('active');
			a.children('i').removeClass().addClass('fa fa-play');
			clearInterval(click_play);
		}
	});



	//autoclick arrow next 

	//click arrow next
	$(document).on('click','.step_next',function(){
		var next_class = $('.gallery_events').find('.open').removeClass('open').next('li').addClass('open');
		open_img();
		if (!next_class.length) {
			$('.gallery_events').find('.open').removeClass('open');
			$('.gallery_events li').first().addClass('open');
			clearInterval(click_play);
			open_img();
		}
	});

	//click arrow prev
	$(document).on('click','.step_prev',function(){
		var prev_class = $('.gallery_events').find('.open').removeClass('open').prev('li').addClass('open');
		open_img();
		if (!prev_class.length) {
			$('.gallery_events').find('.open').removeClass('open');
			$('.gallery_events li').last().addClass('open');
			clearInterval(click_play);
			open_img();
		}
	});


	// effect for head images

	$('.tab_head li').click(function(){
		var a = $(this);
		var b = a.attr('tab');
		a.parent('.tab_head').find('.active').removeClass('active');
		a.addClass('active');
		console.log(b);
		var tab_content = a.closest('.tab_head').next('.tab_content');
		tab_content.find('.active').removeClass('active');
		tab_content.find('.tab'+b).addClass('active');

	});







	$(document).on('click','a.send_letter',function(){
		$('.modal_box').addClass('form_online_write for_director');
	});
	$(document).on('click','a.online_write',function(){
		$('.modal_box').addClass('form_online_write');
	});
	$(document).on
	('click','td a.course_link',function(){
		$('.modal_box').addClass('form_online_write');
	});
	$(document).on('click','.close_modal, .overlay',function(){
		$('.modal_box').removeClass().addClass('modal_box');
		$('.opened_foto').attr('src','#');
		$('.gallery_events').find('.open').removeClass();
		$('body').removeClass('scroll_none');
		clearInterval(click_play);
	});

	$(function(){
		var a = $('.wrap_numb_list').children('.left').find('li.number').length;
		$('.wrap_numb_list').children('.right').find('ol').css({'counter-reset': 'myCounter '+a});
	});

	$(document).on('click','.wrap_numb_list ol li',function(){
		var tut = $(this);
		if(tut.hasClass('active')){
			tut.removeClass('active');
		}
		else {
			tut.addClass('active')
		}
	});




	$(document).on('click', '.about', function(){
		var this_ = $(this).closest('.teacher_block');

		if(this_.hasClass('show_info')){
			$('.teacher_block').removeClass('show_info');
		}
		else{
			$('.teacher_block').removeClass('show_info');
			$(this).closest('.teacher_block').addClass('show_info');
		}

	});


});

	$(".slider_one").owlCarousel({loop:!0,margin:1,nav:!0,autoplay:!0,dots:!1,slideBy:4,responsive:{0:{items:1,autoplay:!0,dots:!0,autoplayHoverPause:!0},768:{items:2},992:{items:3},1200:{items:4}}}),$(".slider_twoo").owlCarousel({loop:!0,margin:1,nav:!0,dots:!1,slideBy:3,autoplay:!0,responsive:{0:{items:1,autoplay:!0,autoplayHoverPause:!0,dots:!0},850:{items:2},1190:{items:3}}}),$(".slider_three").owlCarousel({loop:!0,margin:1,nav:!0,autoplay:!0,responsive:{0:{items:1,dots:!0,autoplayHoverPause:!0},530:{items:2},768:{items:3,dots:!1},992:{items:4,dots:!1},1160:{items:5,dots:!1}}});