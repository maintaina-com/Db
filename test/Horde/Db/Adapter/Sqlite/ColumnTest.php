<?php
/**
 * Copyright 2007 Maintainable Software, LLC
 * Copyright 2008-2017 Horde LLC (http://www.horde.org/)
 *
 * @author     Mike Naberezny <mike@maintainable.com>
 * @author     Derek DeVries <derek@maintainable.com>
 * @author     Chuck Hagenbuch <chuck@horde.org>
 * @license    http://www.horde.org/licenses/bsd
 * @category   Horde
 * @package    Db
 * @subpackage UnitTests
 */
namespace Horde\Db\Adapter\Sqlite;
use Horde_Db_Adapter_ColumnBase as ColumnBase;
use \Horde_Db_Adapter_Sqlite_Column;

/**
 * @author     Mike Naberezny <mike@maintainable.com>
 * @author     Derek DeVries <derek@maintainable.com>
 * @author     Chuck Hagenbuch <chuck@horde.org>
 * @license    http://www.horde.org/licenses/bsd
 * @group      horde_db
 * @category   Horde
 * @package    Db
 * @subpackage UnitTests
 */
class ColumnTest extends ColumnBase
{
    protected $_class = 'Horde_Db_Adapter_Sqlite_Column';


    /*##########################################################################
    # Type Cast Values
    ##########################################################################*/

    public function testTypeCastBooleanFalse()
    {
        $col = new Horde_Db_Adapter_Sqlite_Column('is_active', 'f', 'boolean', false);
        $this->assertSame(false, $col->getDefault());
    }

    public function testTypeCastBooleanTrue()
    {
        $col = new Horde_Db_Adapter_Sqlite_Column('is_active', 't', 'boolean', false);
        $this->assertSame(true, $col->getDefault());
    }
}
