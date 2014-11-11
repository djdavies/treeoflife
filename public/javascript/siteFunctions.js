
$(document).ready(function(){

	//JS handles the expanding and contracting of the tree view
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

	//search results for the website
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
            url: "search/searchbar",
            data: 'input=' + input,
            success: function (data) {
                if(data.length > 0){
                    for (var i = 0; i < data.length; i++) {
                        $("<li><a href='d/"+data[i].name+"'>" + data[i].taxa_name + ": " + data[i].name + "</a></li>").appendTo("ul.dropdown-menu.results");
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

    $("button.submit_category").click(function(){
        $("form.submit_category").submit();
    });

    //change the value of the hidden input field to the topic_id
    $("a.create_new_catagory").on('click', function(event){
        var id = $(event.currentTarget).data("id");
        console.log(id);
        $(".hidden_topic_input").val(id);
    });

    $("a.delete_topic").click(function(event){
        var id = $(event.target).data("id");
        $('.btn-delete-topic').prop('href', '/forum/topic/'+id+'/delete');
    });

    $("a.delete_category").click(function(event){
        var id = $(event.target).data("id");
        $('.btn-delete-category').prop('href', '/forum/category/'+id+'/delete');
    });


	//JS functions to modularise common tasks to be used again

	//check input fields with ajax
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
