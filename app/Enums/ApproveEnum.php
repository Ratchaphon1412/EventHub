<?php

namespace App\Enums;


enum ApproveEnum: string
{
    case pending = 'pending';
    case approved = 'approved';
    case rejected = 'rejected';
}
