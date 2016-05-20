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

angular.module('VASApp')
//   .directive('accountbody', function() {
//     return {
//       templateUrl: 'mainpages/user/accountop/overall.html'
//     };
//   });
.directive("accountbody", function() {
  return {
    template: '<ng-include src="getTemplateUrl()"/>',
    //templateUrl: unfortunately has no access to $scope.user.type  
    controller: function($scope) {
      //function used on the ng-include to resolve the template
      $scope.getTemplateUrl = function() {
        //basic handling. It could be delegated to different Services
        if ($scope.menuoption == "overall")
          return "mainpages/user/accountop/overall.html";
        if ($scope.menuoption == "profile")
          return "mainpages/user/accountop/profile.html";
        if ($scope.menuoption == "file")
          return "mainpages/user/accountop/file.html";
        if ($scope.menuoption == "project")
          return "mainpages/user/accountop/project.html";
        if ($scope.menuoption == "notification")
          return "mainpages/user/accountop/notification.html";
        if ($scope.menuoption == "payment")
          return "mainpages/user/accountop/payment.html";
        if ($scope.menuoption == "setting")
          return "mainpages/user/accountop/setting.html";
        else
          return "mainpages/user/accountop/overall.html";
      }
    }
  };
});