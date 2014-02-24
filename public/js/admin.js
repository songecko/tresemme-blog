$(function(){

	// Delete warning
	$(".delete_btn").click(function(){
		mess="Do you want to delete this record?";
		if (confirm(mess)) {
			return true;
		} else {
			return false;
		}
	});

});	