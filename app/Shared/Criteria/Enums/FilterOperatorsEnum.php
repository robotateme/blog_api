<?php

namespace App\Shared\Criteria\Enums;

enum FilterOperatorsEnum
{
    case EQUAL;
    case NOT_EQUAL;
    case GT;
    case GTE;
    case LT;
    case LTE;
    case CONTAINS;
    case NOT_CONTAINS;
    case IN;
    case NOT_IN;
}
