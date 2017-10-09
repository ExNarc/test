  $(document).ready(function(){
  	var answer = "";
  	var count = 0;
	$("#addAnswer").click(function () {
		answer += "<div class='row'><div class='form-group col-md-8'>";
		answer += "<label for='answers[answer][]'>Answer:</label>";
		answer += "<input type='text' class='form-control' name='answers[answer][]' value=''>";
		answer += "</div></div>";
		answer += "<div class='row'><div class='form-group col-md-8'>";
		answer += "<label for='answers[correct]["+count+"]'>Corrrect:</label>";
		answer += "<label class='radio-inline'><input type='radio' name='answers[correct]["+count+"]' value='1' required>True</label>";
		answer += "<label class='radio-inline'><input type='radio' name='answers[correct]["+count+"]' value='0'>False</label>";
		answer += "</div></div>";
		$("#Answer").html(answer);
		count++;
    });
});