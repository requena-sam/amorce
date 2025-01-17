<?php

namespace App\Enums;

enum TransactionType: string
{
    case DEPOT = 'Dépot';
    case RETRAIT = 'Retrait';
}
