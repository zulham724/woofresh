// require('angular');
import swal from 'sweetalert2';

const app = angular.module('wohfresh',[]);
app.controller('LanguageController',($scope,$http)=>{
	$scope.init = ()=>{
		//
		console.log('LanguageController');
	}

	$scope.delete = ()=>{
		swal({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!',
		  showLoaderOnConfirm: true,
		  preConfirm:(result)=>{
		  	let access = {
		  		_method:"delete"
		  	}
		  	return $http.post("http://localhost/woofresh/public/languages/destroy",access).then(result=>{
		  		console.log(result);
		  	});
		  },
		  allowOutsideClick: () => !swal.isLoading()
		}).then((result) => {
			console.log(result);
		  if (result.value) {
		    swal(
		      'Deleted!',
		      'Your file has been deleted.',
		      'success'
		    )
		  }
		});
	}

	$scope.init();
});