/*eslint-disable */

// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import stickyColumn from "./sticky-column";

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
  });
  
jQuery(window).load(() => {
    stickyColumn();
});