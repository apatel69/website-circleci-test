/* eslint-disable */
 /*
 * This js file handles the drawing of shapes of people's faces in a randomized manner
 * on a canvas as well as builds a search functionality based on jQuery autocomplete.
 */
export default function() {

  $.fn.translate2d = function(options) {
    var settings = $.extend({ x: 0, y: 0 }, options);
    return this.css({ top: settings.y, left: settings.x });
  };

  // methods that control the intervals used to set the animations
  // courtesy of http://stackoverflow.com/questions/8635502/how-do-i-clear-all-intervals
  let interval = {
    //to keep a reference to all the intervals
    intervals: {},

    //create another interval
    make: function(fun, delay) {
      //see explanation after the code
      var newInterval = setInterval.apply(
        window,
        [fun, delay].concat([].slice.call(arguments, 2))
      );

      this.intervals[newInterval] = true;

      return newInterval;
    },

    //clear a single interval
    clear: function(id) {
      return clearInterval(this.intervals[id]);
    },

    //clear all intervals
    clearAll: function() {
      var all = Object.keys(this.intervals),
        len = all.length;

      while (len-- > 0) {
        clearInterval(all.shift());
      }
    }
  };

  /* MAIN */
  /* ------------------------------- */

  /* GLOBAL VARIABLES */
  /* ------------------------------- */

  // array that holds all shapes already placed
  let drawnShapeArray = new Array();
  let namesArray = new Array();
  let shapesDrawn = false;

  const $canvas = $(".canvas");
  const numFreshBookers = $(".freshbooker").length;

  /* CONSTANTS */
  /* ------------------------------- */

  // circle diameters in px
  const MAX_DIAMETER = 125;
  const MIN_DIAMETER = 50;

  // spacing between all sides of the shapes in px
  const SPACE = 15;

  //extra spacing for sides of canvas
  const MARGIN = 50;

  // canvas dimensions in px
  let CANVAS_HEIGHT = $canvas.height() - (MAX_DIAMETER + MARGIN);
  // this calc should guarantee there is enough space on the canvas even as the company grows
  let CANVAS_WIDTH = 32 * numFreshBookers;

  // timings in milliseconds (lower is faster)
  const FADE_IN_TIME = 8000;
  const SCROLL_SPEED = 40;

  // prints error messages in console when canvas is too small to
  // accomodate all the shapes given the parameters above
  let DEBUG = false;

  // Shape placing calculations
  // -----------------------

  // get initial time for the purposes of preventing
  // an infite loop
  let startT = new Date().getTime();

  // main loop which goes over everybody in the company
  // and finds a spot for their face on the canvas
  for (let i = 1; i <= numFreshBookers; i++) {
    
    let $freshbooker = $(".freshbooker#" + i);

    // get the coordinates for the shape on the canvas
    let coords = setShapeLocation();

    // draw the shape (translate from original position at 0,0)
    $freshbooker.find("img").css("width", coords.d);
    $freshbooker.translate2d({ x: coords.x1 + coords.d / 2, y: coords.y1 });

    // push names of all freshbookers onto array for use by search functionality
    namesArray.push($freshbooker.find(".freshbooker-name").text());
  }

  // Scroll animation of Canvas
  // ----------------------------

  //horizontal scroll position
  let h_pos = 0;

  $(".freshbooker img").mouseover(function() {
    interval.clearAll()
  });

  $(".freshbooker img").mouseout(function() {
    interval.make(function() {
      $canvas.scrollLeft(h_pos++);
    }, SCROLL_SPEED);
  });

  //when scrolling with the mouse, this tracks the horizontal scroll position
  $canvas.scroll(function () {
    h_pos = $canvas.scrollLeft();
  });

  //trigger initial movement
  interval.make(function () {
    $canvas.scrollLeft(h_pos++);
  }, SCROLL_SPEED);

  // Search functionality
  // -----------------------------

  $("#team-search-field").autocomplete({
    appendTo: ".autocomplete-wrapper",
    select: function(event, ui) {
      // get id of freshbooker
      var id = namesArray.indexOf(ui.item.label) + 1;

      let $freshbooker = $(".freshbooker#" + id);

      // calculate offset and scroll to the freshbooker
      let offset =
        parseInt($freshbooker.css("left"), 10) -
        $("#freshbookers").width() / 2 +
        (MAX_DIAMETER - MIN_DIAMETER) / 2;
      $canvas.animate({ scrollLeft: offset }, 850);

      $freshbooker.focus();

      // set all other freshbookers to be semi-opaque
      $(".freshbooker").removeClass("opacity");
      $(".freshbooker")
        .not("#" + id)
        .addClass("opacity");

      // stop the scroll animation
      interval.clearAll();
    },
    autoFocus: true,
    source: function(request, response) {
      var results = $.ui.autocomplete.filter(namesArray, request.term);
      //limit responses to only 6 results max
      response(results.slice(0, 6));
    }
  });

  // Lazy "show"
  // -----------------------------

  // shows the shapes only when user scrolls to the canvas
  new Waypoint({
    element: $canvas,
    handler: drawShapes,
    offset: "100%"
  });

  /* EVENT HANDLERS */
  /* ------------------------------- */

  $(".freshbooker").focus(function() {
    //show the hover state of the freshbooker that was searched for
    $(this)
      .find("img")
      .addClass("active");
    $(this)
      .find(".tooltip")
      .addClass("active");
  });

  $(".freshbooker").blur(function() {
    resetCanvas();
  });

  // make sure the enter button doesn't reset the canvas
  $("#team-search-field").on("keyup", e => {
    if (e.keyCode != 13) {
      resetCanvas();
    }
  });

  /* FUNCTIONS */
  /* ------------------------------- */

  function drawShapes() {
    if (!shapesDrawn) {
      // fade In shapes randomly
      for (let i = 1; i <= numFreshBookers; i++) {
        let $freshbooker = $(".freshbooker#" + i);
        fadeIn($freshbooker);
      }
      shapesDrawn = true;

      // remove spinner gif from canvas
      $canvas.css("background", "white");
    }
  }

  function resetCanvas() {
    $(".freshbooker").removeClass("opacity");

    $(".freshbooker")
      .find("img")
      .removeClass("active");
    $(".freshbooker")
      .find(".tooltip")
      .removeClass("active");
  }

  // finds an appropriate location for the shape and returns its coordinates
  function setShapeLocation() {
    // generate a random location for the rectangle
    let coords = randomLocation();

    // loop through an array of previous rectangle positions
    for (let j = 0; j < drawnShapeArray.length; j++) {
      // this code prevents the javascript from running into an infinite loop
      // if a shape takes longer than 3 seconds to be placed, break out of all future loops;
      // shapes will be overlapping, but this is better than having the whole page freeze
      let now = new Date().getTime();
      if (now - startT > 3000) {
        if (DEBUG) console.info("failed to find empty space on canvas");
        break;
      }

      while (
        coords.x1 - SPACE < drawnShapeArray[j].x2 &&
        coords.x2 + SPACE > drawnShapeArray[j].x1 &&
        coords.y1 - SPACE < drawnShapeArray[j].y2 &&
        coords.y2 + SPACE > drawnShapeArray[j].y1
      ) {
        coords = randomLocation();

        // we're attempting a new location, reset drawnShapeArray index
        j = 0;
      }
    }

    // the coordinates of the newly found shape
    // are now pushed onto the array of all shapes
    drawnShapeArray.push(coords);

    return coords;
  }

  // generates a random set of x,y coordinates as well as a diameter for a shape
  function randomLocation() {
    var d = Math.random() * (MAX_DIAMETER - MIN_DIAMETER) + MIN_DIAMETER;
    var x1 = Math.random() * (CANVAS_WIDTH - MARGIN) + MARGIN;
    var y1 = Math.random() * (CANVAS_HEIGHT - 1.4 * MARGIN) + 1.4 * MARGIN;
    return {
      d: d,
      x1: x1,
      x2: x1 + d,
      y1: y1,
      y2: y1 + d
    };
  }

  // randomly fades in the shapes
  function fadeIn($freshbooker) {
    setTimeout(function() {
      $freshbooker.fadeIn();
    }, Math.random() * FADE_IN_TIME);
  }
}
