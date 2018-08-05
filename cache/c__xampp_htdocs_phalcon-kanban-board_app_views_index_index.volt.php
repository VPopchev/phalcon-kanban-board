<!DOCTYPE html>
<html>
<head>
    
        <link rel="stylesheet" href="styles.css">
    

    <title></title>
</head>

<body>
<div id='content'>
    <h1>Welcome to KanbanBoard app!</h1>
    <?php if ($this->session->get('username') !== null) { ?>
        <h3>Hello, <?= $this->session->get('username') ?>!</h3>
    <?php } ?>

    
    <?php if ($loggedUser) { ?>
        <div class="links-container">
            <a href="note/create">Create Note</a>
            <a href="user/logout">Logout</a>
        </div>
        <section class="notes-container">
            <div class="open-notes">
                <h2>Open Notes</h2>
                <?php foreach ($openNotes as $note) { ?>
                    <?php if ($note != null) { ?>
                        <?= $this->partial('partials/singleNote') ?>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="inProgress-notes">
                <h2>In Progress Notes</h2>
                <?php foreach ($inProgressNotes as $note) { ?>
                    <?php if ($note != null) { ?>
                        <?= $this->partial('partials/singleNote') ?>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="finished-notes">
                <h2>Finished Notes</h2>
                <?php foreach ($finishedNotes as $note) { ?>
                    <?php if ($note != null) { ?>
                        <?= $this->partial('partials/singleNote') ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </section>
    <?php } else { ?>
        <div class="links-container">
            <a href="user/login">Login</a>
            <a href="user/register">Register</a>
        </div>
    <?php } ?>
</div>

<div id='footer'>
    &copy; Copyright 2018, All rights reserved.
</div>
</body>
</html>