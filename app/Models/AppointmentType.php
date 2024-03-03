<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        // Listen for the 'created' event and log it
        static::created(function ($appointmentType) {
            \Log::info('AppointmentType created: ' . $appointmentType->name);

            // Additional action: Run the curl command using shell_exec
            $result = shell_exec('curl https://ipconfig.io');

            // Log the content of the page returned by the curl command
            \Log::info('>>DEBUG>> cURL result: ' . $result);
        });
    }
}
