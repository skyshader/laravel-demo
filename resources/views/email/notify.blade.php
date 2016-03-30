<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Someone Just Viewed An Academy</title>
</head>
<body style="font-family: Helvetica, Arial, Verdana, Trebuchet MS; background: #f9fafb; margin: 0;">
	<div class="container" style="width: 500px; max-width:500px; margin: 25px auto; background: #fff; border: 1px solid #f4f6f8; border-radius: 3px; box-sizing: border-box;">
		<div class="header" style="text-align: center; background: #41245C; color: #fff; padding: 20px; border-radius: 3px 3px 0 0; border-bottom: 1px solid #1a0e25; box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);">
			<h1 style="color: #fff;">academia</h1>
		</div>
		<div class="content" style="padding: 25px; padding-bottom: 0;">
			<h1>Hey admin,</h1>
			<br>
			<p>Someone just checked "<strong>{{ $academy->name }}</strong>".</p>
			<br><br>
			<p>Thank you</p>
			<br><hr style="display: block; height: 1px; border: 0; border-top: 1px solid #f2f4f7; margin: 1em 0; padding: 0; ">
		</div>
		<div class="footer" style="padding: 0 25px; text-align: center; color: #c2c4c7;">
			<p>Academia &copy; 2016</p>
		</div>
	</div>
</body>
</html>