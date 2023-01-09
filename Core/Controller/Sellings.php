<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\Item;
use Core\Model\User;
use Core\Model\Transaction;






class Sellings extends Controller
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
     * Display the HTML create form for transaction
     *
     * 
     */
    public function create()
    {
        $this->permissions(['transaction:create']);
        $this->view = 'transactions.create'; 
        $item = new Item; // new model item.
        $this->data['items'] = $item->get_all();
  
        $user = new User; // new model user.
        $this->data['users'] = $user->get_all();
    
        $transaction = new Transaction; // new model transaction.
        $this->data['transactions'] =$transaction->get_values();

       
    }

    /**
     * store the new transaction
     *
     * 
     */
    public function store()
    {
        $this->permissions(['transaction:create']);
        $transaction = new Transaction; // new model transaction.
        $transaction->create($_POST);
        Helper::redirect('/transactions');
       
    }

    /**
     * Display the HTML form for transction edit
     *
     * 
     */
    public function edit_s()
    {
        $this->permissions(['transaction:create', 'transaction:update']);
        $this->view = 'transactions.edit_s';
     
        $item = new Item; // new model item.
        $this->data['items'] = $item->get_all();
        $this->data['item'] = $item->get_by_id($_GET['id']);
        $transaction = new Transaction; // new model transaction.
        $this->data['transaction'] = $transaction->get_by_id($_GET['id']);

  
    }


    /**
     * Updates the transaction
     *
     * 
     */
    public function update()
    {
        $this->permissions(['transaction:create', 'transaction:update']);
        $transaction = new Transaction();
        $transaction->update($_POST);
        Helper::redirect('/transactions/create');

    }

    /**
     * Delete the transaction
     *
     * @return void
     */
     public function delete()
     {
         $this->permissions(['transaction:create', 'transaction:delete']);
         
         $transaction = new Transaction; // new model transaction.
         $transaction ->delete($_GET['id']);
         Helper::redirect('/transactions/create');
                
        
         }


    }
