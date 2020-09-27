<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    /**
     * Home page
     */
    public function home()
    {
        return view('index');
    }

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

        return view('second-task', ['games' => $games]);
    }

    /**
     * Forth task page
     */
    public function forthTask()
    {
        return view('forth-task');
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

        return view('fifth-task', ['feedbacked_games' => $feedbacked_games]);
    }
}
