// import external dependencies
import "jquery";

// import local dependencies
import Router from "../../util/Router";
import common from "../../routes/common";
import navigation from "./navigation";
import hljs from "highlightjs";

const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => {
    routes.loadEvents();
    navigation();
    hljs.configure({
        tabReplace: '  ',
        languages: [
            'xml',
            'html',
            'http',
            'json',
            'shell',
        ],
    });
    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
    });
});
