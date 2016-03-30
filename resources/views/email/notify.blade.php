<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Someone Just Viewed An Academy</title>
	<style type="text/css">
		* {
			font-family: Helvetica, Arial, Verdana, Trebuchet MS;
		}
		body {
			background: #f9fafb;
			margin: 0;
		}
		.container {
			max-width:500px;
			margin: 25px auto;
			background: #fff;
			border: 1px solid #f4f6f8;
			border-radius: 3px;

			-webkit-box-sizing: border-box;
			   -moz-box-sizing: border-box;
			        box-sizing: border-box;
		}
		.header {
			text-align: center;
			background: #41245C;
			color: #fff;
			padding: 20px;
			border-radius: 3px 3px 0 0;
			border-bottom: 1px solid #1a0e25;
			box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
		}
		.content {
			padding: 25px;
			padding-bottom: 0;
		}
		hr {
		    display: block;
		    height: 1px;
		    border: 0;
		    border-top: 1px solid #f2f4f7;
		    margin: 1em 0;
		    padding: 0; 
		}
		.footer {
			padding: 0 25px;
			text-align: center;
			color: #c2c4c7;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="header">
			<h1>academia</h1>
		</div>
		<div class="content">
			<h1>Hey admin,</h1>
			<br>
			<p>Someone just checked "<strong>{{ $academy->name }}</strong>".</p>
			<br><br>
			<p>Thank you</p>
			<br><hr>
		</div>
		<div class="footer">
			<p>Academia &copy; 2016</p>
		</div>
	</div>
</body>
</html>