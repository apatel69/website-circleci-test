/* eslint-disable */
import { readCookie } from '../../util/helpers';

export default function() {   
    // Change URLs to specific pages that have both Classic and NFB versions
    // so that they see the 'Which version are you using' modal
    function whichVersionURL(path) {
      return "/which-version?path=" + encodeURIComponent(path);
    }
    $(document).ready(function () {
      //if cookie not set, go to which-version page
      if (!readCookie("fb_platform")) {
        var urls = ["/addons-new", "/addons", "https://support.freshbooks.com", "/support", "/api", "/developers"];
    
        jQuery.each(urls, function () {
          $("a[href='" + this + "']").attr("href", whichVersionURL(this));
        });
      }
    });
    
    $(document).ready(function () {
      $(".platform-chooser span").click(function () {
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
    
        var index = $(this).index() + 1;
        var index_sibling = index % 2 + 1;
    
        $(".which-version-tile:nth-of-type(" + index + ")").addClass("active");
        $(".which-version-tile:nth-of-type(" + index_sibling + ")").removeClass("active");
      });
    
      var params_path = getParameterByName("path");
      var paired_article_path = getParameterByName("paired-article");
    
      try {
        //CLASSIC ROUTES
    
        var reference_path = "/addons";
        var nfb_path = paired_article_path ? paired_article_path : "/addons-new";
    
        if (params_path.substring(0, reference_path.length) === reference_path) {
          $("a#freshbooks-classic").attr("href", params_path);
          $("a#freshbooks").attr("href", nfb_path);
        }
    
        var reference_path = "/developers";
        var nfb_path = paired_article_path ? paired_article_path : "/api";
    
        if (params_path.substring(0, reference_path.length) === reference_path) {
          $("a#freshbooks-classic").attr("href", params_path);
          $("a#freshbooks").attr("href", nfb_path);
        }
    
        var reference_path = "/support";
        var nfb_path = paired_article_path ? paired_article_path : "http://support.freshbooks.com";
    
        if (params_path.substring(0, reference_path.length) === reference_path) {
          $("a#freshbooks-classic").attr("href", params_path);
          $("a#freshbooks").attr("href", nfb_path);
        }
    
        //NFB ROUTES
    
        var reference_path = "/addons-new";
        var classic_path = paired_article_path ? paired_article_path : "/addons";
    
        if (params_path.substring(0, reference_path.length) === reference_path) {
          $("a#freshbooks").attr("href", params_path);
          $("a#freshbooks-classic").attr("href", classic_path);
        }
    
        var reference_path = "/api";
        var classic_path = paired_article_path ? paired_article_path : "/developers";
    
        if (params_path.substring(0, reference_path.length) === reference_path) {
          $("a#freshbooks").attr("href", params_path);
          $("a#freshbooks-classic").attr("href", classic_path);
        }
    
        var reference_path = "https://support.freshbooks.com";
        var classic_path = paired_article_path ? paired_article_path : "/support";
    
        if (params_path.substring(0, reference_path.length) === reference_path) {
          $("a#freshbooks").attr("href", params_path);
          $("a#freshbooks-classic").attr("href", classic_path);
        }
    
      } catch (err) {
    
        window.location = "/";
    
      } finally {
        //DEFAULT ROUTE
    
        if (!$("a#freshbooks-classic").attr("href") || !$("a#freshbooks").attr("href")) {
          window.location = "/";
        }
      }
    
      //SET COOKIES
    
      $("a#freshbooks-classic").click(function () {
        createCookie("fb_platform", "classic", 365);
      });
      $("a#freshbooks").click(function () {
        createCookie("fb_platform", "nfb", 365);
      });
    });
    
    function getParameterByName(name, url) {
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
}
