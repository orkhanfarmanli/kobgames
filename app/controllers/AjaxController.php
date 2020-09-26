<?php


namespace App\Controllers;


use App\Core\App;

class AjaxController
{
    public function games()
    {
        $game_id = $_GET['id'];

        $games = App::get('database')->select('select
                f.id,
                g.id game_id,
                g.name game_name,
                f.gameversion game_version,
                p.id player_id,
                p."name" player_name,
                f.feedback feedback
            from
                feedback f
            left join gameplayer p on
                p.id = f.gameplayerid
            left join game g on
                g.id = f.gameid 
            where
                gameid = '.$game_id.';');

        echo json_encode($games);
    }
}