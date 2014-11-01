
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

    $('i.expand-tree').click(function(event){
        var tree = $(event.target).parent('div').get(0);
        $("div.branch.hidden").removeClass('hidden');
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

    var $searchResults = $('.results');
    $('input.searchbar').on('paste propertychange input', function () {
        var input = $('input.searchbar').val();
        if (input.length && $searchResults.hasClass('hidden'))
            $searchResults.removeClass('hidden');
        else if (!input.length && !$searchResults.hasClass('hidden')) {
            $searchResults.addClass('hidden');
        }
        $("ul.dropdown-menu.results").empty();

        $.ajax({
            type: "get",
            url: "search",
            data: 'input=' + input,
            success: function (data) {
                if(data.length){
                    for (var i = 0; i < data.length; i++) {
                        $("<li>" + data[i].taxonomic_rank + ": " + data[i].name + "</li>").appendTo("ul.dropdown-menu.results");
                    }
                }else{
                    $("<li>No Results available</li>" ).appendTo("ul.dropdown-menu.results");
                }
            }
        });
    });

});
