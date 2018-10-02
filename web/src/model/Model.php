<?php
/*
*
* Junghoe(Peter) Hwang - 16242934
* Erdem Alpkaya        - 16226114
* Robert Harper        - 96066919
*
*/
namespace team\a2\model;

use mysqli;

/**
 * Class Model
 *
 * @package team/a2
 *
 * Code foundation by:
 * @author  Andrew Gilman <a.gilman@massey.ac.nz>
 *
 *
 * @author  Junghoe Hwang <after10y@gmail.com>
 * @author Erdem Alpkaya <erdemalpkaya@gmail.com>
 * @author  Robert Harper   <l.attitude37@gmail.com>
 */
class Model
{
    protected $db;

    // is this the best place for these constants?
    const DB_HOST = 'mysql';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_NAME = 'team_a2';

    public function __construct()
    {
        $this->db = new mysqli(
            Model::DB_HOST,
            Model::DB_USER,
            Model::DB_PASS
            //            Model::DB_NAME
        );

        if (!$this->db) {
            // can't connect to MYSQL???
            // handle it...
            // e.g. throw new someException($this->db->connect_error, $this->db->connect_errno);
        }

        //----------------------------------------------------------------------------
        // This is to make our life easier
        // Create your database and populate it with sample data
        $this->db->query("CREATE DATABASE IF NOT EXISTS " . Model::DB_NAME . ";");

        if (!$this->db->select_db(Model::DB_NAME)) {
            // somethings not right.. handle it
            error_log("Mysql database not available!", 0);
        }

        $result = $this->db->query("SHOW TABLES LIKE 'account';");

        if ($result->num_rows == 0) {
            // table doesn't exist
            // create it and populate with sample data

            $result = $this->db->query(
                "CREATE TABLE `account` (
                                          `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
                                          `name` varchar(256) DEFAULT NULL,
                                          PRIMARY KEY (`id`) );"
            );

            if (!$result) {
                // handle appropriately
                error_log("Failed creating table account", 0);
            }

            if (!$this->db->query(
                "INSERT INTO `account` VALUES (NULL,'Bob'), (NULL,'Mary');"
            )) {
                // handle appropriately
                error_log("Failed creating sample data!", 0);
            }
        }
        $result = $this->db->query("SHOW TABLES LIKE 'customer';");

        if ($result->num_rows == 0) {
            // table doesn't exist
            // create it and populate with sample data

            $result = $this->db->query(
                "CREATE TABLE customer(
                                        cus_id INT(10) NOT NULL,
                                        cus_fname VARCHAR(30) NOT NULL,
                                        cus_lname VARCHAR(30) NOT NULL,
                                        cus_address VARCHAR(50) NOT NULL,
                                        cus_dob VARCHAR(10),
                                        cus_phone VARCHAR(20),
                                        cus_username VARCHAR(30),
                                        cus_password VARCHAR(30), 
                                        PRIMARY KEY(cus_id) );"

            );

            if (!$result) {
                // handle appropriately
                error_log("Failed creating table account", 0);
            }

            if (!$this->db->query(
                "INSERT INTO `customer` VALUES (1,'Bob','Smith','Auckland'), (2,'Mary','Brown','Tauranga');"
            )) {
                // handle appropriately
                error_log("Failed creating sample data!", 0);
            }
        }
        $result1 = $this->db->query("SHOW TABLES LIKE 'login';");

        if ($result->num_rows == 0) {
            // table doesn't exist
            // create it and populate with sample data

            $result = $this->db->query(
                "CREATE TABLE login(
                                        login_acc INT(10)  PRIMARY KEY,
                                        login_user VARCHAR(30),
                                        login_passw VARCHAR(30),
                                        FOREIGN KEY (login_acc) REFERENCES customer(cus_id));"

            );

            if (!$result) {
                // handle appropriately
                error_log("Failed creating table account", 0);
            }

            if (!$this->db->query(
                "INSERT INTO `login` VALUES (1,'Bob','alpha'), (2,'Mary','Beta');"
            )) {
                // handle appropriately
                error_log("Failed creating sample data!", 0);
            }
        }
        $result = $this->db->query("SHOW TABLES LIKE 'acc';");

        if ($result->num_rows == 0) {
            // table doesn't exist
            // create it and populate with sample data

            $result = $this->db->query(
                "CREATE TABLE acc(
                                        acc_number INT AUTO_INCREMENT PRIMARY KEY,
                                        acc_cus INT,  
                                        acc_balance FLOAT(4,2),
                                        FOREIGN KEY (acc_cus) REFERENCES customer(cus_id));"

            );

            if (!$result) {
                // handle appropriately
                error_log("Failed creating table account", 0);
            }

            if (!$this->db->query(
                "INSERT INTO `acc` VALUES (NULL,1,5.30), (NULL,2,6.20);"
            )) {
                // handle appropriately
                error_log("Failed creating sample data!", 0);
            }
        }
        $result = $this->db->query("SHOW TABLES LIKE 'customer_acc';");

        if ($result->num_rows == 0) {
            // table doesn't exist
            // create it and populate with sample data

            $result = $this->db->query(
                "CREATE TABLE customer_acc(
                                        cus_acc_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                        cus_acc_cust INT,
                                        cus_acc INT,
                                        cus_acc_time DATETIME,
                                        cus_acc_type ENUM('deposit','withdraw','check balance'),
                                        cus_acc_amount FLOAT(4,2),
                                        cus_acc_balance FLOAT(4,2),
                                        FOREIGN KEY(cus_acc_cust) REFERENCES customer(cus_id),
                                        FOREIGN KEY(cus_acc) REFERENCES acc(acc_number));"
            );

            if (!$result) {
                // handle appropriately
                error_log("Failed creating table account", 0);
            }

            if (!$this->db->query(
                "INSERT INTO customer_acc VALUES (NULL,1,1,now(),'deposit',5.2,5.1),(NULL,2,2,now(),'deposit',5.3,5.9),(NULL,2,2,now(),'deposit',15.3,55.9);"
            )) {
                // handle appropriately
                error_log("Failed creating sample data!", 0);
            }
        }

        //----------------------------------------------------------------------------
    }
}
