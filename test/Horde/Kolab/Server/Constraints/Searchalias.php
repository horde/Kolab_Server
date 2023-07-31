<?php

class Horde_Kolab_Server_Constraint_Searchalias extends PHPUnit\Framework\Constraint\Constraint
{
    public function evaluate($other, $description = '', $returnResult = FALSE)
    {
        if ($other instanceof Horde_Kolab_Server_Query_Element_Interface) {
            if ($other instanceof Horde_Kolab_Server_Query_Element_Group) {
                $elements = $other->getElements();
                foreach ($elements as $element) {
                    if ($this->evaluate($element)) {
                        return true;
                    }
                }
                return true;
            } else {
                if ($other->getName() == 'alias') {
                    return true;
                } else {
                    return false;
                }                    
            }
        } else {
            return false;
        }
    }

    public function fail($other, $description, \SebastianBergmann\Comparator\ComparisonFailure $comparisonFailure = NULL): void
    {
        throw new PHPUnit_Framework_ExpectationFailedException(
          sprintf(
            '%sFailed asserting that %s contains a query element that is searching by alias',

            !empty($description) ? $description . "\n" : '',
            PHPUnit_Util_Type::toString($other, TRUE)
          ),
          NULL
        );
    }

    public function toString(): string
    {
        return 'contains a query element that is searching by alias';
    }
}
