var app=angular.module('dashboard',['ngRoute']);

app.config(function($routeProvider){
  $routeProvider
  .otherwise({
    templateURL : 'dashboard.php'
  })
});
