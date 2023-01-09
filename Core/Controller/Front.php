<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\Item;
use Core\Model\User;
use DateTime;

class Front extends Controller
{
    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->admin_view(false);
    }

    /**
     * view the login page (Home Page)
     *
     * @return void
     */
    public function index()
    {
        $this->view = 'login';
    }
    
}
