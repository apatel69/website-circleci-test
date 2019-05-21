// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import navigation from "../../global/classic/navigation";
import businessNameGenerator from "./bng";

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    navigation();  
    businessNameGenerator();
});
