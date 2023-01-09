<?php

namespace Core\Base;

use Core\Helpers\Helper;
use Core\Model\User;
use Core\Model\Transaction;

class Model
{
    public $connection;
    protected $table;

    public function __construct()
    {
        $this->connection(); // connection is ready
        $this->relate_table();
    }

    public function __destruct()
    {
        $this->connection->close();
    }


    /**
     * get_all from tables
     *
     * @return array
     */
    public function get_all(): array
    {
        $data = array();
        $result = $this->connection->query("SELECT * FROM $this->table");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
    }


    /**
     * get the sum of all total sales in table
     *
     * @return array
     */
    public function get_total_sales()
    {
        $result = $this->connection->query("SELECT SUM(total_sales) as sum_total_sales FROM $this->table ");
        $row = $result->fetch_array();
        $sum = $row['sum_total_sales'];
        
        return $sum;

    }
    
    /**
     * get the sum of all quantity in table
     *
     * @return array
     */
    public function get_quantity()
    {
        $result = $this->connection->query("SELECT SUM(quantity) as sum_quantity FROM $this->table ");
        $row = $result->fetch_array();
        $sum = $row['sum_quantity'];
        return $sum;

    }


    /**
     * order the price by expensive price
     *
     * @return array
     */
    public function order_by_price():array
{              
        $data = array();
        $result = $this->connection->query("SELECT * FROM $this->table ORDER BY price DESC");

            if($result->num_rows > 0){
                while($row = $result->fetch_array()){
                    
                    $data[]= $row;
                  
                }

               return $data;
                
    }

}

    /**
     * get all values form transactions table
     *
     * @return array
     */
public function get_values():array
{              
    $data = array();
    $result = $this->connection->query("SELECT * FROM $this->table");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
    }
    return $data;
}





    /**
     * get value by id
     *
     * @return object
     */
    public function get_by_id($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM $this->table WHERE id=?"); // prepare the sql statement
        $stmt->bind_param('i', $id); // bind the params per data type (https://www.php.net/manual/en/mysqli-stmt.bind-param.php)
        $stmt->execute(); // execute the statement on the DB
        $result = $stmt->get_result(); // get the result of the execution
        $stmt->close();
        // $result = $this->connection->query("SELECT * FROM $this->table WHERE id=$id");
        return $result->fetch_object();
    }


    /**
     * delete value by id
     *
     * 
     */
    public function delete($id)
    {
        $stmt = $this->connection->prepare("DELETE FROM $this->table WHERE id=?"); // prepare the sql statement
        $stmt->bind_param('i', $id); // bind the params per data type
        $stmt->execute(); // execute the statement on the DB
        $result = $stmt->get_result(); // get the result of the execution
        $stmt->close();
        // $result = $this->connection->query("DELETE FROM $this->table WHERE id=$id");
        return $result;
    }


    /**
     * create new value 
     *
     * 
     */
    public function create($data)
    {
        // Get dynamic keys title, contenta
        // $keys: string
        // Get dynamic values coresponds to the key '$data->title','$data->content'
        // $values: string

        $keys = '';
        $values = '';
        $data_types = '';
        $value_arr = array();

        foreach ($data as $key => $value) {

            if ($key != \array_key_last($data)) {
                $keys .= $key . ', ';
                $values .= "?, ";
            } else {
                $keys .= $key;
                $values .= "?";
            }

            switch ($key) {
                case 'id':
                case 'user_id':
                case 'post_id':
                case 'tag_id':
                    $data_types .= "i";
                    break;

                default:
                    $data_types .= "s";
                    break;
            }
            

            $value_arr[] = $value;
            
        }

        // $stmt = $this->connection->prepare("INSERT INTO posts (title, content, user_id) VALUES (?,?,?)");
        // $stmt->bind_param('ssi', 'test sql in.', 'testing content', '1');
        // $stmt->execute();
        // $stmt->close();

        $sql = "INSERT INTO $this->table ($keys) VALUES ($values)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param($data_types, ...$value_arr); // ...$value_arr == 'test sql in.', 'testing content', '1'
        $stmt->execute();
        $stmt->close();
    }

    /**
     * update values in table
     *
     * 
     */
    public function update($data)
    {
        $set_values = '';
        $id = 0;
        if (is_array($data) || is_object($data))
        {
        foreach ($data as $key => $value) {
            if ($key == 'id') {
                $id = $value;
                continue;
            }
            if ($key != \array_key_last($data)) {
                $set_values .= "$key='$value', ";
            } else {
                $set_values .= "$key='$value'";
            }
        }
        }
        $sql = "UPDATE $this->table 
            SET $set_values
            WHERE id=$id
        ";
        $this->connection->query($sql);
    }




    protected function connection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "HTUStore";

        // Create connection
        $this->connection = new \mysqli($servername, $username, $password, $database);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    protected function relate_table()
    {
        $table_name = \get_class($this);
        $table_name_arr = \explode('\\', $table_name);
        $class_name = $table_name_arr[\array_key_last($table_name_arr)]; // $table_name_arr[2]
        $final_clas_name = \strtolower($class_name) . "s";
        $this->table = $final_clas_name;
    }
}
