<?php
/*
*
* Junghoe(Peter) Hwang - 16242934
* Erdem Alpkaya        - 16226114
* Robert Harper        - 96066919
*
*/
namespace team\a2\model;


/**
 * Class AccountModel
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
class AccModel extends Model

{
    /**
     * @var integer Account ID
     */
    private $acc_number;
    /**
     * @var string Account Name
     */
    private $acc_cus;


    private $acc_balance;


    /**
     * @return int Account ID
     */
    public function getAcc_number()
    {
        return $this->acc_number;
    }

    /**
     * @return string Account Name
     */
    public function getAcc_cus()
    {
        return $this->acc_cus;
    }
    /**
     * @return string Account Name
     */
    public function getAcc_balance()
    {
        return $this->acc_balance;
    }
    /**
     * @param string $name Account name
     *
     * @return $this AccountModel
     */
    public function setAcc_cus($acc_cus)
    {
        $this->acc_cus = $acc_cus;

        return $this;
    }
    /**
     * @param string $name Account name
     *
     * @return $this AccountModel
     */
    public function setAcc_balance($acc_balance)
    {
        $this->acc_balance = $acc_balance;

        return $this;
    }
    /**
     * Loads account information from the database
     *
     * @param int $id Account ID
     *
     * @return $this AccountModel
     */
    public function load($acc_number)
    {
        if (!$result = $this->db->query("SELECT * FROM `acc` WHERE `acc_number` = $acc_number;")) {
            // throw new ...
        }

        $result = $result->fetch_assoc();
        $this->acc_number = $result['acc_number'];
        $this->acc_cus = $result['acc_cus'];
        $this->acc_balance = $result['acc_balance'];

        return $this;
    }

    /**
     * Saves account information to the database

     * @return $this AccountModel
     */
    public function save()
    {
        $acc_cus = $this->acc_cus;
        $acc_balance = $this->acc_balance;

        //$acc_cus = 6;
        //$acc_balance = 5.50;
        if (!isset($this->id)) {
            //New Account - Perform INSERT
            if (!$result = $this->db->query("INSERT INTO acc VALUES ( NULL,'$acc_cus','$acc_balance');")) {
                echo "throw new ...";
                echo "This is my"."$acc_cus"."$acc_balance";
            }
            $this->id = $this->db->insert_id;
        } else {
            // saving existing account - perform UPDATE
            if (!$result = $this->db->query("UPDATE `acc` SET `acc_balance` = '$acc_balance' WHERE `acc_number` = $this->acc_number;")) {
                // throw new ...
            }
        }

        return $this;
    }

    /**
     * Deletes account from the database

     * @return $this AccountModel
     */
    public function delete()
    {
        if (!$result = $this->db->query("DELETE FROM `acc` WHERE `acc`.`acc_number` = $this->acc_number;")) {
            //throw new ...
            echo "go it";
        }

        return $this;
    }


}