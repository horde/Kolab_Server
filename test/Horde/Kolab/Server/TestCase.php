<?php
/**
 * Provides functions required by several Kolab_Server tests.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */

/**
 * Prepare the test setup.
 */
require_once __DIR__ . '/Constraints/Restrictkolabusers.php';
require_once __DIR__ . '/Constraints/Restrictgroups.php';
require_once __DIR__ . '/Constraints/Searchuid.php';
require_once __DIR__ . '/Constraints/Searchmail.php';
require_once __DIR__ . '/Constraints/Searchcn.php';
require_once __DIR__ . '/Constraints/Searchalias.php';

/**
 * Provides functions required by several Kolab_Server tests.
 *
 * Copyright 2009-2017 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */
class Horde_Kolab_Server_TestCase extends Horde_Test_Case
{
    protected function getComposite()
    {
        return $this->getMockBuilder('Horde_Kolab_Server_Composite')
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->getMock();
    }

    protected function getMockedComposite()
    {
        return new Horde_Kolab_Server_Composite(
            $this->getMockBuilder('Horde_Kolab_Server_Interface')
                 ->getMock(),
            $this->getMockBuilder('Horde_Kolab_Server_Objects_Interface')
                 ->getMock(),
            $this->getMockBuilder('Horde_Kolab_Server_Structure_Interface')
                 ->getMock(),
            $this->getMockBuilder('Horde_Kolab_Server_Search_Interface')
                 ->getMock(),
            $this->getMockBuilder('Horde_Kolab_Server_Schema_Interface')
                 ->getMock()
        );
    }

    public function isRestrictedToGroups()
    {
        return new Horde_Kolab_Server_Constraint_Restrictgroups();
    }

    public function isRestrictedToKolabUsers()
    {
        return new Horde_Kolab_Server_Constraint_Restrictedkolabusers();
    }

    public function isSearchingByUid()
    {
        return new Horde_Kolab_Server_Constraint_Searchuid();
    }

    public function isSearchingByMail()
    {
        return new Horde_Kolab_Server_Constraint_Searchmail();
    }

    public function isSearchingByCn()
    {
        return new Horde_Kolab_Server_Constraint_Searchcn();
    }

    public function isSearchingByAlias()
    {
        return new Horde_Kolab_Server_Constraint_Searchcn();
    }
}
