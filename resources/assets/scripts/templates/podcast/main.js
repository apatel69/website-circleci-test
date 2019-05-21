// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import scrollSnapPolyfill from "css-scroll-snap-polyfill";
import scrollOnLoad from "./scroll-on-load";
import cardExpand from "./card-expand";

const routes = new Router({
    common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    scrollSnapPolyfill();
    scrollOnLoad();
    cardExpand();
});
