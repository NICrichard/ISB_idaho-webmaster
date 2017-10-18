(function($) {
  $('body').scrollspy({target: '.bs-docs-sidebar', offset: 500});

  $('.bs-docs-sidebar').affix({
    offset: 360,
  });
})(jQuery);