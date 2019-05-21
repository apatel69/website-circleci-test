// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../../util/Router";
import common from "../../../routes/common";
import faq from "../../../components/faq";
import carousel from '../../../components/carousel';
import NFB_Signup_Form from '../../../components/inline-signup';

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    faq();
    carousel();
    NFB_Signup_Form("progressiveRevealForm-successMessage");
});
