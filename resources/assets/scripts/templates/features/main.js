// import external dependencies
import "jquery";

// // import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import featureDropdownNav from "./features-dropdown-nav";

const routes = new Router({
  common,
});

// // Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    featureDropdownNav();
});
