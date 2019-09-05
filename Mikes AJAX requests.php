<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
// Script to find and break down the json file. 
<script>
$(function () {
		
	
	$("#mainCategory").change(function() {

	var $dropdown = $(this);

	$.getJSON("WHERE JSON FILE IS LOCATED", function(data) {
	
		var key = $dropdown.val();
		var vals = [];
							
		switch(key) {
			case 'Outfield':
				vals = data.Outfield.split(",");
				break;
					case 'Goalkeeping':
				vals = data.Goalkeeping.split(",");
				break;
					case 'Strength & Conditioning':
				vals = data.StrengthConditioning.split(",");
				break;
			case 'Analysis':
				vals = data.Analysis.split(",");
		}
		
		var $category = $("#category");
		$category.empty();
		$.each(vals, function(index, value) {
			$category.append("<option>" + value + "</option>");
		});

	});
});
	});
</script>



<h2><div class="wpuf-label rh-community-title ">
Select a category
</div> 
</h2>


<select style="width: 202px" class="sign-up-input" name="mainCategory" id="mainCategory">
			    <option value="" disabled selected>Select</option>
                <option value="All">All</option>
			    <option value="Outfield">Outfield</option>
			    <option value="Goalkeeping">Goalkeeping</option>
			    <option value="Strength & Conditioning">Strength & Conditioning</option>
			    <option value="Analysis">Analysis</option>
			</select><br>
			<select style="width: 202px" class="sign-up-input" name="category" id="category" style="width: 148px">
			    <option value="" disabled selected>Select</option>
			</select><br>
AJAX function to look for the data. and post it 
<script>
jQuery(function () {
 jQuery("#mainCategory").change(function() {
        if(jQuery(this).val() == 'All'){
           jQuery.ajax({
                type: 'post',
                url: 'Where REQUEST IS FROM',
               data: {
                    mainCategory : jQuery(this).val()
                },
                success: function (response) {
					$( '#test' ).html(response);    
				
					 
                },
			   
                error: function (d) {
                    console.log(d);
                }
             });
			 //END AJAX
       }
	
    });

    jQuery("#category").change(function() {
        mainCategory = jQuery('#mainCategory').val();
        category = jQuery(this).val();
        data = 'mainCategory=' + mainCategory;
        $.ajax({
            type: 'post',
            url: 'https://fbdna.lincswebdev.co.uk/pitchresults.php',
            data: {
                mainCategory: jQuery('#mainCategory').val(),
                category:  jQuery(this).val()
            },
 success: function (response) {
					$( '#test' ).html(response);    
				
					 
                },
            error: function (d) {
                console.log(d);
            }
        }); //END AJAX
    });
});
	
  
</script>
<div name="test" id="test"></div>
<br>
<div class="cont_pitchimgpicker" id="cont_pitchimgpicker" style="width:100%; display: inline-block;">
<h2><div class="wpuf-label rh-community-title ">
Click a Pitch Diagram to add it to your Drill
</div> 
</h2>   

           
<h2><div class="wpuf-label rh-community-title please-enter-description">
Please enter a description for your drill in the box below
</div> 
</h2> 
</br>
</div>