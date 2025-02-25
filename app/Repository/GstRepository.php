<?php

namespace App\Repository;

class GstRepository
{
    public function getInfo($gstin)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://powerful-gstin-tool.p.rapidapi.com/v1/gstin/'.$gstin.'/details', [
            'headers' => [
                'X-RapidAPI-Host' => 'powerful-gstin-tool.p.rapidapi.com',
                'X-RapidAPI-Key' => 'af02d35c98mshf3001be5c4cc85cp1347b0jsn711cf4fd2a2a',
            ],
        ]);

        return json_decode($response->getBody());
    }
}
