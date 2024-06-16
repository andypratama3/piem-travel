(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else {
		var a = factory();
		for(var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
	}
})(self, function() {
return /******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************************************************!*\
  !*** ./resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js ***!
  \******************************************************************************/

/******/ 	return __webpack_exports__;
/******/ })()
;
});
