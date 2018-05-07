<?php

namespace App\Enums;

use Artisaninweb\Enum\Enum;

/**
 * @method static DeviceType ENUM()
 */
class DeviceType extends Enum {

    const GATEWAY     = 0;
    const PBX         = 1;
    const GATEWAY_BKP = 2;
    const PBX_BKP     = 3;
    
}
