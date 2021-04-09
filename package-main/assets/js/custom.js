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

            console.log("Aac");
            let linkCurrent = document.getElementById("link-page-current");
            linkCurrent.innerHTML = "Copy to clipboard";
            linkCurrent.select();
            linkCurrent.setSelectionRange(0, 99999)
            document.execCommand("copy");
        });

        // function outFunc() {
        //     var tooltip = document.getElementById("myTooltip");
        //     tooltip.innerHTML = "Copy to clipboard";
        // }
    }

    $( document ).ready(function() {
        showPopupSharePage();
        hiddenPopupSharePage();
        copyLinkPageCurrent();
    });

} )( window, jQuery )
