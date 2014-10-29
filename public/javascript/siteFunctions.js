
$(document).ready(function(){

	$("#sign_in").click(function() {
		$("#sign_out").slideToggle(1);
		$(this).slideToggle(1);
		$(".input-hide").slideToggle(250);
	});

	
	$("form.login").keypress(function (e) {
		if (e.which == 13) {
			$('input.submit').click();
		}
	});

	$('form.login').submit( function () {
		var formInputs = $(this).find('input.form-control');
		if(!checkInputFields(formInputs)){
        	return false;
        }

    });

    $('span.label').click(function(event){
        var form = $(event.target).parent('form').get(0);
        $(form).submit();
    });

    $('form').on('submit', function(event){
        var $id = $(event.target).serializeArray()[1]['value'];
        alert($id);
        return false;
    });


	/**
	 * [checkInputFields this function is used to iterate through methods so that it can check whether fields
	 * have been filled in. If a required field is empty it will ]
	 * @param  {[array]} inputs [an array inputs received from the form we wish to validate]
	 * @return {[boolean]}  [returns true or false depending on its success]
	 */
	function checkInputFields(inputs){
		var isValid = true;
		for(var i = 0; i < inputs.length; i++){
			if (!$(inputs[i]).val()) {
				$(inputs[i]).parent().addClass('has-error');
				isValid = false;
			}else{
				$(inputs[i]).parent().removeClass('has-error');
			}
		}
		return isValid;
	}
});