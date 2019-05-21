// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import stickyNav from "../../components/sticky-nav";
import dropdownNav from "../../components/dropdown-nav";
import screenshotToggle from "./screenshot-toggle"

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    stickyNav();
    dropdownNav();
    screenshotToggle();
});
