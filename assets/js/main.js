// Starter JS file. You can migrate your landing JS here.
(function($){
  $(function(){
    // Example: smooth scroll for anchor links
    $('a[href^="#"]').on('click', function(e){
      var target = $($(this).attr('href'));
      if (target.length) {
        e.preventDefault();
        $('html, body').animate({scrollTop: target.offset().top - 64}, 500);
      }
    });
  });
})(jQuery);
