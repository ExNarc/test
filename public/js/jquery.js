  $(document).ready(function(){
  	var str = "";
  	var count = 0;
	$("#addAnswer").click(function () {
		str += "<div class='row'><div class='form-group col-md-8'>";
		str += "<label for='answers[newAnswer][]'>Answer:</label>";
		str += "<input type='text' class='form-control' name='answers[newAnswer][]' value=''>";
		str += "</div></div>";
		str += "<div class='row'><div class='form-group col-md-8'>";
		str += "<label for='answers[newCorrect]["+count+"]'>Corrrect:</label>";
		str += "<label class='radio-inline'><input type='radio' name='answers[newCorrect]["+count+"]' value='1' required>True</label>";
		str += "<label class='radio-inline'><input type='radio' name='answers[newCorrect]["+count+"]' value='0'>False</label>";
		str += "</div></div>";
		$("#Answer").html(str);
		count++;
    });

    $("#addUser").click(function () {
		str += "<div class='row'><div class='form-group col-md-8'>";
		str += "<label for='answers[newAnswer][]'>Answer:</label>";
		str += "<input type='text' class='form-control' name='answers[newAnswer][]' value=''>";
		str += "</div></div>";
		str += "<div class='row'><div class='form-group col-md-8'>";
		str += "<label for='answers[newCorrect]["+count+"]'>Corrrect:</label>";
		str += "<label class='radio-inline'><input type='radio' name='answers[newCorrect]["+count+"]' value='1' required>True</label>";
		str += "<label class='radio-inline'><input type='radio' name='answers[newCorrect]["+count+"]' value='0'>False</label>";
		str += "</div></div>";
		$("#Answer").html(str);
		count++;
    });
});