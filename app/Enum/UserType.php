<?php 
namespace App\Enum; 

enum UserType : string {
    case user ='user'; 
    case admin = 'admin'; 
    case suppler = 'suppler'; 
    case clinics= 'clinics'; 
    case shelter= 'shelter'; 

}