"use strict";
$(document).ready(function () {
    /* page load as iframe */
    if (self !== top) {
        $("body").addClass("iframe");
    } else {
        $("body").removeClass("iframe");
    }

    /* active link url */
    var url = window.location;
    $(".header .navbar-nav a")
        .removeClass("active")
        .parent()
        .removeClass("active")
        .closest(".nav-item")
        .removeClass("active");
    var element = $(".header .navbar-nav a")
        .filter(function () {
            return this.href == url;
            alert("url");
        })
        .addClass("active")
        .parent()
        .addClass("active")
        .closest(".nav-item")
        .addClass("active");
});

(function ($) {
    $.fn.visible = function (partial) {
        var $t = $(this),
            $w = $(window),
            viewTop = $w.scrollTop(),
            viewBottom = viewTop + $w.height(),
            _top = $t.offset().top,
            _bottom = _top + $t.height(),
            compareTop = partial === true ? _bottom : _top,
            compareBottom = partial === true ? _top : _bottom;

        return compareBottom <= viewBottom && compareTop >= viewTop;
    };
})(jQuery);

$(window).on("load", function () {
    setTimeout(function () {
        $(".pageloader").fadeOut("slow");
    }, 500);

    // setTimeout(function () {
    //     getSiparisStatus();
    // }, 1500);

    if (window.history && window.history.pushState) {
        $(window).on("popstate", function () {
            $("#allGroupsButton").trigger("mouseover");
            $("#allGroupsButton").trigger("click");
            $("#allGroupsButton").trigger("mouseover");
            // $('#allGroupsButton').trigger($.Event( "click", { originalEvent: true } ));
        });
    }

    // setInterval(getSiparisStatus, 15000);

    var countries = [];
    var country_ids = [];

    $.ajax({
        method: "POST",
        url: "/api/v1/product/all",
        data: null,
        success: function (result) {
            var myObj = JSON.parse(result);

            for (var i in myObj) {
                if (isNumeric(myObj[i])) country_ids.push(myObj[i]);
                else countries.push(myObj[i]);
            }

            // alert(countries);
            // alert(country_ids);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            if (textStatus == "Unauthorized") {
                alert("custom message. Error: " + errorThrown);
            } else {
                alert("custom message. Error: " + errorThrown);
            }
        },
    });

    if (document.getElementById("searchInput")) {
        autocomplete(
            document.getElementById("searchInput"),
            countries,
            country_ids
        );
    }

    /* header height and main container padding top fixed header */
    if ($(".header").hasClass("fixed-top") === true) {
        if (
            $(".main-container > div:first-child").hasClass("banner-hero") ===
            true
        ) {
            $(".main-container").css("padding-top", "0");
        } else {
            setTimeout(function () {
                $(".main-container").css(
                    "padding-top",
                    $(".header").outerHeight()
                );
            }, 500);
        }
    } else {
        if (
            $(".main-container > div:first-child").hasClass("banner-hero") ===
            true
        ) {
            $(".main-container").css("padding-top", "0");
        } else {
            $(".main-container").css("padding-top", "15px");
        }
    }

    /* header active on scroll more than 50 px*/
    if ($(".footer-tabs").length > 0) {
        $(".main-container").css({
            "padding-bottom": $(".footer-tabs").outerHeight(),
        });
        $(".footer").css({
            "padding-bottom": $(".footer-tabs").outerHeight() + 25,
        });
    } else {
        $(".footer").css({
            "padding-bottom": 15,
        });
    }

    /* header active on scroll more than 50 px*/
    if ($(this).scrollTop() >= 30) {
        $(".header").addClass("active");
        $(".footer-spaces").addClass("active");
    } else {
        $(".header").removeClass("active");
        $(".footer-spaces").removeClass("active");
    }

    /* sidemenu close */
    $(".main-container").on("click", function () {
        if ($(".header .navbar-collapse.collapse").hasClass("show") === true) {
            $(".header .navbar-collapse.collapse").removeClass("show");
        }
        if ($(".sidebar-right").hasClass("active") === true) {
            $(".sidebar-right").removeClass("active");
            $(".colorsettings").removeClass("active");
        }
        if ($(".search").hasClass("active") === true) {
            $(".search").slideUp().removeClass("active");
        }
        if ($("body").hasClass("sidemenu-open") === true) {
            $("body").removeClass("sidemenu-open");
        }
        if ($("body").hasClass("reveal-sidebar") === true) {
            $("body").removeClass("reveal-sidebar");
        }
    });
    $(".header, .footer").on("click", function () {
        if ($("body").hasClass("sidemenu-open") === true) {
            $("body").removeClass("sidemenu-open");
        }
        if ($("body").hasClass("reveal-sidebar") === true) {
            $("body").removeClass("reveal-sidebar");
        }
    });

    /* .search button click mobile device */
    $(".search-btn").on("click", function () {
        $(".search").slideDown().addClass("active");
    });

    /* Background */
    $(".background").each(function () {
        var imgpath = $(this).find("img");
        $(this).css("background-image", "url(" + imgpath.attr("src") + ")");
        imgpath.hide();
    });

    /* Iframes components preview resizing for devices. */
    $(".device-selection button.btn").on("click", function () {
        if ($(this).hasClass("active") !== true) {
            var parentcurrent = $(this)
                .parent()
                .find(".btn.active")
                .attr("data-class");
            var parentclass = $(this).attr("data-class");
            $(this).parent().find(".btn").removeClass("active");
            $(this)
                .addClass("active")
                .closest(".demo-view")
                .find(".iframeselements")
                .addClass(parentclass)
                .removeClass(parentcurrent);
        } else {
        }
    });

    /* nav small btn expand collapse and sidemenu open close */
    if ($(".header .navbar").hasClass("navbar-expand-all") === true) {
        $(".main-container").on("click", function () {
            $(".header .navbar .navbar-collapse").removeClass("show");
        });
    } else {
    }

    /* login row */
    $(".login-row").css("min-height", $(window).height() - 80);

    /* home page hover text demo */
    $(".hover-text span").on("mouseenter", function () {
        $(".demolive-wraper").slideDown();
        $(".close-demolive-wrapper").fadeIn();

        $(".fullscreen .demolive-wraper").on("mouseleave", function () {
            var thiswrap = $(this);
            if (thiswrap.closest(".fullscreen").hasClass("active") === true) {
                thiswrap.slideUp();
                thiswrap
                    .closest(".fullscreen")
                    .find(".close-demolive-wrapper")
                    .fadeOut();
            }
        });
    });

    $(".fullscreen.active, .close-demolive-wrapper").on("click", function () {
        $(".demolive-wraper").slideUp();
        $(".close-demolive-wrapper").fadeOut();
    });

    /* Fullscreen btn and area */
    $(".fullscreen-btn").on("click", function () {
        var fullscreenwrap = $(this).closest(".fullscreen");
        fullscreenwrap.toggleClass("active");
        $("body").toggleClass("overflow-hidden");
        if ($(".fullscreen").hasClass("active") !== true) {
            $(".demolive-wraper").slideDown();
        }
        if (
            !document.fullscreenElement && // alternative standard method
            !document.mozFullScreenElement &&
            !document.webkitFullscreenElement &&
            !document.msFullscreenElement
        ) {
            // current working methods
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(
                    Element.ALLOW_KEYBOARD_INPUT
                );
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }
    });

    /* scroll to top  button  */
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $(".scrollup").show();
            setTimeout(function () {
                $(".scrollup").addClass("active");
            }, 500);
        } else {
            $(".scrollup").hide();
            setTimeout(function () {
                $(".scrollup").removeClass("active");
            }, 500);
        }
    });

    $(".scrollup").click(function () {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            600
        );
        return false;
    });

    if (
        $(window).scrollTop() + $(window).height() >
        $(document).height() - 100
    ) {
        $(".scrollup").addClass("atbottom");
    } else {
        $(".scrollup").removeClass("atbottom");
    }

    /* sidebar right color scheme */
    $(".colorsettings").on("click", function () {
        $(this).toggleClass("active");
        $(".sidebar-right").toggleClass("active");
    });

    /* loading button load more */
    $(".loading-btn ").on("click", function () {
        var thisbtn = $(this);
        thisbtn.addClass("active");

        setTimeout(function () {
            thisbtn.removeClass("active").blur();
        }, 3000);
    });

    /* smooth scroll */
    $(document).on("click", ".smoothscroll", function (event) {
        event.preventDefault();

        $("html, body").animate(
            {
                scrollTop: $($.attr(this, "href")).offset().top,
            },
            750
        );
    });

    /* sidebar active menu open*/
    $(".menu-btn").on("click", function (e) {
        e.stopPropagation();
        if ($("body").hasClass("sidemenu-open") == true) {
            $("body").removeClass("sidemenu-open");

            if ($("body").hasClass("reveal-sidebar") === true) {
                $("body").removeClass("reveal-sidebar");
            }
        } else {
            $("body").addClass("sidemenu-open");
            if ($(".sidebar").hasClass("reveal-sidebar") === true) {
                $("body").addClass("reveal-sidebar");
            }
        }
    });
});

