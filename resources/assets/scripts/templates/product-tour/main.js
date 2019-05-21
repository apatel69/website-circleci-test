// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import stickyNav from "../../components/sticky-nav";
import dropdownNav from "../../components/dropdown-nav";
import tabs from './tabs';
import slideInSignup from './slide-in-signup';
import faq from "../../components/faq";
import NFB_Signup_Form from '../../components/hero-signup';

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    stickyNav();
    dropdownNav();
    tabs();
    faq();
    NFB_Signup_Form();
    slideInSignup();
});
