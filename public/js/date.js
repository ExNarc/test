  $(document).ready(function(){
  	$("#setTime").click(function () {
		var check = true;
		var temp_check = true;
		var str = "Error : \n";
		if($("input[name='open_month']").val()>12){
			temp_check = false;
			str += "open-> month can not bigger than 12\n";
		}
		else {
			switch ($("input[name='open_month']").val()) {
				case "02" :
					if($("input[name='open_day']").val()>29){
						temp_check = false;
						str += "open-> day can not bigger than 29\n";
					}
					break;
				case "01" :
				case "03" :
				case "05" :
				case "07" :
				case "08" :
				case "12" : 
					if($("input[name='open_day']").val()>31){
						temp_check = false;
						str += "open-> day can not bigger than 31\n";
					}
					break;
				default :
					if($("input[name='open_day']").val()>30){
						temp_check = false;
						str += "open-> day can not bigger than 30\n";
					}
			}
		}
		if($("input[name='open_hour']").val()>12){
			temp_check = false;	
			str += "open-> hour can not bigger than 12\n";
		}
		if($("input[name='open_minute']").val()>60 ){
			temp_check = false;
			str += "open-> minute can not bigger than 60\n";
		}
		if(temp_check){
			$("input[name='open']").val($("input[name='open_year']").val() + "-" + $("input[name='open_month']").val() + "-" + $("input[name='open_day']").val() + " " +  $("input[name='open_hour']").val() + ":" + $("input[name='open_minute']").val() + ":00");	
		}
		else{
			check = false;
		}

		temp_check = true;
		if($("input[name='end_month']").val()>12){
			temp_check = false;
			str += "end-> month can not bigger than 12\n";
		}
		else {
			switch ($("input[name='end_month']").val()) {
				case "02" :
					if($("input[name='end_day']").val()>29){
						temp_check = false;
						str += "end-> day can not bigger than 29\n";
					}
					break;
				case "01" :
				case "03" :
				case "05" :
				case "07" :
				case "08" :
				case "12" : 
					if($("input[name='end_day']").val()>31){
						temp_check = false;
						str += "end-> day can not bigger than 31\n";
					}
					break;
				default :
					if($("input[name='end_day']").val()>30){
						temp_check = false;
						str += "end-> day can not bigger than 30\n";
					}
			}
		}
		if($("input[name='end_hour']").val()>12){
			temp_check = false;	
			str += "end-> hour can not bigger than 12\n";
		}
		if($("input[name='end_minute']").val()>60 ){
			temp_check = false;
			str += "end-> minute can not bigger than 60\n";
		}
		if(temp_check){
			$("input[name='end']").val($("input[name='end_year']").val() + "-" + $("input[name='end_month']").val() + "-" + $("input[name='end_day']").val() + " " +  $("input[name='end_hour']").val() + ":" + $("input[name='end_minute']").val() + ":00");	
		}
		else{
			check = false;
		}
		if (check){
			$("#form").submit();
		}
		else{
			alert(str);
		}
    });
});