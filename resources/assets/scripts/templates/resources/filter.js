/**
 * Dynamic filtering for resources custom post type
 **/

export default function() {
  $(".btn-content-toggle").click(function(e) {
    e.preventDefault();

    var target = $(this).data("target");

    $(".btn-content-toggle").removeClass("active");

    $(this).addClass("active");

    sortBy(target);
  });

/**
 * Cards can be sorted by A-Z, Newest, and most Popular
 * (using the WP order field)
**/

  function sortBy(sortType) {
    var cards = $(".card");

    cards.sort(function(a, b) {
      if (sortType == "time") {
        return $(b).data("date") - $(a).data("date");
      } else if (sortType == "alpha") {
        if (a.textContent < b.textContent) {
          return -1;
        } else {
          return 1;
        }
      } else {
        return $(a).data("order") - $(b).data("order");
      }
    });

    $(".card-collection").html(cards);
  }
}
