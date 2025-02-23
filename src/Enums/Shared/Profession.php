<?php declare(strict_types=1);

namespace Arm\Enums\Shared;

enum Profession: String {
    case ACTOR      = 'Actor';         case ACTRESS  = 'Actriz';
    case DIRECTOR   = 'Director/a';    case PRODUCER = 'Productor/a';
    case WRITER     = 'Escritor/a';    case COMPOSER = 'Compositor/a';
    case SINGER     = 'Cantante';      case DANCER   = 'Bailarín/Bailarina';
    case MUSICIAN   = 'Músico';        case ARTIST   = 'Artista';
    case ENGINEER   = 'Ingeniero/a';   case ARCHITECT = 'Arquitecto/a';
}