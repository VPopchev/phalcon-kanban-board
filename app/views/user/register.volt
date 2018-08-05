{% extends 'base\base.volt' %}
{% block content %}
    <h2>Register</h2>
    <form method="POST">
        <div>
            <p>Username</p>
            {{ form.render('username') }}
        </div>
        <div>
            <p>Password</p>
            {{ form.render('password') }}
        </div>
        <div>
            {{ submit_button("Register", "class": "btn btn-success") }}
        </div>
    </form>
{% endblock %}
