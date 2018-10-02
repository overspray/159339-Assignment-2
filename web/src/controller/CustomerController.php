<?php

/*
*
* Junghoe(Peter) Hwang - 16242934
* Erdem Alpkaya        - 16226114
* Robert Harper        - 96066919
*
*/
namespace team\a2\controller;

use team\a2\model\{CustomerModel, CustomerCollectionModel};
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
class CustomerController extends Controller
{
    /**
     * Account Index action
     */
    public function indexAction()
    {
        $collection = new CustomerCollectionModel();
        $customers = $collection->getCustomers();
        $view = new View('customerIndex');
        echo $view->addData('customers', $customers)->render();
    }
    /**
     * Account Create action
     */
    public function createAction()
    {

        $customer = new CustomerModel();
        $cus_id = htmlspecialchars($_GET["cus_id"]);
        $cus_fname = htmlspecialchars($_GET["cus_fname"]);
        $cus_lname = htmlspecialchars($_GET["cus_lname"]);
        $cus_address = htmlspecialchars($_GET["cus_address"]);
        $cus_dob = htmlspecialchars($_GET["cus_dob"]);
        $cus_phone = htmlspecialchars($_GET["cus_phone"]);
        $cus_username = htmlspecialchars($_GET["cus_username"]);
        $cus_password = htmlspecialchars($_GET["cus_password"]);

        $customer->setCusid($cus_id);
        $customer->setCusfname($cus_fname); // will come from Form data
        $customer->setCuslname($cus_lname);
        $customer->setCusaddress($cus_address);
        $customer->setCusdob($cus_dob);
        $customer->setCusphone($cus_phone);
        $customer->setCususername($cus_username);
        $customer->setCuspassword($cus_password);
        $customer->save();
        $view = new View('customerCreated');
        echo $view->render();
    }

    /**
     * Account Delete action
     *
     * @param int $id Account id to be deleted
     */
    public function deleteAction($cus_id)
    {
        (new CustomerModel())->load($cus_id)->delete();
        $view = new View('customerDeleted');
        echo $view->addData('customerId', $cus_id)->render();
    }
    /**
     * Account Update action
     *
     * @param int $id Account id to be updated
     */
    public function updateAction($cus_id)
    {
        $customer = (new CustomerModel())->load($cus_id);
        $customer->setCusfname('Joe')->save(); // new name will come from Form data
        $customer->setCuslname('Smith')->save();
        $customer->setCusaddress('100 Great North road')->save(); // new name will come from Form data
    }
}
