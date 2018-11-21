/******/ (function(modules) { // webpackBootstrap
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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 47);
/******/ })
/************************************************************************/
/******/ ({

/***/ 47:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(48);


/***/ }),

/***/ 48:
/***/ (function(module, exports) {

var tmpDate = document.getElementById('tmp-date');
var tmpMonth = document.getElementById('tmp-month');
var tmpYear = document.getElementById('tmp-year');
var birthday = document.getElementById('input-birthday-hidden');

var nameForUpdate = document.getElementById('input-name__update');
var genderForUpdate = document.getElementById('input-gender__update');
var tmpDateForUpdate = document.getElementById('tmp-date__update');
var tmpMonthForUpdate = document.getElementById('tmp-month__update');
var tmpYearForUpdate = document.getElementById('tmp-year__update');
var birthdayForUpdate = document.getElementById('input-birthday-hidden__update');

var btnUpdate = document.getElementsByClassName('btn-update');
var modalForUpdate = $('#update-modal');
var formForUpdate = document.getElementById('update-form');

tmpDate.addEventListener('change', changeBirthday);
tmpMonth.addEventListener('change', changeBirthday);
tmpYear.addEventListener('change', changeBirthday);

tmpDateForUpdate.addEventListener('change', changeBirthdayForUpdate);
tmpMonthForUpdate.addEventListener('change', changeBirthdayForUpdate);
tmpYearForUpdate.addEventListener('change', changeBirthdayForUpdate);

_.forEach(btnUpdate, function (button) {
    button.addEventListener('click', updateCamper);
});

function changeBirthday() {
    var newBirthday = tmpMonth.value + '/' + tmpDate.value + '/' + tmpYear.value;
    birthday.value = newBirthday;
}

function changeBirthdayForUpdate() {
    var newBirthday = tmpMonthForUpdate.value + '/' + tmpDateForUpdate.value + '/' + tmpYearForUpdate.value;
    inputBirthdayForUpdate.value = newBirthday;
}

function updateCamper(e) {
    var camperID = e.target.dataset.camper;

    axios.get('/api/campers/' + camperID).then(function (res) {
        if (200 === res.status) {
            var data = res.data;
            var _birthday = data.birthday.split('/');

            nameForUpdate.value = data.name;
            genderForUpdate.value = data.gender;
            birthdayForUpdate.value = data.birthday;
            tmpDateForUpdate.value = _birthday[1];
            tmpMonthForUpdate.value = _birthday[0];
            tmpYearForUpdate.value = _birthday[2];
            formForUpdate.action = '/campers/' + data.id;
        } else {
            throw new Error('Has problem when get camper information');
        }
    }).catch(function (err) {
        console.log(err);
    });
}

/***/ })

/******/ });