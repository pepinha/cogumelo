<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=Edge"><![endif]-->
  <title>Test page</title>

  {$css_includes}
  {$js_includes}

</head>

<body>

{"miau"|gettext}

{_("haimarea")}
	{t}miau{/t} 

{assign var="name" value="{t}PRUEBA{/t}"}
{$name}

	<input id="test" value="{t}PRUEBA{/t}"/>


</body>