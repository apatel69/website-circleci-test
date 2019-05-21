import { is_touch_device } from '../../util/helpers'

export default function () {
    const waypoints = [
        'fade-in-bottom',
        'slide-right',
        'slide-left',
        'slide-fwd-tr',
        'flicker-in-1',
        'slide-fwd-tl',
        'slide-top',
        'slide-tl',
    ]

    const createWaypoint = element => {
        $(element).waypoint({
            handler: function () {
                $(element).addClass('animate')
            },
            offset: '80%',
        })
    }

    const findAllElements = name => {
        const animation = $(`.${name}`);
        if (animation.length) {
            animation.each((i, el) => {
                createWaypoint(el)
            })
        }
    }

    const backToTop = () => {
        var id = '#back-to-top';
        $(id).waypoint({
            handler: function (direction) {
                $(id).addClass('animate')

                /* back to top button condition - 
                fadeout back top buton when the waypoint hits the element position back when scrolling to top */
                if (direction === 'up' && $(id).hasClass('fade-in-bottom')) {
                    $(id).removeClass('fade-in-bottom');
                    $(id).addClass('fade-out-bottom');
                } else if (direction === 'down' && $(id).hasClass('fade-out-bottom')) {
                    $(id).removeClass('fade-out-bottom');
                    $(id).addClass('fade-in-bottom');
                }
            },
            offset: '10%',
        })
    }

    const mountainCloud = () => {
        var id = '.talent__movingCloud';
        $(id).waypoint({
            handler: function () {
                $(id).addClass('slide-left animate')
            },
            offset: '50%',
        })
    }
    
    const init = () => {
        if (window.outerWidth > 990 && !is_touch_device()) {
            waypoints.forEach(wp => findAllElements(wp));
            mountainCloud();
        }

        backToTop();
    }

    if (is_touch_device()) {
        $('body').addClass('touch-device');
    }

    init();

    $(window).resize(init);    
}
