<?php
/**
 * The base class representing Kolab object attributes.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.fsf.org/copyleft/lgpl.html LGPL
 * @link     http://pear.horde.org/index.php?package=Kolab_Server
 */

/**
 * The base class representing Kolab object attributes.
 *
 * Copyright 2008-2009 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.fsf.org/copyleft/lgpl.html LGPL
 * @link     http://pear.horde.org/index.php?package=Kolab_Server
 */
class Horde_Kolab_Server_Object_Attribute_Value
extends Horde_Kolab_Server_Object_Attribute_Base
{
    /**
     * Return the value of this attribute.
     *
     * @return array The value(s) of this attribute.
     *
     * @throws Horde_Kolab_Server_Exception If retrieval of the value failed.
     */
    public function value()
    {
        return $this->_object->getInternal($this->getInternalName());
    }

    /**
     * Indicate that a value will be saved by deleting it from the original data
     * array.
     *
     * @param array &$changes The object data that should be changed.
     *
     * @return NULL
     */
    public function consume(array &$changes)
    {
        if (isset($changes[$this->getExternalName()])) {
            unset($changes[$this->getExternalName()]);
        }
    }

    /**
     * Return the new internal state for this attribute.
     *
     * @param array $changes The object data that should be updated.
     *
     * @return array The resulting internal state.
     *
     * @throws Horde_Kolab_Server_Exception If storing the value failed.
     */
    public function update(array $changes)
    {
        if (!$this->isEmpty($changes)) {
            $value = $changes[$this->getExternalName()];
            if (!is_array($value)) {
                $value = array($value);
            }
            return array($this->getInternalName() => $value);
        }
        try {
            $old = $this->_object->getInternal($this->getInternalName());
            return array($this->getInternalName() => array());
        } catch (Horde_Kolab_Server_Exception_Novalue $e) {
            return array();
        }
    }

}