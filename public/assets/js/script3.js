!function n(o, i, a) {
    function c(t, e) {
        if (!i[t]) {
            if (!o[t]) {
                var r = "function" == typeof require && require;
                if (!e && r)
                    return r(t, !0);
                if (s)
                    return s(t, !0);
                throw (e = new Error("Cannot find module '" + t + "'")).code = "MODULE_NOT_FOUND",
                e
            }
            r = i[t] = {
                exports: {}
            },
            o[t][0].call(r.exports, function(e) {
                return c(o[t][1][e] || e)
            }, r, r.exports, n, o, i, a)
        }
        return i[t].exports
    }
    for (var s = "function" == typeof require && require, e = 0; e < a.length; e++)
        c(a[e]);
    return c
}({
    1: [function(e, t, r) {
        "use strict";
        var n, o, t = t.exports = {};
        function i() {
            throw new Error("setTimeout has not been defined")
        }
        function a() {
            throw new Error("clearTimeout has not been defined")
        }
        try {
            n = "function" == typeof setTimeout ? setTimeout : i
        } catch (e) {
            n = i
        }
        try {
            o = "function" == typeof clearTimeout ? clearTimeout : a
        } catch (e) {
            o = a
        }
        function c(t) {
            if (n === setTimeout)
                return setTimeout(t, 0);
            if ((n === i || !n) && setTimeout)
                return (n = setTimeout)(t, 0);
            try {
                return n(t, 0)
            } catch (e) {
                try {
                    return n.call(null, t, 0)
                } catch (e) {
                    return n.call(this, t, 0)
                }
            }
        }
        var s, u = [], f = !1, l = -1;
        function p() {
            f && s && (f = !1,
            s.length ? u = s.concat(u) : l = -1,
            u.length) && h()
        }
        function h() {
            if (!f) {
                for (var e = c(p), t = (f = !0,
                u.length); t; ) {
                    for (s = u,
                    u = []; ++l < t; )
                        s && s[l].run();
                    l = -1,
                    t = u.length
                }
                s = null,
                f = !1,
                !function(t) {
                    if (o === clearTimeout)
                        return clearTimeout(t);
                    if ((o === a || !o) && clearTimeout)
                        return (o = clearTimeout)(t);
                    try {
                        o(t)
                    } catch (e) {
                        try {
                            return o.call(null, t)
                        } catch (e) {
                            return o.call(this, t)
                        }
                    }
                }(e)
            }
        }
        function d(e, t) {
            this.fun = e,
            this.array = t
        }
        function v() {}
        t.nextTick = function(e) {
            var t = new Array(arguments.length - 1);
            if (1 < arguments.length)
                for (var r = 1; r < arguments.length; r++)
                    t[r - 1] = arguments[r];
            u.push(new d(e,t)),
            1 !== u.length || f || c(h)
        }
        ,
        d.prototype.run = function() {
            this.fun.apply(null, this.array)
        }
        ,
        t.title = "browser",
        t.browser = !0,
        t.env = {},
        t.argv = [],
        t.version = "",
        t.versions = {},
        t.on = v,
        t.addListener = v,
        t.once = v,
        t.off = v,
        t.removeListener = v,
        t.removeAllListeners = v,
        t.emit = v,
        t.prependListener = v,
        t.prependOnceListener = v,
        t.listeners = function(e) {
            return []
        }
        ,
        t.binding = function(e) {
            throw new Error("process.binding is not supported")
        }
        ,
        t.cwd = function() {
            return "/"
        }
        ,
        t.chdir = function(e) {
            throw new Error("process.chdir is not supported")
        }
        ,
        t.umask = function() {
            return 0
        }
    }
    , {}],
    2: [function(e, M, t) {
        "use strict";
        Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        Object.defineProperty(t, "FirebaseError", {
            enumerable: !0,
            get: function() {
                return u.FirebaseError
            }
        }),
        t._DEFAULT_ENTRY_NAME = t.SDK_VERSION = void 0,
        t._addComponent = w,
        t._addOrOverwriteComponent = function(e, t) {
            e.container.addOrOverwriteComponent(t)
        }
        ,
        t._apps = void 0,
        t._clearComponents = function() {
            m.clear()
        }
        ,
        t._components = void 0,
        t._getProvider = _,
        t._registerComponent = x,
        t._removeServiceInstance = function(e, t) {
            var r = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : g;
            _(e, t).clearInstance(r)
        }
        ,
        t.deleteApp = function(e) {
            return L.apply(this, arguments)
        }
        ,
        t.getApp = function() {
            var e = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : g
              , t = b.get(e);
            if (!t && e === g)
                return O();
            if (t)
                return t;
            throw E.create("no-app", {
                appName: e
            })
        }
        ,
        t.getApps = function() {
            return Array.from(b.values())
        }
        ,
        t.initializeApp = O,
        t.onLog = function(e, t) {
            if (null !== e && "function" != typeof e)
                throw E.create("invalid-log-argument");
            (0,
            r.setUserLogHandler)(e, t)
        }
        ,
        t.registerVersion = j,
        t.setLogLevel = function(e) {
            (0,
            r.setLogLevel)(e)
        }
        ;
        var s = e("@firebase/component")
          , r = e("@firebase/logger")
          , u = e("@firebase/util")
          , B = e("idb");
        function i(e) {
            return function(e) {
                if (Array.isArray(e))
                    return n(e)
            }(e) || function(e) {
                if ("undefined" != typeof Symbol && null != e[Symbol.iterator] || null != e["@@iterator"])
                    return Array.from(e)
            }(e) || c(e) || function() {
                throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
            }()
        }
        function k() {
            k = function() {
                return a
            }
            ;
            var a = {}
              , e = Object.prototype
              , s = e.hasOwnProperty
              , u = Object.defineProperty || function(e, t, r) {
                e[t] = r.value
            }
              , t = "function" == typeof Symbol ? Symbol : {}
              , n = t.iterator || "@@iterator"
              , r = t.asyncIterator || "@@asyncIterator"
              , o = t.toStringTag || "@@toStringTag";
            function i(e, t, r) {
                return Object.defineProperty(e, t, {
                    value: r,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }),
                e[t]
            }
            try {
                i({}, "")
            } catch (e) {
                i = function(e, t, r) {
                    return e[t] = r
                }
            }
            function c(e, t, r, n) {
                var o, i, a, c, t = t && t.prototype instanceof p ? t : p, t = Object.create(t.prototype), n = new x(n || []);
                return u(t, "_invoke", {
                    value: (o = e,
                    i = r,
                    a = n,
                    c = "suspendedStart",
                    function(e, t) {
                        if ("executing" === c)
                            throw new Error("Generator is already running");
                        if ("completed" === c) {
                            if ("throw" === e)
                                throw t;
                            return E()
                        }
                        for (a.method = e,
                        a.arg = t; ; ) {
                            var r = a.delegate;
                            if (r) {
                                r = function e(t, r) {
                                    var n = r.method
                                      , o = t.iterator[n];
                                    if (void 0 === o)
                                        return r.delegate = null,
                                        "throw" === n && t.iterator.return && (r.method = "return",
                                        r.arg = void 0,
                                        e(t, r),
                                        "throw" === r.method) || "return" !== n && (r.method = "throw",
                                        r.arg = new TypeError("The iterator does not provide a '" + n + "' method")),
                                        l;
                                    n = f(o, t.iterator, r.arg);
                                    if ("throw" === n.type)
                                        return r.method = "throw",
                                        r.arg = n.arg,
                                        r.delegate = null,
                                        l;
                                    o = n.arg;
                                    return o ? o.done ? (r[t.resultName] = o.value,
                                    r.next = t.nextLoc,
                                    "return" !== r.method && (r.method = "next",
                                    r.arg = void 0),
                                    r.delegate = null,
                                    l) : o : (r.method = "throw",
                                    r.arg = new TypeError("iterator result is not an object"),
                                    r.delegate = null,
                                    l)
                                }(r, a);
                                if (r) {
                                    if (r === l)
                                        continue;
                                    return r
                                }
                            }
                            if ("next" === a.method)
                                a.sent = a._sent = a.arg;
                            else if ("throw" === a.method) {
                                if ("suspendedStart" === c)
                                    throw c = "completed",
                                    a.arg;
                                a.dispatchException(a.arg)
                            } else
                                "return" === a.method && a.abrupt("return", a.arg);
                            c = "executing";
                            r = f(o, i, a);
                            if ("normal" === r.type) {
                                if (c = a.done ? "completed" : "suspendedYield",
                                r.arg === l)
                                    continue;
                                return {
                                    value: r.arg,
                                    done: a.done
                                }
                            }
                            "throw" === r.type && (c = "completed",
                            a.method = "throw",
                            a.arg = r.arg)
                        }
                    }
                    )
                }),
                t
            }
            function f(e, t, r) {
                try {
                    return {
                        type: "normal",
                        arg: e.call(t, r)
                    }
                } catch (e) {
                    return {
                        type: "throw",
                        arg: e
                    }
                }
            }
            a.wrap = c;
            var l = {};
            function p() {}
            function h() {}
            function d() {}
            var t = {}
              , v = (i(t, n, function() {
                return this
            }),
            Object.getPrototypeOf)
              , v = v && v(v(_([])))
              , y = (v && v !== e && s.call(v, n) && (t = v),
            d.prototype = p.prototype = Object.create(t));
            function g(e) {
                ["next", "throw", "return"].forEach(function(t) {
                    i(e, t, function(e) {
                        return this._invoke(t, e)
                    })
                })
            }
            function b(a, c) {
                var t;
                u(this, "_invoke", {
                    value: function(r, n) {
                        function e() {
                            return new c(function(e, t) {
                                !function t(e, r, n, o) {
                                    var i, e = f(a[e], a, r);
                                    if ("throw" !== e.type)
                                        return (r = (i = e.arg).value) && "object" == S(r) && s.call(r, "__await") ? c.resolve(r.__await).then(function(e) {
                                            t("next", e, n, o)
                                        }, function(e) {
                                            t("throw", e, n, o)
                                        }) : c.resolve(r).then(function(e) {
                                            i.value = e,
                                            n(i)
                                        }, function(e) {
                                            return t("throw", e, n, o)
                                        });
                                    o(e.arg)
                                }(r, n, e, t)
                            }
                            )
                        }
                        return t = t ? t.then(e, e) : e()
                    }
                })
            }
            function m(e) {
                var t = {
                    tryLoc: e[0]
                };
                1 in e && (t.catchLoc = e[1]),
                2 in e && (t.finallyLoc = e[2],
                t.afterLoc = e[3]),
                this.tryEntries.push(t)
            }
            function w(e) {
                var t = e.completion || {};
                t.type = "normal",
                delete t.arg,
                e.completion = t
            }
            function x(e) {
                this.tryEntries = [{
                    tryLoc: "root"
                }],
                e.forEach(m, this),
                this.reset(!0)
            }
            function _(t) {
                if (t) {
                    var r, e = t[n];
                    if (e)
                        return e.call(t);
                    if ("function" == typeof t.next)
                        return t;
                    if (!isNaN(t.length))
                        return r = -1,
                        (e = function e() {
                            for (; ++r < t.length; )
                                if (s.call(t, r))
                                    return e.value = t[r],
                                    e.done = !1,
                                    e;
                            return e.value = void 0,
                            e.done = !0,
                            e
                        }
                        ).next = e
                }
                return {
                    next: E
                }
            }
            function E() {
                return {
                    value: void 0,
                    done: !0
                }
            }
            return u(y, "constructor", {
                value: h.prototype = d,
                configurable: !0
            }),
            u(d, "constructor", {
                value: h,
                configurable: !0
            }),
            h.displayName = i(d, o, "GeneratorFunction"),
            a.isGeneratorFunction = function(e) {
                e = "function" == typeof e && e.constructor;
                return !!e && (e === h || "GeneratorFunction" === (e.displayName || e.name))
            }
            ,
            a.mark = function(e) {
                return Object.setPrototypeOf ? Object.setPrototypeOf(e, d) : (e.__proto__ = d,
                i(e, o, "GeneratorFunction")),
                e.prototype = Object.create(y),
                e
            }
            ,
            a.awrap = function(e) {
                return {
                    __await: e
                }
            }
            ,
            g(b.prototype),
            i(b.prototype, r, function() {
                return this
            }),
            a.AsyncIterator = b,
            a.async = function(e, t, r, n, o) {
                void 0 === o && (o = Promise);
                var i = new b(c(e, t, r, n),o);
                return a.isGeneratorFunction(t) ? i : i.next().then(function(e) {
                    return e.done ? e.value : i.next()
                })
            }
            ,
            g(y),
            i(y, o, "Generator"),
            i(y, n, function() {
                return this
            }),
            i(y, "toString", function() {
                return "[object Generator]"
            }),
            a.keys = function(e) {
                var t, r = Object(e), n = [];
                for (t in r)
                    n.push(t);
                return n.reverse(),
                function e() {
                    for (; n.length; ) {
                        var t = n.pop();
                        if (t in r)
                            return e.value = t,
                            e.done = !1,
                            e
                    }
                    return e.done = !0,
                    e
                }
            }
            ,
            a.values = _,
            x.prototype = {
                constructor: x,
                reset: function(e) {
                    if (this.prev = 0,
                    this.next = 0,
                    this.sent = this._sent = void 0,
                    this.done = !1,
                    this.delegate = null,
                    this.method = "next",
                    this.arg = void 0,
                    this.tryEntries.forEach(w),
                    !e)
                        for (var t in this)
                            "t" === t.charAt(0) && s.call(this, t) && !isNaN(+t.slice(1)) && (this[t] = void 0)
                },
                stop: function() {
                    this.done = !0;
                    var e = this.tryEntries[0].completion;
                    if ("throw" === e.type)
                        throw e.arg;
                    return this.rval
                },
                dispatchException: function(r) {
                    if (this.done)
                        throw r;
                    var n = this;
                    function e(e, t) {
                        return i.type = "throw",
                        i.arg = r,
                        n.next = e,
                        t && (n.method = "next",
                        n.arg = void 0),
                        !!t
                    }
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var o = this.tryEntries[t]
                          , i = o.completion;
                        if ("root" === o.tryLoc)
                            return e("end");
                        if (o.tryLoc <= this.prev) {
                            var a = s.call(o, "catchLoc")
                              , c = s.call(o, "finallyLoc");
                            if (a && c) {
                                if (this.prev < o.catchLoc)
                                    return e(o.catchLoc, !0);
                                if (this.prev < o.finallyLoc)
                                    return e(o.finallyLoc)
                            } else if (a) {
                                if (this.prev < o.catchLoc)
                                    return e(o.catchLoc, !0)
                            } else {
                                if (!c)
                                    throw new Error("try statement without catch or finally");
                                if (this.prev < o.finallyLoc)
                                    return e(o.finallyLoc)
                            }
                        }
                    }
                },
                abrupt: function(e, t) {
                    for (var r = this.tryEntries.length - 1; 0 <= r; --r) {
                        var n = this.tryEntries[r];
                        if (n.tryLoc <= this.prev && s.call(n, "finallyLoc") && this.prev < n.finallyLoc) {
                            var o = n;
                            break
                        }
                    }
                    var i = (o = o && ("break" === e || "continue" === e) && o.tryLoc <= t && t <= o.finallyLoc ? null : o) ? o.completion : {};
                    return i.type = e,
                    i.arg = t,
                    o ? (this.method = "next",
                    this.next = o.finallyLoc,
                    l) : this.complete(i)
                },
                complete: function(e, t) {
                    if ("throw" === e.type)
                        throw e.arg;
                    return "break" === e.type || "continue" === e.type ? this.next = e.arg : "return" === e.type ? (this.rval = this.arg = e.arg,
                    this.method = "return",
                    this.next = "end") : "normal" === e.type && t && (this.next = t),
                    l
                },
                finish: function(e) {
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var r = this.tryEntries[t];
                        if (r.finallyLoc === e)
                            return this.complete(r.completion, r.afterLoc),
                            w(r),
                            l
                    }
                },
                catch: function(e) {
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var r, n, o = this.tryEntries[t];
                        if (o.tryLoc === e)
                            return "throw" === (r = o.completion).type && (n = r.arg,
                            w(o)),
                            n
                    }
                    throw new Error("illegal catch attempt")
                },
                delegateYield: function(e, t, r) {
                    return this.delegate = {
                        iterator: _(e),
                        resultName: t,
                        nextLoc: r
                    },
                    "next" === this.method && (this.arg = void 0),
                    l
                }
            },
            a
        }
        function f(e, t, r, n, o, i, a) {
            try {
                var c = e[i](a)
                  , s = c.value
            } catch (e) {
                return void r(e)
            }
            c.done ? t(s) : Promise.resolve(s).then(n, o)
        }
        function a(c) {
            return function() {
                var e = this
                  , a = arguments;
                return new Promise(function(t, r) {
                    var n = c.apply(e, a);
                    function o(e) {
                        f(n, t, r, o, i, "next", e)
                    }
                    function i(e) {
                        f(n, t, r, o, i, "throw", e)
                    }
                    o(void 0)
                }
                )
            }
        }
        function l(e, t) {
            var r, n, o, i, a = "undefined" != typeof Symbol && e[Symbol.iterator] || e["@@iterator"];
            if (a)
                return n = !(r = !0),
                {
                    s: function() {
                        a = a.call(e)
                    },
                    n: function() {
                        var e = a.next();
                        return r = e.done,
                        e
                    },
                    e: function(e) {
                        n = !0,
                        o = e
                    },
                    f: function() {
                        try {
                            r || null == a.return || a.return()
                        } finally {
                            if (n)
                                throw o
                        }
                    }
                };
            if (Array.isArray(e) || (a = c(e)) || t && e && "number" == typeof e.length)
                return a && (e = a),
                i = 0,
                {
                    s: t = function() {}
                    ,
                    n: function() {
                        return i >= e.length ? {
                            done: !0
                        } : {
                            done: !1,
                            value: e[i++]
                        }
                    },
                    e: function(e) {
                        throw e
                    },
                    f: t
                };
            throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }
        function c(e, t) {
            var r;
            if (e)
                return "string" == typeof e ? n(e, t) : "Map" === (r = "Object" === (r = Object.prototype.toString.call(e).slice(8, -1)) && e.constructor ? e.constructor.name : r) || "Set" === r ? Array.from(e) : "Arguments" === r || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r) ? n(e, t) : void 0
        }
        function n(e, t) {
            (null == t || t > e.length) && (t = e.length);
            for (var r = 0, n = new Array(t); r < t; r++)
                n[r] = e[r];
            return n
        }
        function o(e, t, r) {
            (t = v(t))in e ? Object.defineProperty(e, t, {
                value: r,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = r
        }
        function S(e) {
            return (S = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                return typeof e
            }
            : function(e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            }
            )(e)
        }
        function p(e, t) {
            if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function")
        }
        function h(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                n.enumerable = n.enumerable || !1,
                n.configurable = !0,
                "value"in n && (n.writable = !0),
                Object.defineProperty(e, v(n.key), n)
            }
        }
        function d(e, t, r) {
            t && h(e.prototype, t),
            r && h(e, r),
            Object.defineProperty(e, "prototype", {
                writable: !1
            })
        }
        function v(e) {
            e = function(e, t) {
                if ("object" !== S(e) || null === e)
                    return e;
                var r = e[Symbol.toPrimitive];
                if (void 0 === r)
                    return ("string" === t ? String : Number)(e);
                r = r.call(e, t || "default");
                if ("object" !== S(r))
                    return r;
                throw new TypeError("@@toPrimitive must return a primitive value.")
            }(e, "string");
            return "symbol" === S(e) ? e : String(e)
        }
        var F = function() {
            function t(e) {
                p(this, t),
                this.container = e
            }
            return d(t, [{
                key: "getPlatformInfoString",
                value: function() {
                    return this.container.getProviders().map(function(e) {
                        return function(e) {
                            e = e.getComponent();
                            return "VERSION" === (null == e ? void 0 : e.type)
                        }(e) ? (e = e.getImmediate(),
                        "".concat(e.library, "/").concat(e.version)) : null
                    }).filter(function(e) {
                        return e
                    }).join(" ")
                }
            }]),
            t
        }();
        var e = "@firebase/app"
          , y = new r.Logger("@firebase/app")
          , g = "[DEFAULT]"
          , R = (t._DEFAULT_ENTRY_NAME = g,
        o(N = {}, e, "fire-core"),
        o(N, "@firebase/app-compat", "fire-core-compat"),
        o(N, "@firebase/analytics", "fire-analytics"),
        o(N, "@firebase/analytics-compat", "fire-analytics-compat"),
        o(N, "@firebase/app-check", "fire-app-check"),
        o(N, "@firebase/app-check-compat", "fire-app-check-compat"),
        o(N, "@firebase/auth", "fire-auth"),
        o(N, "@firebase/auth-compat", "fire-auth-compat"),
        o(N, "@firebase/database", "fire-rtdb"),
        o(N, "@firebase/database-compat", "fire-rtdb-compat"),
        o(N, "@firebase/functions", "fire-fn"),
        o(N, "@firebase/functions-compat", "fire-fn-compat"),
        o(N, "@firebase/installations", "fire-iid"),
        o(N, "@firebase/installations-compat", "fire-iid-compat"),
        o(N, "@firebase/messaging", "fire-fcm"),
        o(N, "@firebase/messaging-compat", "fire-fcm-compat"),
        o(N, "@firebase/performance", "fire-perf"),
        o(N, "@firebase/performance-compat", "fire-perf-compat"),
        o(N, "@firebase/remote-config", "fire-rc"),
        o(N, "@firebase/remote-config-compat", "fire-rc-compat"),
        o(N, "@firebase/storage", "fire-gcs"),
        o(N, "@firebase/storage-compat", "fire-gcs-compat"),
        o(N, "@firebase/firestore", "fire-fst"),
        o(N, "@firebase/firestore-compat", "fire-fst-compat"),
        o(N, "fire-js", "fire-js"),
        o(N, "firebase", "fire-js-all"),
        N)
          , b = new Map
          , m = (t._apps = b,
        new Map);
        function w(t, r) {
            try {
                t.container.addComponent(r)
            } catch (e) {
                y.debug("Component ".concat(r.name, " failed to register with FirebaseApp ").concat(t.name), e)
            }
        }
        function x(e) {
            var t = e.name;
            if (m.has(t))
                return y.debug("There were multiple attempts to register component ".concat(t, ".")),
                !1;
            m.set(t, e);
            var r, n = l(b.values());
            try {
                for (n.s(); !(r = n.n()).done; )
                    w(r.value, e)
            } catch (e) {
                n.e(e)
            } finally {
                n.f()
            }
            return !0
        }
        function _(e, t) {
            var r = e.container.getProvider("heartbeat").getImmediate({
                optional: !0
            });
            return r && r.triggerHeartbeat(),
            e.container.getProvider(t)
        }
        t._components = m,
        o(N = {}, "no-app", "No Firebase App '{$appName}' has been created - call Firebase App.initializeApp()"),
        o(N, "bad-app-name", "Illegal App name: '{$appName}"),
        o(N, "duplicate-app", "Firebase App named '{$appName}' already exists with different options or config"),
        o(N, "app-deleted", "Firebase App named '{$appName}' already deleted"),
        o(N, "no-options", "Need to provide options, when not being deployed to hosting via source."),
        o(N, "invalid-app-argument", "firebase.{$appName}() takes either no argument or a Firebase App instance."),
        o(N, "invalid-log-argument", "First argument to `onLog` must be null or a function."),
        o(N, "idb-open", "Error thrown when opening IndexedDB. Original error: {$originalErrorMessage}."),
        o(N, "idb-get", "Error thrown when reading from IndexedDB. Original error: {$originalErrorMessage}."),
        o(N, "idb-set", "Error thrown when writing to IndexedDB. Original error: {$originalErrorMessage}."),
        o(N, "idb-delete", "Error thrown when deleting from IndexedDB. Original error: {$originalErrorMessage}.");
        var E = new u.ErrorFactory("app","Firebase",N)
          , H = function() {
            function o(e, t, r) {
                var n = this;
                p(this, o),
                this._isDeleted = !1,
                this._options = Object.assign({}, e),
                this._config = Object.assign({}, t),
                this._name = t.name,
                this._automaticDataCollectionEnabled = t.automaticDataCollectionEnabled,
                this._container = r,
                this.container.addComponent(new s.Component("app",function() {
                    return n
                }
                ,"PUBLIC"))
            }
            return d(o, [{
                key: "automaticDataCollectionEnabled",
                get: function() {
                    return this.checkDestroyed(),
                    this._automaticDataCollectionEnabled
                },
                set: function(e) {
                    this.checkDestroyed(),
                    this._automaticDataCollectionEnabled = e
                }
            }, {
                key: "name",
                get: function() {
                    return this.checkDestroyed(),
                    this._name
                }
            }, {
                key: "options",
                get: function() {
                    return this.checkDestroyed(),
                    this._options
                }
            }, {
                key: "config",
                get: function() {
                    return this.checkDestroyed(),
                    this._config
                }
            }, {
                key: "container",
                get: function() {
                    return this._container
                }
            }, {
                key: "isDeleted",
                get: function() {
                    return this._isDeleted
                },
                set: function(e) {
                    this._isDeleted = e
                }
            }, {
                key: "checkDestroyed",
                value: function() {
                    if (this.isDeleted)
                        throw E.create("app-deleted", {
                            appName: this._name
                        })
                }
            }]),
            o
        }();
        function O(e) {
            var t = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {}
              , t = ("object" !== S(t) && (t = {
                name: t
            }),
            Object.assign({
                name: g,
                automaticDataCollectionEnabled: !1
            }, t))
              , r = t.name;
            if ("string" != typeof r || !r)
                throw E.create("bad-app-name", {
                    appName: String(r)
                });
            if (!(e = e || (0,
            u.getDefaultAppConfig)()))
                throw E.create("no-options");
            var n = b.get(r);
            if (n) {
                if ((0,
                u.deepEqual)(e, n.options) && (0,
                u.deepEqual)(t, n.config))
                    return n;
                throw E.create("duplicate-app", {
                    appName: r
                })
            }
            var o, i = new s.ComponentContainer(r), a = l(m.values());
            try {
                for (a.s(); !(o = a.n()).done; ) {
                    var c = o.value;
                    i.addComponent(c)
                }
            } catch (e) {
                a.e(e)
            } finally {
                a.f()
            }
            n = new H(e,t,i);
            return b.set(r, n),
            n
        }
        function L() {
            return (L = a(k().mark(function e(t) {
                var r;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            if (r = t.name,
                            b.has(r))
                                return b.delete(r),
                                e.next = 5,
                                Promise.all(t.container.getProviders().map(function(e) {
                                    return e.delete()
                                }));
                            e.next = 6;
                            break;
                        case 5:
                            t.isDeleted = !0;
                        case 6:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function j(e, t, r) {
            var n = null != (o = R[e]) ? o : e
              , o = (r && (n += "-".concat(r)),
            n.match(/\s|\//))
              , e = t.match(/\s|\//);
            o || e ? (r = ['Unable to register library "'.concat(n, '" with version "').concat(t, '":')],
            o && r.push('library name "'.concat(n, '" contains illegal characters (whitespace or "/")')),
            o && e && r.push("and"),
            e && r.push('version name "'.concat(t, '" contains illegal characters (whitespace or "/")')),
            y.warn(r.join(" "))) : x(new s.Component("".concat(n, "-version"),function() {
                return {
                    library: n,
                    version: t
                }
            }
            ,"VERSION"))
        }
        t.SDK_VERSION = "9.19.1";
        var G = "firebase-heartbeat-database"
          , V = 1
          , I = "firebase-heartbeat-store"
          , A = null;
        function P() {
            return A = A || (0,
            B.openDB)(G, V, {
                upgrade: function(e, t) {
                    0 === t && e.createObjectStore(I)
                }
            }).catch(function(e) {
                throw E.create("idb-open", {
                    originalErrorMessage: e.message
                })
            })
        }
        function T() {
            return (T = a(k().mark(function e(t) {
                var r;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.prev = 0,
                            e.next = 3,
                            P();
                        case 3:
                            return r = e.sent,
                            e.abrupt("return", r.transaction(I).objectStore(I).get(U(t)));
                        case 7:
                            e.prev = 7,
                            e.t0 = e.catch(0),
                            e.t0 instanceof u.FirebaseError ? y.warn(e.t0.message) : (r = E.create("idb-get", {
                                originalErrorMessage: null === e.t0 || void 0 === e.t0 ? void 0 : e.t0.message
                            }),
                            y.warn(r.message));
                        case 10:
                        case "end":
                            return e.stop()
                        }
                }, e, null, [[0, 7]])
            }))).apply(this, arguments)
        }
        function C() {
            return D.apply(this, arguments)
        }
        function D() {
            return (D = a(k().mark(function e(t, r) {
                var n, o;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.prev = 0,
                            e.next = 3,
                            P();
                        case 3:
                            return n = e.sent,
                            n = n.transaction(I, "readwrite"),
                            o = n.objectStore(I),
                            e.next = 8,
                            o.put(r, U(t));
                        case 8:
                            return e.abrupt("return", n.done);
                        case 11:
                            e.prev = 11,
                            e.t0 = e.catch(0),
                            e.t0 instanceof u.FirebaseError ? y.warn(e.t0.message) : (o = E.create("idb-set", {
                                originalErrorMessage: null === e.t0 || void 0 === e.t0 ? void 0 : e.t0.message
                            }),
                            y.warn(o.message));
                        case 14:
                        case "end":
                            return e.stop()
                        }
                }, e, null, [[0, 11]])
            }))).apply(this, arguments)
        }
        function U(e) {
            return "".concat(e.name, "!").concat(e.options.appId)
        }
        var W = function() {
            function r(e) {
                var t = this
                  , e = (p(this, r),
                this.container = e,
                this._heartbeatsCache = null,
                this.container.getProvider("app").getImmediate());
                this._storage = new z(e),
                this._heartbeatsCachePromise = this._storage.read().then(function(e) {
                    return t._heartbeatsCache = e
                })
            }
            var e, t;
            return d(r, [{
                key: "triggerHeartbeat",
                value: (t = a(k().mark(function e() {
                    var t, r;
                    return k().wrap(function(e) {
                        for (; ; )
                            switch (e.prev = e.next) {
                            case 0:
                                if (t = this.container.getProvider("platform-logger").getImmediate(),
                                t = t.getPlatformInfoString(),
                                r = K(),
                                null === this._heartbeatsCache)
                                    return e.next = 6,
                                    this._heartbeatsCachePromise;
                                e.next = 7;
                                break;
                            case 6:
                                this._heartbeatsCache = e.sent;
                            case 7:
                                if (this._heartbeatsCache.lastSentHeartbeatDate === r || this._heartbeatsCache.heartbeats.some(function(e) {
                                    return e.date === r
                                }))
                                    return e.abrupt("return");
                                e.next = 11;
                                break;
                            case 11:
                                this._heartbeatsCache.heartbeats.push({
                                    date: r,
                                    agent: t
                                });
                            case 12:
                                return this._heartbeatsCache.heartbeats = this._heartbeatsCache.heartbeats.filter(function(e) {
                                    e = new Date(e.date).valueOf();
                                    return Date.now() - e <= 2592e6
                                }),
                                e.abrupt("return", this._storage.overwrite(this._heartbeatsCache));
                            case 14:
                            case "end":
                                return e.stop()
                            }
                    }, e, this)
                })),
                function() {
                    return t.apply(this, arguments)
                }
                )
            }, {
                key: "getHeartbeatsHeader",
                value: (e = a(k().mark(function e() {
                    var t, r, n;
                    return k().wrap(function(e) {
                        for (; ; )
                            switch (e.prev = e.next) {
                            case 0:
                                if (null === this._heartbeatsCache)
                                    return e.next = 3,
                                    this._heartbeatsCachePromise;
                                e.next = 3;
                                break;
                            case 3:
                                if (null === this._heartbeatsCache || 0 === this._heartbeatsCache.heartbeats.length)
                                    return e.abrupt("return", "");
                                e.next = 5;
                                break;
                            case 5:
                                if (t = K(),
                                r = function(e) {
                                    var r, n = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : 1024, o = [], i = e.slice(), t = l(e);
                                    try {
                                        for (t.s(); !(r = t.n()).done; )
                                            if ("break" === function() {
                                                var t = r.value
                                                  , e = o.find(function(e) {
                                                    return e.agent === t.agent
                                                });
                                                if (e) {
                                                    if (e.dates.push(t.date),
                                                    q(o) > n)
                                                        return e.dates.pop(),
                                                        "break"
                                                } else if (o.push({
                                                    agent: t.agent,
                                                    dates: [t.date]
                                                }),
                                                q(o) > n)
                                                    return o.pop(),
                                                    "break";
                                                i = i.slice(1)
                                            }())
                                                break
                                    } catch (e) {
                                        t.e(e)
                                    } finally {
                                        t.f()
                                    }
                                    return {
                                        heartbeatsToSend: o,
                                        unsentEntries: i
                                    }
                                }(this._heartbeatsCache.heartbeats),
                                n = r.heartbeatsToSend,
                                r = r.unsentEntries,
                                n = (0,
                                u.base64urlEncodeWithoutPadding)(JSON.stringify({
                                    version: 2,
                                    heartbeats: n
                                })),
                                this._heartbeatsCache.lastSentHeartbeatDate = t,
                                0 < r.length)
                                    return this._heartbeatsCache.heartbeats = r,
                                    e.next = 13,
                                    this._storage.overwrite(this._heartbeatsCache);
                                e.next = 15;
                                break;
                            case 13:
                                e.next = 17;
                                break;
                            case 15:
                                this._heartbeatsCache.heartbeats = [],
                                this._storage.overwrite(this._heartbeatsCache);
                            case 17:
                                return e.abrupt("return", n);
                            case 18:
                            case "end":
                                return e.stop()
                            }
                    }, e, this)
                })),
                function() {
                    return e.apply(this, arguments)
                }
                )
            }]),
            r
        }();
        function K() {
            return (new Date).toISOString().substring(0, 10)
        }
        var N, z = function() {
            function t(e) {
                p(this, t),
                this.app = e,
                this._canUseIndexedDBPromise = this.runIndexedDBEnvironmentCheck()
            }
            var r, n, e, o;
            return d(t, [{
                key: "runIndexedDBEnvironmentCheck",
                value: (o = a(k().mark(function e() {
                    return k().wrap(function(e) {
                        for (; ; )
                            switch (e.prev = e.next) {
                            case 0:
                                if ((0,
                                u.isIndexedDBAvailable)()) {
                                    e.next = 4;
                                    break
                                }
                                return e.abrupt("return", !1);
                            case 4:
                                return e.abrupt("return", (0,
                                u.validateIndexedDBOpenable)().then(function() {
                                    return !0
                                }).catch(function() {
                                    return !1
                                }));
                            case 5:
                            case "end":
                                return e.stop()
                            }
                    }, e)
                })),
                function() {
                    return o.apply(this, arguments)
                }
                )
            }, {
                key: "read",
                value: (e = a(k().mark(function e() {
                    var t;
                    return k().wrap(function(e) {
                        for (; ; )
                            switch (e.prev = e.next) {
                            case 0:
                                return e.next = 2,
                                this._canUseIndexedDBPromise;
                            case 2:
                                if (e.sent) {
                                    e.next = 7;
                                    break
                                }
                                return e.abrupt("return", {
                                    heartbeats: []
                                });
                            case 7:
                                return e.next = 9,
                                function() {
                                    return T.apply(this, arguments)
                                }(this.app);
                            case 9:
                                return t = e.sent,
                                e.abrupt("return", t || {
                                    heartbeats: []
                                });
                            case 11:
                            case "end":
                                return e.stop()
                            }
                    }, e, this)
                })),
                function() {
                    return e.apply(this, arguments)
                }
                )
            }, {
                key: "overwrite",
                value: (n = a(k().mark(function e(t) {
                    var r, n;
                    return k().wrap(function(e) {
                        for (; ; )
                            switch (e.prev = e.next) {
                            case 0:
                                return e.next = 2,
                                this._canUseIndexedDBPromise;
                            case 2:
                                if (e.sent) {
                                    e.next = 7;
                                    break
                                }
                                return e.abrupt("return");
                            case 7:
                                return e.next = 9,
                                this.read();
                            case 9:
                                return n = e.sent,
                                e.abrupt("return", C(this.app, {
                                    lastSentHeartbeatDate: null != (r = t.lastSentHeartbeatDate) ? r : n.lastSentHeartbeatDate,
                                    heartbeats: t.heartbeats
                                }));
                            case 11:
                            case "end":
                                return e.stop()
                            }
                    }, e, this)
                })),
                function(e) {
                    return n.apply(this, arguments)
                }
                )
            }, {
                key: "add",
                value: (r = a(k().mark(function e(t) {
                    var r, n;
                    return k().wrap(function(e) {
                        for (; ; )
                            switch (e.prev = e.next) {
                            case 0:
                                return e.next = 2,
                                this._canUseIndexedDBPromise;
                            case 2:
                                if (e.sent) {
                                    e.next = 7;
                                    break
                                }
                                return e.abrupt("return");
                            case 7:
                                return e.next = 9,
                                this.read();
                            case 9:
                                return n = e.sent,
                                e.abrupt("return", C(this.app, {
                                    lastSentHeartbeatDate: null != (r = t.lastSentHeartbeatDate) ? r : n.lastSentHeartbeatDate,
                                    heartbeats: [].concat(i(n.heartbeats), i(t.heartbeats))
                                }));
                            case 11:
                            case "end":
                                return e.stop()
                            }
                    }, e, this)
                })),
                function(e) {
                    return r.apply(this, arguments)
                }
                )
            }]),
            t
        }();
        function q(e) {
            return (0,
            u.base64urlEncodeWithoutPadding)(JSON.stringify({
                version: 2,
                heartbeats: e
            })).length
        }
        N = "",
        x(new s.Component("platform-logger",function(e) {
            return new F(e)
        }
        ,"PRIVATE")),
        x(new s.Component("heartbeat",function(e) {
            return new W(e)
        }
        ,"PRIVATE")),
        j(e, "0.9.7", N),
        j(e, "0.9.7", "esm2017"),
        j("fire-js", "")
    }
    , {
        "@firebase/component": 3,
        "@firebase/logger": 5,
        "@firebase/util": 7,
        idb: 10
    }],
    3: [function(e, t, r) {
        "use strict";
        Object.defineProperty(r, "__esModule", {
            value: !0
        }),
        r.Provider = r.ComponentContainer = r.Component = void 0;
        var n = e("@firebase/util");
        function k() {
            k = function() {
                return a
            }
            ;
            var a = {}
              , e = Object.prototype
              , s = e.hasOwnProperty
              , u = Object.defineProperty || function(e, t, r) {
                e[t] = r.value
            }
              , t = "function" == typeof Symbol ? Symbol : {}
              , n = t.iterator || "@@iterator"
              , r = t.asyncIterator || "@@asyncIterator"
              , o = t.toStringTag || "@@toStringTag";
            function i(e, t, r) {
                return Object.defineProperty(e, t, {
                    value: r,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }),
                e[t]
            }
            try {
                i({}, "")
            } catch (e) {
                i = function(e, t, r) {
                    return e[t] = r
                }
            }
            function c(e, t, r, n) {
                var o, i, a, c, t = t && t.prototype instanceof p ? t : p, t = Object.create(t.prototype), n = new x(n || []);
                return u(t, "_invoke", {
                    value: (o = e,
                    i = r,
                    a = n,
                    c = "suspendedStart",
                    function(e, t) {
                        if ("executing" === c)
                            throw new Error("Generator is already running");
                        if ("completed" === c) {
                            if ("throw" === e)
                                throw t;
                            return E()
                        }
                        for (a.method = e,
                        a.arg = t; ; ) {
                            var r = a.delegate;
                            if (r) {
                                r = function e(t, r) {
                                    var n = r.method
                                      , o = t.iterator[n];
                                    if (void 0 === o)
                                        return r.delegate = null,
                                        "throw" === n && t.iterator.return && (r.method = "return",
                                        r.arg = void 0,
                                        e(t, r),
                                        "throw" === r.method) || "return" !== n && (r.method = "throw",
                                        r.arg = new TypeError("The iterator does not provide a '" + n + "' method")),
                                        l;
                                    n = f(o, t.iterator, r.arg);
                                    if ("throw" === n.type)
                                        return r.method = "throw",
                                        r.arg = n.arg,
                                        r.delegate = null,
                                        l;
                                    o = n.arg;
                                    return o ? o.done ? (r[t.resultName] = o.value,
                                    r.next = t.nextLoc,
                                    "return" !== r.method && (r.method = "next",
                                    r.arg = void 0),
                                    r.delegate = null,
                                    l) : o : (r.method = "throw",
                                    r.arg = new TypeError("iterator result is not an object"),
                                    r.delegate = null,
                                    l)
                                }(r, a);
                                if (r) {
                                    if (r === l)
                                        continue;
                                    return r
                                }
                            }
                            if ("next" === a.method)
                                a.sent = a._sent = a.arg;
                            else if ("throw" === a.method) {
                                if ("suspendedStart" === c)
                                    throw c = "completed",
                                    a.arg;
                                a.dispatchException(a.arg)
                            } else
                                "return" === a.method && a.abrupt("return", a.arg);
                            c = "executing";
                            r = f(o, i, a);
                            if ("normal" === r.type) {
                                if (c = a.done ? "completed" : "suspendedYield",
                                r.arg === l)
                                    continue;
                                return {
                                    value: r.arg,
                                    done: a.done
                                }
                            }
                            "throw" === r.type && (c = "completed",
                            a.method = "throw",
                            a.arg = r.arg)
                        }
                    }
                    )
                }),
                t
            }
            function f(e, t, r) {
                try {
                    return {
                        type: "normal",
                        arg: e.call(t, r)
                    }
                } catch (e) {
                    return {
                        type: "throw",
                        arg: e
                    }
                }
            }
            a.wrap = c;
            var l = {};
            function p() {}
            function h() {}
            function d() {}
            var t = {}
              , v = (i(t, n, function() {
                return this
            }),
            Object.getPrototypeOf)
              , v = v && v(v(_([])))
              , y = (v && v !== e && s.call(v, n) && (t = v),
            d.prototype = p.prototype = Object.create(t));
            function g(e) {
                ["next", "throw", "return"].forEach(function(t) {
                    i(e, t, function(e) {
                        return this._invoke(t, e)
                    })
                })
            }
            function b(a, c) {
                var t;
                u(this, "_invoke", {
                    value: function(r, n) {
                        function e() {
                            return new c(function(e, t) {
                                !function t(e, r, n, o) {
                                    var i, e = f(a[e], a, r);
                                    if ("throw" !== e.type)
                                        return (r = (i = e.arg).value) && "object" == S(r) && s.call(r, "__await") ? c.resolve(r.__await).then(function(e) {
                                            t("next", e, n, o)
                                        }, function(e) {
                                            t("throw", e, n, o)
                                        }) : c.resolve(r).then(function(e) {
                                            i.value = e,
                                            n(i)
                                        }, function(e) {
                                            return t("throw", e, n, o)
                                        });
                                    o(e.arg)
                                }(r, n, e, t)
                            }
                            )
                        }
                        return t = t ? t.then(e, e) : e()
                    }
                })
            }
            function m(e) {
                var t = {
                    tryLoc: e[0]
                };
                1 in e && (t.catchLoc = e[1]),
                2 in e && (t.finallyLoc = e[2],
                t.afterLoc = e[3]),
                this.tryEntries.push(t)
            }
            function w(e) {
                var t = e.completion || {};
                t.type = "normal",
                delete t.arg,
                e.completion = t
            }
            function x(e) {
                this.tryEntries = [{
                    tryLoc: "root"
                }],
                e.forEach(m, this),
                this.reset(!0)
            }
            function _(t) {
                if (t) {
                    var r, e = t[n];
                    if (e)
                        return e.call(t);
                    if ("function" == typeof t.next)
                        return t;
                    if (!isNaN(t.length))
                        return r = -1,
                        (e = function e() {
                            for (; ++r < t.length; )
                                if (s.call(t, r))
                                    return e.value = t[r],
                                    e.done = !1,
                                    e;
                            return e.value = void 0,
                            e.done = !0,
                            e
                        }
                        ).next = e
                }
                return {
                    next: E
                }
            }
            function E() {
                return {
                    value: void 0,
                    done: !0
                }
            }
            return u(y, "constructor", {
                value: h.prototype = d,
                configurable: !0
            }),
            u(d, "constructor", {
                value: h,
                configurable: !0
            }),
            h.displayName = i(d, o, "GeneratorFunction"),
            a.isGeneratorFunction = function(e) {
                e = "function" == typeof e && e.constructor;
                return !!e && (e === h || "GeneratorFunction" === (e.displayName || e.name))
            }
            ,
            a.mark = function(e) {
                return Object.setPrototypeOf ? Object.setPrototypeOf(e, d) : (e.__proto__ = d,
                i(e, o, "GeneratorFunction")),
                e.prototype = Object.create(y),
                e
            }
            ,
            a.awrap = function(e) {
                return {
                    __await: e
                }
            }
            ,
            g(b.prototype),
            i(b.prototype, r, function() {
                return this
            }),
            a.AsyncIterator = b,
            a.async = function(e, t, r, n, o) {
                void 0 === o && (o = Promise);
                var i = new b(c(e, t, r, n),o);
                return a.isGeneratorFunction(t) ? i : i.next().then(function(e) {
                    return e.done ? e.value : i.next()
                })
            }
            ,
            g(y),
            i(y, o, "Generator"),
            i(y, n, function() {
                return this
            }),
            i(y, "toString", function() {
                return "[object Generator]"
            }),
            a.keys = function(e) {
                var t, r = Object(e), n = [];
                for (t in r)
                    n.push(t);
                return n.reverse(),
                function e() {
                    for (; n.length; ) {
                        var t = n.pop();
                        if (t in r)
                            return e.value = t,
                            e.done = !1,
                            e
                    }
                    return e.done = !0,
                    e
                }
            }
            ,
            a.values = _,
            x.prototype = {
                constructor: x,
                reset: function(e) {
                    if (this.prev = 0,
                    this.next = 0,
                    this.sent = this._sent = void 0,
                    this.done = !1,
                    this.delegate = null,
                    this.method = "next",
                    this.arg = void 0,
                    this.tryEntries.forEach(w),
                    !e)
                        for (var t in this)
                            "t" === t.charAt(0) && s.call(this, t) && !isNaN(+t.slice(1)) && (this[t] = void 0)
                },
                stop: function() {
                    this.done = !0;
                    var e = this.tryEntries[0].completion;
                    if ("throw" === e.type)
                        throw e.arg;
                    return this.rval
                },
                dispatchException: function(r) {
                    if (this.done)
                        throw r;
                    var n = this;
                    function e(e, t) {
                        return i.type = "throw",
                        i.arg = r,
                        n.next = e,
                        t && (n.method = "next",
                        n.arg = void 0),
                        !!t
                    }
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var o = this.tryEntries[t]
                          , i = o.completion;
                        if ("root" === o.tryLoc)
                            return e("end");
                        if (o.tryLoc <= this.prev) {
                            var a = s.call(o, "catchLoc")
                              , c = s.call(o, "finallyLoc");
                            if (a && c) {
                                if (this.prev < o.catchLoc)
                                    return e(o.catchLoc, !0);
                                if (this.prev < o.finallyLoc)
                                    return e(o.finallyLoc)
                            } else if (a) {
                                if (this.prev < o.catchLoc)
                                    return e(o.catchLoc, !0)
                            } else {
                                if (!c)
                                    throw new Error("try statement without catch or finally");
                                if (this.prev < o.finallyLoc)
                                    return e(o.finallyLoc)
                            }
                        }
                    }
                },
                abrupt: function(e, t) {
                    for (var r = this.tryEntries.length - 1; 0 <= r; --r) {
                        var n = this.tryEntries[r];
                        if (n.tryLoc <= this.prev && s.call(n, "finallyLoc") && this.prev < n.finallyLoc) {
                            var o = n;
                            break
                        }
                    }
                    var i = (o = o && ("break" === e || "continue" === e) && o.tryLoc <= t && t <= o.finallyLoc ? null : o) ? o.completion : {};
                    return i.type = e,
                    i.arg = t,
                    o ? (this.method = "next",
                    this.next = o.finallyLoc,
                    l) : this.complete(i)
                },
                complete: function(e, t) {
                    if ("throw" === e.type)
                        throw e.arg;
                    return "break" === e.type || "continue" === e.type ? this.next = e.arg : "return" === e.type ? (this.rval = this.arg = e.arg,
                    this.method = "return",
                    this.next = "end") : "normal" === e.type && t && (this.next = t),
                    l
                },
                finish: function(e) {
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var r = this.tryEntries[t];
                        if (r.finallyLoc === e)
                            return this.complete(r.completion, r.afterLoc),
                            w(r),
                            l
                    }
                },
                catch: function(e) {
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var r, n, o = this.tryEntries[t];
                        if (o.tryLoc === e)
                            return "throw" === (r = o.completion).type && (n = r.arg,
                            w(o)),
                            n
                    }
                    throw new Error("illegal catch attempt")
                },
                delegateYield: function(e, t, r) {
                    return this.delegate = {
                        iterator: _(e),
                        resultName: t,
                        nextLoc: r
                    },
                    "next" === this.method && (this.arg = void 0),
                    l
                }
            },
            a
        }
        function o(e) {
            return function(e) {
                if (Array.isArray(e))
                    return i(e)
            }(e) || function(e) {
                if ("undefined" != typeof Symbol && null != e[Symbol.iterator] || null != e["@@iterator"])
                    return Array.from(e)
            }(e) || c(e) || function() {
                throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
            }()
        }
        function s(e, t, r, n, o, i, a) {
            try {
                var c = e[i](a)
                  , s = c.value
            } catch (e) {
                return void r(e)
            }
            c.done ? t(s) : Promise.resolve(s).then(n, o)
        }
        function u(e, t) {
            return function(e) {
                if (Array.isArray(e))
                    return e
            }(e) || function(e, t) {
                var r = null == e ? null : "undefined" != typeof Symbol && e[Symbol.iterator] || e["@@iterator"];
                if (null != r) {
                    var n, o, i, a, c = [], s = !0, u = !1;
                    try {
                        if (i = (r = r.call(e)).next,
                        0 === t) {
                            if (Object(r) !== r)
                                return;
                            s = !1
                        } else
                            for (; !(s = (n = i.call(r)).done) && (c.push(n.value),
                            c.length !== t); s = !0)
                                ;
                    } catch (e) {
                        u = !0,
                        o = e
                    } finally {
                        try {
                            if (!s && null != r.return && (a = r.return(),
                            Object(a) !== a))
                                return
                        } finally {
                            if (u)
                                throw o
                        }
                    }
                    return c
                }
            }(e, t) || c(e, t) || function() {
                throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
            }()
        }
        function f(e, t) {
            var r, n, o, i, a = "undefined" != typeof Symbol && e[Symbol.iterator] || e["@@iterator"];
            if (a)
                return n = !(r = !0),
                {
                    s: function() {
                        a = a.call(e)
                    },
                    n: function() {
                        var e = a.next();
                        return r = e.done,
                        e
                    },
                    e: function(e) {
                        n = !0,
                        o = e
                    },
                    f: function() {
                        try {
                            r || null == a.return || a.return()
                        } finally {
                            if (n)
                                throw o
                        }
                    }
                };
            if (Array.isArray(e) || (a = c(e)) || t && e && "number" == typeof e.length)
                return a && (e = a),
                i = 0,
                {
                    s: t = function() {}
                    ,
                    n: function() {
                        return i >= e.length ? {
                            done: !0
                        } : {
                            done: !1,
                            value: e[i++]
                        }
                    },
                    e: function(e) {
                        throw e
                    },
                    f: t
                };
            throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }
        function c(e, t) {
            var r;
            if (e)
                return "string" == typeof e ? i(e, t) : "Map" === (r = "Object" === (r = Object.prototype.toString.call(e).slice(8, -1)) && e.constructor ? e.constructor.name : r) || "Set" === r ? Array.from(e) : "Arguments" === r || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r) ? i(e, t) : void 0
        }
        function i(e, t) {
            (null == t || t > e.length) && (t = e.length);
            for (var r = 0, n = new Array(t); r < t; r++)
                n[r] = e[r];
            return n
        }
        function S(e) {
            return (S = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                return typeof e
            }
            : function(e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            }
            )(e)
        }
        function a(e, t) {
            if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function")
        }
        function l(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                n.enumerable = n.enumerable || !1,
                n.configurable = !0,
                "value"in n && (n.writable = !0),
                Object.defineProperty(e, function(e) {
                    e = function(e, t) {
                        if ("object" !== S(e) || null === e)
                            return e;
                        var r = e[Symbol.toPrimitive];
                        if (void 0 === r)
                            return ("string" === t ? String : Number)(e);
                        r = r.call(e, t || "default");
                        if ("object" !== S(r))
                            return r;
                        throw new TypeError("@@toPrimitive must return a primitive value.")
                    }(e, "string");
                    return "symbol" === S(e) ? e : String(e)
                }(n.key), n)
            }
        }
        function p(e, t, r) {
            t && l(e.prototype, t),
            r && l(e, r),
            Object.defineProperty(e, "prototype", {
                writable: !1
            })
        }
        r.Component = function() {
            function n(e, t, r) {
                a(this, n),
                this.name = e,
                this.instanceFactory = t,
                this.type = r,
                this.multipleInstances = !1,
                this.serviceProps = {},
                this.instantiationMode = "LAZY",
                this.onInstanceCreated = null
            }
            return p(n, [{
                key: "setInstantiationMode",
                value: function(e) {
                    return this.instantiationMode = e,
                    this
                }
            }, {
                key: "setMultipleInstances",
                value: function(e) {
                    return this.multipleInstances = e,
                    this
                }
            }, {
                key: "setServiceProps",
                value: function(e) {
                    return this.serviceProps = e,
                    this
                }
            }, {
                key: "setInstanceCreatedCallback",
                value: function(e) {
                    return this.onInstanceCreated = e,
                    this
                }
            }]),
            n
        }();
        var h = "[DEFAULT]"
          , d = function() {
            function r(e, t) {
                a(this, r),
                this.name = e,
                this.container = t,
                this.component = null,
                this.instances = new Map,
                this.instancesDeferred = new Map,
                this.instancesOptions = new Map,
                this.onInitCallbacks = new Map
            }
            var c, e;
            return p(r, [{
                key: "get",
                value: function(e) {
                    e = this.normalizeInstanceIdentifier(e);
                    if (!this.instancesDeferred.has(e)) {
                        var t = new n.Deferred;
                        if (this.instancesDeferred.set(e, t),
                        this.isInitialized(e) || this.shouldAutoInitialize())
                            try {
                                var r = this.getOrInitializeService({
                                    instanceIdentifier: e
                                });
                                r && t.resolve(r)
                            } catch (e) {}
                    }
                    return this.instancesDeferred.get(e).promise
                }
            }, {
                key: "getImmediate",
                value: function(t) {
                    var e = this.normalizeInstanceIdentifier(null == t ? void 0 : t.identifier)
                      , t = null != (t = null == t ? void 0 : t.optional) && t;
                    if (!this.isInitialized(e) && !this.shouldAutoInitialize()) {
                        if (t)
                            return null;
                        throw Error("Service ".concat(this.name, " is not available"))
                    }
                    try {
                        return this.getOrInitializeService({
                            instanceIdentifier: e
                        })
                    } catch (e) {
                        if (t)
                            return null;
                        throw e
                    }
                }
            }, {
                key: "getComponent",
                value: function() {
                    return this.component
                }
            }, {
                key: "setComponent",
                value: function(e) {
                    if (e.name !== this.name)
                        throw Error("Mismatching Component ".concat(e.name, " for Provider ").concat(this.name, "."));
                    if (this.component)
                        throw Error("Component for ".concat(this.name, " has already been provided"));
                    if (this.component = e,
                    this.shouldAutoInitialize()) {
                        if ("EAGER" === e.instantiationMode)
                            try {
                                this.getOrInitializeService({
                                    instanceIdentifier: h
                                })
                            } catch (e) {}
                        var t, r = f(this.instancesDeferred.entries());
                        try {
                            for (r.s(); !(t = r.n()).done; ) {
                                var n = u(t.value, 2)
                                  , o = n[0]
                                  , i = n[1]
                                  , a = this.normalizeInstanceIdentifier(o);
                                try {
                                    var c = this.getOrInitializeService({
                                        instanceIdentifier: a
                                    });
                                    i.resolve(c)
                                } catch (e) {}
                            }
                        } catch (e) {
                            r.e(e)
                        } finally {
                            r.f()
                        }
                    }
                }
            }, {
                key: "clearInstance",
                value: function() {
                    var e = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : h;
                    this.instancesDeferred.delete(e),
                    this.instancesOptions.delete(e),
                    this.instances.delete(e)
                }
            }, {
                key: "delete",
                value: (c = k().mark(function e() {
                    var t;
                    return k().wrap(function(e) {
                        for (; ; )
                            switch (e.prev = e.next) {
                            case 0:
                                return t = Array.from(this.instances.values()),
                                e.next = 3,
                                Promise.all([].concat(o(t.filter(function(e) {
                                    return "INTERNAL"in e
                                }).map(function(e) {
                                    return e.INTERNAL.delete()
                                })), o(t.filter(function(e) {
                                    return "_delete"in e
                                }).map(function(e) {
                                    return e._delete()
                                }))));
                            case 3:
                            case "end":
                                return e.stop()
                            }
                    }, e, this)
                }),
                e = function() {
                    var e = this
                      , a = arguments;
                    return new Promise(function(t, r) {
                        var n = c.apply(e, a);
                        function o(e) {
                            s(n, t, r, o, i, "next", e)
                        }
                        function i(e) {
                            s(n, t, r, o, i, "throw", e)
                        }
                        o(void 0)
                    }
                    )
                }
                ,
                function() {
                    return e.apply(this, arguments)
                }
                )
            }, {
                key: "isComponentSet",
                value: function() {
                    return null != this.component
                }
            }, {
                key: "isInitialized",
                value: function() {
                    return this.instances.has(0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : h)
                }
            }, {
                key: "getOptions",
                value: function() {
                    return this.instancesOptions.get(0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : h) || {}
                }
            }, {
                key: "initialize",
                value: function() {
                    var e = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : {}
                      , t = e.options
                      , t = void 0 === t ? {} : t
                      , r = this.normalizeInstanceIdentifier(e.instanceIdentifier);
                    if (this.isInitialized(r))
                        throw Error("".concat(this.name, "(").concat(r, ") has already been initialized"));
                    if (!this.isComponentSet())
                        throw Error("Component ".concat(this.name, " has not been registered yet"));
                    var n, o = this.getOrInitializeService({
                        instanceIdentifier: r,
                        options: t
                    }), i = f(this.instancesDeferred.entries());
                    try {
                        for (i.s(); !(n = i.n()).done; ) {
                            var a = u(n.value, 2)
                              , c = a[0]
                              , s = a[1];
                            r === this.normalizeInstanceIdentifier(c) && s.resolve(o)
                        }
                    } catch (e) {
                        i.e(e)
                    } finally {
                        i.f()
                    }
                    return o
                }
            }, {
                key: "onInit",
                value: function(e, t) {
                    var t = this.normalizeInstanceIdentifier(t)
                      , r = null != (n = this.onInitCallbacks.get(t)) ? n : new Set
                      , n = (r.add(e),
                    this.onInitCallbacks.set(t, r),
                    this.instances.get(t));
                    return n && e(n, t),
                    function() {
                        r.delete(e)
                    }
                }
            }, {
                key: "invokeOnInitCallbacks",
                value: function(e, t) {
                    var r = this.onInitCallbacks.get(t);
                    if (r) {
                        var n, o = f(r);
                        try {
                            for (o.s(); !(n = o.n()).done; ) {
                                var i = n.value;
                                try {
                                    i(e, t)
                                } catch (e) {}
                            }
                        } catch (e) {
                            o.e(e)
                        } finally {
                            o.f()
                        }
                    }
                }
            }, {
                key: "getOrInitializeService",
                value: function(e) {
                    var t, r = e.instanceIdentifier, e = e.options, e = void 0 === e ? {} : e, n = this.instances.get(r);
                    if (!n && this.component && (n = this.component.instanceFactory(this.container, {
                        instanceIdentifier: (t = r) === h ? void 0 : t,
                        options: e
                    }),
                    this.instances.set(r, n),
                    this.instancesOptions.set(r, e),
                    this.invokeOnInitCallbacks(n, r),
                    this.component.onInstanceCreated))
                        try {
                            this.component.onInstanceCreated(this.container, r, n)
                        } catch (e) {}
                    return n || null
                }
            }, {
                key: "normalizeInstanceIdentifier",
                value: function() {
                    var e = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : h;
                    return !this.component || this.component.multipleInstances ? e : h
                }
            }, {
                key: "shouldAutoInitialize",
                value: function() {
                    return !!this.component && "EXPLICIT" !== this.component.instantiationMode
                }
            }]),
            r
        }();
        r.Provider = d;
        e = function() {
            function t(e) {
                a(this, t),
                this.name = e,
                this.providers = new Map
            }
            return p(t, [{
                key: "addComponent",
                value: function(e) {
                    var t = this.getProvider(e.name);
                    if (t.isComponentSet())
                        throw new Error("Component ".concat(e.name, " has already been registered with ").concat(this.name));
                    t.setComponent(e)
                }
            }, {
                key: "addOrOverwriteComponent",
                value: function(e) {
                    this.getProvider(e.name).isComponentSet() && this.providers.delete(e.name),
                    this.addComponent(e)
                }
            }, {
                key: "getProvider",
                value: function(e) {
                    var t;
                    return this.providers.has(e) ? this.providers.get(e) : (t = new d(e,this),
                    this.providers.set(e, t),
                    t)
                }
            }, {
                key: "getProviders",
                value: function() {
                    return Array.from(this.providers.values())
                }
            }]),
            t
        }();
        r.ComponentContainer = e
    }
    , {
        "@firebase/util": 7
    }],
    4: [function(e, M, t) {
        "use strict";
        Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        t.deleteInstallations = function(e) {
            return we.apply(this, arguments)
        }
        ,
        t.getId = de,
        t.getInstallations = function() {
            var e = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : (0,
            n.getApp)();
            return (0,
            n._getProvider)(e, "installations").getImmediate()
        }
        ,
        t.getToken = ye,
        t.onIdChange = function(e, n) {
            var o = e.appConfig;
            return function(e, t) {
                J();
                var e = E(e)
                  , r = O.get(e);
                r || (r = new Set,
                O.set(e, r));
                r.add(t)
            }(o, n),
            function() {
                var e, t, r;
                t = n,
                e = E(e = o),
                (r = O.get(e)) && (r.delete(t),
                0 === r.size && O.delete(e),
                Y())
            }
        }
        ;
        var r, n = e("@firebase/app"), t = e("@firebase/component"), o = e("@firebase/util"), B = e("idb");
        function k() {
            k = function() {
                return a
            }
            ;
            var a = {}
              , e = Object.prototype
              , s = e.hasOwnProperty
              , u = Object.defineProperty || function(e, t, r) {
                e[t] = r.value
            }
              , t = "function" == typeof Symbol ? Symbol : {}
              , n = t.iterator || "@@iterator"
              , r = t.asyncIterator || "@@asyncIterator"
              , o = t.toStringTag || "@@toStringTag";
            function i(e, t, r) {
                return Object.defineProperty(e, t, {
                    value: r,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }),
                e[t]
            }
            try {
                i({}, "")
            } catch (e) {
                i = function(e, t, r) {
                    return e[t] = r
                }
            }
            function c(e, t, r, n) {
                var o, i, a, c, t = t && t.prototype instanceof p ? t : p, t = Object.create(t.prototype), n = new x(n || []);
                return u(t, "_invoke", {
                    value: (o = e,
                    i = r,
                    a = n,
                    c = "suspendedStart",
                    function(e, t) {
                        if ("executing" === c)
                            throw new Error("Generator is already running");
                        if ("completed" === c) {
                            if ("throw" === e)
                                throw t;
                            return E()
                        }
                        for (a.method = e,
                        a.arg = t; ; ) {
                            var r = a.delegate;
                            if (r) {
                                r = function e(t, r) {
                                    var n = r.method
                                      , o = t.iterator[n];
                                    if (void 0 === o)
                                        return r.delegate = null,
                                        "throw" === n && t.iterator.return && (r.method = "return",
                                        r.arg = void 0,
                                        e(t, r),
                                        "throw" === r.method) || "return" !== n && (r.method = "throw",
                                        r.arg = new TypeError("The iterator does not provide a '" + n + "' method")),
                                        l;
                                    n = f(o, t.iterator, r.arg);
                                    if ("throw" === n.type)
                                        return r.method = "throw",
                                        r.arg = n.arg,
                                        r.delegate = null,
                                        l;
                                    o = n.arg;
                                    return o ? o.done ? (r[t.resultName] = o.value,
                                    r.next = t.nextLoc,
                                    "return" !== r.method && (r.method = "next",
                                    r.arg = void 0),
                                    r.delegate = null,
                                    l) : o : (r.method = "throw",
                                    r.arg = new TypeError("iterator result is not an object"),
                                    r.delegate = null,
                                    l)
                                }(r, a);
                                if (r) {
                                    if (r === l)
                                        continue;
                                    return r
                                }
                            }
                            if ("next" === a.method)
                                a.sent = a._sent = a.arg;
                            else if ("throw" === a.method) {
                                if ("suspendedStart" === c)
                                    throw c = "completed",
                                    a.arg;
                                a.dispatchException(a.arg)
                            } else
                                "return" === a.method && a.abrupt("return", a.arg);
                            c = "executing";
                            r = f(o, i, a);
                            if ("normal" === r.type) {
                                if (c = a.done ? "completed" : "suspendedYield",
                                r.arg === l)
                                    continue;
                                return {
                                    value: r.arg,
                                    done: a.done
                                }
                            }
                            "throw" === r.type && (c = "completed",
                            a.method = "throw",
                            a.arg = r.arg)
                        }
                    }
                    )
                }),
                t
            }
            function f(e, t, r) {
                try {
                    return {
                        type: "normal",
                        arg: e.call(t, r)
                    }
                } catch (e) {
                    return {
                        type: "throw",
                        arg: e
                    }
                }
            }
            a.wrap = c;
            var l = {};
            function p() {}
            function h() {}
            function d() {}
            var t = {}
              , v = (i(t, n, function() {
                return this
            }),
            Object.getPrototypeOf)
              , v = v && v(v(_([])))
              , y = (v && v !== e && s.call(v, n) && (t = v),
            d.prototype = p.prototype = Object.create(t));
            function g(e) {
                ["next", "throw", "return"].forEach(function(t) {
                    i(e, t, function(e) {
                        return this._invoke(t, e)
                    })
                })
            }
            function b(a, c) {
                var t;
                u(this, "_invoke", {
                    value: function(r, n) {
                        function e() {
                            return new c(function(e, t) {
                                !function t(e, r, n, o) {
                                    var i, e = f(a[e], a, r);
                                    if ("throw" !== e.type)
                                        return (r = (i = e.arg).value) && "object" == S(r) && s.call(r, "__await") ? c.resolve(r.__await).then(function(e) {
                                            t("next", e, n, o)
                                        }, function(e) {
                                            t("throw", e, n, o)
                                        }) : c.resolve(r).then(function(e) {
                                            i.value = e,
                                            n(i)
                                        }, function(e) {
                                            return t("throw", e, n, o)
                                        });
                                    o(e.arg)
                                }(r, n, e, t)
                            }
                            )
                        }
                        return t = t ? t.then(e, e) : e()
                    }
                })
            }
            function m(e) {
                var t = {
                    tryLoc: e[0]
                };
                1 in e && (t.catchLoc = e[1]),
                2 in e && (t.finallyLoc = e[2],
                t.afterLoc = e[3]),
                this.tryEntries.push(t)
            }
            function w(e) {
                var t = e.completion || {};
                t.type = "normal",
                delete t.arg,
                e.completion = t
            }
            function x(e) {
                this.tryEntries = [{
                    tryLoc: "root"
                }],
                e.forEach(m, this),
                this.reset(!0)
            }
            function _(t) {
                if (t) {
                    var r, e = t[n];
                    if (e)
                        return e.call(t);
                    if ("function" == typeof t.next)
                        return t;
                    if (!isNaN(t.length))
                        return r = -1,
                        (e = function e() {
                            for (; ++r < t.length; )
                                if (s.call(t, r))
                                    return e.value = t[r],
                                    e.done = !1,
                                    e;
                            return e.value = void 0,
                            e.done = !0,
                            e
                        }
                        ).next = e
                }
                return {
                    next: E
                }
            }
            function E() {
                return {
                    value: void 0,
                    done: !0
                }
            }
            return u(y, "constructor", {
                value: h.prototype = d,
                configurable: !0
            }),
            u(d, "constructor", {
                value: h,
                configurable: !0
            }),
            h.displayName = i(d, o, "GeneratorFunction"),
            a.isGeneratorFunction = function(e) {
                e = "function" == typeof e && e.constructor;
                return !!e && (e === h || "GeneratorFunction" === (e.displayName || e.name))
            }
            ,
            a.mark = function(e) {
                return Object.setPrototypeOf ? Object.setPrototypeOf(e, d) : (e.__proto__ = d,
                i(e, o, "GeneratorFunction")),
                e.prototype = Object.create(y),
                e
            }
            ,
            a.awrap = function(e) {
                return {
                    __await: e
                }
            }
            ,
            g(b.prototype),
            i(b.prototype, r, function() {
                return this
            }),
            a.AsyncIterator = b,
            a.async = function(e, t, r, n, o) {
                void 0 === o && (o = Promise);
                var i = new b(c(e, t, r, n),o);
                return a.isGeneratorFunction(t) ? i : i.next().then(function(e) {
                    return e.done ? e.value : i.next()
                })
            }
            ,
            g(y),
            i(y, o, "Generator"),
            i(y, n, function() {
                return this
            }),
            i(y, "toString", function() {
                return "[object Generator]"
            }),
            a.keys = function(e) {
                var t, r = Object(e), n = [];
                for (t in r)
                    n.push(t);
                return n.reverse(),
                function e() {
                    for (; n.length; ) {
                        var t = n.pop();
                        if (t in r)
                            return e.value = t,
                            e.done = !1,
                            e
                    }
                    return e.done = !0,
                    e
                }
            }
            ,
            a.values = _,
            x.prototype = {
                constructor: x,
                reset: function(e) {
                    if (this.prev = 0,
                    this.next = 0,
                    this.sent = this._sent = void 0,
                    this.done = !1,
                    this.delegate = null,
                    this.method = "next",
                    this.arg = void 0,
                    this.tryEntries.forEach(w),
                    !e)
                        for (var t in this)
                            "t" === t.charAt(0) && s.call(this, t) && !isNaN(+t.slice(1)) && (this[t] = void 0)
                },
                stop: function() {
                    this.done = !0;
                    var e = this.tryEntries[0].completion;
                    if ("throw" === e.type)
                        throw e.arg;
                    return this.rval
                },
                dispatchException: function(r) {
                    if (this.done)
                        throw r;
                    var n = this;
                    function e(e, t) {
                        return i.type = "throw",
                        i.arg = r,
                        n.next = e,
                        t && (n.method = "next",
                        n.arg = void 0),
                        !!t
                    }
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var o = this.tryEntries[t]
                          , i = o.completion;
                        if ("root" === o.tryLoc)
                            return e("end");
                        if (o.tryLoc <= this.prev) {
                            var a = s.call(o, "catchLoc")
                              , c = s.call(o, "finallyLoc");
                            if (a && c) {
                                if (this.prev < o.catchLoc)
                                    return e(o.catchLoc, !0);
                                if (this.prev < o.finallyLoc)
                                    return e(o.finallyLoc)
                            } else if (a) {
                                if (this.prev < o.catchLoc)
                                    return e(o.catchLoc, !0)
                            } else {
                                if (!c)
                                    throw new Error("try statement without catch or finally");
                                if (this.prev < o.finallyLoc)
                                    return e(o.finallyLoc)
                            }
                        }
                    }
                },
                abrupt: function(e, t) {
                    for (var r = this.tryEntries.length - 1; 0 <= r; --r) {
                        var n = this.tryEntries[r];
                        if (n.tryLoc <= this.prev && s.call(n, "finallyLoc") && this.prev < n.finallyLoc) {
                            var o = n;
                            break
                        }
                    }
                    var i = (o = o && ("break" === e || "continue" === e) && o.tryLoc <= t && t <= o.finallyLoc ? null : o) ? o.completion : {};
                    return i.type = e,
                    i.arg = t,
                    o ? (this.method = "next",
                    this.next = o.finallyLoc,
                    l) : this.complete(i)
                },
                complete: function(e, t) {
                    if ("throw" === e.type)
                        throw e.arg;
                    return "break" === e.type || "continue" === e.type ? this.next = e.arg : "return" === e.type ? (this.rval = this.arg = e.arg,
                    this.method = "return",
                    this.next = "end") : "normal" === e.type && t && (this.next = t),
                    l
                },
                finish: function(e) {
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var r = this.tryEntries[t];
                        if (r.finallyLoc === e)
                            return this.complete(r.completion, r.afterLoc),
                            w(r),
                            l
                    }
                },
                catch: function(e) {
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var r, n, o = this.tryEntries[t];
                        if (o.tryLoc === e)
                            return "throw" === (r = o.completion).type && (n = r.arg,
                            w(o)),
                            n
                    }
                    throw new Error("illegal catch attempt")
                },
                delegateYield: function(e, t, r) {
                    return this.delegate = {
                        iterator: _(e),
                        resultName: t,
                        nextLoc: r
                    },
                    "next" === this.method && (this.arg = void 0),
                    l
                }
            },
            a
        }
        function S(e) {
            return (S = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                return typeof e
            }
            : function(e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            }
            )(e)
        }
        function F(e) {
            return function(e) {
                if (Array.isArray(e))
                    return i(e)
            }(e) || function(e) {
                if ("undefined" != typeof Symbol && null != e[Symbol.iterator] || null != e["@@iterator"])
                    return Array.from(e)
            }(e) || c(e) || function() {
                throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
            }()
        }
        function c(e, t) {
            var r;
            if (e)
                return "string" == typeof e ? i(e, t) : "Map" === (r = "Object" === (r = Object.prototype.toString.call(e).slice(8, -1)) && e.constructor ? e.constructor.name : r) || "Set" === r ? Array.from(e) : "Arguments" === r || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r) ? i(e, t) : void 0
        }
        function i(e, t) {
            (null == t || t > e.length) && (t = e.length);
            for (var r = 0, n = new Array(t); r < t; r++)
                n[r] = e[r];
            return n
        }
        function s(e, t, r, n, o, i, a) {
            try {
                var c = e[i](a)
                  , s = c.value
            } catch (e) {
                return void r(e)
            }
            c.done ? t(s) : Promise.resolve(s).then(n, o)
        }
        function a(c) {
            return function() {
                var e = this
                  , a = arguments;
                return new Promise(function(t, r) {
                    var n = c.apply(e, a);
                    function o(e) {
                        s(n, t, r, o, i, "next", e)
                    }
                    function i(e) {
                        s(n, t, r, o, i, "throw", e)
                    }
                    o(void 0)
                }
                )
            }
        }
        function u(e, t, r) {
            (t = function(e) {
                e = function(e, t) {
                    if ("object" !== S(e) || null === e)
                        return e;
                    var r = e[Symbol.toPrimitive];
                    if (void 0 === r)
                        return ("string" === t ? String : Number)(e);
                    r = r.call(e, t || "default");
                    if ("object" !== S(r))
                        return r;
                    throw new TypeError("@@toPrimitive must return a primitive value.")
                }(e, "string");
                return "symbol" === S(e) ? e : String(e)
            }(t))in e ? Object.defineProperty(e, t, {
                value: r,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = r
        }
        var e = "@firebase/installations"
          , f = "0.6.4"
          , l = 1e4
          , p = "w:".concat(f)
          , h = "FIS_v2"
          , R = "https://firebaseinstallations.googleapis.com/v1"
          , H = 36e5;
        u(r = {}, "missing-app-config-values", 'Missing App configuration value: "{$valueName}"'),
        u(r, "not-registered", "Firebase Installation is not registered."),
        u(r, "installation-not-found", "Firebase Installation not found."),
        u(r, "request-failed", '{$requestName} request failed with error "{$serverCode} {$serverStatus}: {$serverMessage}"'),
        u(r, "app-offline", "Could not process request. Application offline."),
        u(r, "delete-pending-registration", "Can't delete installation while there is a pending registration request.");
        var d = new o.ErrorFactory("installations","Installations",r);
        function v(e) {
            return e instanceof o.FirebaseError && e.code.includes("request-failed")
        }
        function y(e) {
            e = e.projectId;
            return "".concat(R, "/projects/").concat(e, "/installations")
        }
        function g(e) {
            return {
                token: e.token,
                requestStatus: 2,
                expiresIn: (e = e.expiresIn,
                Number(e.replace("s", "000"))),
                creationTime: Date.now()
            }
        }
        function b() {
            return m.apply(this, arguments)
        }
        function m() {
            return (m = a(k().mark(function e(t, r) {
                var n;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            r.json();
                        case 2:
                            return n = e.sent,
                            n = n.error,
                            e.abrupt("return", d.create("request-failed", {
                                requestName: t,
                                serverCode: n.code,
                                serverMessage: n.message,
                                serverStatus: n.status
                            }));
                        case 5:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function w(e) {
            e = e.apiKey;
            return new Headers({
                "Content-Type": "application/json",
                Accept: "application/json",
                "x-goog-api-key": e
            })
        }
        function G(e, t) {
            var t = t.refreshToken
              , e = w(e);
            return e.append("Authorization", (t = t,
            "".concat(h, " ").concat(t))),
            e
        }
        function x() {
            return V.apply(this, arguments)
        }
        function V() {
            return (V = a(k().mark(function e(t) {
                var r;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            t();
                        case 2:
                            if (500 <= (r = e.sent).status && r.status < 600)
                                return e.abrupt("return", t());
                            e.next = 5;
                            break;
                        case 5:
                            return e.abrupt("return", r);
                        case 6:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function U() {
            return (U = a(k().mark(function e(t, r) {
                var n, o, i, a, c, s, u, f, l;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            if (n = t.appConfig,
                            c = t.heartbeatServiceProvider,
                            o = r.fid,
                            i = y(n),
                            a = w(n),
                            c = c.getImmediate({
                                optional: !0
                            }))
                                return e.next = 8,
                                c.getHeartbeatsHeader();
                            e.next = 10;
                            break;
                        case 8:
                            (c = e.sent) && a.append("x-firebase-client", c);
                        case 10:
                            return f = {
                                fid: o,
                                authVersion: h,
                                appId: n.appId,
                                sdkVersion: p
                            },
                            s = {
                                method: "POST",
                                headers: a,
                                body: JSON.stringify(f)
                            },
                            e.next = 14,
                            x(function() {
                                return fetch(i, s)
                            });
                        case 14:
                            if ((u = e.sent).ok)
                                return e.next = 18,
                                u.json();
                            e.next = 23;
                            break;
                        case 18:
                            return f = e.sent,
                            l = {
                                fid: f.fid || o,
                                registrationStatus: 2,
                                refreshToken: f.refreshToken,
                                authToken: g(f.authToken)
                            },
                            e.abrupt("return", l);
                        case 23:
                            return e.next = 25,
                            b("Create Installation", u);
                        case 25:
                            throw e.sent;
                        case 26:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function W(t) {
            return new Promise(function(e) {
                setTimeout(e, t)
            }
            )
        }
        var K = /^[cdef][\w-]{21}$/
          , _ = "";
        function z() {
            try {
                var e = new Uint8Array(17)
                  , t = ((self.crypto || self.msCrypto).getRandomValues(e),
                e[0] = 112 + e[0] % 16,
                function(e) {
                    return btoa(String.fromCharCode.apply(String, F(e))).replace(/\+/g, "-").replace(/\//g, "_")
                }(e).substr(0, 22));
                return K.test(t) ? t : _
            } catch (e) {
                return _
            }
        }
        function E(e) {
            return "".concat(e.appName, "!").concat(e.appId)
        }
        var O = new Map;
        function q(e, t) {
            var e = E(e)
              , r = ($(e, t),
            J());
            r && r.postMessage({
                key: e,
                fid: t
            }),
            Y()
        }
        function $(e, t) {
            e = O.get(e);
            if (e) {
                var r, n = function(e, t) {
                    var r, n, o, i, a = "undefined" != typeof Symbol && e[Symbol.iterator] || e["@@iterator"];
                    if (a)
                        return n = !(r = !0),
                        {
                            s: function() {
                                a = a.call(e)
                            },
                            n: function() {
                                var e = a.next();
                                return r = e.done,
                                e
                            },
                            e: function(e) {
                                n = !0,
                                o = e
                            },
                            f: function() {
                                try {
                                    r || null == a.return || a.return()
                                } finally {
                                    if (n)
                                        throw o
                                }
                            }
                        };
                    if (Array.isArray(e) || (a = c(e)) || t && e && "number" == typeof e.length)
                        return a && (e = a),
                        i = 0,
                        {
                            s: t = function() {}
                            ,
                            n: function() {
                                return i >= e.length ? {
                                    done: !0
                                } : {
                                    done: !1,
                                    value: e[i++]
                                }
                            },
                            e: function(e) {
                                throw e
                            },
                            f: t
                        };
                    throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                }(e);
                try {
                    for (n.s(); !(r = n.n()).done; )
                        (0,
                        r.value)(t)
                } catch (e) {
                    n.e(e)
                } finally {
                    n.f()
                }
            }
        }
        var L = null;
        function J() {
            return !L && "BroadcastChannel"in self && ((L = new BroadcastChannel("[Firebase] FID Change")).onmessage = function(e) {
                $(e.data.key, e.data.fid)
            }
            ),
            L
        }
        function Y() {
            0 === O.size && L && (L.close(),
            L = null)
        }
        var X = "firebase-installations-database"
          , Q = 1
          , j = "firebase-installations-store"
          , Z = null;
        function I() {
            return Z = Z || (0,
            B.openDB)(X, Q, {
                upgrade: function(e, t) {
                    0 === t && e.createObjectStore(j)
                }
            })
        }
        function A() {
            return ee.apply(this, arguments)
        }
        function ee() {
            return (ee = a(k().mark(function e(t, r) {
                var n, o, i, a;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return n = E(t),
                            e.next = 3,
                            I();
                        case 3:
                            return o = e.sent,
                            o = o.transaction(j, "readwrite"),
                            i = o.objectStore(j),
                            e.next = 8,
                            i.get(n);
                        case 8:
                            return a = e.sent,
                            e.next = 11,
                            i.put(r, n);
                        case 11:
                            return e.next = 13,
                            o.done;
                        case 13:
                            return a && a.fid === r.fid || q(t, r.fid),
                            e.abrupt("return", r);
                        case 15:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function P() {
            return te.apply(this, arguments)
        }
        function te() {
            return (te = a(k().mark(function e(t) {
                var r, n;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return r = E(t),
                            e.next = 3,
                            I();
                        case 3:
                            return n = e.sent,
                            n = n.transaction(j, "readwrite"),
                            e.next = 7,
                            n.objectStore(j).delete(r);
                        case 7:
                            return e.next = 9,
                            n.done;
                        case 9:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function T() {
            return re.apply(this, arguments)
        }
        function re() {
            return (re = a(k().mark(function e(t, r) {
                var n, o, i, a, c;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return n = E(t),
                            e.next = 3,
                            I();
                        case 3:
                            return o = e.sent,
                            o = o.transaction(j, "readwrite"),
                            i = o.objectStore(j),
                            e.next = 8,
                            i.get(n);
                        case 8:
                            if (a = e.sent,
                            void 0 === (c = r(a)))
                                return e.next = 13,
                                i.delete(n);
                            e.next = 15;
                            break;
                        case 13:
                            e.next = 17;
                            break;
                        case 15:
                            return e.next = 17,
                            i.put(c, n);
                        case 17:
                            return e.next = 19,
                            o.done;
                        case 19:
                            return !c || a && a.fid === c.fid || q(t, c.fid),
                            e.abrupt("return", c);
                        case 21:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function C() {
            return ne.apply(this, arguments)
        }
        function ne() {
            return (ne = a(k().mark(function e(t) {
                var r, n;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            T(t.appConfig, function(e) {
                                e = ce(e || {
                                    fid: z(),
                                    registrationStatus: 0
                                }),
                                e = function(e, t) {
                                    {
                                        var r, n;
                                        return 0 === t.registrationStatus ? navigator.onLine ? (r = {
                                            fid: t.fid,
                                            registrationStatus: 1,
                                            registrationTime: Date.now()
                                        },
                                        n = function() {
                                            return oe.apply(this, arguments)
                                        }(e, r),
                                        {
                                            installationEntry: r,
                                            registrationPromise: n
                                        }) : (r = Promise.reject(d.create("app-offline")),
                                        {
                                            installationEntry: t,
                                            registrationPromise: r
                                        }) : 1 === t.registrationStatus ? {
                                            installationEntry: t,
                                            registrationPromise: function() {
                                                return ie.apply(this, arguments)
                                            }(e)
                                        } : {
                                            installationEntry: t
                                        }
                                    }
                                }(t, e);
                                return r = e.registrationPromise,
                                e.installationEntry
                            });
                        case 2:
                            if ((n = e.sent).fid === _)
                                return e.next = 6,
                                r;
                            e.next = 8;
                            break;
                        case 6:
                            return e.t0 = e.sent,
                            e.abrupt("return", {
                                installationEntry: e.t0
                            });
                        case 8:
                            return e.abrupt("return", {
                                installationEntry: n,
                                registrationPromise: r
                            });
                        case 9:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function oe() {
            return (oe = a(k().mark(function e(t, r) {
                var n;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.prev = 0,
                            e.next = 3,
                            function() {
                                return U.apply(this, arguments)
                            }(t, r);
                        case 3:
                            return n = e.sent,
                            e.abrupt("return", A(t.appConfig, n));
                        case 7:
                            if (e.prev = 7,
                            e.t0 = e.catch(0),
                            v(e.t0) && 409 === e.t0.customData.serverCode)
                                return e.next = 12,
                                P(t.appConfig);
                            e.next = 14;
                            break;
                        case 12:
                            e.next = 16;
                            break;
                        case 14:
                            return e.next = 16,
                            A(t.appConfig, {
                                fid: r.fid,
                                registrationStatus: 0
                            });
                        case 16:
                            throw e.t0;
                        case 17:
                        case "end":
                            return e.stop()
                        }
                }, e, null, [[0, 7]])
            }))).apply(this, arguments)
        }
        function ie() {
            return (ie = a(k().mark(function e(t) {
                var r, n, o;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            ae(t.appConfig);
                        case 2:
                            r = e.sent;
                        case 3:
                            if (1 === r.registrationStatus)
                                return e.next = 6,
                                W(100);
                            e.next = 11;
                            break;
                        case 6:
                            return e.next = 8,
                            ae(t.appConfig);
                        case 8:
                            r = e.sent,
                            e.next = 3;
                            break;
                        case 11:
                            if (0 === r.registrationStatus)
                                return e.next = 14,
                                C(t);
                            e.next = 22;
                            break;
                        case 14:
                            if (o = e.sent,
                            n = o.installationEntry,
                            o = o.registrationPromise)
                                return e.abrupt("return", o);
                            e.next = 21;
                            break;
                        case 21:
                            return e.abrupt("return", n);
                        case 22:
                            return e.abrupt("return", r);
                        case 23:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function ae(e) {
            return T(e, function(e) {
                if (e)
                    return ce(e);
                throw d.create("installation-not-found")
            })
        }
        function ce(e) {
            var t;
            return 1 === (t = e).registrationStatus && t.registrationTime + l < Date.now() ? {
                fid: e.fid,
                registrationStatus: 0
            } : e
        }
        function se() {
            return (se = a(k().mark(function e(t, r) {
                var n, o, i, a, c, s, u, f;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            if (n = t.appConfig,
                            a = t.heartbeatServiceProvider,
                            o = function(e, t) {
                                t = t.fid;
                                return "".concat(y(e), "/").concat(t, "/authTokens:generate")
                            }(n, r),
                            i = G(n, r),
                            a = a.getImmediate({
                                optional: !0
                            }))
                                return e.next = 7,
                                a.getHeartbeatsHeader();
                            e.next = 9;
                            break;
                        case 7:
                            (a = e.sent) && i.append("x-firebase-client", a);
                        case 9:
                            return u = {
                                installation: {
                                    sdkVersion: p,
                                    appId: n.appId
                                }
                            },
                            c = {
                                method: "POST",
                                headers: i,
                                body: JSON.stringify(u)
                            },
                            e.next = 13,
                            x(function() {
                                return fetch(o, c)
                            });
                        case 13:
                            if ((s = e.sent).ok)
                                return e.next = 17,
                                s.json();
                            e.next = 22;
                            break;
                        case 17:
                            return u = e.sent,
                            f = g(u),
                            e.abrupt("return", f);
                        case 22:
                            return e.next = 24,
                            b("Generate Auth Token", s);
                        case 24:
                            throw e.sent;
                        case 25:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function D() {
            return ue.apply(this, arguments)
        }
        function ue() {
            return (ue = a(k().mark(function e(n) {
                var o, i, t, r, a = arguments;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return o = 1 < a.length && void 0 !== a[1] && a[1],
                            e.next = 3,
                            T(n.appConfig, function(e) {
                                if (!he(e))
                                    throw d.create("not-registered");
                                var t, r = e.authToken;
                                if (o || 2 !== (t = r).requestStatus || function(e) {
                                    var t = Date.now();
                                    return t < e.creationTime || e.creationTime + e.expiresIn < t + H
                                }(t)) {
                                    if (1 === r.requestStatus)
                                        return i = function() {
                                            return fe.apply(this, arguments)
                                        }(n, o),
                                        e;
                                    if (navigator.onLine)
                                        return t = e,
                                        r = {
                                            requestStatus: 1,
                                            requestTime: Date.now()
                                        },
                                        r = Object.assign(Object.assign({}, t), {
                                            authToken: r
                                        }),
                                        i = function() {
                                            return pe.apply(this, arguments)
                                        }(n, r),
                                        r;
                                    throw d.create("app-offline")
                                }
                                return e
                            });
                        case 3:
                            if (t = e.sent,
                            i)
                                return e.next = 7,
                                i;
                            e.next = 10;
                            break;
                        case 7:
                            e.t0 = e.sent,
                            e.next = 11;
                            break;
                        case 10:
                            e.t0 = t.authToken;
                        case 11:
                            return r = e.t0,
                            e.abrupt("return", r);
                        case 13:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function fe() {
            return (fe = a(k().mark(function e(t, r) {
                var n, o;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            le(t.appConfig);
                        case 2:
                            n = e.sent;
                        case 3:
                            if (1 === n.authToken.requestStatus)
                                return e.next = 6,
                                W(100);
                            e.next = 11;
                            break;
                        case 6:
                            return e.next = 8,
                            le(t.appConfig);
                        case 8:
                            n = e.sent,
                            e.next = 3;
                            break;
                        case 11:
                            if (0 === (o = n.authToken).requestStatus)
                                return e.abrupt("return", D(t, r));
                            e.next = 16;
                            break;
                        case 16:
                            return e.abrupt("return", o);
                        case 17:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function le(e) {
            return T(e, function(e) {
                var t;
                if (he(e))
                    return t = e.authToken,
                    1 === (t = t).requestStatus && t.requestTime + l < Date.now() ? Object.assign(Object.assign({}, e), {
                        authToken: {
                            requestStatus: 0
                        }
                    }) : e;
                throw d.create("not-registered")
            })
        }
        function pe() {
            return (pe = a(k().mark(function e(t, r) {
                var n, o;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.prev = 0,
                            e.next = 3,
                            function() {
                                return se.apply(this, arguments)
                            }(t, r);
                        case 3:
                            return n = e.sent,
                            o = Object.assign(Object.assign({}, r), {
                                authToken: n
                            }),
                            e.next = 7,
                            A(t.appConfig, o);
                        case 7:
                            return e.abrupt("return", n);
                        case 10:
                            if (e.prev = 10,
                            e.t0 = e.catch(0),
                            !v(e.t0) || 401 !== e.t0.customData.serverCode && 404 !== e.t0.customData.serverCode) {
                                e.next = 17;
                                break
                            }
                            return e.next = 15,
                            P(t.appConfig);
                        case 15:
                            e.next = 20;
                            break;
                        case 17:
                            return o = Object.assign(Object.assign({}, r), {
                                authToken: {
                                    requestStatus: 0
                                }
                            }),
                            e.next = 20,
                            A(t.appConfig, o);
                        case 20:
                            throw e.t0;
                        case 21:
                        case "end":
                            return e.stop()
                        }
                }, e, null, [[0, 10]])
            }))).apply(this, arguments)
        }
        function he(e) {
            return void 0 !== e && 2 === e.registrationStatus
        }
        function de(e) {
            return ve.apply(this, arguments)
        }
        function ve() {
            return (ve = a(k().mark(function e(t) {
                var r, n, o;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return r = t,
                            e.next = 3,
                            C(r);
                        case 3:
                            return n = e.sent,
                            o = n.installationEntry,
                            (n.registrationPromise || D(r)).catch(console.error),
                            e.abrupt("return", o.fid);
                        case 8:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function ye(e) {
            return ge.apply(this, arguments)
        }
        function ge() {
            return (ge = a(k().mark(function e(t) {
                var r, n, o, i = arguments;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return r = 1 < i.length && void 0 !== i[1] && i[1],
                            n = t,
                            e.next = 4,
                            function() {
                                return be.apply(this, arguments)
                            }(n);
                        case 4:
                            return e.next = 6,
                            D(n, r);
                        case 6:
                            return o = e.sent,
                            e.abrupt("return", o.token);
                        case 8:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function be() {
            return (be = a(k().mark(function e(t) {
                var r;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            C(t);
                        case 2:
                            if (r = e.sent,
                            r = r.registrationPromise)
                                return e.next = 7,
                                r;
                            e.next = 7;
                            break;
                        case 7:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function me() {
            return (me = a(k().mark(function e(t, r) {
                var n, o, i;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return n = function(e, t) {
                                t = t.fid;
                                return "".concat(y(e), "/").concat(t)
                            }(t, r),
                            i = G(t, r),
                            o = {
                                method: "DELETE",
                                headers: i
                            },
                            e.next = 5,
                            x(function() {
                                return fetch(n, o)
                            });
                        case 5:
                            if ((i = e.sent).ok) {
                                e.next = 10;
                                break
                            }
                            return e.next = 9,
                            b("Delete Installation", i);
                        case 9:
                            throw e.sent;
                        case 10:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function we() {
            return (we = a(k().mark(function e(t) {
                var r, n;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return r = t.appConfig,
                            e.next = 3,
                            T(r, function(e) {
                                if (!e || 0 !== e.registrationStatus)
                                    return e
                            });
                        case 3:
                            if (n = e.sent) {
                                if (1 === n.registrationStatus)
                                    throw d.create("delete-pending-registration");
                                e.next = 9
                            } else
                                e.next = 18;
                            break;
                        case 9:
                            if (2 !== n.registrationStatus) {
                                e.next = 18;
                                break
                            }
                            if (navigator.onLine) {
                                e.next = 14;
                                break
                            }
                            throw d.create("app-offline");
                        case 14:
                            return e.next = 16,
                            function() {
                                return me.apply(this, arguments)
                            }(r, n);
                        case 16:
                            return e.next = 18,
                            P(r);
                        case 18:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function N(e) {
            return d.create("missing-app-config-values", {
                valueName: e
            })
        }
        function xe(e) {
            var e = e.getProvider("app").getImmediate()
              , t = (0,
            n._getProvider)(e, _e).getImmediate();
            return {
                getId: function() {
                    return de(t)
                },
                getToken: function(e) {
                    return ye(t, e)
                }
            }
        }
        var _e = "installations";
        (0,
        n._registerComponent)(new t.Component(_e,function(e) {
            e = e.getProvider("app").getImmediate();
            return {
                app: e,
                appConfig: function(e) {
                    if (!e || !e.options)
                        throw N("App Configuration");
                    if (!e.name)
                        throw N("App Name");
                    for (var t = 0, r = ["projectId", "apiKey", "appId"]; t < r.length; t++) {
                        var n = r[t];
                        if (!e.options[n])
                            throw N(n)
                    }
                    return {
                        appName: e.name,
                        projectId: e.options.projectId,
                        apiKey: e.options.apiKey,
                        appId: e.options.appId
                    }
                }(e),
                heartbeatServiceProvider: (0,
                n._getProvider)(e, "heartbeat"),
                _delete: function() {
                    return Promise.resolve()
                }
            }
        }
        ,"PUBLIC")),
        (0,
        n._registerComponent)(new t.Component("installations-internal",xe,"PRIVATE")),
        (0,
        n.registerVersion)(e, f),
        (0,
        n.registerVersion)(e, f, "esm2017")
    }
    , {
        "@firebase/app": 2,
        "@firebase/component": 3,
        "@firebase/util": 7,
        idb: 10
    }],
    5: [function(e, t, c) {
        "use strict";
        Object.defineProperty(c, "__esModule", {
            value: !0
        });
        function r(e, t) {
            for (var r = [], n = 2; n < arguments.length; n++)
                r[n - 2] = arguments[n];
            if (!(t < e.logLevel)) {
                var o = (new Date).toISOString()
                  , i = s[t];
                if (!i)
                    throw new Error("Attempted to log a message with an invalid logType (value: ".concat(t, ")"));
                console[i].apply(console, a.__spreadArray(["[".concat(o, "]  ").concat(e.name, ":")], r, !1))
            }
        }
        var a = e("tslib")
          , n = []
          , o = (c.LogLevel = void 0,
        (e = c.LogLevel || (c.LogLevel = {}))[e.DEBUG = 0] = "DEBUG",
        e[e.VERBOSE = 1] = "VERBOSE",
        e[e.INFO = 2] = "INFO",
        e[e.WARN = 3] = "WARN",
        e[e.ERROR = 4] = "ERROR",
        e[e.SILENT = 5] = "SILENT",
        {
            debug: c.LogLevel.DEBUG,
            verbose: c.LogLevel.VERBOSE,
            info: c.LogLevel.INFO,
            warn: c.LogLevel.WARN,
            error: c.LogLevel.ERROR,
            silent: c.LogLevel.SILENT
        })
          , i = c.LogLevel.INFO
          , s = ((e = {})[c.LogLevel.DEBUG] = "log",
        e[c.LogLevel.VERBOSE] = "log",
        e[c.LogLevel.INFO] = "info",
        e[c.LogLevel.WARN] = "warn",
        e[c.LogLevel.ERROR] = "error",
        e);
        function u(e) {
            this.name = e,
            this._logLevel = i,
            this._logHandler = r,
            this._userLogHandler = null,
            n.push(this)
        }
        Object.defineProperty(u.prototype, "logLevel", {
            get: function() {
                return this._logLevel
            },
            set: function(e) {
                if (!(e in c.LogLevel))
                    throw new TypeError('Invalid value "'.concat(e, '" assigned to `logLevel`'));
                this._logLevel = e
            },
            enumerable: !1,
            configurable: !0
        }),
        u.prototype.setLogLevel = function(e) {
            this._logLevel = "string" == typeof e ? o[e] : e
        }
        ,
        Object.defineProperty(u.prototype, "logHandler", {
            get: function() {
                return this._logHandler
            },
            set: function(e) {
                if ("function" != typeof e)
                    throw new TypeError("Value assigned to `logHandler` must be a function");
                this._logHandler = e
            },
            enumerable: !1,
            configurable: !0
        }),
        Object.defineProperty(u.prototype, "userLogHandler", {
            get: function() {
                return this._userLogHandler
            },
            set: function(e) {
                this._userLogHandler = e
            },
            enumerable: !1,
            configurable: !0
        }),
        u.prototype.debug = function() {
            for (var e = [], t = 0; t < arguments.length; t++)
                e[t] = arguments[t];
            this._userLogHandler && this._userLogHandler.apply(this, a.__spreadArray([this, c.LogLevel.DEBUG], e, !1)),
            this._logHandler.apply(this, a.__spreadArray([this, c.LogLevel.DEBUG], e, !1))
        }
        ,
        u.prototype.log = function() {
            for (var e = [], t = 0; t < arguments.length; t++)
                e[t] = arguments[t];
            this._userLogHandler && this._userLogHandler.apply(this, a.__spreadArray([this, c.LogLevel.VERBOSE], e, !1)),
            this._logHandler.apply(this, a.__spreadArray([this, c.LogLevel.VERBOSE], e, !1))
        }
        ,
        u.prototype.info = function() {
            for (var e = [], t = 0; t < arguments.length; t++)
                e[t] = arguments[t];
            this._userLogHandler && this._userLogHandler.apply(this, a.__spreadArray([this, c.LogLevel.INFO], e, !1)),
            this._logHandler.apply(this, a.__spreadArray([this, c.LogLevel.INFO], e, !1))
        }
        ,
        u.prototype.warn = function() {
            for (var e = [], t = 0; t < arguments.length; t++)
                e[t] = arguments[t];
            this._userLogHandler && this._userLogHandler.apply(this, a.__spreadArray([this, c.LogLevel.WARN], e, !1)),
            this._logHandler.apply(this, a.__spreadArray([this, c.LogLevel.WARN], e, !1))
        }
        ,
        u.prototype.error = function() {
            for (var e = [], t = 0; t < arguments.length; t++)
                e[t] = arguments[t];
            this._userLogHandler && this._userLogHandler.apply(this, a.__spreadArray([this, c.LogLevel.ERROR], e, !1)),
            this._logHandler.apply(this, a.__spreadArray([this, c.LogLevel.ERROR], e, !1))
        }
        ,
        c.Logger = u,
        c.setLogLevel = function(t) {
            n.forEach(function(e) {
                e.setLogLevel(t)
            })
        }
        ,
        c.setUserLogHandler = function(a, t) {
            for (var e = 0, r = n; e < r.length; e++)
                !function(e) {
                    var i = null;
                    t && t.level && (i = o[t.level]),
                    e.userLogHandler = null === a ? null : function(e, t) {
                        for (var r = [], n = 2; n < arguments.length; n++)
                            r[n - 2] = arguments[n];
                        var o = r.map(function(e) {
                            if (null == e)
                                return null;
                            if ("string" == typeof e)
                                return e;
                            if ("number" == typeof e || "boolean" == typeof e)
                                return e.toString();
                            if (e instanceof Error)
                                return e.message;
                            try {
                                return JSON.stringify(e)
                            } catch (e) {
                                return null
                            }
                        }).filter(function(e) {
                            return e
                        }).join(" ");
                        t >= (null != i ? i : e.logLevel) && a({
                            level: c.LogLevel[t].toLowerCase(),
                            message: o,
                            args: r,
                            type: e.name
                        })
                    }
                }(r[e])
        }
    }
    , {
        tslib: 12
    }],
    6: [function(e, M, t) {
        "use strict";
        Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        t.deleteToken = function(e) {
            return function() {
                return be.apply(this, arguments)
            }(e = (0,
            n.getModularInstance)(e))
        }
        ,
        t.getMessaging = function() {
            var e = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : (0,
            r.getApp)();
            return ye().then(function(e) {
                if (!e)
                    throw I.create("unsupported-browser")
            }, function(e) {
                throw I.create("indexed-db-unsupported")
            }),
            (0,
            r._getProvider)((0,
            n.getModularInstance)(e), "messaging").getImmediate()
        }
        ,
        t.getToken = function(e, t) {
            return me.apply(this, arguments)
        }
        ,
        t.isSupported = ye,
        t.onMessage = function(e, t) {
            return function(e, t) {
                if (navigator)
                    return e.onMessageHandler = t,
                    function() {
                        e.onMessageHandler = null
                    }
                    ;
                throw I.create("only-available-in-window")
            }(e = (0,
            n.getModularInstance)(e), t)
        }
        ,
        e("@firebase/installations");
        var t = e("@firebase/component")
          , o = e("idb")
          , n = e("@firebase/util")
          , r = e("@firebase/app");
        function k() {
            k = function() {
                return a
            }
            ;
            var a = {}
              , e = Object.prototype
              , s = e.hasOwnProperty
              , u = Object.defineProperty || function(e, t, r) {
                e[t] = r.value
            }
              , t = "function" == typeof Symbol ? Symbol : {}
              , n = t.iterator || "@@iterator"
              , r = t.asyncIterator || "@@asyncIterator"
              , o = t.toStringTag || "@@toStringTag";
            function i(e, t, r) {
                return Object.defineProperty(e, t, {
                    value: r,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }),
                e[t]
            }
            try {
                i({}, "")
            } catch (e) {
                i = function(e, t, r) {
                    return e[t] = r
                }
            }
            function c(e, t, r, n) {
                var o, i, a, c, t = t && t.prototype instanceof p ? t : p, t = Object.create(t.prototype), n = new x(n || []);
                return u(t, "_invoke", {
                    value: (o = e,
                    i = r,
                    a = n,
                    c = "suspendedStart",
                    function(e, t) {
                        if ("executing" === c)
                            throw new Error("Generator is already running");
                        if ("completed" === c) {
                            if ("throw" === e)
                                throw t;
                            return E()
                        }
                        for (a.method = e,
                        a.arg = t; ; ) {
                            var r = a.delegate;
                            if (r) {
                                r = function e(t, r) {
                                    var n = r.method
                                      , o = t.iterator[n];
                                    if (void 0 === o)
                                        return r.delegate = null,
                                        "throw" === n && t.iterator.return && (r.method = "return",
                                        r.arg = void 0,
                                        e(t, r),
                                        "throw" === r.method) || "return" !== n && (r.method = "throw",
                                        r.arg = new TypeError("The iterator does not provide a '" + n + "' method")),
                                        l;
                                    n = f(o, t.iterator, r.arg);
                                    if ("throw" === n.type)
                                        return r.method = "throw",
                                        r.arg = n.arg,
                                        r.delegate = null,
                                        l;
                                    o = n.arg;
                                    return o ? o.done ? (r[t.resultName] = o.value,
                                    r.next = t.nextLoc,
                                    "return" !== r.method && (r.method = "next",
                                    r.arg = void 0),
                                    r.delegate = null,
                                    l) : o : (r.method = "throw",
                                    r.arg = new TypeError("iterator result is not an object"),
                                    r.delegate = null,
                                    l)
                                }(r, a);
                                if (r) {
                                    if (r === l)
                                        continue;
                                    return r
                                }
                            }
                            if ("next" === a.method)
                                a.sent = a._sent = a.arg;
                            else if ("throw" === a.method) {
                                if ("suspendedStart" === c)
                                    throw c = "completed",
                                    a.arg;
                                a.dispatchException(a.arg)
                            } else
                                "return" === a.method && a.abrupt("return", a.arg);
                            c = "executing";
                            r = f(o, i, a);
                            if ("normal" === r.type) {
                                if (c = a.done ? "completed" : "suspendedYield",
                                r.arg === l)
                                    continue;
                                return {
                                    value: r.arg,
                                    done: a.done
                                }
                            }
                            "throw" === r.type && (c = "completed",
                            a.method = "throw",
                            a.arg = r.arg)
                        }
                    }
                    )
                }),
                t
            }
            function f(e, t, r) {
                try {
                    return {
                        type: "normal",
                        arg: e.call(t, r)
                    }
                } catch (e) {
                    return {
                        type: "throw",
                        arg: e
                    }
                }
            }
            a.wrap = c;
            var l = {};
            function p() {}
            function h() {}
            function d() {}
            var t = {}
              , v = (i(t, n, function() {
                return this
            }),
            Object.getPrototypeOf)
              , v = v && v(v(_([])))
              , y = (v && v !== e && s.call(v, n) && (t = v),
            d.prototype = p.prototype = Object.create(t));
            function g(e) {
                ["next", "throw", "return"].forEach(function(t) {
                    i(e, t, function(e) {
                        return this._invoke(t, e)
                    })
                })
            }
            function b(a, c) {
                var t;
                u(this, "_invoke", {
                    value: function(r, n) {
                        function e() {
                            return new c(function(e, t) {
                                !function t(e, r, n, o) {
                                    var i, e = f(a[e], a, r);
                                    if ("throw" !== e.type)
                                        return (r = (i = e.arg).value) && "object" == S(r) && s.call(r, "__await") ? c.resolve(r.__await).then(function(e) {
                                            t("next", e, n, o)
                                        }, function(e) {
                                            t("throw", e, n, o)
                                        }) : c.resolve(r).then(function(e) {
                                            i.value = e,
                                            n(i)
                                        }, function(e) {
                                            return t("throw", e, n, o)
                                        });
                                    o(e.arg)
                                }(r, n, e, t)
                            }
                            )
                        }
                        return t = t ? t.then(e, e) : e()
                    }
                })
            }
            function m(e) {
                var t = {
                    tryLoc: e[0]
                };
                1 in e && (t.catchLoc = e[1]),
                2 in e && (t.finallyLoc = e[2],
                t.afterLoc = e[3]),
                this.tryEntries.push(t)
            }
            function w(e) {
                var t = e.completion || {};
                t.type = "normal",
                delete t.arg,
                e.completion = t
            }
            function x(e) {
                this.tryEntries = [{
                    tryLoc: "root"
                }],
                e.forEach(m, this),
                this.reset(!0)
            }
            function _(t) {
                if (t) {
                    var r, e = t[n];
                    if (e)
                        return e.call(t);
                    if ("function" == typeof t.next)
                        return t;
                    if (!isNaN(t.length))
                        return r = -1,
                        (e = function e() {
                            for (; ++r < t.length; )
                                if (s.call(t, r))
                                    return e.value = t[r],
                                    e.done = !1,
                                    e;
                            return e.value = void 0,
                            e.done = !0,
                            e
                        }
                        ).next = e
                }
                return {
                    next: E
                }
            }
            function E() {
                return {
                    value: void 0,
                    done: !0
                }
            }
            return u(y, "constructor", {
                value: h.prototype = d,
                configurable: !0
            }),
            u(d, "constructor", {
                value: h,
                configurable: !0
            }),
            h.displayName = i(d, o, "GeneratorFunction"),
            a.isGeneratorFunction = function(e) {
                e = "function" == typeof e && e.constructor;
                return !!e && (e === h || "GeneratorFunction" === (e.displayName || e.name))
            }
            ,
            a.mark = function(e) {
                return Object.setPrototypeOf ? Object.setPrototypeOf(e, d) : (e.__proto__ = d,
                i(e, o, "GeneratorFunction")),
                e.prototype = Object.create(y),
                e
            }
            ,
            a.awrap = function(e) {
                return {
                    __await: e
                }
            }
            ,
            g(b.prototype),
            i(b.prototype, r, function() {
                return this
            }),
            a.AsyncIterator = b,
            a.async = function(e, t, r, n, o) {
                void 0 === o && (o = Promise);
                var i = new b(c(e, t, r, n),o);
                return a.isGeneratorFunction(t) ? i : i.next().then(function(e) {
                    return e.done ? e.value : i.next()
                })
            }
            ,
            g(y),
            i(y, o, "Generator"),
            i(y, n, function() {
                return this
            }),
            i(y, "toString", function() {
                return "[object Generator]"
            }),
            a.keys = function(e) {
                var t, r = Object(e), n = [];
                for (t in r)
                    n.push(t);
                return n.reverse(),
                function e() {
                    for (; n.length; ) {
                        var t = n.pop();
                        if (t in r)
                            return e.value = t,
                            e.done = !1,
                            e
                    }
                    return e.done = !0,
                    e
                }
            }
            ,
            a.values = _,
            x.prototype = {
                constructor: x,
                reset: function(e) {
                    if (this.prev = 0,
                    this.next = 0,
                    this.sent = this._sent = void 0,
                    this.done = !1,
                    this.delegate = null,
                    this.method = "next",
                    this.arg = void 0,
                    this.tryEntries.forEach(w),
                    !e)
                        for (var t in this)
                            "t" === t.charAt(0) && s.call(this, t) && !isNaN(+t.slice(1)) && (this[t] = void 0)
                },
                stop: function() {
                    this.done = !0;
                    var e = this.tryEntries[0].completion;
                    if ("throw" === e.type)
                        throw e.arg;
                    return this.rval
                },
                dispatchException: function(r) {
                    if (this.done)
                        throw r;
                    var n = this;
                    function e(e, t) {
                        return i.type = "throw",
                        i.arg = r,
                        n.next = e,
                        t && (n.method = "next",
                        n.arg = void 0),
                        !!t
                    }
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var o = this.tryEntries[t]
                          , i = o.completion;
                        if ("root" === o.tryLoc)
                            return e("end");
                        if (o.tryLoc <= this.prev) {
                            var a = s.call(o, "catchLoc")
                              , c = s.call(o, "finallyLoc");
                            if (a && c) {
                                if (this.prev < o.catchLoc)
                                    return e(o.catchLoc, !0);
                                if (this.prev < o.finallyLoc)
                                    return e(o.finallyLoc)
                            } else if (a) {
                                if (this.prev < o.catchLoc)
                                    return e(o.catchLoc, !0)
                            } else {
                                if (!c)
                                    throw new Error("try statement without catch or finally");
                                if (this.prev < o.finallyLoc)
                                    return e(o.finallyLoc)
                            }
                        }
                    }
                },
                abrupt: function(e, t) {
                    for (var r = this.tryEntries.length - 1; 0 <= r; --r) {
                        var n = this.tryEntries[r];
                        if (n.tryLoc <= this.prev && s.call(n, "finallyLoc") && this.prev < n.finallyLoc) {
                            var o = n;
                            break
                        }
                    }
                    var i = (o = o && ("break" === e || "continue" === e) && o.tryLoc <= t && t <= o.finallyLoc ? null : o) ? o.completion : {};
                    return i.type = e,
                    i.arg = t,
                    o ? (this.method = "next",
                    this.next = o.finallyLoc,
                    l) : this.complete(i)
                },
                complete: function(e, t) {
                    if ("throw" === e.type)
                        throw e.arg;
                    return "break" === e.type || "continue" === e.type ? this.next = e.arg : "return" === e.type ? (this.rval = this.arg = e.arg,
                    this.method = "return",
                    this.next = "end") : "normal" === e.type && t && (this.next = t),
                    l
                },
                finish: function(e) {
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var r = this.tryEntries[t];
                        if (r.finallyLoc === e)
                            return this.complete(r.completion, r.afterLoc),
                            w(r),
                            l
                    }
                },
                catch: function(e) {
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var r, n, o = this.tryEntries[t];
                        if (o.tryLoc === e)
                            return "throw" === (r = o.completion).type && (n = r.arg,
                            w(o)),
                            n
                    }
                    throw new Error("illegal catch attempt")
                },
                delegateYield: function(e, t, r) {
                    return this.delegate = {
                        iterator: _(e),
                        resultName: t,
                        nextLoc: r
                    },
                    "next" === this.method && (this.arg = void 0),
                    l
                }
            },
            a
        }
        function i(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                n.enumerable = n.enumerable || !1,
                n.configurable = !0,
                "value"in n && (n.writable = !0),
                Object.defineProperty(e, c(n.key), n)
            }
        }
        function S(e) {
            return (S = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                return typeof e
            }
            : function(e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            }
            )(e)
        }
        function a(e, t, r) {
            (t = c(t))in e ? Object.defineProperty(e, t, {
                value: r,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = r
        }
        function c(e) {
            e = function(e, t) {
                if ("object" !== S(e) || null === e)
                    return e;
                var r = e[Symbol.toPrimitive];
                if (void 0 === r)
                    return ("string" === t ? String : Number)(e);
                r = r.call(e, t || "default");
                if ("object" !== S(r))
                    return r;
                throw new TypeError("@@toPrimitive must return a primitive value.")
            }(e, "string");
            return "symbol" === S(e) ? e : String(e)
        }
        function s(e, t, r, n, o, i, a) {
            try {
                var c = e[i](a)
                  , s = c.value
            } catch (e) {
                return void r(e)
            }
            c.done ? t(s) : Promise.resolve(s).then(n, o)
        }
        function u(c) {
            return function() {
                var e = this
                  , a = arguments;
                return new Promise(function(t, r) {
                    var n = c.apply(e, a);
                    function o(e) {
                        s(n, t, r, o, i, "next", e)
                    }
                    function i(e) {
                        s(n, t, r, o, i, "throw", e)
                    }
                    o(void 0)
                }
                )
            }
        }
        function B(e) {
            return function(e) {
                if (Array.isArray(e))
                    return f(e)
            }(e) || function(e) {
                if ("undefined" != typeof Symbol && null != e[Symbol.iterator] || null != e["@@iterator"])
                    return Array.from(e)
            }(e) || function(e, t) {
                var r;
                if (e)
                    return "string" == typeof e ? f(e, t) : "Map" === (r = "Object" === (r = Object.prototype.toString.call(e).slice(8, -1)) && e.constructor ? e.constructor.name : r) || "Set" === r ? Array.from(e) : "Arguments" === r || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r) ? f(e, t) : void 0
            }(e) || function() {
                throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
            }()
        }
        function f(e, t) {
            (null == t || t > e.length) && (t = e.length);
            for (var r = 0, n = new Array(t); r < t; r++)
                n[r] = e[r];
            return n
        }
        var l, F = "/firebase-messaging-sw.js", R = "/firebase-cloud-messaging-push-scope", p = "BDOU99-h67HcA6JeFXHbSNMu7e2yNNu3RzoMj8TM4W88jITfq7ZmPvIM1Iv-4_l2LxQcYwhqby2xGpWwzjfAnG4", H = "https://fcmregistrations.googleapis.com/v1", h = "google.c.a.c_id", G = "google.c.a.c_l", V = "google.c.a.ts", U = "google.c.a.e";
        function d(e) {
            e = new Uint8Array(e);
            return btoa(String.fromCharCode.apply(String, B(e))).replace(/=/g, "").replace(/\+/g, "-").replace(/\//g, "_")
        }
        (e = l = l || {}).PUSH_RECEIVED = "push-received",
        e.NOTIFICATION_CLICKED = "notification-clicked";
        var v = "fcm_token_details_db"
          , W = 5
          , y = "fcm_token_object_Store";
        function g() {
            return (g = u(k().mark(function e(f) {
                var n, l;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            if ("databases"in indexedDB)
                                return e.next = 3,
                                indexedDB.databases();
                            e.next = 7;
                            break;
                        case 3:
                            if (n = e.sent,
                            n.map(function(e) {
                                return e.name
                            }).includes(v)) {
                                e.next = 7;
                                break
                            }
                            return e.abrupt("return", null);
                        case 7:
                            return l = null,
                            e.next = 10,
                            (0,
                            o.openDB)(v, W, {
                                upgrade: function() {
                                    var o = u(k().mark(function e(t, r, n, o) {
                                        var i, a, c, s, u;
                                        return k().wrap(function(e) {
                                            for (; ; )
                                                switch (e.prev = e.next) {
                                                case 0:
                                                    if (r < 2)
                                                        return e.abrupt("return");
                                                    e.next = 2;
                                                    break;
                                                case 2:
                                                    if (t.objectStoreNames.contains(y)) {
                                                        e.next = 4;
                                                        break
                                                    }
                                                    return e.abrupt("return");
                                                case 4:
                                                    return i = o.objectStore(y),
                                                    e.next = 7,
                                                    i.index("fcmSenderId").get(f);
                                                case 7:
                                                    return a = e.sent,
                                                    e.next = 10,
                                                    i.clear();
                                                case 10:
                                                    if (a) {
                                                        e.next = 12;
                                                        break
                                                    }
                                                    return e.abrupt("return");
                                                case 12:
                                                    if (2 !== r) {
                                                        e.next = 19;
                                                        break
                                                    }
                                                    if ((c = a).auth && c.p256dh && c.endpoint) {
                                                        e.next = 16;
                                                        break
                                                    }
                                                    return e.abrupt("return");
                                                case 16:
                                                    l = {
                                                        token: c.fcmToken,
                                                        createTime: null != (s = c.createTime) ? s : Date.now(),
                                                        subscriptionOptions: {
                                                            auth: c.auth,
                                                            p256dh: c.p256dh,
                                                            endpoint: c.endpoint,
                                                            swScope: c.swScope,
                                                            vapidKey: "string" == typeof c.vapidKey ? c.vapidKey : d(c.vapidKey)
                                                        }
                                                    },
                                                    e.next = 20;
                                                    break;
                                                case 19:
                                                    3 === r ? l = {
                                                        token: (s = a).fcmToken,
                                                        createTime: s.createTime,
                                                        subscriptionOptions: {
                                                            auth: d(s.auth),
                                                            p256dh: d(s.p256dh),
                                                            endpoint: s.endpoint,
                                                            swScope: s.swScope,
                                                            vapidKey: d(s.vapidKey)
                                                        }
                                                    } : 4 === r && (l = {
                                                        token: (u = a).fcmToken,
                                                        createTime: u.createTime,
                                                        subscriptionOptions: {
                                                            auth: d(u.auth),
                                                            p256dh: d(u.p256dh),
                                                            endpoint: u.endpoint,
                                                            swScope: u.swScope,
                                                            vapidKey: d(u.vapidKey)
                                                        }
                                                    });
                                                case 20:
                                                case "end":
                                                    return e.stop()
                                                }
                                        }, e)
                                    }));
                                    return function(e, t, r, n) {
                                        return o.apply(this, arguments)
                                    }
                                }()
                            });
                        case 10:
                            return e.sent.close(),
                            e.next = 14,
                            (0,
                            o.deleteDB)(v);
                        case 14:
                            return e.next = 16,
                            (0,
                            o.deleteDB)("fcm_vapid_details_db");
                        case 16:
                            return e.next = 18,
                            (0,
                            o.deleteDB)("undefined");
                        case 18:
                            return e.abrupt("return", (r = void 0,
                            (t = l) && t.subscriptionOptions && (r = t.subscriptionOptions,
                            "number" == typeof t.createTime) && 0 < t.createTime && "string" == typeof t.token && 0 < t.token.length && "string" == typeof r.auth && 0 < r.auth.length && "string" == typeof r.p256dh && 0 < r.p256dh.length && "string" == typeof r.endpoint && 0 < r.endpoint.length && "string" == typeof r.swScope && 0 < r.swScope.length && "string" == typeof r.vapidKey && 0 < r.vapidKey.length ? l : null));
                        case 19:
                        case "end":
                            return e.stop()
                        }
                    var t, r
                }, e)
            }))).apply(this, arguments)
        }
        var K = "firebase-messaging-database"
          , z = 1
          , b = "firebase-messaging-store"
          , m = null;
        function w() {
            return m = m || (0,
            o.openDB)(K, z, {
                upgrade: function(e, t) {
                    0 === t && e.createObjectStore(b)
                }
            })
        }
        function x() {
            return _.apply(this, arguments)
        }
        function _() {
            return (_ = u(k().mark(function e(t) {
                var r, n, o;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return r = j(t),
                            e.next = 3,
                            w();
                        case 3:
                            return n = e.sent,
                            e.next = 6,
                            n.transaction(b).objectStore(b).get(r);
                        case 6:
                            if (n = e.sent)
                                return e.abrupt("return", n);
                            e.next = 11;
                            break;
                        case 11:
                            return e.next = 13,
                            function() {
                                return g.apply(this, arguments)
                            }(t.appConfig.senderId);
                        case 13:
                            if (o = e.sent)
                                return e.next = 17,
                                E(t, o);
                            e.next = 18;
                            break;
                        case 17:
                            return e.abrupt("return", o);
                        case 18:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function E() {
            return O.apply(this, arguments)
        }
        function O() {
            return (O = u(k().mark(function e(t, r) {
                var n, o;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return n = j(t),
                            e.next = 3,
                            w();
                        case 3:
                            return o = e.sent,
                            o = o.transaction(b, "readwrite"),
                            e.next = 7,
                            o.objectStore(b).put(r, n);
                        case 7:
                            return e.next = 9,
                            o.done;
                        case 9:
                            return e.abrupt("return", r);
                        case 10:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function L() {
            return (L = u(k().mark(function e(t) {
                var r, n;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return r = j(t),
                            e.next = 3,
                            w();
                        case 3:
                            return n = e.sent,
                            n = n.transaction(b, "readwrite"),
                            e.next = 7,
                            n.objectStore(b).delete(r);
                        case 7:
                            return e.next = 9,
                            n.done;
                        case 9:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function j(e) {
            return e.appConfig.appId
        }
        a(e = {}, "missing-app-config-values", 'Missing App configuration value: "{$valueName}"'),
        a(e, "only-available-in-window", "This method is available in a Window context."),
        a(e, "only-available-in-sw", "This method is available in a service worker context."),
        a(e, "permission-default", "The notification permission was not granted and dismissed instead."),
        a(e, "permission-blocked", "The notification permission was not granted and blocked instead."),
        a(e, "unsupported-browser", "This browser doesn't support the API's required to use the Firebase SDK."),
        a(e, "indexed-db-unsupported", "This browser doesn't support indexedDb.open() (ex. Safari iFrame, Firefox Private Browsing, etc)"),
        a(e, "failed-service-worker-registration", "We are unable to register the default service worker. {$browserErrorMessage}"),
        a(e, "token-subscribe-failed", "A problem occurred while subscribing the user to FCM: {$errorInfo}"),
        a(e, "token-subscribe-no-token", "FCM returned no token when subscribing the user to push."),
        a(e, "token-unsubscribe-failed", "A problem occurred while unsubscribing the user from FCM: {$errorInfo}"),
        a(e, "token-update-failed", "A problem occurred while updating the user from FCM: {$errorInfo}"),
        a(e, "token-update-no-token", "FCM returned no token when updating the user to push."),
        a(e, "use-sw-after-get-token", "The useServiceWorker() method may only be called once and must be called before calling getToken() to ensure your service worker is used."),
        a(e, "invalid-sw-registration", "The input to useServiceWorker() must be a ServiceWorkerRegistration."),
        a(e, "invalid-bg-handler", "The input to setBackgroundMessageHandler() must be a function."),
        a(e, "invalid-vapid-key", "The public VAPID key must be a string."),
        a(e, "use-vapid-key-after-get-token", "The usePublicVapidKey() method may only be called once and must be called before calling getToken() to ensure your VAPID key is used.");
        var I = new n.ErrorFactory("messaging","Messaging",e);
        function A() {
            return (A = u(k().mark(function e(t, r) {
                var n, o, i;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            D(t);
                        case 2:
                            return i = e.sent,
                            o = J(r),
                            i = {
                                method: "POST",
                                headers: i,
                                body: JSON.stringify(o)
                            },
                            e.prev = 5,
                            e.next = 8,
                            fetch(C(t.appConfig), i);
                        case 8:
                            return o = e.sent,
                            e.next = 11,
                            o.json();
                        case 11:
                            n = e.sent,
                            e.next = 17;
                            break;
                        case 14:
                            throw e.prev = 14,
                            e.t0 = e.catch(5),
                            I.create("token-subscribe-failed", {
                                errorInfo: null === e.t0 || void 0 === e.t0 ? void 0 : e.t0.toString()
                            });
                        case 17:
                            if (n.error)
                                throw i = n.error.message,
                                I.create("token-subscribe-failed", {
                                    errorInfo: i
                                });
                            e.next = 20;
                            break;
                        case 20:
                            if (n.token) {
                                e.next = 22;
                                break
                            }
                            throw I.create("token-subscribe-no-token");
                        case 22:
                            return e.abrupt("return", n.token);
                        case 23:
                        case "end":
                            return e.stop()
                        }
                }, e, null, [[5, 14]])
            }))).apply(this, arguments)
        }
        function P() {
            return (P = u(k().mark(function e(t, r) {
                var n, o, i;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            D(t);
                        case 2:
                            return i = e.sent,
                            o = J(r.subscriptionOptions),
                            i = {
                                method: "PATCH",
                                headers: i,
                                body: JSON.stringify(o)
                            },
                            e.prev = 5,
                            e.next = 8,
                            fetch("".concat(C(t.appConfig), "/").concat(r.token), i);
                        case 8:
                            return o = e.sent,
                            e.next = 11,
                            o.json();
                        case 11:
                            n = e.sent,
                            e.next = 17;
                            break;
                        case 14:
                            throw e.prev = 14,
                            e.t0 = e.catch(5),
                            I.create("token-update-failed", {
                                errorInfo: null === e.t0 || void 0 === e.t0 ? void 0 : e.t0.toString()
                            });
                        case 17:
                            if (n.error)
                                throw i = n.error.message,
                                I.create("token-update-failed", {
                                    errorInfo: i
                                });
                            e.next = 20;
                            break;
                        case 20:
                            if (n.token) {
                                e.next = 22;
                                break
                            }
                            throw I.create("token-update-no-token");
                        case 22:
                            return e.abrupt("return", n.token);
                        case 23:
                        case "end":
                            return e.stop()
                        }
                }, e, null, [[5, 14]])
            }))).apply(this, arguments)
        }
        function T() {
            return q.apply(this, arguments)
        }
        function q() {
            return (q = u(k().mark(function e(t, r) {
                var n, o;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            D(t);
                        case 2:
                            return n = e.sent,
                            n = {
                                method: "DELETE",
                                headers: n
                            },
                            e.prev = 4,
                            e.next = 7,
                            fetch("".concat(C(t.appConfig), "/").concat(r), n);
                        case 7:
                            return n = e.sent,
                            e.next = 10,
                            n.json();
                        case 10:
                            if ((o = e.sent).error)
                                throw o = o.error.message,
                                I.create("token-unsubscribe-failed", {
                                    errorInfo: o
                                });
                            e.next = 14;
                            break;
                        case 14:
                            e.next = 19;
                            break;
                        case 16:
                            throw e.prev = 16,
                            e.t0 = e.catch(4),
                            I.create("token-unsubscribe-failed", {
                                errorInfo: null === e.t0 || void 0 === e.t0 ? void 0 : e.t0.toString()
                            });
                        case 19:
                        case "end":
                            return e.stop()
                        }
                }, e, null, [[4, 16]])
            }))).apply(this, arguments)
        }
        function C(e) {
            e = e.projectId;
            return "".concat(H, "/projects/").concat(e, "/registrations")
        }
        function D() {
            return $.apply(this, arguments)
        }
        function $() {
            return ($ = u(k().mark(function e(t) {
                var r, n;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return r = t.appConfig,
                            n = t.installations,
                            e.next = 3,
                            n.getToken();
                        case 3:
                            return n = e.sent,
                            e.abrupt("return", new Headers({
                                "Content-Type": "application/json",
                                Accept: "application/json",
                                "x-goog-api-key": r.apiKey,
                                "x-goog-firebase-installations-auth": "FIS ".concat(n)
                            }));
                        case 5:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function J(e) {
            var t = e.p256dh
              , r = e.auth
              , n = e.endpoint
              , e = e.vapidKey
              , n = {
                web: {
                    endpoint: n,
                    auth: r,
                    p256dh: t
                }
            };
            return e !== p && (n.web.applicationPubKey = e),
            n
        }
        var Y = 6048e5;
        function X() {
            return (X = u(k().mark(function e(a) {
                var c, s;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            function() {
                                return ne.apply(this, arguments)
                            }(a.swRegistration, a.vapidKey);
                        case 2:
                            return c = e.sent,
                            c = {
                                vapidKey: a.vapidKey,
                                swScope: a.swRegistration.scope,
                                endpoint: c.endpoint,
                                auth: d(c.getKey("auth")),
                                p256dh: d(c.getKey("p256dh"))
                            },
                            e.next = 6,
                            x(a.firebaseDependencies);
                        case 6:
                            if (s = e.sent) {
                                e.next = 11;
                                break
                            }
                            return e.abrupt("return", te(a.firebaseDependencies, c));
                        case 11:
                            if (t = s.subscriptionOptions,
                            i = o = n = void 0,
                            n = (r = c).vapidKey === t.vapidKey,
                            o = r.endpoint === t.endpoint,
                            i = r.auth === t.auth,
                            r = r.p256dh === t.p256dh,
                            n && o && i && r) {
                                e.next = 23;
                                break
                            }
                            return e.prev = 12,
                            e.next = 15,
                            T(a.firebaseDependencies, s.token);
                        case 15:
                            e.next = 20;
                            break;
                        case 17:
                            e.prev = 17,
                            e.t0 = e.catch(12),
                            console.warn(e.t0);
                        case 20:
                            return e.abrupt("return", te(a.firebaseDependencies, c));
                        case 23:
                            if (Date.now() >= s.createTime + Y)
                                return e.abrupt("return", function() {
                                    return ee.apply(this, arguments)
                                }(a, {
                                    token: s.token,
                                    createTime: Date.now(),
                                    subscriptionOptions: c
                                }));
                            e.next = 27;
                            break;
                        case 27:
                            return e.abrupt("return", s.token);
                        case 28:
                        case "end":
                            return e.stop()
                        }
                    var t, r, n, o, i
                }, e, null, [[12, 17]])
            }))).apply(this, arguments)
        }
        function Q() {
            return Z.apply(this, arguments)
        }
        function Z() {
            return (Z = u(k().mark(function e(t) {
                var r;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            x(t.firebaseDependencies);
                        case 2:
                            if (r = e.sent)
                                return e.next = 6,
                                T(t.firebaseDependencies, r.token);
                            e.next = 8;
                            break;
                        case 6:
                            return e.next = 8,
                            function() {
                                return L.apply(this, arguments)
                            }(t.firebaseDependencies);
                        case 8:
                            return e.next = 10,
                            t.swRegistration.pushManager.getSubscription();
                        case 10:
                            if (r = e.sent)
                                return e.abrupt("return", r.unsubscribe());
                            e.next = 13;
                            break;
                        case 13:
                            return e.abrupt("return", !0);
                        case 14:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function ee() {
            return (ee = u(k().mark(function e(t, r) {
                var n, o;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.prev = 0,
                            e.next = 3,
                            function() {
                                return P.apply(this, arguments)
                            }(t.firebaseDependencies, r);
                        case 3:
                            return n = e.sent,
                            o = Object.assign(Object.assign({}, r), {
                                token: n,
                                createTime: Date.now()
                            }),
                            e.next = 7,
                            E(t.firebaseDependencies, o);
                        case 7:
                            return e.abrupt("return", n);
                        case 10:
                            return e.prev = 10,
                            e.t0 = e.catch(0),
                            e.next = 14,
                            Q(t);
                        case 14:
                            throw e.t0;
                        case 15:
                        case "end":
                            return e.stop()
                        }
                }, e, null, [[0, 10]])
            }))).apply(this, arguments)
        }
        function te() {
            return re.apply(this, arguments)
        }
        function re() {
            return (re = u(k().mark(function e(t, r) {
                var n;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            function() {
                                return A.apply(this, arguments)
                            }(t, r);
                        case 2:
                            return n = e.sent,
                            n = {
                                token: n,
                                createTime: Date.now(),
                                subscriptionOptions: r
                            },
                            e.next = 6,
                            E(t, n);
                        case 6:
                            return e.abrupt("return", n.token);
                        case 7:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function ne() {
            return (ne = u(k().mark(function e(t, r) {
                var n;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.next = 2,
                            t.pushManager.getSubscription();
                        case 2:
                            if (n = e.sent)
                                return e.abrupt("return", n);
                            e.next = 5;
                            break;
                        case 5:
                            return e.abrupt("return", t.pushManager.subscribe({
                                userVisibleOnly: !0,
                                applicationServerKey: function(e) {
                                    for (var e = (e + "=".repeat((4 - e.length % 4) % 4)).replace(/\-/g, "+").replace(/_/g, "/"), t = atob(e), r = new Uint8Array(t.length), n = 0; n < t.length; ++n)
                                        r[n] = t.charCodeAt(n);
                                    return r
                                }(r)
                            }));
                        case 6:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function oe(e) {
            var t, r, n, o, i = {
                from: e.from,
                collapseKey: e.collapse_key,
                messageId: e.fcmMessageId
            };
            return t = i,
            (n = e).notification && (t.notification = {},
            (r = n.notification.title) && (t.notification.title = r),
            (r = n.notification.body) && (t.notification.body = r),
            (r = n.notification.image) && (t.notification.image = r),
            r = n.notification.icon) && (t.notification.icon = r),
            n = i,
            (t = e).data && (n.data = t.data),
            r = i,
            ((n = e).fcmOptions || null != (o = n.notification) && o.click_action) && (r.fcmOptions = {},
            (o = null != (o = null == (o = n.fcmOptions) ? void 0 : o.link) ? o : null == (o = n.notification) ? void 0 : o.click_action) && (r.fcmOptions.link = o),
            n = null == (o = n.fcmOptions) ? void 0 : o.analytics_label) && (r.fcmOptions.analyticsLabel = n),
            i
        }
        function ie(e, t) {
            for (var r = [], n = 0; n < e.length; n++)
                r.push(e.charAt(n)),
                n < t.length && r.push(t.charAt(n));
            r.join("")
        }
        function N(e) {
            return I.create("missing-app-config-values", {
                valueName: e
            })
        }
        ie("hts/frbslgigp.ogepscmv/ieo/eaylg", "tp:/ieaeogn-agolai.o/1frlglgc/o"),
        ie("AzSCbw63g1R0nCw85jG8", "Iaya3yLKwmgvh7cF0q4");
        var ae = function() {
            function o(e, t, r) {
                if (!(this instanceof o))
                    throw new TypeError("Cannot call a class as a function");
                this.deliveryMetricsExportedToBigQueryEnabled = !1,
                this.onBackgroundMessageHandler = null,
                this.onMessageHandler = null,
                this.logEvents = [],
                this.isLogServiceStarted = !1;
                var n = function(e) {
                    if (!e || !e.options)
                        throw N("App Configuration Object");
                    if (!e.name)
                        throw N("App Name");
                    for (var t = e.options, r = 0, n = ["projectId", "apiKey", "appId", "messagingSenderId"]; r < n.length; r++) {
                        var o = n[r];
                        if (!t[o])
                            throw N(o)
                    }
                    return {
                        appName: e.name,
                        projectId: t.projectId,
                        apiKey: t.apiKey,
                        appId: t.appId,
                        senderId: t.messagingSenderId
                    }
                }(e);
                this.firebaseDependencies = {
                    app: e,
                    appConfig: n,
                    installations: t,
                    analyticsProvider: r
                }
            }
            var e, t, r;
            return e = o,
            (t = [{
                key: "_delete",
                value: function() {
                    return Promise.resolve()
                }
            }]) && i(e.prototype, t),
            r && i(e, r),
            Object.defineProperty(e, "prototype", {
                writable: !1
            }),
            o
        }();
        function ce() {
            return se.apply(this, arguments)
        }
        function se() {
            return (se = u(k().mark(function e(t) {
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.prev = 0,
                            e.next = 3,
                            navigator.serviceWorker.register(F, {
                                scope: R
                            });
                        case 3:
                            t.swRegistration = e.sent,
                            t.swRegistration.update().catch(function() {}),
                            e.next = 10;
                            break;
                        case 7:
                            throw e.prev = 7,
                            e.t0 = e.catch(0),
                            I.create("failed-service-worker-registration", {
                                browserErrorMessage: null === e.t0 || void 0 === e.t0 ? void 0 : e.t0.message
                            });
                        case 10:
                        case "end":
                            return e.stop()
                        }
                }, e, null, [[0, 7]])
            }))).apply(this, arguments)
        }
        function ue() {
            return (ue = u(k().mark(function e(t, r) {
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            if (r || t.swRegistration) {
                                e.next = 3;
                                break
                            }
                            return e.next = 3,
                            ce(t);
                        case 3:
                            if (!r && t.swRegistration)
                                return e.abrupt("return");
                            e.next = 5;
                            break;
                        case 5:
                            if (r instanceof ServiceWorkerRegistration) {
                                e.next = 7;
                                break
                            }
                            throw I.create("invalid-sw-registration");
                        case 7:
                            t.swRegistration = r;
                        case 8:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function fe() {
            return (fe = u(k().mark(function e(t, r) {
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            r ? t.vapidKey = r : t.vapidKey || (t.vapidKey = p);
                        case 1:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function le() {
            return pe.apply(this, arguments)
        }
        function pe() {
            return (pe = u(k().mark(function e(t, r) {
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            if (navigator) {
                                e.next = 2;
                                break
                            }
                            throw I.create("only-available-in-window");
                        case 2:
                            if ("default" === Notification.permission)
                                return e.next = 5,
                                Notification.requestPermission();
                            e.next = 5;
                            break;
                        case 5:
                            if ("granted" !== Notification.permission)
                                throw I.create("permission-blocked");
                            e.next = 7;
                            break;
                        case 7:
                            return e.next = 9,
                            function() {
                                return fe.apply(this, arguments)
                            }(t, null == r ? void 0 : r.vapidKey);
                        case 9:
                            return e.next = 11,
                            function() {
                                return ue.apply(this, arguments)
                            }(t, null == r ? void 0 : r.serviceWorkerRegistration);
                        case 11:
                            return e.abrupt("return", function() {
                                return X.apply(this, arguments)
                            }(t));
                        case 12:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function he() {
            return (he = u(k().mark(function e(t, r, n) {
                var o;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return o = function(e) {
                                switch (e) {
                                case l.NOTIFICATION_CLICKED:
                                    return "notification_open";
                                case l.PUSH_RECEIVED:
                                    return "notification_foreground";
                                default:
                                    throw new Error
                                }
                            }(r),
                            e.next = 3,
                            t.firebaseDependencies.analyticsProvider.get();
                        case 3:
                            e.sent.logEvent(o, {
                                message_id: n[h],
                                message_name: n[G],
                                message_time: n[V],
                                message_device_time: Math.floor(Date.now() / 1e3)
                            });
                        case 5:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function de() {
            return (de = u(k().mark(function e(r, n) {
                var o, i;
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            if ((o = n.data).isFirebaseMessaging) {
                                e.next = 3;
                                break
                            }
                            return e.abrupt("return");
                        case 3:
                            if (r.onMessageHandler && o.messageType === l.PUSH_RECEIVED && ("function" == typeof r.onMessageHandler ? r.onMessageHandler(oe(o)) : r.onMessageHandler.next(oe(o))),
                            i = o.data,
                            "object" === S(t = i) && t && h in t && "1" === i[U])
                                return e.next = 8,
                                function() {
                                    return he.apply(this, arguments)
                                }(r, o.messageType, i);
                            e.next = 8;
                            break;
                        case 8:
                        case "end":
                            return e.stop()
                        }
                    var t
                }, e)
            }))).apply(this, arguments)
        }
        function ve(e) {
            var t = e.getProvider("messaging").getImmediate();
            return {
                getToken: function(e) {
                    return le(t, e)
                }
            }
        }
        e = "@firebase/messaging";
        function ye() {
            return ge.apply(this, arguments)
        }
        function ge() {
            return (ge = u(k().mark(function e() {
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return e.prev = 0,
                            e.next = 3,
                            (0,
                            n.validateIndexedDBOpenable)();
                        case 3:
                            e.next = 8;
                            break;
                        case 5:
                            return e.prev = 5,
                            e.t0 = e.catch(0),
                            e.abrupt("return", !1);
                        case 8:
                            return e.abrupt("return", "undefined" != typeof window && (0,
                            n.isIndexedDBAvailable)() && (0,
                            n.areCookiesEnabled)() && "serviceWorker"in navigator && "PushManager"in window && "Notification"in window && "fetch"in window && ServiceWorkerRegistration.prototype.hasOwnProperty("showNotification") && PushSubscription.prototype.hasOwnProperty("getKey"));
                        case 9:
                        case "end":
                            return e.stop()
                        }
                }, e, null, [[0, 5]])
            }))).apply(this, arguments)
        }
        function be() {
            return (be = u(k().mark(function e(t) {
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            if (navigator) {
                                e.next = 2;
                                break
                            }
                            throw I.create("only-available-in-window");
                        case 2:
                            if (t.swRegistration) {
                                e.next = 5;
                                break
                            }
                            return e.next = 5,
                            ce(t);
                        case 5:
                            return e.abrupt("return", Q(t));
                        case 6:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        function me() {
            return (me = u(k().mark(function e(t, r) {
                return k().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return t = (0,
                            n.getModularInstance)(t),
                            e.abrupt("return", le(t, r));
                        case 2:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }))).apply(this, arguments)
        }
        (0,
        r._registerComponent)(new t.Component("messaging",function(e) {
            var t = new ae(e.getProvider("app").getImmediate(),e.getProvider("installations-internal").getImmediate(),e.getProvider("analytics-internal"));
            return navigator.serviceWorker.addEventListener("message", function(e) {
                return function() {
                    return de.apply(this, arguments)
                }(t, e)
            }),
            t
        }
        ,"PUBLIC")),
        (0,
        r._registerComponent)(new t.Component("messaging-internal",ve,"PRIVATE")),
        (0,
        r.registerVersion)(e, "0.12.4"),
        (0,
        r.registerVersion)(e, "0.12.4", "esm2017")
    }
    , {
        "@firebase/app": 2,
        "@firebase/component": 3,
        "@firebase/installations": 4,
        "@firebase/util": 7,
        idb: 10
    }],
    7: [function(e, t, q) {
        !function(K, z) {
            !function() {
                "use strict";
                function i(e, t) {
                    return function(e) {
                        if (Array.isArray(e))
                            return e
                    }(e) || function(e, t) {
                        var r = null == e ? null : "undefined" != typeof Symbol && e[Symbol.iterator] || e["@@iterator"];
                        if (null != r) {
                            var n, o, i, a, c = [], s = !0, u = !1;
                            try {
                                if (i = (r = r.call(e)).next,
                                0 === t) {
                                    if (Object(r) !== r)
                                        return;
                                    s = !1
                                } else
                                    for (; !(s = (n = i.call(r)).done) && (c.push(n.value),
                                    c.length !== t); s = !0)
                                        ;
                            } catch (e) {
                                u = !0,
                                o = e
                            } finally {
                                try {
                                    if (!s && null != r.return && (a = r.return(),
                                    Object(a) !== a))
                                        return
                                } finally {
                                    if (u)
                                        throw o
                                }
                            }
                            return c
                        }
                    }(e, t) || c(e, t) || function() {
                        throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                    }()
                }
                function c(e, t) {
                    var r;
                    if (e)
                        return "string" == typeof e ? n(e, t) : "Map" === (r = "Object" === (r = Object.prototype.toString.call(e).slice(8, -1)) && e.constructor ? e.constructor.name : r) || "Set" === r ? Array.from(e) : "Arguments" === r || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r) ? n(e, t) : void 0
                }
                function n(e, t) {
                    (null == t || t > e.length) && (t = e.length);
                    for (var r = 0, n = new Array(t); r < t; r++)
                        n[r] = e[r];
                    return n
                }
                function a(e) {
                    return (a = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                        return typeof e
                    }
                    : function(e) {
                        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                    }
                    )(e)
                }
                function o(e, t) {
                    for (var r = 0; r < t.length; r++) {
                        var n = t[r];
                        n.enumerable = n.enumerable || !1,
                        n.configurable = !0,
                        "value"in n && (n.writable = !0),
                        Object.defineProperty(e, function(e) {
                            e = function(e, t) {
                                if ("object" !== a(e) || null === e)
                                    return e;
                                var r = e[Symbol.toPrimitive];
                                if (void 0 === r)
                                    return ("string" === t ? String : Number)(e);
                                r = r.call(e, t || "default");
                                if ("object" !== a(r))
                                    return r;
                                throw new TypeError("@@toPrimitive must return a primitive value.")
                            }(e, "string");
                            return "symbol" === a(e) ? e : String(e)
                        }(n.key), n)
                    }
                }
                function s(e, t, r) {
                    return t && o(e.prototype, t),
                    r && o(e, r),
                    Object.defineProperty(e, "prototype", {
                        writable: !1
                    }),
                    e
                }
                function u(e, t) {
                    if (!(e instanceof t))
                        throw new TypeError("Cannot call a class as a function")
                }
                function e(e, t) {
                    if ("function" != typeof t && null !== t)
                        throw new TypeError("Super expression must either be null or a function");
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            writable: !0,
                            configurable: !0
                        }
                    }),
                    Object.defineProperty(e, "prototype", {
                        writable: !1
                    }),
                    t && v(e, t)
                }
                function f(r) {
                    var n = d();
                    return function() {
                        var e, t = y(r), t = (e = n ? (e = y(this).constructor,
                        Reflect.construct(t, arguments, e)) : t.apply(this, arguments),
                        this);
                        if (e && ("object" === a(e) || "function" == typeof e))
                            return e;
                        if (void 0 !== e)
                            throw new TypeError("Derived constructors may only return object or undefined");
                        return l(t)
                    }
                }
                function l(e) {
                    if (void 0 === e)
                        throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return e
                }
                function p(e) {
                    var r = "function" == typeof Map ? new Map : void 0;
                    return (p = function(e) {
                        if (null === e || -1 === Function.toString.call(e).indexOf("[native code]"))
                            return e;
                        if ("function" != typeof e)
                            throw new TypeError("Super expression must either be null or a function");
                        if (void 0 !== r) {
                            if (r.has(e))
                                return r.get(e);
                            r.set(e, t)
                        }
                        function t() {
                            return h(e, arguments, y(this).constructor)
                        }
                        return t.prototype = Object.create(e.prototype, {
                            constructor: {
                                value: t,
                                enumerable: !1,
                                writable: !0,
                                configurable: !0
                            }
                        }),
                        v(t, e)
                    }
                    )(e)
                }
                function h(e, t, r) {
                    return (h = d() ? Reflect.construct.bind() : function(e, t, r) {
                        var n = [null];
                        n.push.apply(n, t);
                        t = new (Function.bind.apply(e, n));
                        return r && v(t, r.prototype),
                        t
                    }
                    ).apply(null, arguments)
                }
                function d() {
                    if ("undefined" == typeof Reflect || !Reflect.construct)
                        return !1;
                    if (Reflect.construct.sham)
                        return !1;
                    if ("function" == typeof Proxy)
                        return !0;
                    try {
                        return Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function() {})),
                        !0
                    } catch (e) {
                        return !1
                    }
                }
                function v(e, t) {
                    return (v = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(e, t) {
                        return e.__proto__ = t,
                        e
                    }
                    )(e, t)
                }
                function y(e) {
                    return (y = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function(e) {
                        return e.__proto__ || Object.getPrototypeOf(e)
                    }
                    )(e)
                }
                Object.defineProperty(q, "__esModule", {
                    value: !0
                }),
                q.Sha1 = q.RANDOM_FACTOR = q.MAX_VALUE_MILLIS = q.FirebaseError = q.ErrorFactory = q.Deferred = q.DecodeBase64StringError = q.CONSTANTS = void 0,
                q.areCookiesEnabled = function() {
                    return !("undefined" == typeof navigator || !navigator.cookieEnabled)
                }
                ,
                q.assertionError = q.assert = void 0,
                q.async = function(n, o) {
                    return function() {
                        for (var e = arguments.length, t = new Array(e), r = 0; r < e; r++)
                            t[r] = arguments[r];
                        Promise.resolve(!0).then(function() {
                            n.apply(void 0, t)
                        }).catch(function(e) {
                            o && o(e)
                        })
                    }
                }
                ,
                q.base64urlEncodeWithoutPadding = q.base64Encode = q.base64Decode = q.base64 = void 0,
                q.calculateBackoffMillis = function(e) {
                    var t = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : G
                      , r = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : V
                      , t = t * Math.pow(r, e)
                      , r = Math.round(W * t * (Math.random() - .5) * 2);
                    return Math.min(U, t + r)
                }
                ,
                q.contains = function(e, t) {
                    return Object.prototype.hasOwnProperty.call(e, t)
                }
                ,
                q.createMockUserToken = function(e, t) {
                    if (e.uid)
                        throw new Error('The "uid" field is no longer supported by mockUserToken. Please use "sub" instead for Firebase Auth User ID.');
                    var t = t || "demo-project"
                      , r = e.iat || 0
                      , n = e.sub || e.user_id;
                    if (n)
                        return t = Object.assign({
                            iss: "https://securetoken.google.com/".concat(t),
                            aud: t,
                            iat: r,
                            exp: r + 3600,
                            auth_time: r,
                            sub: n,
                            user_id: n,
                            firebase: {
                                sign_in_provider: "custom",
                                identities: {}
                            }
                        }, e),
                        [_(JSON.stringify({
                            alg: "none",
                            type: "JWT"
                        })), _(JSON.stringify(t)), ""].join(".");
                    throw new Error("mockUserToken must contain 'sub' or 'user_id' field!")
                }
                ,
                q.createSubscribe = function(e, t) {
                    e = new H(e,t);
                    return e.subscribe.bind(e)
                }
                ,
                q.decode = void 0,
                q.deepCopy = function(e) {
                    return k(void 0, e)
                }
                ,
                q.deepEqual = function e(t, r) {
                    if (t === r)
                        return !0;
                    var n = Object.keys(t);
                    var o = Object.keys(r);
                    for (var i = 0, a = n; i < a.length; i++) {
                        var c = a[i];
                        if (!o.includes(c))
                            return !1;
                        var s = t[c]
                          , c = r[c];
                        if (F(s) && F(c)) {
                            if (!e(s, c))
                                return !1
                        } else if (s !== c)
                            return !1
                    }
                    for (var u = 0, f = o; u < f.length; u++) {
                        var l = f[u];
                        if (!n.includes(l))
                            return !1
                    }
                    return !0
                }
                ,
                q.deepExtend = k,
                q.errorPrefix = N,
                q.extractQuerystring = function(e) {
                    var t, r = e.indexOf("?");
                    return r ? (t = e.indexOf("#", r),
                    e.substring(r, 0 < t ? t : void 0)) : ""
                }
                ,
                q.getExperimentalSetting = q.getDefaults = q.getDefaultEmulatorHostnameAndPort = q.getDefaultEmulatorHost = q.getDefaultAppConfig = void 0,
                q.getGlobal = S,
                q.getModularInstance = function(e) {
                    return e && e._delegate ? e._delegate : e
                }
                ,
                q.getUA = I,
                q.isAdmin = void 0,
                q.isBrowser = function() {
                    return "object" === ("undefined" == typeof self ? "undefined" : a(self)) && self.self === self
                }
                ,
                q.isBrowserExtension = function() {
                    var e = "object" === ("undefined" == typeof chrome ? "undefined" : a(chrome)) ? chrome.runtime : "object" === ("undefined" == typeof browser ? "undefined" : a(browser)) ? browser.runtime : void 0;
                    return "object" === a(e) && void 0 !== e.id
                }
                ,
                q.isElectron = function() {
                    return 0 <= I().indexOf("Electron/")
                }
                ,
                q.isEmpty = function(e) {
                    for (var t in e)
                        if (Object.prototype.hasOwnProperty.call(e, t))
                            return !1;
                    return !0
                }
                ,
                q.isIE = function() {
                    var e = I();
                    return 0 <= e.indexOf("MSIE ") || 0 <= e.indexOf("Trident/")
                }
                ,
                q.isIndexedDBAvailable = function() {
                    try {
                        return "object" === ("undefined" == typeof indexedDB ? "undefined" : a(indexedDB))
                    } catch (e) {
                        return !1
                    }
                }
                ,
                q.isMobileCordova = function() {
                    return "undefined" != typeof window && !!(window.cordova || window.phonegap || window.PhoneGap) && /ios|iphone|ipod|ipad|android|blackberry|iemobile/i.test(I())
                }
                ,
                q.isNode = A,
                q.isNodeSdk = function() {
                    return !0 === b.NODE_CLIENT || !0 === b.NODE_ADMIN
                }
                ,
                q.isReactNative = function() {
                    return "object" === ("undefined" == typeof navigator ? "undefined" : a(navigator)) && "ReactNative" === navigator.product
                }
                ,
                q.isSafari = function() {
                    return !A() && navigator.userAgent.includes("Safari") && !navigator.userAgent.includes("Chrome")
                }
                ,
                q.isUWP = function() {
                    return 0 <= I().indexOf("MSAppHost/")
                }
                ,
                q.issuedAtTime = q.isValidTimestamp = q.isValidFormat = void 0,
                q.jsonEval = T,
                q.map = function(e, t, r) {
                    var n, o = {};
                    for (n in e)
                        Object.prototype.hasOwnProperty.call(e, n) && (o[n] = t.call(r, e[n], n, e));
                    return o
                }
                ,
                q.ordinal = function(e) {
                    return Number.isFinite(e) ? e + function(e) {
                        var t = (e = Math.abs(e)) % 100;
                        if (10 <= t && t <= 20)
                            return "th";
                        t = e % 10;
                        return 1 != t ? 2 != t ? 3 != t ? "th" : "rd" : "nd" : "st"
                    }(e) : "".concat(e)
                }
                ,
                q.promiseWithTimeout = function(e) {
                    var t = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : 2e3
                      , r = new j;
                    return setTimeout(function() {
                        return r.reject("timeout!")
                    }, t),
                    e.then(r.resolve, r.reject),
                    r.promise
                }
                ,
                q.querystring = function(e) {
                    for (var r = [], n = 0, o = Object.entries(e); n < o.length; n++)
                        !function() {
                            var e = i(o[n], 2)
                              , t = e[0]
                              , e = e[1];
                            Array.isArray(e) ? e.forEach(function(e) {
                                r.push(encodeURIComponent(t) + "=" + encodeURIComponent(e))
                            }) : r.push(encodeURIComponent(t) + "=" + encodeURIComponent(e))
                        }();
                    return r.length ? "&" + r.join("&") : ""
                }
                ,
                q.querystringDecode = function(e) {
                    var r = {};
                    return e.replace(/^\?/, "").split("&").forEach(function(e) {
                        var t;
                        e && (t = (e = i(e.split("="), 2))[0],
                        e = e[1],
                        r[decodeURIComponent(t)] = decodeURIComponent(e))
                    }),
                    r
                }
                ,
                q.safeGet = function(e, t) {
                    if (Object.prototype.hasOwnProperty.call(e, t))
                        return e[t]
                }
                ,
                q.stringToByteArray = q.stringLength = void 0,
                q.stringify = function(e) {
                    return JSON.stringify(e)
                }
                ,
                q.validateArgCount = q.uuidv4 = void 0,
                q.validateCallback = function(e, t, r, n) {
                    if ((!n || r) && "function" != typeof r)
                        throw new Error(N(e, t) + "must be a valid function.")
                }
                ,
                q.validateContextObject = function(e, t, r, n) {
                    if ((!n || r) && ("object" !== a(r) || null === r))
                        throw new Error(N(e, t) + "must be a valid context object.")
                }
                ,
                q.validateIndexedDBOpenable = function() {
                    return new Promise(function(e, t) {
                        try {
                            var r = !0
                              , n = "validate-browser-context-for-indexeddb-analytics-module"
                              , o = self.indexedDB.open(n);
                            o.onsuccess = function() {
                                o.result.close(),
                                r || self.indexedDB.deleteDatabase(n),
                                e(!0)
                            }
                            ,
                            o.onupgradeneeded = function() {
                                r = !1
                            }
                            ,
                            o.onerror = function() {
                                var e;
                                t((null == (e = o.error) ? void 0 : e.message) || "")
                            }
                        } catch (e) {
                            t(e)
                        }
                    }
                    )
                }
                ;
                function g(e, t) {
                    if (!e)
                        throw m(t)
                }
                function r(e) {
                    for (var t = [], r = 0, n = 0; n < e.length; n++) {
                        var o = e.charCodeAt(n);
                        o < 128 ? t[r++] = o : (o < 2048 ? t[r++] = o >> 6 | 192 : (55296 == (64512 & o) && n + 1 < e.length && 56320 == (64512 & e.charCodeAt(n + 1)) ? (o = 65536 + ((1023 & o) << 10) + (1023 & e.charCodeAt(++n)),
                        t[r++] = o >> 18 | 240,
                        t[r++] = o >> 12 & 63 | 128) : t[r++] = o >> 12 | 224,
                        t[r++] = o >> 6 & 63 | 128),
                        t[r++] = 63 & o | 128)
                    }
                    return t
                }
                function t(e) {
                    return e = r(e),
                    w.encodeByteArray(e, !0)
                }
                var b = {
                    NODE_CLIENT: !(q.validateNamespace = function(e, t, r) {
                        if ((!r || t) && "string" != typeof t)
                            throw new Error(N(e, "namespace") + "must be a valid firebase namespace.")
                    }
                    ),
                    NODE_ADMIN: !1,
                    SDK_VERSION: "${JSCORE_VERSION}"
                }
                  , m = (q.CONSTANTS = b,
                q.assert = g,
                function(e) {
                    return new Error("Firebase Database (" + b.SDK_VERSION + ") INTERNAL ASSERT FAILED: " + e)
                }
                )
                  , w = (q.assertionError = m,
                {
                    byteToCharMap_: null,
                    charToByteMap_: null,
                    byteToCharMapWebSafe_: null,
                    charToByteMapWebSafe_: null,
                    ENCODED_VALS_BASE: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
                    get ENCODED_VALS() {
                        return this.ENCODED_VALS_BASE + "+/="
                    },
                    get ENCODED_VALS_WEBSAFE() {
                        return this.ENCODED_VALS_BASE + "-_."
                    },
                    HAS_NATIVE_SUPPORT: "function" == typeof atob,
                    encodeByteArray: function(e, t) {
                        if (!Array.isArray(e))
                            throw Error("encodeByteArray takes an array as a parameter");
                        this.init_();
                        for (var r = t ? this.byteToCharMapWebSafe_ : this.byteToCharMap_, n = [], o = 0; o < e.length; o += 3) {
                            var i = e[o]
                              , a = o + 1 < e.length
                              , c = a ? e[o + 1] : 0
                              , s = o + 2 < e.length
                              , u = s ? e[o + 2] : 0
                              , f = (15 & c) << 2 | u >> 6
                              , u = 63 & u;
                            s || (u = 64,
                            a) || (f = 64),
                            n.
push(r[i >> 2], r[(3 & i) << 4 | c >> 4], r[f], r[u])
                        }
                        return n.join("")
                    },
                    encodeString: function(e, t) {
                        return this.HAS_NATIVE_SUPPORT && !t ? btoa(e) : this.encodeByteArray(r(e), t)
                    },
                    decodeString: function(e, t) {
                        if (this.HAS_NATIVE_SUPPORT && !t)
                            return atob(e);
                        for (var r = this.decodeStringToByteArray(e, t), n = [], o = 0, i = 0; o < r.length; ) {
                            var a, c, s, u = r[o++];
                            u < 128 ? n[i++] = String.fromCharCode(u) : 191 < u && u < 224 ? (a = r[o++],
                            n[i++] = String.fromCharCode((31 & u) << 6 | 63 & a)) : 239 < u && u < 365 ? (a = ((7 & u) << 18 | (63 & r[o++]) << 12 | (63 & r[o++]) << 6 | 63 & r[o++]) - 65536,
                            n[i++] = String.fromCharCode(55296 + (a >> 10)),
                            n[i++] = String.fromCharCode(56320 + (1023 & a))) : (c = r[o++],
                            s = r[o++],
                            n[i++] = String.fromCharCode((15 & u) << 12 | (63 & c) << 6 | 63 & s))
                        }
                        return n.join("")
                    },
                    decodeStringToByteArray: function(e, t) {
                        this.init_();
                        for (var r = t ? this.charToByteMapWebSafe_ : this.charToByteMap_, n = [], o = 0; o < e.length; ) {
                            var i = r[e.charAt(o++)]
                              , a = o < e.length ? r[e.charAt(o)] : 0
                              , c = ++o < e.length ? r[e.charAt(o)] : 64
                              , s = ++o < e.length ? r[e.charAt(o)] : 64;
                            if (++o,
                            null == i || null == a || null == c || null == s)
                                throw new x;
                            n.push(i << 2 | a >> 4),
                            64 !== c && (n.push(a << 4 & 240 | c >> 2),
                            64 !== s) && n.push(c << 6 & 192 | s)
                        }
                        return n
                    },
                    init_: function() {
                        if (!this.byteToCharMap_) {
                            this.byteToCharMap_ = {},
                            this.charToByteMap_ = {},
                            this.byteToCharMapWebSafe_ = {},
                            this.charToByteMapWebSafe_ = {};
                            for (var e = 0; e < this.ENCODED_VALS.length; e++)
                                this.byteToCharMap_[e] = this.ENCODED_VALS.charAt(e),
                                this.charToByteMap_[this.byteToCharMap_[e]] = e,
                                this.byteToCharMapWebSafe_[e] = this.ENCODED_VALS_WEBSAFE.charAt(e),
                                (this.charToByteMapWebSafe_[this.byteToCharMapWebSafe_[e]] = e) >= this.ENCODED_VALS_BASE.length && (this.charToByteMap_[this.ENCODED_VALS_WEBSAFE.charAt(e)] = e,
                                this.charToByteMapWebSafe_[this.ENCODED_VALS.charAt(e)] = e)
                        }
                    }
                })
                  , x = (q.base64 = w,
                function() {
                    e(r, p(Error));
                    var t = f(r);
                    function r() {
                        var e;
                        return u(this, r),
                        (e = t.apply(this, arguments)).name = "DecodeBase64StringError",
                        e
                    }
                    return s(r)
                }())
                  , _ = (q.DecodeBase64StringError = x,
                q.base64Encode = t,
                function(e) {
                    return t(e).replace(/\./g, "")
                }
                )
                  , E = (q.base64urlEncodeWithoutPadding = _,
                function(e) {
                    try {
                        return w.decodeString(e, !0)
                    } catch (e) {
                        console.error("base64Decode failed: ", e)
                    }
                    return null
                }
                );
                function k(e, t) {
                    if (!(t instanceof Object))
                        return t;
                    switch (t.constructor) {
                    case Date:
                        return new Date(t.getTime());
                    case Object:
                        void 0 === e && (e = {});
                        break;
                    case Array:
                        e = [];
                        break;
                    default:
                        return t
                    }
                    for (var r in t)
                        t.hasOwnProperty(r) && "__proto__" !== r && (e[r] = k(e[r], t[r]));
                    return e
                }
                function S() {
                    if ("undefined" != typeof self)
                        return self;
                    if ("undefined" != typeof window)
                        return window;
                    if (void 0 !== z)
                        return z;
                    throw new Error("Unable to locate global object.")
                }
                q.base64Decode = E;
                function O(e) {
                    var t;
                    return null == (t = null == (t = L()) ? void 0 : t.emulatorHosts) ? void 0 : t[e]
                }
                var L = function() {
                    try {
                        return S().__FIREBASE_DEFAULTS__ || (void 0 !== K && void 0 !== K.env && (e = K.env.__FIREBASE_DEFAULTS__) ? JSON.parse(e) : void 0) || function() {
                            if ("undefined" != typeof document) {
                                try {
                                    e = document.cookie.match(/__FIREBASE_DEFAULTS__=([^;]+)/)
                                } catch (e) {
                                    return
                                }
                                var e = e && E(e[1]);
                                return e && JSON.parse(e)
                            }
                        }()
                    } catch (e) {
                        console.info("Unable to get __FIREBASE_DEFAULTS__ due to: ".concat(e))
                    }
                    var e
                }
                  , j = (q.getDefaults = L,
                q.getDefaultEmulatorHost = O,
                q.getDefaultEmulatorHostnameAndPort = function(e) {
                    e = O(e);
                    if (e) {
                        var t = e.lastIndexOf(":");
                        if (t <= 0 || t + 1 === e.length)
                            throw new Error("Invalid host ".concat(e, " with no separate hostname and port!"));
                        var r = parseInt(e.substring(t + 1), 10);
                        return "[" === e[0] ? [e.substring(1, t - 1), r] : [e.substring(0, t), r]
                    }
                }
                ,
                q.getDefaultAppConfig = function() {
                    var e;
                    return null == (e = L()) ? void 0 : e.config
                }
                ,
                q.getExperimentalSetting = function(e) {
                    var t;
                    return null == (t = L()) ? void 0 : t["_".concat(e)]
                }
                ,
                function() {
                    function e() {
                        var r = this;
                        u(this, e),
                        this.reject = function() {}
                        ,
                        this.resolve = function() {}
                        ,
                        this.promise = new Promise(function(e, t) {
                            r.resolve = e,
                            r.reject = t
                        }
                        )
                    }
                    return s(e, [{
                        key: "wrapCallback",
                        value: function(r) {
                            var n = this;
                            return function(e, t) {
                                e ? n.reject(e) : n.resolve(t),
                                "function" == typeof r && (n.promise.catch(function() {}),
                                1 === r.length ? r(e) : r(e, t))
                            }
                        }
                    }]),
                    e
                }());
                function I() {
                    return "undefined" != typeof navigator && "string" == typeof navigator.userAgent ? navigator.userAgent : ""
                }
                function A() {
                    var e = null == (e = L()) ? void 0 : e.forceEnvironment;
                    if ("node" === e)
                        return !0;
                    if ("browser" === e)
                        return !1;
                    try {
                        return "[object process]" === Object.prototype.toString.call(z.process)
                    } catch (e) {
                        return !1
                    }
                }
                q.Deferred = j;
                var P = function() {
                    e(o, p(Error));
                    var n = f(o);
                    function o(e, t, r) {
                        return u(this, o),
                        (t = n.call(this, t)).code = e,
                        t.customData = r,
                        t.name = "FirebaseError",
                        Object.setPrototypeOf(l(t), o.prototype),
                        Error.captureStackTrace && Error.captureStackTrace(l(t), M.prototype.create),
                        t
                    }
                    return s(o)
                }()
                  , M = (q.FirebaseError = P,
                function() {
                    function n(e, t, r) {
                        u(this, n),
                        this.service = e,
                        this.serviceName = t,
                        this.errors = r
                    }
                    return s(n, [{
                        key: "create",
                        value: function(e) {
                            var n, t = (arguments.length <= 1 ? void 0 : arguments[1]) || {}, r = "".concat(this.service, "/").concat(e), e = this.errors[e], e = e ? (n = t,
                            e.replace(B, function(e, t) {
                                var r = n[t];
                                return null != r ? String(r) : "<".concat(t, "?>")
                            })) : "Error", e = "".concat(this.serviceName, ": ").concat(e, " (").concat(r, ").");
                            return new P(r,e,t)
                        }
                    }]),
                    n
                }());
                q.ErrorFactory = M;
                var B = /\{\$([^}]+)}/g;
                function T(e) {
                    return JSON.parse(e)
                }
                function C(e) {
                    var t = {}
                      , r = {}
                      , n = {}
                      , o = "";
                    try {
                        var i = e.split(".")
                          , t = T(E(i[0]) || "")
                          , r = T(E(i[1]) || "")
                          , o = i[2]
                          , n = r.d || {};
                        delete r.d
                    } catch (e) {}
                    return {
                        header: t,
                        claims: r,
                        data: n,
                        signature: o
                    }
                }
                q.decode = C,
                q.isValidTimestamp = function(e) {
                    var e = C(e).claims
                      , t = Math.floor((new Date).getTime() / 1e3)
                      , r = 0
                      , n = 0;
                    return "object" === a(e) && (e.hasOwnProperty("nbf") ? r = e.nbf : e.hasOwnProperty("iat") && (r = e.iat),
                    n = e.hasOwnProperty("exp") ? e.exp : r + 86400),
                    !!t && !!r && !!n && r <= t && t <= n
                }
                ,
                q.issuedAtTime = function(e) {
                    e = C(e).claims;
                    return "object" === a(e) && e.hasOwnProperty("iat") ? e.iat : null
                }
                ,
                q.isValidFormat = function(e) {
                    e = C(e).claims;
                    return !!e && "object" === a(e) && e.hasOwnProperty("iat")
                }
                ;
                function F(e) {
                    return null !== e && "object" === a(e)
                }
                q.isAdmin = function(e) {
                    e = C(e).claims;
                    return "object" === a(e) && !0 === e.admin
                }
                ;
                var R = function() {
                    function t() {
                        u(this, t),
                        this.chain_ = [],
                        this.buf_ = [],
                        this.W_ = [],
                        this.pad_ = [],
                        this.inbuf_ = 0,
                        this.total_ = 0,
                        this.blockSize = 64,
                        this.pad_[0] = 128;
                        for (var e = 1; e < this.blockSize; ++e)
                            this.pad_[e] = 0;
                        this.reset()
                    }
                    return s(t, [{
                        key: "reset",
                        value: function() {
                            this.chain_[0] = 1732584193,
                            this.chain_[1] = 4023233417,
                            this.chain_[2] = 2562383102,
                            this.chain_[3] = 271733878,
                            this.chain_[4] = 3285377520,
                            this.inbuf_ = 0,
                            this.total_ = 0
                        }
                    }, {
                        key: "compress_",
                        value: function(e, t) {
                            t = t || 0;
                            var r = this.W_;
                            if ("string" == typeof e)
                                for (var n = 0; n < 16; n++)
                                    r[n] = e.charCodeAt(t) << 24 | e.charCodeAt(t + 1) << 16 | e.charCodeAt(t + 2) << 8 | e.charCodeAt(t + 3),
                                    t += 4;
                            else
                                for (var o = 0; o < 16; o++)
                                    r[o] = e[t] << 24 | e[t + 1] << 16 | e[t + 2] << 8 | e[t + 3],
                                    t += 4;
                            for (var i = 16; i < 80; i++) {
                                var a = r[i - 3] ^ r[i - 8] ^ r[i - 14] ^ r[i - 16];
                                r[i] = 4294967295 & (a << 1 | a >>> 31)
                            }
                            for (var c, s = this.chain_[0], u = this.chain_[1], f = this.chain_[2], l = this.chain_[3], p = this.chain_[4], h = 0; h < 80; h++)
                                var d = h < 40 ? h < 20 ? (c = l ^ u & (f ^ l),
                                1518500249) : (c = u ^ f ^ l,
                                1859775393) : h < 60 ? (c = u & f | l & (u | f),
                                2400959708) : (c = u ^ f ^ l,
                                3395469782)
                                  , d = (s << 5 | s >>> 27) + c + p + d + r[h] & 4294967295
                                  , p = l
                                  , l = f
                                  , f = 4294967295 & (u << 30 | u >>> 2)
                                  , u = s
                                  , s = d;
                            this.chain_[0] = this.chain_[0] + s & 4294967295,
                            this.chain_[1] = this.chain_[1] + u & 4294967295,
                            this.chain_[2] = this.chain_[2] + f & 4294967295,
                            this.chain_[3] = this.chain_[3] + l & 4294967295,
                            this.chain_[4] = this.chain_[4] + p & 4294967295
                        }
                    }, {
                        key: "update",
                        value: function(e, t) {
                            if (null != e) {
                                for (var r = (t = void 0 === t ? e.length : t) - this.blockSize, n = 0, o = this.buf_, i = this.inbuf_; n < t; ) {
                                    if (0 === i)
                                        for (; n <= r; )
                                            this.compress_(e, n),
                                            n += this.blockSize;
                                    if ("string" == typeof e) {
                                        for (; n < t; )
                                            if (o[i] = e.charCodeAt(n),
                                            ++n,
                                            ++i === this.blockSize) {
                                                this.compress_(o),
                                                i = 0;
                                                break
                                            }
                                    } else
                                        for (; n < t; )
                                            if (o[i] = e[n],
                                            ++n,
                                            ++i === this.blockSize) {
                                                this.compress_(o),
                                                i = 0;
                                                break
                                            }
                                }
                                this.inbuf_ = i,
                                this.total_ += t
                            }
                        }
                    }, {
                        key: "digest",
                        value: function() {
                            var e = []
                              , t = 8 * this.total_;
                            this.inbuf_ < 56 ? this.update(this.pad_, 56 - this.inbuf_) : this.update(this.pad_, this.blockSize - (this.inbuf_ - 56));
                            for (var r = this.blockSize - 1; 56 <= r; r--)
                                this.buf_[r] = 255 & t,
                                t /= 256;
                            this.compress_(this.buf_);
                            for (var n = 0, o = 0; o < 5; o++)
                                for (var i = 24; 0 <= i; i -= 8)
                                    e[n] = this.chain_[o] >> i & 255,
                                    ++n;
                            return e
                        }
                    }]),
                    t
                }();
                q.Sha1 = R;
                var H = function() {
                    function n(e, t) {
                        var r = this;
                        u(this, n),
                        this.observers = [],
                        this.unsubscribes = [],
                        this.observerCount = 0,
                        this.task = Promise.resolve(),
                        this.finalized = !1,
                        this.onNoObservers = t,
                        this.task.then(function() {
                            e(r)
                        }).catch(function(e) {
                            r.error(e)
                        })
                    }
                    return s(n, [{
                        key: "next",
                        value: function(t) {
                            this.forEachObserver(function(e) {
                                e.next(t)
                            })
                        }
                    }, {
                        key: "error",
                        value: function(t) {
                            this.forEachObserver(function(e) {
                                e.error(t)
                            }),
                            this.close(t)
                        }
                    }, {
                        key: "complete",
                        value: function() {
                            this.forEachObserver(function(e) {
                                e.complete()
                            }),
                            this.close()
                        }
                    }, {
                        key: "subscribe",
                        value: function(e, t, r) {
                            var n, o = this;
                            if (void 0 === e && void 0 === t && void 0 === r)
                                throw new Error("Missing Observer.");
                            void 0 === (n = function(e, t) {
                                if ("object" === a(e) && null !== e) {
                                    var r, n = function(e, t) {
                                        var r, n, o, i, a = "undefined" != typeof Symbol && e[Symbol.iterator] || e["@@iterator"];
                                        if (a)
                                            return n = !(r = !0),
                                            {
                                                s: function() {
                                                    a = a.call(e)
                                                },
                                                n: function() {
                                                    var e = a.next();
                                                    return r = e.done,
                                                    e
                                                },
                                                e: function(e) {
                                                    n = !0,
                                                    o = e
                                                },
                                                f: function() {
                                                    try {
                                                        r || null == a.return || a.return()
                                                    } finally {
                                                        if (n)
                                                            throw o
                                                    }
                                                }
                                            };
                                        if (Array.isArray(e) || (a = c(e)) || t && e && "number" == typeof e.length)
                                            return a && (e = a),
                                            i = 0,
                                            {
                                                s: t = function() {}
                                                ,
                                                n: function() {
                                                    return i >= e.length ? {
                                                        done: !0
                                                    } : {
                                                        done: !1,
                                                        value: e[i++]
                                                    }
                                                },
                                                e: function(e) {
                                                    throw e
                                                },
                                                f: t
                                            };
                                        throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                                    }(t);
                                    try {
                                        for (n.s(); !(r = n.n()).done; ) {
                                            var o = r.value;
                                            if (o in e && "function" == typeof e[o])
                                                return 1
                                        }
                                    } catch (e) {
                                        n.e(e)
                                    } finally {
                                        n.f()
                                    }
                                }
                                return
                            }(e, ["next", "error", "complete"]) ? e : {
                                next: e,
                                error: t,
                                complete: r
                            }).next && (n.next = D),
                            void 0 === n.error && (n.error = D),
                            void 0 === n.complete && (n.complete = D);
                            e = this.unsubscribeOne.bind(this, this.observers.length);
                            return this.finalized && this.task.then(function() {
                                try {
                                    o.finalError ? n.error(o.finalError) : n.complete()
                                } catch (e) {}
                            }),
                            this.observers.push(n),
                            e
                        }
                    }, {
                        key: "unsubscribeOne",
                        value: function(e) {
                            void 0 !== this.observers && void 0 !== this.observers[e] && (delete this.observers[e],
                            --this.observerCount,
                            0 === this.observerCount) && void 0 !== this.onNoObservers && this.onNoObservers(this)
                        }
                    }, {
                        key: "forEachObserver",
                        value: function(e) {
                            if (!this.finalized)
                                for (var t = 0; t < this.observers.length; t++)
                                    this.sendOne(t, e)
                        }
                    }, {
                        key: "sendOne",
                        value: function(e, t) {
                            var r = this;
                            this.task.then(function() {
                                if (void 0 !== r.observers && void 0 !== r.observers[e])
                                    try {
                                        t(r.observers[e])
                                    } catch (e) {
                                        "undefined" != typeof console && console.error && console.error(e)
                                    }
                            })
                        }
                    }, {
                        key: "close",
                        value: function(e) {
                            var t = this;
                            this.finalized || (this.finalized = !0,
                            void 0 !== e && (this.finalError = e),
                            this.task.then(function() {
                                t.observers = void 0,
                                t.onNoObservers = void 0
                            }))
                        }
                    }]),
                    n
                }();
                function D() {}
                function N(e, t) {
                    return "".concat(e, " failed: ").concat(t, " argument ")
                }
                q.validateArgCount = function(e, t, r, n) {
                    var o;
                    if (n < t ? o = "at least " + t : r < n && (o = 0 === r ? "none" : "no more than " + r),
                    o)
                        throw new Error(e + " failed: Was called with " + n + (1 === n ? " argument." : " arguments.") + " Expects " + o + ".")
                }
                ;
                q.stringToByteArray = function(e) {
                    for (var t = [], r = 0, n = 0; n < e.length; n++) {
                        var o, i = e.charCodeAt(n);
                        55296 <= i && i <= 56319 && (o = i - 55296,
                        g(++n < e.length, "Surrogate pair missing trail surrogate."),
                        i = 65536 + (o << 10) + (e.charCodeAt(n) - 56320)),
                        i < 128 ? t[r++] = i : (i < 2048 ? t[r++] = i >> 6 | 192 : (i < 65536 ? t[r++] = i >> 12 | 224 : (t[r++] = i >> 18 | 240,
                        t[r++] = i >> 12 & 63 | 128),
                        t[r++] = i >> 6 & 63 | 128),
                        t[r++] = 63 & i | 128)
                    }
                    return t
                }
                ,
                q.stringLength = function(e) {
                    for (var t = 0, r = 0; r < e.length; r++) {
                        var n = e.charCodeAt(r);
                        n < 128 ? t++ : n < 2048 ? t += 2 : 55296 <= n && n <= 56319 ? (t += 4,
                        r++) : t += 3
                    }
                    return t
                }
                ;
                q.uuidv4 = function() {
                    return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(e) {
                        var t = 16 * Math.random() | 0;
                        return ("x" === e ? t : 3 & t | 8).toString(16)
                    })
                }
                ;
                var G = 1e3
                  , V = 2
                  , U = 144e5
                  , W = (q.MAX_VALUE_MILLIS = U,
                .5);
                q.RANDOM_FACTOR = W
            }
            .call(this)
        }
        .call(this, e("_process"), "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
    }
    , {
        _process: 1
    }],
    8: [function(e, t, r) {
        "use strict";
        Object.defineProperty(r, "__esModule", {
            value: !0
        });
        var n = e("@firebase/app");
        Object.keys(n).forEach(function(e) {
            "default" === e || "__esModule" === e || e in r && r[e] === n[e] || Object.defineProperty(r, e, {
                enumerable: !0,
                get: function() {
                    return n[e]
                }
            })
        });
        (0,
        n.registerVersion)("firebase", "9.19.1", "app")
    }
    , {
        "@firebase/app": 2
    }],
    9: [function(e, t, r) {
        "use strict";
        Object.defineProperty(r, "__esModule", {
            value: !0
        });
        var n = e("@firebase/messaging");
        Object.keys(n).forEach(function(e) {
            "default" === e || "__esModule" === e || e in r && r[e] === n[e] || Object.defineProperty(r, e, {
                enumerable: !0,
                get: function() {
                    return n[e]
                }
            })
        })
    }
    , {
        "@firebase/messaging": 6
    }],
    10: [function(e, t, r) {
        "use strict";
        function k(e) {
            return (k = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                return typeof e
            }
            : function(e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            }
            )(e)
        }
        function i(t, e) {
            var r, n = Object.keys(t);
            return Object.getOwnPropertySymbols && (r = Object.getOwnPropertySymbols(t),
            e && (r = r.filter(function(e) {
                return Object.getOwnPropertyDescriptor(t, e).enumerable
            })),
            n.push.apply(n, r)),
            n
        }
        function o(n) {
            for (var e = 1; e < arguments.length; e++) {
                var o = null != arguments[e] ? arguments[e] : {};
                e % 2 ? i(Object(o), !0).forEach(function(e) {
                    var t, r;
                    t = n,
                    r = o[e = e],
                    (e = function(e) {
                        e = function(e, t) {
                            if ("object" !== k(e) || null === e)
                                return e;
                            var r = e[Symbol.toPrimitive];
                            if (void 0 === r)
                                return ("string" === t ? String : Number)(e);
                            r = r.call(e, t || "default");
                            if ("object" !== k(r))
                                return r;
                            throw new TypeError("@@toPrimitive must return a primitive value.")
                        }(e, "string");
                        return "symbol" === k(e) ? e : String(e)
                    }(e))in t ? Object.defineProperty(t, e, {
                        value: r,
                        enumerable: !0,
                        configurable: !0,
                        writable: !0
                    }) : t[e] = r
                }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(n, Object.getOwnPropertyDescriptors(o)) : i(Object(o)).forEach(function(e) {
                    Object.defineProperty(n, e, Object.getOwnPropertyDescriptor(o, e))
                })
            }
            return n
        }
        function S() {
            S = function() {
                return a
            }
            ;
            var a = {}
              , e = Object.prototype
              , s = e.hasOwnProperty
              , u = Object.defineProperty || function(e, t, r) {
                e[t] = r.value
            }
              , t = "function" == typeof Symbol ? Symbol : {}
              , n = t.iterator || "@@iterator"
              , r = t.asyncIterator || "@@asyncIterator"
              , o = t.toStringTag || "@@toStringTag";
            function i(e, t, r) {
                return Object.defineProperty(e, t, {
                    value: r,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }),
                e[t]
            }
            try {
                i({}, "")
            } catch (e) {
                i = function(e, t, r) {
                    return e[t] = r
                }
            }
            function c(e, t, r, n) {
                var o, i, a, c, t = t && t.prototype instanceof p ? t : p, t = Object.create(t.prototype), n = new x(n || []);
                return u(t, "_invoke", {
                    value: (o = e,
                    i = r,
                    a = n,
                    c = "suspendedStart",
                    function(e, t) {
                        if ("executing" === c)
                            throw new Error("Generator is already running");
                        if ("completed" === c) {
                            if ("throw" === e)
                                throw t;
                            return E()
                        }
                        for (a.method = e,
                        a.arg = t; ; ) {
                            var r = a.delegate;
                            if (r) {
                                r = function e(t, r) {
                                    var n = r.method
                                      , o = t.iterator[n];
                                    if (void 0 === o)
                                        return r.delegate = null,
                                        "throw" === n && t.iterator.return && (r.method = "return",
                                        r.arg = void 0,
                                        e(t, r),
                                        "throw" === r.method) || "return" !== n && (r.method = "throw",
                                        r.arg = new TypeError("The iterator does not provide a '" + n + "' method")),
                                        l;
                                    n = f(o, t.iterator, r.arg);
                                    if ("throw" === n.type)
                                        return r.method = "throw",
                                        r.arg = n.arg,
                                        r.delegate = null,
                                        l;
                                    o = n.arg;
                                    return o ? o.done ? (r[t.resultName] = o.value,
                                    r.next = t.nextLoc,
                                    "return" !== r.method && (r.method = "next",
                                    r.arg = void 0),
                                    r.delegate = null,
                                    l) : o : (r.method = "throw",
                                    r.arg = new TypeError("iterator result is not an object"),
                                    r.delegate = null,
                                    l)
                                }(r, a);
                                if (r) {
                                    if (r === l)
                                        continue;
                                    return r
                                }
                            }
                            if ("next" === a.method)
                                a.sent = a._sent = a.arg;
                            else if ("throw" === a.method) {
                                if ("suspendedStart" === c)
                                    throw c = "completed",
                                    a.arg;
                                a.dispatchException(a.arg)
                            } else
                                "return" === a.method && a.abrupt("return", a.arg);
                            c = "executing";
                            r = f(o, i, a);
                            if ("normal" === r.type) {
                                if (c = a.done ? "completed" : "suspendedYield",
                                r.arg === l)
                                    continue;
                                return {
                                    value: r.arg,
                                    done: a.done
                                }
                            }
                            "throw" === r.type && (c = "completed",
                            a.method = "throw",
                            a.arg = r.arg)
                        }
                    }
                    )
                }),
                t
            }
            function f(e, t, r) {
                try {
                    return {
                        type: "normal",
                        arg: e.call(t, r)
                    }
                } catch (e) {
                    return {
                        type: "throw",
                        arg: e
                    }
                }
            }
            a.wrap = c;
            var l = {};
            function p() {}
            function h() {}
            function d() {}
            var t = {}
              , v = (i(t, n, function() {
                return this
            }),
            Object.getPrototypeOf)
              , v = v && v(v(_([])))
              , y = (v && v !== e && s.call(v, n) && (t = v),
            d.prototype = p.prototype = Object.create(t));
            function g(e) {
                ["next", "throw", "return"].forEach(function(t) {
                    i(e, t, function(e) {
                        return this._invoke(t, e)
                    })
                })
            }
            function b(a, c) {
                var t;
                u(this, "_invoke", {
                    value: function(r, n) {
                        function e() {
                            return new c(function(e, t) {
                                !function t(e, r, n, o) {
                                    var i, e = f(a[e], a, r);
                                    if ("throw" !== e.type)
                                        return (r = (i = e.arg).value) && "object" == k(r) && s.call(r, "__await") ? c.resolve(r.__await).then(function(e) {
                                            t("next", e, n, o)
                                        }, function(e) {
                                            t("throw", e, n, o)
                                        }) : c.resolve(r).then(function(e) {
                                            i.value = e,
                                            n(i)
                                        }, function(e) {
                                            return t("throw", e, n, o)
                                        });
                                    o(e.arg)
                                }(r, n, e, t)
                            }
                            )
                        }
                        return t = t ? t.then(e, e) : e()
                    }
                })
            }
            function m(e) {
                var t = {
                    tryLoc: e[0]
                };
                1 in e && (t.catchLoc = e[1]),
                2 in e && (t.finallyLoc = e[2],
                t.afterLoc = e[3]),
                this.tryEntries.push(t)
            }
            function w(e) {
                var t = e.completion || {};
                t.type = "normal",
                delete t.arg,
                e.completion = t
            }
            function x(e) {
                this.tryEntries = [{
                    tryLoc: "root"
                }],
                e.forEach(m, this),
                this.reset(!0)
            }
            function _(t) {
                if (t) {
                    var r, e = t[n];
                    if (e)
                        return e.call(t);
                    if ("function" == typeof t.next)
                        return t;
                    if (!isNaN(t.length))
                        return r = -1,
                        (e = function e() {
                            for (; ++r < t.length; )
                                if (s.call(t, r))
                                    return e.value = t[r],
                                    e.done = !1,
                                    e;
                            return e.value = void 0,
                            e.done = !0,
                            e
                        }
                        ).next = e
                }
                return {
                    next: E
                }
            }
            function E() {
                return {
                    value: void 0,
                    done: !0
                }
            }
            return u(y, "constructor", {
                value: h.prototype = d,
                configurable: !0
            }),
            u(d, "constructor", {
                value: h,
                configurable: !0
            }),
            h.displayName = i(d, o, "GeneratorFunction"),
            a.isGeneratorFunction = function(e) {
                e = "function" == typeof e && e.constructor;
                return !!e && (e === h || "GeneratorFunction" === (e.displayName || e.name))
            }
            ,
            a.mark = function(e) {
                return Object.setPrototypeOf ? Object.setPrototypeOf(e, d) : (e.__proto__ = d,
                i(e, o, "GeneratorFunction")),
                e.prototype = Object.create(y),
                e
            }
            ,
            a.awrap = function(e) {
                return {
                    __await: e
                }
            }
            ,
            g(b.prototype),
            i(b.prototype, r, function() {
                return this
            }),
            a.AsyncIterator = b,
            a.async = function(e, t, r, n, o) {
                void 0 === o && (o = Promise);
                var i = new b(c(e, t, r, n),o);
                return a.isGeneratorFunction(t) ? i : i.next().then(function(e) {
                    return e.done ? e.value : i.next()
                })
            }
            ,
            g(y),
            i(y, o, "Generator"),
            i(y, n, function() {
                return this
            }),
            i(y, "toString", function() {
                return "[object Generator]"
            }),
            a.keys = function(e) {
                var t, r = Object(e), n = [];
                for (t in r)
                    n.push(t);
                return n.reverse(),
                function e() {
                    for (; n.length; ) {
                        var t = n.pop();
                        if (t in r)
                            return e.value = t,
                            e.done = !1,
                            e
                    }
                    return e.done = !0,
                    e
                }
            }
            ,
            a.values = _,
            x.prototype = {
                constructor: x,
                reset: function(e) {
                    if (this.prev = 0,
                    this.next = 0,
                    this.sent = this._sent = void 0,
                    this.done = !1,
                    this.delegate = null,
                    this.method = "next",
                    this.arg = void 0,
                    this.tryEntries.forEach(w),
                    !e)
                        for (var t in this)
                            "t" === t.charAt(0) && s.call(this, t) && !isNaN(+t.slice(1)) && (this[t] = void 0)
                },
                stop: function() {
                    this.done = !0;
                    var e = this.tryEntries[0].completion;
                    if ("throw" === e.type)
                        throw e.arg;
                    return this.rval
                },
                dispatchException: function(r) {
                    if (this.done)
                        throw r;
                    var n = this;
                    function e(e, t) {
                        return i.type = "throw",
                        i.arg = r,
                        n.next = e,
                        t && (n.method = "next",
                        n.arg = void 0),
                        !!t
                    }
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var o = this.tryEntries[t]
                          , i = o.completion;
                        if ("root" === o.tryLoc)
                            return e("end");
                        if (o.tryLoc <= this.prev) {
                            var a = s.call(o, "catchLoc")
                              , c = s.call(o, "finallyLoc");
                            if (a && c) {
                                if (this.prev < o.catchLoc)
                                    return e(o.catchLoc, !0);
                                if (this.prev < o.finallyLoc)
                                    return e(o.finallyLoc)
                            } else if (a) {
                                if (this.prev < o.catchLoc)
                                    return e(o.catchLoc, !0)
                            } else {
                                if (!c)
                                    throw new Error("try statement without catch or finally");
                                if (this.prev < o.finallyLoc)
                                    return e(o.finallyLoc)
                            }
                        }
                    }
                },
                abrupt: function(e, t) {
                    for (var r = this.tryEntries.length - 1; 0 <= r; --r) {
                        var n = this.tryEntries[r];
                        if (n.tryLoc <= this.prev && s.call(n, "finallyLoc") && this.prev < n.finallyLoc) {
                            var o = n;
                            break
                        }
                    }
                    var i = (o = o && ("break" === e || "continue" === e) && o.tryLoc <= t && t <= o.finallyLoc ? null : o) ? o.completion : {};
                    return i.type = e,
                    i.arg = t,
                    o ? (this.method = "next",
                    this.next = o.finallyLoc,
                    l) : this.complete(i)
                },
                complete: function(e, t) {
                    if ("throw" === e.type)
                        throw e.arg;
                    return "break" === e.type || "continue" === e.type ? this.next = e.arg : "return" === e.type ? (this.rval = this.arg = e.arg,
                    this.method = "return",
                    this.next = "end") : "normal" === e.type && t && (this.next = t),
                    l
                },
                finish: function(e) {
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var r = this.tryEntries[t];
                        if (r.finallyLoc === e)
                            return this.complete(r.completion, r.afterLoc),
                            w(r),
                            l
                    }
                },
                catch: function(e) {
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var r, n, o = this.tryEntries[t];
                        if (o.tryLoc === e)
                            return "throw" === (r = o.completion).type && (n = r.arg,
                            w(o)),
                            n
                    }
                    throw new Error("illegal catch attempt")
                },
                delegateYield: function(e, t, r) {
                    return this.delegate = {
                        iterator: _(e),
                        resultName: t,
                        nextLoc: r
                    },
                    "next" === this.method && (this.arg = void 0),
                    l
                }
            },
            a
        }
        function l(e, t, r, n, o, i, a) {
            try {
                var c = e[i](a)
                  , s = c.value
            } catch (e) {
                return void r(e)
            }
            c.done ? t(s) : Promise.resolve(s).then(n, o)
        }
        Object.defineProperty(r, "__esModule", {
            value: !0
        });
        var s = e("./wrap-idb-value.cjs");
        var n = ["get", "getKey", "getAll", "getAllKeys", "count"]
          , a = ["put", "add", "delete", "clear"]
          , c = new Map;
        function u(e, t) {
            var s, u, f;
            if (e instanceof IDBDatabase && !(t in e) && "string" == typeof t)
                return c.get(t) ? c.get(t) : (s = t.replace(/FromIndex$/, ""),
                u = t !== s,
                f = a.includes(s),
                s in (u ? IDBIndex : IDBObjectStore).prototype && (f || n.includes(s)) ? (e = function() {
                    c = S().mark(function e(t) {
                        var r, n, o, i, a, c = arguments;
                        return S().wrap(function(e) {
                            for (; ; )
                                switch (e.prev = e.next) {
                                case 0:
                                    for (r = this.transaction(t, f ? "readwrite" : "readonly"),
                                    n = r.store,
                                    o = c.length,
                                    i = new Array(1 < o ? o - 1 : 0),
                                    a = 1; a < o; a++)
                                        i[a - 1] = c[a];
                                    return u && (n = n.index(i.shift())),
                                    e.next = 6,
                                    Promise.all([n[s].apply(n, i), f && r.done]);
                                case 6:
                                    return e.abrupt("return", e.sent[0]);
                                case 7:
                                case "end":
                                    return e.stop()
                                }
                        }, e, this)
                    });
                    var c, t = function() {
                        var e = this
                          , a = arguments;
                        return new Promise(function(t, r) {
                            var n = c.apply(e, a);
                            function o(e) {
                                l(n, t, r, o, i, "next", e)
                            }
                            function i(e) {
                                l(n, t, r, o, i, "throw", e)
                            }
                            o(void 0)
                        }
                        )
                    };
                    return function(e) {
                        return t.apply(this, arguments)
                    }
                }(),
                c.set(t, e),
                e) : void 0)
        }
        s.replaceTraps(function(n) {
            return o(o({}, n), {}, {
                get: function(e, t, r) {
                    return u(e, t) || n.get(e, t, r)
                },
                has: function(e, t) {
                    return !!u(e, t) || n.has(e, t)
                }
            })
        }),
        r.unwrap = s.unwrap,
        r.wrap = s.wrap,
        r.deleteDB = function(e) {
            var t = (1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {}).blocked
              , e = indexedDB.deleteDatabase(e);
            return t && e.addEventListener("blocked", function() {
                return t()
            }),
            s.wrap(e).then(function() {})
        }
        ,
        r.openDB = function(e, t) {
            var r = (c = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : {}).blocked
              , n = c.upgrade
              , o = c.blocking
              , i = c.terminated
              , a = indexedDB.open(e, t)
              , c = s.wrap(a);
            return n && a.addEventListener("upgradeneeded", function(e) {
                n(s.wrap(a.result), e.oldVersion, e.newVersion, s.wrap(a.transaction))
            }),
            r && a.addEventListener("blocked", function() {
                return r()
            }),
            c.then(function(e) {
                i && e.addEventListener("close", function() {
                    return i()
                }),
                o && e.addEventListener("versionchange", function() {
                    return o()
                })
            }).catch(function() {}),
            c
        }
    }
    , {
        "./wrap-idb-value.cjs": 11
    }],
    11: [function(e, t, r) {
        "use strict";
        var n, o, a = function(t, e) {
            return e.some(function(e) {
                return t instanceof e
            })
        };
        var c = new WeakMap
          , s = new WeakMap
          , u = new WeakMap
          , f = new WeakMap
          , l = new WeakMap;
        var p = {
            get: function(e, t, r) {
                if (e instanceof IDBTransaction) {
                    if ("done" === t)
                        return s.get(e);
                    if ("objectStoreNames" === t)
                        return e.objectStoreNames || u.get(e);
                    if ("store" === t)
                        return r.objectStoreNames[1] ? void 0 : r.objectStore(r.objectStoreNames[0])
                }
                return v(e[t])
            },
            set: function(e, t, r) {
                return e[t] = r,
                !0
            },
            has: function(e, t) {
                return e instanceof IDBTransaction && ("done" === t || "store" === t) || t in e
            }
        };
        function h(i) {
            return i !== IDBDatabase.prototype.transaction || "objectStoreNames"in IDBTransaction.prototype ? (o = o || [IDBCursor.prototype.advance, IDBCursor.prototype.continue, IDBCursor.prototype.continuePrimaryKey]).includes(i) ? function() {
                for (var e = arguments.length, t = new Array(e), r = 0; r < e; r++)
                    t[r] = arguments[r];
                return i.apply(y(this), t),
                v(c.get(this))
            }
            : function() {
                for (var e = arguments.length, t = new Array(e), r = 0; r < e; r++)
                    t[r] = arguments[r];
                return v(i.apply(y(this), t))
            }
            : function(e) {
                for (var t = arguments.length, r = new Array(1 < t ? t - 1 : 0), n = 1; n < t; n++)
                    r[n - 1] = arguments[n];
                var o = i.call.apply(i, [y(this), e].concat(r));
                return u.set(o, e.sort ? e.sort() : [e]),
                v(o)
            }
        }
        function d(e) {
            var i, t;
            return "function" == typeof e ? h(e) : (e instanceof IDBTransaction && (i = e,
            s.has(i) || (t = new Promise(function(e, t) {
                function r() {
                    e(),
                    o()
                }
                function n() {
                    t(i.error || new DOMException("AbortError","AbortError")),
                    o()
                }
                var o = function() {
                    i.removeEventListener("complete", r),
                    i.removeEventListener("error", n),
                    i.removeEventListener("abort", n)
                };
                i.addEventListener("complete", r),
                i.addEventListener("error", n),
                i.addEventListener("abort", n)
            }
            ),
            s.set(i, t))),
            a(e, n = n || [IDBDatabase, IDBObjectStore, IDBIndex, IDBCursor, IDBTransaction]) ? new Proxy(e,p) : e)
        }
        function v(e) {
            var i, t;
            return e instanceof IDBRequest ? (i = e,
            (t = new Promise(function(e, t) {
                function r() {
                    e(v(i.result)),
                    o()
                }
                function n() {
                    t(i.error),
                    o()
                }
                var o = function() {
                    i.removeEventListener("success", r),
                    i.removeEventListener("error", n)
                };
                i.addEventListener("success", r),
                i.addEventListener("error", n)
            }
            )).then(function(e) {
                e instanceof IDBCursor && c.set(e, i)
            }).catch(function() {}),
            l.set(t, i),
            t) : f.has(e) ? f.get(e) : ((t = d(e)) !== e && (f.set(e, t),
            l.set(t, e)),
            t)
        }
        function y(e) {
            return l.get(e)
        }
        r.instanceOfAny = a,
        r.replaceTraps = function(e) {
            p = e(p)
        }
        ,
        r.reverseTransformCache = l,
        r.unwrap = y,
        r.wrap = v
    }
    , {}],
    12: [function(e, n, t) {
        !function(e) {
            !function() {
                "use strict";
                function s(e) {
                    return (s = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                        return typeof e
                    }
                    : function(e) {
                        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                    }
                    )(e)
                }
                var t, r, i, a, c, u, f, l, p, h, d, v, y, g, b, m, w, x, _, E, k, S, O, L, j;
                !function(t) {
                    var o = "object" === (void 0 === e ? "undefined" : s(e)) ? e : "object" === ("undefined" == typeof self ? "undefined" : s(self)) ? self : "object" === s(this) ? this : {};
                    function r(r, n) {
                        return r !== o && ("function" == typeof Object.create ? Object.defineProperty(r, "__esModule", {
                            value: !0
                        }) : r.__esModule = !0),
                        function(e, t) {
                            return r[e] = n ? n(e, t) : t
                        }
                    }
                    "function" == typeof define && define.amd ? define("tslib", ["exports"], function(e) {
                        t(r(o, r(e)))
                    }) : "object" === (void 0 === n ? "undefined" : s(n)) && "object" === s(n.exports) ? t(r(o, r(n.exports))) : t(r(o))
                }(function(e) {
                    var n = Object.setPrototypeOf || ({
                        __proto__: []
                    }instanceof Array ? function(e, t) {
                        e.__proto__ = t
                    }
                    : function(e, t) {
                        for (var r in t)
                            Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r])
                    }
                    )
                      , o = (t = function(e, t) {
                        if ("function" != typeof t && null !== t)
                            throw new TypeError("Class extends value " + String(t) + " is not a constructor or null");
                        function r() {
                            this.constructor = e
                        }
                        n(e, t),
                        e.prototype = null === t ? Object.create(t) : (r.prototype = t.prototype,
                        new r)
                    }
                    ,
                    r = Object.assign || function(e) {
                        for (var t, r = 1, n = arguments.length; r < n; r++)
                            for (var o in t = arguments[r])
                                Object.prototype.hasOwnProperty.call(t, o) && (e[o] = t[o]);
                        return e
                    }
                    ,
                    i = function(e, t) {
                        var r = {};
                        for (o in e)
                            Object.prototype.hasOwnProperty.call(e, o) && t.indexOf(o) < 0 && (r[o] = e[o]);
                        if (null != e && "function" == typeof Object.getOwnPropertySymbols)
                            for (var n = 0, o = Object.getOwnPropertySymbols(e); n < o.length; n++)
                                t.indexOf(o[n]) < 0 && Object.prototype.propertyIsEnumerable.call(e, o[n]) && (r[o[n]] = e[o[n]]);
                        return r
                    }
                    ,
                    a = function(e, t, r, n) {
                        var o, i = arguments.length, a = i < 3 ? t : null === n ? n = Object.getOwnPropertyDescriptor(t, r) : n;
                        if ("object" === ("undefined" == typeof Reflect ? "undefined" : s(Reflect)) && "function" == typeof Reflect.decorate)
                            a = Reflect.decorate(e, t, r, n);
                        else
                            for (var c = e.length - 1; 0 <= c; c--)
                                (o = e[c]) && (a = (i < 3 ? o(a) : 3 < i ? o(t, r, a) : o(t, r)) || a);
                        return 3 < i && a && Object.defineProperty(t, r, a),
                        a
                    }
                    ,
                    c = function(r, n) {
                        return function(e, t) {
                            n(e, t, r)
                        }
                    }
                    ,
                    u = function(e, t) {
                        if ("object" === ("undefined" == typeof Reflect ? "undefined" : s(Reflect)) && "function" == typeof Reflect.metadata)
                            return Reflect.metadata(e, t)
                    }
                    ,
                    f = function(e, a, c, s) {
                        return new (c = c || Promise)(function(r, t) {
                            function n(e) {
                                try {
                                    i(s.next(e))
                                } catch (e) {
                                    t(e)
                                }
                            }
                            function o(e) {
                                try {
                                    i(s.throw(e))
                                } catch (e) {
                                    t(e)
                                }
                            }
                            function i(e) {
                                var t;
                                e.done ? r(e.value) : ((t = e.value)instanceof c ? t : new c(function(e) {
                                    e(t)
                                }
                                )).then(n, o)
                            }
                            i((s = s.apply(e, a || [])).next())
                        }
                        )
                    }
                    ,
                    l = function(n, o) {
                        var i, a, c, s = {
                            label: 0,
                            sent: function() {
                                if (1 & c[0])
                                    throw c[1];
                                return c[1]
                            },
                            trys: [],
                            ops: []
                        }, e = {
                            next: t(0),
                            throw: t(1),
                            return: t(2)
                        };
                        return "function" == typeof Symbol && (e[Symbol.iterator] = function() {
                            return this
                        }
                        ),
                        e;
                        function t(r) {
                            return function(e) {
                                var t = [r, e];
                                if (i)
                                    throw new TypeError("Generator is already executing.");
                                for (; s; )
                                    try {
                                        if (i = 1,
                                        a && (c = 2 & t[0] ? a.return : t[0] ? a.throw || ((c = a.return) && c.call(a),
                                        0) : a.next) && !(c = c.call(a, t[1])).done)
                                            return c;
                                        switch (a = 0,
                                        (t = c ? [2 & t[0], c.value] : t)[0]) {
                                        case 0:
                                        case 1:
                                            c = t;
                                            break;
                                        case 4:
                                            return s.label++,
                                            {
                                                value: t[1],
                                                done: !1
                                            };
                                        case 5:
                                            s.label++,
                                            a = t[1],
                                            t = [0];
                                            continue;
                                        case 7:
                                            t = s.ops.pop(),
                                            s.trys.pop();
                                            continue;
                                        default:
                                            if (!(c = 0 < (c = s.trys).length && c[c.length - 1]) && (6 === t[0] || 2 === t[0])) {
                                                s = 0;
                                                continue
                                            }
                                            if (3 === t[0] && (!c || t[1] > c[0] && t[1] < c[3]))
                                                s.label = t[1];
                                            else if (6 === t[0] && s.label < c[1])
                                                s.label = c[1],
                                                c = t;
                                            else {
                                                if (!(c && s.label < c[2])) {
                                                    c[2] && s.ops.pop(),
                                                    s.trys.pop();
                                                    continue
                                                }
                                                s.label = c[2],
                                                s.ops.push(t)
                                            }
                                        }
                                        t = o.call(n, s)
                                    } catch (e) {
                                        t = [6, e],
                                        a = 0
                                    } finally {
                                        i = c = 0
                                    }
                                if (5 & t[0])
                                    throw t[1];
                                return {
                                    value: t[0] ? t[1] : void 0,
                                    done: !0
                                }
                            }
                        }
                    }
                    ,
                    p = function(e, t) {
                        for (var r in e)
                            "default" === r || Object.prototype.hasOwnProperty.call(t, r) || j(t, e, r)
                    }
                    ,
                    j = Object.create ? function(e, t, r, n) {
                        void 0 === n && (n = r);
                        var o = Object.getOwnPropertyDescriptor(t, r);
                        o && ("get"in o ? t.__esModule : !o.writable && !o.configurable) || (o = {
                            enumerable: !0,
                            get: function() {
                                return t[r]
                            }
                        }),
                        Object.defineProperty(e, n, o)
                    }
                    : function(e, t, r, n) {
                        e[n = void 0 === n ? r : n] = t[r]
                    }
                    ,
                    h = function(e) {
                        var t = "function" == typeof Symbol && Symbol.iterator
                          , r = t && e[t]
                          , n = 0;
                        if (r)
                            return r.call(e);
                        if (e && "number" == typeof e.length)
                            return {
                                next: function() {
                                    return {
                                        value: (e = e && n >= e.length ? void 0 : e) && e[n++],
                                        done: !e
                                    }
                                }
                            };
                        throw new TypeError(t ? "Object is not iterable." : "Symbol.iterator is not defined.")
                    }
                    ,
                    d = function(e, t) {
                        var r = "function" == typeof Symbol && e[Symbol.iterator];
                        if (!r)
                            return e;
                        var n, o, i = r.call(e), a = [];
                        try {
                            for (; (void 0 === t || 0 < t--) && !(n = i.next()).done; )
                                a.push(n.value)
                        } catch (e) {
                            o = {
                                error: e
                            }
                        } finally {
                            try {
                                n && !n.done && (r = i.return) && r.call(i)
                            } finally {
                                if (o)
                                    throw o.error
                            }
                        }
                        return a
                    }
                    ,
                    v = function() {
                        for (var e = [], t = 0; t < arguments.length; t++)
                            e = e.concat(d(arguments[t]));
                        return e
                    }
                    ,
                    y = function() {
                        for (var e = 0, t = 0, r = arguments.length; t < r; t++)
                            e += arguments[t].length;
                        for (var n = Array(e), o = 0, t = 0; t < r; t++)
                            for (var i = arguments[t], a = 0, c = i.length; a < c; a++,
                            o++)
                                n[o] = i[a];
                        return n
                    }
                    ,
                    g = function(e, t, r) {
                        if (r || 2 === arguments.length)
                            for (var n, o = 0, i = t.length; o < i; o++)
                                !n && o in t || ((n = n || Array.prototype.slice.call(t, 0, o))[o] = t[o]);
                        return e.concat(n || Array.prototype.slice.call(t))
                    }
                    ,
                    b = function(e) {
                        return this instanceof b ? (this.v = e,
                        this) : new b(e)
                    }
                    ,
                    m = function(e, t, r) {
                        var o, i, a;
                        if (Symbol.asyncIterator)
                            return o = r.apply(e, t || []),
                            i = [],
                            a = {},
                            n("next"),
                            n("throw"),
                            n("return"),
                            a[Symbol.asyncIterator] = function() {
                                return this
                            }
                            ,
                            a;
                        throw new TypeError("Symbol.asyncIterator is not defined.");
                        function n(n) {
                            o[n] && (a[n] = function(r) {
                                return new Promise(function(e, t) {
                                    1 < i.push([n, r, e, t]) || c(n, r)
                                }
                                )
                            }
                            )
                        }
                        function c(e, t) {
                            try {
                                (r = o[e](t)).value instanceof b ? Promise.resolve(r.value.v).then(s, u) : f(i[0][2], r)
                            } catch (e) {
                                f(i[0][3], e)
                            }
                            var r
                        }
                        function s(e) {
                            c("next", e)
                        }
                        function u(e) {
                            c("throw", e)
                        }
                        function f(e, t) {
                            e(t),
                            i.shift(),
                            i.length && c(i[0][0], i[0][1])
                        }
                    }
                    ,
                    w = function(n) {
                        var o, e = {};
                        return t("next"),
                        t("throw", function(e) {
                            throw e
                        }),
                        t("return"),
                        e[Symbol.iterator] = function() {
                            return this
                        }
                        ,
                        e;
                        function t(t, r) {
                            e[t] = n[t] ? function(e) {
                                return (o = !o) ? {
                                    value: b(n[t](e)),
                                    done: "return" === t
                                } : r ? r(e) : e
                            }
                            : r
                        }
                    }
                    ,
                    x = function(a) {
                        var e, t;
                        if (Symbol.asyncIterator)
                            return (e = a[Symbol.asyncIterator]) ? e.call(a) : (a = h(a),
                            t = {},
                            r("next"),
                            r("throw"),
                            r("return"),
                            t[Symbol.asyncIterator] = function() {
                                return this
                            }
                            ,
                            t);
                        throw new TypeError("Symbol.asyncIterator is not defined.");
                        function r(i) {
                            t[i] = a[i] && function(o) {
                                return new Promise(function(e, t) {
                                    var r, n;
                                    o = a[i](o),
                                    r = e,
                                    e = t,
                                    n = o.done,
                                    t = o.value,
                                    Promise.resolve(t).then(function(e) {
                                        r({
                                            value: e,
                                            done: n
                                        })
                                    }, e)
                                }
                                )
                            }
                        }
                    }
                    ,
                    _ = function(e, t) {
                        return Object.defineProperty ? Object.defineProperty(e, "raw", {
                            value: t
                        }) : e.raw = t,
                        e
                    }
                    ,
                    Object.create ? function(e, t) {
                        Object.defineProperty(e, "default", {
                            enumerable: !0,
                            value: t
                        })
                    }
                    : function(e, t) {
                        e.default = t
                    }
                    );
                    E = function(e) {
                        if (e && e.__esModule)
                            return e;
                        var t = {};
                        if (null != e)
                            for (var r in e)
                                "default" !== r && Object.prototype.hasOwnProperty.call(e, r) && j(t, e, r);
                        return o(t, e),
                        t
                    }
                    ,
                    k = function(e) {
                        return e && e.__esModule ? e : {
                            default: e
                        }
                    }
                    ,
                    S = function(e, t, r, n) {
                        if ("a" === r && !n)
                            throw new TypeError("Private accessor was defined without a getter");
                        if ("function" == typeof t ? e === t && n : t.has(e))
                            return "m" === r ? n : "a" === r ? n.call(e) : n ? n.value : t.get(e);
                        throw new TypeError("Cannot read private member from an object whose class did not declare it")
                    }
                    ,
                    O = function(e, t, r, n, o) {
                        if ("m" === n)
                            throw new TypeError("Private method is not writable");
                        if ("a" === n && !o)
                            throw new TypeError("Private accessor was defined without a setter");
                        if ("function" == typeof t ? e === t && o : t.has(e))
                            return "a" === n ? o.call(e, r) : o ? o.value = r : t.set(e, r),
                            r;
                        throw new TypeError("Cannot write private member to an object whose class did not declare it")
                    }
                    ,
                    L = function(e, t) {
                        if (null === t || "object" !== s(t) && "function" != typeof t)
                            throw new TypeError("Cannot use 'in' operator on non-object");
                        return "function" == typeof e ? t === e : e.has(t)
                    }
                    ,
                    e("__extends", t),
                    e("__assign", r),
                    e("__rest", i),
                    e("__decorate", a),
                    e("__param", c),
                    e("__metadata", u),
                    e("__awaiter", f),
                    e("__generator", l),
                    e("__exportStar", p),
                    e("__createBinding", j),
                    e("__values", h),
                    e("__read", d),
                    e("__spread", v),
                    e("__spreadArrays", y),
                    e("__spreadArray", g),
                    e("__await", b),
                    e("__asyncGenerator", m),
                    e("__asyncDelegator", w),
                    e("__asyncValues", x),
                    e("__makeTemplateObject", _),
                    e("__importStar", E),
                    e("__importDefault", k),
                    e("__classPrivateFieldGet", S),
                    e("__classPrivateFieldSet", O),
                    e("__classPrivateFieldIn", L)
                })
            }
            .call(this)
        }
        .call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
    }
    , {}],
    13: [function(e, t, r) {
        "use strict";
        var n = e("firebase/app")
          , o = e("firebase/messaging");
        function k(e) {
            return (k = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                return typeof e
            }
            : function(e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            }
            )(e)
        }
        function S() {
            S = function() {
                return a
            }
            ;
            var a = {}
              , e = Object.prototype
              , s = e.hasOwnProperty
              , u = Object.defineProperty || function(e, t, r) {
                e[t] = r.value
            }
              , t = "function" == typeof Symbol ? Symbol : {}
              , n = t.iterator || "@@iterator"
              , r = t.asyncIterator || "@@asyncIterator"
              , o = t.toStringTag || "@@toStringTag";
            function i(e, t, r) {
                return Object.defineProperty(e, t, {
                    value: r,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }),
                e[t]
            }
            try {
                i({}, "")
            } catch (e) {
                i = function(e, t, r) {
                    return e[t] = r
                }
            }
            function c(e, t, r, n) {
                var o, i, a, c, t = t && t.prototype instanceof p ? t : p, t = Object.create(t.prototype), n = new x(n || []);
                return u(t, "_invoke", {
                    value: (o = e,
                    i = r,
                    a = n,
                    c = "suspendedStart",
                    function(e, t) {
                        if ("executing" === c)
                            throw new Error("Generator is already running");
                        if ("completed" === c) {
                            if ("throw" === e)
                                throw t;
                            return E()
                        }
                        for (a.method = e,
                        a.arg = t; ; ) {
                            var r = a.delegate;
                            if (r) {
                                r = function e(t, r) {
                                    var n = r.method
                                      , o = t.iterator[n];
                                    if (void 0 === o)
                                        return r.delegate = null,
                                        "throw" === n && t.iterator.return && (r.method = "return",
                                        r.arg = void 0,
                                        e(t, r),
                                        "throw" === r.method) || "return" !== n && (r.method = "throw",
                                        r.arg = new TypeError("The iterator does not provide a '" + n + "' method")),
                                        l;
                                    n = f(o, t.iterator, r.arg);
                                    if ("throw" === n.type)
                                        return r.method = "throw",
                                        r.arg = n.arg,
                                        r.delegate = null,
                                        l;
                                    o = n.arg;
                                    return o ? o.done ? (r[t.resultName] = o.value,
                                    r.next = t.nextLoc,
                                    "return" !== r.method && (r.method = "next",
                                    r.arg = void 0),
                                    r.delegate = null,
                                    l) : o : (r.method = "throw",
                                    r.arg = new TypeError("iterator result is not an object"),
                                    r.delegate = null,
                                    l)
                                }(r, a);
                                if (r) {
                                    if (r === l)
                                        continue;
                                    return r
                                }
                            }
                            if ("next" === a.method)
                                a.sent = a._sent = a.arg;
                            else if ("throw" === a.method) {
                                if ("suspendedStart" === c)
                                    throw c = "completed",
                                    a.arg;
                                a.dispatchException(a.arg)
                            } else
                                "return" === a.method && a.abrupt("return", a.arg);
                            c = "executing";
                            r = f(o, i, a);
                            if ("normal" === r.type) {
                                if (c = a.done ? "completed" : "suspendedYield",
                                r.arg === l)
                                    continue;
                                return {
                                    value: r.arg,
                                    done: a.done
                                }
                            }
                            "throw" === r.type && (c = "completed",
                            a.method = "throw",
                            a.arg = r.arg)
                        }
                    }
                    )
                }),
                t
            }
            function f(e, t, r) {
                try {
                    return {
                        type: "normal",
                        arg: e.call(t, r)
                    }
                } catch (e) {
                    return {
                        type: "throw",
                        arg: e
                    }
                }
            }
            a.wrap = c;
            var l = {};
            function p() {}
            function h() {}
            function d() {}
            var t = {}
              , v = (i(t, n, function() {
                return this
            }),
            Object.getPrototypeOf)
              , v = v && v(v(_([])))
              , y = (v && v !== e && s.call(v, n) && (t = v),
            d.prototype = p.prototype = Object.create(t));
            function g(e) {
                ["next", "throw", "return"].forEach(function(t) {
                    i(e, t, function(e) {
                        return this._invoke(t, e)
                    })
                })
            }
            function b(a, c) {
                var t;
                u(this, "_invoke", {
                    value: function(r, n) {
                        function e() {
                            return new c(function(e, t) {
                                !function t(e, r, n, o) {
                                    var i, e = f(a[e], a, r);
                                    if ("throw" !== e.type)
                                        return (r = (i = e.arg).value) && "object" == k(r) && s.call(r, "__await") ? c.resolve(r.__await).then(function(e) {
                                            t("next", e, n, o)
                                        }, function(e) {
                                            t("throw", e, n, o)
                                        }) : c.resolve(r).then(function(e) {
                                            i.value = e,
                                            n(i)
                                        }, function(e) {
                                            return t("throw", e, n, o)
                                        });
                                    o(e.arg)
                                }(r, n, e, t)
                            }
                            )
                        }
                        return t = t ? t.then(e, e) : e()
                    }
                })
            }
            function m(e) {
                var t = {
                    tryLoc: e[0]
                };
                1 in e && (t.catchLoc = e[1]),
                2 in e && (t.finallyLoc = e[2],
                t.afterLoc = e[3]),
                this.tryEntries.push(t)
            }
            function w(e) {
                var t = e.completion || {};
                t.type = "normal",
                delete t.arg,
                e.completion = t
            }
            function x(e) {
                this.tryEntries = [{
                    tryLoc: "root"
                }],
                e.forEach(m, this),
                this.reset(!0)
            }
            function _(t) {
                if (t) {
                    var r, e = t[n];
                    if (e)
                        return e.call(t);
                    if ("function" == typeof t.next)
                        return t;
                    if (!isNaN(t.length))
                        return r = -1,
                        (e = function e() {
                            for (; ++r < t.length; )
                                if (s.call(t, r))
                                    return e.value = t[r],
                                    e.done = !1,
                                    e;
                            return e.value = void 0,
                            e.done = !0,
                            e
                        }
                        ).next = e
                }
                return {
                    next: E
                }
            }
            function E() {
                return {
                    value: void 0,
                    done: !0
                }
            }
            return u(y, "constructor", {
                value: h.prototype = d,
                configurable: !0
            }),
            u(d, "constructor", {
                value: h,
                configurable: !0
            }),
            h.displayName = i(d, o, "GeneratorFunction"),
            a.isGeneratorFunction = function(e) {
                e = "function" == typeof e && e.constructor;
                return !!e && (e === h || "GeneratorFunction" === (e.displayName || e.name))
            }
            ,
            a.mark = function(e) {
                return Object.setPrototypeOf ? Object.setPrototypeOf(e, d) : (e.__proto__ = d,
                i(e, o, "GeneratorFunction")),
                e.prototype = Object.create(y),
                e
            }
            ,
            a.awrap = function(e) {
                return {
                    __await: e
                }
            }
            ,
            g(b.prototype),
            i(b.prototype, r, function() {
                return this
            }),
            a.AsyncIterator = b,
            a.async = function(e, t, r, n, o) {
                void 0 === o && (o = Promise);
                var i = new b(c(e, t, r, n),o);
                return a.isGeneratorFunction(t) ? i : i.next().then(function(e) {
                    return e.done ? e.value : i.next()
                })
            }
            ,
            g(y),
            i(y, o, "Generator"),
            i(y, n, function() {
                return this
            }),
            i(y, "toString", function() {
                return "[object Generator]"
            }),
            a.keys = function(e) {
                var t, r = Object(e), n = [];
                for (t in r)
                    n.push(t);
                return n.reverse(),
                function e() {
                    for (; n.length; ) {
                        var t = n.pop();
                        if (t in r)
                            return e.value = t,
                            e.done = !1,
                            e
                    }
                    return e.done = !0,
                    e
                }
            }
            ,
            a.values = _,
            x.prototype = {
                constructor: x,
                reset: function(e) {
                    if (this.prev = 0,
                    this.next = 0,
                    this.sent = this._sent = void 0,
                    this.done = !1,
                    this.delegate = null,
                    this.method = "next",
                    this.arg = void 0,
                    this.tryEntries.forEach(w),
                    !e)
                        for (var t in this)
                            "t" === t.charAt(0) && s.call(this, t) && !isNaN(+t.slice(1)) && (this[t] = void 0)
                },
                stop: function() {
                    this.done = !0;
                    var e = this.tryEntries[0].completion;
                    if ("throw" === e.type)
                        throw e.arg;
                    return this.rval
                },
                dispatchException: function(r) {
                    if (this.done)
                        throw r;
                    var n = this;
                    function e(e, t) {
                        return i.type = "throw",
                        i.arg = r,
                        n.next = e,
                        t && (n.method = "next",
                        n.arg = void 0),
                        !!t
                    }
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var o = this.tryEntries[t]
                          , i = o.completion;
                        if ("root" === o.tryLoc)
                            return e("end");
                        if (o.tryLoc <= this.prev) {
                            var a = s.call(o, "catchLoc")
                              , c = s.call(o, "finallyLoc");
                            if (a && c) {
                                if (this.prev < o.catchLoc)
                                    return e(o.catchLoc, !0);
                                if (this.prev < o.finallyLoc)
                                    return e(o.finallyLoc)
                            } else if (a) {
                                if (this.prev < o.catchLoc)
                                    return e(o.catchLoc, !0)
                            } else {
                                if (!c)
                                    throw new Error("try statement without catch or finally");
                                if (this.prev < o.finallyLoc)
                                    return e(o.finallyLoc)
                            }
                        }
                    }
                },
                abrupt: function(e, t) {
                    for (var r = this.tryEntries.length - 1; 0 <= r; --r) {
                        var n = this.tryEntries[r];
                        if (n.tryLoc <= this.prev && s.call(n, "finallyLoc") && this.prev < n.finallyLoc) {
                            var o = n;
                            break
                        }
                    }
                    var i = (o = o && ("break" === e || "continue" === e) && o.tryLoc <= t && t <= o.finallyLoc ? null : o) ? o.completion : {};
                    return i.type = e,
                    i.arg = t,
                    o ? (this.method = "next",
                    this.next = o.finallyLoc,
                    l) : this.complete(i)
                },
                complete: function(e, t) {
                    if ("throw" === e.type)
                        throw e.arg;
                    return "break" === e.type || "continue" === e.type ? this.next = e.arg : "return" === e.type ? (this.rval = this.arg = e.arg,
                    this.method = "return",
                    this.next = "end") : "normal" === e.type && t && (this.next = t),
                    l
                },
                finish: function(e) {
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var r = this.tryEntries[t];
                        if (r.finallyLoc === e)
                            return this.complete(r.completion, r.afterLoc),
                            w(r),
                            l
                    }
                },
                catch: function(e) {
                    for (var t = this.tryEntries.length - 1; 0 <= t; --t) {
                        var r, n, o = this.tryEntries[t];
                        if (o.tryLoc === e)
                            return "throw" === (r = o.completion).type && (n = r.arg,
                            w(o)),
                            n
                    }
                    throw new Error("illegal catch attempt")
                },
                delegateYield: function(e, t, r) {
                    return this.delegate = {
                        iterator: _(e),
                        resultName: t,
                        nextLoc: r
                    },
                    "next" === this.method && (this.arg = void 0),
                    l
                }
            },
            a
        }
        function s(e, t, r, n, o, i, a) {
            try {
                var c = e[i](a)
                  , s = c.value
            } catch (e) {
                return void r(e)
            }
            c.done ? t(s) : Promise.resolve(s).then(n, o)
        }
        var i = "DONNONS_DEVICE"
          , a = Date.now()
          , u = 3e5
          , f = {
            apiKey: "AIzaSyD1KsLs-GOSMRdgduaPZ6SjWB8GcsaRcrY",
            authDomain: "donnons-8767f.firebaseapp.com",
            databaseURL: "https://donnons-8767f.firebaseio.com",
            projectId: "donnons-8767f",
            storageBucket: "donnons-8767f.appspot.com",
            messagingSenderId: "229021922347",
            appId: "1:229021922347:web:a04b3ddf88a47d11"
        };
        function c() {
            l.apply(this, arguments)
        }
        function l() {
            var c;
            return c = S().mark(function e() {
                var t, r;
                return S().wrap(function(e) {
                    for (; ; )
                        switch (e.prev = e.next) {
                        case 0:
                            return t = (0,
                            n.initializeApp)(f),
                            t = (0,
                            o.getMessaging)(t),
                            e.next = 4,
                            navigator.serviceWorker.register("/service-worker.js");
                        case 4:
                            r = e.sent,
                            (0,
                            o.getToken)(t, {
                                serviceWorkerRegistration: r
                            }).then(function(e) {
                                !function(e) {
                                    var t = localStorage.getItem(i);
                                    if (t)
                                        return e === (e = JSON.parse(t)).token && e.expired_at > a
                                }(e) && AXO.post("/firebase/token", {
                                    token: e
                                }).onSuccess(function() {
                                    localStorage.setItem(i, JSON.stringify({
                                        token: e,
                                        expired_at: a + u
                                    }))
                                }).onError(function() {
                                    localStorage.removeItem(i)
                                }).exec()
                            }).catch(function(e) {
                                console.warn(e)
                            });
                        case 6:
                        case "end":
                            return e.stop()
                        }
                }, e)
            }),
            (l = function() {
                var e = this
                  , a = arguments;
                return new Promise(function(t, r) {
                    var n = c.apply(e, a);
                    function o(e) {
                        s(n, t, r, o, i, "next", e)
                    }
                    function i(e) {
                        s(n, t, r, o, i, "throw", e)
                    }
                    o(void 0)
                }
                )
            }
            ).apply(this, arguments)
        }
        (0,
        o.isSupported)().then(function(e) {
            $globals && $globals.isSudo || (e ? "granted" === Notification.permission ? c() : "denied" !== Notification.permission ? Notification.requestPermission().then(function(e) {
                "granted" === e ? c() : console.warn("permission refuse")
            }) : console.warn("permission already refuse") : console.warn("no support"))
        }).catch(function(e) {
            console.warn(e)
        })
    }
    , {
        "firebase/app": 8,
        "firebase/messaging": 9
    }]
}, {}, [13]);