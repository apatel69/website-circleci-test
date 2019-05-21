import hljs from "highlightjs";

export default function () {
  initLangContent();

  hljs.initHighlightingOnLoad();

  function initLangContent() {
    var firstLang = $('.lang-toggle .btn-api:first-child'),
      firstLangTarget = firstLang.data('target');

    firstLang.addClass('active');
    $('.' + firstLangTarget + '-content').show();
  }

  // Language Toggle
  $('.btn-api').click(function (e) {
    e.preventDefault();
    var thisTarget = $(this).data('target');

    $('.btn-api').removeClass('active');
    $(this).addClass('active');

    $('.dev-content').hide();
    $('.' + thisTarget + '-content').show();
  });
}
