<?php
/*
*
* Junghoe(Peter) Hwang - 16242934
* Erdem Alpkaya        - 16226114
* Robert Harper        - 96066919
*
*/
namespace team\a2\model;


use phpDocumentor\Descriptor\Type\IntegerDescriptor;

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
class CustomerModel extends Model
{
    /**
     * @var integer Customer ID
     */
    private $cus_id;
    /**
     * @var string Customer First Name
     */
    private $cus_fname;
    /**
     * @var string Customer Last Name
     */
    private $cus_lname;
    /**
     * @var string Customer Address
     */
    private $cus_address;

    /**
     * @return int Customer ID
     */
    public function getCusid()
    {
        return $this->cus_id;
    }

    /**
     * @return string Customer First Name
     */
    public function getCusfname()
    {
        return $this->cus_fname;
    }

    /**
     * @return string Customer Last Name
     */
    public function getCuslname()
    {
        return $this->cus_lname;
    }

    /**
     * @return string Customer Address
     */
    public function getCusaddress()
    {
        return $this->cus_address;
    }
    /**
     * @param string $name Account name
     *
     * @return $this AccountModel
     */

    public function setCusid(string $cus_id)
    {
        $this->cus_id = $cus_id;

        return $this;
    }
    public function setCusfname(string $cus_fname)
    {
        $this->cus_fname = $cus_fname;

        return $this;
    }
    public function setCuslname(string $cus_lname)
    {
        $this->cus_lname = $cus_lname;

        return $this;
    }
    public function setCusaddress(string $cus_address)
    {
        $this->cus_address = $cus_address;

        return $this;
    }

    /**
     * Loads account information from the database
     *
     * @param int $id Account ID
     *
     * @return $this AccountModel
     */
    public function load($cus_id)
    {
        if (!$result = $this->db->query("SELECT * FROM `customer` WHERE `cus_id` = $cus_id;")) {
            // throw new ...
        }

        $result = $result->fetch_assoc();
        $this->cus_id=$result['cus_id'];
        $this->cus_fname = $result['cus_fname'];
        $this->cus_lname = $result['cus_lname'];
        $this->cus_address = $result['cus_address'];


        return $this;
    }

    /**
     * Saves account information to the database

     * @return $this AccountModel
     */
    public function save()
    {
        $cus_id = $this->cus_id;
        $cus_fname = $this->cus_fname ;
        $cus_lname = $this->cus_lname;
        $cus_address = $this->cus_address;

        echo "this"."cus_id";


        if (isset($this->cus_id)) {
            //New customer - Perform INSERT"
            if (!$result = $this->db->query("INSERT INTO customer VALUES('$cus_id','$cus_fname','$cus_lname','$cus_address');")) {
                echo "throw new ...";
                echo gettype($cus_id).gettype($cus_fname).gettype($cus_lname).gettype($cus_address);
            }
            $this->id = $this->db->insert_id;
        } else {
            // saving existing account - perform UPDATE
            if (!$result = $this->db->query("UPDATE customer SET `fname` = '$cus_fname' WHERE `cus_id` = $this->cus_id;")) {
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
        if (!$result = $this->db->query("DELETE FROM `customer` WHERE `customer`.`cus_id` = $this->cus_id;")) {
            //throw new ...
        }

        return $this;
    }
}
