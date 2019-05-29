<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $description
 * @property string $status
 * @property string $ip
 * @property string $created_at
 * @property string $updated_at
 */
class Contacts extends Model
{
    const READ_CONTACTS = 'read';

    const NOT_READ_CONTACTS = 'not-read';

    /**
     * @var array
     */
    protected $fillable = ['email', 'name', 'description', 'status', 'ip', 'created_at', 'updated_at'];

}
