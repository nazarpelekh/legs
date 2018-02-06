/*
 * Third party
 */



/*
 * Custom
 */
(function ($) {


    function menuFixed(){  // scroll fixed main menu to top
        var scroll = $(window).scrollTop(),
            objTop = $('#main-menu-section').position().top;
        if($(window).width() > 767){
            if ( scroll >= objTop){
                $('#main-menu-section, #header').addClass('fixed');
            }else{
                $('#main-menu-section, #header').removeClass('fixed');
            }
        }else{
            if ( scroll >= 50){
                $('#main-menu-section, #header').addClass('fixed');
            }else{
                $('#main-menu-section, #header').removeClass('fixed');
            }
        }
    }

    function sliderExpertChangeText(){ //change text slider expert in front page
        var activeSlide = $('.experts-list .slick-active'),
            expName = activeSlide.find('.e-name').text(),
            expPost = activeSlide.find('.e-post').text(),
            expText = activeSlide.find('.e-text').text();
        $('.expert-text-block .expert-name').text(expName);
        $('.expert-text-block .expert-post').text(expPost);
        $('.expert-text-block .expert-text').text(expText);
    }

    function frontPageBoard(){ //full screen size front page board if mobile
        if($('.front-board').length){
            var menuHeight = $('#main-menu-section').height();
            if($(window).width() < 768){
                var winHeight = $(window).height();
                $('.front-board').removeClass('front-board-desktop');
                $('.front-board').css({'height': winHeight - menuHeight + 'px'});
            }else{
                $('.front-board').addClass('front-board-desktop');
            }
        }
    }

    function changeInfoExpert(target){ // change info in details block before to show
        var expertBlock = target,
            id = expertBlock.attr('data-expert-id'),
            name = expertBlock.find('.name').text(),
            post = expertBlock.find('.post').text(),
            text = $('#'+id+' .article').html(),
            publication = $('#'+id+' .publication ul').html(),
            articlesLink = $('#'+id).attr('data-link-articles'),
            dossiersLink = $('#'+id).attr('data-link-dossiers'),
            photo = $('#'+id).attr('data-photo');

        $('.expert-detail-block .img-block img').attr('src', photo);
        $('.expert-detail-block .name').text(name);
        $('.expert-detail-block .post').text(post);
        $('.expert-detail-block .article-block').html(text);
        $('.expert-detail-block .last-publications ul').html(publication);
        $('.expert-detail-block .articles-link').attr('href', articlesLink);
        $('.expert-detail-block .dossiers-link').attr('href', dossiersLink);
    }
    function pasteExpertBlock(target){ // calculate position for insertion expert detail block's
        var windowW = $(window).width(),
          i = target.closest('li').index() + 1,
          n = 4,
          a = 0;
        if ( windowW < 990 ){ n = 3; }
        if ( windowW < 768 ){ n = 2; }
        if ( windowW < 480 ){ n = 1; }
        if( i > n ){
            if(  parseInt(i/n) == (i/n) ){
                a = i-1;
            }else{
                a = parseInt(i/n)*n + n-1;
            }
        }else{
            a = n-1;
        }
        $('.expert-detail-block').addClass('hide');
        $('.expert-detail-block').insertAfter($('.experts-block-list li')[a]);
        var blockHeight = $('.expert-detail-block .inner-wrap').outerHeight();
        $('.expert-detail-block').css({'height': blockHeight+'px'});
        setTimeout(function(){
            $('.expert-detail-block').toggleClass('hide open');
        },100);

    }

    function hideExpertBlock(){ // hide function detail expert block
        $('.expert-detail-block').toggleClass('open close');
        setTimeout(function(){
            $('.expert-detail-block').toggleClass('hide close');
            setTimeout(function(){
                $('.expert-detail-block').removeClass('hide');
                $('.expert-detail-block').appendTo('body');
            },500);
        },500);
    }

    $(document).ready(function () {

        $('.experts-list').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left"></i></div>',
            nextArrow: '<div class="slick-next"><i class="fa fa-angle-right"></i></div>'
        });

        $('.experts-list').on('afterChange', function(event, slick, currentSlide){
            sliderExpertChangeText();
            $('.expert-text-block').removeClass('hide');
        });
        $('.experts-list').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            $('.expert-text-block').addClass('hide');
        });

        menuFixed();
        frontPageBoard();


        $('.experts-block-list .expert-block').on('click', function(){ // expert block show / hide detail block
            var block = $(this);
            if( !block.hasClass('active') ){
                $('.expert-detail-block').removeClass('hide open close').appendTo('body');
                block.closest('.experts-block-list').find('.active').removeClass('active');
                    block.addClass('active');
                    changeInfoExpert(block);
                    pasteExpertBlock(block);
                if($(window).width() < 480){
                    setTimeout(function(){
                        var top = block.offset().top,
                          topMinus = $('#main-menu-section .wrap-section').height();
                        $('html,body').animate({scrollTop: top+block.outerHeight() - topMinus},500);
                    },1000);
                }
            }else{
                block.removeClass('active');
                hideExpertBlock();
            }
            return false;
        });

        $('.menu-bar').on('click', function(){ // open / close mobile menu
            if($(window).width() < 768){
                if( $(this).hasClass('close-menu') ){
                    $(this).toggleClass('close-menu');
                    $('#main-menu').removeClass('visible');
                    $('#main-menu-section').removeClass('menu-open');
                }else{
                    var menuH = $('#main-menu-section').height();
                    $(this).toggleClass('close-menu');
                    $('#main-menu').addClass('visible');
                    $('#main-menu-section').addClass('menu-open');
                }
            }
        });

        $('body').on('click', function(event){ // hide search form in mobile if click not on seacrh form
            if(!$(event.target).closest('#search-header-form').length && $('#search-header-form').hasClass('visible')){
                $('#search-header-form').toggleClass('visible hidden');
                setTimeout(function(){
                    $('#search-header-form').removeClass('hidden');
                },1000);
            }
        });
        $('.headers-bar .search-bar').on('click', function(){ //show search form in mobile
            $('#search-header-form').addClass('visible');
            return false;
        });


        $('#main-menu .sub-menu').each(function(){ //consider height sub menu

            var ph = 0,
                subObj = $(this);

            subObj.closest('li').addClass('close');

            subObj.find('li').each(function(){
                var i = ($(this).index()),
                    h = $(this).height();

                ph = ph + h;

                $(this).css({
                    'top': -h * i + 'px',
                    'z-index': -i
                });
                return ph;
            });

            subObj.css({'height': ph + "px"});

        });

        $('#main-menu >li').hover(function(){ //hover menu with sub menu
            if($(this).find('.sub-menu') && $(window).width() > 767){
                $(this).removeClass('close');
                $(this).addClass('open');
            }
        }, function(){
            if($(this).find('.sub-menu') && $(window).width() > 767){
                $(this).removeClass('open');
                $(this).addClass('close');
            }
        });

        $('#main-menu >li').on('click',function(){//click menu with sub menu (for mobile)
            if($(window).width() < 768){
                if($(this).hasClass('close')){
                    $(this).closest('#main-menu').find('.open').toggleClass('open close');
                    $(this).toggleClass('open close');
                }else{
                    if($(this).hasClass('open')){
                        $(this).toggleClass('open close');
                    }
                }
            }
            return false;
        });
        $('header .close').on('click', function(){ //close search
            $('header').removeClass('open-search');
        });
        $('.search-bar').on('click', function(){
            $('header').addClass('open-search');
        });


        $('.faq-list li').on('click', function(){ // front faq open/close
            var qObj = $(this),
                qTop = qObj.position().top,
                blockHeight = qObj.closest('.faq-column').height(),
                qObjHeight = qObj.height(),
                qAnswer = qObj.find('.answer-block');

            if(qObj.hasClass('active')){
                qAnswer.fadeOut(300);
                setTimeout(function(){
                    qObj.removeClass('active');
                    qObj.closest('.faq-list').removeClass('active');
                    qObj.css({'top': 0});
                },300);
            }else{
                qObj.closest('.faq-list').addClass('active');
                qObj.addClass('active');
                if( qTop > 0 ){
                    qObj.css({'top': -qTop+'px'});
                    qAnswer.css({'height': blockHeight+'px','padding-top': qObjHeight + 25 + 'px'});
                    setTimeout(function(){
                        qAnswer.fadeIn(500);
                    },300);
                }else{
                    qAnswer.css({'height': blockHeight+'px','padding-top': qObjHeight + 25 + 'px'});
                    setTimeout(function(){
                        qAnswer.fadeIn(300);
                    },500);
                }
            }
        });

        $('.button-to-top, .scroll-button--up').on('click', function(){ //scroll to top page
            $('html,body').animate({scrollTop: 0},500);
        });

        $('.scroll-button--down').on('click', function(){ //scroll to top page
            var top = $('#front-anchor').offset().top,
                topMinus = $('#main-menu-section .wrap-section').height();
            $('html,body').animate({scrollTop: top - topMinus},500);
        });

        if ($(window).width() < 768){

            if(!$('#main-menu .headers-bar').lenght){
                $('.headers-bar').appendTo('#main-menu');
            }

        }else{
            if(!$('#main-menu-section .container >.headers-bar').length){
                $('#main-menu').after($('.headers-bar'));
            }
            $('#main-menu').removeClass('visible');
            $('#main-menu-section').removeClass('menu-open');
            $('.menu-bar').removeClass('close-menu');
        }

        if($('[data-collapse]').length){ // show / hide faq questions (collapse)
            $('[data-collapse]').on('click', function(){
                var obj = $(this),
                    target = obj.attr('data-target'),
                    contentHeight = $('#'+target+' >*').outerHeight();
                if($('#'+target).hasClass('collapsed')){
                    $('#'+target).removeClass('collapsed').css({'height': 0});
                }else{
                    $('#'+target).addClass('collapsed').css({'height': contentHeight+'px'});
                }
                obj.toggleClass('close open');
            });
        }
        $('.faq-page-list li').each(function(){ // add classes and consider height collapse blocks
            var obj = $(this),
                answerHeight = obj.find('.answer-block').height();
            obj.find('.question-block').addClass('close');
            obj.find('.answer-block').css({'height': answerHeight + 'px'});

        });

        $('.alphabet-list li').on('click', function(){
            if(!$(this).hasClass('active')){
                $(this).closest('.alphabet-list').find('.active').removeClass('active');
                $(this).addClass('active');
            }
        });
    });

    $(window).resize(function(){
        menuFixed();
        frontPageBoard();
        if ($(window).width() < 768){

            if(!$('#main-menu .headers-bar').lenght){
                $('.headers-bar').appendTo('#main-menu');
            }

        }else{
            if(!$('#main-menu-section .container >.headers-bar').length){
                $('#main-menu').after($('.headers-bar'));
            }
            $('#main-menu').removeClass('visible');
            $('#main-menu-section').removeClass('menu-open');
            $('.menu-bar').removeClass('close-menu');
        }
        if($('.expert-detail-block').hasClass('open')){
            setTimeout(function(){
                var blockHeight = $('.expert-detail-block .inner-wrap').outerHeight();
                $('.expert-detail-block').css({'height': blockHeight + 'px'});
            },500);
        }
    });

    $(window).scroll(function(){
        menuFixed();
    });

})(jQuery);