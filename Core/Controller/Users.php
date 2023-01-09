<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;

class Users extends Controller
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
         * Gets all users
         *
         * @return array
         */
        public function index() 
        {
                $this->permissions(['user:read']);
                $this->view = 'users.index';
                $user = new User; // new model post.
                $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all());
        }
      /**
     * preview the information to  the selected user
     *
     * @return array
     */
        public function single()
        {
                $this->permissions(['user:read']);
                $this->view = 'users.single';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
        }

        /**
         * Display the HTML form for user creation
         *
         * @return void
         */
        public function create()
        {
                $this->permissions(['user:create']);
                $this->view = 'users.create';

                       
        }

        /**
         *  store the new user
         *
         * @return void
         */
        public function store()
        {
                $this->permissions(['user:create']);
                $user = new User();
                // process role
                $permissions = null;
                switch ($_POST['role']) {
                       
                        
                                case 'admin':
                                        $permissions = User::ADMIN;
                                        break;
        
                                case 'seller':
                                        $permissions = User::SELLER;
                                        break;
                                case 'procurement':
                                        $permissions = User::PROCUREMENT;
                                        break;
                
                                case 'accountant':
                                        $permissions = User::ACCOUNTANT;
                                        break;

                }
                unset($_POST['role']);
                $_POST['permissions'] = implode(',', $permissions);
/*                 $_POST['permissions'] = \serialize($permissions);
                   $user->update($_POST);
                   $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);

                  if(isset($_POST['submit']))
                {
                        $ext = explode('/', $_FILES['newpicture']['type']);
                        $ext = $ext[array_key_last($ext)];
                        $name = $user->get_by_id$_POST['username'];
                        $file_name = "user-$name.$ext";
                        $photo = "./users_img/$file_name";
                        move_uploaded_file($_FILES['newpicture']['tmp_name'], "./users_img/$file_name");
                        $_POST['newpicture'] = $photo;
                } */

                $user->create($_POST);
                Helper::redirect('/users');

        
        
        }
        /**
         * Display the HTML form for user update
         *
         * @return void
         */
        public function edit()
        {
                $this->permissions(['user:read', 'user:update']);
                $this->view = 'users.edit';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
                
        }

        /**
         * Updates the user
         *
         * @return void
         */
        public function update()
        {
                $this->permissions(['user:read', 'user:update']);
                $user = new User();
                // process role
                $permissions = null;
                switch ($_POST['role']) {
                       
                        
                                case 'admin':
                                        $permissions = User::ADMIN;
                                        break;
        
                                case 'seller':
                                        $permissions = User::SELLER;
                                        break;
                                case 'procurement':
                                        $permissions = User::PROCUREMENT;
                                        break;
                
                                case 'accountant':
                                        $permissions = User::ACCOUNTANT;
                                        break;

                }
                unset($_POST['role']);
                $_POST['permissions'] = implode(',', $permissions);
/*                 $_POST['permissions'] = \serialize($permissions);
 */                $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);
                $user->update($_POST);
                Helper::redirect('/user?id=' . $_POST['id']);
                var_dump( $_POST['permissions']);
        
}
        

        /**
         * Delete the user
         *
         * @return void
         */
        public function delete()
        {
                $this->permissions(['user:read', 'user:delete']);
                $user = new User();
                $user->delete($_GET['id']);
                Helper::redirect('/users');
        }

        
}


