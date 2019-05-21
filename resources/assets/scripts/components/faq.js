export default function() {
    $('.faq-question').click(function(){
        $(this).parent().find('.faq-answer').children().slideToggle(400);
        $(this).toggleClass("display-faq-answer");
    });
}
