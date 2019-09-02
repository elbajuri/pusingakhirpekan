<?php
namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;
//require_once __DIR__ . '/vendor/autoload.php';

class TestCommand extends UserCommand
{

    protected $name = 'test';                    
    protected $description = 'A command for test'; 
    protected $usage = 'test';                    
    protected $version = '1.0.0';  

       public function execute()
    {
             
       $message = $this->getMessage();
       $chat_id = $message->getChat()->getId();   
        $data = [                                 
            'chat_id' => $chat_id,                 
            'text'    => 'Coba tanpa /', 
        ];

        return Request::sendMessage($data);        
    }


}


