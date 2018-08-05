{% extends 'base\base.volt' %}
{% block content %}
    {% if loggedUser %}
        <div class="links-container">
            <a href="note/create">Create Note</a>
            <a href="user/logout">Logout</a>
        </div>
        <section class="notes-container">
            <div class="open-notes">
                <h2>Open Notes</h2>
                {% for note in openNotes %}
                    {% if note != null %}
                        {{ partial('partials/singleNote') }}
                    {% endif %}
                {% endfor %}
            </div>
            <div class="inProgress-notes">
                <h2>In Progress Notes</h2>
                {% for note in inProgressNotes %}
                    {% if note != null %}
                        {{ partial('partials/singleNote') }}
                    {% endif %}
                {% endfor %}
            </div>
            <div class="finished-notes">
                <h2>Finished Notes</h2>
                {% for note in finishedNotes %}
                    {% if note != null %}
                        {{ partial('partials/singleNote') }}
                    {% endif %}
                {% endfor %}
            </div>
        </section>
    {% else %}
        <div class="links-container">
            <a href="user/login">Login</a>
            <a href="user/register">Register</a>
        </div>
    {% endif %}
{% endblock %}


