<?php

declare(strict_types=1);

namespace App\Enums;

enum Bias: string
{
    case FAR_LEFT = 'far-left';
    case LEFT = 'left';
    case CENTER = 'center';
    case RIGHT = 'right';
    case FAR_RIGHT = 'far-right';
    case UNKNOWN = 'unknown';
}
