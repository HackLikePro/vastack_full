'use strict';

/* Controllers */

// var phonecatControllers = angular.module('phonecatControllers', []);

// phonecatControllers.controller('PhoneListCtrl', ['$scope', 'Phone',
//   function($scope, Phone) {
//     $scope.phones = Phone.query();
//     $scope.orderProp = 'age';
//   }]);

// phonecatControllers.controller('PhoneDetailCtrl', ['$scope', '$routeParams', 'Phone',
//   function($scope, $routeParams, Phone) {
//     $scope.phone = Phone.get({phoneId: $routeParams.phoneId}, function(phone) {
//       $scope.mainImageUrl = phone.images[0];
//     });

//     $scope.setImage = function(imageUrl) {
//       $scope.mainImageUrl = imageUrl;
//     }
//   }]);

var vastackControllers = angular.module('vastackControllers', []);

vastackControllers.controller('IndexCtrl', ['$scope',
  function($scope) {
    $scope.jslogin = function() {}
  }
]);



vastackControllers.controller('AccountCtrl', ['$scope', '$http', '$location','$window',
  function($scope, $http, $location, $window) {
    $scope.checklogin = function() {
       $http({
        method: 'POST',
        url: 'checklogin',
        data: "", //验证用户身份
        headers: {
          'Content-Type': 'application/json'
        }
      }).success(function(data) {
           if(data != "1")
          {
            $scope.message = "please log in first";
            $location.path('/login');
          }
      })
    };
  
    $scope.clientlogout = function() {
      $http({
        method: 'GET',
        url: 'logout',
        data: "", //验证用户身份
        headers: {
          'Content-Type': 'application/json'
        }
      }).success(function(data) {
        alert("logedout");
      })
    };

    $scope.getprojectinfo = function() {
      $http({
        method: 'POST',
        url: 'projectinfo',
        data: "", //验证用户身份
        headers: {
          'Content-Type': 'application/json'
        }
      }).success(function(data) {
        $scope.projectlist = data;
      })
    };
    
    $scope.creatproject = function() {
      $http({
        method: 'POST',
        url: 'creatproject',
        data: $scope.project, //验证用户身份
        headers: {
          'Content-Type': 'application/json'
        }
      }).success(function(data) {
        $scope.projectlist = data;
      })
    };
    
    $scope.delproject = function(id){
       $http({
        method: 'POST',
        url: 'delproject',
        data: id, //验证用户身份
        headers: {
          'Content-Type': 'application/json'
        }
      }).success(function(data) {
        $scope.projectlist = data;
        $scope.getnoteinfo();
      })
    };
    
    $scope.getnoteinfo = function(){
       $http({
        method: 'POST',
        url: 'getnoteinfo',
        data: "", //验证用户身份
        headers: {
          'Content-Type': 'application/json'
        }
      }).success(function(data) {
        $scope.notes = data;
      })
    };
    
    $scope.delnote = function(id){
       $http({
        method: 'POST',
        url: 'delnote',
        data: id, //验证用户身份
        headers: {
          'Content-Type': 'application/json'
        }
      }).success(function(data) {
        $scope.notes = data;
         //alert(data);
      })     
    };
    
    $scope.creatnote = function(id){
       $http({
        method: 'POST',
        url: 'creatnote',
        data: $scope.newnote, //验证用户身份
        headers: {
          'Content-Type': 'application/json'
        }
      }).success(function(data) {
         //alert(data);
         $scope.notes = data;
        
      }).error(function(data){
         //alert(data);
       })    
    };
    
    $scope.checklogin();
    
    $scope.getprojectinfo();
    
    $scope.getnoteinfo();
  }
]);


// 注册和登入
vastackControllers.controller('UserCtrl', ['$scope', '$http', '$location',
  function($scope, $http, $location) {

    //     1.用户登入
    $scope.jslogin = function() {

      //       登出当前帐号
      $http({
        method: 'GET',
        url: 'logout',
        data: "", //验证用户身份
        headers: {
          'Content-Type': 'application/json'
        }
      });
      //       开始登入验证
      if ($scope.user.username && $scope.user.password) {
        if (!($scope.user.username.length > 3)) {
          $scope.message = "Invalde Username";
        } else if (!($scope.user.password.length > 5)) {
          $scope.message = "Invalde Password";
        } else if ($scope.user.username.length > 3 && $scope.user.password.length > 5) {
          $http({
            method: 'POST',
            url: 'clientin',
            data: $scope.user, //forms user object
            headers: {
              'Content-Type': 'application/json'
            }
          }).success(function(data) {
            $scope.message = data;
            if (data == "-1") {
              $scope.message = "Wrong username or password, please try agian.";
            } 
            else if(data=="1") {
              $location.path('/myaccount');
            }
            else
            {
              $scope.message = "please try agian."
            }
          }).error(function(data, status) {
            console.error('Repos error', status, data);
            alert("opss, please try agian.");
            $scope.message = "Server error, please try later.";
          });
        }
      } else {
        $scope.message = "Please input username and password";
      }


    };



    //     2.用户注册
    $scope.jsreg = function() {
   
      if ($scope.user.password == $scope.user.password_confirmation && $scope.user.password != null && $scope.user.term == true) {

        //         登出帐号
        $http({
          method: 'GET',
          url: 'logout',
          data: "", //验证用户身份
          headers: {
            'Content-Type': 'application/json'
          }
        });

        //         注册验证
        $http({
          method: 'POST',
          url: 'register',
          data: $scope.user, //验证用户身份
          headers: {
            'Content-Type': 'application/json'
          }
        }).success(function(data) {
          $location.path('/myaccount');
        }).error(function(data, status) {
          $scope.regmessage = ("The email has already been taken.");
        });
      } else {
        if ($scope.user.term != true) {
          $scope.regmessage = "Please Check Term and Conditions."
        } else if ($scope.user.password == null) {
          $scope.regmessage = "Password can not be null."
        } else if ($scope.user.password != $scope.user.password_confirmation) {
          $scope.regmessage = "Please virfy your passwords."
        } else {
          $scope.regmessage = "Server Error, please try agian later."
        }
      }


    }

  }
]);

// 账户页面控制