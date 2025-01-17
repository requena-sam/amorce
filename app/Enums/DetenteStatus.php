<?php

namespace App\Enums;

enum DetenteStatus: string
{
    case ACTIVE = 'Active';
    case PENDING = 'En attente';
    case CLOSED = 'Fermée';
}
