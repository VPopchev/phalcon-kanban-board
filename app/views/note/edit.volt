{% extends 'base\base.volt' %}
{% block content %}
    <h1>Edit Note</h1>
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
            {{ submit_button("Edit", "class": "btn btn-success") }}
        </div>
    </form>
{% endblock %}