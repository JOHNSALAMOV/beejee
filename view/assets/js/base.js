function goDownButton(){350<$(this).scrollTop()?$(".goTop.button").addClass("show"):$(".goTop.button").removeClass("show")}$(document).ready(function(){setTimeout(()=>{$("#loader").fadeToggle(250)},600)}),$('a[href="#"]').click(function(o){o.preventDefault()}),$(".goTop").click(function(o){o.preventDefault(),$("html, body").animate({scrollTop:0},"slow")}),goDownButton(),$(window).scroll(function(){goDownButton()}),$(".goBack").click(function(){window.history.go(-1)}),$(".adbox .closebutton").click(function(){$(this).parent(".adbox").addClass("hide")});var osDetection=navigator.userAgent||navigator.vendor||window.opera,windowsPhoneDetection=/windows phone/i.test(osDetection),androidDetection=/android/i.test(osDetection),iosDetection=/iPad|iPhone|iPod/.test(osDetection)&&!window.MSStream;function notification(o,t){var e="#"+o;$(".notification-box").removeClass("show"),setTimeout(()=>{$(e).addClass("show")},300),t&&(t+=300,setTimeout(()=>{$(".notification-box").removeClass("show")},t))}function toastbox(o,t){var e="#"+o;$(".toast-box").removeClass("show"),setTimeout(()=>{$(e).addClass("show")},100),t&&(t+=100,setTimeout(()=>{$(".toast-box").removeClass("show")},t))}function animatedHeader(){20<$(this).scrollTop()?$(".appHeader.scrolled").addClass("is-active"):$(".appHeader.scrolled").removeClass("is-active")}windowsPhoneDetection?($(".windowsphone-detection").addClass("is-active"),$(".mobile-detection").addClass("is-active")):androidDetection?($(".android-detection").addClass("is-active"),$(".mobile-detection").addClass("is-active")):iosDetection?($(".ios-detection").addClass("is-active"),$(".mobile-detection").addClass("is-active")):$(".non-mobile-detection").addClass("is-active"),$(".clear-input").click(function(){$(this).parent(".input-wrapper").find(".form-control").focus(),$(this).parent(".input-wrapper").find(".form-control").val(""),$(this).parent(".input-wrapper").removeClass("not-empty")}),$(".form-group .form-control").focus(function(){$(this).parent(".input-wrapper").addClass("active")}).blur(function(){$(this).parent(".input-wrapper").removeClass("active")}),$(".form-group .form-control").keyup(function(){0<$(this).val().length?$(this).parent(".input-wrapper").addClass("not-empty"):$(this).parent(".input-wrapper").removeClass("not-empty")}),$(".toggle-searchbox").click(function(){$("#search").hasClass("show")?$("#search").removeClass("show"):($("#search").addClass("show"),$("#search .form-control").focus())}),$("body").on("click",".stepper-up",function(){var o=$(this).parent(".stepper").children(".form-control");o.val(parseInt(o.val())+1)}),$("body").on("click",".stepper-down",function(){var o=$(this).parent(".stepper").children(".form-control");parseInt(o.val())<1||o.val(parseInt(o.val())-1)}),"/intro"==window.location.pathname&&$(".carousel-full").owlCarousel({loop:!0,margin:0,nav:!1,items:1,dots:!1}),$(".notification-box .close-button").click(function(o){o.preventDefault(),$(".notification-box.show").removeClass("show")}),$(".notification-box.tap-to-close .notification-dialog").click(function(){$(".notification-box.show").removeClass("show")}),$(".toast-box .close-button").click(function(o){o.preventDefault(),$(".toast-box.show").removeClass("show")}),$(".toast-box.tap-to-close").click(function(){$(this).removeClass("show")}),animatedHeader(),$(window).scroll(function(){animatedHeader()});var OnlineText="Подключение к интернету восстановлено",OfflineText="Интернет подключение отсутствует";function onlineModeToast(){$("body").append("<div id='online-toast' class='toast-box bg-success toast-top tap-to-close'><div class='in'><div class='text'>"+OnlineText+"</div></div></div>"),setTimeout(()=>{toastbox("online-toast",2500)},500)}function offlineModeToast(){$("body").append("<div id='offline-toast' class='toast-box bg-danger toast-top tap-to-close'><div class='in'><div class='text'>"+OfflineText+"</div></div></div>"),setTimeout(()=>{toastbox("offline-toast")},500)}function onlineMode(){$("#offline-toast").hasClass("show")&&$("#offline-toast").removeClass("show"),0<$("#online-toast").length?($("#online-toast").addClass("show"),setTimeout(()=>{$("#online-toast").removeClass("show")},3e3)):onlineModeToast(),$(".toast-box.tap-to-close").click(function(){$(this).removeClass("show")})}function offlineMode(){$("#online-toast").hasClass("show")&&$("#online-toast").removeClass("show"),0<$("#offline-toast").length?$("#offline-toast").addClass("show"):offlineModeToast(),$(".toast-box.tap-to-close").click(function(){$(this).removeClass("show")})}function AddtoHome(o,t){t?"1"===(t=localStorage.getItem("RohRavAddHS"))||1===t||(localStorage.setItem("RohRavAddHS",1),window.addEventListener("load",()=>{navigator.standalone||matchMedia("(display-mode: standalone)").matches||(androidDetection&&setTimeout(()=>{$("#android-add-to-home-screen").modal()},o),iosDetection&&setTimeout(()=>{$("#ios-add-to-home-screen").modal()},o))})):window.addEventListener("load",()=>{navigator.standalone||matchMedia("(display-mode: standalone)").matches||(androidDetection&&setTimeout(()=>{$("#android-add-to-home-screen").modal()},o),iosDetection&&setTimeout(()=>{$("#ios-add-to-home-screen").modal()},o))})}window.addEventListener("online",onlineMode),window.addEventListener("offline",offlineMode),$('.custom-file-upload input[type="file"]').each(function(){var e=$(this),a=e.next("label"),i=a.find("span"),s=i.text();e.on("change",function(o){var t=e.val().split("\\").pop(),o=URL.createObjectURL(o.target.files[0]);t?(a.addClass("file-uploaded").css("background-image","url("+o+")"),i.text(t)):(a.removeClass("file-uploaded"),i.text(s))})}),$(".multi-level > a.item").click(function(){$(this).parent(".multi-level").hasClass("active")?($(this).next("ul").slideToggle(250),$(this).parent(".multi-level").removeClass("active")):($(this).parent(".multi-level").parent("ul").children("li").children("ul").slideUp(250),$(this).next("ul").slideToggle(250),$(this).parent(".multi-level").parent("ul").children(".multi-level").removeClass("active"),$(this).parent(".multi-level").addClass("active"))});var checkDarkModeStatus=localStorage.getItem("MobilekitDarkModeActive");1===checkDarkModeStatus||"1"===checkDarkModeStatus?($(".dark-mode-switch").attr("checked",!0),$("body").hasClass("dark-mode-active")||$("body").addClass("dark-mode-active")):$(".dark-mode-switch").attr("checked",!1),$(".dark-mode-switch").change(function(){$(".dark-mode-switch").trigger(".dark-mode-switch");var o=localStorage.getItem("MobilekitDarkModeActive");1===o||"1"===o?($("body").hasClass("dark-mode-active")&&$("body").removeClass("dark-mode-active"),localStorage.setItem("MobilekitDarkModeActive","0"),$(".dark-mode-switch").attr("checked",!1)):($("body").addClass("dark-mode-active"),$(".dark-mode-switch").attr("checked",!0),localStorage.setItem("MobilekitDarkModeActive","1"))});var dmswitch=$(".dark-mode-switch");dmswitch.on("change",function(){dmswitch.prop("checked",this.checked)});setTimeout(function(){ $('#alert-block').hide(); }, 3000);
