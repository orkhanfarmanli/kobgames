<?php


namespace App\Controllers;

use App\Core\App;
use App\Core\BaseApi;

class ApiController extends BaseApi
{
    /**
     * Store feedback
     */
    public function storeFeedback()
    {
        $data = $this->request();

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
            $this->response(404, 'Resource not found');
        }

        if ($feedback == ''){
            $this->response(500, 'Feedback is empty');
        }

        App::get('database')->insert('feedback', [
            'feedback' => $feedback,
            'gameVersion' => $data[0]->game_version,
            'gameId' => $data[0]->game_id,
            'gamePlayerId' => $data[0]->game_player_id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $this->response(201, 'Data persisted successfully');
    }
}