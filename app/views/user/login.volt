{% extends 'base\base.volt' %}
{% block content %}
    <h2>Login</h2>
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
            {{ submit_button("Login", "class": "btn btn-success") }}
        </div>
    </form>
{% endblock %}
{#<?php echo $this->tag->form('user/login') ?>#}
{#<p>#}
    {#<label for="name">Username</label>#}
    {#<?php echo $this->tag->textField("username"); ?>#}
{#</p>#}
{#<p>#}
    {#<label for="email">Password</label>#}
    {#<?php echo $this->tag->passwordField("password"); ?>#}
{#</p>#}
{#<p>#}
    {#<?php echo $this->tag->submitButton("Login"); ?>#}
{#</p>#}
{#</form>#}
