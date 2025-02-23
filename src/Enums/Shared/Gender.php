<?php declare(strict_types=1);

namespace Arm\Enums\Shared;

enum Gender: String {
    case MALE   = 'Hombre';
    case FEMALE = 'Mujer';
    case OTHER  = 'Otro';
}