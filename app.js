var app = angular.module('plunker', ['ngTagsInput']);

app.controller('MainCtrl', function($scope, $http) {
    $scope.tags = [];
    $scope.category = [];
    $http.get('category.php', { cache: true}).then(function(response) {
        return $scope.category = response.data;
    });


  $scope.loadCountries = function($query) {
    return $http.get('tag.php?q='+$query, { cache: true}).then(function(response) {
      var countries = response.data;
      return countries.filter(function(country) {

        return country.name.toLowerCase().indexOf($query.toLowerCase()) != -1;
      });
    });
  };

 $scope.submit = function() {
    var log = '';
    angular.forEach($scope.tags, function(value, key) {
        if(key == 0){
            log += value.id;
        }else{
            log += ","+value.id;
        }

    });
     console.log(log+" in "+$scope.selectcategory);
};

     $scope.update = function() {
         console.log('change');
     };

});
