(function (a) { a.fn.highchartTable = function () { var d = ["column", "line", "area", "spline", "pie"]; var e = function (l, k) { var m = a(l).data(k); if (typeof m != "undefined") { var h = m.split("."); var f = window[h[0]]; for (var g = 1, j = h.length; g < j; g++) { f = f[h[g]] } return f } }; this.each(function () { var z = a(this); var X = a(z); var U = 1; var q = a("caption", z); var S = q.length ? a(q[0]).text() : ""; var Q; if (X.data("graph-container-before") != 1) { var V = X.data("graph-container"); if (!V) { throw "graph-container data attribute is mandatory" } if (V[0] === "#" || V.indexOf("..") === -1) { Q = a(V) } else { var B = z; var u = V; while (u.indexOf("..") !== -1) { u = u.replace(/^.. /, ""); B = B.parent() } Q = a(u, B) } if (Q.length !== 1) { throw "graph-container is not available in this DOM or available multiple times" } Q = Q[0] } else { X.before("<div></div>"); Q = X.prev(); Q = Q[0] } var L = X.data("graph-type"); if (!L) { throw "graph-type data attribute is mandatory" } if (a.inArray(L, d) == -1) { throw "graph-container data attribute must be one of " + d.join(", ") } var g = X.data("graph-stacking"); if (!g) { g = "normal" } var o = X.data("graph-datalabels-enabled"); var P = X.data("graph-inverted") == 1; var A = a("thead th", z); var s = []; var C = []; var I = 0; var H = false; A.each(function (ae, Y) { var ah = a(Y); var aa = ah.data("graph-value-scale"); var ad = ah.data("graph-type"); if (a.inArray(ad, d) == -1) { ad = L } var i = ah.data("graph-stack-group"); if (i) { H = true } var ab = ah.data("graph-datalabels-enabled"); if (typeof ab == "undefined") { ab = o } var ac = ah.data("graph-yaxis"); if (typeof ac != "undefined" && ac == "1") { U = 2 } var ag = ah.data("graph-skip") == 1; if (ag) { I = I + 1 } var Z = { libelle: ah.text(), skip: ag, indexTd: ae - I - 1, color: ah.data("graph-color"), visible: !ah.data("graph-hidden"), yAxis: typeof ac != "undefined" ? ac : 0, dashStyle: ah.data("graph-dash-style") || "solid", dataLabelsEnabled: ab == 1, dataLabelsColor: ah.data("graph-datalabels-color") || X.data("graph-datalabels-color") }; var af = ah.data("graph-vline-x"); if (typeof af == "undefined") { Z.scale = typeof aa != "undefined" ? parseFloat(aa) : 1; Z.graphType = ad == "column" && P ? "bar" : ad; Z.stack = i; Z.unit = ah.data("graph-unit"); s[ae] = Z } else { Z.x = af; Z.height = ah.data("graph-vline-height"); Z.name = ah.data("graph-vline-name"); C[ae] = Z } }); var p = []; a(s).each(function (Y, Z) { if (Y != 0 && !Z.skip) { var aa = { name: Z.libelle + (Z.unit ? " (" + Z.unit + ")" : ""), data: [], type: Z.graphType, stack: Z.stack, color: Z.color, visible: Z.visible, yAxis: Z.yAxis, dashStyle: Z.dashStyle, marker: { enabled: false }, dataLabels: { enabled: Z.dataLabelsEnabled, color: Z.dataLabelsColor, align: X.data("graph-datalabels-align") || (L == "column" && P == 1 ? undefined : "center") } }; if (Z.dataLabelsEnabled) { var i = e(z, "graph-datalabels-formatter"); if (i) { aa.dataLabels.formatter = function () { return i(this.y) } } } p.push(aa) } }); a(C).each(function (i, Y) { if (typeof Y != "undefined" && !Y.skip) { p.push({ name: Y.libelle, data: [{ x: Y.x, y: 0, name: Y.name }, { x: Y.x, y: Y.height, name: Y.name }], type: "spline", color: Y.color, visible: Y.visible, marker: { enabled: false } }) } }); var J = []; var h = e(z, "graph-point-callback"); var O = X.data("graph-xaxis-type") == "datetime"; var T = a("tbody:first tr", z); T.each(function (Y, Z) { if (!!a(Z).data("graph-skip")) { return } var i = a("td", Z); i.each(function (aa, ag) { var an; var ah = s[aa]; if (ah.skip) { return } var ab = a(ag); if (aa == 0) { an = ab.text(); J.push(an) } else { var al = ab.text(); var aj = p[ah.indexTd]; if (al.length == 0) { if (!O) { aj.data.push(null) } } else { var ac = al.replace(/\s/g, "").replace(/,/, "."); var af = { value: ac, rawValue: al, td: ab, tr: a(Z), indexTd: aa, indexTr: Y }; X.trigger("highchartTable.cleanValue", af); an = Math.round(parseFloat(af.value) * ah.scale * 100) / 100; var am = ab.data("graph-x"); if (O) { am = a("td", a(Z)).first().text(); var ae = c(am); am = ae.getTime() - ae.getTimezoneOffset() * 60 * 1000 } var ai = ab.data("graph-name"); var ad = { name: typeof ai != "undefined" ? ai : al, y: an, x: am }; if (h) { ad.events = { click: function () { return h(this) } } } if (ah.graphType === "pie") { if (ab.data("graph-item-highlight")) { ad.sliced = 1 } } var ak = ab.data("graph-item-color"); if (typeof ak != "undefined") { ad.color = ak } aj.data.push(ad) } } }) }); var x = function (Y, aa, i) { var Z = Y.data("graph-yaxis-" + aa + "-" + i); if (typeof Z != "undefined") { return Z } return Y.data("graph-yaxis" + aa + "-" + i) }; var n = []; var G; for (G = 1; G <= U; G++) { var l = { title: { text: typeof x(X, G, "title-text") != "undefined" ? x(X, G, "title-text") : null }, max: typeof x(X, G, "max") != "undefined" ? x(X, G, "max") : null, min: typeof x(X, G, "min") != "undefined" ? x(X, G, "min") : null, reversed: x(X, G, "reversed") == "1", opposite: x(X, G, "opposite") == "1", tickInterval: x(X, G, "tick-interval") || null, labels: { rotation: x(X, G, "rotation") || 0 }, startOnTick: x(X, G, "start-on-tick") != "0", endOnTick: x(X, G, "end-on-tick") != "0", stackLabels: { enabled: x(X, G, "stacklabels-enabled") == "1" }, gridLineInterpolation: x(X, G, "grid-line-interpolation") || null }; var N = e(z, "graph-yaxis-" + G + "-formatter-callback"); if (!N) { N = e(z, "graph-yaxis" + G + "-formatter-callback") } if (N) { l.labels.formatter = function () { return N(this.value) } } n.push(l) } var k = ["#4572A7", "#AA4643", "#89A54E", "#80699B", "#3D96AE", "#DB843D", "#92A8CD", "#A47D7C", "#B5CA92"]; var M = []; var w = typeof Highcharts.theme != "undefined" && typeof Highcharts.theme.colors != "undefined" ? Highcharts.theme.colors : []; var m = X.data("graph-line-shadow"); var y = X.data("graph-line-width") || 2; var t = Math.max(k.length, w.length); for (var R = 0; R < t; R++) { var F = "graph-color-" + (R + 1); M.push(typeof X.data(F) != "undefined" ? X.data(F) : typeof w[R] != "undefined" ? w[R] : k[R]) } var K = X.data("graph-margin-top"); var W = X.data("graph-margin-right"); var D = X.data("graph-margin-bottom"); var r = X.data("graph-margin-left"); var E = X.data("graph-xaxis-labels-enabled"); var j = {}; var v = X.data("graph-xaxis-labels-font-size"); if (typeof v != "undefined") { j.fontSize = v } var f = { colors: M, chart: { renderTo: Q, inverted: P, marginTop: typeof K != "undefined" ? K : null, marginRight: typeof W != "undefined" ? W : null, marginBottom: typeof D != "undefined" ? D : null, marginLeft: typeof r != "undefined" ? r : null, spacingTop: X.data("graph-spacing-top") || 10, height: X.data("graph-height") || null, zoomType: X.data("graph-zoom-type") || null, polar: X.data("graph-polar") || null }, title: { text: S }, subtitle: { text: X.data("graph-subtitle-text") || "" }, legend: { enabled: X.data("graph-legend-disabled") != "1", layout: X.data("graph-legend-layout") || "horizontal", symbolWidth: X.data("graph-legend-width") || 30, x: X.data("graph-legend-x") || 15, y: X.data("graph-legend-y") || 0 }, xAxis: { categories: (X.data("graph-xaxis-type") != "datetime") ? J : undefined, type: (X.data("graph-xaxis-type") == "datetime") ? "datetime" : undefined, reversed: X.data("graph-xaxis-reversed") == "1", opposite: X.data("graph-xaxis-opposite") == "1", showLastLabel: typeof X.data("graph-xaxis-show-last-label") != "undefined" ? X.data("graph-xaxis-show-last-label") : true, tickInterval: X.data("graph-xaxis-tick-interval") || null, dateTimeLabelFormats: { second: "%e. %b", minute: "%e. %b", hour: "%e. %b", day: "%e. %b", week: "%e. %b", month: "%e. %b", year: "%e. %b" }, labels: { rotation: X.data("graph-xaxis-rotation") || undefined, align: X.data("graph-xaxis-align") || undefined, enabled: typeof E != "undefined" ? E : true, style: j }, startOnTick: X.data("graph-xaxis-start-on-tick"), endOnTick: X.data("graph-xaxis-end-on-tick"), min: b(z, "min"), max: b(z, "max"), alternateGridColor: X.data("graph-xaxis-alternateGridColor") || null, title: { text: X.data("graph-xaxis-title-text") || null }, gridLineWidth: X.data("graph-xaxis-gridLine-width") || 0, gridLineDashStyle: X.data("graph-xaxis-gridLine-style") || "ShortDot", tickmarkPlacement: X.data("graph-xaxis-tickmark-placement") || "between", lineWidth: X.data("graph-xaxis-line-width") || 0 }, yAxis: n, tooltip: { formatter: function () { if (X.data("graph-xaxis-type") == "datetime") { return "<b>" + this.series.name + "</b><br/>" + Highcharts.dateFormat("%e. %b", this.x) + " : " + this.y } else { var i = typeof J[this.point.x] != "undefined" ? J[this.point.x] : this.point.x; if (L === "pie") { return "<strong>" + this.series.name + "</strong><br />" + i + " : " + this.point.y } return "<strong>" + this.series.name + "</strong><br />" + i + " : " + this.point.name } } }, credits: { enabled: false }, plotOptions: { line: { dataLabels: { enabled: true }, lineWidth: y }, area: { lineWidth: y, shadow: typeof m != "undefined" ? m : true, fillOpacity: X.data("graph-area-fillOpacity") || 0.75 }, pie: { allowPointSelect: true, dataLabels: { enabled: true }, showInLegend: X.data("graph-pie-show-in-legend") == "1", size: "80%" }, series: { animation: false, stickyTracking: false, stacking: H ? g : null, groupPadding: X.data("graph-group-padding") || 0 } }, series: p, exporting: { filename: S.replace(/ /g, "_"), buttons: { exportButton: { menuItems: null, onclick: function () { this.exportChart() } } } } }; X.trigger("highchartTable.beforeRender", f); new Highcharts.Chart(f) }); return this }; var b = function (f, d) { var g = a(f).data("graph-xaxis-" + d); if (typeof g != "undefined") { if (a(f).data("graph-xaxis-type") == "datetime") { var e = c(g); return e.getTime() - e.getTimezoneOffset() * 60 * 1000 } return g } return null }; var c = function (i) { var f = i.split(" "); var h = f[0].split("-"); var g = null; var e = null; if (f[1]) { var d = f[1].split(":"); g = parseInt(d[0], 10); e = parseInt(d[1], 10) } return new Date(parseInt(h[0], 10), parseInt(h[1], 10) - 1, parseInt(h[2], 10), g, e) } })(jQuery);