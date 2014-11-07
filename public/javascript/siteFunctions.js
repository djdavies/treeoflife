
$(document).ready(function(){

	$("#sign_in").click(function() {
		$(".sign_up").slideToggle(1);
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

    $('div.root').on('click', 'i.expand-tree', function(event){
        if($(event.target).parent().siblings('div.hidden').length >0){
            $(event.target).removeClass('glyphicon-chevron-right expand-tree')
                .addClass('glyphicon-chevron-left contract-tree');
            $(event.target).parent().siblings('div.hidden').removeClass('hidden');
        }else{
            var parent_id = $(event.target).data("id");
            $.ajax({
                type: "get",
                url: "tree/child",
                cache: false,
                data: 'parent_id=' + parent_id,
                success: function (data) {
                    if(data){
                        $(event.target).removeClass('glyphicon-chevron-right expand-tree')
                            .addClass('glyphicon-chevron-left contract-tree');
                        $(event.target).closest("div").append(data);
                    }
                }
            });
        }
    });

    $('div.root').on('click', 'i.contract-tree', function(event){
        $(event.target).parent().siblings('div').addClass('hidden');
        $(event.target).removeClass('glyphicon-chevron-left contract-tree')
            .addClass('glyphicon-chevron-right expand-tree');
    });

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
            url: "searchbar",
            data: 'input=' + input,
            success: function (data) {
                if(data.length){
                    for (var i = 0; i < data.length; i++) {
                        $("<li>" + data[i].taxa_name + ": " + data[i].name + "</li>").appendTo("ul.dropdown-menu.results");
                    }
                }else{
                    $("<li>No Results available</li>" ).appendTo("ul.dropdown-menu.results");
                }
            }
        });
    });

	//JS for the forum part of the website
	$("button.submit_topic").click(function(){
		$("form.submit_topic").submit();
	});

    $("a.delete_topic").click(function(event){
        var id = $(event.target).data("id");
        $('.btn-delete-topic').prop('href', '/forum/topic/'+id+'/delete');
    });

});
