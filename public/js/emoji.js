$(document).ready(function () {
    $('.emoji-btn').click(function () {
        $(this).siblings().removeClass('emoji-btn-chosen');
        $(this).toggleClass('emoji-btn-chosen');
        const input = $(this).parent().siblings('input');
        if ($(this).hasClass('emoji-btn-chosen')) {
            input.val($(this).attr('id'));
        } else {
            input.val(`${input.split('-')[0]}-0`);
        }
        $(this).parent().parent().submit();
    });

    const oReq = new XMLHttpRequest();
    oReq.onload = function() {
        const personalEmoji = JSON.parse(this.responseText);
        personalEmoji.forEach(obj => {
            $(`#${obj.comment_id}-${obj.emoji}`).addClass('emoji-btn-chosen');
        });
    };
    oReq.open('post', '/doEmojiHandle', true);
    oReq.send();
});
