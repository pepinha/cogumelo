/*! modernizr 3.3.1 (Custom Build) | MIT *
 * http://modernizr.com/download/?-applicationcache-cookies-csscalc-csspointerevents-cssresize-csstransforms-csstransforms3d-csstransitions-cssvhunit-cssvwunit-customevent-ellipsis-emoji-eventlistener-flash-forcetouch-fullscreen-gamepads-geolocation-hashchange-hiddenscroll-ie8compat-overflowscrolling-pointerevents-progressbar_meter-touchevents-userdata-video-hasevent-mq-prefixes-setclasses-shiv !*/
!function(e,t,n){function r(e,t){return typeof e===t}function o(){var e,t,n,o,i,a,s;for(var c in C)if(C.hasOwnProperty(c)){if(e=[],t=C[c],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(o=r(t.fn,"function")?t.fn():t.fn,i=0;i<e.length;i++)a=e[i],s=a.split("."),1===s.length?Modernizr[s[0]]=o:(!Modernizr[s[0]]||Modernizr[s[0]]instanceof Boolean||(Modernizr[s[0]]=new Boolean(Modernizr[s[0]])),Modernizr[s[0]][s[1]]=o),T.push((o?"":"no-")+s.join("-"))}}function i(e){var t=b.className,n=Modernizr._config.classPrefix||"";if(E&&(t=t.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(r,"$1"+n+"js$2")}Modernizr._config.enableClasses&&(t+=" "+n+e.join(" "+n),E?b.className.baseVal=t:b.className=t)}function a(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):E?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function s(){var e=t.body;return e||(e=a(E?"svg":"body"),e.fake=!0),e}function c(e,n,r,o){var i,c,l,d,u="modernizr",f=a("div"),p=s();if(parseInt(r,10))for(;r--;)l=a("div"),l.id=o?o[r]:u+(r+1),f.appendChild(l);return i=a("style"),i.type="text/css",i.id="s"+u,(p.fake?p:f).appendChild(i),p.appendChild(f),i.styleSheet?i.styleSheet.cssText=e:i.appendChild(t.createTextNode(e)),f.id=u,p.fake&&(p.style.background="",p.style.overflow="hidden",d=b.style.overflow,b.style.overflow="hidden",b.appendChild(p)),c=n(f,e),p.fake?(p.parentNode.removeChild(p),b.style.overflow=d,b.offsetHeight):f.parentNode.removeChild(f),!!c}function l(e,t){if("object"==typeof e)for(var n in e)N(e,n)&&l(n,e[n]);else{e=e.toLowerCase();var r=e.split("."),o=Modernizr[r[0]];if(2==r.length&&(o=o[r[1]]),"undefined"!=typeof o)return Modernizr;t="function"==typeof t?t():t,1==r.length?Modernizr[r[0]]=t:(!Modernizr[r[0]]||Modernizr[r[0]]instanceof Boolean||(Modernizr[r[0]]=new Boolean(Modernizr[r[0]])),Modernizr[r[0]][r[1]]=t),i([(t&&0!=t?"":"no-")+r.join("-")]),Modernizr._trigger(e,t)}return Modernizr}function d(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function u(e,t){return!!~(""+e).indexOf(t)}function f(e,t){return function(){return e.apply(t,arguments)}}function p(e,t,n){var o;for(var i in e)if(e[i]in t)return n===!1?e[i]:(o=t[e[i]],r(o,"function")?f(o,n||t):o);return!1}function h(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function v(t,r){var o=t.length;if("CSS"in e&&"supports"in e.CSS){for(;o--;)if(e.CSS.supports(h(t[o]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var i=[];o--;)i.push("("+h(t[o])+":"+r+")");return i=i.join(" or "),c("@supports ("+i+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return n}function m(e,t,o,i){function s(){l&&(delete L.style,delete L.modElem)}if(i=r(i,"undefined")?!1:i,!r(o,"undefined")){var c=v(e,o);if(!r(c,"undefined"))return c}for(var l,f,p,h,m,g=["modernizr","tspan"];!L.style;)l=!0,L.modElem=a(g.shift()),L.style=L.modElem.style;for(p=e.length,f=0;p>f;f++)if(h=e[f],m=L.style[h],u(h,"-")&&(h=d(h)),L.style[h]!==n){if(i||r(o,"undefined"))return s(),"pfx"==t?h:!0;try{L.style[h]=o}catch(y){}if(L.style[h]!=m)return s(),"pfx"==t?h:!0}return s(),!1}function g(e,t,n,o,i){var a=e.charAt(0).toUpperCase()+e.slice(1),s=(e+" "+O.join(a+" ")+a).split(" ");return r(t,"string")||r(t,"undefined")?m(s,t,o,i):(s=(e+" "+M.join(a+" ")+a).split(" "),p(s,t,n))}function y(e,t,r){return g(e,n,n,t,r)}var T=[],C=[],x={_version:"3.3.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){C.push({name:e,fn:t,options:n})},addAsyncTest:function(e){C.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=x,Modernizr=new Modernizr,Modernizr.addTest("applicationcache","applicationCache"in e),Modernizr.addTest("cookies",function(){try{t.cookie="cookietest=1";var e=-1!=t.cookie.indexOf("cookietest=");return t.cookie="cookietest=1; expires=Thu, 01-Jan-1970 00:00:01 GMT",e}catch(n){return!1}}),Modernizr.addTest("customevent","CustomEvent"in e&&"function"==typeof e.CustomEvent),Modernizr.addTest("eventlistener","addEventListener"in e),Modernizr.addTest("geolocation","geolocation"in navigator),Modernizr.addTest("ie8compat",!e.addEventListener&&!!t.documentMode&&7===t.documentMode);var w=x._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):[];x._prefixes=w;var b=t.documentElement,E="svg"===b.nodeName.toLowerCase();E||!function(e,t){function n(e,t){var n=e.createElement("p"),r=e.getElementsByTagName("head")[0]||e.documentElement;return n.innerHTML="x<style>"+t+"</style>",r.insertBefore(n.lastChild,r.firstChild)}function r(){var e=T.elements;return"string"==typeof e?e.split(" "):e}function o(e,t){var n=T.elements;"string"!=typeof n&&(n=n.join(" ")),"string"!=typeof e&&(e=e.join(" ")),T.elements=n+" "+e,l(t)}function i(e){var t=y[e[m]];return t||(t={},g++,e[m]=g,y[g]=t),t}function a(e,n,r){if(n||(n=t),u)return n.createElement(e);r||(r=i(n));var o;return o=r.cache[e]?r.cache[e].cloneNode():v.test(e)?(r.cache[e]=r.createElem(e)).cloneNode():r.createElem(e),!o.canHaveChildren||h.test(e)||o.tagUrn?o:r.frag.appendChild(o)}function s(e,n){if(e||(e=t),u)return e.createDocumentFragment();n=n||i(e);for(var o=n.frag.cloneNode(),a=0,s=r(),c=s.length;c>a;a++)o.createElement(s[a]);return o}function c(e,t){t.cache||(t.cache={},t.createElem=e.createElement,t.createFrag=e.createDocumentFragment,t.frag=t.createFrag()),e.createElement=function(n){return T.shivMethods?a(n,e,t):t.createElem(n)},e.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+r().join().replace(/[\w\-:]+/g,function(e){return t.createElem(e),t.frag.createElement(e),'c("'+e+'")'})+");return n}")(T,t.frag)}function l(e){e||(e=t);var r=i(e);return!T.shivCSS||d||r.hasCSS||(r.hasCSS=!!n(e,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),u||c(e,r),e}var d,u,f="3.7.3",p=e.html5||{},h=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,v=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,m="_html5shiv",g=0,y={};!function(){try{var e=t.createElement("a");e.innerHTML="<xyz></xyz>",d="hidden"in e,u=1==e.childNodes.length||function(){t.createElement("a");var e=t.createDocumentFragment();return"undefined"==typeof e.cloneNode||"undefined"==typeof e.createDocumentFragment||"undefined"==typeof e.createElement}()}catch(n){d=!0,u=!0}}();var T={elements:p.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",version:f,shivCSS:p.shivCSS!==!1,supportsUnknownElements:u,shivMethods:p.shivMethods!==!1,type:"default",shivDocument:l,createElement:a,createDocumentFragment:s,addElements:o};e.html5=T,l(t),"object"==typeof module&&module.exports&&(module.exports=T)}("undefined"!=typeof e?e:this,t);var S=function(){function e(e,t){var o;return e?(t&&"string"!=typeof t||(t=a(t||"div")),e="on"+e,o=e in t,!o&&r&&(t.setAttribute||(t=a("div")),t.setAttribute(e,""),o="function"==typeof t[e],t[e]!==n&&(t[e]=n),t.removeAttribute(e)),o):!1}var r=!("onblur"in t.documentElement);return e}();x.hasEvent=S,Modernizr.addTest("hashchange",function(){return S("hashchange",e)===!1?!1:t.documentMode===n||t.documentMode>7}),Modernizr.addTest("userdata",!!a("div").addBehavior),Modernizr.addTest("video",function(){var e=a("video"),t=!1;try{(t=!!e.canPlayType)&&(t=new Boolean(t),t.ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),t.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),t.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""),t.vp9=e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/,""),t.hls=e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/,""))}catch(n){}return t}),Modernizr.addTest("csscalc",function(){var e="width:",t="calc(10px);",n=a("a");return n.style.cssText=e+w.join(t+e),!!n.style.length}),Modernizr.addTest("csspointerevents",function(){var e=a("a").style;return e.cssText="pointer-events:auto","auto"===e.pointerEvents}),Modernizr.addTest("progressbar",a("progress").max!==n),Modernizr.addTest("meter",a("meter").max!==n);var _=function(){var t=e.matchMedia||e.msMatchMedia;return t?function(e){var n=t(e);return n&&n.matches||!1}:function(t){var n=!1;return c("@media "+t+" { #modernizr { position: absolute; } }",function(t){n="absolute"==(e.getComputedStyle?e.getComputedStyle(t,null):t.currentStyle).position}),n}}();x.mq=_;var k=x.testStyles=c;Modernizr.addTest("hiddenscroll",function(){return k("#modernizr {width:100px;height:100px;overflow:scroll}",function(e){return e.offsetWidth===e.clientWidth})}),Modernizr.addTest("touchevents",function(){var n;if("ontouchstart"in e||e.DocumentTouch&&t instanceof DocumentTouch)n=!0;else{var r=["@media (",w.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");k(r,function(e){n=9===e.offsetTop})}return n}),k("#modernizr { height: 50vh; }",function(t){var n=parseInt(e.innerHeight/2,10),r=parseInt((e.getComputedStyle?getComputedStyle(t,null):t.currentStyle).height,10);Modernizr.addTest("cssvhunit",r==n)}),k("#modernizr { width: 50vw; }",function(t){var n=parseInt(e.innerWidth/2,10),r=parseInt((e.getComputedStyle?getComputedStyle(t,null):t.currentStyle).width,10);Modernizr.addTest("cssvwunit",r==n)});var P="CSS"in e&&"supports"in e.CSS,z="supportsCSS"in e;Modernizr.addTest("supports",P||z),Modernizr.addTest("canvas",function(){var e=a("canvas");return!(!e.getContext||!e.getContext("2d"))}),Modernizr.addTest("canvastext",function(){return Modernizr.canvas===!1?!1:"function"==typeof a("canvas").getContext("2d").fillText}),Modernizr.addTest("emoji",function(){if(!Modernizr.canvastext)return!1;var t=e.devicePixelRatio||1,n=12*t,r=a("canvas"),o=r.getContext("2d");return o.fillStyle="#f00",o.textBaseline="top",o.font="32px Arial",o.fillText("🐨",0,0),0!==o.getImageData(n,n,1,1).data[0]});var N;!function(){var e={}.hasOwnProperty;N=r(e,"undefined")||r(e.call,"undefined")?function(e,t){return t in e&&r(e.constructor.prototype[t],"undefined")}:function(t,n){return e.call(t,n)}}(),x._l={},x.on=function(e,t){this._l[e]||(this._l[e]=[]),this._l[e].push(t),Modernizr.hasOwnProperty(e)&&setTimeout(function(){Modernizr._trigger(e,Modernizr[e])},0)},x._trigger=function(e,t){if(this._l[e]){var n=this._l[e];setTimeout(function(){var e,r;for(e=0;e<n.length;e++)(r=n[e])(t)},0),delete this._l[e]}},Modernizr._q.push(function(){x.addTest=l}),Modernizr.addAsyncTest(function(){var n,r,o=function(e){b.contains(e)||b.appendChild(e)},i=function(e){e.fake&&e.parentNode&&e.parentNode.removeChild(e)},c=function(e,t){var n=!!e;if(n&&(n=new Boolean(n),n.blocked="blocked"===e),l("flash",function(){return n}),t&&h.contains(t)){for(;t.parentNode!==h;)t=t.parentNode;h.removeChild(t)}};try{r="ActiveXObject"in e&&"Pan"in new e.ActiveXObject("ShockwaveFlash.ShockwaveFlash")}catch(d){}if(n=!("plugins"in navigator&&"Shockwave Flash"in navigator.plugins||r),n||E)c(!1);else{var u,f,p=a("embed"),h=s();if(p.type="application/x-shockwave-flash",h.appendChild(p),!("Pan"in p||r))return o(h),c("blocked",p),void i(h);u=function(){return o(h),b.contains(h)?(b.contains(p)?(f=p.style.cssText,""!==f?c("blocked",p):c(!0,p)):c("blocked"),void i(h)):(h=t.body||h,p=a("embed"),p.type="application/x-shockwave-flash",h.appendChild(p),setTimeout(u,1e3))},setTimeout(u,10)}});var j="Moz O ms Webkit",M=x._config.usePrefixes?j.toLowerCase().split(" "):[];x._domPrefixes=M,Modernizr.addTest("pointerevents",function(){var e=!1,t=M.length;for(e=Modernizr.hasEvent("pointerdown");t--&&!e;)S(M[t]+"pointerdown")&&(e=!0);return e});var O=x._config.usePrefixes?j.split(" "):[];x._cssomPrefixes=O;var F=function(t){var r,o=w.length,i=e.CSSRule;if("undefined"==typeof i)return n;if(!t)return!1;if(t=t.replace(/^@/,""),r=t.replace(/-/g,"_").toUpperCase()+"_RULE",r in i)return"@"+t;for(var a=0;o>a;a++){var s=w[a],c=s.toUpperCase()+"_"+r;if(c in i)return"@-"+s.toLowerCase()+"-"+t}return!1};x.atRule=F;var A={elem:a("modernizr")};Modernizr._q.push(function(){delete A.elem});var L={style:A.elem.style};Modernizr._q.unshift(function(){delete L.style}),x.testAllProps=g;var B=x.prefixed=function(e,t,n){return 0===e.indexOf("@")?F(e):(-1!=e.indexOf("-")&&(e=d(e)),t?g(e,t,n):g(e,"pfx"))};Modernizr.addTest("forcetouch",function(){return S(B("mouseforcewillbegin",e,!1),e)?MouseEvent.WEBKIT_FORCE_AT_MOUSE_DOWN&&MouseEvent.WEBKIT_FORCE_AT_FORCE_MOUSE_DOWN:!1}),Modernizr.addTest("fullscreen",!(!B("exitFullscreen",t,!1)&&!B("cancelFullScreen",t,!1))),Modernizr.addTest("gamepads",!!B("getGamepads",navigator)),x.testAllProps=y,Modernizr.addTest("ellipsis",y("textOverflow","ellipsis")),Modernizr.addTest("overflowscrolling",y("overflowScrolling","touch",!0)),Modernizr.addTest("cssresize",y("resize","both",!0)),Modernizr.addTest("csstransforms",function(){return-1===navigator.userAgent.indexOf("Android 2.")&&y("transform","scale(1)",!0)}),Modernizr.addTest("csstransforms3d",function(){var e=!!y("perspective","1px",!0),t=Modernizr._config.usePrefixes;if(e&&(!t||"webkitPerspective"in b.style)){var n,r="#modernizr{width:0;height:0}";Modernizr.supports?n="@supports (perspective: 1px)":(n="@media (transform-3d)",t&&(n+=",(-webkit-transform-3d)")),n+="{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}",k(r+n,function(t){e=7===t.offsetWidth&&18===t.offsetHeight})}return e}),Modernizr.addTest("csstransitions",y("transition","all",!0)),o(),i(T),delete x.addTest,delete x.addAsyncTest;for(var D=0;D<Modernizr._q.length;D++)Modernizr._q[D]();e.Modernizr=Modernizr}(window,document);
