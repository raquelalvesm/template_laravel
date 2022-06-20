<?php

namespace App\Ldap;

use LdapRecord\Models\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;

class User extends Model
{
    /**
     * The object classes of the LDAP model.
     *
     * @var array
     */
    public static $objectClasses = [
        "top",
        "person",
        "organizationalPerson",
        "user"
    ];
}
