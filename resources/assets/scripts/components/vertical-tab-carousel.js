"use strict";

export default function() {
  $('.new-features-desktop').each(function() {

    (function($newFeatureCarousel) {
      var totalCircles = $newFeatureCarousel.find('.nav-dots').children().length;

      $newFeatureCarousel.find('.nav-dot').click(function(e) {
        e.preventDefault();
        updateCarouselElements(this, $newFeatureCarousel);
      });

      $newFeatureCarousel.find('.new-feature-detail').click(function() {
        updateCarouselElements(this, $newFeatureCarousel);
      });

      $newFeatureCarousel.find('.left-arrow').click(function(e) {
        e.preventDefault();
        var $selectedDot = $newFeatureCarousel.find('.nav-dots').find('.selected');
        var dotIndex = $selectedDot.index();
        if (dotIndex > 0) {
          var $updatedDot = $newFeatureCarousel.find('.nav-dots').children().eq(dotIndex - 1);
          $newFeatureCarousel.find('.nav-dot').removeClass('selected');
          $updatedDot.addClass('selected');
          updateCarouselElements($updatedDot, $newFeatureCarousel);
        }
      });

      $newFeatureCarousel.find('.right-arrow').click(function(e) {
        e.preventDefault();
        var $selectedDot = $newFeatureCarousel.find('.nav-dots').find('.selected');
        var dotIndex = $selectedDot.index();
        if (dotIndex < totalCircles - 1) {
          var $updatedDot = $newFeatureCarousel.find('.nav-dots').children().eq(dotIndex + 1);
          $newFeatureCarousel.find('.nav-dot').removeClass('selected');
          $updatedDot.addClass('selected');
          updateCarouselElements($updatedDot, $newFeatureCarousel);
        }
      });
    })($(this))
  });
}

function updateCarouselElements(element, $newFeatureCarousel) {
  var $element = $(element);
  var totalCircles = $newFeatureCarousel.find('.nav-dots').children().length;

  $newFeatureCarousel.find('.nav-dot').removeClass('selected');
  $newFeatureCarousel.find('.nav-dot').eq($element.index()).addClass('selected');

  $newFeatureCarousel.find('.new-feature-detail').removeClass('selected');
  $newFeatureCarousel.find('.new-feature-detail').eq($element.index()).addClass('selected');

  $newFeatureCarousel.find('.new-feature-screen').removeClass('selected');
  $newFeatureCarousel.find('.new-feature-screen').eq($element.index()).addClass('selected');

  $newFeatureCarousel.find('.arrow').addClass('active');
  if ($element.index() === 0) {
    $newFeatureCarousel.find('.left-arrow').removeClass('active');
  }
  if ($element.index() === totalCircles - 1) {
    $newFeatureCarousel.find('.right-arrow').removeClass('active');
  }
}
