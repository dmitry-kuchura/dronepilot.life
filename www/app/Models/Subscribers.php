<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 * @property string $status
 * @property string $hash
 * @property string $ip
 * @property string $unsubscribe_at
 * @property string $created_at
 * @property string $updated_at
 */
class Subscribers extends Model
{
    const STATUS_ACTIVE_SUBSCRIBER = 'active';

    const STATUS_DISABLE_SUBSCRIBER = 'disable';

    /**
     * @var array
     */
    protected $fillable = ['email', 'status', 'hash', 'ip', 'unsubscribe_at', 'created_at', 'updated_at'];

}
