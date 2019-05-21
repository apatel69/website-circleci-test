// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import waypoints from './waypoints';
import slider from './slider';
import mobileNav from './mobile-nav';
import tableOfContents from './table-of-contents';
import share from './share';

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    waypoints();
    slider();
    mobileNav();
    tableOfContents();
    share();
});
