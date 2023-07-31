<?php
/**
 * Test the LDAP result handler.
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
 * Test the LDAP result handler.
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
class Horde_Kolab_Server_Class_Server_Result_LdapTest extends Horde_Kolab_Server_LdapTestCase
{
    public function setUp(): void
    {
        $this->skipIfNoLdap();
    }

    public function testMethodConstructHasParameterNetldap2searchSearchResult()
    {
        $this->expectNotToPerformAssertions();

        $search = $this->getMockBuilder('Horde_Ldap_Search')
                       ->disableOriginalConstructor()
                       ->getMock();
        $result = new Horde_Kolab_Server_Result_Ldap($search);
    }


    public function testMethodCountHasResultIntTheNumberOfElementsFound()
    {
        $search = $this->getMockBuilder('Horde_Ldap_Search')
                       ->setMethods(array('count'))
                       ->disableOriginalConstructor()
                       ->getMock();
        $search->expects($this->exactly(1))
            ->method('count')
            ->will($this->returnValue(1));
        $result = new Horde_Kolab_Server_Result_Ldap($search);
        $this->assertEquals(1, $result->count());
    }

    public function testMethodSizelimitexceededHasResultBooleanIndicatingIfTheSearchSizeLimitWasHit()
    {
        $search = $this->getMockBuilder('Horde_Ldap_Search')
                       ->setMethods(array('sizeLimitExceeded'))
                       ->disableOriginalConstructor()
                       ->getMock();
        $search->expects($this->exactly(1))
            ->method('sizeLimitExceeded')
            ->will($this->returnValue(true));
        $result = new Horde_Kolab_Server_Result_Ldap($search);
        $this->assertTrue($result->sizeLimitExceeded());
    }

    public function testMethodAsarrayHasResultArrayWithTheSearchResults()
    {
        $search = $this->getMockBuilder('Horde_Ldap_Search')
                       ->setMethods(array('asArray'))
                       ->disableOriginalConstructor()
                       ->getMock();
        $search->expects($this->exactly(1))
            ->method('asArray')
            ->will($this->returnValue(array('a' => 'a')));
        $result = new Horde_Kolab_Server_Result_Ldap($search);
        $this->assertEquals(array('a' => 'a'), $result->asArray());
    }
}
