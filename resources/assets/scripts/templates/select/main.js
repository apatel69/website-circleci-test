// import external dependencies
import "jquery";
import { readCookie } from "../../util/helpers";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import dropdownNav from "../../components/dropdown-nav";
import newFeaturesCarousel from "../../components/vertical-tab-carousel"
import faq from "../../components/faq";
import validate from "../../global/validate";
import formSubmit from "./form-submit";
import SlimSelect from 'slim-select';
const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    dropdownNav();
    faq();
    validate();
    formSubmit();
    newFeaturesCarousel();
    window.readCookie = readCookie;

    new SlimSelect({
      select: '.select-form-option-list',
      showSearch: false,
    })
});
