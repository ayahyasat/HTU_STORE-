<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\Model;
use Core\Helpers\Tests;
use Core\Model\Transaction;
use Exception;
use Core\Model\Item;
use Core\Helpers\Helper;


class Endpoints extends Controller
{


        use Tests;

        protected $request_body;
        protected $http_code = 200;

        protected $response_schema = array(
                "success" => true, // to provide the response status.
                "message_code" => "", // to provide message code for the front-end developer for a better error handling
                "body" => []
        );

        function __construct()
        {
                $this->request_body = (array) json_decode(file_get_contents("php://input"));
        }

        public function render()
        {
                header("Content-Type: application/json"); // changes the header information
                http_response_code($this->http_code); // set the HTTP Code for the response
                echo json_encode($this->response_schema); // convert the data to json format
        }


       
        /**
         * create new trasnactions
         *
         * 
         */        function transactions_create()
        {
                self::check_if_empty($this->request_body);
                try {

                        $transaction = new Transaction;
                        $transaction->create($this->request_body);
                       

                        $this->response_schema['message_code'] = "transaction_created_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['message_code'] = "transaction_was_not_created";
                        $this->http_code = 421;
                }
        }

        /**
         * update quantity in the selected trasnactions
         *
         * 
         */
        public function transactions_update()
        {

                self::check_if_empty($this->request_body);

                try {
        
                        $item = new Item;
                        $current_item = $item->get_by_id($this->request_body['id']);
                        $current_item->quantity = $current_item->quantity - $this->request_body['item_quantity'];
                        $sql ="UPDATE items SET quantity = $current_item->quantity WHERE id = {$this->request_body['id']}";
                        $item->connection->query($sql);

                        
                $this->response_schema['message_code'] = "update quantity done";
                } catch (\Exception $error) {
                $this->response_schema['message_code'] = "update quantity not done";
                $this->http_code = 421;
}
        }


        /**
         * editing on the quantity to the selected trasnactions
         *
         * 
         */
        public function transactions_edit()
        {

                self::check_if_empty($this->request_body);

                try {
        
                        $item = new Item;
                        $current_item = $item->get_by_id($this->request_body['id']);
                        $current_item->quantity = $current_item->quantity - $this->request_body['item_quantity'];
                        $sql ="UPDATE items SET quantity = $current_item->quantity WHERE id = {$this->request_body['id']}";
                        $item->connection->query($sql);

                        $transaction = new Transaction;
                        $current_transaction=$transaction->get_by_id($this->request_body['transaction_id']);

                        $current_transaction->total_sales= $current_transaction->final_price * $this->request_body['item_quantity'];
                        $new_quantity =$this->request_body['item_quantity'];
                        $sql_="UPDATE transactions SET total_sales=$current_transaction->total_sales  WHERE id = {$this->request_body['transaction_id']}";
                        $sql_2="UPDATE transactions SET item_quantity=$new_quantity  WHERE id = {$this->request_body['transaction_id']}";

                        $transaction->connection->query($sql_);
                        $transaction->connection->query($sql_2);


                $this->response_schema['message_code'] = "update quantity done";
                        } catch (\Exception $error) {
                $this->response_schema['message_code'] = "update quantity not done";
                $this->http_code = 421;
}
        }


        /**
         * delete transaction add return the selected quantity
         *
         * 
         */
        public function transactions_delete()
        {

        self::check_if_empty($this->request_body);

        try {


                $item = new Item;
                $current_item = $item->get_by_id($this->request_body['id_item']);
                $current_item->quantity = $current_item->quantity + $this->request_body['quantity_item'];
                $sql ="UPDATE items SET quantity = $current_item->quantity WHERE id = {$this->request_body['id_item']}";
                $item->connection->query($sql);

                $transaction = new Transaction; 
                $current_transaction = $transaction->get_by_id($this->request_body['id_item']);
                $sql_ ="DELETE $current_transaction FROM transactions WHERE id = {$this->request_body['transaction_id']}";
                $transaction->connection->query($sql_);

               
                

        $this->response_schema['message_code'] = "delete quantity done";
        } catch (\Exception $error) {
        $this->response_schema['message_code'] = "delete quantity not done";
        $this->http_code = 421;
}}
}