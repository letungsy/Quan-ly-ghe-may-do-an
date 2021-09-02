<?php

namespace App\Http\Controllers;
 use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

// use pimax\FbBotApp;
// use pimax\Messages\Message;
class FacebookController extends Controller
{
 
    public function index(){
        $this->verifyAccess();

 }
    public function verifyAccess() {
       $local_verify_token=env('MESSENGER_VERIFY_TOKEN');
       $hub_verify_token=request('hub_verify_token');
       if($local_verify_token===$hub_verify_token){
       echo request('hub_challenge');
       }
       else echo "k cho";
    }
    
       public function receive(Request $request)
       {
               $data = $request->all();
               //get the user’s id
               $id = $data["entry"][0]["messaging"][0]["sender"]["id"];
            $this->sendTextMessage($id, "Hello");
       }
       private function sendTextMessage($recipientId, $messageText)
    {
        $messageData = [
            "recipient" => [
                "id" => $recipientId
            ],
            "message" => [
                "text" => $messageText
            ]
        ];
        $ch = curl_init('https://graph.facebook.com/v11/me/messages?access_token=' . env("PAGE_ACCESS_TOKEN"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));
        curl_exec($ch);
    
}
    //    $input=json_decode(file_get_contents('php://input'),true);
    //    for ($i=0; $i <count($input['entry'][0]['messaging']) ; $i++) { 
    //       $event=$input['entry'][0]['messaging'][$i];
    //       $send_id=$event['sender']['id'];
    //       if ($event['message']&&$event['message']['text']) {
    //          $data=array(
    //              'recipient'=>array(
    //                  'id'=>$send_id
    //              ),
    //              'message'=>[
    //                  'text'=>'helo'
    //              ]
    //              );
    //              $options=[
    //                  'http'=>[
    //                      'method'=>'POST',
    //                      'content'=>json_encode($data),
    //                      'header'=>'Content-Type:application/json\n'
    //                  ]
    //                  ];
    //                  $context=stream_context_create($options);
    //                  file_get_contents('https://graph.facebook.com/v2.6/me/messages?access_token='.env('PAGE_ACCESS_TOKEN'),false,$context);
    //       }
    //    }
// }
    }
