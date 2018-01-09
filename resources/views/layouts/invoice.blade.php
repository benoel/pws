<!DOCTYPE html>
<html>
<head>
	<title>Asemka</title>
	<style>
	.right{
		float: right;
		position: relative;
		top: -60px;
	}
	.right table tr td{
		padding-left: 0;
	}
	.right h2{
		margin: 0;
	}

	.header-invoice{
		display: inline;
	}
	.header-invoice h2,
	.header-invoice h3,
	.header-invoice h4{
	}
	.invoice-box .invoice-desc td{
		padding: 2px;
	}
	.invoice-box .note{
		padding: 10px;
		border: 1px dashed #333;
		margin-bottom: 10px;
		width: 60%;
		display: inline-block;
	}
	.invoice-box .buttom-invoice{
		margin-top: 50px;
	}
	.invoice-box .paraf{
		float: right;
		position: relative;
		top: -17px;
		left: -55px;
	}
	.invoice-box .paraf .text{
		text-align: center;
	}
	.invoice-box h4, .invoice-box h3{
		margin: 0;
		padding: 0;
		font-weight: 500;
		font-size: 16px;
		line-height: 18px;
	}
	.invoice-box{
		max-width:1000px;
		margin: 20px auto;
		padding:30px;
		border:1px solid #eee;
		box-shadow:0 0 10px rgba(0, 0, 0, .15);
		font-size:16px;
		line-height:24px;
		font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		color:#555;
	}

	.invoice-box table{
		width:100%;
		line-height:inherit;
		text-align:left;
	}

	.invoice-box table td{
		padding:5px;
		vertical-align:top;
		text-align: left;
	}

	.invoice-box .title{
		font-size: 22px;
		font-weight: 600;
		text-align: center;
		border-bottom: 1px solid #eee;
		padding: 17px;
		padding-bottom: 7px;
		margin: 10px 0;
	}

	.invoice-box table tr.top table td{
		padding-bottom:20px;
	}

	.invoice-box table tr.top table td.title{
		font-size:45px;
		line-height:45px;
		color:#333;
	}

	.invoice-box table tr.information table td{
		padding-bottom:40px;
	}

	.invoice-box table tr.heading td{
		background:#eee;
		border-bottom:1px solid #ddd;
		font-weight:bold;
	}

	.invoice-box table tr.details td{
		padding-bottom:20px;
	}

	.invoice-box table tr.item td{
		border-bottom:1px solid #eee;
	}

	.invoice-box table tr.item.last td{
		border-bottom:none;
	}

	.invoice-box table tr.total td{
		border-top:2px solid #eee;
		font-weight:bold;
	}
	table.table-grand-total{
		float: right;
		width: 30%;
	}
	.table-grand-total td.grand-total-detail{
		text-align: right;
	}
	.invoice-box .table-grand-total td{
		padding: 0;
	}
	.invoice-box .keterangan td{
		padding: 0;
	}

	@media only screen and (max-width: 600px) {
		.invoice-box table tr.top table td{
			width:100%;
			display:block;
			text-align:center;
		}

		.invoice-box table tr.information table td{
			width:100%;
			display:block;
			text-align:center;
		}
	}
</style>
</head>

<body>
	@yield('content')
</body>
</html>
