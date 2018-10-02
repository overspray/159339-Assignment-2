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
 * Class AccountCollectionModel
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
class Customer_accCollectionModel extends Model
{
    private $customer_accIds;

    private $N;

    public function __construct()
    {
        parent::__construct();
        if (!$result = $this->db->query("SELECT `cus_acc_id` FROM `customer_acc`;")) {
            // "throw new ...";
        }
        $this->customer_accIds = array_column($result->fetch_all(), 0);
        $this->N = $result->num_rows;
    }

    /**
     * Get account collection
     *
     * @return \Generator|CustomerModel[] Customer
     */
    public function getCustomer_Accs()
    {
        foreach ($this->customer_accIds as $cus_acc_id) {
            // Use a generator to save on memory/resources
            // load accounts from DB one at a time only when required
            yield (new Customer_accModel())->load($cus_acc_id);
        }
    }
}
