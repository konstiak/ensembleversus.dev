<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{{ Lang::get('user.password_reset') }}}</h2>

		<div>
			{{{ Lang::get('user.password_reset_message') }}}: {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>