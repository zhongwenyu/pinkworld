!function(){function t(t,e){e=e||window;var n=g(e);return x(n,e),b(n,function(e,n,r){return null!=e.Array?void t(e):(n.open("text/html","replace")._M_=function(){r&&(this.domain=r),e=this.defaultView||this.parentWindow,t(e)},n.write(S+'<body onload="document._M_();"></body>'+E),void n.close())}),n}function e(e,n){if(n=n||window,u||!e){var r=u||n;return e&&e(r),r}t(function(t){u=t,e(t)},n)}function n(t,e,n){if(W[t])return W[t];var r=new X(t,e,n);return W[t]=r,r}function r(t,e){e&&"0"!==e&&(t.MtaH5=t.MtaH5||{},MtaH5.hack=function(){return{conf:{sid:e,senseHash:!0,autoReport:!0,performanceMonitor:!1}}},function(t,e){function n(t){return t=window.localStorage?localStorage.getItem(t)||sessionStorage.getItem(t):(t=document.cookie.match(new RegExp("(?:^|;\\s)"+t+"=(.*?)(?:;\\s|$)")))?t[1]:""}function r(t,e,n){if(window.localStorage)n?localStorage.setItem(t,e):sessionStorage.setItem(t,e);else{var r=window.location.host,i={"com.cn":1,"js.cn":1,"net.cn":1,"gov.cn":1,"com.hk":1,"co.nz":1},o=r.split(".");2<o.length&&(r=(i[o.slice(-2).join(".")]?o.slice(-3):o.slice(-2)).join(".")),document.cookie=t+"="+e+";path=/;domain="+r+(n?";expires="+n:"")}}function i(t){var e,n,r,i={};if(void 0===t?(r=window.location,t=r.host,e=r.pathname,n=r.search.substr(1),r=r.hash):(r=t.match(/\w+:\/\/((?:[\w-]+\.)+\w+)(?:\:\d+)?(\/[^\?\\\"\'\|\:<>]*)?(?:\?([^\'\"\\<>#]*))?(?:#(\w+))?/i)||[],t=r[1],e=r[2],n=r[3],r=r[4]),void 0!==r&&(r=r.replace(/\"|\'|\<|\>/gi,"M")),n)for(var o=n.split("&"),a=0,s=o.length;a<s;a++)if(-1!=o[a].indexOf("=")){var c=o[a].indexOf("="),u=o[a].slice(0,c),c=o[a].slice(c+1);i[u]=c}return{host:t,path:e,search:n,hash:r,param:i}}function o(t){return(t||"")+Math.round(2147483647*(Math.random()||.5))*+new Date%1e10}function a(){var e=i(),a={dm:e.host,pvi:"",si:"",url:e.path,arg:encodeURIComponent(e.search||""),ty:1};return a.pvi=function(){var t=n("pgv_pvi");return t||(a.ty=0,t=o(),r("pgv_pvi",t,"Sun, 18 Jan 2038 00:00:00 GMT;")),t}(),a.si=function(){var t=n("pgv_si");return t||(t=o("s"),r("pgv_si",t)),t}(),a.url=function(){var n=e.path;return t.senseHash&&(n=e.hash?n+e.hash.replace(/#/i,"_"):n),n}(),a}function s(){var t=i(document.referrer),e=i();return{rdm:t.host,rurl:t.path,rarg:encodeURIComponent(t.search||""),adt:e.param.ADTAG||e.param.adtag||e.param.CKTAG||e.param.cktag||e.param.PTAG||e.param.ptag}}function c(){try{var t=navigator,e=screen||{width:"",height:"",colorDepth:""},n={scr:e.width+"x"+e.height,scl:e.colorDepth+"-bit",lg:(t.language||t.userLanguage).toLowerCase(),tz:(new Date).getTimezoneOffset()/60}}catch(t){return{}}return n}function u(e){e=e||{};for(var n in e)e.hasOwnProperty(n)&&(t[n]=e[n]);if(t.sid){var r=[];e=0;for(var i=[a(),s(),{r2:t.sid},c(),{random:+new Date}],o=i.length;e<o;e++)for(n in i[e])i[e].hasOwnProperty(n)&&r.push(n+"="+(i[e][n]||""));var u=function(e){e=Ta.src=("https:"==document.location.protocol?"https://pingtas":"http://pingtcss")+".qq.com/pingd?"+e.join("&");var n=new Image;Ta[t.sid]=n,n.onload=n.onerror=n.onabort=function(){n=n.onload=n.onerror=n.onabort=null,Ta[t.sid]=!0},n.src=e};t.performanceMonitor?(n=function(){var t;if(window.performance){t=window.performance.timing;var e={value:t.domainLookupEnd-t.domainLookupStart},n={value:t.connectEnd-t.connectStart},i={value:t.responseStart-(t.requestStart||t.responseStart+1)},o=t.responseEnd-t.responseStart;t.domContentLoadedEventStart?0>o&&(o=0):o=-1,t={domainLookupTime:e,connectTime:n,requestTime:i,resourcesLoadedTime:{value:o},domParsingTime:{value:t.domContentLoadedEventStart?t.domInteractive-t.domLoading:-1},domContentLoadedTime:{value:t.domContentLoadedEventStart?t.domContentLoadedEventStart-t.fetchStart:-1}}}else t="";var a,e=[];for(a in t)t.hasOwnProperty(a)&&("domContentLoadedTime"==a?r.push("r3="+t[a].value):e.push(t[a].value));r.push("ext=pfm="+e.join("_")),u(r)},"undefined"!=typeof window.performance&&"undefined"!=typeof window.performance.timing&&0!=window.performance.timing.loadEventEnd?n():window.attachEvent?window.attachEvent("onload",n):window.addEventListener&&window.addEventListener("load",n,!1)):u(r)}}e.MtaH5=e.MtaH5||{},e.Ta=e.Ta||{},MtaH5.pgv=u,Ta.clickStat=MtaH5.clickStat=function(e,n){var r=MtaH5.hack?MtaH5.hack():"",i={};if(r.conf&&function(){var t,e=r.conf;for(t in e)e.hasOwnProperty(t)&&(i[t]=e[t])}(),i.cid){var o=[],u=a(),d={r2:t.sid};u.dm="taclick",u.url=e,d.r2=i.cid,d.r5=function(t){t="undefined"==typeof t?{}:t;var e,n=[];for(e in t)t.hasOwnProperty(e)&&n.push(e+"="+t[e]);return n.join(";")}(n);for(var h=0,u=[u,s(),d,c(),{random:+new Date}],d=u.length;h<d;h++)for(var l in u[h])u[h].hasOwnProperty(l)&&o.push(l+"="+(u[h][l]||""));var o=MtaH5.src=("https:"==document.location.protocol?"https://pingtas":"http://pingtcss")+".qq.com/pingd?"+o.join("&"),f=new Image;MtaH5["click_"+i.sid]=f,f.onload=f.onerror=f.onabort=function(){f=f.onload=f.onerror=f.onabort=null,MtaH5[i.sid]=!0},f.src=o}},Ta.clickShare=MtaH5.clickShare=function(e){var n=MtaH5.hack?MtaH5.hack():"",r={},o=i(),o=o.param.CKTAG||o.param.ckatg,u="undefined"==typeof o?[]:o.split(".");if(n.conf&&function(){var t,e=n.conf;for(t in e)e.hasOwnProperty(t)&&(r[t]=e[t])}(),r.cid){var o=[],d=a(),h={r2:t.sid};for(d.dm="taclick_share",d.url="mtah5-share-"+e,h.r2=r.cid,h.r5=function(t,e){var n=[];return 2===t.length&&t[0]==e&&n.push(t[0]+"="+t[1]),n.join(";")}(u,"mtah5_share"),e=0,d=[d,s(),h,c(),{random:+new Date}],h=d.length;e<h;e++)for(var l in d[e])d[e].hasOwnProperty(l)&&o.push(l+"="+(d[e][l]||""));l=MtaH5.src=("https:"==document.location.protocol?"https://pingtas":"http://pingtcss")+".qq.com/pingd?"+o.join("&");var f=new Image;MtaH5["click_"+r.sid]=f,f.onload=f.onerror=f.onabort=function(){f=f.onload=f.onerror=f.onabort=null,MtaH5[r.sid]=!0},f.src=l}};var d=MtaH5.hack?MtaH5.hack():{};d.conf&&function(){var e,n=d.conf;for(e in n)n.hasOwnProperty(e)&&(t[e]=n[e])}(),t.autoReport&&u()}({},this))}function i(t){return t&&"object"===A(t)&&!t.nodeType&&t!==t.window}var o=window;window.parent!==window&&window.inDapIF&&(o=window.parent);var a="__qq_qidian_da",s=o[a]||"qidianDA";if(o[a]=s,s){var c=o[s]=o[s]||function(){c[a]=c[a]||[],c[a].push(arguments)};if(!c.loaded){c.loaded=!0;var u,d="0.6.1",h=o.location,l=h.protocol,f=l+"//da.qidian.qq.com",p=l+"//combo.b.qq.com",v=new Date,g=function(t){var e=(t||window).document,n=e.createElement("iframe");return n.src="javascript:false",n.title="",n.role="presentation",n.frameBorder="0",n.tabIndex="-1",(n.frameElement||n).style.cssText="position:absolute;width:0;height:0;border:0;",n},m=function(){var t;try{var e=new Uint32Array(1);window.crypto.getRandomValues(e),t=2147483647&e[0]}catch(e){t=Math.floor(2147483648*Math.random())}return t},w=function(){return m().toString(36)},y="S3EVENT_LISTENERS"+w(),k=function(t,e,n){e=e.replace(/^on/i,"");var r=function(e){n.call(t,e)},i=e;e=e.toLowerCase(),t.addEventListener?t.addEventListener(i,r,!1):t.attachEvent&&t.attachEvent("on"+i,r);var o=t[y]=t[y]=[];return o[o.length]=[e,n,r,i],t},_=function(t,e,n){var r=n;e=e.replace(/^on/i,"").toLowerCase();for(var i,o,a,s=t[y],c=!r,u=s.length;u--;)i=s[u],i[0]!==e||!c&&i[1]!==r||(o=i[3],a=i[2],t.removeEventListener?t.removeEventListener(o,a,!1):t.detachEvent&&t.detachEvent("on"+o,a),s.splice(u,1));return t},b=function(t,e){var n,r,i=t.ownerDocument,o=!1;try{n=t.contentWindow,r=n.document}catch(a){o=!0,k(t,"load",function(){n=t.contentWindow,r=n.document,_(t,"load"),e(n,r,i.domain)}),t.src='javascript:void((function () {document.open("text/html", "replace");document.domain = "'+i.domain+'";document.close();})())'}o||e(n,r,"")},S='<!DOCTYPE html><html><head><meta charset="UTF-8"></head>',E="</html>",x=function(t,e){var n=(e||window).document,r=n.body||n.documentElement;r.insertBefore(t,r.firstChild)},C=function(t){return function(){var e=window.console;"undefined"!=typeof e&&"function"==typeof e[t]&&e[t].apply(e,arguments)}},T=C("log");T.group=C("group"),T.groupEnd=C("groupEnd");var q=function(){this._s={},this._avg={},this._max={}};q.prototype.start=function(t,e){this._s[t]=e?+e:+new Date},q.prototype.end=function(t,e){var n=this._s[t];this._s[t]=null;var r=e?+e:+new Date,i=r-n;this._max[t]=Math.max(i,this._max[t]||0);var o=this._avg[t];o?(o.s=(o.s*o.n+i)/(o.n+1),++o.n):o=this._avg[t]={s:i,n:1}},q.prototype.encode=function(){var t,e,n="",r=this._avg;for(var i in r)r.hasOwnProperty(i)&&(t=Math.round(r[i].s||0),e=Math.round(this._max[i]||0),n+=i+"("+t+"_"+e+")");return n};var O=new q,D={Boolean:1,Number:1,String:1,Function:1,Array:1,Date:1,RegExp:1,Object:1,Error:1},M=Object.prototype.toString,A=function(t){if(null==t)return String(t);var e=typeof t,n="object";return e===n||"function"===e?(e=M.call(t).slice(8,-1),D[e]?e.toLowerCase():n):typeof t},L=function(t){if(!t)return"";var n=[],r=/\[\]$/,i=e().encodeURIComponent,o=function(t,e){e="function"==typeof e?e():null==e?"":e,n[n.length]=i(t)+"="+i(e)},a=function(t,e){var i,s,c;switch(A(e)){case"array":if(t)for(i=0,c=e.length;i<c;i++)if(r.test(t))o(t,e[i]);else{var u="object"===A(e[i])?i:"";a(t+"["+u+"]",e[i])}else for(i=0,c=e.length;i<c;i++)a(e[i].key,e[i].value);break;case"object":for(s in e)e.hasOwnProperty(s)&&a(t?t+"["+s+"]":s,e[s]);break;default:e=""+e,t?o(t,e):n[n.length]=e}return n};return a("",t).join("&").replace(/%20/g,"+")},I=function(){return"sendBeacon"in window.navigator},j=function(){try{if("XMLHttpRequest"in window&&"withCredentials"in new window.XMLHttpRequest)return"xhr";if("XDomainRequest"in window)return"xdr"}catch(t){}return""},P=function(t,e){"string"!=typeof t&&(t=L(t));var n=e&&e.randomKey;if(n=null==n?"z":n){var r=n+"="+w();t+=(t?"&":"")+r}return t},H=function(t,e,n){var r=[t,e].join(t.indexOf("?")>=0?"&":"?"),i="S3PING_IMG"+w(),o=new Image;window[i]=o;var a=function(t){if(o.onload=o.onerror=o.onabort=null,window[i]=null,o=null,n){var e=null;t&&(e=new Error,e.name="ImgPing"+t),n(e)}};return o.onload=function(){a()},o.onerror=function(){a("Error")},o.onabort=function(){a("Abort")},o.src=r,!0},N=function(t,e){return I()&&window.navigator.sendBeacon(t,e)},R=function(t,e,n){if("xhr"!==j())return!1;var r=new window.XMLHttpRequest;return r.open("POST",t,!0),r.withCredentials=!0,r.setRequestHeader("Content-Type","text/plain"),n&&(r.onreadystatechange=function(){if(4===r.readyState){var t=r.status,e=t>=200&&t<400,i=null;if(!e){var o="XhrPing"+(t<500?"ClientError":"ServerError");i=new Error(o+" "+t),i.name=o}n(i)}}),r.send(e),!0},F=function(t,e,n){var r=t.length+n.length+1;return r>2083&&r-e.length>2048},B=function(t,e,n){e=P(e,n);var r=t.match(/(?:https?|ftp):\/\/[^\/]+/);if(!r)throw new Error('URL: "'+t+'" not absolute url.');var i=r[0],o=n&&n.transport,a=n&&n.callback;return"img"===o?H(t,e,a):"xhr"===o?R(t,e,a):"beacon"===o?N(t,e):F(t,i,e)?!(a||!N(t,e))||(!!R(t,e,a)||H(t,e,a)):H(t,e,a)},Q=function(t,e,n){var r=I();if(n=n||{},n.transport=r?"beacon":"img",B(t,e,n),!r){var i,o=200,a=+new Date;for(i=a+o;a<i;)a=+new Date}},V=function(t){this._data=t||[]};V.prototype.on=function(t){this._data[t]=!0},V.prototype.off=function(t){this._data[t]=!1},V.prototype.merge=function(t){for(var e=this._data.slice(),n=t._data,r=0;r<n.length;r++)e[r]=e[r]||n[r];return new V(e)},V.prototype.encode=function(){for(var t=[],e=0;e<this._data.length;e++)this._data[e]&&(t[Math.floor(e/6)]^=1<<e%6);for(e=0;e<t.length;e++)t[e]="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_".charAt(t[e]||0);return t.join("")+"~"};var G=function(){this._gFlags=new V,this._allFlags={}};G.prototype.flag=function(t,e){var n;if(e){var r=this._allFlags;r[e]=r[e]||new V,n=r[e]}else n=this._gFlags;n.on(t)},G.prototype.encode=function(t){var e=this._allFlags[t],n=this._gFlags;return(e?n.merge(e):n).encode()};var J=new G,z=function(t){return t.toString(36)},U="__QIDIANDA_SENDED",X=function(t,e,n){this.module=t,this.version=e,this.trackingServer=n};X.prototype={module:"",version:"",trackingServer:"",wrap:function(t,e,n,r){var i=this,o=null==e||"function"===A(e),a=o?e:e[t],s=function(){var e=r?r.id:null;try{n&&J.flag(n,e),O.start(t);var o;return a&&(o=a.apply(this,arguments)),O.end(t),o}catch(n){if(!n[U]){alert(n.name+"#"+n.message),n[U]=!0;var s=r?r.getCommonQuery(!0):null;i.sendError("err",t,n.name,n.message,e,s)}throw n}};return s.displayName=t,o||(e[t]=s),s},errorQueue:[],sending:!1,sendError:function(t,n,r,i,o,a,s){if(!(100*Math.random()>=1)){if(this.sending)return void this.errorQueue.push(arguments);this.sending=!0;var c=e().encodeURIComponent,u=this.trackingServer+"/ping/err";if(a=(a||"v="+this.version+"&t="+z(+new Date))+"&fg="+J.encode(o)+"&tp="+c(t)+"&p1="+c(this.module+"-"+n)+(r?"&p2="+c(r.slice(0,100)):"")+(i?"&p3="+c(i.slice(0,100)):""),s)Q(u,a);else{var d=this;B(u,a,{callback:function(){d.sending=!1;var t=d.errorQueue.shift();t&&d.sendError.apply(d,t)}})}}}};var W={},$=function(t){t=t||window;var e="navigator";return t[e]&&"preview"===t[e].loadPurpose},K=function(t){var e=t||window,n="document";return e[n]&&(e=e[n]),"prerender"===e.visibilityState},Y=function(t,e){if(t=t||window,!$(t)){var n=t.document,r=!1,i=function(){e(t)},o=function(){r||K(t)||(r=!0,i(),_(n,"visibilitychange",o))};return K(t)?void k(n,"visibilitychange",o):void i()}},Z=function(t,e,n){var r=t.length;if(r>0){n=n||r,e=e||0;for(var i=new Array(n-e),o=e;o<n;o++)i[o]=t[o];return i}return[]},tt=function(t,e,n,r,i){n=n||window,n[t]=n[t]||[],i=i||"ready";for(var o=n[t],a=function(t){t.shift||(t=Z(t));var n=t.shift();"string"==typeof n?r?r(e,n,t):e[n].apply(e,t):e[i](n)};o.length;)a(o.shift());o.push=a},et=function(t){return String(t).replace(new RegExp("([.*+?^=!:${}()|[\\]/\\\\-])","g"),"\\$1")},nt=function(t,n){n=n||window;for(var r=[],i=n.document.cookie.split(";"),o=new RegExp("^\\s*"+et(t)+"=\\s*(.*?)\\s*$"),a=0;a<i.length;a++){var s=i[a].match(o);s&&(r[r.length]=e().decodeURIComponent(s[1]))}return r},rt=function(t,n,r,i,o,a){r=r||window,n=e().encodeURIComponent(n);var s=t+"="+n+"; ";if(null!=a&&(s+="path="+a+"; "),null!=i){var c=new Date;c.setTime(c.getTime()+i),s+="expires="+c.toGMTString()+"; "}null!=o&&(s+="domain="+o+";");var u=r.document,d=u.cookie;if(u.cookie=s,d===u.cookie){for(var h=nt(t),l=0;l<h.length;l++)if(n===h[l])return!0;return!1}return!0},it=function(t,e,n,r,i){var o,a={".com":1,".net":1,".org":1,".edu":1,".gov":1,".cn":1,".tw":1,".hk":1};if(i)for(o=0;o<i.length;o++)a["."+i[o]]=1;var s=n.location.hostname,c=s.split("."),u=c.length,d="",h="";for(o=u-1;o>=0;o--)if(h="."+c[o]+h,!a[h]){var l=rt(t,e,n,r,h,"/");if(l){d=h;break}}return d},ot="S3COOKIENAME"+w(),at=function(){var t="cookie",e=window.document;if(window.navigator.cookieEnabled)return!0;e[t]=ot+"=1";var n=e[t].indexOf(ot+"=")!==-1;return e[t]=ot+"=1; expires=Thu, 01-Jan-1970 00:00:01 GMT",n},st=function(){var t="DocumentTouch";return!!("ontouchstart"in window||window[t]&&document instanceof window[t])},ct=function(t){t=t||window;var e=t.document,n="BackCompat"===e.compatMode?e.body:e.documentElement;return n.clientHeight},ut=function(t){t=t||window;var e=t.document,n="BackCompat"===e.compatMode?e.body:e.documentElement;return n.clientWidth},dt=function(){function t(t){return t=t.match(/[\d]+/g),t.length=3,t.join(".")}var e=!1,n="";if(navigator.plugins&&navigator.plugins.length){var r=navigator.plugins["Shockwave Flash"];r&&(e=!0,r.description&&(n=t(r.description))),navigator.plugins["Shockwave Flash 2.0"]&&(e=!0,n="2.0.0.11")}else if(navigator.mimeTypes&&navigator.mimeTypes.length){var i=navigator.mimeTypes["application/x-shockwave-flash"];e=!!i&&i.enabledPlugin,e&&(n=t(i.enabledPlugin.description))}else try{var o=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");e=!0,n=t(o.GetVariable("$version"))}catch(r){try{new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6"),e=!0,n="6.0.21"}catch(r){try{var o=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");e=!0,n=t(o.GetVariable("$version"))}catch(t){}}}return e?n:""},ht=function(){var t=window,e=t.document,n=e.createElement("div");n.setAttribute("id","ads");var r=!1;try{x(n,t),r=!!e.getElementById("ads")}catch(t){}return r&&n.parentNode&&n.parentNode.removeChild(n),r},lt=function(){var t="S3LOCALSTORAGE"+w(),e="localStorage";try{return window[e].setItem(t,1),window[e].removeItem(t),!0}catch(t){return!1}},ft=function(){var t="S3SESSIONSTORAGE"+w(),e="sessionStorage";try{return window[e].setItem(t,1),window[e].removeItem(t),!0}catch(t){return!1}},pt=function(){this.tasks={}};pt.prototype.set=function(t,e){this.tasks[t]=e},pt.prototype.get=function(t){return this.tasks[t]};var vt,gt=new pt,mt=function(){};mt.prototype.run=function(t){var e=t.get("win"),n=t.get("doc"),r=t.getFullApi("/ping/pv"),i=e.screen,o=i.orientation||i.mozOrientation||i.msOrientation||"";o&&o.type&&(o=o.type),vt||(vt={tz:(new Date).getTimezoneOffset()/60,hasf:dt(),hasadb:ht()?1:0,hasc:t.supportCookie?1:0,hastc:t.supportTouch?1:0,hasls:lt()?1:0,hasss:ft()?1:0,hasid:e.indexedDB?1:0});var a=t.getCommonData(!0),s=e.location.hash;a.add("r",n.referrer),"#"===s.charAt(0)&&(s=s.slice(1)),s&&a.add("uh",s),a.add("pt",n.title),a.add("sw",i.width),a.add("sh",i.height),a.add("saw",i.availWidth),a.add("sah",i.availHeight),a.add("scd",i.colorDepth),a.add("so",o),a.add("bw",ut(e)),a.add("bh",ct(e)),a.extend(vt),O.start("req-pv"),B(r,a.toJSON(),{callback:t.wrap("pv-cb",function(e){return e?void t.sendError("req","pv",e.name):(O.end("req-pv"),void t.trigger("pv-done"))},26)})},mt.prototype.remove=function(t){},gt.set("pv",mt);var wt=function(t,e){var n=(e||window).document,r=n.createElement("iframe");return r.src=t,r.title="",r.role="presentation",r.frameBorder="0",r.tabIndex="-1",(r.frameElement||r).style.cssText="position:absolute;width:0;height:0;border:0;",x(r,e),r},yt=!1,kt=function(t,n){function r(){for(var t,e=s[y],r=0;t=e[r];)if(t[0]===u){var i=t[1];i(n),e.splice(r,1)}else r++;h=!0}function i(){s.addEventListener?(s.removeEventListener("DOMContentLoaded",o),n.removeEventListener("load",o)):(s.detachEvent("onreadystatechange",o),n.detachEvent("onload",o))}function o(){(s.addEventListener||"load"===n.event.type||"complete"===s.readyState)&&(i(),r())}function a(){if(!h){try{l.doScroll("left")}catch(t){return e().setTimeout(a,50)}i(),r()}}n=n||window;var s=n.document,c="DOMContentLoaded",u=c+42,d=s[y]=s[y]||[];if(d[d.length]=[u,t,t,c],!yt){yt=!0;var h=!1;if("complete"===s.readyState||"loading"!==s.readyState&&!s.documentElement.doScroll)e().setTimeout(r);else if(s.addEventListener)s.addEventListener("DOMContentLoaded",o),n.addEventListener("load",o);else{s.attachEvent("onreadystatechange",o),n.attachEvent("onload",o);var l=!1;try{l=null==n.frameElement&&s.documentElement}catch(t){}l&&l.doScroll&&a()}}},_t=window.navigator,bt=_t.userAgent,St=null!=window.chrome&&"Google Inc."===_t.vendor&&/Chrome/.test(bt)&&bt.indexOf("OPR")===-1&&bt.indexOf("Edge")===-1,Et=window.navigator.userAgent,xt=/iphone|ipod|android.*mobile|windows.*phone|blackberry.*mobile/i.test(Et),Ct=function(){this.removed=!1};Ct.prototype.run=function(t){if(!St&&!xt){var e=t.get("win");kt(t.wrap("id-cb",function(){if(this.removed)return void t.flag(20);var n="",r=t.get("ss")+"/da/id"+n+".html",i=L({q:t.get("qid"),p:t.get("pid"),t:t.get("tid"),a:t.get("aid"),c:t.get("cid"),s:t.getSid(),src:t.get("src"),pgv_pvi:t.get("pgv_pvi"),v:t.get("ver"),ts:t.getFullApi("/ping/id")});r+="?"+i,wt(r,e)},19),e)}},Ct.prototype.remove=function(t){this.removed=!0},gt.set("id",Ct);var Tt=function(t){return t.target||t.srcElement},qt=function(t){t=t||window;var e=t.document;return t.pageYOffset||e.documentElement.scrollTop||e.body.scrollTop},Ot=function(t){t=t||window;var e=t.document;return t.pageXOffset||e.documentElement.scrollLeft||e.body.scrollLeft},Dt=function(t){t=t||window;var e=t.document,n=e.body,r=e.documentElement,i="BackCompat"===e.compatMode?n:e.documentElement;return Math.max(r.scrollWidth,n.scrollWidth,i.clientWidth)},Mt=function(t){t=t||window;var e=t.document,n=e.body,r=e.documentElement,i="BackCompat"===e.compatMode?n:e.documentElement;return Math.max(r.scrollHeight,n.scrollHeight,i.clientHeight)},At=function(t){var e="",n=t.nodeType;if(1===n||9===n||11===n){if("string"==typeof t.textContent)return t.textContent;for(t=t.firstChild;t;t=t.nextSibling)e+=At(t)}else if(3===n||4===n)return t.nodeValue;return e},Lt=function(){};Lt.prototype.run=function(t){var e=t.get("win"),n=t.get("doc"),r=n.documentElement;this.cb=t.wrap("clc-cb",function(n){var r=Tt(n),i=t.getCommonData(),o=r.nodeName.toLowerCase();if(i.add("pw",Dt(e)),i.add("ph",Mt(e)),i.add("bw",ut(e)),i.add("bh",ct(e)),i.add("bx",Ot(e)),i.add("by",qt(e)),i.add("tag",o),r.href){var a=r.getAttribute("target");a&&i.add("target",a),i.add("href",r.href)}i.add("x",n.clientX||0),i.add("y",n.clientY||0);var s,c=0;"a"!==o&&"button"!==o||(s=At(r),c=2),"input"!==o||"button"!==r.type&&"submit"!==r.type||(s=r.value||"",c=2),s&&i.add("word",s.slice(0,20)),t.ping("clc",i,c)});var i=t.supportTouch;i&&t.flag(18),k(r,i?"touchstart":"click",this.cb)},Lt.prototype.remove=function(t){var e=t.get("doc"),n=e.documentElement;_(n,"click",this.cb),t.supportTouch&&_(n,"touchstart",this.cb)},gt.set("clc",Lt);var It="unload",jt=function(){};jt.prototype.run=function(t){var e=t.get("win");this.cb=function(){try{var e=t.getCommonData();e.add("spd",O.encode()),t.ping("pc",e,3)}catch(e){throw t.sendError("err","pc-cb",e.name,e.message,!0),e}},k(e,It,this.cb)},jt.prototype.remove=function(t){var e=t.get("win");_(e,It,this.cb)},gt.set("pc",jt);var Pt=function(t,e,n){this.api=t,this.pingName=e,this.params=n,n.hasKey("a")||this.params.prefix("a",e);var r=this;this.params.on("change",function(){r._changed=!0})};Pt.prototype.getQueryData=function(){return this.params},Pt.prototype.size=function(){var t={a:1};return this.encode(t).length},Pt.prototype.ping=function(t,e){var n=this.params.filter({a:1});return t?void Q(this.api,n):void B(this.api,n,{callback:e})},Pt.prototype.encode=function(t){if(!t&&null!=this._encodeValue&&!this._changed)return this._encodeValue;var e=this.params.encode(t);return this._changed=!1,t||(this._encodeValue=e),e};var Ht=function(){var t=I();this.max=j()&&t?8192:2047,this.queue=[]};Ht.prototype.run=function(t){this.stopping=!0,this.tracker=t,this.heartBeatInterval=t.get("hbt"),this.batchApi=t.getFullApi("/ping/b"),2047===this.max&&this.tracker.flag(27)},Ht.prototype.start=function(){this.stopping=!1,this.batchSend()},Ht.prototype.stop=function(){this.stopping=!0},Ht.prototype.push=function(t,e,n){var r=new Pt(this.tracker.getFullApi("/ping/"+t),t,e);if(this.stopping)return this.tracker.flag(24),void this._push(r,n);var i=3===n;if(n&&(0===this.queue.length||r.size()>=this.max)){this.tracker.flag(25);var o=this,a="req-"+t;return O.start(a),void r.ping(i,this.tracker.wrap("pq-ipingcb",function(e){return e?void o.tracker.sendError("req",t,e.name):void O.end(a)}))}this._push(r,n);var s=n&&n>1;s?this.batchSend(i):this.waitForSend()},Ht.prototype._push=function(t,e){e?this.queue.unshift(t):this.queue.push(t)},Ht.prototype.waitForSend=function(){var t=this;if(this.queue.length&&!t.heartBeat){var n=this.tracker.wrap("pq-timer",function(){t.heartBeat=null,t.batchSend()});t.heartBeat=e().setTimeout(n,t.heartBeatInterval)}},Ht.prototype.batchSend=function(t){var e,n,r=[];for(e=0,n=this.queue.length;e<n;e++)r.push(this.queue[e].encode());e=n;var i=this.calQuery(r);if(i){for(;i.length>this.max&&e>=2;)e--,i=this.calQuery(r,e);if(this.queue.splice(0,e),t)Q(this.batchApi,i);else{var o=this,a="req-b";O.start(a),B(this.batchApi,i,{callback:this.tracker.wrap("pq-pingcb",function(t){t&&o.tracker.sendError("req","b",t.name),O.end(a),o.waitForSend()})})}}},Ht.prototype.calQuery=function(t,e){function n(){for(var e=[],n=0,r=t.length;n<r;n++)e.push(t[n].slice(a));var s=i?"c="+i+"&":"";return s+"l[]="+e.join("&l[]=")+o}null!=e&&(t=t.slice(0,e));var r=t[0];if(!r)return"";var i="",o="&t="+z(+new Date);if(1===t.length)return"l[]="+r+o;for(var a=0,s=r.length;a<s;a++){for(var c,u=null,d=0,h=t.length;d<h;d++){var l=t[d];if(c=l.charAt(a),null!=u&&u!==c)return n();u=c}i+=c}return n()},Ht.prototype.remove=function(t){this.heartBeat&&(e().clearTimeout(this.heartBeat),this.heartBeat=null)},gt.set("pq",Ht);var Nt=function(t,e,n,r,i){if(t.setAttribute("type","text/javascript"),r&&t.setAttribute("charset",r),t.setAttribute("src",e),i)return void i.insertBefore(t,i.firstChild);var o=n.getElementsByTagName("script"),a=o[o.length-1];if(a)a.parentNode.insertBefore(t,a);else{var s=n.getElementsByTagName("head")[0];s.insertBefore(t,s.firstChild)}},Rt=function(t,n,r,i,o,a){var s=o?o.ownerDocument:document,c=s.defaultView||s.parentWindow,u=s.createElement("SCRIPT"),d="S3JSONPPREFIX";a=a||"callback",r=r||1e4;var h,l,f=new RegExp("(?:\\?|&)"+a+"=([^&]*)"),p=function(t){return function(){try{if(t){var r=new Error;r.name="Timeout",n.call(c,r)}else{var i=Z(arguments);i.unshift(null),n.apply(c,i),e().clearTimeout(h)}c[l]=null,delete c[l]}catch(t){T(t)}finally{u&&u.parentNode&&u.parentNode.removeChild(u)}}},v=t.match(f);l=v?v[1]:d+w(),c[l]=p(!1),r&&(h=e().setTimeout(p(!0),r)),v||(t+=(t.indexOf("?")<0?"?":"&")+a+"="+l),Nt(u,t,s,i,o)},Ft=function(t){return 0===t.indexOf(".")?t.substr(1):t},Bt=function(t){return Ft(t).split(".").length},Qt=function(t){return t?(t.length>1&&t.lastIndexOf("/")===t.length-1&&(t=t.substr(0,t.length-1)),0!==t.indexOf("/")&&(t="/"+t),t):"/"},Vt=function(t){return t=Qt(t),"/"===t?1:t.split("/").length},Gt=function(t,e,n){t=t||window;var r=t.location,i=Vt(null!=n?n:r.pathname),o=Bt(null!=e?e:r.hostname);return o+(i>1?"-"+i:"")+"-"},Jt=function(t,e,n,r,i,o){var a=Gt(n,i,o);return e+="",rt(t,a+e.replace(/\-/g,"%2d"),n,r,i,o)},zt=function(t,e,n,r){for(var i=nt(t,e),o=Gt(e,n,r),a=0;a<i.length;a++){var s=i[a];if(0===s.indexOf(o))return s.slice(o.length).replace(/%2d/g,"-")}return""},Ut="_qddamta_",Xt=function(){this.removed=!1};Xt.prototype.run=function(t){var e=t.get("noMTA");if(e)return void t.flag(21);var n=Ut+t.id,i=t.get("win"),o=zt(n,i,null,"/");if(o)return t.flag(22),void r(i,o);var a=t.getCommonData(),s=t.getFullApi("/jsonp/mta")+"?"+L(a.toJSON());Rt(s,t.wrap("mta-cb",function(e,o){if(e)return t.flag(23),void t.sendError("req","mta",e.name);if(o&&o.err)return t.flag(29),void t.sendError("req","mta","ErrNum:"+o.err);var a=36e5;return o&&o.sid?(Jt(n,o.sid,i,a,null,"/"),void r(i,o.sid)):void Jt(n,"0",i,a,null,"/")}))},Xt.prototype.remove=function(t){this.removed=!0},gt.set("mta",Xt);var Wt=function(t){var e=1;if(t){var n=0;e=0;for(var r=t.length-1;r>=0;r--)n=t.charCodeAt(r),e=(e<<6&268435455)+n+(n<<14),n=266338304&e,e=0!=n?e^n>>21:e}return e},$t="_EVENTS",Kt=function(){};Kt.prototype.on=function(t,e){var n=this[$t];n||(n=this[$t]={});var r=n[t]=n[t]||[];r.push(e)},Kt.prototype.off=function(t,e){if(!t)return void(this[$t]={});var n=this[$t];if(n&&n[t]){if(!e)return void(n[t].length=0);for(var r=n[t],i=0;i<r.length;i++)r[i]===e&&(r[i]=null)}},Kt.prototype.trigger=function(t){var e=Z(arguments),n=this[$t];if(t=e.shift(),n&&n[t])for(var r=n[t],i=0;i<r.length;i++)r[i]&&r[i].apply(this,e)};var Yt=function(t,e){var n=t.prototype,r=function(){};r.prototype=e.prototype;var i=t.prototype=new r;for(var o in n)n.hasOwnProperty(o)&&(i[o]=n[o]);t.prototype.constructor=t,t.superClass=e.prototype},Zt=function(){this.vals={},Kt.apply(this,arguments)};Yt(Zt,Kt),Zt.prototype.set=function(t,e){if("string"==typeof t){var n=this.vals[t];n!==e&&(this.vals[t]=e,this.trigger("change",t,e,n))}else{var r=t;for(var i in r)r.hasOwnProperty(i)&&this.set(i,r[i])}},Zt.prototype.get=function(t){return this.vals[t]||""},Zt.prototype.map=function(t){for(var e in this.vals)if(this.vals.hasOwnProperty(e)){var n=this.vals[e];n&&t(e,n)}};var te=new Zt,ee=function(t,e,n){function r(t,e){for(var n in e)e.hasOwnProperty(n)&&(t[n]=e[n])}function o(t,e){for(var n in e)e.hasOwnProperty(n)&&(i(e[n])?(t[n]=t[n]||{},o(t[n],e[n])):t[n]=e[n])}var a=r;return"boolean"!=typeof t&&(n=e,e=t,a=o),a(e,n),e},ne=function(){this.json=[],this.suffixJSON=[],this._prefixLength=0};Yt(ne,Kt),ne.prototype.prefix=function(t,e){this._add(t,e,this._prefixLength),this._prefixLength++},ne.prototype.add=function(t,e){this._add(t,e)},ne.prototype._add=function(t,e,n){var r={key:t,value:e};null!=n?this.json.splice(n,0,r):this.json.push(r),this.trigger("change")},ne.prototype.suffix=function(t,e){var n={key:t,value:e};this.suffixJSON.push(n),this.trigger("change")},ne.prototype.hasKey=function(t){for(var e=0,n=this.json.length;e<n;e++)if(this.json[e].key===t)return!0;return!1},ne.prototype.extend=function(t){for(var e in t)t.hasOwnProperty(e)&&null!=t[e]&&this.json.push({key:e,value:t[e]});this.trigger("change")},ne.prototype.toJSON=function(){return this.json.concat(this.suffixJSON)},ne.prototype.filter=function(t){var e,n,r,i=this.json,o=[];for(e=0,n=i.length;e<n;e++)r=i[e],t[r.key]||o.push(r);var a=this.suffixJSON;for(e=0,n=a.length;e<n;e++)r=a[e],t[r.key]||o.push(r);return o},ne.prototype.size=function(t){return this.encode(t).length},ne.prototype.encode=function(t){var e=this.toJSON();return ne.encode(e,t)},ne.encode=function(t,e){if(!t||!t.length)return"";var n=[],r=/\[\]$/,i=function(t,e){e="function"==typeof e?e():null==e?"":e,n[n.length]=ne.encodeValue(t)+"("+ne.encodeValue(e)+")"},o=function(t,a){var s,c,u;switch(A(a)){case"array":if(t)for(s=0,c=a.length;s<c;s++)if(r.test(t))i(t,a[s]);else{var d="object"===A(a[s])?s:"";o(t+"["+d+"]",a[s])}else for(s=0,c=a.length;s<c;s++)u=a[s].key,e&&e[u]||o(u,a[s].value);break;case"object":for(u in a)a.hasOwnProperty(u)&&o(t?t+"["+u+"]":u,a[u]);break;default:a=""+a,t?i(t,a):n[n.length]=a}return n};return o("",t).join("").replace(/%20/g,"+")},ne.encodeValue=function(t){return e().encodeURIComponent(t).replace(/\(/g,"%28").replace(/\)/g,"%29")};var re=function(t,n){var r=new RegExp("(^|&|\\?|#)"+et(n)+"=([^&#]*)(&|$|#)",""),i=t.match(r);return i&&i[2]?e().decodeURIComponent(i[2]):""},ie=/[^:]+:\/\/([^:\/]+)/,oe=function(t){var e=t.match(ie);return e?e[1]:""},ae=function(t,e){return oe(t)===oe(e)},se={createSid:function(){this._hasCookie=this.supportCookie,this._hasCookie||this.flag(9),this._sidExpiredTime=0;var t=te.get("sid");if(t)return this.flag(10),void this.set("sid",t);var e=this.get("win"),n=re(e.location.search,"ADTAG"),r=z(Wt(n)),i=this.get("doc").referrer,o=z(Wt(i));if(!this._hasCookie)return void this.recreateSid(r,o);var a=this.getCookieSid(),s=a[0],c=a[1];if(!s||!c)return this.flag(11),void this.recreateSid(r,o);var u;if(s&&c){var d=s.split("."),h=d[0],l=d[1];u=n&&h!==r||i&&l!==o&&!ae(i,e.location.href)}if(!u)return this.flag(12),void this._saveSid(s,c);var f=zt("_qddac",e,null,null),p=f.split(".");return p[0]===r&&p[1]===o?(this.flag(13),void this._saveSid(p[0]+"."+p[1],p[2]+"."+p[3])):void this.recreateSid(r,o)},recreateSid:function(t,e){t=t||z(Wt(re(this.get("win").location.search,"ADTAG"))),e=e||z(Wt(this.get("doc").referrer));var n=t+"."+e,r=this.random();this._saveSid(n,r)},refreshCookie:function(){if(!this._hasCookie){var t=+new Date,e=this._sidExpiredTime;return void(t>=e&&(this.flag(14),this.recreateSid()))}var n=this.getCookieSid(),r=n[0],i=n[1];if(r&&i){var o=this.get("sid");if(o[0]!==r||o[1]!==i)return void this.flag(15);this._setSidCookie()}else this.recreateSid()},_setSidCookie:function(){var t=18e5,e=+new Date,n=new Date;if(n.setHours(23),n.setMinutes(59),n.setSeconds(59),n.setMilliseconds(999),n=+n,this._hasCookie){var r=this.get("win"),i=this.get("sid"),o=Jt("_qdda",i[0],r,Math.min(t,n-e),null,"/");o&=Jt("_qddab",i[1],r,null,null,"/"),this._hasCookie=o}this._hasCookie||(this._sidExpiredTime=Math.min(e+t,n))},_saveSid:function(t,e){this._setGlobal("sid",[t,e]),this._setSidCookie()},_getSid:function(){var t=this.get("sid");return t?t.join("."):""},getSid:function(t){return t||this.refreshCookie(),this._getSid()},getCookieSid:function(){var t=this.get("win"),e=zt("_qdda",t,null,"/"),n=zt("_qddab",t,null,"/");return[e,n]},setClosedSid:function(){if(this._hasCookie){var t=this.getCookieSid(),e=t[0],n=t[1];if(e&&n){var r=this.get("win"),i=this._getSid();Jt("_qddac",i,r,Math.max(this._getLoadedTime()+5e3,1e4),null,null)}}},_getLoadedTime:function(){var t=this.get("win"),e=t.performance||t.webkitPerformance,n=e&&e.timing;if(!n)return 0;var r=n.navigationStart;return 0===r?0:n.loadEventStart-r;
}},ce=n("i"),ue=function(t,e,n,r){var i=this;i.qdda=t,Zt.apply(i,arguments),i.name=n,r&&(i.flag(6),i.set(r)),i.supportCookie=at(),i.supportTouch=st(),i.id=e,i.createPid(),i.createQid(),i.createSid(),i.init()};ue.prototype={init:function(){var t=this;t.tasks={},t.task("pq"),t.on("pv-done",function(){t.task("mta"),t.task("id"),t.tasks.pq.start(),O.end("rdy")}),t.task("pv"),t.task("clc"),t.task("pc")},_setGlobal:function(t,e){this.set(t,e),te.set(t,e)},_genQDAValue:function(t){return"QD."+t},_calQDAValue:function(t){if(!t||"string"!=typeof t)return"";var e=t.match(/QD\.([\w\W]+)/);return e&&e[1]||""},_genId:function(){var t=this.get("win"),e=this.get("doc"),n=t.navigator.userAgent+(e.cookie?e.cookie:"")+(e.referrer?e.referrer:"")+t.location.href;return z(m()^2147483647&Wt(n))+"."+this.random()},createPid:function(){var t=this.get("win"),e="__qq_qidian_da_pid",n=t[e],r=this._calQDAValue(n);r||(r=this._genId(),t[e]=this._genQDAValue(r)),this.set("pid",r)},createQid:function(){var t,e,n=this.get("win");if(this.supportCookie){var r="_qddaz",i=31536e6;t=nt(r)[0],e=this._calQDAValue(t),e||(e=this._genId()),t=this._genQDAValue(e);var o=it(r,t,n,i,["qq.com"]);o||rt(r,t,n,i,null,"/")}else{var a="__qq_qidian_da_pid";t=n[a],e=this._calQDAValue(t),e||(e=this._genId()),n[a]=this._genQDAValue(e)}this.set("qid",e)},getCommonData:function(t){var e=new ne;e.prefix("v",this.get("ver")),e.prefix("tid",this.get("tid")),e.prefix("aid",this.get("aid")),e.prefix("pid",this.get("pid")),e.prefix("qid",this.get("qid"));var n=this.get("cid"),r=this.get("src"),i=this.get("pgv_pvi");return r&&e.prefix("src",r),n&&e.prefix("cid",n),i&&e.prefix("pgv_pvi",i),e.prefix("sid",this.getSid(t)),e.suffix("t",z(+new Date)),e},getCommonQuery:function(t){return L(this.getCommonData(t).toJSON())},getFullApi:function(t){return this.get("ts")+t},ping:function(t,e,n){"pc"===t&&this.setClosedSid();var r=this.tasks.pq;r.push(t,e,n||0)},task:function(t){var e=this.tasks[t];if(!e){var n=gt.get(t);if(!n)return void this.flag(8);e=this.tasks[t]=new n}var r=Z(arguments,1);e.run(this,r)},remove:function(){for(var t in this.tasks)this.tasks.hasOwnProperty(t)&&this.tasks[t].remove(this)},random:function(){return w()+"."+z(+new Date)},flag:function(t){J.flag(t,this.id)},wrap:function(t,e,n){return ce.wrap(t,e,n,this)},sendError:function(t,e,n,r,i){ce.sendError(t,e,n,r,this.id,this.getCommonQuery(!0),i)}},ee(ue.prototype,se),Yt(ue,Zt),e(function(){O.start("rdy",v);var t=n("i",d,f),e=t.wrap("run",Y,1),r=t.wrap("init",function(e){var n={win:e,version:d,trackers:{},loadedTrackers:{},ready:function(t){J.flag(5),t.call(this)},create:function(t,n,r,i){"string"!=typeof n&&(i=r,r=n,n="");var o=t+(n?"|"+n:"");if(!this.loadedTrackers[o]){this.loadedTrackers[o]=!0;var a,s;if("string"==typeof r?(s=r,a=i||{}):(a=r||{},s=null==i?"_"+w():i),this.trackers[s])throw new Error('Tracker name: "'+s+'" exist.');a.aid=n,a.tid=t,a.win=e,a.doc=e.document,a.ver=this.version,a.ptc=l,a.ts=f,a.ss=p,a.hbt=5e3,this.trackers[s]=new ue(this,o,s,a)}},getTracker:function(t){return this.trackers[t]},eachTracker:function(t){for(var e in this.trackers)this.trackers.hasOwnProperty(e)&&t(e)}};t.wrap("create",n,4);var r="set";tt(a,n,c,t.wrap("mqp-cb",function(t,e,n){if("create"===e)return void t[e].apply(t,n);var i=e.split("."),o=i[1]||i[0],a=2===i.length?i[0]:null,s=function(e){var i=t.getTracker(e);!i||r.indexOf(o)<0||"function"!=typeof i[o]||i[o].apply(i,n)};null==a?t.eachTracker(s):s(a)},3))},2);e(o,r)},o)}}}();