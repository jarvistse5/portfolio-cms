// import $ from 'jQuery';
import jquery from 'jquery';
window.jQuery = window.$ = jquery;
import './svg3dtagcloud/jquery.svg3dtagcloud.js';
import 'jquery-inview';
import { DotsAnimationFactory } from "dots-animation";
import colorVariables from '../css/_variables.module.scss';

jQuery(($) => {
    let pageEl = $('#portfolio_theme1');
    if (pageEl.length === 0){
        return;
    }

    /** Background animation **/
    const options = {
        // more fps - faster and smoother animation, highly affects performance
        // fps stability depends on client hardware
        expectedFps: 60, // positive integer  
      
        // number option defines maximum number of dots in canvas at the same time
        // regardless of canvas size
        // if number option is not null, density option will be ignored
        number: null, // null or positive integer, affects performance
        // density option defines maximum number of dots per canvas pixel
        density: 0.00005, // positive number, affects performance
      
        "dprDependentDensity": true, // use dpr in density calculation  
        "drpDependentDimensions": true, // use dpr in size and speed calculations
      
        // dots radius is random value between minR and MaxR
        minR: 1, // only positive values, it's desirable to use integers only for faster calculations
        maxR: 6, // only positive values, it's desirable to use integers only for faster calculations
        
        // horizontal dots speed is random value between minSpeedX and minSpeedX  
        // vertical dots speed is random value between minSpeedY and minSpeedY
        minSpeedX: -0.5, // any number, sigh defines direction of movement
        minSpeedX: 0.5, // any number, sigh defines direction of movement
        minSpeedY: -0.5, // any number, sigh defines direction of movement
        maxSpeedY: 0.5, // any number, sigh defines direction of movement
        
        blur: 0, // blur intensity in px, 0 - disabled
      
        fill: true, // fill dots with color
        colorsFill: [colorVariables.primaryText, colorVariables.primaryTheme, colorVariables.secondaryTheme], // hex color strings array, color is picked randomly from color array
        opacityFill: null, // null for random opacity | from 0 to 100 where 0 means transparent
        opacityFillMin: 0, // from 0 to 100 where 0 means transparent
        opacityFillStep: 0, // from 0 to 100 where 0 means no opacity changes per frame, for creating blinking effect
      
        stroke: false, // circle dots with color
        colorsStroke: ["#ffffff"], // hex color strings array, color is picked randomly from color array
        opacityStroke: 1, // null for random opacity | from 0 to 100 where 0 means transparent
        opacityStrokeMin: 0, // from 0 to 100 where 0 means transparent
        opacityStrokeStep: 0, // from 0 to 100 where 0 means no opacity changes per frame, for creating blinking effect
        
        drawLines: true, // enable drawing lines between adjacent dots, most performance decreasing feature
        lineColor: "#717892", // hex color string
        lineLength: 150, // positive integer, maximum length of lines drawn between dots
        lineWidth: 2, // positive integer
        
        actionOnClick: false, // enable actions on mouse click
        actionOnHover: true, // enable actions on mouse move
        onClickCreate: false, // enable creating new dots in current mouse cursor position on click
        onClickMove: false, // enable moving adjacent dots away from mouse cursor on click
        onHoverMove: true, // enable moving adjacent dots away from mouse cursor on hover
        onHoverDrawLines: true, // enable drawing lines between mouse cursor and adjacent dots
        onClickCreateNDots: 10, // positive number, number of dots to create on mouse click
        onClickMoveRadius: 200, // positive number, minimum distance from mouse cursor to any dot after mouse click
        onHoverMoveRadius: 50, // positive number, minimum distance from mouse cursor to any dot
        onHoverLineRadius: 150 // positive number, maximum length of lines drawn between mouse cursor and adjacent dots 
    };
    const animationControl = DotsAnimationFactory
        .createAnimation("#body-bg-animation", "body-bg-animation-canvas", options);
    animationControl.start(); // 'stop' and 'pause' methods are also provided in 'IAnimationObject'

    $(".menu-item").on('click', function() {
        var liText = $(this).attr('data-scroll');
        $('html, body').animate({
            scrollTop: $("#" + liText ).offset().top
        }, 500);
    });

    $('#menu-button').on('click', function () {
        $(this).toggleClass('btn-close');
        if ($(this).hasClass('btn-close')) {
            $('#menu-page-container').removeClass('hidden');
        } else {
            $('#menu-page-container').addClass('hidden');
        }
    });

    $('.menu-item').on('click', function () {
        $('#menu-page-container').addClass('hidden');
        $('#menu-button').removeClass('btn-close');
    });

    $(window).on('scroll', function (event) {
        var scroll = $(window).scrollTop();
        if (scroll > 0) {
            $('.header-container').addClass('primary-bg');
        } else {
            $('.header-container').removeClass('primary-bg');
        }
    });

    $('.skill-grid').each((index, elem) => {
        $(elem).on('inview', function (event, isInView) {
            if (isInView) {
                skillRateRun(elem);
            } else {
                skillRateGone(elem);
            }
        });
    });
    
    function skillRateRun(elem) {
        $(elem).find('.skill-rating').each((index, item) => {
            let rate = $(item).attr('data-rate') * 100;
            let width = 0;
            let interval = setInterval(function () {
                if (width > rate) {
                    clearInterval(interval);
                }
                width += 1;
                $(item).css("width", width + '%');
            }, 10);
        });
    }
    
    function skillRateGone(elem) {
        $(elem).find('.skill-rating').each((index, item) => {
            $(item).css("width", '0%');
        });
    }
    
    const animateCSS = (element, animation, prefix = 'animate__') => {
        // We create a Promise and return it
        new Promise((resolve, reject) => {
            const animationName = `${prefix}${animation}`;
            const node = document.querySelector(element);

            node.classList.add(`${prefix}animated`, animationName);

            // When the animation ends, we clean the classes and resolve the Promise
            function handleAnimationEnd(event) {
                event.stopPropagation();
                node.classList.remove(`${prefix}animated`, animationName);
                resolve('Animation ended');
            }

            node.addEventListener('animationend', handleAnimationEnd, {once: true});
        });
    }

    $('.education-container').each((index, elem) => {
        let id = $(elem).attr('id');
        $(elem).on('inview', function (event, isInView) {
            if (isInView) {
                animateCSS('#'+id, 'backInRight');
                $(elem).removeClass('invisible');
            } else {
                $(elem).addClass('invisible');
            }
        });
    });

    $('.experience-container').each((index, elem) => {
        let id = $(elem).attr('id');
        $(elem).on('inview', function (event, isInView) {
            if (isInView) {
                animateCSS('#'+id, 'bounceInLeft');
                $(elem).removeClass('invisible');
            } else {
                $(elem).addClass('invisible');
            }
        });
    });

    $('#scroll-to-top').on('click', function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

    function stopVideos () {
        $('video').trigger('pause');
        $('.youtube-player').each(function(){
            var el_src = $(this).attr("src");
            $(this).attr("src",el_src);
        });
    }

    Livewire.on('changed', () => {
        stopVideos();
    });
    
    var i = 0;
    var txt = $('#typing-position').attr('data-position');

    function typeWriter() {
        var speed = 50;
        if (i < txt.length) {
          document.getElementById("typing-position").innerHTML += txt.charAt(i);
          i++;
          setTimeout(typeWriter, speed);
        }
    }

    typeWriter();

    var entries = [];
    skills.forEach(skill => {
        let entry = {
            label: skill,
            url: 'https://en.wikipedia.org/wiki/' + skill,
            target: '_blank',
        }
        entries.push(entry);
    });
    
    var settings = {
        entries: entries,
        width: '100%',
        height: 200,
        radius: '65%',
        radiusMin: 75,
        bgDraw: true,
        bgColor: 'transparent',
        opacityOver: 1.00,
        opacityOut: 1,
        opacitySpeed: 1,
        fov: 800,
        speed: 0.5,
        fontFamily: 'Oswald, Arial, sans-serif',
        fontSize: $( window ).width() > 768 ? '18' : '12',
        fontColor: colorVariables.primaryTheme100,
        fontWeight: 'normal',//bold
        fontStyle: 'normal',//italic 
        fontStretch: 'normal',//wider, narrower, ultra-condensed, extra-condensed, condensed, semi-condensed, semi-expanded, expanded, extra-expanded, ultra-expanded
        fontToUpperCase: false,
        tooltipFontFamily: 'Oswald, Arial, sans-serif',
        tooltipFontSize: '11',
        tooltipFontColor: '#fff',
        tooltipFontWeight: 'normal',//bold
        tooltipFontStyle: 'normal',//italic 
        tooltipFontStretch: 'normal',//wider, narrower, ultra-condensed, extra-condensed, condensed, semi-condensed, semi-expanded, expanded, extra-expanded, ultra-expanded
        tooltipFontToUpperCase: false,
        tooltipTextAnchor: 'left',
        tooltipDiffX: 0,
        tooltipDiffY: 10
    
    };
    var svg3DTagCloud = new SVG3DTagCloud( document.getElementById( 'tagcloud'  ), settings );

});

jQuery(($) => {
    let pageEl = $('#portfolio_theme2');
    if (pageEl.length === 0){
        return;
    }

    $(".menu-item").on('click', function() {
        var liText = $(this).attr('data-scroll');
        $('html, body').animate({
            scrollTop: $("#" + liText ).offset().top
        }, 500);
    });

    $('#menu-button').on('click', function () {
        $(this).toggleClass('btn-close');
        if ($(this).hasClass('btn-close')) {
            $('#menu-page-container').removeClass('hidden');
        } else {
            $('#menu-page-container').addClass('hidden');
        }
    });

    $('.menu-item').on('click', function () {
        $('#menu-page-container').addClass('hidden');
        $('#menu-button').removeClass('btn-close');
    });

    $(window).on('scroll', function (event) {
        var scroll = $(window).scrollTop();
        if (scroll > 0) {
            $('.header-container').addClass('primary-bg');
        } else {
            $('.header-container').removeClass('primary-bg');
        }
    });

    $('#view-portfolio-btn').on('click', function () {
        let link = $('#view-portfolio-btn').attr('data-url');
        if (link) {
            window.open(link, '_blank');
        }
    });
    
    $('#view-skills-btn').on('click', function () {
        $('html, body').animate({
            scrollTop: $("#skills" ).offset().top
        }, 500);
    });

    $('#scroll-to-top').on('click', function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

    var innerWidth = window.innerWidth;
    var innerHeight = document.body.scrollHeight;
    var lightWidth = innerWidth / 2;
    var lightHight = lightWidth;
    var positionX = 0;
    var positionY = 0;
    var toRight = true;
    var toBottom = true;
    var moveSpeed = 10;
    function spotlightMove() {
        if (positionX <= 0) {
            toRight = true;
        }
        if (positionX > innerWidth - lightWidth - moveSpeed) {
            toRight = false;
        }
        if (positionY <= 0) {
            toBottom = true;
        }
        if (positionY > innerHeight - lightHight - moveSpeed) {
            toBottom = false;
        }
        if (toRight) {
            positionX += moveSpeed;
        } else {
            positionX -= moveSpeed;
        }

        if (toBottom) {
            positionY += moveSpeed;
        } else {
            positionY -= moveSpeed;
        }

        $('#spotlight-1').css({
            top: positionY,
            left: positionX
        });
    }

    setInterval(function () {
        spotlightMove();
    }, 100);

});