;( function( w, $ ) {
    'use strict';

    function showPopupSharePage(){
        let ctaPopup = $('#insuranceca-share-page > .cta-share');
        let popup = $('#insuranceca-share-page > .content-share-page');
        ctaPopup.click(function(event){
            popup.show( "slow" );
            $('#insuranceca-share-page').addClass('active');
        });
    }

    function hiddenPopupSharePage(){
        let ctaClose = $('#insuranceca-share-page > .content-share-page .cta-close');
        let popup = $('#insuranceca-share-page > .content-share-page');
        ctaClose.click(function(event){
            popup.hide( "slow" );
            $('#insuranceca-share-page').removeClass('active');
        });
    }

    function copyLinkPageCurrent(){

        let ctaCopy = $('#insuranceca-share-page > .content-share-page .cta-copy');

        ctaCopy.click(function(){

            let linkCurrent = document.getElementById("link-page-current");
            linkCurrent.innerHTML = "Copy to clipboard";
            linkCurrent.select();
            linkCurrent.setSelectionRange(0, 99999)
            document.execCommand("copy");

        });

    }

    // funtion hidden alert banner top
    function hiddenAlertBannerTop() {
        let ctaHidden = $('#bt-alert-banner-top .cta-close');
        let isBanner = $('#bt-alert-banner-top')
        ctaHidden.click(function(event){
            isBanner.slideUp(400);
        });

    }

    function btnScroll() {

        $(".elementor-widget-button a").on('click', function(event) {

            if (this.hash !== "") {

                event.preventDefault();

                var hash = this.hash;

                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){

                    window.location.hash = hash;
                });
            } // End if
        });

    }

    function toggleMenuMobile() {
    $('.site-header .wp-megamenu .menu-item a').click( function() {
      $(this).find('b').toggleClass('rotate');
    });
  }

    $( document ).ready(function() {
      toggleMenuMobile();
        showPopupSharePage();
        hiddenPopupSharePage();
        copyLinkPageCurrent();
        hiddenAlertBannerTop();
        btnScroll();

    });

    $(window).on('load',function(){

    });


} )( window, jQuery )
