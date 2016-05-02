'use strict';

/* Directives */
angular.module('VASApp')
  .directive('pageheader', function() {
    return {
      templateUrl: 'mainpages/header.html'
    };
  });

angular.module('VASApp')
  .directive('pagefooter', function() {
    return {
      templateUrl: 'mainpages/footer.html'
    };
  });
