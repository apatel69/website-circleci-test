const $overlay = $('.overlay');
const $modal = $('#slide-in-signup-modal');
const $close = $('#signup-close');
const $trigger = $('.slide-in-form-btn');
const $animations = $('.slideInSignup__slideIn, .slideInSignup__slideUpOne, .slideInSignup__slideUpTwo');
const $input = $modal.find('#inline_email_hero');

export default function() {
    $trigger.click(e => {
        if ($('.hero.slideInSignup').length > 0) {
            e.preventDefault();
            openModal();
        }
    })
    
    $overlay.click(() => {
        closeModal();
    });
    
    $close.click(() => {
        closeModal();
    })
}

const openModal = () => {
    $modal.removeClass('animateOut').addClass('animateIn');

    $animations.removeClass('animateOut').addClass('animateIn');

    $overlay
        .css({
            'display': 'block',
            'opacity': 0.4,
        })
        .addClass('active');

    $input.focus();
}


const closeModal = () => {
    $overlay
        .removeClass('active')
        .hide();
        
    $animations.addClass('animateOut').removeClass('animateIn');

    $modal.addClass('animateOut').removeClass('animateIn');

    $input.blur();
}