<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Longman\TelegramBot\Commands\SystemCommands;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Conversation;
use Longman\TelegramBot\Request;

/**
 * Generic message command
 *
 * Gets executed when any type of message is sent.
 */
class GenericmessageCommand extends SystemCommand
{
    /**
     * @var string
     */
    protected $name = 'genericmessage';
    /**
     * @var string
     */
    protected $description = 'Handle generic message';
    /**
     * @var string
     */
    protected $version = '1.1.0';
    /**
     * @var bool
     */
    protected $need_mysql = true;
    /**
     * Command execute method if MySQL is required but not available
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function executeNoDb()
    {
        // Do nothing
        return Request::emptyResponse();
    }
    /**
     * Command execute method
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function execute()
    {
        //If a conversation is busy, execute the conversation command after handling the message
        $conversation = new Conversation(
            $this->getMessage()->getFrom()->getId(),
            $this->getMessage()->getChat()->getId()
        );
        //Fetch conversation command if it exists and execute it
            $servername = "localhost";
            $username = "nguprekc_telegrambot";
            $password = "bottelegram";
            $dbname = "nguprekc_telegrambot";
           

      
            $message = $this->getMessage();
            $chat_id = $message->getChat()->getId();   
            $text = $message->getText();
            $dt = explode(" ", $text);
            //date_default_timezone_set('Asia/Jakarta');
            $data = [        'chat_id' => $chat_id,                 
                        //'text'    => 'Perintah '.$text.' sudah dijalanka',
                        'text'    => 'Perintah tidak absen', 
                     ];
            $tanggal = date('Y-m-d'); 
            if(strtolower($dt[0])=="absen"){




            $conn = new \mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            $sql = "INSERT INTO absen (nama_siswa, kelas, tanggal, username, status)
            VALUES ('".$dt[1]."', '".$dt[2]."','".$tanggal."','".$message->getChat()->getUsername()."','".$dt[3]."')";

            if ($conn->query($sql) === TRUE) {
                $data = [                                 
                        'chat_id' => $chat_id,                 
                        //'text'    => 'Perintah '.$text.' sudah dijalanka',
                        'text'    => ' Sukses Bro !!', 
                     ];
            } else {
                   $data = [                                 
                        'chat_id' => $chat_id,                 
                        //'text'    => 'Perintah '.$text.' sudah dijalanka',
                        'text'    => 'Error Bro !!', 
                     ];
            }

            $conn->close();
                return Request::sendMessage($data);
             }

        

         

        
        

        if ($conversation->exists() && ($command = $conversation->getCommand())) {
            return $this->telegram->executeCommand($command);
        }
        //return Request::emptyResponse();
    }
}