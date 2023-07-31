<?php
/**
 * Test the base attribute.
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
require_once __DIR__ . '/../../../../TestCase.php';

/**
 * Test the base attribute.
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
#[\AllowDynamicProperties]
class Horde_Kolab_Server_Class_Server_Object_Attribute_BaseTest
extends Horde_Kolab_Server_TestCase
{
    public function setUp(): void
    {
        $this->attribute = $this->getMockBuilder('Horde_Kolab_Server_Structure_Attribute_Interface')->getMock();
    }

    public function testMethodConstructHasParameterAttributeTheAdapterCoveringTheInternalSideOfTheAttribute()
    {
        $this->expectNotToPerformAssertions();

        $attribute = new Attribute_Mock($this->attribute, '');
    }

    public function testMethodConstructHasParameterStringTheNameOfTheAttribute()
    {
        $this->expectNotToPerformAssertions();

        $attribute = new Attribute_Mock($this->attribute, 'name');
    }

    public function testMethodGetattributeReturnsAttributeInteralAssociatedWithThisAttribute()
    {
        $attribute = new Attribute_Mock($this->attribute, '');
        $this->assertInstanceOf(
            'Horde_Kolab_Server_Structure_Attribute_Interface',
            $attribute->getAttribute()
        );
    }

    public function testMethodGetnameReturnsStringTheNameOfTheAttribute()
    {
        $attribute = new Attribute_Mock($this->attribute, 'name');
        $this->assertEquals('name', $attribute->getName());
    }

    public function testMethodIsemptyHasParameterArrayDataValues()
    {
        $this->expectNotToPerformAssertions();

        $attribute = new Attribute_Mock($this->attribute, 'name');
        $attribute->isEmpty(array());
    }

    public function testMethodIsemptyReturnsFalseIfTheValueIndicatedByTheAttributeNameIsNotEmptyInTheDataArray()
    {
        $attribute = new Attribute_Mock($this->attribute, 'name', 'name');
        $this->assertFalse($attribute->isEmpty(array('name' => 'HELLO')));
    }

    public function testMethodIsemptyReturnsTrueIfTheValueIndicatedByTheAttributeNameIsMissingInTheDataArray()
    {
        $attribute = new Attribute_Mock($this->attribute, 'name');
        $this->assertTrue($attribute->isEmpty(array()));
    }

    public function testMethodIsemptyReturnsTrueIfTheValueIndicatedByTheAttributeNameIsStringEmptyInTheDataArray()
    {
        $attribute = new Attribute_Mock($this->attribute, 'name');
        $this->assertTrue($attribute->isEmpty(array('name' => '')));
    }

    public function testMethodIsemptyReturnsTrueIfTheValueIndicatedByTheAttributeNameIsNullInTheDataArray()
    {
        $attribute = new Attribute_Mock($this->attribute, 'name');
        $this->assertTrue($attribute->isEmpty(array('name' => null)));
    }

    public function testMethodIsemptyReturnsTrueIfTheValueIndicatedByTheAttributeNameIsEmptyArrayInTheDataArray()
    {
        $attribute = new Attribute_Mock($this->attribute, 'name');
        $this->assertTrue($attribute->isEmpty(array('name' => array())));
    }
}

class Attribute_Mock extends Horde_Kolab_Server_Object_Attribute_Base
{
    public function value() {}
    public function update(array $changes) {}
}