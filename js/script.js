$(document).ready(function(){
    
    checkCookie();

    $("#colorToggle").click(function() {
        changeColors();
    });
    
    $(".loginModalToggle").click(function(){
        $("#loginModal").modal("toggle");
        $("#registerModal").modal("toggle");
    });
    
    $("#logoutButton").click(function(){
        $.ajax({
            url: 'validation.php',
            type: 'post',
            data: {logout: true},
            success: function(response){
                location.assign("index.php");
            }
        });
    });

    $("#registerUsername").keyup(function(){
        var registerUsername = $(this).val().trim();
        if(registerUsername != ''){
            $.ajax({
                url: 'validation.php',
                type: 'post',
                data: {registerUsername: registerUsername},
                success: function(response){
                    $("#registerUsernameCollapse").collapse("show");
                    $('#registerUsernameCollapse').html(response);
                }
            });
        }
        else{
            $("#registerUsernameCollapse").collapse("hide");
            $('#registerUsernameCollapse').html("");
        }
    });

    $("#registerEmail").keyup(function(){
        var registerEmail = $(this).val().trim();
        if(registerEmail != ''){
            $.ajax({
                url: 'validation.php',
                type: 'post',
                data: {registerEmail: registerEmail},
                success: function(response){
                    $("#registerEmailCollapse").collapse("show");
                    $('#registerEmailCollapse').html(response);
                }
            });
        }
        else{
            $("#registerEmailCollapse").collapse("hide");
            $('#registerEmailCollapse').html("");
        }
    });

    $("#loginSubmit").click(function(e){
        e.preventDefault();
        var loginUsername = $("#loginUsername").val().trim();
        var loginPassword = $("#loginPassword").val().trim();
        if(loginUsername != '' && loginPassword != ''){
            $.ajax({
                url: 'validation.php',
                type: 'post',
                data: {
                    loginUsername: loginUsername,
                    loginPassword: loginPassword
                },
                success: function(response){
                    if(response != ""){
                        $("#loginPasswordCollapse").collapse("show");
                        $('#loginPasswordCollapse').html(response);
                    }
                    else{
                        location.assign("index.php");
                    }
                }
            });
        }
        else{
            $("#loginPasswordCollapse").collapse("hide");
            $('#loginPasswordCollapse').html("");
        }
    });

    $("#registerSubmit").click(function(){
        var registerUsername = $("#registerUsername").val().trim();
        var registerEmail = $("#registerEmail").val().trim();
        var registerPassword = $("#registerPassword").val().trim();
        if(registerUsername != '' && registerEmail != '' && registerPassword != ''){
            $.ajax({
                url: 'validation.php',
                type: 'post',
                data: {
                    registerUsername: registerUsername,
                    registerEmail: registerEmail,
                    registerPassword: registerPassword,
                    registerSubmit: true
                },
                success: function(response){
                    $("#loginModal").modal("toggle");
                    $("#registerModal").modal("toggle");
                    $("#registerEmailCollapse").collapse("hide");
                    $('#registerEmailCollapse').html("");
                    $("#registerUsernameCollapse").collapse("hide");
                    $('#registerUsernameCollapse').html("");
                    $("#infoCollapse").collapse("show");
                    $("#infoCollapse").html(response);
                }
            });
            return false;
        }
    });

    $("#newsletterSubmit").click(function(){
        var newsletterNickname = $("#newsletterNickname").val().trim();
        var newsletterEmail = $("#newsletterEmail").val().trim();
        if(newsletterNickname != '' && newsletterEmail != ''){
            $.ajax({
                url: 'validation.php',
                type: 'post',
                data: {
                    newsletterNickname: newsletterNickname,
                    newsletterEmail: newsletterEmail
                },
                success: function(response){
                    $("#newsletterCollapse").collapse("show");
                    $("#newsletterCollapse").html(response);
                }
            });
            return false;
        }
    });

    $(".enable-modal").on("click", function(e) {
        $("#imagepreview").attr("src", $(e.target).attr('src'));
        $('#galleryModal').modal('show');
    });
});

function changeColors(){
    $(".navbar-color-management").toggleClass("bg-dark");
    $(".navbar-color-management").toggleClass("bg-light");
    $(".navbar-color-management").toggleClass("navbar-dark");
    $(".navbar-color-management").toggleClass("navbar-light");
    
    $(".number-color-management").toggleClass("text-dark");
    $(".number-color-management").toggleClass("text-light");

    $(".main-color-management").toggleClass("main-dark");
    $(".main-color-management").toggleClass("main-light");
    $(".main-v2-color-management").toggleClass("main-dark-v2");
    $(".main-v2-color-management").toggleClass("main-light-v2");

    $(".transparent-field-color-management").toggleClass("semi-transparent-field-dark");
    $(".transparent-field-color-management").toggleClass("semi-transparent-field-light");

    $(".card-color-management").toggleClass("card-dark");
    $(".card-color-management").toggleClass("card-light");

    $(".button-color-management").toggleClass("btn-dark");
    $(".button-color-management").toggleClass("btn-light");

    $(".footer-color-management").toggleClass("bg-dark");
    $(".footer-color-management").toggleClass("bg-light");
    $(".footer-color-management").toggleClass("footer-dark");
    $(".footer-color-management").toggleClass("footer-light");

    $(".scroll-color-management").toggleClass("scroll-dark");
    $(".scroll-color-management").toggleClass("scroll-light");

    $(".table-color-management").toggleClass("table-dark");
    $(".table-color-management").toggleClass("table-light");

    $(".modal-color-management").toggleClass("modal-dark");
    $(".modal-color-management").toggleClass("modal-light");

    $(".close-color-management").toggleClass("close-dark");
    $(".close-color-management").toggleClass("close-light");

    $("#logo").attr("src", function(i, text){
        return text === "img/logo-light.png" ? "img/logo-dark.png" : "img/logo-light.png";
    });

    $("#colorToggle").text(function(i, text){
        return text === "Jasny motyw" ? "Ciemny motyw" : "Jasny motyw";
    });

    console.log($("#colorToggle").text());
    if($("#colorToggle").text() == "Jasny motyw"){
        setCookie("theme", "Ciemny motyw", 365);
    }
    else if($("#colorToggle").text() == "Ciemny motyw"){
        setCookie("theme", "Jasny motyw", 365);
    }
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
  
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
  
function checkCookie() {
    var theme = getCookie("theme");
    if(theme == "Jasny motyw"){
        changeColors();
    }
}