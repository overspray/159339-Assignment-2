<?php

/*
*
* Junghoe(Peter) Hwang - 16242934
* Erdem Alpkaya        - 16226114
* Robert Harper        - 96066919
*
*/
namespace team\a2\controller;

use team\a2\model\{AccModel, AccCollectionModel};
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
class AccController extends Controller
{
    /**
     * Account Index action
     */
    public function indexAction()
    {
        $collection = new AccCollectionModel();
        $accs = $collection->getAccs();
        $view = new View('accIndex');
        echo $view->addData('accs', $accs)->render();
    }
    /**
     * Account Create action
     */
    public function createAction()
    {
        $acc = new AccModel();
        $acc_cus = htmlspecialchars($_GET["acc_cus"]);
        $acc_balance = htmlspecialchars($_GET["acc_balance"]);

        $acc->setAcc_cus($acc_cus); // will come from Form data
        $acc->setAcc_balance($acc_balance);
        $acc->save();
        $acc_number = $acc->getAcc_number();
        $view = new View('accCreated');
        echo $view->addData('accId', $acc_number)->render();
    }

    /**
     * Account Delete action
     *
     * @param int $id Account id to be deleted
     */
    public function deleteAction($acc_number)
    {
        (new AccModel())->load($acc_number)->delete();
        $view = new View('accDeleted');
        echo $view->addData('accId', $acc_number)->render();
    }
    /**
     * Account Update action
     *
     * @param int $id Account id to be updated
     */
    public function updateAction($acc_number)
    {
        $acc = (new AccModel())->load($acc_number);
        $acc->setAcc_balance('50')->save(); // new name will come from Form data
    }
}
