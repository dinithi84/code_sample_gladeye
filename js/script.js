$(document).ready(function(){
  $(document).on('click', 'span', function(event, ui) {
    var data_id = $(this).attr('class');
	  $("#member-id").val(data_id);

    $.ajax({
      type: "POST",
      url: "view-data.php",
      data: 'member-id='+data_id,
      datatype: "html",
      success: function(result){
        $(".member-content").html(result);
      }
    });
    $("#pop-content").css("display","block");
    $("#fade").css("display","block");
});

  $(document).on('click', '#delete-mem', function(event, ui) {
    var data_id = $(this).attr('class');
    //var confirm = confirm("Press a button!");
    $("#del-content").css("display","block");
    $("#fade").css("display","block");

    $('#yes-button').click(function() {
      $.ajax({
        type: "POST",
        url: "delete-confirm.php",
        data: 'mem_id='+data_id,
        datatype: "html",
        success: function(result){
          if(result==1){
            $("del-success").css("display", "block");
            $("del-fail").css("display", "none");
            $("#del-content").css("display","none");
            $("#fade").css("display","none");
            location.reload();
          }else if(result==0){
            $("del-fail").css("display", "block");
            $("del-success").css("display", "none");
          }
        }
      });
    });
    $('#no-button').click(function() {
      $("#del-content").css("display","none");
      $("#fade").css("display","none");
    });

  });



    $("#close-details").click(function() {
    $("#member-id").val('');
    $("#pop-content").css("display","none");
    $("#fade").css("display","none");
  });


  $('#Submit-btn').click(function() { 
 		
		$(".error").hide();
    var hasError = false;
 
    var emailaddressVal = $("#email").val();
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var name = $.trim($('#fullname').val());
		var telephone = $.trim($('#telephone').val());
		var route = $.trim($('#route').val());
		
		if (name  == '') {
			$("#fullname").after('<span class="error">Please enter the Full name.</span>');
         hasError = true;
		}else if(emailaddressVal == '') {
         $("#email").after('<span class="error">Please enter your email address.</span>');
         hasError = true;
    }else if(!emailReg.test(emailaddressVal)) {
		    $("#email").after('<span class="error">Enter a valid email address.</span>');
		    hasError = true;
		}else if (telephone  == '') {
			  $("#telephone").after('<span class="error">Please enter the Telephone.</span>');
        hasError = true;
		}else if (route  == 0) {
			$("#route").after('<span class="error">Please select a route.</span>');
            hasError = true;
		}
		
		if(hasError == true) { return false; }
 
    });

});