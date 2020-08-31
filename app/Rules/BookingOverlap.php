<?php

namespace App\Rules;

use App\Models\Room\Booking_Date;
use Illuminate\Contracts\Validation\Rule;

class BookingOverlap implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        
        return Booking_Date::where('checkin','<=',$value)->where('checkout','>=',$value)->count() == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Booking time is currently occupying';
    }
}
