<?php
/**
 * Test the guid search operation.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */

/**
 * Test the guid search operation.
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
class Horde_Kolab_Server_Class_Server_Search_Operation_GuidTest
extends Horde_Test_Case
{
    public function setUp(): void
    {
        $this->structure = $this->getMockBuilder('Horde_Kolab_Server_Structure_Interface')->getMock();
    }

    public function testMethodConstructHasParameterStructure()
    {
        $this->expectNotToPerformAssertions();

        $search = new Horde_Kolab_Server_Search_Operation_Guid($this->structure);
    }

    public function testMethodConstructHasPostconditionThatTheServerStructureGetsStored()
    {
        $search = new Horde_Kolab_Server_Search_Operation_Guid($this->structure);
        $this->assertSame($this->structure, $search->getStructure());
    }

    public function testMethodGetStructureHasResultStructureTheStructureAssociatedWithThisSearch()
    {
        $search = new Horde_Kolab_Server_Search_Operation_Guid($this->structure);
        $this->assertInstanceOf('Horde_Kolab_Server_Structure_Interface', $search->getStructure());
    }

    public function testMethodSearchguidHasResultArrayTheGuidsOfTheSearchResult()
    {
        $result = $this->getMockBuilder('Horde_Kolab_Server_Result_Interface')->getMock();
        $result->expects($this->once())
            ->method('asArray')
            ->will($this->returnValue(array('a' => 'a')));
        $this->structure->expects($this->once())
            ->method('find')
            ->with(
                $this->isInstanceOf(
                    'Horde_Kolab_Server_Query_Element_Interface'
                ),
                array('attributes' => 'guid')
            )
            ->will($this->returnValue($result));
        $search = new Horde_Kolab_Server_Search_Operation_Guid($this->structure);
        $criteria = $this->getMockBuilder('Horde_Kolab_Server_Query_Element_Interface')->getMock();
        $this->assertEquals(array('a'), $search->searchGuid($criteria));
    }

    public function testMethodSearchguidHasResultArrayEmptyIfTheSearchReturnedNoResults()
    {
        $result = $this->getMockBuilder('Horde_Kolab_Server_Result_Interface')->getMock();
        $result->expects($this->once())
            ->method('asArray')
            ->will($this->returnValue(array()));
        $this->structure->expects($this->once())
            ->method('find')
            ->with(
                $this->isInstanceOf(
                    'Horde_Kolab_Server_Query_Element_Interface'
                ),
                array('attributes' => 'guid')
            )
            ->will($this->returnValue($result));
        $search = new Horde_Kolab_Server_Search_Operation_Guid($this->structure);
        $criteria = $this->getMockBuilder('Horde_Kolab_Server_Query_Element_Interface')->getMock();
        $this->assertEquals(array(), $search->searchGuid($criteria));
    }
}
