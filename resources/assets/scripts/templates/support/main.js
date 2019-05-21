// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import mobileCategoryNav from "./mobile-category-nav";
import showAllPosts from "./show-all-posts";

const routes = new Router({
    common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    mobileCategoryNav();
    showAllPosts();
});
