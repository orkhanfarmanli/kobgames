<?php

namespace App\Controllers;


use App\Core\App;
use App\Core\Controller;

class AjaxController extends Controller
{
     /**
     * Get game feedbacks by game id
     */
    public function feedbacks()
    {
        $game_id = htmlspecialchars($_GET['id']);

        $games = App::get('database')->select('SELECT
                f.id,
                g.id game_id,
                g.name game_name,
                f.gameVersion game_version,
                p.id player_id,
                p."name" player_name,
                f.feedback feedback
            FROM feedback f
            LEFT JOIN gamePlayer p ON p.id = f.gamePlayerId
            LEFT JOIN game g ON g.id = f.gameId 
            WHERE gameId = :gameId
            ORDER BY created_at DESC;', ['gameId' => $game_id]);

        echo json_encode($games);
    }
}