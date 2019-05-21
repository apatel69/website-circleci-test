// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import form from "./form";
import { DateTime } from 'luxon';


const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    form();
    const easternTime = DateTime.local().setZone('America/Toronto').toFormat("hh:mm a 'on' cccc");
    $('#curTime').text(easternTime);
    routes.loadEvents();
});
