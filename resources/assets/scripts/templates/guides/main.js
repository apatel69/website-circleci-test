// import external dependencies
import "jquery";

// // import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import stickySidebar from "./sticky-sidebar";
import accordion from "./accordion";

const routes = new Router({
  common,
});

// // Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    stickySidebar();
    accordion();
});
