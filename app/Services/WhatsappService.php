<?php


namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class WhatsappService
{

  public function sendInvoice($data)
  {
    if (1 == 1) {

      $client = new Client();
      $headers = [
        'Authorization' => 'AccessKey J4LgQP6loiiBNhx4tz6MOhr6kwN9z21rlKEa',
        'Content-Type' => 'application/json'
      ];
      $body = [
        "receiver" => [
          "contacts" => [
            [
              "identifierValue" => "+91" . $data['phone']
            ]
          ]
        ],
        "body" => [
          "type" => "file",
          "file" => [
            "files" => [
              [
                "contentType" => "application/pdf",
                "altText" => $data['message'],
                "mediaUrl" => $data['url']
              ]
            ]
          ]
        ]
      ];


      $body_json = json_encode($body);

      $request = new Request('POST', 'https://nest.messagebird.com/workspaces/7a3abcd1-e70b-4eed-9ef1-aedd71276fe1/channels/6e7e6c02-4a11-4d27-bd98-167b47f3ffdb/messages', $headers, $body_json);
      $res = $client->sendAsync($request)->wait();
      return json_decode($res->getBody());

      return $data;
    }
  }
  public function check_balance()
  {
    if (config('sms.sms_provider') == 'fast2sms' && config('sms.send_sms') == 1) {
      $curl = curl_init();
      $YOUR_API_KEY = config('sms.fast2sms.key');

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/wallet",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
          "authorization: $YOUR_API_KEY"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        return "cURL Error #:" . $err;
      } else {
        return json_decode($response);
      }
    }
  }
}
