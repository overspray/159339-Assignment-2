<?php
/**
 * Created by PhpStorm.
 * User: robo
 * Date: 28/09/18
 * Time: 1:47 PM
 */

namespace team\a2\model;

class Customer_accModel extends Model
{
    /**
     * @var integer Account ID
     */
    private $cus_acc_id;
    /**
     * @var string Account Name
     */
    private $cus_acc_cust;
    /**
     * @var integer Account ID
     */
    private $cus_acc;
    /**
     * @var integer Account ID
     */
    private $cus_acc_time;
    /**
     * @var string Account Name
     */
    private $cus_acc_type;
    /**
     * @var integer Account ID
     */
    private $cus_acc_amount;
    /**
     * @var string Account Name
     */
    private $cus_acc_balance;


    /**
     * @return int Account ID
     */
    public function getCusAccId()
    {
        return $this->cus_acc_id;
    }

    /**
     * @return string Account Name
     */
    public function getCusAccCust()
    {
        return $this->cus_acc_cust;
    }

    /**
     * @return int Account ID
     */
    public function getCusAcc()
    {
        return $this->cus_acc;
    }

    /**
     * @return string Account Name
     */
    public function getCusAccTime()
    {
        return $this->cus_acc_time;
    }

    /**
     * @return int Account ID
     */
    public function getCusAccType()
    {
        return $this->cus_acc_type;
    }

    /**
     * @return string Account Name
     */
    public function getCusAccAmount()
    {
        return $this->cus_acc_amount;
    }

    /**
     * @return string Account Name
     */
    public function getCusAccBalance()
    {
        return $this->cus_acc_balance;
    }

    /**
     * @param string $name Account name
     *
     * @return $this AccountModel
     */
    public function setCusAccCust(string $cus_acc_cust)
    {
        $this->cus_acc_cust = $cus_acc_cust;

        return $this;
    }
    /**
     * @param string $name Account name
     *
     * @return $this AccountModel
     */
    public function setCusAcc(string $cus_acc)
    {
        $this->cus_acc = $cus_acc;

        return $this;
    }

    /**
     * @param string $name Account name
     *
     * @return $this AccountModel
     */
    public function setCusAccType(string $cus_acc_type)
    {
        $this->cus_acc_type = $cus_acc_type;

        return $this;
    }
    /**
     * @param string $name Account name
     *
     * @return $this AccountModel
     */
    public function setCusAccAmount(string $cus_acc_amount)
    {
        $this->cus_acc_amount = $cus_acc_amount;

        return $this;
    }
    /**
     * @param string $name Account name
     *
     * @return $this AccountModel
     */
    public function setCusAccBalance(string $cus_acc_balance)
    {
        $this->cus_acc_balance = $cus_acc_balance;

        return $this;
    }
    /**
     * Loads account information from the database
     *
     * @param int $id Account ID
     *
     * @return $this AccountModel
     */
    public function load($cus_acc_id)
    {
        if (!$result = $this->db->query("SELECT * FROM `customer_acc` WHERE `cus_acc_id` = $cus_acc_id;")) {
            echo"// throw new ...";
        }

        $result = $result->fetch_assoc();
        $this->cus_acc_id = $result['cus_acc_id'];
        $this->cus_acc_cust = $result['cus_acc_cust'];
        $this->cus_acc = $result['cus_acc'];
        $this->cus_acc_type = $result['cus_acc_type'];
        $this->cus_acc_amount = $result['cus_acc_amount'];
        $this->cus_acc_balance = $result['cus_acc_balance'];


        return $this;
    }

    /**
     * Saves account information to the database

     * @return $this AccountModel
     */
    public function save()
    {
        $cus_acc_cust = $this->cus_acc_cust;
        //var_dump();
        $cus_acc = $this->cus_acc;
        $cus_acc_type = $this->cus_acc_type;
        $cus_acc_amount = $this->cus_acc_amount;
        $cus_acc_balance = $this->cus_acc_balance;



        if (!isset($this->cus_acc_id)) {
            //New customer - Perform INSERT"
            if (!$result = $this->db->query("INSERT INTO customer_acc VALUES(NULL,'$cus_acc_cust','$cus_acc',now(),'$cus_acc_type','$cus_acc_amount','$cus_acc_balance');")) {
                //"throw new ...";

            }
            $this->cus_acc_id = $this->db->insert_id;
        } else {
            // saving existing account - perform UPDATE
            if (!$result = $this->db->query("UPDATE customer SET `cus_acc_cust` = '$cus_acc_cust' WHERE `cus_acc_id` = $this->cus_acc_id;")) {
                echo " no throw new ...";
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
        if (!$result = $this->db->query("DELETE FROM `customer_acc` WHERE `customer_acc`.`cus_acc_id` = $this->cus_acc_id;")) {
            //throw new ...
        }

        return $this;
    }
}




