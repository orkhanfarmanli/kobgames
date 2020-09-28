<?php require VIEW_PATH . 'partials/header.php'; ?>

<div class="container">
    <h2 class="text-center mt-5">API</h2>

    <p>
        Send <b>POST</b> request to
        <br>
        <code><?= $_SERVER['HTTP_HOST'] ?>/api/store-feedback</code>
    </p>
    <p>
        <b>Payload:</b>
    </p>
    <pre>
        {
            gamePlayerSessionId: [the id of the game player session],
            feedback: [the feedback submitted by the player]
        }
    </pre>
</div>

<?php require VIEW_PATH . 'partials/footer.php'; ?>
