<?php require VIEW_PATH . 'partials/header.php'; ?>

<div class="container">
    <h3 class="text-center mt-5">Task #6 | Database query optimization methods</h3>

    <p>
        1. First step to optimization is to index the most used fields such as id's of the players, games, and player
        session
        ids which will be used in search.
    </p>
    <p>
        2. There can also be created a separate table that can hold the analyzed data which will be generated
        automatically by daily cron jobs. This will help reducing unnecessary query to the actual tables.
    </p>
    <p>
        3. Third step is query caching which can increase performance while fetching results from database.
    </p>
</div>

<?php require VIEW_PATH . 'partials/footer.php'; ?>
