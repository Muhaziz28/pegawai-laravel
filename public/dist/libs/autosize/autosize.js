!function(e,t){for(var n in t)e[n]=t[n]}(window,function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}return n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=202)}({202:function(e,t,n){"use strict";n.r(t);var o=n(26);n.d(t,"autosize",(function(){return o}))},26:function(e,t,n){var o,r,i;
/*!
	autosize 4.0.2
	license: MIT
	http://www.jacklmoore.com/autosize
*/r=[e,t],void 0===(i="function"==typeof(o=function(e,t){"use strict";var n,o,r="function"==typeof Map?new Map:(n=[],o=[],{has:function(e){return n.indexOf(e)>-1},get:function(e){return o[n.indexOf(e)]},set:function(e,t){-1===n.indexOf(e)&&(n.push(e),o.push(t))},delete:function(e){var t=n.indexOf(e);t>-1&&(n.splice(t,1),o.splice(t,1))}}),i=function(e){return new Event(e,{bubbles:!0})};try{new Event("test")}catch(e){i=function(e){var t=document.createEvent("Event");return t.initEvent(e,!0,!1),t}}function u(e){if(e&&e.nodeName&&"TEXTAREA"===e.nodeName&&!r.has(e)){var t,n=null,o=null,u=null,l=function(){e.clientWidth!==o&&c()},d=function(t){window.removeEventListener("resize",l,!1),e.removeEventListener("input",c,!1),e.removeEventListener("keyup",c,!1),e.removeEventListener("autosize:destroy",d,!1),e.removeEventListener("autosize:update",c,!1),Object.keys(t).forEach((function(n){e.style[n]=t[n]})),r.delete(e)}.bind(e,{height:e.style.height,resize:e.style.resize,overflowY:e.style.overflowY,overflowX:e.style.overflowX,wordWrap:e.style.wordWrap});e.addEventListener("autosize:destroy",d,!1),"onpropertychange"in e&&"oninput"in e&&e.addEventListener("keyup",c,!1),window.addEventListener("resize",l,!1),e.addEventListener("input",c,!1),e.addEventListener("autosize:update",c,!1),e.style.overflowX="hidden",e.style.wordWrap="break-word",r.set(e,{destroy:d,update:c}),"vertical"===(t=window.getComputedStyle(e,null)).resize?e.style.resize="none":"both"===t.resize&&(e.style.resize="horizontal"),n="content-box"===t.boxSizing?-(parseFloat(t.paddingTop)+parseFloat(t.paddingBottom)):parseFloat(t.borderTopWidth)+parseFloat(t.borderBottomWidth),isNaN(n)&&(n=0),c()}function a(t){var n=e.style.width;e.style.width="0px",e.offsetWidth,e.style.width=n,e.style.overflowY=t}function s(){if(0!==e.scrollHeight){var t=function(e){for(var t=[];e&&e.parentNode&&e.parentNode instanceof Element;)e.parentNode.scrollTop&&t.push({node:e.parentNode,scrollTop:e.parentNode.scrollTop}),e=e.parentNode;return t}(e),r=document.documentElement&&document.documentElement.scrollTop;e.style.height="",e.style.height=e.scrollHeight+n+"px",o=e.clientWidth,t.forEach((function(e){e.node.scrollTop=e.scrollTop})),r&&(document.documentElement.scrollTop=r)}}function c(){s();var t=Math.round(parseFloat(e.style.height)),n=window.getComputedStyle(e,null),o="content-box"===n.boxSizing?Math.round(parseFloat(n.height)):e.offsetHeight;if(o<t?"hidden"===n.overflowY&&(a("scroll"),s(),o="content-box"===n.boxSizing?Math.round(parseFloat(window.getComputedStyle(e,null).height)):e.offsetHeight):"hidden"!==n.overflowY&&(a("hidden"),s(),o="content-box"===n.boxSizing?Math.round(parseFloat(window.getComputedStyle(e,null).height)):e.offsetHeight),u!==o){u=o;var r=i("autosize:resized");try{e.dispatchEvent(r)}catch(e){}}}}function l(e){var t=r.get(e);t&&t.destroy()}function d(e){var t=r.get(e);t&&t.update()}var a=null;"undefined"==typeof window||"function"!=typeof window.getComputedStyle?((a=function(e){return e}).destroy=function(e){return e},a.update=function(e){return e}):((a=function(e,t){return e&&Array.prototype.forEach.call(e.length?e:[e],(function(e){return u(e)})),e}).destroy=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],l),e},a.update=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],d),e}),t.default=a,e.exports=t.default})?o.apply(t,r):o)||(e.exports=i)}}));