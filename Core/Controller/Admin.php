<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Controller\Users;
use Core\Helpers\Helper;
use Core\Model\Item;
use Core\Model\User;
use Core\Model\Post;
use Core\Model\Transaction;



class Admin extends Controller
{
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        function __construct()
        {
                $this->auth();
                $this->admin_view(true);
        }


        /**
         * dashboard view
         *
         * @return void
         */
        public function index()
        {
                $this->view = 'dashboard';
                $user = new User; // new model post.
                $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all());
                $item = new Item; // new model post.
                $this->data['posts'] = $item->get_all();
                $this->data['posts_count'] = count($item->get_all());

                $transaction = new Transaction; // new model post.
                $this->data['transactions_count'] = count($transaction->get_all());
                $this->data['transactions'] =$transaction->get_values();
                $this->data['total_sales'] =$transaction->get_total_sales();

                
                $quantity = new Item; // new model post.
                $this->data['quantitys_count'] = $quantity->get_quantity();

                $price = new Item; // new model post.
                $this->data['top_price'] = $price->order_by_price();

        }
}
