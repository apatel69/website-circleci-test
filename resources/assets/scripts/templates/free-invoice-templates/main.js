// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import faq from "../../components/faq";

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    faq();
});
