// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import NFB_Signup_Form from '../../components/hero-signup';
import carousel from '../../components/carousel';
import faq from "../../components/faq";

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    NFB_Signup_Form();
    carousel();
    faq();
});
