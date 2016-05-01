'use strict';

/* Directives */
angular.module('VASApp')
  .directive('header', function() {
    return {
      templateUrl: 'mainpages/header.html'
    };
  });

angular.module('VASApp')
  .directive('footer', function() {
    return {
      templateUrl: 'mainpages/footer.html'
    };
  });
