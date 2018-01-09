
$(document).ready(function() {
	// init dataTables
	$('#dataTables').DataTable({
		// settings
		"bPaginate": true,
		"bLengthChange": false,
		"bFilter": true,
		"bInfo": false,
		"bAutoWidth": false 
	});


	$('.select2').select2();

});

function confirmDelete(){
	var x = confirm("Apa anda yakin ingin hapus?");
	if (x){
		return true;

	}else{
		return false;
	}
}

function conf(text) {
	var x = confirm(text);
	if (x){
		return true;

	}else{
		return false;
	}	
}