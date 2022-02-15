let sidebarToggle = false;
let sidebarText = $('.sidebar-text');
let sidebarBtn = $('.sidebar-btn');
let toggleIcon = $('#toggle_sidebar_icon');
let websiteName = $('#website_name');
let settingsBtn = $('#settings_btn');
let miniProfileRight = $('#mini-profile-right');
let miniProfileImg = $('.mini-profile-image');
let miniProfile = $('.mini-profile');
let serverIp = $('.serverip');

$(document).ready(function () {
    $('#toggle_sidebar').click(function () {
        if(sidebarToggle == false) {
            sidebarToggle = true;
            toggleIcon.removeClass('fa-arrow-alt-left');
            toggleIcon.addClass('fa-arrow-alt-right');
            sidebarText.fadeOut('fast');
            settingsBtn.fadeOut('fast');
            miniProfileRight.fadeOut('fast');
            miniProfileImg.addClass('mini-profile-image-small');
            miniProfile.addClass('p-2');
            setTimeout(function() {
                document.documentElement.style.setProperty('--sidebar-width', '100px');
                document.documentElement.style.setProperty('--sidebar-icon-width', 'unset');
                sidebarBtn.addClass('justify-content-center');
            }, 200);
            websiteName.fadeOut('fast');
        } else {
            toggleIcon.removeClass('fa-arrow-alt-right');
            toggleIcon.addClass('fa-arrow-alt-left');
            sidebarToggle = false;
            document.documentElement.style.setProperty('--sidebar-width', '280px');
            document.documentElement.style.setProperty('--sidebar-icon-width', '40px');
            sidebarBtn.removeClass('justify-content-center');
            setTimeout(function() {
                sidebarText.fadeIn('fast');
                settingsBtn.fadeIn('fast');
                miniProfileRight.fadeIn('fast');
                miniProfileImg.removeClass('mini-profile-image-small');
                miniProfile.removeClass('p-2');
            }, 250);
            websiteName.fadeIn('fast');
        }
    });
    serverIp.click(function (e) {
        navigator.clipboard.writeText(e.target.innerText);
        toastr.success("Ai copiat cu succes ip-ul " + e.target.innerText);
    });
});