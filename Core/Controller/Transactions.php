<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\Item;
use Core\Model\User;
use Core\Model\Transaction;





class Transactions extends Controller
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
     * Gets all transactions
     *
     * 
     */
    public function index()
    {
        $this->permissions(['transaction:read']);
        $this->view = 'transactions.index';
    

        $transaction = new Transaction; // new model transaction.
        $this->data['transactions'] =$transaction->get_values();
        
       
    }

    /**
     * Display the information to the selected transaction
     *
     * 
     */
    public function single()
    {
        $this->permissions(['transaction:read']);
        $this->view = 'transactions.single';
        $transaction = new Transaction; // new model transaction.
        $this->data['transaction_single'] =$transaction->get_by_id($_GET['id']);

}

    /**
     * Display the HTML form for transaction edit page
     *
     * 
     */
    public function edit()
    {
        $this->permissions(['transaction:read', 'transaction:update']);
        $this->view = 'transactions.edit';
     
        $item = new Item; // new model transaction.
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
        $this->permissions(['transaction:read', 'transaction:update']);
        $transaction = new Transaction();
        $transaction->update($_POST);
        Helper::redirect('/transactions');

    }



    /**
     * Delete the transaction
     *
     * 
     */
    public function delete()
    {
        $this->permissions(['transaction:read', 'transaction:delete']);
        $transaction = new Transaction; // new model transaction.
        $transaction ->delete($_GET['id']);
        Helper::redirect('/transactions');
     }



    }
