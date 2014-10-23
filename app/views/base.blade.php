<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {{ HTML::style('http://yui.yahooapis.com/pure/0.5.0/pure-min.css'); }}
	{{ HTML::style('http://purecss.io/css/layouts/side-menu.css'); }}
    {{ HTML::style('styles/p3.css'); }}
</head>
<body>
	<div id="main">
		<div class="header">
		@yield('header')
	</div>
</div>
<div class="content">
    @yield('content')
</div>
</body>
</html>