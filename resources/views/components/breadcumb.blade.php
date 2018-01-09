<ul class="breadcrumb">
	<div class="container-fluid">
		@if ($breadcrumbs != null)
		@foreach ($breadcumbs as $breadcumb)
		<li class="breadcrumb-item"><a href="index.html">{{ $breadcumb['page'] }}</a></li>
		@endforeach
		@endif
	</div>
</ul>