// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import modal from "./modal";
import filterAndLoadMore from "./filterAndLoadMore";

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    modal();
    filterAndLoadMore();
});
