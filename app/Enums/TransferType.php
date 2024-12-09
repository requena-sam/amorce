<?php

namespace App\Enums;

enum TransferType: string
{
    case CSV = 'Transfert csv';
    case MANUAL = 'Transfert manuel';
}
