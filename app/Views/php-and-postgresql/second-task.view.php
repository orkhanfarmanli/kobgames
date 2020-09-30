<?php require VIEW_PATH . 'partials/header.php'; ?>

<div class="container">
    <h3 class="text-center">Task #2 | Games</h3>
    <p class="mb-3">Data is sorted by player count of the game version. This will help viewer to get a better
        understanding of the current situation</p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Version</th>
            <th scope="col">Player Count</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($games as $game): ?>
            <tr>
                <th scope="row"><?= $game->gameid ?></th>
                <td><?= $game->gamename ?></td>
                <td><?= $game->gameversion ?></td>
                <td><?= $game->playercount ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require VIEW_PATH . 'partials/footer.php'; ?>