$(window).on("scroll", function () {
    /* header active on scroll more than 50 px*/
    if (
        $(this).scrollTop() >= 30 &&
        $(".header").hasClass("fixed-top") === true
    ) {
        $(".header").addClass("active");
        $(".footer-spaces").addClass("active");
    } else {
        $(".header").removeClass("active");
        $(".footer-spaces").removeClass("active");
    }

    /* scroll to top  button  hide when at bottom of page*/
    if (
        $(window).scrollTop() + $(window).height() >
        $(document).height() - 100
    ) {
        $(".scrollup").addClass("atbottom");
    } else {
        $(".scrollup").removeClass("atbottom");
    }
});

$(window).on("resize", function () {
    /* login row */
    $(".login-row").css("min-height", $(window).height() - 80);
});

function getSiparisStatus() {
    $.ajax({
        method: "POST",
        url: "/api/cart/status",
        data: null,
        success: function (result) {
            const xel = document.getElementById("statusloader");

            if (xel != null) {
                while (xel.firstChild) xel.removeChild(xel.firstChild);

                xel.innerHTML = result;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            if (textStatus == "Unauthorized") {
                alert("custom message. Error: " + errorThrown);
            } else {
                alert("custom message. Error: " + errorThrown);
            }
        },
    });
}

function autocomplete(inp, arr, arr2) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function (e) {
        var a,
            b,
            i,
            val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) {
            return false;
        }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            //if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            if (arr[i].toUpperCase().includes(val.toUpperCase())) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML =
                    "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                b.innerHTML += "<input type='hidden' value='" + arr2[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function (e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                    closeAllLists();

                    window.location.replace(
                        "/product/" +
                            this.getElementsByTagName("input")[1].value
                    );
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function (e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) {
            //up
            /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) {
                    x[currentFocus].click();
                }
            }
        }
    });
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = x.length - 1;
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}

