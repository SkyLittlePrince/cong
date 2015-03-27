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
module.exports = "<div id=\"header\">\r\n    <div class=\"logo\">\r\n        <img src=\"\" alt=\"\">\r\n    </div>\r\n    <ul class=\"nav\">\r\n        <li>首页</li>\r\n        <li>交易中心</li>\r\n        <li>赏金猎人</li>\r\n    </ul>\r\n    <!-- 用户已经登录 -->\r\n    <ul class=\"user-info\">\r\n        <li>\r\n            <img src=\"\" alt=\"\" class=\"head-portrait\">\r\n        </li>\r\n        <li class=\"message\">\r\n            <span>(6)</span>\r\n        </li>\r\n        <li>\r\n            <span class=\"help\"></span>\r\n        </li>\r\n        <li>\r\n            <a href=\"#\">\r\n                <span class=\"shopping-cart\"></span>\r\n                <span>购物车</span>\r\n            </a>\r\n        </li>\r\n    </ul>\r\n    <!-- 用户未登录 -->\r\n</div>";

},{}]},{},[1]);