/*
(function ($) {
  Drupal.behaviors.viewsInfiniteScroll = {
    attach: function (context, settings) {
      $(function(){
        var $container = $('div.autopager div.view-content');
        alert('ASDSDF');
        $container.imagesLoaded( function(){
          $container.infinitescroll({
            navSelector  : 'div.autopager .pager',    // selector for the paged navigation
            nextSelector : 'div.autopager .pager-next a',  // selector for the NEXT link (to page 2)
            itemSelector : 'div.autopager .views-row',     // selector for all items you'll retrieve
            loading: {
              finishedMsg: 'No more pages to load.',
              img: Drupal.settings.basePath + 'sites/all/themes/corporateclean/images/loading.gif'
            }
        })
    })
  });
  }
};
})(jQuery);
*/