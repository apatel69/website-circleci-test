// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import dropdownNav from "../../components/dropdown-nav";
import faq from "../../components/faq";
import resellerForm from "./reseller-form";

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    dropdownNav();
    faq();
    resellerForm();
});
