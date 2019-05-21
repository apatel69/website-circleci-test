// import external dependencies
import "jquery";

// // import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import navigation from "./navigation";
import screenshotsCarousel from "./screenshots-carousel";

const routes = new Router({
  common,
});

// // Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    navigation();
    screenshotsCarousel();
});
