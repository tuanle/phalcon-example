<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{ assets.outputCss() }}
</head>
<body>
    <div id="content" class="container py-4">
        {% block content %}{% endblock %}
    </div>
</body>
</html>
