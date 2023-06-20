<?php 
namespace App\Enum; 

enum Approval : string 
{
    case pending = 'pending'; 
    case approved = 'approved'; 
    case rejected = 'rejected'; 
}