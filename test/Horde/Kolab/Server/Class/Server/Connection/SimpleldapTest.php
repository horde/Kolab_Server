<?php
/**
 * Test the handler for a simple LDAP setup without read-only slaves.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */

/**
 * Require our basic test case definition
 */
require_once __DIR__ . '/../../../LdapTestCase.php';

/**
 * Test the handler for a simple LDAP setup without read-only slaves.
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
class Horde_Kolab_Server_Class_Server_Connection_SimpleldapTest
extends Horde_Kolab_Server_LdapTestCase
{
    public function testMethodConstructHasParameterNetldap2Connection()
    {
        $this->expectNotToPerformAssertions();

        $this->skipIfNoLdap();
        $ldap = $this->getMockBuilder('Horde_Ldap')->getMock();
        $conn = new Horde_Kolab_Server_Connection_Simpleldap($ldap);
    }

    public function testMethodConstructHasPostconditionThatTheGivenServerWasStored()
    {
        $this->skipIfNoLdap();
        $ldap = $this->getMockBuilder('Horde_Ldap')->getMock();
        $conn = new Horde_Kolab_Server_Connection_Simpleldap($ldap);
        $this->assertSame($ldap, $conn->getRead());
    }

    public function testMethodGetreadHasResultNetldap2TheHandledConnection()
    {
        $this->skipIfNoLdap();
        $ldap = $this->getMockBuilder('Horde_Ldap')->getMock();
        $conn = new Horde_Kolab_Server_Connection_Simpleldap($ldap);
        $this->assertInstanceOf('Horde_Ldap', $conn->getRead());
    }

    public function testMethodGetwriteHasResultNetldap2TheHandledConnection()
    {
        $this->skipIfNoLdap();
        $ldap = $this->getMockBuilder('Horde_Ldap')->getMock();
        $conn = new Horde_Kolab_Server_Connection_Simpleldap($ldap);
        $this->assertSame($conn->getWrite(), $conn->getRead());
    }
}
