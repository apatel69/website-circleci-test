// import external dependencies
import "jquery";

// // import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import carousel from '../../components/carousel';

const routes = new Router({
  common,
});

// // Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    carousel();
});
