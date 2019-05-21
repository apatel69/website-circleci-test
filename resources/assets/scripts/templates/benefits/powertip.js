import tooltips from "./vendor/jquery.powertip.min.js";

export default function () {
  tooltips;
  $('.tooltips').powerTip({
    placement: 'sw-alt',
    fadeInTime: 50,
  });
}
