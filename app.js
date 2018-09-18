var app = angular.module('myApp', ['ngRoute','ngSanitize']);

/*app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : myLocalized.views + "main.php",
        controller: "home"
    });
});*/

// set the configuration
app.run(['$rootScope', function($rootScope){
	// created by wp_localize_script(), and stored in the Angular rootScope
	$rootScope.api = AppAPI.url;
}]);

app.controller('home', function($scope, $q, $http, $routeParams, $location){
  // console.log( $scope.api );
  // console.log( $routeParams );

  /*$http.get( $scope.api + 'wp-json/wp/v2/posts_sticky/', {cache: false}).then(function(res){
    $scope.posts = res.data;
  });

  $http.get( $scope.api + 'wp-json/wp/v2/posts', {cache: false}).then(function(res){
    $scope.latest_posts = res.data;
  });*/

  $scope.currentPage = 1;
  var pageid = $location.absUrl().split('/')[5];
  // console.log( pageid );
  if(pageid) $scope.currentPage = pageid;

  $q.all([
    $http.get($scope.api + 'wp-json/wp/v2/posts_sticky/'),
    $http.get($scope.api + 'wp-json/wp/v2/posts_sticky_sidebar/'),
    $http.get($scope.api + 'wp-json/wp/v2/posts/?page=' + $scope.currentPage)
  ]).then(function(results) {
    // console.log(results);
    $scope.posts = results[0].data;
    $scope.posts_sticky_sidebar = results[1].data;
    $scope.latest_posts = results[2].data;
  });

  $scope.getPage = function(pageid){
    if(pageid) $scope.currentPage = pageid;

    $http.get($scope.api + 'wp-json/wp/v2/posts/?page=' + $scope.currentPage).then(function(res){
      $scope.latest_posts = res.data;
    });
  }

});

app.controller('single', function($scope, $q, $http, $routeParams){
  $scope.postId = '0';

  $scope.init = function(id){
    $scope.postId = id;

    /* $http.get( $scope.api + 'wp-json/wp/v2/posts/' + $scope.postId).then(function(res){
      $scope.posts = res.data;
    }); */
	
	$q.all([
		$http.get($scope.api + 'wp-json/wp/v2/posts/' + $scope.postId),
    $http.get($scope.api + 'wp-json/wp/v2/posts_sticky_sidebar/'),
		$http.get($scope.api + 'wp-json/wp/v2/posts_comments/?post_id=' + $scope.postId)
	]).then(function(results) {
		// console.log(results);
		$scope.posts = results[0].data;
    $scope.posts_sticky_sidebar = results[1].data;
		$scope.posts_comments = results[2].data;
	  });
  }

});