<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;

class PhpAndPostgresController extends Controller
{
    /**
     * Second task page
     */
    public function secondTask()
    {
        $games = App::get('database')->select('SELECT
                gameid,
                (SELECT name FROM game WHERE id = gameSession.gameid) gameName,
                gamesession."version" gameVersion,
                COUNT(gameSession.id) playerCount
                FROM gameplayersession gameSession
                GROUP BY gameSession.gameid, gameSession."version"
                ORDER BY playerCount DESC;');

        return $this->view('php-and-postgresql/second-task', ['games' => $games]);
    }

    /**
     * Forth task page
     */
    public function forthTask()
    {
        return $this->view('php-and-postgresql/forth-task');
    }

    /**
     * Fifth task page
     */
    public function fifthTask()
    {
        $feedbacked_games = App::get('database')->select('SELECT
                g.*,
                (SELECT count(1) FROM feedback f2 WHERE gameId = g.id) feedback_count
                FROM game g WHERE id in (SELECT gameId FROM feedback f)
                ORDER BY feedback_count DESC;');

        return $this->view('php-and-postgresql/fifth-task', ['feedbacked_games' => $feedbacked_games]);
    }

    /**
     * Sixth task page
     */
    public function sixthTask()
    {
        return $this->view('php-and-postgresql/sixth-task');
    }

    /**
     * Seventh task page
     */
    public function seventhTask()
    {
        return $this->view('php-and-postgresql/seventh-task');
    }
}
