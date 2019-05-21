// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import testimonialTabs from "./vendor/testimonial-tabs";
import featherlight from "./vendor/featherlight.min.js";
import powertip from "./powertip";
import navigation from "../../global/classic/navigation";
import signupForm from "../../global/classic/signup-form";

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    testimonialTabs;
    featherlight;
    powertip();
    navigation();
    signupForm();
});
