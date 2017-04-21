var checkval = "";
var idval = "";
//creating the app
var task = angular.module('getTaken', []);
//creating the controller
task.controller('takenCtrl', ['$scope', '$http', function ($scope, $http) {
    //getting the info to display in a table
    $http.get("taken.php")
        .then(function (response) {$scope.taken = response.data.taken; });
    //getting the info from personen table
    $http.get("setperson.php")
        .then(function (response) {$scope.person = response.data.person; });
    //binding values set in index to variables
    $scope.selvalTaken = function (tval, tId) {
        checkval = tval;
        idval = tId;
    };
    //binding value from persons
    function bindPersonId() {
        $scope.persoonId = $scope.person.persoonId;
    }
    //updating the colleague working on the task
    $scope.save = function () {
        bindPersonId();
        $scope.dataObj = {'persoonId': $scope.persoonId, 'taak': checkval, 'taakId': idval};
        $scope.info = $http.post('save.php', $scope.dataObj);
        location.reload();
    };
    //binding value for a new task
    function newTaak() {
        $scope.makeTaak = $scope.addTaak.newTaak;
    }
    //inserting a new task into the database
    $scope.create = function () {
        newTaak();
        $scope.dataObj = {'taak': $scope.makeTaak};
        $scope.info = $http.post('add.php', $scope.dataObj);
        location.reload();
    };
    //deleting a selected task
    $scope.finish = function () {
        $scope.dataObj = {'taak': checkval, 'taakId': idval};
        $scope.info = $http.post('finish.php', $scope.dataObj);
        location.reload();
    };
}]);