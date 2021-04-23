<?php
/**
 * Copyright 2007 Maintainable Software, LLC
 * Copyright 2006-2021 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (BSD). If you
 * did not receive this file, see http://www.horde.org/licenses/bsd.
 *
 * @author     Mike Naberezny <mike@maintainable.com>
 * @author     Derek DeVries <derek@maintainable.com>
 * @author     Chuck Hagenbuch <chuck@horde.org>
 * @author     Jan Schneider <jan@horde.org>
 * @category   Horde
 * @license    http://www.horde.org/licenses/bsd
 * @package    Db
 * @subpackage Adapter
 */
namespace Horde\Db\Adapter\Mysql;
use \Horde\Db\Adapter\Base\Result as BaseResult;
use \Horde\Db\Constants;
use \mysql_num_fields;
use \mysql_fetch_array;

/**
 * This class represents the result set of a SELECT query from the MySQL
 * driver.
 *
 * @author     Mike Naberezny <mike@maintainable.com>
 * @author     Derek DeVries <derek@maintainable.com>
 * @author     Chuck Hagenbuch <chuck@horde.org>
 * @author     Jan Schneider <jan@horde.org>
 * @category   Horde
 * @copyright  2007 Maintainable Software, LLC
 * @copyright  2006-2021 Horde LLC
 * @license    http://www.horde.org/licenses/bsd
 * @package    Db
 * @subpackage Adapter
 */
class Result extends BaseResult
{
    /**
     * Maps Horde_Db fetch mode constant to the extension constants.
     *
     * @var array
     */
    protected $_map = [
        Constants::FETCH_ASSOC => MYSQL_ASSOC,
        Constants::FETCH_NUM   => MYSQL_NUM,
        Constants::FETCH_BOTH  => MYSQL_BOTH
    ];

    /**
     * Returns a row from a resultset.
     *
     * @return array|boolean  The next row in the resultset or false if there
     *                        are no more results.
     */
    protected function _fetchArray()
    {
        return mysql_fetch_array(
            $this->_result,
            $this->_map[$this->_fetchMode]
        );
    }

    /**
     * Returns the number of columns in the result set.
     *
     * @return integer  Number of columns.
     */
    protected function _columnCount()
    {
        return mysql_num_fields($this->_result);
    }
}
