
export class Plugins {

  init() {
    this.JourneySlider();
  }

  JourneySlider() {
    $(document).ready(function () {
      var journeyParts = $(".journey-part");
      var images = $(".journey-img img");
      // Hide all images initially except the first one
      images.hide().first().show();
      $(window).scroll(function () {
        var fromTop = $(window).scrollTop();
        journeyParts.each(function (index) {
          var sectionTop = $(this).offset().top;
          var sectionHeight = $(this).outerHeight();
          if (fromTop >= sectionTop - sectionHeight / 2 && fromTop < sectionTop + sectionHeight / 2) {
            // Hide all images
            images.hide();
            // Show the image corresponding to the journey-part in view
            images.eq(index).show();
            // Add "active" class to current journey part if desired
            journeyParts.removeClass("active");
            $(this).addClass("active");
          }
        });
      });
    });
  }
}
