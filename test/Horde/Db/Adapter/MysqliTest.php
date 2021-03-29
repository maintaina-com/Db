<?php
/**
 * Copyright 2007 Maintainable Software, LLC
 * Copyright 2008-2017 Horde LLC (http://www.horde.org/)
 *
 * @author     Mike Naberezny <mike@maintainable.com>
 * @author     Derek DeVries <derek@maintainable.com>
 * @author     Chuck Hagenbuch <chuck@horde.org>
 * @author     Jan Schneider <jan@horde.org>
 * @license    http://www.horde.org/licenses/bsd
 * @category   Horde
 * @package    Db
 * @subpackage UnitTests
 */
namespace Horde\Db\Adapter;
use Horde_Db_Adapter_MysqlBase as MysqlBase;
use \Horde_Test_Case;

/**
 * @author     Mike Naberezny <mike@maintainable.com>
 * @author     Derek DeVries <derek@maintainable.com>
 * @author     Chuck Hagenbuch <chuck@horde.org>
 * @author     Jan Schneider <jan@horde.org>
 * @license    http://www.horde.org/licenses/bsd
 * @group      horde_db
 * @category   Horde
 * @package    Db
 * @subpackage UnitTests
 */
class MysqliTest extends MysqlBase
{
    protected static function _available()
    {
        return extension_loaded('mysqli');
    }

    protected static function _getConnection($overrides = array())
    {
        $config = Horde_Test_Case::getConfig('DB_ADAPTER_MYSQLI_TEST_CONFIG',
                                             null,
                                             array('host' => 'localhost',
                                                   'username' => '',
                                                   'password' => '',
                                                   'dbname' => 'test'));
        if (isset($config['db']['adapter']['mysqli']['test']) &&
            is_array($config['db']['adapter']['mysqli']['test'])) {
            $config = $config['db']['adapter']['mysqli']['test'];
        } else {
            self::$_skip = true;
            self::$_reason = 'No configuration for mysqli test';
            return;
        }
        $config = array_merge($config, $overrides);

        $conn = new Horde_Db_Adapter_Mysqli($config);

        $cache = new Horde_Cache(new Horde_Cache_Storage_Mock());
        $conn->setCache($cache);

        return array($conn, $cache);
    }


    /*##########################################################################
    # Accessor
    ##########################################################################*/

    public function testAdapterName()
    {
        $this->assertEquals('MySQLi', $this->_conn->adapterName());
    }
}
