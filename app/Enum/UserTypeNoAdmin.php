<?php 
namespace App\Enum; 

enum UserTypeNoAdmin : string {
    case user ='user'; 
    case suppler = 'suppler'; 
    case doctor = 'doctor'; 
}