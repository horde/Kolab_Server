<?php
/**
 * Test the handler for a mock connection.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */

/**
 * Test the handler for a mock connection.
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
class Horde_Kolab_Server_Class_Server_Connection_MockTest
extends Horde_Test_Case
{
    public function testMethodConstructHasParameterMockldapConnection()
    {
        $this->expectNotToPerformAssertions();

        $ldap = $this->getMockBuilder('Horde_Kolab_Server_Connection_Mock_Ldap')
                     ->disableOriginalConstructor()
                     ->disableOriginalClone()
                     ->getMock();
        $conn = new Horde_Kolab_Server_Connection_Mock($ldap);
    }

    public function testMethodConstructHasPostconditionThatTheGivenServerWasStored()
    {
        $ldap = $this->getMockBuilder('Horde_Kolab_Server_Connection_Mock_Ldap')
                     ->disableOriginalConstructor()
                     ->disableOriginalClone()
                     ->getMock();
        $conn = new Horde_Kolab_Server_Connection_Mock($ldap);
        $this->assertSame($ldap, $conn->getRead());
    }

    public function testMethodGetreadHasResultMockldapTheHandledConnection()
    {
        $ldap = $this->getMockBuilder('Horde_Kolab_Server_Connection_Mock_Ldap')
                     ->disableOriginalConstructor()
                     ->disableOriginalClone()
                     ->getMock();
        $conn = new Horde_Kolab_Server_Connection_Mock($ldap);
        $this->assertInstanceOf('Horde_Kolab_Server_Connection_Mock_Ldap', $conn->getRead());
    }

    public function testMethodGetwriteHasResultMockldapTheHandledConnection()
    {
        $ldap = $this->getMockBuilder('Horde_Kolab_Server_Connection_Mock_Ldap')
                     ->disableOriginalConstructor()
                     ->disableOriginalClone()
                     ->getMock();
        $conn = new Horde_Kolab_Server_Connection_Mock($ldap);
        $this->assertSame($conn->getWrite(), $conn->getRead());
    }
}
