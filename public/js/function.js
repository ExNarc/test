	//function setTime(num) {
  		//var str = num;
  		//if (num < 10) {
	  		//num = "0" + num;
  		//}
  		//return num;
	//}

  $(document).ready(function(){
  	var str = "";
  	var count = 0;

	//Date.prototype.toDateInputValue = (function() {
	    //var date = new Date();
    	//var str = date.getFullYear() + "-" + setTime(date.getMonth() + 1) + "-" + setTime(date.getDate()) + "T" +  setTime(date.getHours()) + ":" + setTime(date.getMinutes());
   		 //return str;
//	});
	//(date.getMonth() + 1)
  	//$('input[type=datetime-local]').val(new Date().toDateInputValue());
	

	$("#addAnswer").click(function () {
		str = "<div class='row'><div class='form-group col-md-8'>";
		str += "<label for='answers[newAnswer][]'>Answer:</label>";

		str += "<button type='button' class='close' aria-label='Close'>";
		str += "<span aria-hidden='true'>&times;</span>";
		str += "</button>";

		str += "<textarea name='answers[newAnswer][]'></textarea>";
		//str += "</div></div>";
		
		//str += "<div class='row'><div class='form-group col-md-8'>";
		str += "<label for='answers[newCorrect]["+count+"]'>Corrrect:</label>&nbsp;";
		str += "<label class='radio-inline'><input type='radio' name='answers[newCorrect]["+count+"]' value='1' required>True</label>";
		str += "<label class='radio-inline'><input type='radio' name='answers[newCorrect]["+count+"]' value='0'>False</label>";
		str += "</div></div>";
		$("#Answer").append(str);
		
		//if(count==0){
			$(".close").click(function () {
				$(this).parent().parent().empty();
    		});
		//}
		count++;
		userEditor();
    });
    $(".close").click(function () {
		$(this).parent().parent().empty();
    });

  	$(".show").click(function(){
    	$(".expand1").toggle();
  	});
    //$("#addUser").click(function () {
		//str = "<div class='row'><div class='form-group col-md-8'>";
		//str += "<label for='answers[newAnswer][]'>Answer:</label>";
		//str += "<input type='text' class='form-control' name='answers[newAnswer][]' value=''>";
		//str += "</div></div>";
		//str += "<div class='row'><div class='form-group col-md-8'>";
		//str += "<label for='answers[newCorrect]["+count+"]'>Corrrect:</label>";
		//str += "<label class='radio-inline'><input type='radio' name='answers[newCorrect]["+count+"]' value='1' required>True</label>";
		//str += "<label class='radio-inline'><input type='radio' name='answers[newCorrect]["+count+"]' value='0'>False</label>";
		//str += "</div></div>";
		//$("#Answer").append(str);
		//count++;
    //});
});