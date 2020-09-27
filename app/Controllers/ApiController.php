<?php


namespace App\Controllers;

use App\Core\App;

class ApiController
{
    /**
     * Store feedback
     */
    public function storeFeedback()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $gamePlayerSessionId = htmlspecialchars($data['gamePlayerSessionId']);
        $feedback = htmlspecialchars($data['feedback']);

        $data = App::get('database')->select('SELECT
                        gps.gameplayerid game_player_id,
                        gps."version" game_version,
                        g.id game_id
                    FROM gameplayersession gps
                    LEFT JOIN game g ON g.id = gps.gameid
                    JOIN gameplayer gp ON gp.id = gps.gameplayerid 
                    WHERE gps.id = :gamePlayerSessionId;',
            ['gamePlayerSessionId' => $gamePlayerSessionId]);

        if (empty($data)) {
            http_response_code(404);
            echo "Resource not found";
            return;
        }

        App::get('database')->insert('feedback', [
            'feedback' => $feedback,
            'gameVersion' => $data[0]->game_version,
            'gameId' => $data[0]->game_id,
            'gamePlayerId' => $data[0]->game_player_id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        http_response_code(202);
        echo "Data persisted successfully";
    }
}