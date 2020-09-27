<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <a class="navbar-brand" href="/">Kob Games</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link <?= routeIs('/second-task') ? 'active' : '' ?>" href="/second-task">
                PHP & Postgresql #1.2
            </a>
            <a class="nav-link <?= routeIs('/forth-task') ? 'active' : '' ?>" href="/forth-task">PHP & Postgresql #1.4</a>
            <a class="nav-link <?= routeIs('/fifth-task') ? 'active' : '' ?>" href="/fifth-task">PHP & Postgresql #1.5</a>
        </div>
    </div>
</nav>