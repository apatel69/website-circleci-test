// import external dependencies
import "jquery";
import validate from "../../global/validate";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import filter from "./filter";
import stickyBannerCTA from "./sticky-banner-cta";

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    validate();
    filter();
    stickyBannerCTA();
});
