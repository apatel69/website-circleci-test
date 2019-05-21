/* eslint-disable */
/**
 * Copied straight from
 * statamic legacy codebase
 */

// Return a string made up of text from the path components, splitting on "/", "-", and "_"
// For example, a path like "/foo/bar/123-the-best_thing_ever" will return
// "foo bar 123 the best thing ever"

export default function () {
    function getKeywordsFromPath() {
        var search = location.pathname;
        search = search.replace('/', '');
        search = search.replace(/-/g, ' ');
        search = search.replace('%20', ' ');
        return search;
    }
    
    function prepareBody(result) {
    
        var maxLength = 150; // maximum number of characters to extract
    
        //trim the string to the maximum length
        var trimmedString = result.substr(0, maxLength);
    
        //re-trim if we are in the middle of a word
        trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")));
        if (result.length > trimmedString.length) {
            trimmedString = trimmedString + "&hellip;";
        }
    
        return trimmedString;
    
    }
    
    // Loop over the search results and append each one to the st-results-container div.
    // This example is suited for crawler and WordPress-based search engines.
    // For API-based engines, the fields will depend on your search engine's schema.
    function renderAutomaticResults(data) {
        var $resultContainer = $("#st-results-container");
        $resultContainer.html("");
        if (data['records']['page'].length > 0) {
            $resultContainer.append("<h2 class='page-subhead'>Relevant pages based on this URL</h2>");
        }
    
        $.each(data['records']['page'], function(index, result) {
            var resultHTML = "<p style=\"max-width: 500px\"><a href='" + result['url'] + "' class=\"search-link\">" +
                (result['highlight']['title'] || result['title']) + "</a><br>";
            if (result['highlight']['body']) {
                resultHTML = resultHTML + "<span class=\"search-body\">" + prepareBody(result['highlight']['body']) + "</span>";
            } else if (result['body']) {
                resultHTML = resultHTML + "<span class=\"search-body\">" + prepareBody(result['body']) + "</span>";
            } else {
    
            }
            resultHTML = resultHTML + "</p>";
            $resultContainer.append(resultHTML);
        });
    }
    
    // Perform a search using Swiftype's JSONP API and call renderAutomaticResults when it finishes.
    // Replace the engine_key with your own; the one searches the Swiftype documentation.
    var searchParams = {
        engine_key: "6SDRjozKUVXQCY-3fFf9",
        q: getKeywordsFromPath(),
        per_page: 5,
    }
    
    $.getJSON("//api.swiftype.com/api/v1/public/engines/search.json?callback=?", searchParams).success(renderAutomaticResults);
}