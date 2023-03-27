// import $ from 'jQuery';
import jquery from 'jquery';
window.jQuery = window.$ = jquery;
import './svg3dtagcloud/jquery.svg3dtagcloud.js';
import 'jquery-inview';
// import animateCSS from 'animate.css';

jQuery(($) => {
    let pageEl = $('.portfolio-container');
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


    let page = 1;
    let currentItemId = 0;
    let assetCount = 0;
    $('.project-grid-item').each((index, elem) => {
        let id = $(elem).attr('data-id');
        let count = $(elem).attr('data-asset-count');
        $(elem).on('click', function () {
            $('#project-modal-' + id).css('display', 'block');
            currentItemId = id;
            page = 1;
            assetCount = count;
            $('#project-modal-' + currentItemId + '-page-' + page).removeClass('hidden');
        });
    });

    $('.modal-close').each((index, elem) => {
        let modal = $(elem).attr('data-modal');
        $(elem).on('click', function () {
            $('video').trigger('pause');
            $('#' + modal).css('display', 'none');
            $('.modal-slide').addClass('hidden');
        });
    });

    $('.modal-prev').on('click', function () {
        if (page > 1) {
            page--;
        }
        $('.modal-slide').addClass('hidden');
        $('#project-modal-' + currentItemId + '-page-' + page).removeClass('hidden');
        $('video').trigger('pause');
        $('.youtube-player').each(function(){
            var el_src = $(this).attr("src");
            $(this).attr("src",el_src);
        });
    });

    $('.modal-next').on('click', function () {
        if (page < assetCount) {
            page++;
        }
        $('.modal-slide').addClass('hidden');
        $('#project-modal-' + currentItemId + '-page-' + page).removeClass('hidden');
        $('video').trigger('pause');
        $('.youtube-player').each(function(){
            var el_src = $(this).attr("src");
            $(this).attr("src",el_src);
        });
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
        bgColor: '#000',
        opacityOver: 1.00,
        opacityOut: 1,
        opacitySpeed: 1,
        fov: 800,
        speed: 0.5,
        fontFamily: 'Oswald, Arial, sans-serif',
        fontSize: '24',
        fontColor: '#F6E71D',
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