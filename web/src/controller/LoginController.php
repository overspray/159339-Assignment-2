<?php

/*
*
* Junghoe(Peter) Hwang - 16242934
* Erdem Alpkaya        - 16226114
* Robert Harper        - 96066919
*
*/
namespace team\a2\controller;

use team\a2\model\{LoginModel, LoginCollectionModel};
use team\a2\view\View;

/**
 * Class AccountController
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
class LoginController extends Controller
{
    /**
     * Account Index action
     */
    public function indexAction()
    {
        $collection = new LoginCollectionModel();
        $logins = $collection->getLogins();
        $view = new View('loginIndex');
        echo $view->addData('logins', $logins)->render();
    }
    /**
     * Account Create action
     */
    public function createAction()
    {

        $login = new LoginModel();
        $login_acc = htmlspecialchars($_GET["login_acc"]);
        $login_user = htmlspecialchars($_GET["login_user"]);
        $login_pword = htmlspecialchars($_GET["login_pword"]);


        $login->setLogin_acc($login_acc);
        $login->setLogin_user($login_user); // will come from Form data
        $login->setLogin_pword($login_pword);
        $login->save();
        $view = new View('loginCreated');
        echo $view->render();
    }

    /**
     * Account Delete action
     *
     * @param int $id Account id to be deleted
     */
    public function deleteAction($login_acc)
    {
        (new LoginModel())->load($login_acc)->delete();
        $view = new View('loginDeleted');
        echo $view->addData('loginId', $login_acc)->render();
    }
    /**
     * Account Update action
     *
     * @param int $id Account id to be updated
     */
    public function updateAction($cus_id)
    {
        $customer = (new LoginModel())->load($cus_id);
        $customer->setLogin_acc('Joe')->save(); // new name will come from Form data
        $customer->setLogin_user('Smith')->save();
        $customer->setLogin_pword('1')->save(); // new name will come from Form data
    }
}
