<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class User extends Model{
        protected $table = 'tblstudent';
        protected $fillable = [
            'lastname','firstname', 'middlename','age' 
        ];

        public $timestamps = false;
        protected $primaryKey = 'studid';
    }
