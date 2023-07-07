<?php

namespace App\Enums;

enum Role: int
{
    case ROLE_ADMIN = 1;
    case ROLE_TEACHER = 2;
    case ROLE_STUDENT = 3;
    case ROLE_CURATOR = 4;
    case ROLE_ROBOT = 5;
    case ROLE_EDUCATIONAL_PART = 8;
}
