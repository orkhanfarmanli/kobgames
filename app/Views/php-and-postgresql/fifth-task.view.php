<?php require VIEW_PATH . 'partials/header.php'; ?>

<div class="container">
    <h3 class="text-center">Task #5 | Feedbacks</h3>
    <div class="row">
        <div class="col-md-4">
            <ul class="list-group">
                <?php foreach ($feedbacked_games as $game): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a class="game" data-id="<?= $game->id ?>" href="javascript:void(0)"><?= $game->name ?></a>
                        <span class="badge badge-primary badge-pill"><?= $game->feedback_count ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-8 feedback-container"></div>
    </div>
</div>

<?php require VIEW_PATH . 'partials/footer.php'; ?>
