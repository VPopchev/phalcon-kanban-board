<div id='content'>
    <h1>Welcome to KanbanBoard app!</h1>
    <?php if ($this->session->get('username') !== null) { ?>
        <h3>Hello, <?= $this->session->get('username') ?>!</h3>
    <?php } ?>

    
    <h2>Login</h2>
    <form method="POST">
        <div>
            <p>Username</p>
            <?= $form->render('username') ?>
        </div>
        <div>
            <p>Password</p>
            <?= $form->render('password') ?>
        </div>
        <div>
            <?= $this->tag->submitButton(['Login', 'class' => 'btn btn-success']) ?>
        </div>
    </form>
</div>

<div id='footer'>
    &copy; Copyright 2018, All rights reserved.
</div>