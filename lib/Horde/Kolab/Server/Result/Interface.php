<?php
/**
 * Interface for query results.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */

/**
 * Interface for query results.
 *
 * Copyright 2008-2017 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */
interface Horde_Kolab_Server_Result_Interface
{
    /**
     * The number of result entries.
     *
     * @return int The number of elements.
     */
    public function count();

    /**
     * Test if the last search exceeded the size limit.
     *
     * @return boolean True if the last search exceeded the size limit.
     */
    public function sizeLimitExceeded();

    /**
     * Return the result as an array.
     *
     * @return array The resulting array.
     */
    public function asArray();
}