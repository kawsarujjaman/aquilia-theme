/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/clock/index.js":
/*!*******************************!*\
  !*** ./src/js/clock/index.js ***!
  \*******************************/
/***/ (() => {

// Clock function
(function ($) {
  class Clock {
    constructor() {
      this.initializeClock();
    }
    initializeClock() {
      let t = setInterval(() => this.time(), 1000);
    }
    numPad(str) {
      let cStr = str.toString();
      if (cStr.length < 1) str = 0 + cStr;
      return str;
    }
    /**
     * Time
     */
    time() {
      const currentDate = new Date();
      const currentSec = currentDate.getSeconds();
      const currentMin = currentDate.getMinutes();
      const curren24hrs = currentDate.getHours();
      const ampm = 12 <= curren24hrs ? 'pm' : 'am';
      let currentHoure = curren24hrs % 12;
      currentHoure = currentHoure ? currentHoure : 12;
      const stringTime = currentHoure + ':' + this.numPad(currentMin) + ':' + this.numPad(currentSec);
      const timeEmojiEL = $('#time-emoji');
      if (curren24hrs >= 5 && curren24hrs <= 17) {
        timeEmojiEL.text('🌞');
      } else {
        timeEmojiEL.text(' 🌙 ');
      }
      $('#time').text(stringTime);
      // $( '#ampm' );
      $('#ampm').text(ampm);
    }
  }
  new Clock();
})(jQuery);

/***/ }),

/***/ "./src/img/cat.jpg":
/*!*************************!*\
  !*** ./src/img/cat.jpg ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("../../src/img/cat.jpg");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _clock__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./clock */ "./src/js/clock/index.js");
/* harmony import */ var _clock__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_clock__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _img_cat_jpg__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../img/cat.jpg */ "./src/img/cat.jpg");
//main.js



// Images

})();

/******/ })()
;
//# sourceMappingURL=main.js.map