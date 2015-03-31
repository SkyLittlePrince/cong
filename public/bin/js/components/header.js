(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
var headerTpl;

headerTpl = require('./header.html');

Vue.component('c-header', {
  template: headerTpl,
  methods: {
    test: function(event) {
      return console.log(123);
    }
  },
  create: function() {
    return console.log('header loaded');
  }
});


},{"./header.html":2}],2:[function(require,module,exports){
module.exports = "<div id=\"header\">\n    <a href=\"/\" class=\"logo\">\n        <img src=\"./../../../assets/common/logo-1.png\" alt=\"logo\" class=\"head-portrait\">\n    </a>\n    <ul class=\"nav\">\n        <li>\n            <a href=\"#\">首页</a>\n        </li>\n        <li class=\"active\">\n            <a href=\"#\">交易中心</a>\n        </li>\n        <li>\n            <a href=\"#\">黄金猎人</a>\n        </li>\n    </ul>\n    <!-- 用户已经登录 -->\n    <ul class=\"user-info\">\n        <li class=\"info\">\n            <a href=\"#\">\n                <img src=\"./../../../assets/common/avatar.png\" alt=\"avatar\">\n                <span>Vivine</span>\n            </a>\n        </li>\n        <li class=\"message\">\n            <a href=\"#\">\n                (<span>6</span>)\n            </a>\n        </li>\n        <li class=\"help\">\n            <a href=\"#\">\n                \n            </a>\n        </li>\n        <li class=\"cart\">\n            <a href=\"#\">\n                \n            </a>\n        </li>\n    </ul>\n    <!-- 用户未登录 -->\n</div>";

},{}]},{},[1]);