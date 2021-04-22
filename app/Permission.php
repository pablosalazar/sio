<?php

namespace App;



class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_employees',
            'add_employees',
            'edit_employees',
            'delete_employees',
        ];
    }
}
