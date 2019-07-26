<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table='qustions_table';

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }
}
