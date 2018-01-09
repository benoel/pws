@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h4>Pilih Laporan</h4>
		</div>
		<div class="card-body">
			<form method="post" action="{{ route('admin.report.result') }}">
				{{csrf_field()}}
				<div class="i-checks">
					<input id="rent" type="radio" value="rent" name="report" class="radio-template">
					<label for="rent">Laporan sewa</label>
				</div>
				<div class="i-checks">
					<input id="rent_payment" type="radio" value="rent_payment" name="report" class="radio-template">
					<label for="rent_payment">Laporan sewa yang sudah dibayar</label>
				</div>
				<div class="i-checks">
					<input id="devolution" type="radio" value="devolution" name="report" class="radio-template">
					<label for="devolution">Laporan biaya peralihan</label>
				</div>
				<div class="i-checks">
					<input id="other" type="radio" value="other" name="report" class="radio-template">
					<label for="other">Laporan biaya lain-lain</label>
				</div>
				<div class="form-group">
					<label class="form-control-label">Dari Tanggal</label>
					<input id="datepicker1" width="276" name="from" />
				</div>
				<div class="form-group">
					<label class="form-control-label">Sampai Tanggal</label>
					<input id="datepicker2" width="276" name="to" />
				</div>
				<div class="form-group">       
					<input type="submit" value="Submit" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$('#datepicker1').datepicker({
		uiLibrary: 'bootstrap4',
		iconsLibrary: 'fontawesome',
		format: 'yyyy-mm-dd'
	});
	$('#datepicker2').datepicker({
		uiLibrary: 'bootstrap4',
		iconsLibrary: 'fontawesome',
		format: 'yyyy-mm-dd'
	});
</script>
@endsection