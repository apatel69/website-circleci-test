// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import validateForm from "./validate-form";
import magnify from "./magnify";
import youtubeVideo from "./youtube-responsive-embed";
import carousel from '../../components/carousel';
import mobileNav from './mobile-nav';

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    validateForm();
    magnify();
    youtubeVideo();
    carousel();
    mobileNav();
});
