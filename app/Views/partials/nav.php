<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <a class="navbar-brand" href="/">Kob Games</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?= \App\Helpers\Helper::routeIsActive('php-and-postgresql') ?>" id="php-and-postgresql-dropdown" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    PHP & Postgresql
                </a>
                <div class="dropdown-menu" aria-labelledby="php-and-postgresqlql-dropdown">
                    <a class="dropdown-item" href="/php-and-postgresql/second-task">
                        Task #2
                    </a>
                    <a class="dropdown-item" href="/php-and-postgresql/forth-task">
                        Task #4
                    </a>
                    <a class="dropdown-item" href="/php-and-postgresql/fifth-task">
                        Task #5
                    </a>
                    <a class="dropdown-item" href="/php-and-postgresql/sixth-task">
                        Task #6
                    </a>
                    <a class="dropdown-item" href="/php-and-postgresql/seventh-task">
                        Task #7
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?= \App\Helpers\Helper::routeIsActive('servers') ?>" id="servers" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Servers
                </a>
                <div class="dropdown-menu" aria-labelledby="servers">
                    <a class="dropdown-item" href="/servers/first-and-second-task">
                        Task #1 & Task #2
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?= \App\Helpers\Helper::routeIsActive('competence') ?>" id="competence" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Competence
                </a>
                <div class="dropdown-menu" aria-labelledby="competence">
                    <a class="dropdown-item" href="/competence/first-and-second-task">
                        Task #1 & Task #2
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>