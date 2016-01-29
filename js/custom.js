    var $slider = {
        initialize: function(){
            $slider.setNavigation();
            $slider.animateSettings();

            self.setInterval(function(){
                $slider.animateAuto();
            }, 10000);
        },
        setNavigation: function(){
            var nav = '<ul class="switcher">';
            for(var i=0; i<jQuery('.slider li').length; i++){
                nav = nav.concat('<li><a href=""></a></li>');
            }
            nav = nav.concat('</ul>');
            jQuery('.slider').after(nav);
            jQuery('.switcher li:first').addClass('active');
        },
        animateSettings: function (){
            jQuery('.switcher li a').click(function(event){
                var _this = this;
                event.preventDefault();
                var cindex = jQuery('.switcher li').index(jQuery('.switcher li.active'));
                var nindex = jQuery('.switcher li').index(jQuery(this).parent('li'));
                var width = jQuery('.slider li:first').width();
                var animate = nindex*width*-1;

                jQuery('.switcher li').removeClass('active');
                jQuery(_this).parent('li').addClass('active');
                $slider.animate(animate);
            });
        },
        animate: function(animate){
            jQuery('.slider').animate({
                'margin-left': animate
            },1000, function() {
                
            });
        },
        animateAuto: function(){
            var cindex = jQuery('.switcher li').index(jQuery('.switcher li.active'));
            var width = jQuery('.slider li:first').width();

            var cel = jQuery('.switcher li.active');
            if(jQuery('.switcher li.active').next('li').length > 0){
                var animate = (cindex+1)*width*-1;
                cel.removeClass('active');
                cel.next('li').addClass('active');
            }else{
                var animate = 0;
                cel.removeClass('active');
                cel.parent('ul').children('li').eq(0).addClass('active');
            }

            $slider.animate(animate);
        }
    };
    
    var $accordion = {
        initialize: function(){
            $accordion.setDefault();
            $accordion.animate();
        },
        setDefault: function(){
            jQuery('ul.accordion li:first-child').addClass('active');
            $("ul.accordion li:not(:first-child)").each(function(){
                jQuery(this).children('div').css({'display': 'none'});
            });
        },
        animate: function(){
            jQuery('.accordion h2').click(function(){
                var _this = jQuery(this);
                if(_this.parent('li.active').length == 0){
                    var block = _this.parent('li').parent('ul');
                    
                    block.children('li.active').children('div').slideToggle(500);
                    block.children('li.active').removeClass('active');
                    _this.parent('li').addClass('active');
                    _this.next('div').slideToggle(500);
                }
            });
        }
    }

    var $main_menu = {
        initialize: function(){
        	$main_menu.setDefault();
        	$main_menu.animate();
        },
        setDefault: function(){
//        	jQuery('#menu-main ul.sub-menu').css({'display': 'none'});
//        	jQuery('#menu-main ul.sub-menu li.current_page_item').each(function(){
//        		jQuery(this).parent('ul.sub-menu').parent('li').addClass('current_page_item');
//        	});
        },
        animate: function(){
//        	jQuery("#menu-main>li").mouseover(function() {
//        		$(this).children("ul.sub-menu").css({'display': 'block'});
//        		$(this).children("a").addClass('active');
//        	}).mouseout(function(){
//        		$(this).children("ul.sub-menu").css({'display': 'none'});
//        		$(this).children("a").removeClass('active');
//        	});
            jQuery("ul#menu-main li").hover(function(){
                jQuery(this).addClass("hover");
                jQuery('ul:first', this).css('visibility', 'visible');
            }, function(){
                jQuery(this).removeClass("hover");
                jQuery('ul:first', this).css('visibility', 'hidden');

            });
        }
    }

    var $sendcv = {
        initialize: function(){
            $sendcv.process();
        },
        process: function(){
            jQuery('.send_cv_button').click(function(event){
                var _this = jQuery(this);
//                event.preventDefault();
            });
        }
    }