<?php require VIEW_PATH . 'partials/header.php'; ?>

    <div class="container">
        <h3 class="text-center mt-5">Task #1 & Task #2 | Competence</h3>
        <p>
            This is a web crawler which can be used for a quick search of an app in the appstore and get a brief info about it.
        </p>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text search-icon-box">
                    <div class="search-icon">
                        🔎
                    </div>
                    <div class="spinner spinner-border spinner-border-sm d-none" role="status"></div>
                </div>
            </div>
            <input id="search-input" type="text" class="form-control" placeholder="Game name">
        </div>

        <div class="col-md-12 games-container"></div>
    </div>

<?php require VIEW_PATH . 'partials/footer.php'; ?>