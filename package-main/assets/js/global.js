/**
 * Project pack javascript
 *
 * @package mealprep
 */

;( function( w, $ ) {
    'use strict';

    var btnSearch = $('.header-search');
    var btnBackHome = $('.top-search');

    btnSearch.on('click',function(){
      $.magnificPopup.open({
        items: {
          src: '#ins_form_search'
        },
        type: 'inline',
        mainClass: 'mfp-with-zoom',
        zoom: {
          enabled: true, // By default it's false, so don't forget to enable it

          duration: 300, // duration of the effect, in milliseconds
          easing: 'ease-in-out', // CSS transition easing function

          // The "opener" function should return the element from which popup will be zoomed in
          // and to which popup will be scaled down
          // By defailt it looks for an image tag:
          opener: function(openerElement) {
            // openerElement is the element on which popup was initialized, in this case its <a> tag
            // you don't need to add "opener" option if this code matches your needs, it's defailt one.
            return openerElement.is('img') ? openerElement : openerElement.find('img');
          }
        }
      });
    });

    btnBackHome.on('click',function(){
      $('.ins-search-form-default .mfp-close').trigger('click')
    });

} )( window, jQuery )
