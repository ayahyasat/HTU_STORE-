<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;

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
     * get_all from tables
     *
     * @return array
     */
        public function index()
        {
                
                $this->view = 'dashboard';
        }
}
