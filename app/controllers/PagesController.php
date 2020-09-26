<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function home()
    {
        require "app/views/index.view.php";
    }

    public function secondTask()
    {
        $games = App::get('database')->select('select
                gameid,
                (SELECT name FROM game WHERE id = gameSession.gameid) gameName,
                gamesession."version" gameVersion,
                COUNT(gameSession.id) playerCount
            FROM
                gameplayersession gameSession
            GROUP BY
                gameSession.gameid,
                gameSession."version"
            ORDER BY playerCount DESC;');

        require "app/views/second-task.view.php";
    }

    public function forthTask()
    {
        require "app/views/forth-task.view.php";
    }

    public function fifthTask()
    {
        $feedbacked_games = App::get('database')->select('SELECT
                g.*,
                (SELECT count(1) FROM feedback f2 WHERE gameid = g.id) feedback_count
            FROM
                game g
            WHERE
                id in (SELECT gameid FROM feedback f)
            ORDER BY feedback_count DESC;');

        require "app/views/fifth-task.view.php";
    }

    public function contact()
    {
        App::get('database')->insert('users', [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'email' => $_POST['email'],
        ]);
    }
}
