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
});

function confirmDelete()
{
	var x = confirm("Apa anda yakin ingin hapus?");
	if (x){
		return true;
		
	}else{
		return false;
	}
}