let selected = null;

const filtercollapse = document.getElementById("filtercollapse");
const backButton = document.getElementById("backButton");

function btnGrupClick(el) {
    const isCustom = $("#search").attr("data-custom");
    var allGroupsButton = document.getElementById("allGroupsButton");
    const backButtonSpan = document.getElementById("backButtonSpan");
    const isBusy = $(backButtonSpan).attr("data-busy");

    if (isBusy) {
        return;
    }

    // allGroupsButton.setAttribute('class', 'category');

    $(el).addClass("active");

    const mainGroup = $(el).attr("data-group");

    $(backButton).removeClass("n-hidden");

    if (!mainGroup) {
        if (isCustom) {
            $("#filtercollapse > .omaclasse").addClass("n-hidden");
        } else {
            $("#subGroup > .omaclasse").addClass("n-hidden");
        }
        $(backButtonSpan).text("");

        document.getElementById("denemeke123").value = el.value;
        $(backButtonSpan).attr("data-busy", "true");
        $.ajax({
            method: "POST",
            url: "/api/v1/product/category/" + el.value,
            data: null,
            success: function (result) {
                //console.log(result);

                const xel = document.getElementById("groupFilterRow");
                while (xel.firstChild) xel.removeChild(xel.firstChild);

                xel.innerHTML = result;
                $(backButtonSpan).removeAttr("data-busy");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $(backButtonSpan).removeAttr("data-busy");
                if (textStatus == "Unauthorized") {
                    alert("custom message. Error: " + errorThrown);
                } else {
                    alert("custom message. Error: " + errorThrown);
                }
            },
        });
    } else {
        $(backButtonSpan).text(mainGroup);
        $("#filtercollapse > .omaclasse").addClass("n-hidden");
        $(backButtonSpan).attr("data-busy", "true");

        $.ajax({
            method: "POST",
            url: "/api/v1/product/subcategory/" + mainGroup,
            data: null,
            success: function (result) {
                //console.log(result);
                const xel = document.getElementById("subGroup");
                while (xel.firstChild) xel.removeChild(xel.firstChild);

                xel.innerHTML = result;
                $(backButtonSpan).attr("data-prev", mainGroup);
                $(backButtonSpan).removeAttr("data-busy");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                if (textStatus == "Unauthorized") {
                    alert("custom message. Error: " + errorThrown);
                } else {
                    alert("custom message. Error: " + errorThrown);
                }
                $(backButtonSpan).removeAttr("data-busy");
            },
        });
    }

    window.history.pushState("forward", null, "./#forward");
}

