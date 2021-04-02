/**
 * Project pack javascript
 *
 * @package mealprep
 */

;( function( w, $ ) {
    'use strict';

    var siteHeader = $('.site-header');

    $(document).on('click','.search-form .search-form-submit',function(){
        var val_search = $('.search-form-input').val();
        if(val_search === '' || !siteHeader.hasClass('open-search')){
          siteHeader.toggleClass('open-search');
          return false;
        }
    });

    $(document).click(function(event) {
        if(!$(event.target).hasClass('search-form') && !$(event.target).hasClass('search-form-input')){
          siteHeader.removeClass('open-search');
        }
    });

} )( window, jQuery )
