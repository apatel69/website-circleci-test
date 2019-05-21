// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import selectNav from '../../global/select-nav';
import snippets from './snippets';
import accordion from './accordion';

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    snippets();
    accordion();
    selectNav();
});
