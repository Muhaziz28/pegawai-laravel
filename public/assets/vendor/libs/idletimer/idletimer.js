(function(e, a) { for(var i in a) e[i] = a[i]; }(window, /******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./libs/idletimer/idletimer.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./libs/idletimer/idletimer.js":
/*!*************************************!*\
  !*** ./libs/idletimer/idletimer.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("function _typeof(obj) { \"@babel/helpers - typeof\"; if (typeof Symbol === \"function\" && typeof Symbol.iterator === \"symbol\") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === \"function\" && obj.constructor === Symbol && obj !== Symbol.prototype ? \"symbol\" : typeof obj; }; } return _typeof(obj); }\n\n/*! Idle Timer - v1.1.1 - 2020-06-25\n * https://github.com/thorst/jquery-idletimer\n * Copyright (c) 2020 Paul Irish; Licensed MIT */\n\n/*\n\tmousewheel (deprecated) -> IE6.0, Chrome, Opera, Safari\n\tDOMMouseScroll (deprecated) -> Firefox 1.0\n\twheel (standard) -> Chrome 31, Firefox 17, IE9, Firefox Mobile 17.0\n\n\t//No need to use, use DOMMouseScroll\n\tMozMousePixelScroll -> Firefox 3.5, Firefox Mobile 1.0\n\n\t//Events\n\tWheelEvent -> see wheel\n\tMouseWheelEvent -> see mousewheel\n\tMouseScrollEvent -> Firefox 3.5, Firefox Mobile 1.0\n*/\n(function ($) {\n  $.idleTimer = function (firstParam, elem) {\n    var opts;\n\n    if (_typeof(firstParam) === 'object') {\n      opts = firstParam;\n      firstParam = null;\n    } else if (typeof firstParam === 'number') {\n      opts = {\n        timeout: firstParam\n      };\n      firstParam = null;\n    } // element to watch\n\n\n    elem = elem || document; // defaults that are to be stored as instance props on the elem\n\n    opts = $.extend({\n      idle: false,\n      // indicates if the user is idle\n      timeout: 30000,\n      // the amount of time (ms) before the user is considered idle\n      events: 'mousemove keydown wheel DOMMouseScroll mousewheel mousedown touchstart touchmove MSPointerDown MSPointerMove' // define active events\n\n    }, opts);\n\n    var jqElem = $(elem),\n        obj = jqElem.data('idleTimerObj') || {},\n\n    /* (intentionally not documented)\n     * Toggles the idle state and fires an appropriate event.\n     * @return {void}\n     */\n    toggleIdleState = function toggleIdleState(e) {\n      var obj = $.data(elem, 'idleTimerObj') || {}; // toggle the state\n\n      obj.idle = !obj.idle; // store toggle state date time\n\n      obj.olddate = +new Date(); // create a custom event, with state and name space\n\n      var event = $.Event((obj.idle ? 'idle' : 'active') + '.idleTimer'); // trigger event on object with elem and copy of obj\n\n      $(elem).trigger(event, [elem, $.extend({}, obj), e]);\n    },\n\n    /**\n     * Handle event triggers\n     * @return {void}\n     * @method event\n     * @static\n     */\n    handleEvent = function handleEvent(e) {\n      var obj = $.data(elem, 'idleTimerObj') || {}; // ignore writting to storage unless related to idleTimer\n\n      if (e.type === 'storage' && e.originalEvent.key !== obj.timerSyncId) {\n        return;\n      } // this is already paused, ignore events for now\n\n\n      if (obj.remaining != null) {\n        return;\n      }\n      /*\n            mousemove is kinda buggy, it can be triggered when it should be idle.\n            Typically is happening between 115 - 150 milliseconds after idle triggered.\n            @psyafter & @kaellis report \"always triggered if using modal (jQuery ui, with overlay)\"\n            @thorst has similar issues on ios7 \"after $.scrollTop() on text area\"\n            */\n\n\n      if (e.type === 'mousemove') {\n        // if coord are same, it didn't move\n        if (e.pageX === obj.pageX && e.pageY === obj.pageY) {\n          return;\n        } // if coord don't exist how could it move\n\n\n        if (typeof e.pageX === 'undefined' && typeof e.pageY === 'undefined') {\n          return;\n        } // under 200 ms is hard to do, and you would have to stop, as continuous activity will bypass this\n\n\n        var elapsed = +new Date() - obj.olddate;\n\n        if (elapsed < 200) {\n          return;\n        }\n      } // clear any existing timeout\n\n\n      clearTimeout(obj.tId); // if the idle timer is enabled, flip\n\n      if (obj.idle) {\n        toggleIdleState(e);\n      } // store when user was last active\n\n\n      obj.lastActive = +new Date(); // update mouse coord\n\n      obj.pageX = e.pageX;\n      obj.pageY = e.pageY; // sync lastActive\n\n      if (e.type !== 'storage' && obj.timerSyncId) {\n        if (typeof localStorage !== 'undefined') {\n          localStorage.setItem(obj.timerSyncId, obj.lastActive);\n        }\n      } // set a new timeout\n\n\n      obj.tId = setTimeout(toggleIdleState, obj.timeout);\n    },\n\n    /**\n     * Restore initial settings and restart timer\n     * @return {void}\n     * @method reset\n     * @static\n     */\n    reset = function reset() {\n      var obj = $.data(elem, 'idleTimerObj') || {}; // reset settings\n\n      obj.idle = obj.idleBackup;\n      obj.olddate = +new Date();\n      obj.lastActive = obj.olddate;\n      obj.remaining = null; // reset Timers\n\n      clearTimeout(obj.tId);\n\n      if (!obj.idle) {\n        obj.tId = setTimeout(toggleIdleState, obj.timeout);\n      }\n    },\n\n    /**\n     * Store remaining time, stop timer\n     * You can pause from an idle OR active state\n     * @return {void}\n     * @method pause\n     * @static\n     */\n    pause = function pause() {\n      var obj = $.data(elem, 'idleTimerObj') || {}; // this is already paused\n\n      if (obj.remaining != null) {\n        return;\n      } // define how much is left on the timer\n\n\n      obj.remaining = obj.timeout - (+new Date() - obj.olddate); // clear any existing timeout\n\n      clearTimeout(obj.tId);\n    },\n\n    /**\n     * Start timer with remaining value\n     * @return {void}\n     * @method resume\n     * @static\n     */\n    resume = function resume() {\n      var obj = $.data(elem, 'idleTimerObj') || {}; // this isn't paused yet\n\n      if (obj.remaining == null) {\n        return;\n      } // start timer\n\n\n      if (!obj.idle) {\n        obj.tId = setTimeout(toggleIdleState, obj.remaining);\n      } // clear remaining\n\n\n      obj.remaining = null;\n    },\n\n    /**\n     * Stops the idle timer. This removes appropriate event handlers\n     * and cancels any pending timeouts.\n     * @return {void}\n     * @method destroy\n     * @static\n     */\n    destroy = function destroy() {\n      var obj = $.data(elem, 'idleTimerObj') || {}; //clear any pending timeouts\n\n      clearTimeout(obj.tId); //Remove data\n\n      jqElem.removeData('idleTimerObj'); //detach the event handlers\n\n      jqElem.off('._idleTimer');\n    },\n\n    /**\n     * Returns the time until becoming idle\n     * @return {number}\n     * @method remainingtime\n     * @static\n     */\n    remainingtime = function remainingtime() {\n      var obj = $.data(elem, 'idleTimerObj') || {}; //If idle there is no time remaining\n\n      if (obj.idle) {\n        return 0;\n      } //If its paused just return that\n\n\n      if (obj.remaining != null) {\n        return obj.remaining;\n      } //Determine remaining, if negative idle didn't finish flipping, just return 0\n\n\n      var remaining = obj.timeout - (+new Date() - obj.lastActive);\n\n      if (remaining < 0) {\n        remaining = 0;\n      } //If this is paused return that number, else return current remaining\n\n\n      return remaining;\n    }; // determine which function to call\n\n\n    if (firstParam === null && typeof obj.idle !== 'undefined') {\n      // they think they want to init, but it already is, just reset\n      reset();\n      return jqElem;\n    } else if (firstParam === null) {// they want to init\n    } else if (firstParam !== null && typeof obj.idle === 'undefined') {\n      // they want to do something, but it isnt init\n      // not sure the best way to handle this\n      return false;\n    } else if (firstParam === 'destroy') {\n      destroy();\n      return jqElem;\n    } else if (firstParam === 'pause') {\n      pause();\n      return jqElem;\n    } else if (firstParam === 'resume') {\n      resume();\n      return jqElem;\n    } else if (firstParam === 'reset') {\n      reset();\n      return jqElem;\n    } else if (firstParam === 'getRemainingTime') {\n      return remainingtime();\n    } else if (firstParam === 'getElapsedTime') {\n      return +new Date() - obj.olddate;\n    } else if (firstParam === 'getLastActiveTime') {\n      return obj.lastActive;\n    } else if (firstParam === 'isIdle') {\n      return obj.idle;\n    } // Test via a getter in the options object to see if the passive property is accessed\n    // This isnt working in jquery, though is planned for 4.0\n    // https://github.com/jquery/jquery/issues/2871\n\n    /*var supportsPassive = false;\n      try {\n          var Popts = Object.defineProperty({}, \"passive\", {\n              get: function() {\n                  supportsPassive = true;\n              }\n          });\n          window.addEventListener(\"test\", null, Popts);\n      } catch (e) {}\n    */\n\n    /* (intentionally not documented)\n     * Handles a user event indicating that the user isn't idle. namespaced with internal idleTimer\n     * @param {Event} event A DOM2-normalized event object.\n     * @return {void}\n     */\n\n\n    jqElem.on((opts.events + ' ').split(' ').join('._idleTimer ').trim(), function (e) {\n      handleEvent(e);\n    }); //}, supportsPassive ? { passive: true } : false);\n\n    if (opts.timerSyncId) {\n      $(window).on('storage', handleEvent);\n    } // Internal Object Properties, This isn't all necessary, but we\n    // explicitly define all keys here so we know what we are working with\n\n\n    obj = $.extend({}, {\n      olddate: +new Date(),\n      // the last time state changed\n      lastActive: +new Date(),\n      // the last time timer was active\n      idle: opts.idle,\n      // current state\n      idleBackup: opts.idle,\n      // backup of idle parameter since it gets modified\n      timeout: opts.timeout,\n      // the interval to change state\n      remaining: null,\n      // how long until state changes\n      timerSyncId: opts.timerSyncId,\n      // localStorage key to use for syncing this timer\n      tId: null,\n      // the idle timer setTimeout\n      pageX: null,\n      // used to store the mouse coord\n      pageY: null\n    }); // set a timeout to toggle state. May wish to omit this in some situations\n\n    if (!obj.idle) {\n      obj.tId = setTimeout(toggleIdleState, obj.timeout);\n    } // store our instance on the object\n\n\n    $.data(elem, 'idleTimerObj', obj);\n    return jqElem;\n  }; // This allows binding to element\n\n\n  $.fn.idleTimer = function (firstParam) {\n    if (this[0]) {\n      return $.idleTimer(firstParam, this[0]);\n    }\n\n    return this;\n  };\n})(jQuery);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9saWJzL2lkbGV0aW1lci9pZGxldGltZXIuanM/ZDkzNSJdLCJuYW1lcyI6WyIkIiwiaWRsZVRpbWVyIiwiZmlyc3RQYXJhbSIsImVsZW0iLCJvcHRzIiwidGltZW91dCIsImRvY3VtZW50IiwiZXh0ZW5kIiwiaWRsZSIsImV2ZW50cyIsImpxRWxlbSIsIm9iaiIsImRhdGEiLCJ0b2dnbGVJZGxlU3RhdGUiLCJlIiwib2xkZGF0ZSIsIkRhdGUiLCJldmVudCIsIkV2ZW50IiwidHJpZ2dlciIsImhhbmRsZUV2ZW50IiwidHlwZSIsIm9yaWdpbmFsRXZlbnQiLCJrZXkiLCJ0aW1lclN5bmNJZCIsInJlbWFpbmluZyIsInBhZ2VYIiwicGFnZVkiLCJlbGFwc2VkIiwiY2xlYXJUaW1lb3V0IiwidElkIiwibGFzdEFjdGl2ZSIsImxvY2FsU3RvcmFnZSIsInNldEl0ZW0iLCJzZXRUaW1lb3V0IiwicmVzZXQiLCJpZGxlQmFja3VwIiwicGF1c2UiLCJyZXN1bWUiLCJkZXN0cm95IiwicmVtb3ZlRGF0YSIsIm9mZiIsInJlbWFpbmluZ3RpbWUiLCJvbiIsInNwbGl0Iiwiam9pbiIsInRyaW0iLCJ3aW5kb3ciLCJmbiIsImpRdWVyeSJdLCJtYXBwaW5ncyI6Ijs7QUFBQTtBQUNBO0FBQ0E7O0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDLFVBQVVBLENBQVYsRUFBYTtBQUNaQSxHQUFDLENBQUNDLFNBQUYsR0FBYyxVQUFVQyxVQUFWLEVBQXNCQyxJQUF0QixFQUE0QjtBQUN4QyxRQUFJQyxJQUFKOztBQUNBLFFBQUksUUFBT0YsVUFBUCxNQUFzQixRQUExQixFQUFvQztBQUNsQ0UsVUFBSSxHQUFHRixVQUFQO0FBQ0FBLGdCQUFVLEdBQUcsSUFBYjtBQUNELEtBSEQsTUFHTyxJQUFJLE9BQU9BLFVBQVAsS0FBc0IsUUFBMUIsRUFBb0M7QUFDekNFLFVBQUks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QjtBQUNELEtBalR1QyxDQW1UeEM7OztBQUNBTCxLQUFDLENBQUNZLElBQUYsQ0FBT1QsSUFBUCxFQUFhLGNBQWIsRUFBNkJRLEdBQTdCO0FBRUEsV0FBT0QsTUFBUDtBQUNELEdBdlRELENBRFksQ0EwVFo7OztBQUNBVixHQUFDLENBQUNnRCxFQUFGLENBQUsvQyxTQUFMLEdBQWlCLFVBQVVDLFVBQVYsRUFBc0I7QUFDckMsUUFBSSxLQUFLLENBQUwsQ0FBSixFQUFhO0FBQ1gsYUFBT0YsQ0FBQyxDQUFDQyxTQUFGLENBQVlDLFVBQVosRUFBd0IsS0FBSyxDQUFMLENBQXhCLENBQVA7QUFDRDs7QUFFRCxXQUFPLElBQVA7QUFDRCxHQU5EO0FBT0QsQ0FsVUQsRUFrVUcrQyxNQWxVSCIsImZpbGUiOiIuL2xpYnMvaWRsZXRpbWVyL2lkbGV0aW1lci5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8qISBJZGxlIFRpbWVyIC0gdjEuMS4xIC0gMjAyMC0wNi0yNVxuICogaHR0cHM6Ly9naXRodWIuY29tL3Rob3JzdC9qcXVlcnktaWRsZXRpbWVyXG4gKiBDb3B5cmlnaHQgKGMpIDIwMjAgUGF1bCBJcmlzaDsgTGljZW5zZWQgTUlUICovXG4vKlxuXHRtb3VzZXdoZWVsIChkZXByZWNhdGVkKSAtPiBJRTYuMCwgQ2hyb21lLCBPcGVyYSwgU2FmYXJpXG5cdERPTU1vdXNlU2Nyb2xsIChkZXByZWNhdGVkKSAtPiBGaXJlZm94IDEuMFxuXHR3aGVlbCAoc3RhbmRhcmQpIC0+IENocm9tZSAzMSwgRmlyZWZveCAxNywgSUU5LCBGaXJlZm94IE1vYmlsZSAxNy4wXG5cblx0Ly9ObyBuZWVkIHRvIHVzZSwgdXNlIERPTU1vdXNlU2Nyb2xsXG5cdE1vek1vdXNlUGl4ZWxTY3JvbGwgLT4gRmlyZWZveCAzLjUsIEZpcmVmb3ggTW9iaWxlIDEuMFxuXG5cdC8vRXZlbnRzXG5cdFdoZWVsRXZlbnQgLT4gc2VlIHdoZWVsXG5cdE1vdXNlV2hlZWxFdmVudCAtPiBzZWUgbW91c2V3aGVlbFxuXHRNb3VzZVNjcm9sbEV2ZW50IC0+IEZpcmVmb3ggMy41LCBGaXJlZm94IE1vYmlsZSAxLjBcbiovXG4oZnVuY3Rpb24gKCQpIHtcbiAgJC5pZGxlVGltZXIgPSBmdW5jdGlvbiAoZmlyc3RQYXJhbSwgZWxlbSkge1xuICAgIHZhciBvcHRzO1xuICAgIGlmICh0eXBlb2YgZmlyc3RQYXJhbSA9PT0gJ29iamVjdCcpIHtcbiAgICAgIG9wdHMgPSBmaXJzdFBhcmFtO1xuICAgICAgZmlyc3RQYXJhbSA9IG51bGw7XG4gICAgfSBlbHNlIGlmICh0eXBlb2YgZmlyc3RQYXJhbSA9PT0gJ251bWJlcicpIHtcbiAgICAgIG9wdHMgPSB7IHRpbWVvdXQ6IGZpcnN0UGFyYW0gfTtcbiAgICAgIGZpcnN0UGFyYW0gPSBudWxsO1xuICAgIH1cblxuICAgIC8vIGVsZW1lbnQgdG8gd2F0Y2hcbiAgICBlbGVtID0gZWxlbSB8fCBkb2N1bWVudDtcblxuICAgIC8vIGRlZmF1bHRzIHRoYXQgYXJlIHRvIGJlIHN0b3JlZCBhcyBpbnN0YW5jZSBwcm9wcyBvbiB0aGUgZWxlbVxuICAgIG9wdHMgPSAkLmV4dGVuZChcbiAgICAgIHtcbiAgICAgICAgaWRsZTogZmFsc2UsIC8vIGluZGljYXRlcyBpZiB0aGUgdXNlciBpcyBpZGxlXG4gICAgICAgIHRpbWVvdXQ6IDMwMDAwLCAvLyB0aGUgYW1vdW50IG9mIHRpbWUgKG1zKSBiZWZvcmUgdGhlIHVzZXIgaXMgY29uc2lkZXJlZCBpZGxlXG4gICAgICAgIGV2ZW50czpcbiAgICAgICAgICAnbW91c2Vtb3ZlIGtleWRvd24gd2hlZWwgRE9NTW91c2VTY3JvbGwgbW91c2V3aGVlbCBtb3VzZWRvd24gdG91Y2hzdGFydCB0b3VjaG1vdmUgTVNQb2ludGVyRG93biBNU1BvaW50ZXJNb3ZlJyAvLyBkZWZpbmUgYWN0aXZlIGV2ZW50c1xuICAgICAgfSxcbiAgICAgIG9wdHNcbiAgICApO1xuXG4gICAgdmFyIGpxRWxlbSA9ICQoZWxlbSksXG4gICAgICBvYmogPSBqcUVsZW0uZGF0YSgnaWRsZVRpbWVyT2JqJykgfHwge30sXG4gICAgICAvKiAoaW50ZW50aW9uYWxseSBub3QgZG9jdW1lbnRlZClcbiAgICAgICAqIFRvZ2dsZXMgdGhlIGlkbGUgc3RhdGUgYW5kIGZpcmVzIGFuIGFwcHJvcHJpYXRlIGV2ZW50LlxuICAgICAgICogQHJldHVybiB7dm9pZH1cbiAgICAgICAqL1xuICAgICAgdG9nZ2xlSWRsZVN0YXRlID0gZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgdmFyIG9iaiA9ICQuZGF0YShlbGVtLCAnaWRsZVRpbWVyT2JqJykgfHwge307XG5cbiAgICAgICAgLy8gdG9nZ2xlIHRoZSBzdGF0ZVxuICAgICAgICBvYmouaWRsZSA9ICFvYmouaWRsZTtcblxuICAgICAgICAvLyBzdG9yZSB0b2dnbGUgc3RhdGUgZGF0ZSB0aW1lXG4gICAgICAgIG9iai5vbGRkYXRlID0gK25ldyBEYXRlKCk7XG5cbiAgICAgICAgLy8gY3JlYXRlIGEgY3VzdG9tIGV2ZW50LCB3aXRoIHN0YXRlIGFuZCBuYW1lIHNwYWNlXG4gICAgICAgIHZhciBldmVudCA9ICQuRXZlbnQoKG9iai5pZGxlID8gJ2lkbGUnIDogJ2FjdGl2ZScpICsgJy5pZGxlVGltZXInKTtcblxuICAgICAgICAvLyB0cmlnZ2VyIGV2ZW50IG9uIG9iamVjdCB3aXRoIGVsZW0gYW5kIGNvcHkgb2Ygb2JqXG4gICAgICAgICQoZWxlbSkudHJpZ2dlcihldmVudCwgW2VsZW0sICQuZXh0ZW5kKHt9LCBvYmopLCBlXSk7XG4gICAgICB9LFxuICAgICAgLyoqXG4gICAgICAgKiBIYW5kbGUgZXZlbnQgdHJpZ2dlcnNcbiAgICAgICAqIEByZXR1cm4ge3ZvaWR9XG4gICAgICAgKiBAbWV0aG9kIGV2ZW50XG4gICAgICAgKiBAc3RhdGljXG4gICAgICAgKi9cbiAgICAgIGhhbmRsZUV2ZW50ID0gZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgdmFyIG9iaiA9ICQuZGF0YShlbGVtLCAnaWRsZVRpbWVyT2JqJykgfHwge307XG5cbiAgICAgICAgLy8gaWdub3JlIHdyaXR0aW5nIHRvIHN0b3JhZ2UgdW5sZXNzIHJlbGF0ZWQgdG8gaWRsZVRpbWVyXG4gICAgICAgIGlmIChlLnR5cGUgPT09ICdzdG9yYWdlJyAmJiBlLm9yaWdpbmFsRXZlbnQua2V5ICE9PSBvYmoudGltZXJTeW5jSWQpIHtcbiAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICAvLyB0aGlzIGlzIGFscmVhZHkgcGF1c2VkLCBpZ25vcmUgZXZlbnRzIGZvciBub3dcbiAgICAgICAgaWYgKG9iai5yZW1haW5pbmcgIT0gbnVsbCkge1xuICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuXG4gICAgICAgIC8qXG4gICAgICAgICAgICAgIG1vdXNlbW92ZSBpcyBraW5kYSBidWdneSwgaXQgY2FuIGJlIHRyaWdnZXJlZCB3aGVuIGl0IHNob3VsZCBiZSBpZGxlLlxuICAgICAgICAgICAgICBUeXBpY2FsbHkgaXMgaGFwcGVuaW5nIGJldHdlZW4gMTE1IC0gMTUwIG1pbGxpc2Vjb25kcyBhZnRlciBpZGxlIHRyaWdnZXJlZC5cbiAgICAgICAgICAgICAgQHBzeWFmdGVyICYgQGthZWxsaXMgcmVwb3J0IFwiYWx3YXlzIHRyaWdnZXJlZCBpZiB1c2luZyBtb2RhbCAoalF1ZXJ5IHVpLCB3aXRoIG92ZXJsYXkpXCJcbiAgICAgICAgICAgICAgQHRob3JzdCBoYXMgc2ltaWxhciBpc3N1ZXMgb24gaW9zNyBcImFmdGVyICQuc2Nyb2xsVG9wKCkgb24gdGV4dCBhcmVhXCJcbiAgICAgICAgICAgICAgKi9cbiAgICAgICAgaWYgKGUudHlwZSA9PT0gJ21vdXNlbW92ZScpIHtcbiAgICAgICAgICAvLyBpZiBjb29yZCBhcmUgc2FtZSwgaXQgZGlkbid0IG1vdmVcbiAgICAgICAgICBpZiAoZS5wYWdlWCA9PT0gb2JqLnBhZ2VYICYmIGUucGFnZVkgPT09IG9iai5wYWdlWSkge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICAgIH1cbiAgICAgICAgICAvLyBpZiBjb29yZCBkb24ndCBleGlzdCBob3cgY291bGQgaXQgbW92ZVxuICAgICAgICAgIGlmICh0eXBlb2YgZS5wYWdlWCA9PT0gJ3VuZGVmaW5lZCcgJiYgdHlwZW9mIGUucGFnZVkgPT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgICAgfVxuICAgICAgICAgIC8vIHVuZGVyIDIwMCBtcyBpcyBoYXJkIHRvIGRvLCBhbmQgeW91IHdvdWxkIGhhdmUgdG8gc3RvcCwgYXMgY29udGludW91cyBhY3Rpdml0eSB3aWxsIGJ5cGFzcyB0aGlzXG4gICAgICAgICAgdmFyIGVsYXBzZWQgPSArbmV3IERhdGUoKSAtIG9iai5vbGRkYXRlO1xuICAgICAgICAgIGlmIChlbGFwc2VkIDwgMjAwKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgICAgfVxuICAgICAgICB9XG5cbiAgICAgICAgLy8gY2xlYXIgYW55IGV4aXN0aW5nIHRpbWVvdXRcbiAgICAgICAgY2xlYXJUaW1lb3V0KG9iai50SWQpO1xuXG4gICAgICAgIC8vIGlmIHRoZSBpZGxlIHRpbWVyIGlzIGVuYWJsZWQsIGZsaXBcbiAgICAgICAgaWYgKG9iai5pZGxlKSB7XG4gICAgICAgICAgdG9nZ2xlSWRsZVN0YXRlKGUpO1xuICAgICAgICB9XG5cbiAgICAgICAgLy8gc3RvcmUgd2hlbiB1c2VyIHdhcyBsYXN0IGFjdGl2ZVxuICAgICAgICBvYmoubGFzdEFjdGl2ZSA9ICtuZXcgRGF0ZSgpO1xuXG4gICAgICAgIC8vIHVwZGF0ZSBtb3VzZSBjb29yZFxuICAgICAgICBvYmoucGFnZVggPSBlLnBhZ2VYO1xuICAgICAgICBvYmoucGFnZVkgPSBlLnBhZ2VZO1xuXG4gICAgICAgIC8vIHN5bmMgbGFzdEFjdGl2ZVxuICAgICAgICBpZiAoZS50eXBlICE9PSAnc3RvcmFnZScgJiYgb2JqLnRpbWVyU3luY0lkKSB7XG4gICAgICAgICAgaWYgKHR5cGVvZiBsb2NhbFN0b3JhZ2UgIT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgICAgICBsb2NhbFN0b3JhZ2Uuc2V0SXRlbShvYmoudGltZXJTeW5jSWQsIG9iai5sYXN0QWN0aXZlKTtcbiAgICAgICAgICB9XG4gICAgICAgIH1cblxuICAgICAgICAvLyBzZXQgYSBuZXcgdGltZW91dFxuICAgICAgICBvYmoudElkID0gc2V0VGltZW91dCh0b2dnbGVJZGxlU3RhdGUsIG9iai50aW1lb3V0KTtcbiAgICAgIH0sXG4gICAgICAvKipcbiAgICAgICAqIFJlc3RvcmUgaW5pdGlhbCBzZXR0aW5ncyBhbmQgcmVzdGFydCB0aW1lclxuICAgICAgICogQHJldHVybiB7dm9pZH1cbiAgICAgICAqIEBtZXRob2QgcmVzZXRcbiAgICAgICAqIEBzdGF0aWNcbiAgICAgICAqL1xuICAgICAgcmVzZXQgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciBvYmogPSAkLmRhdGEoZWxlbSwgJ2lkbGVUaW1lck9iaicpIHx8IHt9O1xuXG4gICAgICAgIC8vIHJlc2V0IHNldHRpbmdzXG4gICAgICAgIG9iai5pZGxlID0gb2JqLmlkbGVCYWNrdXA7XG4gICAgICAgIG9iai5vbGRkYXRlID0gK25ldyBEYXRlKCk7XG4gICAgICAgIG9iai5sYXN0QWN0aXZlID0gb2JqLm9sZGRhdGU7XG4gICAgICAgIG9iai5yZW1haW5pbmcgPSBudWxsO1xuXG4gICAgICAgIC8vIHJlc2V0IFRpbWVyc1xuICAgICAgICBjbGVhclRpbWVvdXQob2JqLnRJZCk7XG4gICAgICAgIGlmICghb2JqLmlkbGUpIHtcbiAgICAgICAgICBvYmoudElkID0gc2V0VGltZW91dCh0b2dnbGVJZGxlU3RhdGUsIG9iai50aW1lb3V0KTtcbiAgICAgICAgfVxuICAgICAgfSxcbiAgICAgIC8qKlxuICAgICAgICogU3RvcmUgcmVtYWluaW5nIHRpbWUsIHN0b3AgdGltZXJcbiAgICAgICAqIFlvdSBjYW4gcGF1c2UgZnJvbSBhbiBpZGxlIE9SIGFjdGl2ZSBzdGF0ZVxuICAgICAgICogQHJldHVybiB7dm9pZH1cbiAgICAgICAqIEBtZXRob2QgcGF1c2VcbiAgICAgICAqIEBzdGF0aWNcbiAgICAgICAqL1xuICAgICAgcGF1c2UgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciBvYmogPSAkLmRhdGEoZWxlbSwgJ2lkbGVUaW1lck9iaicpIHx8IHt9O1xuXG4gICAgICAgIC8vIHRoaXMgaXMgYWxyZWFkeSBwYXVzZWRcbiAgICAgICAgaWYgKG9iai5yZW1haW5pbmcgIT0gbnVsbCkge1xuICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuXG4gICAgICAgIC8vIGRlZmluZSBob3cgbXVjaCBpcyBsZWZ0IG9uIHRoZSB0aW1lclxuICAgICAgICBvYmoucmVtYWluaW5nID0gb2JqLnRpbWVvdXQgLSAoK25ldyBEYXRlKCkgLSBvYmoub2xkZGF0ZSk7XG5cbiAgICAgICAgLy8gY2xlYXIgYW55IGV4aXN0aW5nIHRpbWVvdXRcbiAgICAgICAgY2xlYXJUaW1lb3V0KG9iai50SWQpO1xuICAgICAgfSxcbiAgICAgIC8qKlxuICAgICAgICogU3RhcnQgdGltZXIgd2l0aCByZW1haW5pbmcgdmFsdWVcbiAgICAgICAqIEByZXR1cm4ge3ZvaWR9XG4gICAgICAgKiBAbWV0aG9kIHJlc3VtZVxuICAgICAgICogQHN0YXRpY1xuICAgICAgICovXG4gICAgICByZXN1bWUgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciBvYmogPSAkLmRhdGEoZWxlbSwgJ2lkbGVUaW1lck9iaicpIHx8IHt9O1xuXG4gICAgICAgIC8vIHRoaXMgaXNuJ3QgcGF1c2VkIHlldFxuICAgICAgICBpZiAob2JqLnJlbWFpbmluZyA9PSBudWxsKSB7XG4gICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgLy8gc3RhcnQgdGltZXJcbiAgICAgICAgaWYgKCFvYmouaWRsZSkge1xuICAgICAgICAgIG9iai50SWQgPSBzZXRUaW1lb3V0KHRvZ2dsZUlkbGVTdGF0ZSwgb2JqLnJlbWFpbmluZyk7XG4gICAgICAgIH1cblxuICAgICAgICAvLyBjbGVhciByZW1haW5pbmdcbiAgICAgICAgb2JqLnJlbWFpbmluZyA9IG51bGw7XG4gICAgICB9LFxuICAgICAgLyoqXG4gICAgICAgKiBTdG9wcyB0aGUgaWRsZSB0aW1lci4gVGhpcyByZW1vdmVzIGFwcHJvcHJpYXRlIGV2ZW50IGhhbmRsZXJzXG4gICAgICAgKiBhbmQgY2FuY2VscyBhbnkgcGVuZGluZyB0aW1lb3V0cy5cbiAgICAgICAqIEByZXR1cm4ge3ZvaWR9XG4gICAgICAgKiBAbWV0aG9kIGRlc3Ryb3lcbiAgICAgICAqIEBzdGF0aWNcbiAgICAgICAqL1xuICAgICAgZGVzdHJveSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdmFyIG9iaiA9ICQuZGF0YShlbGVtLCAnaWRsZVRpbWVyT2JqJykgfHwge307XG5cbiAgICAgICAgLy9jbGVhciBhbnkgcGVuZGluZyB0aW1lb3V0c1xuICAgICAgICBjbGVhclRpbWVvdXQob2JqLnRJZCk7XG5cbiAgICAgICAgLy9SZW1vdmUgZGF0YVxuICAgICAgICBqcUVsZW0ucmVtb3ZlRGF0YSgnaWRsZVRpbWVyT2JqJyk7XG5cbiAgICAgICAgLy9kZXRhY2ggdGhlIGV2ZW50IGhhbmRsZXJzXG4gICAgICAgIGpxRWxlbS5vZmYoJy5faWRsZVRpbWVyJyk7XG4gICAgICB9LFxuICAgICAgLyoqXG4gICAgICAgKiBSZXR1cm5zIHRoZSB0aW1lIHVudGlsIGJlY29taW5nIGlkbGVcbiAgICAgICAqIEByZXR1cm4ge251bWJlcn1cbiAgICAgICAqIEBtZXRob2QgcmVtYWluaW5ndGltZVxuICAgICAgICogQHN0YXRpY1xuICAgICAgICovXG4gICAgICByZW1haW5pbmd0aW1lID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB2YXIgb2JqID0gJC5kYXRhKGVsZW0sICdpZGxlVGltZXJPYmonKSB8fCB7fTtcblxuICAgICAgICAvL0lmIGlkbGUgdGhlcmUgaXMgbm8gdGltZSByZW1haW5pbmdcbiAgICAgICAgaWYgKG9iai5pZGxlKSB7XG4gICAgICAgICAgcmV0dXJuIDA7XG4gICAgICAgIH1cblxuICAgICAgICAvL0lmIGl0cyBwYXVzZWQganVzdCByZXR1cm4gdGhhdFxuICAgICAgICBpZiAob2JqLnJlbWFpbmluZyAhPSBudWxsKSB7XG4gICAgICAgICAgcmV0dXJuIG9iai5yZW1haW5pbmc7XG4gICAgICAgIH1cblxuICAgICAgICAvL0RldGVybWluZSByZW1haW5pbmcsIGlmIG5lZ2F0aXZlIGlkbGUgZGlkbid0IGZpbmlzaCBmbGlwcGluZywganVzdCByZXR1cm4gMFxuICAgICAgICB2YXIgcmVtYWluaW5nID0gb2JqLnRpbWVvdXQgLSAoK25ldyBEYXRlKCkgLSBvYmoubGFzdEFjdGl2ZSk7XG4gICAgICAgIGlmIChyZW1haW5pbmcgPCAwKSB7XG4gICAgICAgICAgcmVtYWluaW5nID0gMDtcbiAgICAgICAgfVxuXG4gICAgICAgIC8vSWYgdGhpcyBpcyBwYXVzZWQgcmV0dXJuIHRoYXQgbnVtYmVyLCBlbHNlIHJldHVybiBjdXJyZW50IHJlbWFpbmluZ1xuICAgICAgICByZXR1cm4gcmVtYWluaW5nO1xuICAgICAgfTtcblxuICAgIC8vIGRldGVybWluZSB3aGljaCBmdW5jdGlvbiB0byBjYWxsXG4gICAgaWYgKGZpcnN0UGFyYW0gPT09IG51bGwgJiYgdHlwZW9mIG9iai5pZGxlICE9PSAndW5kZWZpbmVkJykge1xuICAgICAgLy8gdGhleSB0aGluayB0aGV5IHdhbnQgdG8gaW5pdCwgYnV0IGl0IGFscmVhZHkgaXMsIGp1c3QgcmVzZXRcbiAgICAgIHJlc2V0KCk7XG4gICAgICByZXR1cm4ganFFbGVtO1xuICAgIH0gZWxzZSBpZiAoZmlyc3RQYXJhbSA9PT0gbnVsbCkge1xuICAgICAgLy8gdGhleSB3YW50IHRvIGluaXRcbiAgICB9IGVsc2UgaWYgKGZpcnN0UGFyYW0gIT09IG51bGwgJiYgdHlwZW9mIG9iai5pZGxlID09PSAndW5kZWZpbmVkJykge1xuICAgICAgLy8gdGhleSB3YW50IHRvIGRvIHNvbWV0aGluZywgYnV0IGl0IGlzbnQgaW5pdFxuICAgICAgLy8gbm90IHN1cmUgdGhlIGJlc3Qgd2F5IHRvIGhhbmRsZSB0aGlzXG4gICAgICByZXR1cm4gZmFsc2U7XG4gICAgfSBlbHNlIGlmIChmaXJzdFBhcmFtID09PSAnZGVzdHJveScpIHtcbiAgICAgIGRlc3Ryb3koKTtcbiAgICAgIHJldHVybiBqcUVsZW07XG4gICAgfSBlbHNlIGlmIChmaXJzdFBhcmFtID09PSAncGF1c2UnKSB7XG4gICAgICBwYXVzZSgpO1xuICAgICAgcmV0dXJuIGpxRWxlbTtcbiAgICB9IGVsc2UgaWYgKGZpcnN0UGFyYW0gPT09ICdyZXN1bWUnKSB7XG4gICAgICByZXN1bWUoKTtcbiAgICAgIHJldHVybiBqcUVsZW07XG4gICAgfSBlbHNlIGlmIChmaXJzdFBhcmFtID09PSAncmVzZXQnKSB7XG4gICAgICByZXNldCgpO1xuICAgICAgcmV0dXJuIGpxRWxlbTtcbiAgICB9IGVsc2UgaWYgKGZpcnN0UGFyYW0gPT09ICdnZXRSZW1haW5pbmdUaW1lJykge1xuICAgICAgcmV0dXJuIHJlbWFpbmluZ3RpbWUoKTtcbiAgICB9IGVsc2UgaWYgKGZpcnN0UGFyYW0gPT09ICdnZXRFbGFwc2VkVGltZScpIHtcbiAgICAgIHJldHVybiArbmV3IERhdGUoKSAtIG9iai5vbGRkYXRlO1xuICAgIH0gZWxzZSBpZiAoZmlyc3RQYXJhbSA9PT0gJ2dldExhc3RBY3RpdmVUaW1lJykge1xuICAgICAgcmV0dXJuIG9iai5sYXN0QWN0aXZlO1xuICAgIH0gZWxzZSBpZiAoZmlyc3RQYXJhbSA9PT0gJ2lzSWRsZScpIHtcbiAgICAgIHJldHVybiBvYmouaWRsZTtcbiAgICB9XG5cbiAgICAvLyBUZXN0IHZpYSBhIGdldHRlciBpbiB0aGUgb3B0aW9ucyBvYmplY3QgdG8gc2VlIGlmIHRoZSBwYXNzaXZlIHByb3BlcnR5IGlzIGFjY2Vzc2VkXG4gICAgLy8gVGhpcyBpc250IHdvcmtpbmcgaW4ganF1ZXJ5LCB0aG91Z2ggaXMgcGxhbm5lZCBmb3IgNC4wXG4gICAgLy8gaHR0cHM6Ly9naXRodWIuY29tL2pxdWVyeS9qcXVlcnkvaXNzdWVzLzI4NzFcbiAgICAvKnZhciBzdXBwb3J0c1Bhc3NpdmUgPSBmYWxzZTtcbiAgICAgIHRyeSB7XG4gICAgICAgICAgdmFyIFBvcHRzID0gT2JqZWN0LmRlZmluZVByb3BlcnR5KHt9LCBcInBhc3NpdmVcIiwge1xuICAgICAgICAgICAgICBnZXQ6IGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgICAgICAgc3VwcG9ydHNQYXNzaXZlID0gdHJ1ZTtcbiAgICAgICAgICAgICAgfVxuICAgICAgICAgIH0pO1xuICAgICAgICAgIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKFwidGVzdFwiLCBudWxsLCBQb3B0cyk7XG4gICAgICB9IGNhdGNoIChlKSB7fVxuKi9cblxuICAgIC8qIChpbnRlbnRpb25hbGx5IG5vdCBkb2N1bWVudGVkKVxuICAgICAqIEhhbmRsZXMgYSB1c2VyIGV2ZW50IGluZGljYXRpbmcgdGhhdCB0aGUgdXNlciBpc24ndCBpZGxlLiBuYW1lc3BhY2VkIHdpdGggaW50ZXJuYWwgaWRsZVRpbWVyXG4gICAgICogQHBhcmFtIHtFdmVudH0gZXZlbnQgQSBET00yLW5vcm1hbGl6ZWQgZXZlbnQgb2JqZWN0LlxuICAgICAqIEByZXR1cm4ge3ZvaWR9XG4gICAgICovXG4gICAganFFbGVtLm9uKChvcHRzLmV2ZW50cyArICcgJykuc3BsaXQoJyAnKS5qb2luKCcuX2lkbGVUaW1lciAnKS50cmltKCksIGZ1bmN0aW9uIChlKSB7XG4gICAgICBoYW5kbGVFdmVudChlKTtcbiAgICB9KTtcbiAgICAvL30sIHN1cHBvcnRzUGFzc2l2ZSA/IHsgcGFzc2l2ZTogdHJ1ZSB9IDogZmFsc2UpO1xuXG4gICAgaWYgKG9wdHMudGltZXJTeW5jSWQpIHtcbiAgICAgICQod2luZG93KS5vbignc3RvcmFnZScsIGhhbmRsZUV2ZW50KTtcbiAgICB9XG5cbiAgICAvLyBJbnRlcm5hbCBPYmplY3QgUHJvcGVydGllcywgVGhpcyBpc24ndCBhbGwgbmVjZXNzYXJ5LCBidXQgd2VcbiAgICAvLyBleHBsaWNpdGx5IGRlZmluZSBhbGwga2V5cyBoZXJlIHNvIHdlIGtub3cgd2hhdCB3ZSBhcmUgd29ya2luZyB3aXRoXG4gICAgb2JqID0gJC5leHRlbmQoXG4gICAgICB7fSxcbiAgICAgIHtcbiAgICAgICAgb2xkZGF0ZTogK25ldyBEYXRlKCksIC8vIHRoZSBsYXN0IHRpbWUgc3RhdGUgY2hhbmdlZFxuICAgICAgICBsYXN0QWN0aXZlOiArbmV3IERhdGUoKSwgLy8gdGhlIGxhc3QgdGltZSB0aW1lciB3YXMgYWN0aXZlXG4gICAgICAgIGlkbGU6IG9wdHMuaWRsZSwgLy8gY3VycmVudCBzdGF0ZVxuICAgICAgICBpZGxlQmFja3VwOiBvcHRzLmlkbGUsIC8vIGJhY2t1cCBvZiBpZGxlIHBhcmFtZXRlciBzaW5jZSBpdCBnZXRzIG1vZGlmaWVkXG4gICAgICAgIHRpbWVvdXQ6IG9wdHMudGltZW91dCwgLy8gdGhlIGludGVydmFsIHRvIGNoYW5nZSBzdGF0ZVxuICAgICAgICByZW1haW5pbmc6IG51bGwsIC8vIGhvdyBsb25nIHVudGlsIHN0YXRlIGNoYW5nZXNcbiAgICAgICAgdGltZXJTeW5jSWQ6IG9wdHMudGltZXJTeW5jSWQsIC8vIGxvY2FsU3RvcmFnZSBrZXkgdG8gdXNlIGZvciBzeW5jaW5nIHRoaXMgdGltZXJcbiAgICAgICAgdElkOiBudWxsLCAvLyB0aGUgaWRsZSB0aW1lciBzZXRUaW1lb3V0XG4gICAgICAgIHBhZ2VYOiBudWxsLCAvLyB1c2VkIHRvIHN0b3JlIHRoZSBtb3VzZSBjb29yZFxuICAgICAgICBwYWdlWTogbnVsbFxuICAgICAgfVxuICAgICk7XG5cbiAgICAvLyBzZXQgYSB0aW1lb3V0IHRvIHRvZ2dsZSBzdGF0ZS4gTWF5IHdpc2ggdG8gb21pdCB0aGlzIGluIHNvbWUgc2l0dWF0aW9uc1xuICAgIGlmICghb2JqLmlkbGUpIHtcbiAgICAgIG9iai50SWQgPSBzZXRUaW1lb3V0KHRvZ2dsZUlkbGVTdGF0ZSwgb2JqLnRpbWVvdXQpO1xuICAgIH1cblxuICAgIC8vIHN0b3JlIG91ciBpbnN0YW5jZSBvbiB0aGUgb2JqZWN0XG4gICAgJC5kYXRhKGVsZW0sICdpZGxlVGltZXJPYmonLCBvYmopO1xuXG4gICAgcmV0dXJuIGpxRWxlbTtcbiAgfTtcblxuICAvLyBUaGlzIGFsbG93cyBiaW5kaW5nIHRvIGVsZW1lbnRcbiAgJC5mbi5pZGxlVGltZXIgPSBmdW5jdGlvbiAoZmlyc3RQYXJhbSkge1xuICAgIGlmICh0aGlzWzBdKSB7XG4gICAgICByZXR1cm4gJC5pZGxlVGltZXIoZmlyc3RQYXJhbSwgdGhpc1swXSk7XG4gICAgfVxuXG4gICAgcmV0dXJuIHRoaXM7XG4gIH07XG59KShqUXVlcnkpO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./libs/idletimer/idletimer.js\n");

/***/ })

/******/ })));