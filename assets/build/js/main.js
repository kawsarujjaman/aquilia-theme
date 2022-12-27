/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/carousel/index.js":
/*!**********************************!*\
  !*** ./src/js/carousel/index.js ***!
  \**********************************/
/***/ (() => {

// (function ($) {
//     class slickCarousel {
//         constructor() {
//            this.initiateCarousel();
//         }
//         initiateCarousel(){
//             $('.posts-carousel').slick({
//                 autoplay: true,
//                 autoplaySpeed: 2000,
//             });
//         }
//     }
//     new slickCarousel();
// })(jQuery)

jQuery(document).ready(function () {
  jQuery('.posts-carousel').slick({
    // autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });
});

/***/ }),

/***/ "./src/js/clock/index.js":
/*!*******************************!*\
  !*** ./src/js/clock/index.js ***!
  \*******************************/
/***/ (() => {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
// Clock function
(function ($) {
  var Clock = /*#__PURE__*/function () {
    function Clock() {
      _classCallCheck(this, Clock);
      this.initializeClock();
    }
    _createClass(Clock, [{
      key: "initializeClock",
      value: function initializeClock() {
        var _this = this;
        var t = setInterval(function () {
          return _this.time();
        }, 1000);
      }
    }, {
      key: "numPad",
      value: function numPad(str) {
        var cStr = str.toString();
        if (1 > cStr.length) {
          str = 0 + cStr;
        }
        return str;
      }

      /**
       * Time
       */
    }, {
      key: "time",
      value: function time() {
        var currentDate = new Date();
        var currentSec = currentDate.getSeconds();
        var currentMin = currentDate.getMinutes();
        var curren24hrs = currentDate.getHours();
        var ampm = 12 <= curren24hrs ? 'pm' : 'am';
        var currentHoure = curren24hrs % 12;
        currentHoure = currentHoure ? currentHoure : 12;
        var stringTime = currentHoure + ':' + this.numPad(currentMin) + ':' + this.numPad(currentSec);
        var timeEmojiEL = $('#time-emoji');
        if (curren24hrs >= 5 && 17 >= curren24hrs) {
          timeEmojiEL.text('🌞');
        } else {
          timeEmojiEL.text(' 🌙 ');
        }
        $('#time').text(stringTime);
        // $( '#ampm' );
        $('#ampm').text(ampm);
      }
    }]);
    return Clock;
  }();
  new Clock();
})(jQuery);

/***/ }),

/***/ "./src/js/posts/loadmore.js":
/*!**********************************!*\
  !*** ./src/js/posts/loadmore.js ***!
  \**********************************/
/***/ (() => {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
(function ($) {
  /**
   * Class Loadmore.
   */
  var LoadMore = /*#__PURE__*/function () {
    /**
     * Contructor.
     */
    function LoadMore() {
      var _siteConfig$ajaxUrl, _siteConfig, _siteConfig$ajax_nonc, _siteConfig2;
      _classCallCheck(this, LoadMore);
      this.ajaxUrl = (_siteConfig$ajaxUrl = (_siteConfig = siteConfig) === null || _siteConfig === void 0 ? void 0 : _siteConfig.ajaxUrl) !== null && _siteConfig$ajaxUrl !== void 0 ? _siteConfig$ajaxUrl : '';
      this.ajaxNonce = (_siteConfig$ajax_nonc = (_siteConfig2 = siteConfig) === null || _siteConfig2 === void 0 ? void 0 : _siteConfig2.ajax_nonce) !== null && _siteConfig$ajax_nonc !== void 0 ? _siteConfig$ajax_nonc : '';
      this.loadMoreBtn = $('#load-more');
      this.loadingTextEl = $('#loading-text');
      this.isRequestProcessing = false;
      this.options = {
        root: null,
        rootMargin: '0px',
        threshold: 1.0 // 1.0 means set isIntersecting to true when element comes in 100% view.
      };

      this.init();
    }
    _createClass(LoadMore, [{
      key: "init",
      value: function init() {
        var _this = this;
        if (!this.loadMoreBtn.length) {
          return;
        }
        this.totalPagesCount = $('#post-pagination').data('max-pages');

        /**
         * Add the IntersectionObserver api, and listen to the load more intersection status.
         * so that intersectionObserverCallback gets called if the element intersection status changes.
         *
         * @type {IntersectionObserver}
         */
        var observer = new IntersectionObserver(function (entries) {
          return _this.intersectionObserverCallback(entries);
        }, this.options);
        observer.observe(this.loadMoreBtn[0]);
      }

      /**
       * Gets called on initial render with status 'isIntersecting' as false and then
       * everytime element intersection status changes.
       *
       * @param {array} entries No of elements under observation.
       *
       */
    }, {
      key: "intersectionObserverCallback",
      value: function intersectionObserverCallback(entries) {
        var _this2 = this;
        // array of observing elements

        // The logic is apply for each entry ( in this case it's just one loadmore button )
        entries.forEach(function (entry) {
          // If load more button in view.
          if (entry !== null && entry !== void 0 && entry.isIntersecting) {
            _this2.handleLoadMorePosts();
          }
        });
      }

      /**
       * Load more posts.
       *
       * 1.Make an ajax request, by incrementing the page no. by one on each request.
       * 2.Append new/more posts to the existing content.
       * 3.If the response is 0 ( which means no more posts available ), remove the load-more button from DOM.
       * Once the load-more button gets removed, the IntersectionObserverAPI callback will not be triggered, which means
       * there will be no further ajax request since there won't be any more posts available.
       *
       * @return null
       */
    }, {
      key: "handleLoadMorePosts",
      value: function handleLoadMorePosts() {
        var _this3 = this;
        // Get page no from data attribute of load-more button.
        var page = this.loadMoreBtn.data('page');
        if (!page || this.isRequestProcessing) {
          return null;
        }
        var nextPage = parseInt(page) + 1; // Increment page count by one.
        this.isRequestProcessing = true;
        $.ajax({
          url: this.ajaxUrl,
          type: 'post',
          data: {
            page: page,
            action: 'load_more',
            ajax_nonce: this.ajaxNonce
          },
          success: function success(response) {
            _this3.loadMoreBtn.data('page', nextPage);
            $('#load-more-content').append(response);
            _this3.removeLoadMoreIfOnLastPage(nextPage);
            _this3.isRequestProcessing = false;
          },
          error: function error(response) {
            console.log(response);
            _this3.isRequestProcessing = false;
          }
        });
      }

      /**
       * Remove Load more Button If on last page.
       *
       * @param {int} nextPage New Page.
       */
    }, {
      key: "removeLoadMoreIfOnLastPage",
      value: function removeLoadMoreIfOnLastPage(nextPage) {
        if (nextPage + 1 > this.totalPagesCount) {
          this.loadMoreBtn.remove();
        }
      }
    }]);
    return LoadMore;
  }();
  new LoadMore();
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

/***/ }),

/***/ "./src/sass/main.scss":
/*!****************************!*\
  !*** ./src/sass/main.scss ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/* harmony import */ var _carousel__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./carousel */ "./src/js/carousel/index.js");
/* harmony import */ var _carousel__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_carousel__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _posts_loadmore__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./posts/loadmore */ "./src/js/posts/loadmore.js");
/* harmony import */ var _posts_loadmore__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_posts_loadmore__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _sass_main_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../sass/main.scss */ "./src/sass/main.scss");
/* harmony import */ var _img_cat_jpg__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../img/cat.jpg */ "./src/img/cat.jpg");
//main.js





// styles


// Images

})();

/******/ })()
;
//# sourceMappingURL=main.js.map