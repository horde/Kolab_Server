<?php
/**
 * Return the groups for the given member element.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @link     http://pear.horde.org/index.php?package=Kolab_Server
 */

/**
 * Return the groups for the given member element.
 *
 * Copyright 2008-2016 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @link     http://pear.horde.org/index.php?package=Kolab_Server
 */
class Horde_Kolab_Server_Search_Operation_Groupsformember
extends Horde_Kolab_Server_Search_Operation_Restrictgroups
{
    /**
     * Return the groups for the given member element.
     *
     * @param string $guid  The guid of the member.
     *
     * @return array The group GUID(s).
     *
     * @throws Horde_Kolab_Server_Exception
     */
    public function searchGroupsForMember($guid)
    {
        $criteria = new Horde_Kolab_Server_Query_Element_Equals(
                'member', $guid
            );
        return parent::searchRestrictGroups($criteria);
    }
}