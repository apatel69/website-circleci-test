export default function() {
    
    // Individual Slide Button
    $(".controls .slides a").click(function(e) {
        e.preventDefault();
        var targetVal = $(this).data("target");
        var parentEl = $(this).parents(".img-carousel");

        parentEl.find(".active").removeClass("active");

        var targetEl = parentEl.find("img[data-name=" + targetVal + "]");

        targetEl.addClass("active");
        $(this).addClass("active");

        checkDisabledStates(parentEl);
    });

    // Back and Next Buttons
    $(".btn-carousel").click(function(e) {
        e.preventDefault();
        if (!$(this).hasClass("disabled")) {
            var parentEl = $(this).parents(".img-carousel");
            var currentIMG = parentEl.find("img.active");
            var currentSlide = parentEl.find(".slides a.active");

            currentIMG.removeClass("active");
            currentSlide.removeClass("active");

            if ($(this).hasClass("btn-back")) {
                currentIMG.prev("img").addClass("active");
                currentSlide.prev("a").addClass("active");
            }

            if ($(this).hasClass("btn-next")) {
                currentIMG.next("img").addClass("active");
                currentSlide.next("a").addClass("active");
            }

            checkDisabledStates(parentEl);
        }
    });

    function checkDisabledStates(el) {
        el.find(".btn-back").removeClass("disabled");
        el.find(".btn-next").removeClass("disabled");

        if (el.find(".slides a").first().hasClass("active")) {
            el.find(".btn-back").addClass("disabled");
        }

        if (el.find(".slides a").last().hasClass("active")) {
            el.find(".btn-next").addClass("disabled");
        }
    }
}