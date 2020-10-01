<?php

namespace App\Controllers;


use App\Core\App;
use App\Core\BaseApi;
use App\Helpers\Helper;
use Goutte\Client;

class AjaxController extends BaseApi
{
    /**
     * Get game feedbacks by game id
     */
    public function feedbacks()
    {
        $game_id = htmlspecialchars($_GET['id']);

        $feedbacks = App::get('database')->select('SELECT
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

        $this->response(202, $feedbacks);
    }

    /**
     * Get games
     */
    public function games()
    {
        $game = Helper::slugify(htmlspecialchars($_GET['game']));

        $client = new Client();
        $crawler = $client->request('GET', "https://www.apple.com/sg/search/$game?src=serp");
        $games = $crawler->filter('.as-explore-curated > .as-explore-product')->each(function ($node) {
            return [
                'id' => $node->filter('.as-productname')->attr('data-relatedlink'),
                'title' => $node->filter('.as-productname')->text(),
                'description' => $node->filter('.as-productdescription')->text(),
                'img' => $node->filter('.as-productimage img')->attr('src'),
                'url' => $node->filter('.as-links-name')->attr('href')
            ];
        });

        if (empty($games)) {
            $this->response(404, 'Not found');
        }

        $this->response(202, $games);
    }

    /**
     * Get game details
     */
    public function gameDetails()
    {
        $url = $_GET['url'];

        $details = [];

        $client = new Client();
        $crawler = $client->request('GET', $url);

        $details['rating'] = $crawler->filter('.we-customer-ratings__averages__display')->text();
        $details['developer'] = $crawler->filter('h2[data-test-developer-name]')->text();
        $details['price'] = $crawler->filter('li[data-test-buy-price]')->text();
        $details['keywords'] = Helper::getMostFrequentWords($crawler->filter('div[data-test-description]')->text());
        $details['url'] = $url;

        $this->response(202, $details);
    }
}