<?php
    // mysql://b67c152aeaac5f:83f37c56@us-cdbr-east-05.cleardb.net/heroku_9df67b0d10f3a8d?reconnect=true
    class returns{
        
        public function json($status, $message,$data){
            return json_encode(
                [
                    'status' => $status,
                    'message' => $message,
                    'data' => $data
                ]
            );
        }
    }
?>