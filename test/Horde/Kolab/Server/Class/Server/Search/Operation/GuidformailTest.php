<?php
/**
 * Test the search operations by mail.
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
require_once __DIR__ . '/../../../../TestCase.php';

/**
 * Test the search operations by mail.
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
class Horde_Kolab_Server_Class_Server_Search_Operation_GuidformailTest
extends Horde_Kolab_Server_TestCase
{
    public function setUp(): void
    {
        $this->structure = $this->getMockBuilder('Horde_Kolab_Server_Structure_Interface')->getMock();
    }

    public function testMethodRestrictkolabHasResultRestrictedToKolabUsers()
    {
        $result = $this->getMockBuilder('Horde_Kolab_Server_Result_Interface')->getMock();
        $result->expects($this->once())
            ->method('asArray')
            ->will($this->returnValue(array('a' => 'a')));
        $this->structure->expects($this->once())
            ->method('find')
            ->with(
                $this->logicalAnd(
                    $this->isRestrictedToKolabUsers(),
                    $this->isSearchingByMail()
                ),
                array('attributes' => 'guid')
            )
            ->will($this->returnValue($result));
        $search = new Horde_Kolab_Server_Search_Operation_Guidformail($this->structure);
        $criteria = $this->getMockBuilder('Horde_Kolab_Server_Query_Element_Interface')->getMock();
        $this->assertEquals(array('a'), $search->searchGuidForMail('test'));
    }
}