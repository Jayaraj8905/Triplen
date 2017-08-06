var module = angular.module('app', ['data-table']);

module.controller('MyControllerb', function($scope, $http) {
  $scope.options = {
    rowHeight: 50,
    footerHeight: false,
    scrollbarV: false,
    headerHeight: 50,
    columnMode: 'flex',
    columns: [{
      name: "Company",
      prop: "company",
      flexGrow: 2,
    }, {
      name: "Revenue",
      flexGrow: 1,
      prop: "revenue"
    }, {
      name: "Sales",
      flexGrow: 1,
      prop: "sales"
    }]
  };

  $scope.data = [{
    'company': 'Acme',
    'revenue': ['$3,452,342','$3,452,343'],
    'sales': '$3,452,342,353'
  }, {
    'company': 'Acme Holdings',
    'revenue': '$345,342',
    'sales': '$4,452,222,353',
  }, {
    'company': 'Acme Limited',
    'revenue': '$344,442',
    'sales': '$10,452,444,353',
  }, {
    'company': 'Sterling',
    'revenue': '$40,443,111',
    'sales': '$50,433,777,564'
  }, {
    'company': 'Apple',
    'revenue': '$1,440,443,111',
    'sales': '$999,509,433,777,564'
  }, {
    'company': 'Apple IBS',
    'revenue': '$1,440,443,111',
    'sales': '$999,509,433,777,564',
  }, {
    'company': 'Apple IBS South',
    'revenue': '$1,440,443,111',
    'sales': '$999,509,433,777,564',
  }];

});

module.controller('MyController', function($scope, $http) {
  $scope.options = {
    rowHeight: 50,
    footerHeight: false,
    scrollbarV: true,
    headerHeight: 50,
    forceFillColumns: true,
    columns: [{
      name: 'Athlete',
      prop: 'athlete',
      width: 300
    }, {
      name: 'Country',
      prop: 'country',
      group: true
    }, {
      name: 'Year',
      prop: 'year'
    }, {
      name: 'Sport',
      prop: 'sport'
    }]
  };
  // $scope.data =[
  // {"athlete":"Michael Phelps","age":23,"country":"United States","year":2008,"date":"24/08/2008","sport":"Swimming","gold":8,"silver":0,"bronze":0,"total":8},
  // {"athlete":"Michael Phelps","age":19,"country":"United States","year":2004,"date":"29/08/2004","sport":"Swimming","gold":6,"silver":0,"bronze":2,"total":8},
  // {"athlete":"Michael Phelps","age":27,"country":"United States","year":2012,"date":"12/08/2012","sport":"Swimming","gold":4,"silver":2,"bronze":0,"total":6},
  // {"athlete":"Michael Phelps","age":27,"country":"United States","year":2012,"date":"12/08/2012","sport":"Swimming","gold":4,"silver":2,"bronze":0,"total":6},
  // {"athlete":"Michael Phelps","age":27,"country":"United States","year":2012,"date":"12/08/2012","sport":"Swimming","gold":4,"silver":2,"bronze":0,"total":6},
  // {"athlete":"Michael Phelps","age":23,"country":"Russia","year":2008,"date":"24/08/2008","sport":"Swimming","gold":8,"silver":0,"bronze":0,"total":8},
  // {"athlete":"Michael Phelps","age":19,"country":"Russia","year":2004,"date":"29/08/2004","sport":"Swimming","gold":6,"silver":0,"bronze":2,"total":8},
  // {"athlete":"Michael Phelps","age":27,"country":"Russia","year":2012,"date":"12/08/2012","sport":"Swimming","gold":4,"silver":2,"bronze":0,"total":6},
  // {"athlete":"Michael Phelps","age":27,"country":"Russia","year":2012,"date":"12/08/2012","sport":"Swimming","gold":4,"silver":2,"bronze":0,"total":6},
  // {"athlete":"Michael Phelps","age":27,"country":"Russia","year":2012,"date":"12/08/2012","sport":"Swimming","gold":4,"silver":2,"bronze":0,"total":6}
  // ]
  $http.get('https://cdn.rawgit.com/Swimlane/angular-data-table/master/demos/data/olympics.json').success(function(data) {
    $scope.data = data;
  });
  $scope.groupCountry = function() {
    var col = $scope.options.columns.find(function(c) {
      return c.prop === 'country';
    });
    col.group = !col.group;
  };
  $scope.groupYear = function() {
    var col = $scope.options.columns.find(function(c) {
      return c.prop === 'year';
    });
    col.group = !col.group;
  };

}); 