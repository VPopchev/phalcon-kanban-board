{% extends 'base\base.volt' %}
{% block content %}
<h1>Create Note</h1>
<form method="POST">
    <div>
        <p>Status</p>
        {{ form.render('status') }}
    </div>
    <div>
        <p>Comment</p>
        {{ form.render('comment') }}
    </div>
    <div>
        {{ submit_button("Create", "class": "btn btn-success") }}
    </div>
</form>
{% endblock %}