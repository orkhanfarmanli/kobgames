<?php require VIEW_PATH . 'partials/header.php'; ?>

<div class="container">
    <h3 class="text-center">Feedbacks table structure</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Column name</th>
            <th scope="col">Attributes</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Id</td>
            <td>integer, primary key, an auto incremented id of a feedback</td>
        </tr>
        <tr>
            <td>feedback</td>
            <td>text, content of the feedback</td>
        </tr>
        <tr>
            <td>gameVersion</td>
            <td>text, version of the game</td>
        </tr>
        <tr>
            <td>gamePlayerId</td>
            <td>integer, the id of the player giving the feedback</td>
        </tr>
        <tr>
            <td>gameId</td>
            <td>integer, the id of the game</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>timestamp, feedback creation date</td>
        </tr>
        </tbody>
    </table>
</div>

<?php require VIEW_PATH . 'partials/footer.php'; ?>
