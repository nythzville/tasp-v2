/*!
 * FullCalendar v2.2.6
 * Docs & License: http://arshaw.com/fullcalendar/
 * (c) 2013 Adam Shaw
 */
(function(t) { "function" == typeof define && define.amd ? define(["jquery", "moment"], t) : t(jQuery, moment) })(function(t, e) {
    function n(t) { i(Ee, t) }

    function i(e) {
        function n(n, s) { t.isPlainObject(s) && t.isPlainObject(e[n]) && !r(n) ? e[n] = i({}, e[n], s) : void 0 !== s && (e[n] = s) } for (var s = 1; arguments.length > s; s++) t.each(arguments[s], n); return e }

    function r(t) { return /(Time|Duration)$/.test(t) }

    function s(t) { var n = e.localeData || e.langData; return n.call(e, t) || n.call(e, "en") }

    function o(t, e) { e.left && t.css({ "border-left-width": 1, "margin-left": e.left - 1 }), e.right && t.css({ "border-right-width": 1, "margin-right": e.right - 1 }) }

    function l(t) { t.css({ "margin-left": "", "margin-right": "", "border-left-width": "", "border-right-width": "" }) }

    function a() { t("body").addClass("fc-not-allowed") }

    function u() { t("body").removeClass("fc-not-allowed") }

    function d(e, n, i) { var r = Math.floor(n / e.length),
            s = Math.floor(n - r * (e.length - 1)),
            o = [],
            l = [],
            a = [],
            u = 0;
        c(e), e.each(function(n, i) { var d = n === e.length - 1 ? s : r,
                c = t(i).outerHeight(!0);
            d > c ? (o.push(i), l.push(c), a.push(t(i).height())) : u += c }), i && (n -= u, r = Math.floor(n / o.length), s = Math.floor(n - r * (o.length - 1))), t(o).each(function(e, n) { var i = e === o.length - 1 ? s : r,
                u = l[e],
                d = a[e],
                c = i - (u - d);
            i > u && t(n).height(c) }) }

    function c(t) { t.height("") }

    function h(e) { var n = 0; return e.find("> *").each(function(e, i) { var r = t(i).outerWidth();
            r > n && (n = r) }), n++, e.width(n), n }

    function f(t, e) { return t.height(e).addClass("fc-scroller"), t[0].scrollHeight - 1 > t[0].clientHeight ? !0 : (g(t), !1) }

    function g(t) { t.height("").removeClass("fc-scroller") }

    function p(e) { var n = e.css("position"),
            i = e.parents().filter(function() { var e = t(this); return /(auto|scroll)/.test(e.css("overflow") + e.css("overflow-y") + e.css("overflow-x")) }).eq(0); return "fixed" !== n && i.length ? i : t(e[0].ownerDocument || document) }

    function m(t) { var e = t.offset().left,
            n = e + t.width(),
            i = t.children(),
            r = i.offset().left,
            s = r + i.outerWidth(); return { left: r - e, right: n - s } }

    function v(t) { return 1 == t.which && !t.ctrlKey }

    function y(t, e) { var n, i, r, s, o = t.start,
            l = t.end,
            a = e.start,
            u = e.end; return l > a && u > o ? (o >= a ? (n = o.clone(), r = !0) : (n = a.clone(), r = !1), u >= l ? (i = l.clone(), s = !0) : (i = u.clone(), s = !1), { start: n, end: i, isStart: r, isEnd: s }) : void 0 }

    function w(t, e) { if (t = t || {}, void 0 !== t[e]) return t[e]; for (var n, i = e.split(/(?=[A-Z])/), r = i.length - 1; r >= 0; r--)
            if (n = t[i[r].toLowerCase()], void 0 !== n) return n; return t["default"] }

    function E(t, n) { return e.duration({ days: t.clone().stripTime().diff(n.clone().stripTime(), "days"), ms: t.time() - n.time() }) }

    function S(t, n) { return e.duration({ days: t.clone().stripTime().diff(n.clone().stripTime(), "days") }) }

    function b(t, e) { var n, i; for (n = 0; ze.length > n && (i = ze[n], !D(i, t, e)); n++); return i }

    function D(t, n, i) { var r; return r = null != i ? i.diff(n, t, !0) : e.isDuration(n) ? n.as(t) : n.end.diff(n.start, t, !0), r >= 1 && _(r) ? r : !1 }

    function C(t) { return "[object Date]" === Object.prototype.toString.call(t) || t instanceof Date }

    function T(t) { return /^\d+\:\d+(?:\:\d+\.?(?:\d{3})?)?$/.test(t) }

    function x(t) { var e = function() {}; return e.prototype = t, new e }

    function H(t, e) { for (var n in t) R(t, n) && (e[n] = t[n]) }

    function R(t, e) { return Le.call(t, e) }

    function k(e) { return /undefined|null|boolean|number|string/.test(t.type(e)) }

    function M(e, n, i) { if (t.isFunction(e) && (e = [e]), e) { var r, s; for (r = 0; e.length > r; r++) s = e[r].apply(n, i) || s; return s } }

    function F() { for (var t = 0; arguments.length > t; t++)
            if (void 0 !== arguments[t]) return arguments[t] }

    function z(t) { return (t + "").replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#039;").replace(/"/g, "&quot;").replace(/\n/g, "<br />") }

    function L(t) { return t.replace(/&.*?;/g, "") }

    function P(t) { return t.charAt(0).toUpperCase() + t.slice(1) }

    function V(t, e) { return t - e }

    function _(t) { return 0 === t % 1 }

    function G(t, e) { var n, i, r, s, o = function() { var l = +new Date - s;
            e > l && l > 0 ? n = setTimeout(o, e - l) : (n = null, t.apply(r, i), n || (r = i = null)) }; return function() { r = this, i = arguments, s = +new Date, n || (n = setTimeout(o, e)) } }

    function A(n, i, r) { var s, o, l, a, u = n[0],
            d = 1 == n.length && "string" == typeof u; return e.isMoment(u) ? (a = e.apply(null, n), Y(u, a)) : C(u) || void 0 === u ? a = e.apply(null, n) : (s = !1, o = !1, d ? Pe.test(u) ? (u += "-01", n = [u], s = !0, o = !0) : (l = Ve.exec(u)) && (s = !l[5], o = !0) : t.isArray(u) && (o = !0), a = i || s ? e.utc.apply(e, n) : e.apply(null, n), s ? (a._ambigTime = !0, a._ambigZone = !0) : r && (o ? a._ambigZone = !0 : d && a.zone(u))), a._fullCalendar = !0, a }

    function N(t, n) { var i, r, s = !1,
            o = !1,
            l = t.length,
            a = []; for (i = 0; l > i; i++) r = t[i], e.isMoment(r) || (r = De.moment.parseZone(r)), s = s || r._ambigTime, o = o || r._ambigZone, a.push(r); for (i = 0; l > i; i++) r = a[i], n || !s || r._ambigTime ? o && !r._ambigZone && (a[i] = r.clone().stripZone()) : a[i] = r.clone().stripTime(); return a }

    function Y(t, e) { t._ambigTime ? e._ambigTime = !0 : e._ambigTime && (e._ambigTime = !1), t._ambigZone ? e._ambigZone = !0 : e._ambigZone && (e._ambigZone = !1) }

    function O(t, e) { t.year(e[0] || 0).month(e[1] || 0).date(e[2] || 0).hours(e[3] || 0).minutes(e[4] || 0).seconds(e[5] || 0).milliseconds(e[6] || 0) }

    function B(t, e) { return Ge.format.call(t, e) }

    function Z(t, e) { return I(t, U(e)) }

    function I(t, e) { var n, i = ""; for (n = 0; e.length > n; n++) i += W(t, e[n]); return i }

    function W(t, e) { var n, i; return "string" == typeof e ? e : (n = e.token) ? Ae[n] ? Ae[n](t) : B(t, n) : e.maybe && (i = I(t, e.maybe), i.match(/[1-9]/)) ? i : "" }

    function j(t, e, n, i, r) { var s; return t = De.moment.parseZone(t), e = De.moment.parseZone(e), s = (t.localeData || t.lang).call(t), n = s.longDateFormat(n) || n, i = i || " - ", X(t, e, U(n), i, r) }

    function X(t, e, n, i, r) { var s, o, l, a, u = "",
            d = "",
            c = "",
            h = "",
            f = ""; for (o = 0; n.length > o && (s = $(t, e, n[o]), s !== !1); o++) u += s; for (l = n.length - 1; l > o && (s = $(t, e, n[l]), s !== !1); l--) d = s + d; for (a = o; l >= a; a++) c += W(t, n[a]), h += W(e, n[a]); return (c || h) && (f = r ? h + i + c : c + i + h), u + f + d }

    function $(t, e, n) { var i, r; return "string" == typeof n ? n : (i = n.token) && (r = Ne[i.charAt(0)], r && t.isSame(e, r)) ? B(t, i) : !1 }

    function U(t) { return t in Ye ? Ye[t] : Ye[t] = q(t) }

    function q(t) { for (var e, n = [], i = /\[([^\]]*)\]|\(([^\)]*)\)|(LT|(\w)\4*o?)|([^\w\[\(]+)/g; e = i.exec(t);) e[1] ? n.push(e[1]) : e[2] ? n.push({ maybe: q(e[2]) }) : e[3] ? n.push({ token: e[3] }) : e[5] && n.push(e[5]); return n }

    function K() {}

    function Q(t, e) { return t || e ? t && e ? t.grid === e.grid && t.row === e.row && t.col === e.col : !1 : !0 }

    function J(t) { var e = ee(t); return "background" === e || "inverse-background" === e }

    function te(t) { return "inverse-background" === ee(t) }

    function ee(t) { return F((t.source || {}).rendering, t.rendering) }

    function ne(t) { var e, n, i = {}; for (e = 0; t.length > e; e++) n = t[e], (i[n._id] || (i[n._id] = [])).push(n); return i }

    function ie(t, e) { return t.eventStartMS - e.eventStartMS }

    function re(t, e) { return t.eventStartMS - e.eventStartMS || e.eventDurationMS - t.eventDurationMS || e.event.allDay - t.event.allDay || (t.event.title || "").localeCompare(e.event.title) }

    function se(n) { var i, r, s, o, l = De.dataAttrPrefix; return l && (l += "-"), i = n.data(l + "event") || null, i && (i = "object" == typeof i ? t.extend({}, i) : {}, r = i.start, null == r && (r = i.time), s = i.duration, o = i.stick, delete i.start, delete i.time, delete i.duration, delete i.stick), null == r && (r = n.data(l + "start")), null == r && (r = n.data(l + "time")), null == s && (s = n.data(l + "duration")), null == o && (o = n.data(l + "stick")), r = null != r ? e.duration(r) : null, s = null != s ? e.duration(s) : null, o = Boolean(o), { eventProps: i, startTime: r, duration: s, stick: o } }

    function oe(t, e) { var n, i; for (n = 0; e.length > n; n++)
            if (i = e[n], i.leftCol <= t.rightCol && i.rightCol >= t.leftCol) return !0; return !1 }

    function le(t, e) { return t.leftCol - e.leftCol }

    function ae(t) { var e, n, i; if (t.sort(re), e = ue(t), de(e), n = e[0]) { for (i = 0; n.length > i; i++) ce(n[i]); for (i = 0; n.length > i; i++) he(n[i], 0, 0) } }

    function ue(t) { var e, n, i, r = []; for (e = 0; t.length > e; e++) { for (n = t[e], i = 0; r.length > i && fe(n, r[i]).length; i++);
            n.level = i, (r[i] || (r[i] = [])).push(n) } return r }

    function de(t) { var e, n, i, r, s; for (e = 0; t.length > e; e++)
            for (n = t[e], i = 0; n.length > i; i++)
                for (r = n[i], r.forwardSegs = [], s = e + 1; t.length > s; s++) fe(r, t[s], r.forwardSegs) }

    function ce(t) { var e, n, i = t.forwardSegs,
            r = 0; if (void 0 === t.forwardPressure) { for (e = 0; i.length > e; e++) n = i[e], ce(n), r = Math.max(r, 1 + n.forwardPressure);
            t.forwardPressure = r } }

    function he(t, e, n) { var i, r = t.forwardSegs; if (void 0 === t.forwardCoord)
            for (r.length ? (r.sort(pe), he(r[0], e + 1, n), t.forwardCoord = r[0].backwardCoord) : t.forwardCoord = 1, t.backwardCoord = t.forwardCoord - (t.forwardCoord - n) / (e + 1), i = 0; r.length > i; i++) he(r[i], 0, t.forwardCoord) }

    function fe(t, e, n) { n = n || []; for (var i = 0; e.length > i; i++) ge(t, e[i]) && n.push(e[i]); return n }

    function ge(t, e) { return t.bottom > e.top && t.top < e.bottom }

    function pe(t, e) { return e.forwardPressure - t.forwardPressure || (t.backwardCoord || 0) - (e.backwardCoord || 0) || re(t, e) }

    function me(n, r) {
        function o(t) { return (t.locale || t.lang).call(t, J.lang).humanize() }

        function l(t) { re ? d() && (v(), c(t)) : a() }

        function a() { se = J.theme ? "ui" : "fc", n.addClass("fc"), J.isRTL ? n.addClass("fc-rtl") : n.addClass("fc-ltr"), J.theme ? n.addClass("ui-widget") : n.addClass("fc-unthemed"), re = t("<div class='fc-view-container'/>").prependTo(n), ne = new ve(K, J), ie = ne.render(), ie && n.prepend(ie), c(J.defaultView), J.handleWindowResize && (ae = G(w, J.windowResizeDelay), t(window).resize(ae)) }

        function u() { oe && oe.destroyView(), ne.destroy(), re.remove(), n.removeClass("fc fc-ltr fc-rtl fc-unthemed ui-widget"), t(window).unbind("resize", ae) }

        function d() { return n.is(":visible") }

        function c(e) { ge++, oe && e && oe.type !== e && (ne.deactivateButton(oe.type), W(), oe.start && oe.destroyView(), oe.el.remove(), oe = null), !oe && e && (oe = h(e), oe.el = t("<div class='fc-view fc-" + e + "-view' />").appendTo(re), ne.activateButton(e)), oe && (ue = oe.massageCurrentDate(ue), oe.start && ue.isWithin(oe.intervalStart, oe.intervalEnd) || d() && (W(), oe.start && oe.destroyView(), oe.setDate(ue), oe.renderView(), j(), M(), F(), T())), j(), ge-- }

        function h(t) { var e = f(t); return new e["class"](K, e.options, t) }

        function f(n) {
            function i(e) { "function" == typeof e ? s = e : "object" == typeof e && t.extend(r, e) } var r, s, l, a, u, d = J.defaultButtonText || {},
                c = J.buttonText || {},
                h = J.views || {},
                f = n,
                g = [],
                p = !1; if (fe[n]) return fe[n]; for (; f && !s;) r = {}, i(Ce[f]), i(h[f]), g.unshift(r), f = r.type; return g.unshift({}), r = t.extend.apply(t, g), s ? (l = r.duration || s.duration, l && (l = e.duration(l), a = b(l), p = 1 === D(a, l)), p && h[a] && (r = t.extend({}, h[a], r)), u = c[n] || (p ? c[a] : null) || d[n] || (p ? d[a] : null) || r.buttonText || s.buttonText || (l ? o(l) : null) || n, fe[n] = { "class": s, options: r, buttonText: u }) : void 0 }

        function g(t) { return Boolean(f(t)) }

        function p(t) { var e = f(t); return e ? e.buttonText : void 0 }

        function m(t) { return d() ? (t && y(), ge++, oe.updateSize(!0), ge--, !0) : void 0 }

        function v() { d() && y() }

        function y() { le = "number" == typeof J.contentHeight ? J.contentHeight : "number" == typeof J.height ? J.height - (ie ? ie.outerHeight(!0) : 0) : Math.round(re.width() / Math.max(J.aspectRatio, .5)) }

        function w(t) {!ge && t.target === window && oe.start && m(!0) && oe.trigger("windowResize", he) }

        function E() { C(), H() }

        function S() { d() && (W(), oe.destroyViewEvents(), oe.renderViewEvents(pe), j()) }

        function C() { W(), oe.destroyViewEvents(), j() }

        function T() {!J.lazyFetching || de(oe.start, oe.end) ? H() : S() }

        function H() { ce(oe.start, oe.end) }

        function R(t) { pe = t, S() }

        function k() { S() }

        function M() { oe.updateTitle(), ne.updateTitle(oe.title) }

        function F() { var t = K.getNow();
            t.isWithin(oe.intervalStart, oe.intervalEnd) ? ne.disableButton("today") : ne.enableButton("today") }

        function z(t, e) { t = K.moment(t), e = e ? K.moment(e) : t.hasTime() ? t.clone().add(K.defaultTimedEventDuration) : t.clone().add(K.defaultAllDayEventDuration), oe.select({ start: t, end: e }) }

        function L() { oe && oe.unselect() }

        function V() { ue = oe.computePrevDate(ue), c() }

        function _() { ue = oe.computeNextDate(ue), c() }

        function A() { ue.add(-1, "years"), c() }

        function N() { ue.add(1, "years"), c() }

        function Y() { ue = K.getNow(), c() }

        function O(t) { ue = K.moment(t), c() }

        function B(t) { ue.add(e.duration(t)), c() }

        function Z(t, e) { var n, i;
            e && g(e) || (e = e || "day", n = ne.getViewsWithButtons().join(" "), i = n.match(RegExp("\\w+" + P(e))), i || (i = n.match(/\w+Day/)), e = i ? i[0] : "agendaDay"), ue = t, c(e) }

        function I() { return ue.clone() }

        function W() { re.css({ width: "100%", height: re.height(), overflow: "hidden" }) }

        function j() { re.css({ width: "", height: "", overflow: "" }) }

        function X() { return K }

        function $() { return oe }

        function U(t, e) { return void 0 === e ? J[t] : (("height" == t || "contentHeight" == t || "aspectRatio" == t) && (J[t] = e, m(!0)), void 0) }

        function q(t, e) { return J[t] ? J[t].apply(e || he, Array.prototype.slice.call(arguments, 2)) : void 0 } var K = this;
        r = r || {}; var Q, J = i({}, Ee, r);
        Q = J.lang in Te ? Te[J.lang] : Te[Ee.lang], Q && (J = i({}, Ee, Q, r)), J.isRTL && (J = i({}, Ee, be, Q || {}, r)), K.options = J, K.render = l, K.destroy = u, K.refetchEvents = E, K.reportEvents = R, K.reportEventChange = k, K.rerenderEvents = S, K.changeView = c, K.select = z, K.unselect = L, K.prev = V, K.next = _, K.prevYear = A, K.nextYear = N, K.today = Y, K.gotoDate = O, K.incrementDate = B, K.zoomTo = Z, K.getDate = I, K.getCalendar = X, K.getView = $, K.option = U, K.trigger = q, K.isValidViewType = g, K.getViewButtonText = p; var te = x(s(J.lang)); if (J.monthNames && (te._months = J.monthNames), J.monthNamesShort && (te._monthsShort = J.monthNamesShort), J.dayNames && (te._weekdays = J.dayNames), J.dayNamesShort && (te._weekdaysShort = J.dayNamesShort), null != J.firstDay) { var ee = x(te._week);
            ee.dow = J.firstDay, te._week = ee } K.defaultAllDayEventDuration = e.duration(J.defaultAllDayEventDuration), K.defaultTimedEventDuration = e.duration(J.defaultTimedEventDuration), K.moment = function() { var t; return "local" === J.timezone ? (t = De.moment.apply(null, arguments), t.hasTime() && t.local()) : t = "UTC" === J.timezone ? De.moment.utc.apply(null, arguments) : De.moment.parseZone.apply(null, arguments), "_locale" in t ? t._locale = te : t._lang = te, t }, K.getIsAmbigTimezone = function() { return "local" !== J.timezone && "UTC" !== J.timezone }, K.rezoneDate = function(t) { return K.moment(t.toArray()) }, K.getNow = function() { var t = J.now; return "function" == typeof t && (t = t()), K.moment(t) }, K.calculateWeekNumber = function(t) { var e = J.weekNumberCalculation; return "function" == typeof e ? e(t) : "local" === e ? t.week() : "ISO" === e.toUpperCase() ? t.isoWeek() : void 0 }, K.getEventEnd = function(t) { return t.end ? t.end.clone() : K.getDefaultEventEnd(t.allDay, t.start) }, K.getDefaultEventEnd = function(t, e) { var n = e.clone(); return t ? n.stripTime().add(K.defaultAllDayEventDuration) : n.add(K.defaultTimedEventDuration), K.getIsAmbigTimezone() && n.stripZone(), n }, ye.call(K, J); var ne, ie, re, se, oe, le, ae, ue, de = K.isFetchNeeded,
            ce = K.fetchEvents,
            he = n[0],
            fe = {},
            ge = 0,
            pe = [];
        ue = null != J.defaultDate ? K.moment(J.defaultDate) : K.getNow(), K.getSuggestedViewHeight = function() { return void 0 === le && v(), le }, K.isHeightAuto = function() { return "auto" === J.contentHeight || "auto" === J.height } }

    function ve(e, n) {
        function i() { var e = n.header; return f = n.theme ? "ui" : "fc", e ? g = t("<div class='fc-toolbar'/>").append(s("left")).append(s("right")).append(s("center")).append('<div class="fc-clear"/>') : void 0 }

        function r() { g.remove() }

        function s(i) { var r = t('<div class="fc-' + i + '"/>'),
                s = n.header[i]; return s && t.each(s.split(" "), function() { var i, s = t(),
                    o = !0;
                t.each(this.split(","), function(i, r) { var l, a, u, d, c, h, g, m, v; "title" == r ? (s = s.add(t("<h2>&nbsp;</h2>")), o = !1) : (e[r] ? l = function() { e[r]() } : e.isValidViewType(r) && (l = function() { e.changeView(r) }, p.push(r), c = e.getViewButtonText(r)), l && (a = w(n.themeButtonIcons, r), u = w(n.buttonIcons, r), d = w(n.defaultButtonText, r), h = w(n.buttonText, r), g = c || h ? z(c || h) : a && n.theme ? "<span class='ui-icon ui-icon-" + a + "'></span>" : u && !n.theme ? "<span class='fc-icon fc-icon-" + u + "'></span>" : z(d || r), m = ["fc-" + r + "-button", f + "-button", f + "-state-default"], v = t('<button type="button" class="' + m.join(" ") + '">' + g + "</button>").click(function() { v.hasClass(f + "-state-disabled") || (l(), (v.hasClass(f + "-state-active") || v.hasClass(f + "-state-disabled")) && v.removeClass(f + "-state-hover")) }).mousedown(function() { v.not("." + f + "-state-active").not("." + f + "-state-disabled").addClass(f + "-state-down") }).mouseup(function() { v.removeClass(f + "-state-down") }).hover(function() { v.not("." + f + "-state-active").not("." + f + "-state-disabled").addClass(f + "-state-hover") }, function() { v.removeClass(f + "-state-hover").removeClass(f + "-state-down") }), s = s.add(v))) }), o && s.first().addClass(f + "-corner-left").end().last().addClass(f + "-corner-right").end(), s.length > 1 ? (i = t("<div/>"), o && i.addClass("fc-button-group"), i.append(s), r.append(i)) : r.append(s) }), r }

        function o(t) { g.find("h2").text(t) }

        function l(t) { g.find(".fc-" + t + "-button").addClass(f + "-state-active") }

        function a(t) { g.find(".fc-" + t + "-button").removeClass(f + "-state-active") }

        function u(t) { g.find(".fc-" + t + "-button").attr("disabled", "disabled").addClass(f + "-state-disabled") }

        function d(t) { g.find(".fc-" + t + "-button").removeAttr("disabled").removeClass(f + "-state-disabled") }

        function c() { return p } var h = this;
        h.render = i, h.destroy = r, h.updateTitle = o, h.activateButton = l, h.deactivateButton = a, h.disableButton = u, h.enableButton = d, h.getViewsWithButtons = c; var f, g = t(),
            p = [] }

    function ye(n) {
        function i(t, e) { return !B || t.clone().stripZone() < B.clone().stripZone() || e.clone().stripZone() > Z.clone().stripZone() }

        function r(t, e) { B = t, Z = e, Q = []; var n = ++U,
                i = $.length;
            q = i; for (var r = 0; i > r; r++) s($[r], n) }

        function s(e, n) { o(e, function(i) { var r, s, o, l = t.isArray(e.events); if (n == U) { if (i)
                        for (r = 0; i.length > r; r++) s = i[r], o = l ? s : b(s, e), o && Q.push.apply(Q, H(o));
                    q--, q || j(Q) } }) }

        function o(e, i) { var r, s, l = De.sourceFetchers; for (r = 0; l.length > r; r++) { if (s = l[r].call(O, e, B.clone(), Z.clone(), n.timezone, i), s === !0) return; if ("object" == typeof s) return o(s, i), void 0 } var a = e.events; if (a) t.isFunction(a) ? (y(), a.call(O, B.clone(), Z.clone(), n.timezone, function(t) { i(t), w() })) : t.isArray(a) ? i(a) : i();
            else { var u = e.url; if (u) { var d, c = e.success,
                        h = e.error,
                        f = e.complete;
                    d = t.isFunction(e.data) ? e.data() : e.data; var g = t.extend({}, d || {}),
                        p = F(e.startParam, n.startParam),
                        m = F(e.endParam, n.endParam),
                        v = F(e.timezoneParam, n.timezoneParam);
                    p && (g[p] = B.format()), m && (g[m] = Z.format()), n.timezone && "local" != n.timezone && (g[v] = n.timezone), y(), t.ajax(t.extend({}, Ke, e, { data: g, success: function(e) { e = e || []; var n = M(c, this, arguments);
                            t.isArray(n) && (e = n), i(e) }, error: function() { M(h, this, arguments), i() }, complete: function() { M(f, this, arguments), w() } })) } else i() } }

        function l(t) { var e = a(t);
            e && ($.push(e), q++, s(e, U)) }

        function a(e) { var n, i, r = De.sourceNormalizers; if (t.isFunction(e) || t.isArray(e) ? n = { events: e } : "string" == typeof e ? n = { url: e } : "object" == typeof e && (n = t.extend({}, e)), n) { for (n.className ? "string" == typeof n.className && (n.className = n.className.split(/\s+/)) : n.className = [], t.isArray(n.events) && (n.origArray = n.events, n.events = t.map(n.events, function(t) { return b(t, n) })), i = 0; r.length > i; i++) r[i].call(O, n); return n } }

        function u(e) { $ = t.grep($, function(t) { return !d(t, e) }), Q = t.grep(Q, function(t) { return !d(t.source, e) }), j(Q) }

        function d(t, e) { return t && e && c(t) == c(e) }

        function c(t) { return ("object" == typeof t ? t.origArray || t.googleCalendarId || t.url || t.events : null) || t }

        function h(t) { t.start = O.moment(t.start), t.end = t.end ? O.moment(t.end) : null, R(t, f(t)), j(Q) }

        function f(e) { var n = {}; return t.each(e, function(t, e) { g(t) && void 0 !== e && k(e) && (n[t] = e) }), n }

        function g(t) { return !/^_|^(id|allDay|start|end)$/.test(t) }

        function p(t, e) { var n, i, r, s = b(t); if (s) { for (n = H(s), i = 0; n.length > i; i++) r = n[i], r.source || (e && (X.events.push(r), r.source = X), Q.push(r)); return j(Q), n } return [] }

        function m(e) { var n, i; for (null == e ? e = function() { return !0 } : t.isFunction(e) || (n = e + "", e = function(t) { return t._id == n }), Q = t.grep(Q, e, !0), i = 0; $.length > i; i++) t.isArray($[i].events) && ($[i].events = t.grep($[i].events, e, !0));
            j(Q) }

        function v(e) { return t.isFunction(e) ? t.grep(Q, e) : null != e ? (e += "", t.grep(Q, function(t) { return t._id == e })) : Q }

        function y() { K++ || I("loading", null, !0, W()) }

        function w() {--K || I("loading", null, !1, W()) }

        function b(i, r) { var s, o, l, a = {}; if (n.eventDataTransform && (i = n.eventDataTransform(i)), r && r.eventDataTransform && (i = r.eventDataTransform(i)), t.extend(a, i), r && (a.source = r), a._id = i._id || (void 0 === i.id ? "_fc" + Qe++ : i.id + ""), a.className = i.className ? "string" == typeof i.className ? i.className.split(/\s+/) : i.className : [], s = i.start || i.date, o = i.end, T(s) && (s = e.duration(s)), T(o) && (o = e.duration(o)), i.dow || e.isDuration(s) || e.isDuration(o)) a.start = s ? e.duration(s) : null, a.end = o ? e.duration(o) : null, a._recurring = !0;
            else { if (s && (s = O.moment(s), !s.isValid())) return !1;
                o && (o = O.moment(o), o.isValid() || (o = null)), l = i.allDay, void 0 === l && (l = F(r ? r.allDayDefault : void 0, n.allDayDefault)), D(s, o, l, a) } return a }

        function D(t, e, n, i) { i.start = t, i.end = e, i.allDay = n, C(i), we(i) }

        function C(t) { null == t.allDay && (t.allDay = !(t.start.hasTime() || t.end && t.end.hasTime())), t.allDay ? (t.start.stripTime(), t.end && t.end.stripTime()) : (t.start.hasTime() || (t.start = O.rezoneDate(t.start)), t.end && !t.end.hasTime() && (t.end = O.rezoneDate(t.end))), t.end && !t.end.isAfter(t.start) && (t.end = null), t.end || (t.end = n.forceEventDuration ? O.getDefaultEventEnd(t.allDay, t.start) : null) }

        function x(t) { var e; return t.end || (e = t.allDay, null == e && (e = !t.start.hasTime()), t = { start: t.start, end: O.getDefaultEventEnd(e, t.start) }), t }

        function H(e, n, i) { var r, s, o, l, a, u, d, c, h, f = []; if (n = n || B, i = i || Z, e)
                if (e._recurring) { if (s = e.dow)
                        for (r = {}, o = 0; s.length > o; o++) r[s[o]] = !0; for (l = n.clone().stripTime(); l.isBefore(i);)(!r || r[l.day()]) && (a = e.start, u = e.end, d = l.clone(), c = null, a && (d = d.time(a)), u && (c = l.clone().time(u)), h = t.extend({}, e), D(d, c, !a && !u, h), f.push(h)), l.add(1, "days") } else f.push(e); return f }

        function R(e, n) { var i, r, s, o, l = {}; return n = n || {}, n.start || (n.start = e.start.clone()), void 0 === n.end && (n.end = e.end ? e.end.clone() : null), null == n.allDay && (n.allDay = e.allDay), C(n), i = null !== e._end && null === n.end, r = n.allDay ? S(n.start, e._start) : E(n.start, e._start), !i && n.end && (s = E(n.end, n.start).subtract(E(e._end || O.getDefaultEventEnd(e._allDay, e._start), e._start))), t.each(n, function(t, e) { g(t) && void 0 !== e && (l[t] = e) }), o = z(v(e._id), i, n.allDay, r, s, l), { dateDelta: r, durationDelta: s, undo: o } }

        function z(e, n, i, r, s, o) { var l = O.getIsAmbigTimezone(),
                a = []; return r && !r.valueOf() && (r = null), s && !s.valueOf() && (s = null), t.each(e, function(e, u) { var d, c;
                    d = { start: u.start.clone(), end: u.end ? u.end.clone() : null, allDay: u.allDay }, t.each(o, function(t) { d[t] = u[t] }), c = { start: u._start, end: u._end, allDay: u._allDay }, n && (c.end = null), c.allDay = i, C(c), r && (c.start.add(r), c.end && c.end.add(r)), s && (c.end || (c.end = O.getDefaultEventEnd(c.allDay, c.start)), c.end.add(s)), l && !c.allDay && (r || s) && (c.start.stripZone(), c.end && c.end.stripZone()), t.extend(u, o, c), we(u), a.push(function() { t.extend(u, d), we(u) }) }),
                function() { for (var t = 0; a.length > t; t++) a[t]() } }

        function L() { var e, i = n.businessHours,
                r = { className: "fc-nonbusiness", start: "09:00", end: "17:00", dow: [1, 2, 3, 4, 5], rendering: "inverse-background" },
                s = O.getView(); return i && (e = "object" == typeof i ? t.extend({}, r, i) : r), e ? H(b(e), s.start, s.end) : [] }

        function P(t, e) { var i = e.source || {},
                r = F(e.constraint, i.constraint, n.eventConstraint),
                s = F(e.overlap, i.overlap, n.eventOverlap); return t = x(t), G(t, r, s, e) }

        function V(t) { return G(t, n.selectConstraint, n.selectOverlap) }

        function _(e, n) { var i, r; return n && (i = t.extend({}, n, e), r = H(b(i))[0]), r ? P(e, r) : (e = x(e), V(e)) }

        function G(t, e, n, i) { var r, s, o, l, a; if (t = { start: t.start.clone().stripZone(), end: t.end.clone().stripZone() }, null != e) { for (r = A(e), s = !1, o = 0; r.length > o; o++)
                    if (N(r[o], t)) { s = !0; break }
                if (!s) return !1 } for (o = 0; Q.length > o; o++)
                if (l = Q[o], (!i || i._id !== l._id) && Y(l, t)) { if (n === !1) return !1; if ("function" == typeof n && !n(l, i)) return !1; if (i) { if (a = F(l.overlap, (l.source || {}).overlap), a === !1) return !1; if ("function" == typeof a && !a(i, l)) return !1 } }
            return !0 }

        function A(t) { return "businessHours" === t ? L() : "object" == typeof t ? H(b(t)) : v(t) }

        function N(t, e) { var n = t.start.clone().stripZone(),
                i = O.getEventEnd(t).stripZone(); return e.start >= n && i >= e.end }

        function Y(t, e) { var n = t.start.clone().stripZone(),
                i = O.getEventEnd(t).stripZone(); return i > e.start && e.end > n } var O = this;
        O.isFetchNeeded = i, O.fetchEvents = r, O.addEventSource = l, O.removeEventSource = u, O.updateEvent = h, O.renderEvent = p, O.removeEvents = m, O.clientEvents = v, O.mutateEvent = R, O.normalizeEventDateProps = C, O.ensureVisibleEventRange = x; var B, Z, I = O.trigger,
            W = O.getView,
            j = O.reportEvents,
            X = { events: [] },
            $ = [X],
            U = 0,
            q = 0,
            K = 0,
            Q = [];
        t.each((n.events ? [n.events] : []).concat(n.eventSources || []), function(t, e) { var n = a(e);
            n && $.push(n) }), O.getBusinessHoursEvents = L, O.isEventRangeAllowed = P, O.isSelectionRangeAllowed = V, O.isExternalDropRangeAllowed = _ }

    function we(t) { t._allDay = t.allDay, t._start = t.start.clone(), t._end = t.end ? t.end.clone() : null }
    var Ee = { titleRangeSeparator: " — ", monthYearFormat: "MMMM YYYY", defaultTimedEventDuration: "02:00:00", defaultAllDayEventDuration: { days: 1 }, forceEventDuration: !1, nextDayThreshold: "09:00:00", defaultView: "month", aspectRatio: 1.35, header: { left: "title", center: "", right: "today prev,next" }, weekends: !0, weekNumbers: !1, weekNumberTitle: "W", weekNumberCalculation: "local", lazyFetching: !0, startParam: "start", endParam: "end", timezoneParam: "timezone", timezone: !1, isRTL: !1, defaultButtonText: { prev: "prev", next: "next", prevYear: "prev year", nextYear: "next year", today: "today", month: "month", week: "week", day: "day" }, buttonIcons: { prev: "left-single-arrow", next: "right-single-arrow", prevYear: "left-double-arrow", nextYear: "right-double-arrow" }, theme: !1, themeButtonIcons: { prev: "circle-triangle-w", next: "circle-triangle-e", prevYear: "seek-prev", nextYear: "seek-next" }, dragOpacity: .75, dragRevertDuration: 500, dragScroll: !0, unselectAuto: !0, dropAccept: "*", eventLimit: !1, eventLimitText: "more", eventLimitClick: "popover", dayPopoverFormat: "LL", handleWindowResize: !0, windowResizeDelay: 200 },
        Se = { dayPopoverFormat: "dddd, MMMM D" },
        be = { header: { left: "next,prev today", center: "", right: "title" }, buttonIcons: { prev: "right-single-arrow", next: "left-single-arrow", prevYear: "right-double-arrow", nextYear: "left-double-arrow" }, themeButtonIcons: { prev: "circle-triangle-e", next: "circle-triangle-w", nextYear: "seek-prev", prevYear: "seek-next" } },
        De = t.fullCalendar = { version: "2.2.6" },
        Ce = De.views = {};
    t.fn.fullCalendar = function(e) { var n = Array.prototype.slice.call(arguments, 1),
            i = this; return this.each(function(r, s) { var o, l = t(s),
                a = l.data("fullCalendar"); "string" == typeof e ? a && t.isFunction(a[e]) && (o = a[e].apply(a, n), r || (i = o), "destroy" === e && l.removeData("fullCalendar")) : a || (a = new me(l, e), l.data("fullCalendar", a), a.render()) }), i };
    var Te = De.langs = {};
    De.datepickerLang = function(e, n, i) { var r = Te[e] || (Te[e] = {});
        r.isRTL = i.isRTL, r.weekNumberTitle = i.weekHeader, t.each(xe, function(t, e) { r[t] = e(i) }), t.datepicker && (t.datepicker.regional[n] = t.datepicker.regional[e] = i, t.datepicker.regional.en = t.datepicker.regional[""], t.datepicker.setDefaults(i)) }, De.lang = function(e, n) { var r, o;
        r = Te[e] || (Te[e] = {}), n && i(r, n), o = s(e), t.each(He, function(t, e) { void 0 === r[t] && (r[t] = e(o, r)) }), Ee.lang = e };
    var xe = { defaultButtonText: function(t) { return { prev: L(t.prevText), next: L(t.nextText), today: L(t.currentText) } }, monthYearFormat: function(t) { return t.showMonthAfterYear ? "YYYY[" + t.yearSuffix + "] MMMM" : "MMMM YYYY[" + t.yearSuffix + "]" } },
        He = { dayOfMonthFormat: function(t, e) { var n = t.longDateFormat("l"); return n = n.replace(/^Y+[^\w\s]*|[^\w\s]*Y+$/g, ""), e.isRTL ? n += " ddd" : n = "ddd " + n, n }, smallTimeFormat: function(t) { return t.longDateFormat("LT").replace(":mm", "(:mm)").replace(/(\Wmm)$/, "($1)").replace(/\s*a$/i, "a") }, extraSmallTimeFormat: function(t) { return t.longDateFormat("LT").replace(":mm", "(:mm)").replace(/(\Wmm)$/, "($1)").replace(/\s*a$/i, "t") }, noMeridiemTimeFormat: function(t) { return t.longDateFormat("LT").replace(/\s*a$/i, "") } };
    De.lang("en", Se), De.intersectionToSeg = y, De.applyAll = M, De.debounce = G;
    var Re, ke, Me, Fe = ["sun", "mon", "tue", "wed", "thu", "fri", "sat"],
        ze = ["year", "month", "week", "day", "hour", "minute", "second", "millisecond"],
        Le = {}.hasOwnProperty,
        Pe = /^\s*\d{4}-\d\d$/,
        Ve = /^\s*\d{4}-(?:(\d\d-\d\d)|(W\d\d$)|(W\d\d-\d)|(\d\d\d))((T| )(\d\d(:\d\d(:\d\d(\.\d+)?)?)?)?)?$/,
        _e = e.fn,
        Ge = t.extend({}, _e);
    De.moment = function() { return A(arguments) }, De.moment.utc = function() { var t = A(arguments, !0); return t.hasTime() && t.utc(), t }, De.moment.parseZone = function() { return A(arguments, !0, !0) }, _e.clone = function() { var t = Ge.clone.apply(this, arguments); return Y(this, t), this._fullCalendar && (t._fullCalendar = !0), t }, _e.time = function(t) { if (!this._fullCalendar) return Ge.time.apply(this, arguments); if (null == t) return e.duration({ hours: this.hours(), minutes: this.minutes(), seconds: this.seconds(), milliseconds: this.milliseconds() });
        this._ambigTime = !1, e.isDuration(t) || e.isMoment(t) || (t = e.duration(t)); var n = 0; return e.isDuration(t) && (n = 24 * Math.floor(t.asDays())), this.hours(n + t.hours()).minutes(t.minutes()).seconds(t.seconds()).milliseconds(t.milliseconds()) }, _e.stripTime = function() { var t; return this._ambigTime || (t = this.toArray(), this.utc(), ke(this, t.slice(0, 3)), this._ambigTime = !0, this._ambigZone = !0), this }, _e.hasTime = function() { return !this._ambigTime }, _e.stripZone = function() { var t, e; return this._ambigZone || (t = this.toArray(), e = this._ambigTime, this.utc(), ke(this, t), e && (this._ambigTime = !0), this._ambigZone = !0), this }, _e.hasZone = function() { return !this._ambigZone }, t.each(["utcOffset", "zone"], function(t, e) { Ge[e] && (_e[e] = function(t) { return null != t && (this._ambigTime = !1, this._ambigZone = !1), Ge[e].apply(this, arguments) }) }), _e.local = function() { var t = this.toArray(),
            e = this._ambigZone; return Ge.local.apply(this, arguments), e && Me(this, t), this }, _e.format = function() { return this._fullCalendar && arguments[0] ? Z(this, arguments[0]) : this._ambigTime ? B(this, "YYYY-MM-DD") : this._ambigZone ? B(this, "YYYY-MM-DD[T]HH:mm:ss") : Ge.format.apply(this, arguments) }, _e.toISOString = function() { return this._ambigTime ? B(this, "YYYY-MM-DD") : this._ambigZone ? B(this, "YYYY-MM-DD[T]HH:mm:ss") : Ge.toISOString.apply(this, arguments) }, _e.isWithin = function(t, e) { var n = N([this, t, e]); return n[0] >= n[1] && n[0] < n[2] }, _e.isSame = function(t, e) { var n; return this._fullCalendar ? e ? (n = N([this, t], !0), Ge.isSame.call(n[0], n[1], e)) : (t = De.moment.parseZone(t), Ge.isSame.call(this, t) && Boolean(this._ambigTime) === Boolean(t._ambigTime) && Boolean(this._ambigZone) === Boolean(t._ambigZone)) : Ge.isSame.apply(this, arguments) }, t.each(["isBefore", "isAfter"], function(t, e) { _e[e] = function(t, n) { var i; return this._fullCalendar ? (i = N([this, t]), Ge[e].call(i[0], i[1], n)) : Ge[e].apply(this, arguments) } }), Re = "_d" in e() && "updateOffset" in e, ke = Re ? function(t, n) { t._d.setTime(Date.UTC.apply(Date, n)), e.updateOffset(t, !1) } : O, Me = Re ? function(t, n) { t._d.setTime(+new Date(n[0] || 0, n[1] || 0, n[2] || 0, n[3] || 0, n[4] || 0, n[5] || 0, n[6] || 0)), e.updateOffset(t, !1) } : O;
    var Ae = { t: function(t) { return B(t, "a").charAt(0) }, T: function(t) { return B(t, "A").charAt(0) } };
    De.formatRange = j;
    var Ne = { Y: "year", M: "month", D: "day", d: "day", A: "second", a: "second", T: "second", t: "second", H: "second", h: "second", m: "second", s: "second" },
        Ye = {};
    De.Class = K, K.extend = function(t) { var e, n = this; return t = t || {}, R(t, "constructor") && (e = t.constructor), "function" != typeof e && (e = t.constructor = function() { n.apply(this, arguments) }), e.prototype = x(n.prototype), H(t, e.prototype), H(n, e), e }, K.mixin = function(t) { H(t.prototype || t, this.prototype) };
    var Oe = K.extend({ isHidden: !0, options: null, el: null, documentMousedownProxy: null, margin: 10, constructor: function(t) { this.options = t || {} }, show: function() { this.isHidden && (this.el || this.render(), this.el.show(), this.position(), this.isHidden = !1, this.trigger("show")) }, hide: function() { this.isHidden || (this.el.hide(), this.isHidden = !0, this.trigger("hide")) }, render: function() { var e = this,
                    n = this.options;
                this.el = t('<div class="fc-popover"/>').addClass(n.className || "").css({ top: 0, left: 0 }).append(n.content).appendTo(n.parentEl), this.el.on("click", ".fc-close", function() { e.hide() }), n.autoHide && t(document).on("mousedown", this.documentMousedownProxy = t.proxy(this, "documentMousedown")) }, documentMousedown: function(e) { this.el && !t(e.target).closest(this.el).length && this.hide() }, destroy: function() { this.hide(), this.el && (this.el.remove(), this.el = null), t(document).off("mousedown", this.documentMousedownProxy) }, position: function() { var e, n, i, r, s, o = this.options,
                    l = this.el.offsetParent().offset(),
                    a = this.el.outerWidth(),
                    u = this.el.outerHeight(),
                    d = t(window),
                    c = p(this.el);
                r = o.top || 0, s = void 0 !== o.left ? o.left : void 0 !== o.right ? o.right - a : 0, c.is(window) || c.is(document) ? (c = d, e = 0, n = 0) : (i = c.offset(), e = i.top, n = i.left), e += d.scrollTop(), n += d.scrollLeft(), o.viewportConstrain !== !1 && (r = Math.min(r, e + c.outerHeight() - u - this.margin), r = Math.max(r, e + this.margin), s = Math.min(s, n + c.outerWidth() - a - this.margin), s = Math.max(s, n + this.margin)), this.el.css({ top: r - l.top, left: s - l.left }) }, trigger: function(t) { this.options[t] && this.options[t].apply(this, Array.prototype.slice.call(arguments, 1)) } }),
        Be = K.extend({
            grid: null,
            rowCoords: null,
            colCoords: null,
            containerEl: null,
            minX: null,
            maxX: null,
            minY: null,
            maxY: null,
            constructor: function(t) { this.grid = t },
            build: function() { this.rowCoords = this.grid.computeRowCoords(), this.colCoords = this.grid.computeColCoords(), this.computeBounds() },
            clear: function() { this.rowCoords = null, this.colCoords = null },
            getCell: function(t, e) { var n, i, r, s = this.rowCoords,
                    o = this.colCoords,
                    l = null,
                    a = null; if (this.inBounds(t, e)) { for (n = 0; s.length > n; n++)
                        if (i = s[n], e >= i.top && i.bottom > e) { l = n; break }
                    for (n = 0; o.length > n; n++)
                        if (i = o[n], t >= i.left && i.right > t) { a = n; break }
                    if (null !== l && null !== a) return r = this.grid.getCell(l, a), r.grid = this.grid, r } return null },
            computeBounds: function() {
                var t;
                this.containerEl && (t = this.containerEl.offset(), this.minX = t.left, this.maxX = t.left + this.containerEl.outerWidth(), this.minY = t.top, this.maxY = t.top + this.containerEl.outerHeight())
            },
            inBounds: function(t, e) { return this.containerEl ? t >= this.minX && this.maxX > t && e >= this.minY && this.maxY > e : !0 }
        }),
        Ze = K.extend({ coordMaps: null, constructor: function(t) { this.coordMaps = t }, build: function() { var t, e = this.coordMaps; for (t = 0; e.length > t; t++) e[t].build() }, getCell: function(t, e) { var n, i = this.coordMaps,
                    r = null; for (n = 0; i.length > n && !r; n++) r = i[n].getCell(t, e); return r }, clear: function() { var t, e = this.coordMaps; for (t = 0; e.length > t; t++) e[t].clear() } }),
        Ie = K.extend({ coordMap: null, options: null, isListening: !1, isDragging: !1, origCell: null, cell: null, mouseX0: null, mouseY0: null, mousemoveProxy: null, mouseupProxy: null, scrollEl: null, scrollBounds: null, scrollTopVel: null, scrollLeftVel: null, scrollIntervalId: null, scrollHandlerProxy: null, scrollSensitivity: 30, scrollSpeed: 200, scrollIntervalMs: 50, constructor: function(t, e) { this.coordMap = t, this.options = e || {} }, mousedown: function(t) { v(t) && (t.preventDefault(), this.startListening(t), this.options.distance || this.startDrag(t)) }, startListening: function(e) { var n, i;
                this.isListening || (e && this.options.scroll && (n = p(t(e.target)), n.is(window) || n.is(document) || (this.scrollEl = n, this.scrollHandlerProxy = G(t.proxy(this, "scrollHandler"), 100), this.scrollEl.on("scroll", this.scrollHandlerProxy))), this.computeCoords(), e && (i = this.getCell(e), this.origCell = i, this.mouseX0 = e.pageX, this.mouseY0 = e.pageY), t(document).on("mousemove", this.mousemoveProxy = t.proxy(this, "mousemove")).on("mouseup", this.mouseupProxy = t.proxy(this, "mouseup")).on("selectstart", this.preventDefault), this.isListening = !0, this.trigger("listenStart", e)) }, computeCoords: function() { this.coordMap.build(), this.computeScrollBounds() }, mousemove: function(t) { var e, n;
                this.isDragging || (e = this.options.distance || 1, n = Math.pow(t.pageX - this.mouseX0, 2) + Math.pow(t.pageY - this.mouseY0, 2), n >= e * e && this.startDrag(t)), this.isDragging && this.drag(t) }, startDrag: function(t) { var e;
                this.isListening || this.startListening(), this.isDragging || (this.isDragging = !0, this.trigger("dragStart", t), e = this.getCell(t), e && this.cellOver(e)) }, drag: function(t) { var e;
                this.isDragging && (e = this.getCell(t), Q(e, this.cell) || (this.cell && this.cellOut(), e && this.cellOver(e)), this.dragScroll(t)) }, cellOver: function(t) { this.cell = t, this.trigger("cellOver", t, Q(t, this.origCell)) }, cellOut: function() { this.cell && (this.trigger("cellOut", this.cell), this.cell = null) }, mouseup: function(t) { this.stopDrag(t), this.stopListening(t) }, stopDrag: function(t) { this.isDragging && (this.stopScrolling(), this.trigger("dragStop", t), this.isDragging = !1) }, stopListening: function(e) { this.isListening && (this.scrollEl && (this.scrollEl.off("scroll", this.scrollHandlerProxy), this.scrollHandlerProxy = null), t(document).off("mousemove", this.mousemoveProxy).off("mouseup", this.mouseupProxy).off("selectstart", this.preventDefault), this.mousemoveProxy = null, this.mouseupProxy = null, this.isListening = !1, this.trigger("listenStop", e), this.origCell = this.cell = null, this.coordMap.clear()) }, getCell: function(t) { return this.coordMap.getCell(t.pageX, t.pageY) }, trigger: function(t) { this.options[t] && this.options[t].apply(this, Array.prototype.slice.call(arguments, 1)) }, preventDefault: function(t) { t.preventDefault() }, computeScrollBounds: function() { var t, e = this.scrollEl;
                e && (t = e.offset(), this.scrollBounds = { top: t.top, left: t.left, bottom: t.top + e.outerHeight(), right: t.left + e.outerWidth() }) }, dragScroll: function(t) { var e, n, i, r, s = this.scrollSensitivity,
                    o = this.scrollBounds,
                    l = 0,
                    a = 0;
                o && (e = (s - (t.pageY - o.top)) / s, n = (s - (o.bottom - t.pageY)) / s, i = (s - (t.pageX - o.left)) / s, r = (s - (o.right - t.pageX)) / s, e >= 0 && 1 >= e ? l = -1 * e * this.scrollSpeed : n >= 0 && 1 >= n && (l = n * this.scrollSpeed), i >= 0 && 1 >= i ? a = -1 * i * this.scrollSpeed : r >= 0 && 1 >= r && (a = r * this.scrollSpeed)), this.setScrollVel(l, a) }, setScrollVel: function(e, n) { this.scrollTopVel = e, this.scrollLeftVel = n, this.constrainScrollVel(), !this.scrollTopVel && !this.scrollLeftVel || this.scrollIntervalId || (this.scrollIntervalId = setInterval(t.proxy(this, "scrollIntervalFunc"), this.scrollIntervalMs)) }, constrainScrollVel: function() { var t = this.scrollEl;
                0 > this.scrollTopVel ? 0 >= t.scrollTop() && (this.scrollTopVel = 0) : this.scrollTopVel > 0 && t.scrollTop() + t[0].clientHeight >= t[0].scrollHeight && (this.scrollTopVel = 0), 0 > this.scrollLeftVel ? 0 >= t.scrollLeft() && (this.scrollLeftVel = 0) : this.scrollLeftVel > 0 && t.scrollLeft() + t[0].clientWidth >= t[0].scrollWidth && (this.scrollLeftVel = 0) }, scrollIntervalFunc: function() { var t = this.scrollEl,
                    e = this.scrollIntervalMs / 1e3;
                this.scrollTopVel && t.scrollTop(t.scrollTop() + this.scrollTopVel * e), this.scrollLeftVel && t.scrollLeft(t.scrollLeft() + this.scrollLeftVel * e), this.constrainScrollVel(), this.scrollTopVel || this.scrollLeftVel || this.stopScrolling() }, stopScrolling: function() { this.scrollIntervalId && (clearInterval(this.scrollIntervalId), this.scrollIntervalId = null, this.computeCoords()) }, scrollHandler: function() { this.scrollIntervalId || this.computeCoords() } }),
        We = K.extend({ options: null, sourceEl: null, el: null, parentEl: null, top0: null, left0: null, mouseY0: null, mouseX0: null, topDelta: null, leftDelta: null, mousemoveProxy: null, isFollowing: !1, isHidden: !1, isAnimating: !1, constructor: function(e, n) { this.options = n = n || {}, this.sourceEl = e, this.parentEl = n.parentEl ? t(n.parentEl) : e.parent() }, start: function(e) { this.isFollowing || (this.isFollowing = !0, this.mouseY0 = e.pageY, this.mouseX0 = e.pageX, this.topDelta = 0, this.leftDelta = 0, this.isHidden || this.updatePosition(), t(document).on("mousemove", this.mousemoveProxy = t.proxy(this, "mousemove"))) }, stop: function(e, n) {
                function i() { this.isAnimating = !1, r.destroyEl(), this.top0 = this.left0 = null, n && n() } var r = this,
                    s = this.options.revertDuration;
                this.isFollowing && !this.isAnimating && (this.isFollowing = !1, t(document).off("mousemove", this.mousemoveProxy), e && s && !this.isHidden ? (this.isAnimating = !0, this.el.animate({ top: this.top0, left: this.left0 }, { duration: s, complete: i })) : i()) }, getEl: function() { var t = this.el; return t || (this.sourceEl.width(), t = this.el = this.sourceEl.clone().css({ position: "absolute", visibility: "", display: this.isHidden ? "none" : "", margin: 0, right: "auto", bottom: "auto", width: this.sourceEl.width(), height: this.sourceEl.height(), opacity: this.options.opacity || "", zIndex: this.options.zIndex }).appendTo(this.parentEl)), t }, destroyEl: function() { this.el && (this.el.remove(), this.el = null) }, updatePosition: function() { var t, e;
                this.getEl(), null === this.top0 && (this.sourceEl.width(), t = this.sourceEl.offset(), e = this.el.offsetParent().offset(), this.top0 = t.top - e.top, this.left0 = t.left - e.left), this.el.css({ top: this.top0 + this.topDelta, left: this.left0 + this.leftDelta }) }, mousemove: function(t) { this.topDelta = t.pageY - this.mouseY0, this.leftDelta = t.pageX - this.mouseX0, this.isHidden || this.updatePosition() }, hide: function() { this.isHidden || (this.isHidden = !0, this.el && this.el.hide()) }, show: function() { this.isHidden && (this.isHidden = !1, this.updatePosition(), this.getEl().show()) } }),
        je = K.extend({ view: null, isRTL: null, cellHtml: "<td/>", constructor: function(t) { this.view = t, this.isRTL = t.opt("isRTL") }, rowHtml: function(t, e) { var n, i, r = this.getHtmlRenderer("cell", t),
                    s = ""; for (e = e || 0, n = 0; this.colCnt > n; n++) i = this.getCell(e, n), s += r(i); return s = this.bookendCells(s, t, e), "<tr>" + s + "</tr>" }, bookendCells: function(t, e, n) { var i = this.getHtmlRenderer("intro", e)(n || 0),
                    r = this.getHtmlRenderer("outro", e)(n || 0),
                    s = this.isRTL ? r : i,
                    o = this.isRTL ? i : r; return "string" == typeof t ? s + t + o : t.prepend(s).append(o) }, getHtmlRenderer: function(t, e) { var n, i, r, s, o = this.view; return n = t + "Html", e && (i = e + P(t) + "Html"), i && (s = o[i]) ? r = o : i && (s = this[i]) ? r = this : (s = o[n]) ? r = o : (s = this[n]) && (r = this), "function" == typeof s ? function() { return s.apply(r, arguments) || "" } : function() { return s || "" } } }),
        Xe = De.Grid = je.extend({ start: null, end: null, rowCnt: 0, colCnt: 0, rowData: null, colData: null, el: null, coordMap: null, elsByFill: null, documentDragStartProxy: null, colHeadFormat: null, eventTimeFormat: null, displayEventEnd: null, constructor: function() { je.apply(this, arguments), this.coordMap = new Be(this), this.elsByFill = {}, this.documentDragStartProxy = t.proxy(this, "documentDragStart") }, render: function() { this.bindHandlers() }, destroy: function() { this.unbindHandlers() }, computeColHeadFormat: function() {}, computeEventTimeFormat: function() { return this.view.opt("smallTimeFormat") }, computeDisplayEventEnd: function() { return !1 }, setRange: function(t) { var e = this.view;
                this.start = t.start.clone(), this.end = t.end.clone(), this.rowData = [], this.colData = [], this.updateCells(), this.colHeadFormat = e.opt("columnFormat") || this.computeColHeadFormat(), this.eventTimeFormat = e.opt("timeFormat") || this.computeEventTimeFormat(), this.displayEventEnd = e.opt("displayEventEnd"), null == this.displayEventEnd && (this.displayEventEnd = this.computeDisplayEventEnd()) }, updateCells: function() {}, rangeToSegs: function() {}, getCell: function(e, n) { var i; return null == n && ("number" == typeof e ? (n = e % this.colCnt, e = Math.floor(e / this.colCnt)) : (n = e.col, e = e.row)), i = { row: e, col: n }, t.extend(i, this.getRowData(e), this.getColData(n)), t.extend(i, this.computeCellRange(i)), i }, computeCellRange: function() {}, getRowData: function(t) { return this.rowData[t] || {} }, getColData: function(t) { return this.colData[t] || {} }, getRowEl: function() {}, getColEl: function() {}, getCellDayEl: function(t) { return this.getColEl(t.col) || this.getRowEl(t.row) }, computeRowCoords: function() { var t, e, n, i = []; for (t = 0; this.rowCnt > t; t++) e = this.getRowEl(t), n = { top: e.offset().top }, t > 0 && (i[t - 1].bottom = n.top), i.push(n); return n.bottom = n.top + e.outerHeight(), i }, computeColCoords: function() { var t, e, n, i = []; for (t = 0; this.colCnt > t; t++) e = this.getColEl(t), n = { left: e.offset().left }, t > 0 && (i[t - 1].right = n.left), i.push(n); return n.right = n.left + e.outerWidth(), i }, bindHandlers: function() { var e = this;
                this.el.on("mousedown", function(n) { t(n.target).is(".fc-event-container *, .fc-more") || t(n.target).closest(".fc-popover").length || e.dayMousedown(n) }), this.bindSegHandlers(), t(document).on("dragstart", this.documentDragStartProxy) }, unbindHandlers: function() { t(document).off("dragstart", this.documentDragStartProxy) }, dayMousedown: function(t) { var e, n, i = this,
                    r = this.view,
                    s = r.opt("selectable"),
                    o = new Ie(this.coordMap, { scroll: r.opt("dragScroll"), dragStart: function() { r.unselect() }, cellOver: function(t, r) { var l = o.origCell;
                            l && (e = r ? t : null, s && (n = i.computeSelection(l, t), n ? i.renderSelection(n) : a())) }, cellOut: function() { e = null, n = null, i.destroySelection(), u() }, listenStop: function(t) { e && r.trigger("dayClick", i.getCellDayEl(e), e.start, t), n && r.reportSelection(n, t), u() } });
                o.mousedown(t) }, renderRangeHelper: function(t, e) { var n;
                n = e ? x(e.event) : {}, n.start = t.start.clone(), n.end = t.end ? t.end.clone() : null, n.allDay = null, this.view.calendar.normalizeEventDateProps(n), n.className = (n.className || []).concat("fc-helper"), e || (n.editable = !1), this.renderHelper(n, e) }, renderHelper: function() {}, destroyHelper: function() {}, renderSelection: function(t) { this.renderHighlight(t) }, destroySelection: function() { this.destroyHighlight() }, computeSelection: function(t, e) { var n, i = [t.start, t.end, e.start, e.end]; return i.sort(V), n = { start: i[0].clone(), end: i[3].clone() }, this.view.calendar.isSelectionRangeAllowed(n) ? n : null }, renderHighlight: function(t) { this.renderFill("highlight", this.rangeToSegs(t)) }, destroyHighlight: function() { this.destroyFill("highlight") }, highlightSegClasses: function() { return ["fc-highlight"] }, renderFill: function() {}, destroyFill: function(t) { var e = this.elsByFill[t];
                e && (e.remove(), delete this.elsByFill[t]) }, renderFillSegEls: function(e, n) { var i, r = this,
                    s = this[e + "SegEl"],
                    o = "",
                    l = []; if (n.length) { for (i = 0; n.length > i; i++) o += this.fillSegHtml(e, n[i]);
                    t(o).each(function(e, i) { var o = n[e],
                            a = t(i);
                        s && (a = s.call(r, o, a)), a && (a = t(a), a.is(r.fillSegTag) && (o.el = a, l.push(o))) }) } return l }, fillSegTag: "div", fillSegHtml: function(t, e) { var n = this[t + "SegClasses"],
                    i = this[t + "SegStyles"],
                    r = n ? n.call(this, e) : [],
                    s = i ? i.call(this, e) : ""; return "<" + this.fillSegTag + (r.length ? ' class="' + r.join(" ") + '"' : "") + (s ? ' style="' + s + '"' : "") + " />" }, headHtml: function() { return '<div class="fc-row ' + this.view.widgetHeaderClass + '">' + "<table>" + "<thead>" + this.rowHtml("head") + "</thead>" + "</table>" + "</div>" }, headCellHtml: function(t) { var e = this.view,
                    n = t.start; return '<th class="fc-day-header ' + e.widgetHeaderClass + " fc-" + Fe[n.day()] + '">' + z(n.format(this.colHeadFormat)) + "</th>" }, bgCellHtml: function(t) { var e = this.view,
                    n = t.start,
                    i = this.getDayClasses(n); return i.unshift("fc-day", e.widgetContentClass), '<td class="' + i.join(" ") + '"' + ' data-date="' + n.format("YYYY-MM-DD") + '"' + "></td>" }, getDayClasses: function(t) { var e = this.view,
                    n = e.calendar.getNow().stripTime(),
                    i = ["fc-" + Fe[t.day()]]; return "month" === e.name && t.month() != e.intervalStart.month() && i.push("fc-other-month"), t.isSame(n, "day") ? i.push("fc-today", e.highlightStateClass) : n > t ? i.push("fc-past") : i.push("fc-future"), i } });
    Xe.mixin({ mousedOverSeg: null, isDraggingSeg: !1, isResizingSeg: !1, segs: null, renderEvents: function(t) { var e, n, i = this.eventsToSegs(t),
                r = [],
                s = []; for (e = 0; i.length > e; e++) n = i[e], J(n.event) ? r.push(n) : s.push(n);
            r = this.renderBgSegs(r) || r, s = this.renderFgSegs(s) || s, this.segs = r.concat(s) }, destroyEvents: function() { this.triggerSegMouseout(), this.destroyFgSegs(), this.destroyBgSegs(), this.segs = null }, getEventSegs: function() { return this.segs || [] }, renderFgSegs: function() {}, destroyFgSegs: function() {}, renderFgSegEls: function(e, n) { var i, r = this.view,
                s = "",
                o = []; if (e.length) { for (i = 0; e.length > i; i++) s += this.fgSegHtml(e[i], n);
                t(s).each(function(n, i) { var s = e[n],
                        l = r.resolveEventEl(s.event, t(i));
                    l && (l.data("fc-seg", s), s.el = l, o.push(s)) }) } return o }, fgSegHtml: function() {}, renderBgSegs: function(t) { return this.renderFill("bgEvent", t) }, destroyBgSegs: function() { this.destroyFill("bgEvent") }, bgEventSegEl: function(t, e) { return this.view.resolveEventEl(t.event, e) }, bgEventSegClasses: function(t) { var e = t.event,
                n = e.source || {}; return ["fc-bgevent"].concat(e.className, n.className || []) }, bgEventSegStyles: function(t) { var e = this.view,
                n = t.event,
                i = n.source || {},
                r = n.color,
                s = i.color,
                o = e.opt("eventColor"),
                l = n.backgroundColor || r || i.backgroundColor || s || e.opt("eventBackgroundColor") || o; return l ? "background-color:" + l : "" }, businessHoursSegClasses: function() { return ["fc-nonbusiness", "fc-bgevent"] }, bindSegHandlers: function() { var e = this,
                n = this.view;
            t.each({ mouseenter: function(t, n) { e.triggerSegMouseover(t, n) }, mouseleave: function(t, n) { e.triggerSegMouseout(t, n) }, click: function(t, e) { return n.trigger("eventClick", this, t.event, e) }, mousedown: function(i, r) { t(r.target).is(".fc-resizer") && n.isEventResizable(i.event) ? e.segResizeMousedown(i, r) : n.isEventDraggable(i.event) && e.segDragMousedown(i, r) } }, function(n, i) { e.el.on(n, ".fc-event-container > *", function(n) { var r = t(this).data("fc-seg"); return !r || e.isDraggingSeg || e.isResizingSeg ? void 0 : i.call(this, r, n) }) }) }, triggerSegMouseover: function(t, e) { this.mousedOverSeg || (this.mousedOverSeg = t, this.view.trigger("eventMouseover", t.el[0], t.event, e)) }, triggerSegMouseout: function(t, e) { e = e || {}, this.mousedOverSeg && (t = t || this.mousedOverSeg, this.mousedOverSeg = null, this.view.trigger("eventMouseout", t.el[0], t.event, e)) }, segDragMousedown: function(t, e) { var n, i = this,
                r = this.view,
                s = t.el,
                o = t.event,
                l = new We(t.el, { parentEl: r.el, opacity: r.opt("dragOpacity"), revertDuration: r.opt("dragRevertDuration"), zIndex: 2 }),
                d = new Ie(r.coordMap, { distance: 5, scroll: r.opt("dragScroll"), listenStart: function(t) { l.hide(), l.start(t) }, dragStart: function(e) { i.triggerSegMouseout(t, e), i.isDraggingSeg = !0, r.hideEvent(o), r.trigger("eventDragStart", s[0], o, e, {}) }, cellOver: function(e, s) { var u = t.cell || d.origCell;
                        n = i.computeEventDrop(u, e, o), n ? (r.renderDrag(n, t) ? l.hide() : l.show(), s && (n = null)) : (l.show(), a()) }, cellOut: function() { n = null, r.destroyDrag(), l.show(), u() }, dragStop: function(t) { l.stop(!n, function() { i.isDraggingSeg = !1, r.destroyDrag(), r.showEvent(o), r.trigger("eventDragStop", s[0], o, t, {}), n && r.reportEventDrop(o, n, s, t) }), u() }, listenStop: function() { l.stop() } });
            d.mousedown(e) }, computeEventDrop: function(t, e, n) { var i, r, s, o, l, a = t.start,
                u = e.start; return a.hasTime() === u.hasTime() ? (i = E(u, a), r = n.start.clone().add(i), s = null === n.end ? null : n.end.clone().add(i), o = n.allDay) : (r = u.clone(), s = null, o = !u.hasTime()), l = { start: r, end: s, allDay: o }, this.view.calendar.isEventRangeAllowed(l, n) ? l : null }, documentDragStart: function(e, n) { var i, r, s = this.view;
            s.opt("droppable") && (i = t(e.target), r = s.opt("dropAccept"), (t.isFunction(r) ? r.call(i[0], i) : i.is(r)) && this.startExternalDrag(i, e, n)) }, startExternalDrag: function(e, n) { var i, r, s = this,
                o = se(e);
            i = new Ie(this.coordMap, { cellOver: function(t) { r = s.computeExternalDrop(t, o), r ? s.renderDrag(r) : a() }, cellOut: function() { r = null, s.destroyDrag(), u() } }), t(document).one("dragstop", function(t, n) { s.destroyDrag(), u(), r && s.view.reportExternalDrop(o, r, e, t, n) }), i.startDrag(n) }, computeExternalDrop: function(t, e) { var n = { start: t.start.clone(), end: null }; return e.startTime && !n.start.hasTime() && n.start.time(e.startTime), e.duration && (n.end = n.start.clone().add(e.duration)), this.view.calendar.isExternalDropRangeAllowed(n, e.eventProps) ? n : null }, renderDrag: function() {}, destroyDrag: function() {}, segResizeMousedown: function(t, e) {
            function n() { s.destroyEventResize(), o.showEvent(c), u() } var i, r, s = this,
                o = this.view,
                l = o.calendar,
                d = t.el,
                c = t.event,
                h = c.start,
                f = l.getEventEnd(c);
            r = new Ie(this.coordMap, { distance: 5, scroll: o.opt("dragScroll"), dragStart: function(e) { s.triggerSegMouseout(t, e), s.isResizingSeg = !0, o.trigger("eventResizeStart", d[0], c, e, {}) }, cellOver: function(e) { i = e.end, i.isAfter(h) || (i = h.clone().add(E(e.end, e.start))), i.isSame(f) ? i = null : l.isEventRangeAllowed({ start: h, end: i }, c) ? (s.renderEventResize({ start: h, end: i }, t), o.hideEvent(c)) : (i = null, a()) }, cellOut: function() { i = null, n() }, dragStop: function(t) { s.isResizingSeg = !1, n(), o.trigger("eventResizeStop", d[0], c, t, {}), i && o.reportEventResize(c, i, d, t) } }), r.mousedown(e) }, renderEventResize: function() {}, destroyEventResize: function() {}, getEventTimeText: function(t, e) { return e = e || this.eventTimeFormat, t.end && this.displayEventEnd ? this.view.formatRange(t, e) : t.start.format(e) }, getSegClasses: function(t, e, n) { var i = t.event,
                r = ["fc-event", t.isStart ? "fc-start" : "fc-not-start", t.isEnd ? "fc-end" : "fc-not-end"].concat(i.className, i.source ? i.source.className : []); return e && r.push("fc-draggable"), n && r.push("fc-resizable"), r }, getEventSkinCss: function(t) { var e = this.view,
                n = t.source || {},
                i = t.color,
                r = n.color,
                s = e.opt("eventColor"),
                o = t.backgroundColor || i || n.backgroundColor || r || e.opt("eventBackgroundColor") || s,
                l = t.borderColor || i || n.borderColor || r || e.opt("eventBorderColor") || s,
                a = t.textColor || n.textColor || e.opt("eventTextColor"),
                u = []; return o && u.push("background-color:" + o), l && u.push("border-color:" + l), a && u.push("color:" + a), u.join(";") }, eventsToSegs: function(t, e) { var n, i = this.eventsToRanges(t),
                r = []; for (n = 0; i.length > n; n++) r.push.apply(r, this.eventRangeToSegs(i[n], e)); return r }, eventsToRanges: function(e) { var n = this,
                i = ne(e),
                r = []; return t.each(i, function(t, e) { e.length && r.push.apply(r, te(e[0]) ? n.eventsToInverseRanges(e) : n.eventsToNormalRanges(e)) }), r }, eventsToNormalRanges: function(t) { var e, n, i, r, s = this.view.calendar,
                o = []; for (e = 0; t.length > e; e++) n = t[e], i = n.start.clone().stripZone(), r = s.getEventEnd(n).stripZone(), o.push({ event: n, start: i, end: r, eventStartMS: +i, eventDurationMS: r - i }); return o }, eventsToInverseRanges: function(t) { var e, n, i = this.view,
                r = i.start.clone().stripZone(),
                s = i.end.clone().stripZone(),
                o = this.eventsToNormalRanges(t),
                l = [],
                a = t[0],
                u = r; for (o.sort(ie), e = 0; o.length > e; e++) n = o[e], n.start > u && l.push({ event: a, start: u, end: n.start }), u = n.end; return s > u && l.push({ event: a, start: u, end: s }), l }, eventRangeToSegs: function(t, e) { var n, i, r; for (n = e ? e(t) : this.rangeToSegs(t), i = 0; n.length > i; i++) r = n[i], r.event = t.event, r.eventStartMS = t.eventStartMS, r.eventDurationMS = t.eventDurationMS; return n } }), De.compareSegs = re, De.dataAttrPrefix = "";
    var $e = Xe.extend({ numbersVisible: !1, bottomCoordPadding: 0, breakOnWeeks: null, cellDates: null, dayToCellOffsets: null, rowEls: null, dayEls: null, helperEls: null, render: function(t) { var e, n, i, r = this.view,
                s = this.rowCnt,
                o = this.colCnt,
                l = s * o,
                a = ""; for (e = 0; s > e; e++) a += this.dayRowHtml(e, t); for (this.el.html(a), this.rowEls = this.el.find(".fc-row"), this.dayEls = this.el.find(".fc-day"), n = 0; l > n; n++) i = this.getCell(n), r.trigger("dayRender", null, i.start, this.dayEls.eq(n));
            Xe.prototype.render.call(this) }, destroy: function() { this.destroySegPopover(), Xe.prototype.destroy.call(this) }, dayRowHtml: function(t, e) { var n = this.view,
                i = ["fc-row", "fc-week", n.widgetContentClass]; return e && i.push("fc-rigid"), '<div class="' + i.join(" ") + '">' + '<div class="fc-bg">' + "<table>" + this.rowHtml("day", t) + "</table>" + "</div>" + '<div class="fc-content-skeleton">' + "<table>" + (this.numbersVisible ? "<thead>" + this.rowHtml("number", t) + "</thead>" : "") + "</table>" + "</div>" + "</div>" }, dayCellHtml: function(t) { return this.bgCellHtml(t) }, computeColHeadFormat: function() { return this.rowCnt > 1 ? "ddd" : this.colCnt > 1 ? this.view.opt("dayOfMonthFormat") : "dddd" }, computeEventTimeFormat: function() { return this.view.opt("extraSmallTimeFormat") }, computeDisplayEventEnd: function() { return 1 == this.colCnt }, updateCells: function() { var t, e, n, i; if (this.updateCellDates(), t = this.cellDates, this.breakOnWeeks) { for (e = t[0].day(), i = 1; t.length > i && t[i].day() != e; i++);
                n = Math.ceil(t.length / i) } else n = 1, i = t.length;
            this.rowCnt = n, this.colCnt = i }, updateCellDates: function() { for (var t = this.view, e = this.start.clone(), n = [], i = -1, r = []; e.isBefore(this.end);) t.isHiddenDay(e) ? r.push(i + .5) : (i++, r.push(i), n.push(e.clone())), e.add(1, "days");
            this.cellDates = n, this.dayToCellOffsets = r }, computeCellRange: function(t) { var e = this.colCnt,
                n = t.row * e + (this.isRTL ? e - t.col - 1 : t.col),
                i = this.cellDates[n].clone(),
                r = i.clone().add(1, "day"); return { start: i, end: r } }, getRowEl: function(t) { return this.rowEls.eq(t) }, getColEl: function(t) { return this.dayEls.eq(t) }, getCellDayEl: function(t) { return this.dayEls.eq(t.row * this.colCnt + t.col) }, computeRowCoords: function() { var t = Xe.prototype.computeRowCoords.call(this); return t[t.length - 1].bottom += this.bottomCoordPadding, t }, rangeToSegs: function(t) { var e, n, i, r, s, o, l, a, u, d, c = this.isRTL,
                h = this.rowCnt,
                f = this.colCnt,
                g = []; for (t = this.view.computeDayRange(t), e = this.dateToCellOffset(t.start), n = this.dateToCellOffset(t.end.subtract(1, "days")), i = 0; h > i; i++) r = i * f, s = r + f - 1, a = Math.max(r, e), u = Math.min(s, n), a = Math.ceil(a), u = Math.floor(u), u >= a && (o = a === e, l = u === n, a -= r, u -= r, d = { row: i, isStart: o, isEnd: l }, c ? (d.leftCol = f - u - 1, d.rightCol = f - a - 1) : (d.leftCol = a, d.rightCol = u), g.push(d)); return g }, dateToCellOffset: function(t) { var e = this.dayToCellOffsets,
                n = t.diff(this.start, "days"); return 0 > n ? e[0] - 1 : n >= e.length ? e[e.length - 1] + 1 : e[n] }, renderDrag: function(t, e) { var n; return this.renderHighlight(this.view.calendar.ensureVisibleEventRange(t)), e && !e.el.closest(this.el).length ? (this.renderRangeHelper(t, e), n = this.view.opt("dragOpacity"), void 0 !== n && this.helperEls.css("opacity", n), !0) : void 0 }, destroyDrag: function() { this.destroyHighlight(), this.destroyHelper() }, renderEventResize: function(t, e) { this.renderHighlight(t), this.renderRangeHelper(t, e) }, destroyEventResize: function() { this.destroyHighlight(), this.destroyHelper() }, renderHelper: function(e, n) { var i, r = [],
                s = this.eventsToSegs([e]);
            s = this.renderFgSegEls(s), i = this.renderSegRows(s), this.rowEls.each(function(e, s) { var o, l = t(s),
                    a = t('<div class="fc-helper-skeleton"><table/></div>');
                o = n && n.row === e ? n.el.position().top : l.find(".fc-content-skeleton tbody").position().top, a.css("top", o).find("table").append(i[e].tbodyEl), l.append(a), r.push(a[0]) }), this.helperEls = t(r) }, destroyHelper: function() { this.helperEls && (this.helperEls.remove(), this.helperEls = null) }, fillSegTag: "td", renderFill: function(e, n) { var i, r, s, o = []; for (n = this.renderFillSegEls(e, n), i = 0; n.length > i; i++) r = n[i], s = this.renderFillRow(e, r), this.rowEls.eq(r.row).append(s), o.push(s[0]); return this.elsByFill[e] = t(o), n }, renderFillRow: function(e, n) { var i, r, s = this.colCnt,
                o = n.leftCol,
                l = n.rightCol + 1; return i = t('<div class="fc-' + e.toLowerCase() + '-skeleton">' + "<table><tr/></table>" + "</div>"), r = i.find("tr"), o > 0 && r.append('<td colspan="' + o + '"/>'), r.append(n.el.attr("colspan", l - o)), s > l && r.append('<td colspan="' + (s - l) + '"/>'), this.bookendCells(r, e), i } });
    $e.mixin({ rowStructs: null, destroyEvents: function() { this.destroySegPopover(), Xe.prototype.destroyEvents.apply(this, arguments) }, getEventSegs: function() { return Xe.prototype.getEventSegs.call(this).concat(this.popoverSegs || []) }, renderBgSegs: function(e) { var n = t.grep(e, function(t) { return t.event.allDay }); return Xe.prototype.renderBgSegs.call(this, n) }, renderFgSegs: function(e) { var n; return e = this.renderFgSegEls(e), n = this.rowStructs = this.renderSegRows(e), this.rowEls.each(function(e, i) { t(i).find(".fc-content-skeleton > table").append(n[e].tbodyEl) }), e }, destroyFgSegs: function() { for (var t, e = this.rowStructs || []; t = e.pop();) t.tbodyEl.remove();
            this.rowStructs = null }, renderSegRows: function(t) { var e, n, i = []; for (e = this.groupSegRows(t), n = 0; e.length > n; n++) i.push(this.renderSegRow(n, e[n])); return i }, fgSegHtml: function(t, e) { var n, i = this.view,
                r = t.event,
                s = i.isEventDraggable(r),
                o = !e && r.allDay && t.isEnd && i.isEventResizable(r),
                l = this.getSegClasses(t, s, o),
                a = this.getEventSkinCss(r),
                u = ""; return l.unshift("fc-day-grid-event"), !r.allDay && t.isStart && (u = '<span class="fc-time">' + z(this.getEventTimeText(r)) + "</span>"), n = '<span class="fc-title">' + (z(r.title || "") || "&nbsp;") + "</span>", '<a class="' + l.join(" ") + '"' + (r.url ? ' href="' + z(r.url) + '"' : "") + (a ? ' style="' + a + '"' : "") + ">" + '<div class="fc-content">' + (this.isRTL ? n + " " + u : u + " " + n) + "</div>" + (o ? '<div class="fc-resizer"/>' : "") + "</a>" }, renderSegRow: function(e, n) {
            function i(e) { for (; e > o;) d = (v[r - 1] || [])[o], d ? d.attr("rowspan", parseInt(d.attr("rowspan") || 1, 10) + 1) : (d = t("<td/>"), l.append(d)), m[r][o] = d, v[r][o] = d, o++ } var r, s, o, l, a, u, d, c = this.colCnt,
                h = this.buildSegLevels(n),
                f = Math.max(1, h.length),
                g = t("<tbody/>"),
                p = [],
                m = [],
                v = []; for (r = 0; f > r; r++) { if (s = h[r], o = 0, l = t("<tr/>"), p.push([]), m.push([]), v.push([]), s)
                    for (a = 0; s.length > a; a++) { for (u = s[a], i(u.leftCol), d = t('<td class="fc-event-container"/>').append(u.el), u.leftCol != u.rightCol ? d.attr("colspan", u.rightCol - u.leftCol + 1) : v[r][o] = d; u.rightCol >= o;) m[r][o] = d, p[r][o] = u, o++;
                        l.append(d) } i(c), this.bookendCells(l, "eventSkeleton"), g.append(l) } return { row: e, tbodyEl: g, cellMatrix: m, segMatrix: p, segLevels: h, segs: n } }, buildSegLevels: function(t) { var e, n, i, r = []; for (t.sort(re), e = 0; t.length > e; e++) { for (n = t[e], i = 0; r.length > i && oe(n, r[i]); i++);
                n.level = i, (r[i] || (r[i] = [])).push(n) } for (i = 0; r.length > i; i++) r[i].sort(le); return r }, groupSegRows: function(t) { var e, n = []; for (e = 0; this.rowCnt > e; e++) n.push([]); for (e = 0; t.length > e; e++) n[t[e].row].push(t[e]); return n } }), $e.mixin({ segPopover: null, popoverSegs: null, destroySegPopover: function() { this.segPopover && this.segPopover.hide() }, limitRows: function(t) { var e, n, i = this.rowStructs || []; for (e = 0; i.length > e; e++) this.unlimitRow(e), n = t ? "number" == typeof t ? t : this.computeRowLevelLimit(e) : !1, n !== !1 && this.limitRow(e, n) }, computeRowLevelLimit: function(t) { var e, n, i = this.rowEls.eq(t),
                r = i.height(),
                s = this.rowStructs[t].tbodyEl.children(); for (e = 0; s.length > e; e++)
                if (n = s.eq(e).removeClass("fc-limited"), n.position().top + n.outerHeight() > r) return e; return !1 }, limitRow: function(e, n) {
            function i(i) { for (; i > D;) r = E.getCell(e, D), d = E.getCellSegs(r, n), d.length && (f = o[n - 1][D], w = E.renderMoreLink(r, d), y = t("<div/>").append(w), f.append(y), b.push(y[0])), D++ } var r, s, o, l, a, u, d, c, h, f, g, p, m, v, y, w, E = this,
                S = this.rowStructs[e],
                b = [],
                D = 0; if (n && S.segLevels.length > n) { for (s = S.segLevels[n - 1], o = S.cellMatrix, l = S.tbodyEl.children().slice(n).addClass("fc-limited").get(), a = 0; s.length > a; a++) { for (u = s[a], i(u.leftCol), h = [], c = 0; u.rightCol >= D;) r = this.getCell(e, D), d = this.getCellSegs(r, n), h.push(d), c += d.length, D++; if (c) { for (f = o[n - 1][u.leftCol], g = f.attr("rowspan") || 1, p = [], m = 0; h.length > m; m++) v = t('<td class="fc-more-cell"/>').attr("rowspan", g), d = h[m], r = this.getCell(e, u.leftCol + m), w = this.renderMoreLink(r, [u].concat(d)), y = t("<div/>").append(w), v.append(y), p.push(v[0]), b.push(v[0]);
                        f.addClass("fc-limited").after(t(p)), l.push(f[0]) } } i(this.colCnt), S.moreEls = t(b), S.limitedEls = t(l) } }, unlimitRow: function(t) { var e = this.rowStructs[t];
            e.moreEls && (e.moreEls.remove(), e.moreEls = null), e.limitedEls && (e.limitedEls.removeClass("fc-limited"), e.limitedEls = null) }, renderMoreLink: function(e, n) { var i = this,
                r = this.view; return t('<a class="fc-more"/>').text(this.getMoreLinkText(n.length)).on("click", function(s) { var o = r.opt("eventLimitClick"),
                    l = e.start,
                    a = t(this),
                    u = i.getCellDayEl(e),
                    d = i.getCellSegs(e),
                    c = i.resliceDaySegs(d, l),
                    h = i.resliceDaySegs(n, l); "function" == typeof o && (o = r.trigger("eventLimitClick", null, { date: l, dayEl: u, moreEl: a, segs: c, hiddenSegs: h }, s)), "popover" === o ? i.showSegPopover(e, a, c) : "string" == typeof o && r.calendar.zoomTo(l, o) }) }, showSegPopover: function(t, e, n) { var i, r, s = this,
                o = this.view,
                l = e.parent();
            i = 1 == this.rowCnt ? o.el : this.rowEls.eq(t.row), r = { className: "fc-more-popover", content: this.renderSegPopoverContent(t, n), parentEl: this.el, top: i.offset().top, autoHide: !0, viewportConstrain: o.opt("popoverViewportConstrain"), hide: function() { s.segPopover.destroy(), s.segPopover = null, s.popoverSegs = null } }, this.isRTL ? r.right = l.offset().left + l.outerWidth() + 1 : r.left = l.offset().left - 1, this.segPopover = new Oe(r), this.segPopover.show() }, renderSegPopoverContent: function(e, n) { var i, r = this.view,
                s = r.opt("theme"),
                o = e.start.format(r.opt("dayPopoverFormat")),
                l = t('<div class="fc-header ' + r.widgetHeaderClass + '">' + '<span class="fc-close ' + (s ? "ui-icon ui-icon-closethick" : "fc-icon fc-icon-x") + '"></span>' + '<span class="fc-title">' + z(o) + "</span>" + '<div class="fc-clear"/>' + "</div>" + '<div class="fc-body ' + r.widgetContentClass + '">' + '<div class="fc-event-container"></div>' + "</div>"),
                a = l.find(".fc-event-container"); for (n = this.renderFgSegEls(n, !0), this.popoverSegs = n, i = 0; n.length > i; i++) n[i].cell = e, a.append(n[i].el); return l }, resliceDaySegs: function(e, n) { var i = t.map(e, function(t) { return t.event }),
                r = n.clone().stripTime(),
                s = r.clone().add(1, "days"),
                o = { start: r, end: s }; return this.eventsToSegs(i, function(t) { var e = y(t, o); return e ? [e] : [] }) }, getMoreLinkText: function(t) { var e = this.view.opt("eventLimitText"); return "function" == typeof e ? e(t) : "+" + t + " " + e }, getCellSegs: function(t, e) { for (var n, i = this.rowStructs[t.row].segMatrix, r = e || 0, s = []; i.length > r;) n = i[r][t.col], n && s.push(n), r++; return s } });
    var Ue = Xe.extend({
        slotDuration: null,
        snapDuration: null,
        minTime: null,
        maxTime: null,
        axisFormat: null,
        dayEls: null,
        slatEls: null,
        slatTops: null,
        helperEl: null,
        businessHourSegs: null,
        constructor: function() { Xe.apply(this, arguments), this.processOptions() },
        render: function() { this.el.html(this.renderHtml()), this.dayEls = this.el.find(".fc-day"), this.slatEls = this.el.find(".fc-slats tr"), this.computeSlatTops(), this.renderBusinessHours(), Xe.prototype.render.call(this) },
        renderBusinessHours: function() { var t = this.view.calendar.getBusinessHoursEvents();
            this.businessHourSegs = this.renderFill("businessHours", this.eventsToSegs(t), "bgevent") },
        renderHtml: function() { return '<div class="fc-bg"><table>' + this.rowHtml("slotBg") + "</table>" + "</div>" + '<div class="fc-slats">' + "<table>" + this.slatRowHtml() + "</table>" + "</div>" },
        slotBgCellHtml: function(t) { return this.bgCellHtml(t) },
        slatRowHtml: function() { for (var t, n, i, r = this.view, s = this.isRTL, o = "", l = 0 === this.slotDuration.asMinutes() % 15, a = e.duration(+this.minTime); this.maxTime > a;) t = this.start.clone().time(a), n = t.minutes(), i = '<td class="fc-axis fc-time ' + r.widgetContentClass + '" ' + r.axisStyleAttr() + ">" + (l && n ? "" : "<span>" + z(t.format(this.axisFormat)) + "</span>") + "</td>", o += "<tr " + (n ? 'class="fc-minor"' : "") + ">" + (s ? "" : i) + '<td class="' + r.widgetContentClass + '"/>' + (s ? i : "") + "</tr>", a.add(this.slotDuration); return o },
        processOptions: function() { var t = this.view,
                n = t.opt("slotDuration"),
                i = t.opt("snapDuration");
            n = e.duration(n), i = i ? e.duration(i) : n, this.slotDuration = n, this.snapDuration = i, this.minTime = e.duration(t.opt("minTime")), this.maxTime = e.duration(t.opt("maxTime")), this.axisFormat = t.opt("axisFormat") || t.opt("smallTimeFormat") },
        computeColHeadFormat: function() { return this.colCnt > 1 ? this.view.opt("dayOfMonthFormat") : "dddd" },
        computeEventTimeFormat: function() { return this.view.opt("noMeridiemTimeFormat") },
        computeDisplayEventEnd: function() { return !0 },
        updateCells: function() { var t, e = this.view,
                n = []; for (t = this.start.clone(); t.isBefore(this.end);) n.push({ day: t.clone() }), t.add(1, "day"), t = e.skipHiddenDays(t);
            this.isRTL && n.reverse(), this.colData = n, this.colCnt = n.length, this.rowCnt = Math.ceil((this.maxTime - this.minTime) / this.snapDuration) },
        computeCellRange: function(t) { var e = this.computeSnapTime(t.row),
                n = this.view.calendar.rezoneDate(t.day).time(e),
                i = n.clone().add(this.snapDuration); return { start: n, end: i } },
        getColEl: function(t) { return this.dayEls.eq(t) },
        computeSnapTime: function(t) { return e.duration(this.minTime + this.snapDuration * t) },
        rangeToSegs: function(t) {
            var e, n, i, r, s = this.colCnt,
                o = [];
            for (t = { start: t.start.clone().stripZone(), end: t.end.clone().stripZone() }, n = 0; s > n; n++) i = this.colData[n].day, r = { start: i.clone().time(this.minTime), end: i.clone().time(this.maxTime) }, e = y(t, r), e && (e.col = n, o.push(e));
            return o
        },
        resize: function() { this.computeSlatTops(), this.updateSegVerticals() },
        computeRowCoords: function() { var t, e, n = this.el.offset().top,
                i = []; for (t = 0; this.rowCnt > t; t++) e = { top: n + this.computeTimeTop(this.computeSnapTime(t)) }, t > 0 && (i[t - 1].bottom = e.top), i.push(e); return e.bottom = e.top + this.computeTimeTop(this.computeSnapTime(t)), i },
        computeDateTop: function(t, n) { return this.computeTimeTop(e.duration(t.clone().stripZone() - n.clone().stripTime())) },
        computeTimeTop: function(t) { var e, n, i, r, s = (t - this.minTime) / this.slotDuration; return s = Math.max(0, s), s = Math.min(this.slatEls.length, s), e = Math.floor(s), n = s - e, i = this.slatTops[e], n ? (r = this.slatTops[e + 1], i + (r - i) * n) : i },
        computeSlatTops: function() { var e, n = [];
            this.slatEls.each(function(i, r) { e = t(r).position().top, n.push(e) }), n.push(e + this.slatEls.last().outerHeight()), this.slatTops = n },
        renderDrag: function(t, e) { var n; return e ? (this.renderRangeHelper(t, e), n = this.view.opt("dragOpacity"), void 0 !== n && this.helperEl.css("opacity", n), !0) : (this.renderHighlight(this.view.calendar.ensureVisibleEventRange(t)), void 0) },
        destroyDrag: function() { this.destroyHelper(), this.destroyHighlight() },
        renderEventResize: function(t, e) { this.renderRangeHelper(t, e) },
        destroyEventResize: function() { this.destroyHelper() },
        renderHelper: function(e, n) { var i, r, s, o, l = this.eventsToSegs([e]); for (l = this.renderFgSegEls(l), i = this.renderSegTable(l), r = 0; l.length > r; r++) s = l[r], n && n.col === s.col && (o = n.el, s.el.css({ left: o.css("left"), right: o.css("right"), "margin-left": o.css("margin-left"), "margin-right": o.css("margin-right") }));
            this.helperEl = t('<div class="fc-helper-skeleton"/>').append(i).appendTo(this.el) },
        destroyHelper: function() { this.helperEl && (this.helperEl.remove(), this.helperEl = null) },
        renderSelection: function(t) { this.view.opt("selectHelper") ? this.renderRangeHelper(t) : this.renderHighlight(t) },
        destroySelection: function() { this.destroyHelper(), this.destroyHighlight() },
        renderFill: function(e, n, i) { var r, s, o, l, a, u, d, c, h, f; if (n.length) { for (n = this.renderFillSegEls(e, n), r = this.groupSegCols(n), i = i || e.toLowerCase(), s = t('<div class="fc-' + i + '-skeleton">' + "<table><tr/></table>" + "</div>"), o = s.find("tr"), l = 0; r.length > l; l++)
                    if (a = r[l], u = t("<td/>").appendTo(o), a.length)
                        for (d = t('<div class="fc-' + i + '-container"/>').appendTo(u), c = this.colData[l].day, h = 0; a.length > h; h++) f = a[h], d.append(f.el.css({ top: this.computeDateTop(f.start, c), bottom: -this.computeDateTop(f.end, c) }));
                this.bookendCells(o, e), this.el.append(s), this.elsByFill[e] = s } return n }
    });
    Ue.mixin({ eventSkeletonEl: null, renderFgSegs: function(e) { return e = this.renderFgSegEls(e), this.el.append(this.eventSkeletonEl = t('<div class="fc-content-skeleton"/>').append(this.renderSegTable(e))), e }, destroyFgSegs: function() { this.eventSkeletonEl && (this.eventSkeletonEl.remove(), this.eventSkeletonEl = null) }, renderSegTable: function(e) { var n, i, r, s, o, l, a = t("<table><tr/></table>"),
                u = a.find("tr"); for (n = this.groupSegCols(e), this.computeSegVerticals(e), s = 0; n.length > s; s++) { for (o = n[s], ae(o), l = t('<div class="fc-event-container"/>'), i = 0; o.length > i; i++) r = o[i], r.el.css(this.generateSegPositionCss(r)), 30 > r.bottom - r.top && r.el.addClass("fc-short"), l.append(r.el);
                u.append(t("<td/>").append(l)) } return this.bookendCells(u, "eventSkeleton"), a }, updateSegVerticals: function() { var t, e = (this.segs || []).concat(this.businessHourSegs || []); for (this.computeSegVerticals(e), t = 0; e.length > t; t++) e[t].el.css(this.generateSegVerticalCss(e[t])) }, computeSegVerticals: function(t) { var e, n; for (e = 0; t.length > e; e++) n = t[e], n.top = this.computeDateTop(n.start, n.start), n.bottom = this.computeDateTop(n.end, n.start) }, fgSegHtml: function(t, e) { var n, i, r, s = this.view,
                o = t.event,
                l = s.isEventDraggable(o),
                a = !e && t.isEnd && s.isEventResizable(o),
                u = this.getSegClasses(t, l, a),
                //
                d = this.getEventSkinCss(o); return u.unshift("fc-time-grid-event"), s.isMultiDayEvent(o) ? (t.isStart || t.isEnd) && (n = this.getEventTimeText(t), i = this.getEventTimeText(t, "LT"), r = this.getEventTimeText({ start: t.start })) : (n = this.getEventTimeText(o), i = this.getEventTimeText(o, "LT"), r = this.getEventTimeText({ start: o.start })), '<a class="' + u.join(" ") + '"' + (o.url ? ' href="' + z(o.url) + '"' : "") + (d ? ' style="' + d + '"' : "") + ">" + '<div class="fc-content">' + (n ? '<div class="fc-time" data-start="' + z(r) + '"' + ' data-full="' + z(i) + '"' + ">" + "<span>" + z(n) + "</span>" + "</div>" : "") + (o.title ? '<div class="fc-title">' + z(o.title) + "</div>" : "") + "</div>" + ((z(o.title) == "CLOSED")? '<div class="fc-bg" style="background-color: #000;"/>' : '<div class="fc-bg"/>') + (a ? '<div class="fc-resizer"/>' : "") + "</a>" }, generateSegPositionCss: function(t) { var e, n, i = this.view.opt("slotEventOverlap"),
                //
                r = t.backwardCoord,
                s = t.forwardCoord,
                o = this.generateSegVerticalCss(t); return i && (s = Math.min(1, r + 2 * (s - r))), this.isRTL ? (e = 1 - s, n = r) : (e = r, n = 1 - s), o.zIndex = t.level + 1, o.left = 100 * e + "%", o.right = 100 * n + "%", i && t.forwardPressure && (o[this.isRTL ? "marginLeft" : "marginRight"] = 20), o }, generateSegVerticalCss: function(t) { return { top: t.top, bottom: -t.bottom } }, groupSegCols: function(t) { var e, n = []; for (e = 0; this.colCnt > e; e++) n.push([]); for (e = 0; t.length > e; e++) n[t[e].col].push(t[e]); return n } });
    var qe = De.View = K.extend({ type: null, name: null, title: null, calendar: null, options: null, coordMap: null, el: null, start: null, end: null, intervalStart: null, intervalEnd: null, intervalDuration: null, intervalUnit: null, isSelected: !1, scrollerEl: null, scrollTop: null, widgetHeaderClass: null, widgetContentClass: null, highlightStateClass: null, nextDayThreshold: null, isHiddenDayHash: null, documentMousedownProxy: null, constructor: function(n, i, r) { this.calendar = n, this.options = i, this.type = this.name = r, this.nextDayThreshold = e.duration(this.opt("nextDayThreshold")), this.initTheming(), this.initHiddenDays(), this.documentMousedownProxy = t.proxy(this, "documentMousedown"), this.initialize() }, initialize: function() {}, opt: function(e) { var n; return n = this.options[e], void 0 !== n ? n : (n = this.calendar.options[e], t.isPlainObject(n) && !r(e) ? w(n, this.type) : n) }, trigger: function(t, e) { var n = this.calendar; return n.trigger.apply(n, [t, e || this].concat(Array.prototype.slice.call(arguments, 2), [this])) }, setDate: function(t) { this.setRange(this.computeRange(t)) }, setRange: function(e) { t.extend(this, e) }, computeRange: function(t) { var n, i, r = e.duration(this.opt("duration") || this.constructor.duration || { days: 1 }),
                s = b(r),
                o = t.clone().startOf(s),
                l = o.clone().add(r); return D("days", r) ? (o.stripTime(), l.stripTime()) : (o.hasTime() || (o = this.calendar.rezoneDate(o)), l.hasTime() || (l = this.calendar.rezoneDate(l))), n = o.clone(), n = this.skipHiddenDays(n), i = l.clone(), i = this.skipHiddenDays(i, -1, !0), { intervalDuration: r, intervalUnit: s, intervalStart: o, intervalEnd: l, start: n, end: i } }, computePrevDate: function(t) { return this.massageCurrentDate(t.clone().startOf(this.intervalUnit).subtract(this.intervalDuration), -1) }, computeNextDate: function(t) { return this.massageCurrentDate(t.clone().startOf(this.intervalUnit).add(this.intervalDuration)) }, massageCurrentDate: function(t, n) { return this.intervalDuration <= e.duration({ days: 1 }) && this.isHiddenDay(t) && (t = this.skipHiddenDays(t, n), t.startOf("day")), t }, updateTitle: function() { this.title = this.computeTitle() }, computeTitle: function() { return this.formatRange({ start: this.intervalStart, end: this.intervalEnd }, this.opt("titleFormat") || this.computeTitleFormat(), this.opt("titleRangeSeparator")) }, computeTitleFormat: function() { return "year" == this.intervalUnit ? "YYYY" : "month" == this.intervalUnit ? this.opt("monthYearFormat") : this.intervalDuration.as("days") > 1 ? "ll" : "LL" }, formatRange: function(t, e, n) { var i = t.end; return i.hasTime() || (i = i.clone().subtract(1)), j(t.start, i, e, n, this.opt("isRTL")) }, renderView: function() { this.render(), this.updateSize(), this.initializeScroll(), this.trigger("viewRender", this, this, this.el), t(document).on("mousedown", this.documentMousedownProxy) }, render: function() {}, destroyView: function() { this.unselect(), this.destroyViewEvents(), this.destroy(), this.trigger("viewDestroy", this, this, this.el), t(document).off("mousedown", this.documentMousedownProxy) }, destroy: function() { this.el.empty() }, initTheming: function() { var t = this.opt("theme") ? "ui" : "fc";
            this.widgetHeaderClass = t + "-widget-header", this.widgetContentClass = t + "-widget-content", this.highlightStateClass = t + "-state-highlight" }, updateSize: function(t) { t && this.recordScroll(), this.updateHeight(), this.updateWidth() }, updateWidth: function() {}, updateHeight: function() { var t = this.calendar;
            this.setHeight(t.getSuggestedViewHeight(), t.isHeightAuto()) }, setHeight: function() {}, computeScrollerHeight: function(t, e) { var n, i; return e = e || this.scrollerEl, n = this.el.add(e), n.css({ position: "relative", left: -1 }), i = this.el.outerHeight() - e.height(), n.css({ position: "", left: "" }), t - i }, initializeScroll: function() {}, recordScroll: function() { this.scrollerEl && (this.scrollTop = this.scrollerEl.scrollTop()) }, restoreScroll: function() { null !== this.scrollTop && this.scrollerEl.scrollTop(this.scrollTop) }, renderViewEvents: function(t) { this.renderEvents(t), this.eventSegEach(function(t) { this.trigger("eventAfterRender", t.event, t.event, t.el) }), this.trigger("eventAfterAllRender") }, renderEvents: function() {}, destroyViewEvents: function() { this.eventSegEach(function(t) { this.trigger("eventDestroy", t.event, t.event, t.el) }), this.destroyEvents() }, destroyEvents: function() {}, resolveEventEl: function(e, n) { var i = this.trigger("eventRender", e, e, n); return i === !1 ? n = null : i && i !== !0 && (n = t(i)), n }, showEvent: function(t) { this.eventSegEach(function(t) { t.el.css("visibility", "") }, t) }, hideEvent: function(t) { this.eventSegEach(function(t) { t.el.css("visibility", "hidden") }, t) }, eventSegEach: function(t, e) { var n, i = this.getEventSegs(); for (n = 0; i.length > n; n++) e && i[n].event._id !== e._id || t.call(this, i[n]) }, getEventSegs: function() { return [] }, isEventDraggable: function(t) { var e = t.source || {}; return F(t.startEditable, e.startEditable, this.opt("eventStartEditable"), t.editable, e.editable, this.opt("editable")) }, reportEventDrop: function(t, e, n, i) { var r = this.calendar,
                s = r.mutateEvent(t, e),
                o = function() { s.undo(), r.reportEventChange() };
            this.triggerEventDrop(t, s.dateDelta, o, n, i), r.reportEventChange() }, triggerEventDrop: function(t, e, n, i, r) { this.trigger("eventDrop", i[0], t, e, n, r, {}) }, reportExternalDrop: function(e, n, i, r, s) { var o, l, a = e.eventProps;
            a && (o = t.extend({}, a, n), l = this.calendar.renderEvent(o, e.stick)[0]), this.triggerExternalDrop(l, n, i, r, s) }, triggerExternalDrop: function(t, e, n, i, r) { this.trigger("drop", n[0], e.start, i, r), t && this.trigger("eventReceive", null, t) }, renderDrag: function() {}, destroyDrag: function() {}, isEventResizable: function(t) { var e = t.source || {}; return F(t.durationEditable, e.durationEditable, this.opt("eventDurationEditable"), t.editable, e.editable, this.opt("editable")) }, reportEventResize: function(t, e, n, i) { var r = this.calendar,
                s = r.mutateEvent(t, { end: e }),
                o = function() { s.undo(), r.reportEventChange() };
            this.triggerEventResize(t, s.durationDelta, o, n, i), r.reportEventChange() }, triggerEventResize: function(t, e, n, i, r) { this.trigger("eventResize", i[0], t, e, n, r, {}) }, select: function(t, e) { this.unselect(e), this.renderSelection(t), this.reportSelection(t, e) }, renderSelection: function() {}, reportSelection: function(t, e) { this.isSelected = !0, this.trigger("select", null, t.start, t.end, e) }, unselect: function(t) { this.isSelected && (this.isSelected = !1, this.destroySelection(), this.trigger("unselect", null, t)) }, destroySelection: function() {}, documentMousedown: function(e) { var n;
            this.isSelected && this.opt("unselectAuto") && v(e) && (n = this.opt("unselectCancel"), n && t(e.target).closest(n).length || this.unselect(e)) }, initHiddenDays: function() { var e, n = this.opt("hiddenDays") || [],
                i = [],
                r = 0; for (this.opt("weekends") === !1 && n.push(0, 6), e = 0; 7 > e; e++)(i[e] = -1 !== t.inArray(e, n)) || r++; if (!r) throw "invalid hiddenDays";
            this.isHiddenDayHash = i }, isHiddenDay: function(t) { return e.isMoment(t) && (t = t.day()), this.isHiddenDayHash[t] }, skipHiddenDays: function(t, e, n) { var i = t.clone(); for (e = e || 1; this.isHiddenDayHash[(i.day() + (n ? e : 0) + 7) % 7];) i.add(e, "days"); return i }, computeDayRange: function(t) { var e, n = t.start.clone().stripTime(),
                i = t.end,
                r = null; return i && (r = i.clone().stripTime(), e = +i.time(), e && e >= this.nextDayThreshold && r.add(1, "days")), (!i || n >= r) && (r = n.clone().add(1, "days")), { start: n, end: r } }, isMultiDayEvent: function(t) { var e = this.computeDayRange(t); return e.end.diff(e.start, "days") > 1 } });
    De.sourceNormalizers = [], De.sourceFetchers = [];
    var Ke = { dataType: "json", cache: !1 },
        Qe = 1,
        Je = Ce.basic = qe.extend({ dayGrid: null, dayNumbersVisible: !1, weekNumbersVisible: !1, weekNumberWidth: null, headRowEl: null, initialize: function() { this.dayGrid = new $e(this), this.coordMap = this.dayGrid.coordMap }, setRange: function(t) { qe.prototype.setRange.call(this, t), this.dayGrid.breakOnWeeks = /year|month|week/.test(this.intervalUnit), this.dayGrid.setRange(t) }, computeRange: function(t) { var e = qe.prototype.computeRange.call(this, t); return /year|month/.test(e.intervalUnit) && (e.start.startOf("week"), e.start = this.skipHiddenDays(e.start), e.end.weekday() && (e.end.add(1, "week").startOf("week"), e.end = this.skipHiddenDays(e.end, -1, !0))), e }, render: function() { this.dayNumbersVisible = this.dayGrid.rowCnt > 1, this.weekNumbersVisible = this.opt("weekNumbers"), this.dayGrid.numbersVisible = this.dayNumbersVisible || this.weekNumbersVisible, this.el.addClass("fc-basic-view").html(this.renderHtml()), this.headRowEl = this.el.find("thead .fc-row"), this.scrollerEl = this.el.find(".fc-day-grid-container"), this.dayGrid.coordMap.containerEl = this.scrollerEl, this.dayGrid.el = this.el.find(".fc-day-grid"), this.dayGrid.render(this.hasRigidRows()) }, destroy: function() { this.dayGrid.destroy(), qe.prototype.destroy.call(this) }, renderHtml: function() { return '<table><thead><tr><td class="' + this.widgetHeaderClass + '">' + this.dayGrid.headHtml() + "</td>" + "</tr>" + "</thead>" + "<tbody>" + "<tr>" + '<td class="' + this.widgetContentClass + '">' + '<div class="fc-day-grid-container">' + '<div class="fc-day-grid"/>' + "</div>" + "</td>" + "</tr>" + "</tbody>" + "</table>" }, headIntroHtml: function() { return this.weekNumbersVisible ? '<th class="fc-week-number ' + this.widgetHeaderClass + '" ' + this.weekNumberStyleAttr() + ">" + "<span>" + z(this.opt("weekNumberTitle")) + "</span>" + "</th>" : void 0 }, numberIntroHtml: function(t) { return this.weekNumbersVisible ? '<td class="fc-week-number" ' + this.weekNumberStyleAttr() + ">" + "<span>" + this.calendar.calculateWeekNumber(this.dayGrid.getCell(t, 0).start) + "</span>" + "</td>" : void 0 }, dayIntroHtml: function() { return this.weekNumbersVisible ? '<td class="fc-week-number ' + this.widgetContentClass + '" ' + this.weekNumberStyleAttr() + "></td>" : void 0 }, introHtml: function() { return this.weekNumbersVisible ? '<td class="fc-week-number" ' + this.weekNumberStyleAttr() + "></td>" : void 0 }, numberCellHtml: function(t) { var e, n = t.start; return this.dayNumbersVisible ? (e = this.dayGrid.getDayClasses(n), e.unshift("fc-day-number"), '<td class="' + e.join(" ") + '" data-date="' + n.format() + '">' + n.date() + "</td>") : "<td/>" }, weekNumberStyleAttr: function() { return null !== this.weekNumberWidth ? 'style="width:' + this.weekNumberWidth + 'px"' : "" }, hasRigidRows: function() { var t = this.opt("eventLimit"); return t && "number" != typeof t }, updateWidth: function() { this.weekNumbersVisible && (this.weekNumberWidth = h(this.el.find(".fc-week-number"))) }, setHeight: function(t, e) { var n, i = this.opt("eventLimit");
                g(this.scrollerEl), l(this.headRowEl), this.dayGrid.destroySegPopover(), i && "number" == typeof i && this.dayGrid.limitRows(i), n = this.computeScrollerHeight(t), this.setGridHeight(n, e), i && "number" != typeof i && this.dayGrid.limitRows(i), !e && f(this.scrollerEl, n) && (o(this.headRowEl, m(this.scrollerEl)), n = this.computeScrollerHeight(t), this.scrollerEl.height(n), this.restoreScroll()) }, setGridHeight: function(t, e) { e ? c(this.dayGrid.rowEls) : d(this.dayGrid.rowEls, t, !0) }, renderEvents: function(t) { this.dayGrid.renderEvents(t), this.updateHeight() }, getEventSegs: function() { return this.dayGrid.getEventSegs() }, destroyEvents: function() { this.recordScroll(), this.dayGrid.destroyEvents() }, renderDrag: function(t, e) { return this.dayGrid.renderDrag(t, e) }, destroyDrag: function() { this.dayGrid.destroyDrag() }, renderSelection: function(t) { this.dayGrid.renderSelection(t) }, destroySelection: function() { this.dayGrid.destroySelection() } });
    n({ fixedWeekCount: !0 });
    var tn = Ce.month = Je.extend({ computeRange: function(t) { var e, n = Je.prototype.computeRange.call(this, t); return this.isFixedWeeks() && (e = Math.ceil(n.end.diff(n.start, "weeks", !0)), n.end.add(6 - e, "weeks")), n }, setGridHeight: function(t, e) { e = e || "variable" === this.opt("weekMode"), e && (t *= this.rowCnt / 6), d(this.dayGrid.rowEls, t, !e) }, isFixedWeeks: function() { var t = this.opt("weekMode"); return t ? "fixed" === t : this.opt("fixedWeekCount") } });
    tn.duration = { months: 1 }, Ce.basicWeek = { type: "basic", duration: { weeks: 1 } }, Ce.basicDay = { type: "basic", duration: { days: 1 } }, n({ allDaySlot: !0, allDayText: "all-day", scrollTime: "06:00:00", slotDuration: "00:30:00", minTime: "00:00:00", maxTime: "24:00:00", slotEventOverlap: !0 });
    var en = 5;
    Ce.agenda = qe.extend({ timeGrid: null, dayGrid: null, axisWidth: null, noScrollRowEls: null, bottomRuleEl: null, bottomRuleHeight: null, initialize: function() { this.timeGrid = new Ue(this), this.opt("allDaySlot") ? (this.dayGrid = new $e(this), this.coordMap = new Ze([this.dayGrid.coordMap, this.timeGrid.coordMap])) : this.coordMap = this.timeGrid.coordMap }, setRange: function(t) { qe.prototype.setRange.call(this, t), this.timeGrid.setRange(t), this.dayGrid && this.dayGrid.setRange(t) }, render: function() { this.el.addClass("fc-agenda-view").html(this.renderHtml()), this.scrollerEl = this.el.find(".fc-time-grid-container"), this.timeGrid.coordMap.containerEl = this.scrollerEl, this.timeGrid.el = this.el.find(".fc-time-grid"), this.timeGrid.render(), this.bottomRuleEl = t('<hr class="' + this.widgetHeaderClass + '"/>').appendTo(this.timeGrid.el), this.dayGrid && (this.dayGrid.el = this.el.find(".fc-day-grid"), this.dayGrid.render(), this.dayGrid.bottomCoordPadding = this.dayGrid.el.next("hr").outerHeight()), this.noScrollRowEls = this.el.find(".fc-row:not(.fc-scroller *)") }, destroy: function() { this.timeGrid.destroy(), this.dayGrid && this.dayGrid.destroy(), qe.prototype.destroy.call(this) }, renderHtml: function() { return '<table><thead><tr><td class="' + this.widgetHeaderClass + '">' + this.timeGrid.headHtml() + "</td>" + "</tr>" + "</thead>" + "<tbody>" + "<tr>" + '<td class="' + this.widgetContentClass + '">' + (this.dayGrid ? '<div class="fc-day-grid"/><hr class="' + this.widgetHeaderClass + '"/>' : "") + '<div class="fc-time-grid-container">' + '<div class="fc-time-grid"/>' + "</div>" + "</td>" + "</tr>" + "</tbody>" + "</table>" }, headIntroHtml: function() { var t, e, n, i; return this.opt("weekNumbers") ? (t = this.timeGrid.getCell(0).start, e = this.calendar.calculateWeekNumber(t), n = this.opt("weekNumberTitle"), i = this.opt("isRTL") ? e + n : n + e, '<th class="fc-axis fc-week-number ' + this.widgetHeaderClass + '" ' + this.axisStyleAttr() + ">" + "<span>" + z(i) + "</span>" + "</th>") : '<th class="fc-axis ' + this.widgetHeaderClass + '" ' + this.axisStyleAttr() + "></th>" }, dayIntroHtml: function() { return '<td class="fc-axis ' + this.widgetContentClass + '" ' + this.axisStyleAttr() + ">" + "<span>" + (this.opt("allDayHtml") || z(this.opt("allDayText"))) + "</span>" + "</td>" }, slotBgIntroHtml: function() { return '<td class="fc-axis ' + this.widgetContentClass + '" ' + this.axisStyleAttr() + "></td>" }, introHtml: function() { return '<td class="fc-axis" ' + this.axisStyleAttr() + "></td>" }, axisStyleAttr: function() { return null !== this.axisWidth ? 'style="width:' + this.axisWidth + 'px"' : "" }, updateSize: function(t) { t && this.timeGrid.resize(), qe.prototype.updateSize.call(this, t) }, updateWidth: function() { this.axisWidth = h(this.el.find(".fc-axis")) }, setHeight: function(t, e) { var n, i;
            null === this.bottomRuleHeight && (this.bottomRuleHeight = this.bottomRuleEl.outerHeight()), this.bottomRuleEl.hide(), this.scrollerEl.css("overflow", ""), g(this.scrollerEl), l(this.noScrollRowEls), this.dayGrid && (this.dayGrid.destroySegPopover(), n = this.opt("eventLimit"), n && "number" != typeof n && (n = en), n && this.dayGrid.limitRows(n)), e || (i = this.computeScrollerHeight(t), f(this.scrollerEl, i) ? (o(this.noScrollRowEls, m(this.scrollerEl)), i = this.computeScrollerHeight(t), this.scrollerEl.height(i), this.restoreScroll()) : (this.scrollerEl.height(i).css("overflow", "hidden"), this.bottomRuleEl.show())) }, initializeScroll: function() {
            function t() { n.scrollerEl.scrollTop(r) } var n = this,
                i = e.duration(this.opt("scrollTime")),
                r = this.timeGrid.computeTimeTop(i);
            r = Math.ceil(r), r && r++, t(), setTimeout(t, 0) }, renderEvents: function(t) { var e, n, i = [],
                r = [],
                s = []; for (n = 0; t.length > n; n++) t[n].allDay ? i.push(t[n]) : r.push(t[n]);
            e = this.timeGrid.renderEvents(r), this.dayGrid && (s = this.dayGrid.renderEvents(i)), this.updateHeight() }, getEventSegs: function() { return this.timeGrid.getEventSegs().concat(this.dayGrid ? this.dayGrid.getEventSegs() : []) }, destroyEvents: function() { this.recordScroll(), this.timeGrid.destroyEvents(), this.dayGrid && this.dayGrid.destroyEvents() }, renderDrag: function(t, e) { return t.start.hasTime() ? this.timeGrid.renderDrag(t, e) : this.dayGrid ? this.dayGrid.renderDrag(t, e) : void 0 }, destroyDrag: function() { this.timeGrid.destroyDrag(), this.dayGrid && this.dayGrid.destroyDrag() }, renderSelection: function(t) { t.start.hasTime() || t.end.hasTime() ? this.timeGrid.renderSelection(t) : this.dayGrid && this.dayGrid.renderSelection(t) }, destroySelection: function() { this.timeGrid.destroySelection(), this.dayGrid && this.dayGrid.destroySelection() } }), Ce.agendaWeek = { type: "agenda", duration: { weeks: 1 } }, Ce.agendaDay = { type: "agenda", duration: { days: 1 } }
});