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
class LoginModel extends Model
{
    /**
     * @var integer Login Account
     */
    private $login_acc;
    /**
     * @var string Login User Name
     */
    private $login_user;
    /**
     * @var string Login Password
     */
    private $login_pword;

    /**
     * @return string Login Account
     */
    public function getLogin_acc()
    {
        return $this->login_acc;
    }

    /**
     * @return string Login User Name
     */
    public function getLogin_user()
    {
        return $this->login_user;
    }

    /**
     * @return string Login Password
     */
    public function getLogin_pword()
    {
        return $this->login_pword;
    }

    /**
     * @param string $name Account name
     *
     * @return $this AccountModel
     */

    public function setLogin_acc(string $login_acc)
    {
        $this->login_acc = $login_acc;

        return $this;
    }
    public function setLogin_user(string $login_user)
    {
        $this->login_user = $login_user;

        return $this;
    }
    public function setLogin_pword(string $login_pword)
    {
        $this->login_pword = $login_pword;

        return $this;
    }


    /**
     * Loads account information from the database
     *
     * @param int $id Account ID
     *
     * @return $this AccountModel
     */
    public function load($login_acc)
    {
        if (!$result = $this->db->query("SELECT * FROM `login` WHERE `login_acc` = $login_acc;")) {
            // throw new ...
        }

        $result = $result->fetch_assoc();
        $this->login_acc=$result['login_acc'];
        $this->login_user=$result['login_user'];
        $this->login_pword = $result['login_pword'];


        return $this;
    }

    /**
     * Saves account information to the database

     * @return $this AccountModel
     */
    public function save()
    {
        $login_acc = $this->login_acc ?? "NULL";
        $login_user = $this->login_user ?? "NULL";
        $login_pword = $this->login_pword ?? "NULL";


        if (isset($this->login_acc)) {
            //New customer - Perform INSERT"
            if (!$result = $this->db->query("INSERT INTO login VALUES('$login_acc','$login_user','$login_pword');")) {
                echo "throw new ...".$login_acc;
                echo gettype($login_user).gettype($login_pword);
            }
            $this->login_acc = $this->db->insert_id;
        } else {
            // saving existing account - perform UPDATE
            if (!$result = $this->db->query("UPDATE login SET `login_pword` = '$login_pword' WHERE `login_user` = $this->login_pword;")) {
                echo " no throw new ...";
            }
        }

        return $this;
    }

    /**
     * Deletes login from the database

     * @return $this LoginModel
     */
    public function delete()
    {
        if (!$result = $this->db->query("DELETE FROM login WHERE `login`.`login_acc` = $this->login_acc;")) {
            //throw new ...
        }

        return $this;
    }

}