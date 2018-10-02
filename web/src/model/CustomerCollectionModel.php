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
class CustomerCollectionModel extends Model
{
    private $customerIds;

    private $N;

    public function __construct()
    {
        parent::__construct();
        if (!$result = $this->db->query("SELECT `cus_id` FROM `customer`;")) {
            // "throw new ...";
        }
        $this->customerIds = array_column($result->fetch_all(), 0);
        $this->N = $result->num_rows;
    }

    /**
     * Get account collection
     *
     * @return \Generator|CustomerModel[] Customer
     */
    public function getCustomers()
    {
        foreach ($this->customerIds as $cus_id) {
            // Use a generator to save on memory/resources
            // load accounts from DB one at a time only when required
            yield (new CustomerModel())->load($cus_id);
        }
    }
}