function btnGroupBack(el) {
    const isCustom = $("#search").attr("data-custom");
    const backButtonSpan = document.getElementById("backButtonSpan");
    const data = $(backButtonSpan).text();
    const isBusy = $(backButtonSpan).attr("data-busy");
    const prev = $(backButtonSpan).attr("data-prev");

    if (isBusy) {
        return;
    }

    if (data !== "") {
        $(backButton).addClass("n-hidden");
        $(".omaclasse").removeClass("n-hidden");

        const sub = document.getElementById("subGroup");
        while (sub.firstChild) sub.removeChild(sub.firstChild);

        const xel = document.getElementById("groupFilterRow");
        while (xel.firstChild) xel.removeChild(xel.firstChild);

        // el.setAttribute('class', 'btn mb-2 btn-default');
    } else {
        $(backButtonSpan).text(prev);
        if (isCustom) {
            $(backButton).addClass("n-hidden");
            $("#filtercollapse > .omaclasse").removeClass("n-hidden");
        } else {
            $("#subGroup > .omaclasse").removeClass("n-hidden");
        }

        const xel = document.getElementById("groupFilterRow");
        while (xel.firstChild) xel.removeChild(xel.firstChild);

        // el.setAttribute('class', 'btn mb-2 btn-default');
    }
}

function callWaiter(el) {
    var qrCode = document.getElementById("qrcode").value;

    $.ajax({
        method: "POST",
        url: "/api/v1/call/waiter/" + qrCode,
        data: null,
        success: function (result) {
            //console.log("okok");
            if (result == "ok") {
                $("#sepeteeklendi").slideDown(function () {
                    setTimeout(function () {
                        $("#sepeteeklendi").slideUp();
                    }, 1500);
                });
            } else {
                $("#sepeteeklendi2").slideDown(function () {
                    setTimeout(function () {
                        $("#sepeteeklendi2").slideUp();
                    }, 1500);
                });
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            if (textStatus == "Unauthorized") {
                alert("custom message. Error: " + errorThrown);
            } else {
                alert("custom message. Error: " + errorThrown);
            }
        },
    });
}

function addToCart(el) {
    var urunId = el.value;
    var count = document.getElementById("count").value;

    var extras = "NO EXTRA";
    var portionDefault = "Tek";

    if (document.getElementById("extraPicker") != null) {
        var extraText = document
            .getElementById("extraPicker")
            .parentElement.children[1].getAttribute("title");

        if (extraText != "Ekstra Özellik Seçenekleri") extras = extraText;
        else extras = "NO EXTRA";
    }

    if (document.getElementById("portionPicker") != null) {
        var portionText = document
            .getElementById("portionPicker")
            .parentElement.children[1].getAttribute("title");

        if (portionText != "Porsiyon Seçin") portionDefault = portionText;
        else portionDefault = "Tek";
    }

    $.ajax({
        method: "POST",
        url:
            "/api/cart/add/" +
            urunId +
            "/" +
            count +
            "/" +
            extras +
            "/" +
            portionDefault,
        data: null,
        success: function (result) {
            //console.log("okok");
            if (!result.includes("HATA")) {
                $("#sepeteeklendi").slideDown(function () {
                    setTimeout(function () {
                        $("#sepeteeklendi").slideUp();
                    }, 1500);
                });
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            if (textStatus == "Unauthorized") {
                alert("custom message. Error: " + errorThrown);
            } else {
                alert("custom message. Error: " + errorThrown);
            }
        },
    });
}

function deleteFromCart(el) {
    var icerikId = el.value;

    $.ajax({
        method: "POST",
        url: "/api/cart/delete/" + icerikId,
        data: null,
        success: function (result) {
            //console.log(result);
            if (!result.includes("HATA")) {
                $("#sepeteeklendi2").slideDown(function () {
                    setTimeout(function () {
                        $("#sepeteeklendi2").slideUp();
                        window.location.replace(
                            "https://canpide.com.tr/dashboard/main/cart"
                        );
                    }, 1500);
                });

                document.getElementById("cart_" + icerikId).remove();
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            if (textStatus == "Unauthorized") {
                alert("custom message. Error: " + errorThrown);
            } else {
                alert("custom message. Error: " + errorThrown);
            }
        },
    });
}

function onAddressChanged(el) {
    var selectedAddr = el.options[el.selectedIndex].text;

    if (selectedAddr != "Lütfen Adresinizi Seçiniz") {
        document.getElementById("addNewAddress").style.display = "none";
    } else {
        document.getElementById("addNewAddress").style.display = "block";
    }
}

function PortionChanged(el) {
    var selectedPortion = el.options[el.selectedIndex];

    if (selectedPortion.text != "Porsiyon Seçin") {
        var priceElement = document.getElementById("priceBig");
        priceElement.innerHTML =
            "₺ " + selectedPortion.value + "<sup>.00</sup>";
    } else {
        selectedPortion = el.options[1];
        var priceElement = document.getElementById("priceBig");
        priceElement.innerHTML =
            "₺ " + selectedPortion.value + "<sup>.00</sup>";
        //document.getElementById('addNewAddress').style.display = 'block';
    }
}

function isNumeric(value) {
    return /^\d+$/.test(value);
}
