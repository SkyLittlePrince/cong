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
module.exports = "<div id=\"header\">\r\n    <a href=\"/\" class=\"logo\">\r\n        <img src=\"./../../../assets/common/logo-1.png\" alt=\"logo\" class=\"head-portrait\">\r\n    </a>\r\n    <ul class=\"nav\">\r\n        <li>\r\n            <a href=\"#\">首页</a>\r\n        </li>\r\n        <li class=\"active\">\r\n            <a href=\"#\">交易中心</a>\r\n        </li>\r\n        <li>\r\n            <a href=\"#\">黄金猎人</a>\r\n        </li>\r\n    </ul>\r\n    <!-- 用户已经登录 -->\r\n    <ul class=\"user-info\">\r\n        <li class=\"info\">\r\n            <a href=\"#\">\r\n                <img src=\"./../../../assets/common/avatar.png\" alt=\"avatar\">\r\n                <span>Vivine</span>\r\n            </a>\r\n        </li>\r\n        <li class=\"message\">\r\n            <a href=\"#\">\r\n                (<span>6</span>)\r\n            </a>\r\n        </li>\r\n        <li class=\"help\">\r\n            <a href=\"#\">\r\n                \r\n            </a>\r\n        </li>\r\n        <li class=\"cart\">\r\n            <a href=\"#\">\r\n                \r\n            </a>\r\n        </li>\r\n    </ul>\r\n    <!-- 用户未登录 -->\r\n</div>";

},{}]},{},[1]);