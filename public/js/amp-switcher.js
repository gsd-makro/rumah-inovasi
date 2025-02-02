(() => {
  var e = {};
  (e.g = (function () {
    if ("object" == typeof globalThis) return globalThis;
    try {
      return this || new Function("return this")();
    } catch (e) {
      if ("object" == typeof window) return window;
    }
  })()),
    (function (n) {
      let {
        ampUrl: t,
        isCustomizePreview: r,
        isAmpDevMode: o,
        noampQueryVarName: s,
        noampQueryVarValue: i,
        disabledStorageKey: a,
        mobileUserAgents: c,
        regexRegex: d,
      } = n;
      if ("undefined" == typeof sessionStorage) return;
      const g = new RegExp(d);
      if (
        !c.some((e) => {
          const n = e.match(g);
          return (
            !(!n || !new RegExp(n[1], n[2]).test(navigator.userAgent)) ||
            navigator.userAgent.includes(e)
          );
        })
      )
        return;
      e.g.addEventListener("DOMContentLoaded", () => {
        const e = document.getElementById("amp-mobile-version-switcher");
        if (!e) return;
        e.hidden = !1;
        const n = e.querySelector("a[href]");
        n &&
          n.addEventListener("click", () => {
            sessionStorage.removeItem(a);
          });
      });
      const u =
        o &&
        ["paired-browsing-non-amp", "paired-browsing-amp"].includes(
          window.name
        );
      if (sessionStorage.getItem(a) || r || u) return;
      const m = new URL(location.href),
        h = new URL(t);
      (h.hash = m.hash),
        m.searchParams.has(s) && i === m.searchParams.get(s)
          ? sessionStorage.setItem(a, "1")
          : h.href !== m.href && (window.stop(), location.replace(h.href));
    })({
      ampUrl: "https://demo.bootstrap.news/default/amp/",
      noampQueryVarName: "noamp",
      noampQueryVarValue: "mobile",
      disabledStorageKey: "amp_mobile_redirect_disabled",
      mobileUserAgents: [
        "Mobile",
        "Android",
        "Silk/",
        "Kindle",
        "BlackBerry",
        "Opera Mini",
        "Opera Mobi",
      ],
      regexRegex: "^\\/((?:.|\n)+)\\/([i]*)$",
      isCustomizePreview: false,
      isAmpDevMode: false,
    });
})();
