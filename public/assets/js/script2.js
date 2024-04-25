"use strict";
!function(a) {
    var e = "offset"
      , o = "client"
      , t = function() {}
      , i = void 0 === a.addEventListener
      , c = {
        loopDelay: 50,
        maxLoop: 5,
        debug: !0,
        found: t,
        notfound: t,
        complete: t
    };
    function s() {
        var t = {};
        this.addUrl = function(e) {
            return t[e] = {
                url: e,
                state: "pending",
                format: null,
                data: null,
                result: null
            },
            t[e]
        }
        ,
        this.setResult = function(e, o, n) {
            var a = t[e];
            if ((a = null == a ? this.addUrl(e) : a).state = o,
            null != n) {
                if ("string" == typeof n)
                    try {
                        n = function(o) {
                            var n;
                            try {
                                n = JSON.parse(o)
                            } catch (e) {
                                try {
                                    n = new Function("return " + o)()
                                } catch (e) {
                                    g("Failed secondary JSON parse", !0)
                                }
                            }
                            return n
                        }(n),
                        a.format = "json"
                    } catch (e) {
                        a.format = "easylist"
                    }
                return a.data = n,
                a
            }
            a.result = null
        }
    }
    var l = []
      , r = null
      , d = {
        cssClass: "adsbygoogle pub_300x250 pub_300x250m pub_728x90 text-ad textAd text_ad text_ads text-ads text-ad-links"
    }
      , u = {
        nullProps: [e + "Parent"],
        zeroProps: []
    }
      , n = (u.zeroProps = [e + "Height", e + "Left", e + "Top", e + "Width", e + "Height", o + "Height", o + "Width"],
    {
        quick: null,
        remote: null
    })
      , h = null
      , p = {
        test: 0,
        download: 0
    };
    function f(e) {
        return "function" == typeof e
    }
    function g(e, o) {
        (c.debug || o) && a.console && a.console.log && (o ? console.error("[ABD] " + e) : console.log("[ABD] " + e))
    }
    function m(e) {
        g("start beginTest"),
        1 != h && (b(e),
        n.quick = "testing",
        p.test = setTimeout(function() {
            !function e(o, n) {
                var a;
                var t = document.body;
                var i = !1;
                null == r && (g("recast bait"),
                b(o || d));
                if ("string" == typeof o)
                    return g("invalid bait used", !0),
                    void (v() && setTimeout(function() {
                        0
                    }, 5));
                0 < p.test && (clearTimeout(p.test),
                p.test = 0);
                null !== t.getAttribute("abp") && (g("found adblock body attribute"),
                i = !0);
                for (a = 0; a < u.nullProps.length; a++) {
                    if (null == r[u.nullProps[a]]) {
                        4 < n && (i = !0),
                        g("found adblock null attr: " + u.nullProps[a]);
                        break
                    }
                    if (1 == i)
                        break
                }
                for (a = 0; a < u.zeroProps.length && 1 != i; a++)
                    0 == r[u.zeroProps[a]] && (4 < n && (i = !0),
                    g("found adblock zero attr: " + u.zeroProps[a]));
                void 0 === window.getComputedStyle || "none" != (t = window.getComputedStyle(r, null)).getPropertyValue("display") && "hidden" != t.getPropertyValue("visibility") || (4 < n && (i = !0),
                g("found adblock computedStyle indicator"));
                0;
                i || n++ >= c.maxLoop ? (g("exiting test loop - value: " + (h = i)),
                $(),
                v() && setTimeout(function() {
                    0
                }, 5)) : p.test = setTimeout(function() {
                    e(o, n)
                }, c.loopDelay)
            }(e, 1)
        }, 5))
    }
    function b(e) {
        var o, n = document.body, a = "width: 1px !important; height: 1px !important; position: absolute !important; left: -10000px !important; top: -1000px !important;";
        if (null == e || "string" == typeof e)
            g("invalid bait being cast");
        else {
            for (null != e.style && (a += e.style),
            r = function(e, o) {
                var n, a = o, t = document.createElement(e);
                if (a)
                    for (n in a)
                        a.hasOwnProperty(n) && t.setAttribute(n, a[n]);
                return t
            }("div", {
                class: e.cssClass,
                style: a
            }),
            g("adding bait node to DOM"),
            n.appendChild(r),
            o = 0; o < u.nullProps.length; o++)
                r[u.nullProps[o]];
            for (o = 0; o < u.zeroProps.length; o++)
                r[u.zeroProps[o]]
        }
    }
    function v() {
        if (null !== r) {
            try {
                f(r.remove) && r.remove(),
                document.body.removeChild(r)
            } catch (e) {}
            r = null
        }
        return !0
    }
    function $() {
        var e, o;
        if (null !== h)
            for (e = 0; e < l.length; e++) {
                o = l[e];
                try {
                    null != o && (f(o.complete) && o.complete(h),
                    h && f(o.found) ? o.found() : !1 === h && f(o.notfound) && o.notfound())
                } catch (e) {
                    g("Failure in notify listeners " + e.Message, !0)
                }
            }
    }
    function k() {
        var e, o = !1, n = function() {
            m(d)
        };
        (o = document.readyState && "complete" == document.readyState ? !0 : o) ? n() : (o = a,
        e = "load",
        n = n,
        i ? o.attachEvent("on" + e, n) : o.addEventListener(e, n, !1))
    }
    a.adblockDetector = {
        version: "1.0",
        init: function(e) {
            var o, n;
            if (e) {
                for (o in n = {
                    complete: t,
                    found: t,
                    notfound: t
                },
                e)
                    e.hasOwnProperty(o) && ("complete" == o || "found" == o || "notFound" == o ? n[o.toLowerCase()] = e[o] : c[o] = e[o]);
                l.push(n),
                new s,
                k()
            }
        }
    }
}(window);
var CompteControle, MesAnnonces, Detail, Inscription, ListeAnnonces, LivreOr, Recherches, Notifications, Profil, AntiAdblock = {
    updateLocalstorage: function(e) {
        var o;
        if (Global.localStorageCapable) {
            if (void 0 !== localStorage.getItem("donnons_aadb_lastads") && void 0 !== localStorage.getItem("donnons_aadb_ads") && (o = localStorage.getItem("donnons_aadb_lastads") != localStorage.getItem("donnons_aadb_ads")),
            void 0 !== localStorage.getItem("donnons_aadb_ads"))
                try {
                    localStorage.setItem("donnons_aadb_lastads", localStorage.getItem("donnons_aadb_ads"))
                } catch (e) {
                    localStorage.clear()
                }
            try {
                localStorage.setItem("donnons_aadb_ads", e ? "block" : "display")
            } catch (e) {
                localStorage.clear()
            }
            var n = new Date;
            if ((void 0 === localStorage.getItem("donnons_aadb_adsdate") ? 0 : localStorage.getItem("donnons_aadb_adsdate")) + 86400 < n.getTime() || o) {
                try {
                    localStorage.setItem("donnons_aadb_adsdate", n.getTime())
                } catch (e) {
                    localStorage.clear()
                }
                return AXO.post("/accueil/statsAP", {
                    ap: e
                }).exec(),
                !0
            }
        }
        return !1
    },
    ping: function() {
        var e = new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js",{
            method: "HEAD",
            mode: "no-cors"
        });
        fetch(e).then(function(e) {
            return e
        }).then(function(e) {
            AntiAdblock.updateLocalstorage(0)
        }).catch(function(e) {
            Utils.piwikEvent("AdBanner", "detect"),
            createBanner("adblock-info"),
            $(".adblock-info .title").html("Il semblerait que vous utilisiez un bloqueur de publicités."),
            $(".adblock-info .body").html('<div class="f-item pa-xl pt-none text-justify">Derrière donnons.org se cache une petite structure comprenant des informaticiens qui œuvrent en continu pour que le site fonctionne, n\'ait pas de beugues et réponde à vos attentes.<br />Sans la publicité, qui nous permet de vous offrir un espace d\'échanges 100% gratuit, le site, <strong>votre site</strong> ne pourrait pas vivre.</div><div class="f-item pa-xl pt-none text-justify"><strong>Et si vous désactiviez le bloqueur pour donnons.org ?</strong><br />Essayez pour vous rendre compte que nous utilisons de la publicité optimisée, qui s\'affiche rapidement et qui est non invasive ; ne se superposant pas sur le contenu de la page.</div><div class="f-item text-right "><a class="btn blue mb-xl mr-xl" href="/desactiver-bloqueur-pub" title="comment désactiver le bloqueur de publicités">Comment le désactiver pour notre site</a></div>'),
            AntiAdblock.updateLocalstorage(1)
        })
    }
}, createBanner = function(e) {
    var o, n;
    0 < $(".antiaddblock").length || (n = '<div id="' + (o = Utils.randomString(32)) + '" class="' + e + '"><h2 class="text-center mt-lg"><i class="fa fa-warning text-xl"></i><span class="text-strong-grey title"></span></h2><div class="f-container f-content-center"><button class="btn outline blue" id="reduce_anti_adblock">Reduire le bandeau d\'information</button></div><div class="pt-xl pl-sm pr-sm body"></div></div>',
    $(".main-bg").prepend(n),
    $("#" + o).css({
        position: "fixed",
        bottom: "0",
        left: "0",
        right: "0",
        "z-index": "10",
        backgroundColor: "rgba(240,245,245,1)",
        width: "100%",
        color: "",
        display: " block",
        "box-shadow": "0 0 2em #dddddd",
        "font-size": "0.9em"
    }),
    Utils.getCookie("noconsent") && ($("." + e + " .body").css({
        display: "none"
    }),
    $("#reduce_anti_adblock").css({
        display: "none"
    })),
    $(document).trigger("adbannerDisplayed"))
}, PWA = (AntiAdblock.consentCheck = function() {
    window.__tcfapi("addEventListener", 2, function(e) {
        var o;
        "tcloaded" !== e.eventStatus && "useractioncomplete" !== e.eventStatus || (!0 === e.purpose.consents[1] && Object.values(e.purpose.consents).every(Boolean) ? $(".antiaddblock").remove() : (createBanner("noconsent-info"),
        $(".noconsent-info .title").html("Vous n’aimez pas nos cookies ?"),
        $(".noconsent-info .body").html('<div class="f-item pa-xl pt-none text-justify">Vous avez refusé les cookies au travers de la bannière de consentement. Nous respectons votre choix mais… <br>Pas de cookies = aucune pub affichée et à moyen terme des difficultés pour Donnons.org <br>Vous ne le savez peut-être pas, mais derrière Donnons.org, ce sont :<ul><li>une dizaine de personnes qui œuvrent au quotidien pour maintenir et améliorer ce service gratuit.</li><li>d’importants frais de fonctionnement tels que la location des serveurs, frais d’hébergement du site,…</li></ul></div><div class="f-item f-item pa-xl pt-none text-right"><a role="button" tabindex="0" class="trigger-cmp text-lg text-weight-600 text-green" title="Je reconsidère mon choix sur les cookies… « Merci ! »">Je reconsidère mon choix sur les cookies… « Merci ! »</a>'),
        $(".trigger-cmp").off("click"),
        $(".trigger-cmp").on("click", function() {
            window.__tcfapi("displayConsentUi", 2, function() {})
        }),
        e = function() {
            try {
                localStorage.setItem("donnons_aadb_notconsented", (new Date).getTime())
            } catch (e) {
                localStorage.clear()
            }
        }
        ,
        Global.localStorageCapable && (void 0 !== localStorage.getItem("donnons_aadb_notconsented") && null !== localStorage.getItem("donnons_aadb_notconsented") ? (o = parseInt(localStorage.getItem("donnons_aadb_notconsented"), 10),
        6048e5 <= (new Date).getTime() - o && (window.__tcfapi("displayConsentUi", 2, function() {}),
        e())) : e())))
    })
}
,
$(function() {
    $(document).on("click", "#reduce_anti_adblock", function() {
        $(".adblock-info .body").slideUp(),
        $(".noconsent-info .body").slideUp(),
        $(this).slideUp(),
        Utils.setCookie("noconsent", 1, 1)
    }),
    $(document).on("click", ".adblock-info h2", function() {
        $(".adblock-info .body").slideDown(),
        $(".noconsent-info .body").slideDown(),
        $("#reduce_anti_adblock").slideDown()
    })
}),
{
    serviceWorker: "/service-worker.js",
    pushSubscriptionURL: "",
    deferredPrompt: null,
    init: function() {
        PWA.register(),
        PWA.addEvents(),
        PWA.isInStandaloneMode() && Utils.piwikEvent("Display", "standalone"),
        PWA.isIos() && PWA.isInStandaloneMode()
    },
    register: function() {
        return "serviceWorker"in navigator && !$globals.disable_sw && window.addEventListener("load", function() {
            navigator.serviceWorker.register(PWA.serviceWorker).then(e=>{
                "local" == $globals.env && console.log("Service worker registration succeeded:", e)
            }
            , e=>{
                "local" == $globals.env && console.log("Service worker registration failed:", e)
            }
            )
        }),
        !1
    },
    addEvents: function() {
        window.addEventListener("beforeinstallprompt", function(e) {
            e.preventDefault(),
            PWA.deferredPrompt = e;
            e = Utils.getCookie("a2hs-response");
            PWA.isInStandaloneMode() || e || !SHINE.mobile || setTimeout(function() {
                $("#a2hs-banner").css("display", "block"),
                $("#a2hs-banner").animate({
                    top: "70px"
                }, 1e3)
            }, 1e3)
        }),
        window.addEventListener("appinstalled", function(e) {
            Utils.piwikEvent("A2HS", "installed")
        }),
        $("#a2hs-accept").on("click", function() {
            $("#a2hs-banner").hide(),
            Utils.piwikEvent("A2HS", "Yes"),
            Utils.setCookie("a2hs-response", "yes", 365),
            PWA.onDeferredPrompt()
        }),
        $("#a2hs-decline").on("click", function() {
            $("#a2hs-banner").hide(),
            Utils.piwikEvent("A2HS", "No"),
            Utils.setCookie("a2hs-response", "no", 365)
        })
    },
    onDeferredPrompt: function() {
        PWA.deferredPrompt.prompt(),
        PWA.deferredPrompt.userChoice.then(function(e) {
            "accepted" === e.outcome ? Utils.piwikEvent("A2HS", "accepted") : Utils.piwikEvent("A2HS", "dismissed"),
            PWA.deferredPrompt = null
        })
    },
    isIos: function() {
        var e = window.navigator.userAgent.toLowerCase();
        return /iphone|ipad|ipod/.test(e)
    },
    isApple: function() {
        var e = window.navigator.userAgent.toLowerCase();
        return /iphone|ipad|ipod|os x/.test(e)
    },
    isInStandaloneMode: function() {
        return window.matchMedia("(display-mode: standalone)").matches || "standalone"in window.navigator && window.navigator.standalone
    },
    isTrustedWebActivity: function() {
        var e;
        return "true" === sessionStorage.getItem("isTWA") || 0 !== (e = document.referrer.trim()).length && "android-app:" === (e = new URL(e)).protocol && "com.sopheos.donnons" === e.hostname && (sessionStorage.setItem("isTWA", "true"),
        !0)
    },
    subscribeDevice: function() {
        console.log("subscribe"),
        navigator.serviceWorker.ready.then(function(e) {
            return Utils.piwikEvent("Push", "subscribe"),
            e.pushManager.subscribe({
                userVisibleOnly: !0
            })
        }).then(function(e) {
            Utils.piwikEvent("Push", "register"),
            fetch(PWA.pushSubscriptionURL, {
                method: "post",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json"
                },
                credentials: "same-origin",
                body: JSON.stringify(e)
            }).then(function(e) {
                return e.json()
            }).catch(function(e) {
                BugsnagClient.notify(e)
            })
        }).catch(function(e) {
            BugsnagClient.notify(e)
        })
    }
}), Global = {
    lastScrollTop: 0,
    lastDirection: 1,
    idPopup: null,
    signalementType: null,
    signalementClef: null,
    popupLoadingGeolocation: null,
    lastNotifCheck: null,
    notifInterval: null,
    notified: [],
    deferredPrompt: null,
    localStorageCapable: !0,
    gam_map_slot: null,
    nbMapAdsDisplay: 0,
    breadcrumbIsAnimated: !1,
    breadcrumbIsShown: !0,
    lastMapTokenTime: 0,
    goToLogin: !1,
    cbSignalement: function(e, t) {
        var o = $("#signalement-motif").val()
          , n = $("#signalement-email").val()
          , a = $("#modal_signalement_texte").val().toString().trim();
        61 == o && 0 == a.length ? ($(document).DialogBox("error", "Signalement", "Merci de préciser les raisons de votre signalement."),
        t()) : AXO.post("/signalement", {
            sign_email: n,
            signmotif_id: o,
            texte_libre: a,
            sign_clef: Global.signalementClef,
            sign_type: Global.signalementType
        }).onDefault(function(e, o, n, a) {}).onError(function(e, o, n, a) {
            $(document).DialogBox("error", "Erreur", AXO.displayErrors(n)),
            t()
        }).onSuccess(function(e, o, n, a) {
            o = void 0 !== o.html ? {
                content: o.html,
                title: "Signaler",
                buttons: [{
                    label: "Annuler",
                    style: "red"
                }, {
                    label: "Valider",
                    style: "green",
                    selfClose: !1,
                    callback: Global.cbSignalement
                }]
            } : {
                content: "<div>Votre signalement a bien été transmis à nos administrateurs</div>",
                title: "Signalement effectué",
                buttons: [{
                    label: "OK",
                    style: "green"
                }]
            },
            $(document).DialogBox("update", Global.idPopup, o),
            t()
        }).exec()
    },
    onSignaler: function(e, t) {
        Global.signalementType = $(this).data("sign-type"),
        Global.signalementClef = $(this).data("sign-clef");
        var o = AXO.post("/signalement", {
            sign_type: Global.signalementType,
            sign_clef: Global.signalementClef,
            first: !0
        }).onError(function(e, o, n, a) {
            $(document).DialogBox("close", a.dialogBox),
            $(document).DialogBox("error", "Erreur", AXO.displayErrors(n)),
            t()
        }).onSuccess(function(e, o, n, a) {
            Global.idPopup = a.dialogBox;
            a = {
                content: o.html,
                title: "Signalement à l'administration",
                buttons: [{
                    label: "Annuler",
                    style: "blue outline"
                }, {
                    label: "Valider mon signalement",
                    style: "green",
                    selfClose: !1,
                    callback: Global.cbSignalement
                }]
            };
            $(document).DialogBox("update", Global.idPopup, a)
        });
        $(document).DialogBox("create", {
            title: "Signalement à l'administration",
            request: o,
            buttons: []
        })
    },
    onChangementSig: function() {
        1 == $("#signalement-motif").val() || 10 == $("#signalement-motif").val() || 17 == $("#signalement-motif").val() ? $("#signalement-cgu").removeClass("display-none") : $("#signalement-cgu").hasClass("display-none") || $("#signalement-cgu").addClass("display-none")
    },
    onFlexText: function() {
        $(this).toggleClass("deploy")
    },
    onScroll: function() {
        var e = document.body.getBoundingClientRect().top - Global.lastScrollTop
          , o = (Global.lastScrollTop = document.body.getBoundingClientRect().top,
        $(document).height() - ($(window).height() + $(".footer").height()));
        $("progress").attr("max", o),
        $("progress").attr("value", $(window).scrollTop()),
        Global.breadcrumbIsAnimated || (Global.breadcrumbIsShown && e < 0 ? (Global.breadcrumbIsAnimated = !0,
        $(".breadcrumb-dummy").finish().slideDown(400, function() {}),
        $(".breadcrumb-b").finish().slideUp(400, function() {
            Global.breadcrumbIsAnimated = !1,
            Global.breadcrumbIsShown = !1
        })) : !Global.breadcrumbIsShown && 0 < e && (Global.breadcrumbIsAnimated = !0,
        $(".breadcrumb-dummy").finish().slideUp(400, function() {}),
        $(".breadcrumb-b").finish().slideDown(400, function() {
            Global.breadcrumbIsAnimated = !1,
            Global.breadcrumbIsShown = !0
        })))
    },
    onReload: function(e) {
        $(document).DialogBox("create", {
            title: "Chargement en cours, veuillez patienter..."
        }),
        e ? location.href = e : !1 !== e && window.location.reload()
    },
    onAcquitterSuggestion: function() {
        AXO.post("/compte/ajaxAcquitterSuggestions", {
            compte_id: $globals.compte_id
        }).onSuccess(function(e, o, n, a) {
            $("#compte_liste_suggestions").remove()
        }).exec()
    },
    onZoomImage: function() {
        $(this).zoomPhoto()
    },
    checkNotifs: function() {
        var e = Global.lastNotifCheck;
        Global.localStorageCapable && localStorage.getItem("donnons_lastNotifCheck") && (e = localStorage.getItem("donnons_lastNotifCheck")),
        AXO.post("/notification", {
            last: e
        }).onError(function(e, o, n, a) {
            clearInterval(Global.notifInterval)
        }).onSuccess(function(e, o, n, a) {
            if (Global.lastNotifCheck = o.lastCheck,
            Global.localStorageCapable)
                try {
                    localStorage.setItem("donnons_lastNotifCheck", o.lastCheck)
                } catch (e) {
                    localStorage.clear()
                }
            var t = o.nbNonLuByDonneur
              , i = o.nbNonLuByPreneur
              , c = o.nbNotifs;
            $(".global-shell").find(".notif-cpt").remove(),
            0 < i + t && $(".global-shell").append('<span class="notif-cpt">' + (99 < i + t + c ? "+99" : i + t + c) + "</span>"),
            $(".msgs-shell").find(".notif-cpt").remove(),
            0 < i + t && $(".msgs-shell").append('<span class="notif-cpt">' + (99 < i + t ? "+99" : i + t) + "</span>"),
            $(".msgs-preneur-shell").find(".notif-cpt").remove(),
            0 < i && $(".msgs-preneur-shell").append('<span class="notif-cpt">' + (99 < i ? "+99" : i) + "</span>"),
            $(".msgs-donneur-shell").find(".notif-cpt").remove(),
            0 < t && $(".msgs-donneur-shell").append('<span class="notif-cpt">' + (99 < t ? "+99" : t) + "</span>"),
            $(".notif-shell").find(".notif-cpt").remove(),
            0 < c && $(".notif-shell").append('<span class="notif-cpt">' + (99 < c ? "+99" : c) + "</span>"),
            $("#notifs-content").html(o.notifView)
        }).exec()
    },
    loadView: function(t, i, e) {
        AXO.post("/accueil/ajaxView", {
            view: i,
            params: JSON.stringify(e)
        }).onError(function(e, o, n, a) {}).onSuccess(function(e, o, n, a) {}).onDefault(function(e, o, n, a) {
            $(document).trigger("viewLoaded", {
                name: t,
                view: i,
                content: o
            })
        }).exec()
    },
    getVersion: function() {
        AXO.post("/rechercher/version", {}).exec()
    },
    consentManagement: function() {
        $("#consent-banner").is(":visible") && $("html, body").css("overflow", "hidden")
    },
    onConsentOk: function() {
        Utils.setCookie("consentManagement", 1, 365),
        Global.consentHide()
    },
    onConsentHalf: function() {
        (adsbygoogle = window.adsbygoogle || []).requestNonPersonalizedAds = 1,
        Utils.setCookie("consentManagement", -1, 365),
        Global.consentHide()
    },
    consentHide: function() {
        $("html, body").css("overflow", ""),
        $("#consent-banner").fadeOut(function() {
            $(this).remove()
        }),
        $("#consent-alpha").fadeOut(function() {
            $(this).remove()
        }),
        (adsbygoogle = window.adsbygoogle || []).pauseAdRequests = 0
    },
    onConsentShow: function() {
        AXO.post("/accueil/ajaxView", {
            view: "modal_cgu"
        }).onSuccess(function(e, o, n, a) {
            $(document).DialogBox("create", {
                content: o,
                title: "Conditions Générales d'Utilisation",
                buttons: [{
                    label: "J'ai lu",
                    style: "blue",
                    icon: !1
                }]
            })
        }).exec()
    },
    onSubmitRsLink: function() {
        $(this).on("click", function(e) {
            e.preventDefault()
        })
    },
    onPasswordSeeDown: function() {
        $("#" + $(this).data("target")).prop("type", "text")
    },
    onPasswordSeeUp: function() {
        $("#" + $(this).data("target")).prop("type", "password")
    },
    openSavedSearch: function() {
        $(document).trigger("ham-close"),
        $(document).DialogBox("create", {
            title: "Mes recherches enregistrées",
            request: AXO.get("/recherches/liste", {}).onSuccess(function(e, o, n, a) {
                var t = '<div class="f-container f-direction-column">';
                o && 0 !== o.length || (t += '<div class="saved-seach-block"><span class="label">Pas de recherche enregistrées</span></div>'),
                o.forEach(function(e) {
                    t += `<div class="saved-seach-block recherche-${e.hash}"><a class="saved-seach-link" href="${e.url}"><span class="label">${e.label}</span></a></div>`
                }),
                t += "</div>",
                $(document).DialogBox("update", a.dialogBox, {
                    content: t
                })
            }).onError(function() {
                $(document).DialogBox("error", "Erreur", "Une erreur est survenu lors du traitement de votre demande")
            })
        })
    },
    onHoverSavedSearch: function() {
        $(this).find(".base").stop().slideUp(),
        $(this).find(".complete").stop().slideDown()
    },
    onLeaveSavedSearch: function() {
        $(this).find(".base").stop().slideDown(),
        $(this).find(".complete").stop().slideUp()
    },
    openSearchHeader: function() {
        $("html, body").css("overflow", "hidden"),
        Search.modalMode && $("#main-appbar").slideUp(),
        $("#header-search-loc").fadeOut(150),
        $("#global-search").slideDown(400, function() {
            Search.modalMode || $("#global-search-close").show()
        }),
        $(".global-shadow").css("display", "block"),
        $(".global-shadow").animate({
            opacity: 1
        }, function() {
            Search.open = !0
        })
    },
    closeSearchHeader: function() {
        $("html, body").css("overflow", ""),
        $("#main-appbar").slideDown(),
        Search.modalMode || $("#global-search-close").hide(),
        $("#header-search-loc").fadeIn(150),
        $("#global-search").slideUp(),
        $(".global-shadow").animate({
            opacity: 0
        }, function() {
            $(this).css("display", "none"),
            Search.open = !1
        })
    }
}, isLocalStorage = ($(function() {
    $(window).on("load", function() {
        0 < $globals.events.length && (window.dataLayer = window.dataLayer || [],
        $globals.events.forEach(function(e) {
            window.dataLayer.push({
                event: e
            })
        }))
    });
    var e = window.location.hash;
    e && $(window).on("load", function() {
        setTimeout(function() {
            $(e).focusOnPage()
        }, 1e3)
    });
    try {
        for (var o = [], n = !1, a = 0; a < localStorage.length; a++)
            "donnons_" === localStorage.key(a).substring(0, 8) && "aadb_" !== localStorage.key(a).substring(8, 13) && o.push(localStorage.key(a)),
            Utils.inArray(localStorage.key(a), ["lastads", "adsdate", "notified", "lastNotifCheck"]) && (n = !0);
        for (a = 0; a < o.length; a++)
            localStorage.removeItem(o[a]);
        n && localStorage.clear()
    } catch (e) {
        Global.localStorageCapable = !1
    }
    $globals.version || Global.getVersion(),
    $globals.anti_adblock && !$globals.is_robot && AntiAdblock.ping(),
    void 0 !== $globals.lastNotifsCheck && (Global.lastNotifCheck = $globals.lastNotifsCheck,
    Global.notifInterval = setInterval(Global.checkNotifs, 3e4)),
    $("form").PreventDoubleSubmit(),
    $(".thumbnail-extends").on("click", Global.onZoomImage),
    $(".btn-signaler").on("click", Global.onSignaler),
    $(document).on("change", "#signalement-motif", Global.onChangementSig),
    $(document).on("mouseenter", ".link-btn", Global.onHoverSavedSearch),
    $(document).on("mouseleave", ".link-btn", Global.onLeaveSavedSearch),
    $("#mobile-geolocation").on("click", Global.onGeolocation),
    $(".rs-submit-link").on("click", Global.onSubmitRsLink),
    $(".password-see").on("mousedown touchstart", Global.onPasswordSeeDown),
    $(".password-see").on("mouseup touchend", Global.onPasswordSeeUp),
    $(".open-saved-search").on("click", Global.openSavedSearch),
    $("#close-mep-alert").on("click", function() {
        $(".alert-tmp").slideUp(),
        Utils.setCookie("mepAlertDismiss", "1", 30)
    }),
    (new Toggleable).init(),
    setInterval(function() {
        Global.lastMapTokenTime < Date.now() - 1e6 && (Global.lastMapTokenTime = Date.now(),
        AXO.post("/accueil/refreshMapToken", {}).onSuccess(function(e, o, n, a) {
            $globals.jwt_auth = o.token
        }).exec())
    }, 15e5),
    API.addOutsideTrigger(".donnons-header"),
    $("#header-search-loc").on("click", function() {
        Search.modalMode && Search.open ? Global.closeSearchHeader() : (Global.openSearchHeader(),
        Search.open || Search.getNbResults())
    }),
    $("#global-search-close").on("click", function() {
        Global.closeSearchHeader()
    }),
    $("#cta-empty").on("click", function(e) {
        e.stopPropagation(),
        Search.modalMode && Search.open ? Global.closeSearchHeader() : (Global.openSearchHeader(),
        Search.open || Search.getNbResults())
    }),
    $(".donnons-header").on("click-outside", function() {
        Global.closeSearchHeader()
    }),
    $("#close-search-header").on("click", function() {
        Global.closeSearchHeader()
    }),
    $("#dismiss-welcome").on("click", function() {
        $(".welcome").slideUp(),
        Utils.setCookie("welcomeDismiss", 1, 30)
    }),
    $(".history-back").on("click", function(e) {
        e.preventDefault(),
        1 < window.history.length && 0 <= document.referrer.indexOf(window.location.host) ? window.history.back() : window.location.href = "/"
    }),
    PWA.isApple() || PWA.isInStandaloneMode() || PWA.isTrustedWebActivity() || $(".page-bottom-advertise").css("visibility", "visible")
}),
null), Hamburger = (window.onscroll = Global.onScroll,
$(".flex-text").on("click", Global.onFlexText),
$("#header-login-btn").on("click", function() {
    Global.goToLogin = !0
}),
window.addEventListener("onbeforeunload", function(e) {
    Global.goToLogin && e.stopImmediatePropagation()
}, !0),
window.addEventListener("onunload", function(e) {
    Global.goToLogin && e.stopImmediatePropagation()
}, !0),
PWA.init(),
$("#page-compte-controle").length && (CompteControle = {
    onModifierEmail: function() {
        var e = $(this).parent().data("id");
        AXO.post("/compte-controle/ajaxAcquitterEmailErreur", {
            compte_id: e
        }).onSuccess(function(e, o, n, a) {
            location.href = "/compte/email"
        }).exec()
    },
    onAcquitterErreurEmail: function() {
        var e = $(this).parent().data("id");
        AXO.post("/compte-controle/ajaxAcquitterEmailErreur", {
            compte_id: e
        }).onSuccess(function(e, o, n, a) {
            location.href = "/compte"
        }).exec()
    },
    onCheckCgu: function() {
        var e;
        $(this).hasClass("pending") || ($(this).addClass("pending"),
        e = $(this).parent().data("id"),
        AXO.post("/compte-controle/ajaxCheckCgu", {
            compte_id: e
        }).onSuccess(function(e, o, n, a) {
            location.href = "/compte"
        }).exec())
    },
    onRefuseCgu: function() {
        var o = $(this).parent().data("id");
        $(document).DialogBox("create", {
            content: '<p class="ask">Souhaitez-vous réellement supprimer votre compte ?<br><small>Vous disposez de 15 jours pour changer d\'avis</small></p>',
            title: "Confirmer la suppression de votre compte",
            buttons: [{
                label: "Non, je garde mon compte",
                style: "green",
                icon: "check"
            }, {
                label: "Oui, je supprime mon compte",
                style: "red",
                icon: "close",
                callback: function(e, t) {
                    AXO.post("/compte-controle/ajaxRefuseCgu", {
                        compte_id: o
                    }).onSuccess(function(e, o, n, a) {
                        location.href = "/deconnexion",
                        t()
                    }).exec()
                }
            }]
        })
    }
},
$("#btn-modifier-email").on("click", CompteControle.onModifierEmail),
$("#btn-acquitter-email-erreur").on("click", CompteControle.onAcquitterErreurEmail),
$("#btn-check-cgu").on("click", CompteControle.onCheckCgu),
$("#btn-refuse-cgu").on("click", CompteControle.onRefuseCgu)),
($("#page-mes-annonces").length || $("#detail").length || $("#content-messagerie").length) && (MesAnnonces = {
    onRetirerAnnonce: function(e) {
        var c = null
          , c = "object" == typeof e ? $(this).data("annonce") : e;
        $(document).DialogBox("create", {
            content: '<p class="ask">Voulez-vous retirer cette annonce ?</p>',
            title: "Retirer cette annonce ?",
            buttons: [{
                label: "Continer la publication",
                style: "red outline",
                icon: "close"
            }, {
                label: "Retirer mon annonce",
                style: "green",
                icon: "check",
                callback: function(e, i) {
                    AXO.post("/mes-annonces/retirerAnnonce", {
                        annonce_id: c
                    }).onSuccess(function(e, o, n, a) {
                        var t;
                        1 != o ? (t = '<p class="ask">Voulez-vous déclarer un ou plusieurs bénéficiaires pour votre annonce ?</p>',
                        o.potentiels.forEach(function(e, o, n) {
                            t = (t = (t += '<div class="f-container f-align-center beneficiaire-handler beneficiaire-select' + (e.is_beneficiaire ? " active" : "") + (e.is_potentiel ? " active-potentiel" : "") + '" data-conv="' + e.conv_id + '"><span class="avatar small pa-sm">') + '    <img loading="lazy" decoding="async" src="' + e.avatar + '"></span><span class="f-grow-1 pa-sm">') + "    <strong>" + e.pseudo + '</strong></span><span class="pa-sm">    <i class="fa fa-thumbs-up"></i></span></div>'
                        }),
                        t = t + ('<div class="f-container f-align-center anonymous beneficiaire-select' + (o.anonymous ? " active" : "")) + '"><span class="avatar small pa-sm">    <span class="fa-stack fa-lg">        <i class="fa fa-user-circle fa-stack-1x"></i>        <i class="fa fa-ban fa-stack-2x"></i>    </span></span><span class="f-grow-1 pa-sm">    J\'ai un preneur en dehors du site</span><span class="pa-sm"></span></div><div class="f-container f-align-center no-beneficiaire beneficiaire-select"><span class="avatar small pa-sm">    <span class="fa-stack fa-lg">        <i class="fa fa-user-circle fa-stack-1x"></i>        <i class="fa fa-close fa-stack-2x"></i>    </span></span><span class="f-grow-1 pa-sm">    Je n\'ai pas trouvé de bénéficiaire</span><span class="pa-sm"></span></div>',
                        $(document).DialogBox("create", {
                            content: t,
                            title: "Sélectionnez vos bénéficiaires",
                            withCloseCross: !1,
                            buttons: [{
                                label: "J'ai terminé",
                                style: "green",
                                icon: "check",
                                callback: function(e, o) {
                                    var n = []
                                      , a = []
                                      , t = ($(".beneficiaire-handler").each(function() {
                                        ($(this).hasClass("active") && !$(".no-beneficiaire").hasClass("active") ? n : a).push($(this).data("conv"))
                                    }),
                                    $(".anonymous").hasClass("active") && !$(".no-beneficiaire").hasClass("active"))
                                      , t = {
                                        annonce_id: c,
                                        beneficiaires: n,
                                        non_beneficiaires: a,
                                        anonymous: t ? 1 : 0
                                    };
                                    AXO.post("/mes-annonces/setBeneficiaires", t).onSuccess(function() {
                                        0 < n.length ? $(document).DialogBox("create", {
                                            content: "Vous avez la possibilité d'évaluer les bénéficiaires de vos dons depuis les conversations",
                                            title: "Evaluation des bénéficiaires",
                                            buttons: [{
                                                label: "OK",
                                                style: "green",
                                                icon: "check",
                                                callback: function() {
                                                    Global.onReload()
                                                }
                                            }]
                                        }) : Global.onReload(),
                                        o()
                                    }).exec()
                                }
                            }]
                        })) : Global.onReload(),
                        i()
                    }).exec()
                }
            }]
        })
    },
    onPoursuivrePublication: function(e) {
        var o = null
          , o = "object" == typeof e ? $(this).data("annonce") : e;
        $(document).DialogBox("create", {
            content: '<p class="ask">Poursuivre la publication de votre annonce ?</p>',
            title: "Poursuivre la publication",
            buttons: [{
                label: "Non",
                style: "red",
                icon: "close"
            }, {
                label: "Oui",
                style: "green",
                icon: "check",
                callback: function() {
                    AXO.post("/mes-annonces/ajax-poursuivre-publication", {
                        annonce_id: o
                    }).onSuccess(function(e, o, n, a) {
                        Global.onReload()
                    }).exec()
                }
            }]
        })
    },
    onBeneficiaireSelect: function() {
        $(this).toggleClass("active"),
        $(".anonymous").removeClass("active"),
        $(".no-beneficiaire").removeClass("active")
    },
    onNoBeneficiaireSelect: function() {
        $(this).toggleClass("active"),
        $(".anonymous").removeClass("active"),
        $(".beneficiaire-handler").removeClass("active")
    },
    onAnonymousSelect: function() {
        $(this).toggleClass("active"),
        $(".beneficiaire-handler").removeClass("active"),
        $(".no-beneficiaire").removeClass("active")
    },
    onKeyUpRechercheTitre: function() {
        0 < $(this).val().toString().trim().length ? $(this).attr("name", "titre") : $(this).removeAttr("name")
    },
    onChangeRechercheEtat: function() {
        0 == $(this).val() ? $(this).removeAttr("name") : $(this).attr("name", "etat")
    },
    onReserver: function(e) {
        var o = null
          , o = "object" == typeof e ? $(this).data("annonce") : e;
        $(document).DialogBox("create", {
            content: '<p class="ask">Voulez-vous indiquer votre don comme "réservé" et ne plus recevoir de nouvelles sollicitations pour votre annonce ?</p>',
            title: "Ne plus recevoir de nouvelles sollicitations ?",
            buttons: [{
                label: "Non, ne pas réserver",
                style: "red outline",
                icon: "close"
            }, {
                label: "Oui, réserver",
                style: "green",
                icon: "check",
                callback: function() {
                    AXO.post("/mes-annonces/reserver", {
                        annonce_id: o
                    }).onSuccess(function(e, o, n, a) {
                        Global.onReload()
                    }).exec()
                }
            }]
        })
    },
    onPublier: function() {
        var e = $(this).data("annonce");
        $(document).DialogBox("create", {
            content: '<p class="ask">Souhaitez-vous réactiver votre don pour permettre de nouvelles sollicitations ?</p>',
            title: "Recevoir de nouvelles sollicitations ?",
            buttons: [{
                label: "Non, ne pas réactiver",
                style: "red outline",
                icon: "close"
            }, {
                label: "Réactiver mon annonce",
                style: "green",
                icon: "check",
                callback: function() {
                    AXO.post("/mes-annonces/publier", {
                        annonce_id: e
                    }).onSuccess(function(e, o, n, a) {
                        Global.onReload()
                    }).exec()
                }
            }]
        })
    },
    onRepublier: function() {
        var e = $(this).data("annonce");
        $(document).DialogBox("create", {
            content: '<p class="ask">Souhaitez-vous republier votre don ?</p>',
            title: "Republier votre don ?",
            buttons: [{
                label: "Non",
                style: "red",
                icon: "close"
            }, {
                label: "Oui",
                style: "green",
                icon: "check",
                callback: function() {
                    AXO.post("/mes-annonces/republier", {
                        annonce_id: e
                    }).onSuccess(function(e, o, n, a) {
                        o.redirect ? location.href = o.redirect : Global.onReload()
                    }).exec()
                }
            }]
        })
    },
    openAnnonce: function(e) {
        var o = $(".btn");
        (o = $(".bloc-action.desktop").is(":visible") ? o : $(".switch-menu")).is(e.target) || 0 !== o.has(e.target).length || (document.location.href = $(this).data("link"))
    }
},
$(".btn-reserver").on("click", MesAnnonces.onReserver),
$(".btn-publier").on("click", MesAnnonces.onPublier),
$(".btn-republier").on("click", MesAnnonces.onRepublier),
$(".btn-retire-annonce").on("click", MesAnnonces.onRetirerAnnonce),
$(".btn-poursuivre-publication").on("click", MesAnnonces.onPoursuivrePublication),
$(document).on("click", ".beneficiaire-handler", MesAnnonces.onBeneficiaireSelect),
$(document).on("click", ".anonymous", MesAnnonces.onAnonymousSelect),
$(document).on("click", ".no-beneficiaire", MesAnnonces.onNoBeneficiaireSelect),
$("#recherche_titre").on("keyup", MesAnnonces.onKeyUpRechercheTitre),
$("#recherche_etat").on("change", MesAnnonces.onChangeRechercheEtat),
$(".titre-annonce").on("click", MesAnnonces.openAnnonce),
$(".refus-motif").Tooltip({
    type: "ajax",
    request: "/mes-annonces/ajaxMotifRefus",
    datas: ["id"],
    position: "left"
}),
$(".show-beneficiaires").Tooltip({
    type: "ajax",
    request: "/mes-annonces/ajaxListeBeneficiaires",
    datas: ["annonce"],
    position: "left"
}),
$(".show-potentiels").Tooltip({
    type: "ajax",
    request: "/mes-annonces/ajaxListePotentiels",
    datas: ["annonce"],
    position: "left"
})),
$("#detail").length && (Detail = {
    map: null,
    disableNotation: !1,
    onDisplayRaisonsReputations: function(e) {
        $(".raisons_reputations_negatives").removeClass("display-none"),
        $("#reputation-plus-holder .fa").addClass("text-grey"),
        $("#reputation-minus-holder .fa").removeClass("text-grey")
    },
    onHideRaisonsReputations: function() {
        $(".raisons_reputations_negatives").addClass("display-none"),
        $("#reputation-plus-holder .fa").removeClass("text-grey"),
        $("#reputation-minus-holder .fa").addClass("text-grey"),
        $("#btn-preneur-noter-donneur").trigger("click"),
        $("#btn-donneur-noter-preneur").trigger("click")
    },
    onModifier: function() {
        var e = $(this).data("annonce");
        location.href = "/modifier/don/" + e
    },
    onRetirer: function() {
        MesAnnonces.onRetirerAnnonce($(this).data("annonce"))
    },
    onRepublier: function() {
        var e = $(this).data("annonce");
        $(document).DialogBox("create", {
            content: '<p class="ask">Souhaitez-vous réactiver votre don et permettre de nouvelles sollicitations ?</p>',
            title: "Réactivation d'une annonce ?",
            buttons: [{
                label: "Non",
                style: "red",
                icon: "close"
            }, {
                label: "Oui",
                style: "green",
                icon: "check",
                callback: function() {
                    AXO.post("/mes-annonces/republier", {
                        annonce_id: e
                    }).onSuccess(function(e, o, n, a) {
                        Global.onReload()
                    }).exec()
                }
            }]
        })
    },
    onPoursuivrePublication: function() {
        MesAnnonces.onPoursuivrePublication($(this).data("annonce"))
    },
    onAttribuerNotation: function() {
        if (!Detail.disableNotation) {
            Detail.disableNotation = !0;
            var e = $(this).data("conv")
              , o = $("input[name=reputation]:checked").val()
              , n = new Array;
            if (-1 == o) {
                var a = $('input[name="raison_reputation"]:checked');
                if (0 === a.length)
                    return void $(document).DialogBox("error", "Erreur", "Merci d'indiquer une raison");
                $.each(a, function() {
                    n.push($(this).val())
                })
            }
            AXO.post("/detail/ajax-attribuer-note", {
                conversation_id: e,
                valeur_note: o,
                raisons_id: n
            }).onSuccess(function(e, o, n, a) {
                Global.onReload()
            }).onDefault(function() {
                Detail.disableNotation = !1
            }).exec()
        }
    },
    onPlus: function() {
        $(this).closest(".conv-line").find(".icon-btn-labeled .label").slideToggle()
    },
    onVoirCarte: function() {
        var e = $(this).data("annonce");
        null === Detail.map && (Detail.map = new Geo),
        Detail.map.ready = !0,
        $(document).DialogBox("create", {
            request: AXO.post("/detail/ajaxVoirCarte", {
                id: e
            }).onError(function(e, o, n, a) {
                $(document).DialogBox("close", a.dialogBox),
                $(document).DialogBox("error", "Erreur", AXO.displayErrors(n))
            }).onSuccess(function(e, o, n, a) {
                var t = ""
                  , t = API.clientWidth < 960 ? "width:" + Detail.map.getMaxSize().width + "px;height:" + (Detail.map.getMaxSize().height + 40) + "px" : "width:" + Detail.map.getMaxSize().width + "px"
                  , t = ($(document).DialogBox("update", a.dialogBox, {
                    content: '<div class="map-holder" style="' + t + '"><div id="map-canvas-set"></div><div class="map_ad"></div></div>',
                    family: "fit"
                }),
                $(document).DialogBox("get", a.dialogBox).find(".content").css("overflow", "hidden"),
                new CartoDriver)
                  , i = $(document).DialogBox("get", a.dialogBox).find(".content").outerHeight();
                Detail.map.auth(!0),
                Detail.map.setEngine(t),
                Detail.map.setContainer("map-canvas-set"),
                Detail.map.setRadius(200),
                Detail.map.showMarkers(!1),
                Detail.map.traceZone(!0),
                Detail.map.coords(o.latitude, o.longitude),
                Detail.map.setZoom(14),
                Detail.map.pub($globals.adsMap),
                Detail.map.setMaxHeight(i),
                Detail.map.done(function() {
                    var e;
                    $(document).DialogBox("draw", a.dialogBox),
                    API.clientWidth < 960 && (e = Detail.map.getMaxSize().height - $(".map_ad").outerHeight() + 40,
                    Detail.map.container.height(e),
                    Detail.map.redraw())
                }),
                Detail.map.go()
            }),
            title: "Voir sur la carte",
            destroyCallback: function() {
                Detail.map.ready = !1
            }
        })
    },
    onVisuRecommandation: function() {
        var e = $(this).data("annonce");
        $(document).DialogBox("create", {
            request: AXO.post("/rechercher/ajaxPopupRecommandation", {
                annonce_id: e,
                contexte: "preneur"
            }).onError(function(e, o, n, a) {
                $(document).DialogBox("close", a.dialogBox),
                $(document).DialogBox("error", "Erreur", AXO.displayErrors(n))
            }).onSuccess(function(e, o, n, a) {
                a.dialogBox;
                o = {
                    content: o.html,
                    title: "Recommandations",
                    border: "#83a428",
                    family: "recommandations",
                    buttons: [{
                        label: "Fermer",
                        style: "red",
                        icon: "close"
                    }]
                };
                $(document).DialogBox("update", a.dialogBox, o)
            }),
            title: "Recommandations"
        })
    },
    shareOptions: function(e) {
        return {
            title: "Partager avec vos amis",
            withCloseCross: !0,
            buttons: e ? [{
                label: "Annuler",
                style: "blue outline"
            }, {
                label: "Partager",
                style: "blue",
                selfClose: !1,
                callback: Detail.sendShare
            }] : [{
                label: "Fermer",
                style: "blue"
            }]
        }
    },
    openShare: function() {
        var e = "/detail/ajaxPartager/" + $globals.annonce_id;
        AXO.post(e, {
            first: !0
        }).onSuccess(function(e, o, n, a) {
            var t = Detail.shareOptions(!0);
            t.content = o.content,
            $(document).DialogBox("create", t)
        }).exec()
    },
    sendShare: function(i) {
        var e = "/detail/ajaxPartager/" + $globals.annonce_id
          , o = {
            emails: $("#share_a").val(),
            message: $("#share_msg").val()
        };
        AXO.post(e, o).onSuccess(function(e, o, n, a) {
            var t = Detail.shareOptions(o.send);
            t.content = o.content,
            $(document).DialogBox("update", i, t)
        }).onError(function(e, o, n, a) {
            $(document).DialogBox("close", i),
            $(document).DialogBox("error", "Erreur", AXO.displayErrors(n))
        }).exec()
    },
    onAnnonceToggle: function() {
        $(".annonce-conv").slideToggle(),
        $(this).find(".fa").toggleClass("fa-chevron-down").toggleClass("fa-chevron-up")
    },
    initSwiper: function() {
        let e = !1;
        0 < $("#swiper-thumbs").length && (e = new Swiper("#swiper-thumbs",{
            freeMode: !0,
            watchSlidesProgress: !0,
            touchRatio: 1,
            spaceBetween: 10,
            slidesPerView: "auto",
            slideToClickedSlide: !0
        }));
        new Swiper("#swiper-photos",{
            lazyPreloadPrevNext: 0,
            watchSlidesProgress: !0,
            touchRatio: 1,
            spaceBetween: 10,
            thumbs: {
                swiper: e || null
            },
            navigation: {
                nextEl: ".swiper-thumbs-next",
                prevEl: ".swiper-thumbs-prev"
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: !0
            }
        })
    },
    displayCharte: function(e) {
        e.preventDefault(),
        e.stopPropagation(),
        Global.loadView("charte_preneur", "/mentions/modal_charte_preneur", [])
    },
    viewLoaded: function(e, o) {
        "charte_preneur" == o.name && $(document).DialogBox("create", {
            content: o.content,
            title: "La charte du preneur",
            withCloseCross: !0,
            buttons: [{
                label: "J'ai compris !",
                style: "green",
                icon: "check",
                callback: function(e, o) {
                    $("#chart").prop("checked", !0),
                    o()
                }
            }]
        })
    },
    onShareFacebook: function() {
        Utils.piwikEvent("Share", "Facebook")
    },
    onShareTwitter: function() {
        Utils.piwikEvent("Share", "Twitter")
    }
},
$(function() {
    $(document).on("click", "#reputation-minus", Detail.onDisplayRaisonsReputations),
    $(document).on("click", "#reputation-plus", Detail.onHideRaisonsReputations),
    $(document).on("click", "#display-charte-preneur", Detail.displayCharte),
    $(document).on("viewLoaded", Detail.viewLoaded),
    $("#btn-modifier").on("click", Detail.onModifier),
    $("#btn-retirer").on("click", Detail.onRetirer),
    $("#btn-republier").on("click", Detail.onRepublier),
    $("#btn-poursuivre-publication").on("click", Detail.onPoursuivrePublication),
    $("#btn-preneur-noter-donneur").on("click", Detail.onAttribuerNotation),
    $("#btn-donneur-noter-preneur").on("click", Detail.onAttribuerNotation),
    $(".btn-plus").on("click", Detail.onPlus),
    $(".btn-carte").on("click", Detail.onVoirCarte),
    $(".recommandation").on("click", Detail.onVisuRecommandation),
    $(".sharing").on("click", Detail.openShare),
    $(".annonce-toggle").on("click", Detail.onAnnonceToggle),
    $(".share-facebook").on("click", Detail.onShareFacebook),
    $(".share-twitter").on("click", Detail.onShareTwitter),
    $(".focus-contact").on("click", function() {
        setTimeout(function() {
            $("#form-holder #message").trigger("focus")
        }, 0)
    }),
    $(".btn-carte").Tooltip({
        type: "text",
        position: "left",
        content: "Voir sur la carte"
    }),
    Detail.initSwiper()
})),
{
    onToggle: function(e) {
        e.stopPropagation(),
        Hamburger.onClose(),
        $(this).addClass("active"),
        $("#" + $(this).data("target")).addClass("active");
        $("body").outerHeight(),
        $(window).height()
    },
    onClose: function() {
        $(".ham-right.active").removeClass("active").css("margin-top", 0).css("height", $("body").outerHeight()),
        $(".ham-left.active").removeClass("active").css("margin-top", 0).css("height", $("body").outerHeight()),
        $(".ham-toggle").removeClass("active"),
        $(".ham-toggle").blur()
    }
}), InternalNotification = (API.addOutsideTrigger(".ham-nav"),
$(".ham-toggle").on("click", Hamburger.onToggle),
$(".ham-close").on("click", function(e) {
    e.stopPropagation(),
    $(document).trigger("ham-close")
}),
$(document).on("swiperight", function() {
    $(document).trigger("ham-close")
}),
$(document).on("ham-close", Hamburger.onClose),
$(".ham-nav").on("click-outside", Hamburger.onClose),
$("#home").length && (new Swiper("#swiper-search",{
    navigation: {
        nextEl: ".swiper-search-next",
        prevEl: ".swiper-search-prev"
    },
    watchSlidesProgress: !0,
    touchRatio: 1,
    slidesPerView: "auto"
}),
new Swiper("#swiper-category",{
    navigation: {
        nextEl: ".swiper-category-next",
        prevEl: ".swiper-category-prev"
    },
    watchSlidesProgress: !0,
    touchRatio: 1,
    slidesPerView: "auto"
}),
$(".swiper-suggest").each(function() {
    var e = $(this);
    new Swiper(e.find(".swiper").get(0),{
        navigation: {
            nextEl: e.find(".swiper-suggest-next").get(0),
            prevEl: e.find(".swiper-suggest-prev").get(0)
        },
        watchSlidesProgress: !0,
        touchRatio: 1,
        slidesPerView: "auto"
    })
}),
$(".search-card .close").on("click", e=>{
    e.preventDefault()
}
)),
!$("#page-inscription").length && !0 !== $globals.ville_compte || (Inscription = {
    selectVille: null,
    popup: null,
    initSelectVille: function() {
        $("#ville").Select2({
            callback: AXO.post("/rechercher/ville", {}).save(),
            itemSelector: "ville-row",
            resetable: !1,
            fit: !0,
            searchInput: !0,
            template: Inscription.tplSelectVille
        });
        var e = parseInt($("#ville-target").val(), 10);
        0 < e && Inscription.changeSelectVille(e, !0)
    },
    tplSelectVille: function(e) {
        var n;
        0 == e.length ? $("#acr-ville").find(".acr-content").append('<em class="block pa-sm">Aucun résultat</em>') : (n = "",
        $.each(e, function(e, o) {
            n = (n = (n = n + ('<div class="acr-row ville-row" data-id="' + o.id + '" data-alias="' + o.alias) + '"><div class="flag-holder">') + '<img loading="lazy" decoding="async" src="/imgs/drapeaux/' + o.flag + '.png" /></div>') + '<div class="f-grow-1">' + o.lib,
            o.alt && (n += ', <em class="text-grey text-sm">' + o.alt + "</em>"),
            n += "</div></div>"
        }),
        $("#acr-ville").find(".acr-content").append(n))
    },
    changeSelectVille: function(e, o) {
        $("#ACR_selectVilleAnnonce").hide(),
        $("#ville-target").trigger("change")
    }
},
$(function() {
    $(".aide-faq a").on("click", function(e) {
        e.preventDefault(e),
        e.stopPropagation(e);
        var e = $(this).attr("href")
          , o = $(this).attr("title")
          , n = $(this).data("target");
        $.get(e, function(e) {
            e = $(e).find(n).wrap("<div>").parent().html();
            $(document).DialogBox("create", {
                content: e,
                title: o,
                withCloseCross: !0,
                buttons: [{
                    label: "Fermer",
                    style: "red",
                    icon: "close"
                }]
            }),
            setTimeout(function() {
                $(document).DialogBox("redrawAll")
            }, 500)
        })
    })
}),
$(function() {
    Inscription.initSelectVille(),
    $(document).on("click", ".ville-row", function(e) {
        e.preventDefault(e),
        Inscription.changeSelectVille($(this).data("id"))
    })
})),
$("#page-liste").length && (ListeAnnonces = {
    onRechercheSave: function(e) {
        $(e.currentTarget);
        let n = {};
        $(".input-add-recherche").each(function(e, o) {
            o = $(o);
            n[o.attr("name")] = o.val()
        });
        e = AXO.post("/recherches/ajouter", n).onError(function() {
            ListeAnnonces.onRechercheError()
        }).onSuccess(function(e, o, n, a) {
            var t;
            o.success ? ($(".has-recherches").removeClass("display-none"),
            $(".not-recherches").addClass("display-none"),
            $(".btn-add-recherche").addClass("display-none"),
            $(".added-recherche").removeClass("display-none"),
            $(".btn-del-recherche").removeClass("display-none").val(o.hash),
            t = null,
            o.nbNotifs >= o.maxNotifs ? t = $($("#tpl-add-recherche-notif-off").html()) : (t = $($("#tpl-add-recherche-notif-on").html())).find(".recherche-notif").val(o.hash).on("change", ListeAnnonces.onRechercheNotif),
            $(document).DialogBox("update", a.dialogBox, {
                title: "Recherche enregistrée",
                content: t
            })) : ListeAnnonces.onRechercheError(o.error || null)
        });
        $(document).DialogBox("create", {
            title: "Enregistrer ma recherche",
            request: e,
            buttons: [{
                label: "Fermer",
                style: "blue",
                callback: function(e, o) {
                    o()
                }
            }]
        })
    },
    onRechercheNotif: function(e) {
        e.preventDefault();
        let t = $(e.currentTarget);
        AXO.post("/recherches/notification", {
            hash: t.val(),
            name: t.attr("name"),
            value: t.is(":checked") ? 1 : 0
        }).onError(function(e, o, n, a) {
            ListeAnnonces.onRechercheError(null, t)
        }).onSuccess(function(e, o, n, a) {
            o.success || ListeAnnonces.onRechercheError(o.error || null, t)
        }).exec()
    },
    onRechercheDelete: function(e) {
        e.preventDefault();
        e = $(e.currentTarget);
        AXO.get("/recherches/supprimer/" + e.val(), {}).onError(function() {
            ListeAnnonces.onRechercheError()
        }).onSuccess(function(e, o, n, a) {
            o.success ? (0 === o.nbRecherches && ($(".has-recherches").addClass("display-none"),
            $(".not-recherches").removeClass("display-none")),
            $(".btn-add-recherche").removeClass("display-none"),
            $(".added-recherche").addClass("display-none"),
            $(".btn-del-recherche").addClass("display-none").val("")) : ListeAnnonces.onRechercheError(o.error || null)
        }).exec()
    },
    onRechercheError: function(e=null, o=null) {
        null !== o && o.prop("checked", !o.is(":checked")),
        null === e && (e = "Une erreur est survenu lors du traitement de votre demande"),
        $(document).DialogBox("error", "Erreur", e)
    }
},
$(".overlay-sollicitations").Tooltip({
    type: "text",
    position: "left",
    color: "blue",
    content: function(e, o) {
        o = $(o).data("nb");
        return "Il y a " + o + " personne" + (1 < o ? "s" : "") + " qui sollicite" + (1 < o ? "nt" : "") + " cette annonce"
    }
}),
$(".btn-add-recherche").on("click", ListeAnnonces.onRechercheSave),
$(".btn-del-recherche").on("click", ListeAnnonces.onRechercheDelete)),
$("#page-livreor").length && (LivreOr = {
    select_ville: null,
    initSelectVille: function() {
        $("#ville").Select2({
            callback: AXO.post("/rechercher/ville", {}).save(),
            itemSelector: "ville-row",
            resetable: !1,
            fit: !0,
            searchInput: !0,
            placeholder: "Votre ville",
            template: LivreOr.tplSelectVille
        });
        var e = parseInt($("#ville-target").val(), 10);
        0 < e && LivreOr.changeSelectVille(e, !0)
    },
    tplSelectVille: function(e) {
        var n;
        e ? (n = "",
        $.each(e, function(e, o) {
            n = (n = (n = n + ('<div class="acr-row ville-row" data-id="' + o.id + '" data-alias="' + o.alias) + '"><div class="flag-holder">') + '<img loading="lazy" decoding="async" src="/imgs/drapeaux/' + o.flag + '.png" /></div>') + '<div class="f-grow-1">' + o.lib,
            o.alt && (n += ', <em class="text-grey text-sm">' + o.alt + "</em>"),
            n += "</div></div>",
            o.poi && $.each(o.poi, function(e, o) {
                n = (n += '<div class="acr-row ville-row" data-id="' + o.id + '" data-alias="' + o.alias + '">') + '<div class="inline-block sub-row"><i class="fa fa-level-up fa-rotate-90"></i><span class="lib">' + o.lib + "</span></div></div>"
            })
        }),
        $("#acr-ville").find(".acr-content").append(n)) : $("#acr-ville").find(".acr-content").append('<em class="block pa-sm">Aucun résultat</em>')
    },
    changeSelectVille: function(e, o) {
        $("#ACR_selectVilleAnnonce").hide(),
        $("#ville-target").trigger("change")
    }
},
$(function() {
    LivreOr.initSelectVille(),
    $(document).on("click", ".ville-row", function(e) {
        e.preventDefault(e),
        LivreOr.changeSelectVille()
    })
})),
$("#page-recherches").length && (Recherches = {
    onNotifChange: function(e) {
        e.preventDefault();
        let t = $(e.currentTarget);
        AXO.post("/recherches/notification", {
            hash: t.val(),
            name: t.attr("name"),
            value: t.is(":checked") ? 1 : 0
        }).onError(function(e, o, n, a) {
            Recherches.onNotifError(t)
        }).onSuccess(function(e, o, n, a) {
            o.success ? ($(".nb-recherche").text(o.nbRecherches),
            $(".nb-notif").text(o.nbNotifs),
            (o.nbNotifs >= o.maxNotifs ? ($(".recherche-notif:not(:checked)").prop("disabled", !0),
            $(`.recherche-notif[value="${t.val()}"]`)) : $(".recherche-notif")).prop("disabled", !1)) : Recherches.onNotifError(t, o.error || null)
        }).exec()
    },
    onNotifError: function(e, o=null) {
        e.prop("checked", !e.is(":checked")),
        null === o && (o = "Une erreur est survenu lors du traitement de votre demande"),
        $(document).DialogBox("error", "Erreur", o)
    },
    onDelete: function(e) {
        e.preventDefault();
        let t = $(e.currentTarget);
        AXO.get("/recherches/supprimer/" + t.val(), {}).onError(function(e, o, n, a) {
            Recherches.onDeleteError()
        }).onSuccess(function(e, o, n, a) {
            o.success ? (0 === o.nbRecherches && ($(".has-recherches").addClass("display-none"),
            $(".not-recherches").removeClass("display-none")),
            $(".nb-recherche").text(o.nbRecherches),
            $(".nb-notif").text(o.nbNotifs),
            $(".recherche-" + t.val()).remove()) : Recherches.onDeleteError(o.error || null)
        }).exec()
    },
    onDeleteError: function(e=null) {
        null === e && (e = "Une erreur est survenu lors du traitement de votre demande"),
        $(document).DialogBox("error", "Erreur", e)
    }
},
$(".recherche-supprimer").on("click", Recherches.onDelete),
$(".recherche-notif").on("change", Recherches.onNotifChange)),
{
    onClear: function() {
        InternalNotification._acquitter($(this), !0)
    },
    onAcquitterToutesNotification: function(e) {
        e.preventDefault(),
        e.stopPropagation(),
        AXO.post("/notification/acquitterTout", {}).onError(function(e, o, n, a) {
            $(document).DialogBox("error", "Erreur", AXO.displayErrors(n))
        }).onSuccess(function(e, o, n, a) {
            $(".notif-holder").remove()
        }).track("Toutes notifications acquittées").exec()
    },
    onAcquitterNotification: function() {
        InternalNotification._acquitter($(this), !1)
    },
    _acquitter: function(c, s) {
        var e = ""
          , o = ""
          , e = 1 < c.data("nb") ? c.data(o = "type") : c.data(o = "id");
        1 == s && 1 == c.data("important") ? document.location.href = c.data("link") : AXO.post("/notification/acquitter", {
            id: e,
            type: o
        }).onError(function(e, o, n, a) {
            $(document).DialogBox("error", "Erreur", AXO.displayErrors(n))
        }).onSuccess(function(e, o, n, a) {
            var t, i;
            1 == s ? document.location.href = c.data("link") : (c.remove(),
            $('#nav-notifs .ham-content .notif[data-id="' + c.data("id") + '"]').remove(),
            t = $('button[data-target="nav-notifs"]').find("span.notif-cpt"),
            0 == $("#nav-notifs .ham-content .notif").length ? ($("#nav-notifs .ham-content").append('<span class="freindly-phrase"><i class="fa fa-repeat fa-3x"></i><br /><br />Rien à signaler pour l\'instant, revenez nous voir plus tard !</span>'),
            t.remove(),
            $(".notif-holder").remove()) : (i = parseInt(t.text()),
            t.text(i - 1)))
        }).track("Notification acquittée").exec()
    }
}), Recherche = ($(document).on("click", ".notif", InternalNotification.onClear),
$(document).on("click", ".btn-acquitter-notification", InternalNotification.onAcquitterNotification),
$(document).on("click", "#btn-acquitter-tout", InternalNotification.onAcquitterToutesNotification),
$("#notifications").length && (Notifications = {
    defaultPeriod: 0,
    choices: ["newsletters", "notif-compte", "notif-modo", "notif-benef", "notif-sollicitation", "notif-message"],
    onModifierNotifications: function() {
        var e = $(this).attr("name");
        e && $.inArray(e, this.types) && Notifications.applyChanges("/compte/ajaxModifierNotifications", e, $(this).val())
    },
    onChangeSollicitationPeriod: function() {
        Notifications.applyChanges("/abonnement/periode", "sollicitation", $(this).val()),
        Notifications.applyPhase("sollicitation-phase", $(this))
    },
    onChangeSollicitationPhase: function() {
        Notifications.applyChanges("/abonnement/phase", "sollicitation", $(this).val())
    },
    onChangeMessageDonneurPeriod: function() {
        Notifications.applyChanges("/abonnement/periode", "message-donneur", $(this).val()),
        Notifications.applyPhase("message-donneur-phase", $(this))
    },
    onChangeMessageDonneurPhase: function() {
        Notifications.applyChanges("/abonnement/phase", "message-donneur", $(this).val())
    },
    onChangeMessagePreneurPeriod: function() {
        Notifications.applyChanges("/abonnement/periode", "message-preneur", $(this).val()),
        Notifications.applyPhase("message-preneur-phase", $(this))
    },
    onChangeMessagePreneurPhase: function() {
        Notifications.applyChanges("/abonnement/phase", "message-preneur", $(this).val())
    },
    applyChanges: function(e, o, n) {
        AXO.post(e, {
            type: o,
            value: n
        }).onSuccess(function(e, o, n, a) {
            $(".fixed-success").animate({
                bottom: 0
            }, "fast", "swing", function() {
                setTimeout(function() {
                    $(".fixed-success").animate({
                        bottom: "-100px"
                    }, "slow", "swing", function() {})
                }, 2e3)
            })
        }).exec()
    },
    applyPhase: function(e, o) {
        if ($("#" + e).empty(),
        void 0 !== $globals.phases[o.val()]) {
            for (var n in $globals.phases[o.val()])
                $("#" + e).append('<option value="' + n + '">' + $globals.phases[o.val()][n] + "</option>");
            $("#" + e).show(),
            $("#" + e + "-link").show()
        } else
            $("#" + e).hide(),
            $("#" + e + "-link").hide()
    }
},
$('input[name="newsletters"]').on("change", Notifications.onModifierNotifications),
$('input[name="notif-compte"]').on("change", Notifications.onModifierNotifications),
$('input[name="notif-modo"]').on("change", Notifications.onModifierNotifications),
$('input[name="notif-benef"]').on("change", Notifications.onModifierNotifications),
$("#sollicitation-period").on("change", Notifications.onChangeSollicitationPeriod),
$("#sollicitation-phase").on("change", Notifications.onChangeSollicitationPhase),
$("#message-donneur-period").on("change", Notifications.onChangeMessageDonneurPeriod),
$("#message-donneur-phase").on("change", Notifications.onChangeMessageDonneurPhase),
$("#message-preneur-period").on("change", Notifications.onChangeMessagePreneurPeriod),
$("#message-preneur-phase").on("change", Notifications.onChangeMessagePreneurPhase)),
($("#page-profil").length || $("#content-messagerie").length) && (Profil = {
    disableAction: !1,
    onAjouterContact: function(e, o) {
        var n;
        $globals.not_connect ? Profil.popupConnexion() : (o = '<p class="ask">Vous souhaitez ajouter <strong>' + o + ' </strong>à votre carnet d\'adresse.<br />Pour votre suivi personnel, vous pouvez ajouter une note à ce contact (max. 255 caractères)</p><textarea class="input" id="note" rows="5" cols="100" maxlength="255"></textarea><label class="checkbox" for="suivre"><input type="checkbox" name="suivre" id="suivre" value="1"><i class="fa fa-square"></i> <span><i class="fa fa-envelope text-green-light"></i></span> Suivre les annonces de ' + o + "</label></p>",
        n = $(this),
        $(document).DialogBox("create", {
            content: o,
            title: "Ajouter un contact",
            buttons: [{
                label: "Annuler",
                style: "blue outline",
                icon: "close"
            }, {
                label: "Ajouter",
                style: "green",
                icon: "check",
                callback: function() {
                    Profil.disableAction || (Profil.disableAction = !0,
                    AXO.post("/carnet-adresse/ajouter", {
                        id: e,
                        note: $("#note").val(),
                        suivre: $("#suivre").is(":checked") ? 1 : 0,
                        conv_id: n.data("conv")
                    }).onSuccess(function(e, o, n, a) {
                        Global.onReload()
                    }).onDefault(function() {
                        Profil.disableAction = !1
                    }).exec())
                }
            }]
        }))
    },
    onSuivreContact: function(e, i) {
        AXO.post("/carnet-adresse/suivre", {
            id: e
        }).onSuccess(function(e, o, n, a) {
            var t = (t = '<div class="pa-md">') + ("Vous recevrez à présent des notifications pour les nouveaux dons de " + i + ".") + "</div>";
            $(document).DialogBox("create", {
                content: t,
                title: "Confirmation",
                buttons: [{
                    label: "Ok",
                    style: "green",
                    icon: "check",
                    callback: function() {
                        Global.onReload()
                    }
                }]
            })
        }).exec()
    },
    onPlusSuivreContact: function(e, i) {
        AXO.post("/carnet-adresse/plus-suivre", {
            id: e
        }).onSuccess(function(e, o, n, a) {
            var t = (t = '<div class="pa-md">') + ("Vous ne suivez plus les annonces de " + i) + "</div>";
            $(document).DialogBox("create", {
                content: t,
                title: "Confirmation",
                buttons: [{
                    label: "Ok",
                    style: "green",
                    icon: "check",
                    callback: function() {
                        Global.onReload()
                    }
                }]
            })
        }).exec()
    },
    onSupprimerContact: function(e) {
        AXO.post("/carnet-adresse/supprimer", {
            id: e
        }).onSuccess(function(e, o, n, a) {
            Global.onReload()
        }).onDefault(function(e, o, n, a) {
            301 === e && $(document).DialogBox("error", "Erreur", "Certaines informations de la page ne sont plus à jour !<br />La page doit être rechargée", !0)
        }).exec()
    },
    popupConnexion: function() {
        $(document).DialogBox("create", {
            content: '<div class="pa-md">Vous devez être connecté pour pouvoir suivre les annonces d\'un donneur.</div>',
            title: "Suivre les annonces d'un donneur",
            withCloseCross: !0,
            buttons: [{
                label: "Me connecter",
                style: "green",
                icon: "user",
                callback: function() {
                    location.href = $globals.url_connexion
                }
            }, {
                label: "M'inscrire",
                style: "green",
                icon: "pencil",
                callback: function() {
                    location.href = $globals.url + "/inscription"
                }
            }]
        })
    }
},
$(document).on("click", "#btn-suivre-compte", function() {
    var e = $(this).parent();
    Profil.onAjouterContact(e.data("id"), e.data("pseudo"))
})),
{
    is_displayed: !1,
    onDisplay: function(e) {
        e.stopPropagation(e),
        $("#quick-search-detail").slideDown(),
        Recherche.is_displayed = !0,
        Global.onScroll()
    },
    onClose: function(e) {
        e.stopPropagation(e),
        $("#quick-search-detail").slideUp(),
        Recherche.is_displayed = !1,
        Global.onScroll()
    },
    onToggle: function(e) {
        Recherche.is_displayed ? Recherche.onClose(e) : Recherche.onDisplay(e)
    }
}), Search = ($(function() {
    API.addOutsideTrigger(".toolsbar"),
    $("#quick-search-close").on("click", Recherche.onClose),
    $("#quick-search").on("click", Recherche.onToggle),
    $("#quick-search-toggle").on("click", Recherche.onToggle)
}),
{
    modalMode: !0,
    modal: null,
    open: !1,
    onGeolocationSuccess: function(e) {
        Utils.piwikEvent("Geolocalisation", "Succes"),
        AXO.post("/rechercher/villeFromCoords", {
            lat: e.coords.latitude,
            lon: e.coords.longitude
        }).onDefault(function(e, o, n, a) {
            $(".search-header-loc-geoloc").disable(!1),
            $(".search-header-loc-geoloc").find(".fa").addClass("fa-map-marker").removeClass("fa-spinner fa-pulse")
        }).onSuccess(function(e, o, n, a) {
            $("#search-header-loc-target").val(o.alias),
            $("#search-header-loc-input").data("location-label", o.label),
            $("#search-header-loc-input").data("location-distance", !0),
            $("#modal-search-loc-input").val(o.label),
            $(".search-header-distance").slideDown(),
            Search.locationDesc(),
            Search.getNbResults(),
            Search.modalMode && ($("#modal-search-loc-result").empty(),
            $(document).DialogBox("close", Search.modal),
            Global.openSearchHeader())
        }).exec()
    },
    onGeolocationError: function(e) {
        Utils.piwikEvent("Geolocalisation", "Echec");
        var o = "";
        switch (e.code) {
        case e.PERMISSION_DENIED:
            o = "Vous avez refusé la permission de vous géolocaliser.";
            break;
        case e.POSITION_UNAVAILABLE:
            o = "Votre position n'a pas pu être trouvée.";
            break;
        case e.TIMEOUT:
            o = "Le temps d'attente a été dépassé. Veuillez réessayer.";
            break;
        case e.UNKNOWN_ERROR:
            o = "Une erreur est survenue lors de la recherche de votre position. Veuille réessayer."
        }
        $(".search-header-loc-geoloc").disable(!1),
        $(".search-header-loc-geoloc").find(".fa").addClass("fa-map-marker").removeClass("fa-spinner fa-pulse"),
        $(document).DialogBox("error", "Erreur", o)
    },
    onGeolocation: function() {
        if (!navigator.geolocation)
            return $(document).DialogBox("error", "Erreur", "La géolocalisation n'est pas supportée par votre navigateur.");
        Utils.piwikEvent("Geolocalisation", "Demande"),
        $(".search-header-loc-geoloc").disable(!0),
        $(".search-header-loc-geoloc").find(".fa").removeClass("fa-map-marker").addClass("fa-spinner fa-pulse"),
        navigator.geolocation.getCurrentPosition(Search.onGeolocationSuccess, Search.onGeolocationError)
    },
    tplLoc: function(e) {
        var n;
        e ? (n = "",
        $.each(e, function(e, o) {
            n = (n = (n = n + ('<div class="acr-row search-header-loc-row ' + ("ville" === o.type ? "show-distance" : "hide-distance") + '" data-id="' + o.alias + '" data-label="' + o.lib) + '"><div class="flag-holder">') + '<img loading="lazy" decoding="async" src="/imgs/drapeaux/' + o.flag + '.png" /></div>') + '<div class="f-grow-1"><span class="result-accent">' + o.lib + "</span>",
            o.alt && (n += '<br><em class="text-grey text-sm">' + o.alt + "</em>"),
            n += "</div></div>",
            o.poi && $.each(o.poi, function(e, o) {
                n = (n += '<div class="acr-row search-header-loc-row show-distance" data-id="' + o.alias + '" data-label="' + o.lib + '">') + '<div class="inline-block sub-row"><i class="fa fa-level-up fa-rotate-90"></i><span class="lib">' + o.lib + "</span></div></div>"
            })
        }),
        $("#search-header-loc-results").empty().show(),
        $("#search-header-loc-results").append(n),
        $("#search-header-loc-dropdown").slideDown("fast")) : ($("#search-header-loc-results").empty().show(),
        $("#search-header-loc-results").append('<em class="block pa-sm">Aucun résultat</em>'))
    },
    tplModalLoc: function(e) {
        var n;
        e ? (n = "",
        $.each(e, function(e, o) {
            n = (n = (n = n + ('<div class="acr-row search-modal-loc-row ' + ("ville" === o.type ? "show-distance" : "hide-distance") + '" data-id="' + o.alias + '" data-label="' + o.lib) + '"><div class="flag-holder">') + '<img loading="lazy" decoding="async" src="/imgs/drapeaux/' + o.flag + '.png" /></div>') + '<div class="f-grow-1"><span class="result-accent">' + o.lib + "</span>",
            o.alt && (n += '<br><em class="text-grey text-sm">' + o.alt + "</em>"),
            n += "</div></div>",
            o.poi && $.each(o.poi, function(e, o) {
                n = (n += '<div class="acr-row search-modal-loc-row show-distance" data-id="' + o.alias + '" data-label="' + o.lib + '">') + '<div class="inline-block sub-row"><i class="fa fa-level-up fa-rotate-90"></i><span class="lib">' + o.lib + "</span></div></div>"
            })
        }),
        $("#modal-search-loc-result").empty().show(),
        $("#modal-search-loc-result").append(n)) : ($("#modal-search-loc-result").empty().show(),
        $("#modal-search-loc-result").append('<em class="block pa-sm">Aucun résultat</em>'))
    },
    tplModalCat: function(e) {
        var o = ""
          , o = (o = (o += '<div class="acr-row search-header-cat-row cat-row f-xs-100" data-id="' + e.cat_alias + '">') + ('<span class="cat-flex-basis"><span class="icon bg-cat cat-' + e.cat_id + '"><i class="fd"></i></span></span>')) + ("<span>" + e.cat_libelle + "</span>") + "</div>";
        $("#acr-search-header-cat").find(".acr-content").append(o)
    },
    seachByLocModal: function() {
        var e = (e = (e = "") + '<div class="modal-search" id="modal-search-loc">' + ('<input type="text" name="query" maxlength="50" placeholder="Votre localisation..." autocomplete="off" id="modal-search-loc-input" value="' + $("#search-header-loc-input").data("location-label") + '">')) + '<input type="hidden" id="modal-search-loc-target" value="">' + '</div><button class="search-header-loc-geoloc"><i class="fa fa-map-marker"></i> Autour de moi</button>';
        0 < $(".search-header-quick-loc").length && (e += '<button class="btn blue outline search-header-quick-loc" data-label="' + $(".search-header-quick-loc").data("label") + '" data-alias="' + $(".search-header-quick-loc").data("alias") + '" data-distance="' + $(".search-header-quick-loc").data("distance") + '">' + $(".search-header-quick-loc").text() + "</button>"),
        e += '<div id="modal-search-loc-result"></div>',
        $(document).DialogBox("create", {
            content: e,
            title: "Votre localisation",
            creationCallback: function(e) {
                Search.modal = e
            },
            destroyCallback: function() {
                Global.openSearchHeader()
            }
        }),
        $("#modal-search-loc").Select2({
            callback: AXO.post("/rechercher/localite", {}).save(),
            itemSelector: "search-modal-loc-row",
            itemCallback: Search.locSearch,
            resetable: !1,
            resetableLabel: "Rechercher partout",
            searchInput: !1,
            customInput: "#modal-search-loc-input",
            placeholder: "Ville, région, département, code postal",
            template: Search.tplModalLoc
        }),
        $("#modal-search-loc-input").trigger("focus")
    },
    locSearch: function(e, o) {
        return $("#search-header-loc-target").val(o.data("id")),
        $("#search-header-loc-input").data("location-label", o.data("label")),
        $("#search-header-loc-input").data("location-distance", o.hasClass("show-distance")),
        Search.locationDesc(),
        o.hasClass("show-distance") ? (Search.modalMode ? $(".search-header-distance-mobile") : $(".search-header-distance")).slideDown() : (Search.modalMode ? $(".search-header-distance-mobile") : $(".search-header-distance")).slideUp(),
        Search.getNbResults(),
        Search.modalMode && (e.stopPropagation(),
        $("#modal-search-loc-result").empty(),
        $(document).DialogBox("close", Search.modal),
        Global.openSearchHeader()),
        !0
    },
    catSearch: function() {
        Search.getNbResults()
    },
    locationDesc: function() {
        var e = $("#search-header-loc-input").data("location-label");
        $("#search-header-loc-input").data("location-distance") && (e += " à " + $(".search-header-distance-target").val() + "km"),
        $("#search-header-loc-input").val(e)
    },
    setModalMode: function() {
        960 < API.clientWidth ? Search.modalMode = !1 : Search.modalMode = !0
    },
    getNbResults: function(e) {
        $("#search-header-submit").attr("disabled", !1);
        var o = {
            q: $("#search-header-keywords").val(),
            cat: "0" !== $("#search-header-cat-target").val() ? $("#search-header-cat-target").val() : null,
            loc: $("#search-header-loc-target").val(),
            distance: $(".search-header-distance-target").val(),
            page: 1
        };
        o.q || o.cat && "0" !== o.cat || o.loc ? e || ($(".search-header-nb-results").html('(<i class="fa fa-spinner fa-pulse"></i>)'),
        AXO.post("/annonces/total", o).onSuccess(function(e, o, n, a) {
            void 0 === o.total ? $(".search-header-nb-results").text("") : 0 === o.total ? $(".search-header-nb-results").text("(Pas de don)") : $(".search-header-nb-results").text("(" + o.total + " don" + (1 < o.total ? "s" : "") + ")")
        }).onError(function() {}).exec()) : ($(".search-header-nb-results").text(""),
        $("#search-header-submit").attr("disabled", !0))
    }
});
$(function() {
    API.addOutsideTrigger("#search-header-loc"),
    Search.setModalMode(),
    $("#search-header-loc").Select2({
        callback: AXO.post("/rechercher/localite", {}).save(),
        itemSelector: "search-header-loc-row",
        itemCallback: Search.locSearch,
        resetable: !0,
        resetableLabel: "Rechercher partout",
        searchInput: !1,
        customInput: "#search-header-loc-input",
        placeholder: "Ville, région, département, code postal",
        template: Search.tplLoc,
        iconIdle: Search.modalMode ? "fa-chevron-right" : "fa-chevron-down",
        resetCallback: function(e) {
            $("#search-header-loc-target").val(""),
            $("#search-header-loc-input").val(""),
            $(".search-header-distance").slideUp(),
            $(".search-header-distance-mobile").slideUp(),
            $("#search-header-loc-input").data("location-label", ""),
            $("#search-header-loc-input").data("location-distance", !1),
            Search.getNbResults()
        }
    }),
    $("#search-header-cat").Select2({
        datas: $globals.categories,
        itemSelector: "search-header-cat-row",
        itemCallback: Search.catSearch,
        resetable: !0,
        resetableLabel: "Toutes les catégories",
        searchInput: !1,
        placeholder: "Sélectionnez une catégorie",
        template: Search.tplModalCat,
        iconIdle: Search.modalMode ? "fa-chevron-right" : "fa-chevron-down",
        defaultHead: Search.modalMode ? '<div class="search-category-modal-head"><span>Sélectionnez une catégorie</span><button id="search-category-close"><i class="fa fa-close"></i></button></div>' : ""
    }),
    $("#search-header-loc-input").on("focus", function(e) {
        Search.modalMode ? (e.stopPropagation(),
        Search.seachByLocModal()) : ($(this).val($(this).data("location-label")),
        $("#search-header-loc-dropdown").slideDown("fast"))
    }),
    $(document).on("click", "#search-category-close", function() {
        $("#search-header-cat").trigger("click-outside"),
        Global.openSearchHeader()
    }),
    $("#search-header-keywords").on("blur", function() {
        Search.getNbResults()
    }),
    $("#search-header-loc-input").on("blur", function() {
        Search.locationDesc()
    }),
    $("#search-header-loc").on("click-outside", function() {
        $("#search-header-loc-dropdown").slideUp("fast")
    }),
    $("#search-header-loc-submit").on("click", function() {
        Search.locationDesc(),
        $("#search-header-loc-dropdown").slideUp("fast")
    }),
    $(document).on("change", ".search-header-distance-range", function() {
        var e = $globals.distances[$(this).val()];
        $(".search-header-distance-target").val(e),
        $(".search-header-distance-label .dist").text(e + "km"),
        Search.locationDesc(),
        Search.getNbResults()
    }),
    $(document).on("click", ".search-header-loc-geoloc", Search.onGeolocation),
    $("#search-header-submit").on("click", function() {
        var e = "/"
          , o = (e = (e += $("#search-header-cat-target").val() && "0" !== $("#search-header-cat-target").val() ? $("#search-header-cat-target").val() : "annonces") + ("" !== $("#search-header-loc-target").val() ? "/" + $("#search-header-loc-target").val() : ""),
        []);
        "" !== $("#search-header-loc-target").val() && $("#search-header-loc-input").data("location-distance") && "" !== $(".search-header-distance-target").val() && o.push("distance=" + encodeURI($(".search-header-distance-target").val())),
        "" !== $("#search-header-keywords").val() && o.push("q=" + encodeURI($("#search-header-keywords").val())),
        (o = o.join("&")) && (e += "?" + o),
        $("#search-header-submit").find(".fa-search").removeClass("fa-search").addClass("fa-spinner fa-pulse"),
        document.location.href = e
    }),
    $("#search .avatar").Tooltip({
        type: "text",
        position: "left",
        color: "blue",
        content: function(e) {
            return $(e.element).data("tooltip")
        }
    }),
    $(".search-header-reset-keywords").on("click", function() {
        $("#search-header-keywords").val(""),
        $("#search-header-keywords").trigger("input"),
        Search.getNbResults()
    }),
    $("#search-header-keywords").on("keyup", function(e) {
        13 === (e.keyCode || e.which) ? $("#search-header-submit").trigger("click") : Search.getNbResults(!0)
    }),
    $("#search-header-keywords").on("input", function() {
        0 < $("#search-header-keywords").val().length ? $(".search-header-reset-keywords").removeClass("disabled") : $(".search-header-reset-keywords").addClass("disabled")
    }),
    $(document).on("click", ".search-header-quick-loc", function() {
        var e;
        $("#search-header-loc-input").val($(this).data("label")),
        $("#search-header-loc-target").val($(this).data("alias")),
        $("#search-header-loc-input").data("location-label", $(this).data("label")),
        $("#search-header-loc-input").data("location-distance", $(this).data("distance")),
        $("#modal-search-loc-input").val($(this).data("label")),
        $("#modal-search-loc-target").val($(this).data("alias")),
        "" !== $(this).data("distance") ? ((Search.modalMode ? $(".search-header-distance-mobile") : $(".search-header-distance")).slideDown(),
        e = $globals.distances.findIndex(e=>e == $(this).data("distance")),
        $(".search-header-distance-target").val($(this).data("distance")),
        $(".search-header-distance-range").val(e),
        $(".search-header-distance-label .dist").text($(this).data("distance") + "km")) : (Search.modalMode ? $(".search-header-distance-mobile") : $(".search-header-distance")).slideUp(),
        Search.locationDesc(),
        $(document).DialogBox("close", Search.modal),
        Search.getNbResults()
    }),
    $(window).on("resize", Search.setModalMode)
});
//# sourceMappingURL=app_min.1710248387.js.map