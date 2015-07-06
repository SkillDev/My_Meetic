$(document).ready(function(){

	$("#hide").hide();
	$(".submit").hide();

	$(document).on('click', '.sub' , function() {


		if($('#age').val() == "") {
			$('#age').attr('placeholder','DATE OF BIRTH').parentqw.addClass('has-error');

			resultat = false;
		}
		if($('#year').val() != "" ){

			$("#hide").show(500); 
			$(".submit").show();
			$(".sub").hide();    
		}      
		else {
			alert("vous devez avoir plus de 18 ans !");
		}
		return resultat;
	});
	

});

function check_info() {
	var username = $("#username").val();
	if(username =="") {
		alert("Remplis connard !!!!");
		return false;

	}
	else {
		return true;
	}

};

