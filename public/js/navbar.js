$(document).ready(function () {
    const oReq = new XMLHttpRequest();
    oReq.onload = function() {
        const userId = JSON.parse(this.responseText);
        console.log(userId);
        if (document.location.pathname === '/profile/' + userId) {
            $('#profile-link').addClass('in-page');
        } else {
            $('#profile-link').removeClass('in-page');
        }
    };
    oReq.open('post', '/doSessionHandle', true);
    oReq.send();
});
