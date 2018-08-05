<div id='content'>
    <h1>Welcome to KanbanBoard app!</h1>
    <?php if ($this->session->get('username') !== null) { ?>
        <h3>Hello, <?= $this->session->get('username') ?>!</h3>
    <?php } ?>

    
<h1>Create Note</h1>
<form method="POST">
    <div>
        <p>Status</p>
        <?= $form->render('status') ?>
    </div>
    <div>
        <p>Comment</p>
        <?= $form->render('comment') ?>
    </div>
    <div>
        <?= $this->tag->submitButton(['Create', 'class' => 'btn btn-success']) ?>
    </div>
</form>
</div>

<div id='footer'>
    &copy; Copyright 2018, All rights reserved.
</div>