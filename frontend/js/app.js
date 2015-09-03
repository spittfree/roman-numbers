angular.module('numbersApp', [])
    .controller('converterToRoman', function($scope, $http) {

        $scope.input = '';
        $scope.errorMessage = '';
        $scope.result = '';

        $scope.convert = function() {

            if ($scope.__validate()) {
                //URL to rest api to convert to roman
                $http.post('/', {msg: $scope.input}).
                    then(function (response) {
                        //SUCCESS
                        $scope.result = '';
                    }, function (response) {
                        //ERROR
                        $scope.displayErrorMessage();
                        $scope.hideSuccessMessage();
                        //display error API message
                        $scope.errorMessage = 'Error in the API';
                    });
            } else {
                $scope.displayErrorMessage();
                $scope.hideSuccessMessage();
                $scope.errorMessage = 'Input is not valid';
            }

        };

        $scope.__validate = function() {
           //validate data before call API
            return false;
        };

        $scope.displayErrorMessage = function() {
            $('#failure-box').removeClass('hidden');
        };

        $scope.displaySuccessMessage = function() {
            $('#success-box').removeClass('hidden');
        };

        $scope.hideErrorMessage = function(){
            $('#failure-box').addClass('hidden');
        };

        $scope.hideSuccessMessage = function(){
            $('#success-box').addClass('hidden');
        };

    })