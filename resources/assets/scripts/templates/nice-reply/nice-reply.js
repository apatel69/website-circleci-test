export default () => {
    if (!getQueryString()["user"] && !getQueryString()["ticket"]) {
        showElement("nice-reply-no-user-information");
        return;
    }
    if (!getQueryString()["user"]) {
        showElement("nice-reply-no-user-id");
        return;
    } if (!getQueryString()["ticketid"]) {
        showElement("nice-reply-no-ticket-id");
        return;
    } else {
        showElement("nice-reply-window-1");
    }

    $('#nice-reply-submit-1 a').on("click", function(e) {
        e.preventDefault();
        var supportExperienceScore = $('input[name="support-experience"]:checked').val();
        var productFeedbackScore = $('input[name="product-feedback"]:checked').val();
        handleSupportScores(supportExperienceScore,productFeedbackScore);
    });
}



function getQueryString() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
    
}

function showElement(elementID){
    document.getElementById(elementID).classList.remove("nice-reply-hide");
}

function hideElement(elementID){
    document.getElementById(elementID).classList.add("nice-reply-hide");
}

function handleSupportScores(supportExperienceScore,productFeedbackScore) {
    if (!(supportExperienceScore)) {
        $('.error-state p').show();
    } else {
        $('.error-state p').hide();
        var smallestScore = Math.min.apply(
            null,
            [supportExperienceScore, productFeedbackScore].filter(function(n) { 
                return !isNaN(n);
            })
        );
        var niceReplyData = $.param({
            user: getQueryString()["user"],
            ticketid: getQueryString()["ticketid"],
            supportExperienceScore: supportExperienceScore,
            productFeedbackScore: productFeedbackScore,
            minScore: smallestScore,
        });

        hideElement("nice-reply-window-1");
        showElement("nice-reply-window-2");

        if (smallestScore <=3) {
            showElement("nice-reply-response-1");
            hideElement("nice-reply-response-2");
            hideElement("nice-reply-response-3");
        }

        if (smallestScore >= 4 && smallestScore <=7){
            showElement("nice-reply-response-2");
            hideElement("nice-reply-response-3");
            hideElement("nice-reply-response-1");
        }

        if (smallestScore >= 8){
            showElement("nice-reply-response-3");
            hideElement("nice-reply-response-2");
            hideElement("nice-reply-response-1");
        }

        $('#nice-reply-submit-2 a').on("click", function() {
           postNiceReplyFeedback(niceReplyData);     
        });

    }
}

function postNiceReplyFeedback(postData) {
    var userFeedback = $("#nice-reply-feedback").val();
    
    $.ajax({
        type: "POST",
        //url: '/wp-content/themes/freshbooks/resources/functions/nicereply.php?'+postData+"&comment="+userFeedback,
        url:'/wp-json/nicereply/send?'+postData+"&comment="+userFeedback,
        data:{action:'submit-nice-reply'},
        success:function() {
            hideElement("nice-reply-window-2");
            showElement("nice-reply-window-3");
            showElement("nice-reply-submission-success"); 
        },error: function () {
            hideElement("nice-reply-window-2");
            showElement("nice-reply-window-3");
            showElement("nice-reply-submission-error"); 
        },
   });
    
}
