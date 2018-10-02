<?php

/*
*
* Junghoe(Peter) Hwang - 16242934
* Erdem Alpkaya        - 16226114
* Robert Harper        - 96066919
*
*/
namespace team\a2\controller;

use team\a2\model\{Customer_accModel, Customer_accCollectionModel};
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
class Customer_accController extends Controller
{
    /**
     * Account Index action
     */
    public function indexAction()
    {
        $collection = new Customer_accCollectionModel();
        $customer_accs = $collection->getCustomer_Accs();
        $view = new View('customer_accIndex');
        echo $view->addData('customer_accs', $customer_accs)->render();
    }
    /**
     * Account Create action
     */
    public function createAction()
    {

        $customer_acc = new Customer_accModel();
        $cus_acc_cust = htmlspecialchars($_GET["cus_acc_cust"]);
        $cus_acc = htmlspecialchars($_GET["cus_acc"]);
        $cus_acc_type = htmlspecialchars($_GET["cus_acc_type"]);
        $cus_acc_amount = htmlspecialchars($_GET["cus_acc_amount"]);
        $cus_acc_balance = htmlspecialchars($_GET["cus_acc_balance"]);

        $customer_acc->setCusAccCust($cus_acc_cust);
        //var_dump($cus_acc_cust->getCusAccCust);
        $customer_acc->setCusAccCust($cus_acc_cust);
        $customer_acc->setCusAcc($cus_acc);
        $customer_acc->setCusAccType($cus_acc_type);
        $customer_acc->setCusAccAmount($cus_acc_amount);
        $customer_acc->setCusAccBalance($cus_acc_balance);
        $customer_acc->save();
        $view = new View('customer_accCreated');
        echo $view->addData(customer_accId, $cus_acc)->render();
    }

    /**
     * Account Delete action
     *
     * @param int $id Customer Account cus_acc_id to be deleted
     */
    public function deleteAction($cus_acc_id)
    {
        (new Customer_accModel())->load($cus_acc_id)->delete();
        $view = new View('customer_accDeleted');
        echo $view->addData('customer_accId', $cus_acc_id)->render();
    }
    /**
     * Account Update action
     *
     * @param int $cus_acc_id Customer Account id to be updated
     */
    public function updateAction($cus_acc_id)
    {
        $customer_acc = (new Customer_accModel())->load($cus_acc_id);
        $customer_acc->setCusAccCust('2')->save(); // new name will come from Form data
        $customer_acc->setCusAccType('deposit')->save();
        $customer_acc->setCusAccAmount('3.50')->save(); // new name will come from Form data
    }
}