'use strict';

/* App Module */
/*基本代码规范*/
// var phonecatApp = angular.module('phonecatApp', [
//   'ngRoute',
//   'phonecatAnimations',

//   'phonecatControllers',
//   'phonecatFilters',
//   'phonecatServices'
// ]);

// phonecatApp.config(['$routeProvider',
//   function($routeProvider) {
//     $routeProvider.
//       when('/phones', {
//         templateUrl: 'partials/phone-list.html',
//         controller: 'PhoneListCtrl'
//       }).
//       when('/phones/:phoneId', {
//         templateUrl: 'partials/phone-detail.html',
//         controller: 'PhoneDetailCtrl'
//       }).
//       otherwise({
//         redirectTo: '/phones'
//       });
//   }]);


var VASApp = angular.module('VASApp', [
  'ngRoute',
  'vastackControllers',

]);

VASApp.config(['$routeProvider','$locationProvider',
  function($routeProvider,$locationProvider) {
   
    $routeProvider.
	 when('/', {
        templateUrl: 'mainpages/index/en.html',
        controller: 'IndexCtrl'
      }).
      when('/en', {
        templateUrl: 'mainpages/index/en.html',
        controller: 'IndexCtrl'
      }).
      when('/cn', {
        templateUrl: 'mainpages/index/cn.html',
        controller: 'IndexCtrl'
      }).
     when('/fr', {
        templateUrl: 'mainpages/index/fr.html',
        controller: 'IndexCtrl'
      }).
//     用户界面
     when('/login', {
        templateUrl: 'mainpages/user/login.html',
        controller: 'UserCtrl'
      }).
     when('/reg', {
        templateUrl: 'mainpages/user/reg.html',
        controller: 'UserCtrl'
      }).
     when('/myaccount', {
        templateUrl: 'mainpages/user/myaccount.html',
        controller: 'AccountCtrl'
      }).
     when('/myproject', {
        templateUrl: 'mainpages/user/project.html',
        controller: 'UserCtrl'
      }).
     when('/contactme', {
        templateUrl: 'mainpages/user/contact.html',
        controller: 'UserCtrl'
      }).
    
//     所有非法输入跳回主页
      otherwise({
        templateUrl: 'mainpages/index/en.html',
        controller: 'IndexCtrl'
      });
    
      
   
  }]);



