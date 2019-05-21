/* eslint-disable */
export default function () {
    (function () {
    //Request for the API - start is a random number initially
    var request = {
        industry: '',
        keyWord: '',
        count: 3,
        start: Math.floor(Math.random() * 100),
        nonce: $('#business_name_generator_nonce').val(),
    };

    var states = {
        'Start': '#bng-start',
        'Industry': '#bng-select-industry',
        'Query': '#bng-keyword',
        'Options': '#bng-options',
        'Result': '#bng-result'
    };

    // Animation classes
    var slideOutLeft = 'animated fadeOutLeft';
    var slideInRight = 'animated fadeInRight';
    var slideOutRight = 'animated fadeOutRight';
    var slideInLeft = 'animated fadeInLeft';
    var fadeIn = 'animated fadeIn';
    var endAnimation = 'animationend webkitAnimationEnd';

    // Smooth Scroll to Blogs
    $('#scroll-to-small-business').on('click', function (e) {
        e.preventDefault();
        interactions.scrollWin('#starting-small-business');
    });

    // Click Event on 'Let's Get Started'
    $('#get-started').on('click', function () {
        switchState('Start', 'Industry', 'right');
    });


    // Go Back to Keyword Page
    $('#select-new-word').on('click', function (e) {
        e.preventDefault();
        switchState('Options', 'Query', 'left');
    });

    // Click Event on 'Industry'
    $('.industry').on('click', function () {
        request.industry = $(this).attr('id');
        switchState('Industry', 'Query', 'right');
    });

    // Click Event on 'Keyword'
    $('#keyword-submit').on('click', function (e) {
        e.preventDefault();
        var keyWord = $('.keyword-input').val().trim();
        keyWord = toTitleCase(keyWord);
        //Client side validation here
        if (isValidKeyWord(keyWord)) {
        request.keyWord = keyWord;

        //Starts spinner
        $('#keyword-submit').addClass('button-disabled');
        $('#keyword-submit > span').addClass('is-transparent');
        $('#keyword-submit').attr('disabled', 'disabled');

        requestNames(function (names) {
            //Stops spinner
            $('#keyword-submit').removeClass('button-disabled');
            $('#keyword-submit > span').removeClass('is-transparent');
            $('#keyword-submit').removeAttr('disabled');
            //Adds results to Options state
            clearResults();
            names.forEach(addResult);
            //Switches to Options state
            switchState('Query', 'Options', 'right', function () {
            setTimeout(function () {
                $('#magic-wand').removeClass('hidden-wand').one(endAnimation, function () {
                $(this).removeClass('fadeIn');
                });
            }, 1000);
            });

        });
        } else {
        $('.keyword-input').addClass('has-error');
        }
    });

    // Show more names
    $('#see-more').on('click', function (e) {
        e.preventDefault();
        requestNames(function (names) {
        clearResults();
        names.forEach(addResult);
        });
    });

    // Click Event on Options
    $('#options-container').on('click', '.name-option', function () {
        name = $(this).text();
        $('.business-name-result').text(name);
        switchState('Options', 'Result', 'right', function () {
        initLights();
        setTimeout(function () {
            $('.building-left').addClass(fadeIn);
            $('.building-right').addClass(fadeIn);
        }, 50);
        setTimeout(function () {
            $('.look-sign').addClass(fadeIn);
        }, 500);
        setTimeout(function () {
            $('.name-container').addClass(fadeIn);
        }, 1000);
        setTimeout(function () {
            $('.blog-lead-in').addClass(fadeIn);
        }, 2500);
        });
    });

    // Resize the Windows for the Lights
    $(window).resize(function () {
        $('.tile').remove();
        resizeLights();
    });

    // Check if email input is empty
    $('.email-submit-button').on('click', function () {
        var emailValue = $('.input-email').val();
        if (!validate.isValidEmail(emailValue)) {
        $('.input-email ').addClass('has-error')
            .css('border', 'none');
        } else {
        $('.input-email ').removeClass('has-error')
        $('#email-sign-up').hide();
        $('#email-sent-confirmation').show();
        }
    });

    // Function to move to the next state of the Business Generator
    var switchState = function (prev, next, direction, callback) {
        var slideOut = (direction == 'left') ? slideOutRight : slideOutLeft;
        var slideIn = (direction == 'left') ? slideInLeft : slideInRight;
        var $statesNext = $(states[next]);
        $(states[prev]).addClass(slideOut).one(endAnimation, function () {
        $(this).removeClass(slideOut);
        $(this).addClass('hidden-step');
        $statesNext.removeClass('hidden-step')
            .addClass(slideIn)
            .one(endAnimation, function () {
            $(this).removeClass(slideIn);
            //execute optional callback
            typeof callback !== 'undefined' && callback();
            });
        });
    };

    // Clear Results of the options generated
    var clearResults = function () {
        $('#options-container').empty();
    };

    // Add Results to the Page
    var addResult = function (name) {
        $('#options-container').append('<button class="name-option">' + name + '</button>');
    };

    var isValidKeyWord = function (input) {
        return /^[a-zA-Z0-9][a-zA-Z\'0\d\-]*( [a-zA-Z0-9][a-zA-Z\'\d\-]*)*$/.test(input)
    };

    var toTitleCase = function (str) {
        return str.replace(/\w\S*/g, function (txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
    };

    // Dev: Daniel Hicks & Sacha Sayan
    var resizeLights = function () {
        $('.name-container').width('');
        $('.name-container').height('');
        $('.tile').hide();

        // Let's round up our width to something divisible by 40
        var initialWidth = $('.name-container').width();
        var newWidth = initialWidth;

        if (initialWidth % 40 != 0) {
        newWidth = initialWidth - (initialWidth % 40) + 40;
        }

        $('.name-container').width(newWidth);

        // Let's add a number of tiles appropriate for our width
        for (var i = 0; i < newWidth / 40; i++) {
        $('.lights-row').append('<div class="tile"></div>');
        }

        // Let's round up our height to something divisible by 40
        var initialHeight = $('.center-content').height();
        var newHeight = initialHeight;

        if (initialHeight % 40 != 0) {
        newHeight = initialHeight - (initialHeight % 40) + 40;
        }

        $('.center-content').height(newHeight);
        // Let's add a number of tiles appropriate for our height
        for (var i = 0; i < newHeight / 40; i++) {
        $('.lights-col').append('<div class="tile"></div>');
        }
    };

    var randomizeLightCoordinates = function (tileSize) {
        $('.name-container').find('.tile').each(function () {
        var bgX = Math.floor(Math.random() * 10) * tileSize;
        var bgY = Math.floor(Math.random() * 10) * tileSize;

        var cssString = bgX + 'px ' + bgY + 'px';

        $(this).css('background-position', cssString);
        });
    };

    var initLights = function () {
        resizeLights();
        window.setInterval(function () {
        randomizeLightCoordinates(20);
        }, 500);
    };

    var requestNames = function (onFinish) {
        $.ajax({
        url: '/wp-json/bng/generate?' + $.param(request),
        type: 'GET',
        data: {},
        datatype: 'json',
        success: function (data) {
            //Add to start for next request
            request.start += request.count;
            data.map(function (obj) {
            return obj.name
            });

            //Run optional callback with list of generated names
            typeof onFinish !== 'undefined' && onFinish(data.map(function (obj) {
            return obj.name
            }));

        },
        error: function () {
            // When error occurs
            console.error('There was an error.');
        }
        });
    };
    }());
}