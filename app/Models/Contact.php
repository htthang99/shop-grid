<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property bigint unsigned $user_id user id
 * @property bigint unsigned $ward_id ward id
 * @property varchar $address address
 * @property varchar $phone phone
 * @property varchar $email email
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property timestamp $deleted_at deleted at
 * @property Ward $ward belongsTo
 * @property User $user belongsTo
   
 */
class Contact extends Model
{

    use SoftDeletes;
    /**
     * Database table name
     */
    protected $table = 'contacts';

    /**
     * Use timestamps 
     *
     * @var boolean
     */
    public $timestamps = true;

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'user_id',
        'ward_id',
        'address',
        'phone',
        'email'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * ward
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    /**
     * user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
