// import external dependencies
import "jquery";
import validate from "../../global/validate";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import tabToggle from "./about-tabs";
import carousel from "./carousel";
import thirdParty from "./third-party";
import modal from "./modal";
import filter from "./filter";
import getStartedForm from "./get-started-form";

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    validate();
    tabToggle();
    carousel();
    thirdParty();
    modal();
    filter();
    getStartedForm();
});
