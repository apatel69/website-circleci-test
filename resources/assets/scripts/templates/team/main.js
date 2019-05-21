// import external dependencies
import "jquery";
import "jquery-ui/ui/widgets/autocomplete";
import "waypoints/lib/jquery.waypoints.js";
// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import stickyNav from "../../components/sticky-nav";
import dropdownNav from "../../components/dropdown-nav";
import teamShowcase from "./team-showcase";

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    stickyNav();
    dropdownNav();
    teamShowcase();
});
