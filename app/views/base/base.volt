<div id='content'>
    <h1>Welcome to KanbanBoard app!</h1>
    {% if session.get('username') !== null %}
        <h3>Hello, {{ session.get('username') }}!</h3>
    {% endif %}

    {% block content %}{% endblock %}</div>

<div id='footer'>
    {% block footer %}&copy; Copyright 2018, All rights reserved.{% endblock %}
</div>