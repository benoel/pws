<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="ASEMKA">
	<meta name="robots" content="all,follow">
	<title>{{ config('app.name') }}</title>

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
	.agreement-box{
		max-width: 900px;
		margin: 0 auto;
		padding: 20px 0px;
		font-size:16px;
		line-height:20px;
		font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		color:#555;
	}
	.divider{
		margin: 5px 0;
		width: 100%;
		border: 1px solid #3e3e3e;
	}
	.agreement-box h2,
	.agreement-box h3,
	.agreement-box h4,
	.agreement-box h5{
		margin: 3px;
		padding: 0;
	}
	.text-center{
		text-align: center;
	}
	.table-agreement tr td:nth-child(1){
		width: 25px;
	}
	.table-agreement tr td:nth-child(2){
		width: 20%;
	}
	.table-devolution tr td:nth-child(1){
		width: 25px;
		text-align: left;
		vertical-align: top;
	}
	.table-devolution tr td p{
		margin: 0;
		padding: 0;
	}
	.table-devolution tr td{
		margin: 0 5px;
	}
	.table-detail tr td:nth-child(1){
		width: 70px;
	}
	.table-detail tr td:nth-child(2){
		width: 120px;
	}
	.pasal{
		font-weight: 600;
		font-size: 16px;
		text-align: center;
	}
	.agreement-box ul{
		padding-left: 0;
	}
	.agreement-box ul li{
		list-style: none;
	}
	.assign{
		margin-top: 40px;
		text-align: center;
		width: 100%;
	}
	.assign tr td{
		width: 200px;
	}


</style>
</head>
<body>
	@yield('content')
</body>
</html>
