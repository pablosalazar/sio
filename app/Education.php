<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = ['employee_id', 'education', 'degree', 'institute', 'state'];
    protected $table = "educations";
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    // public static function getPostFormations($data = [])
    // {
    //     $formations = [];

    //     if ( count($data) ) {
    //         for ($i = 0; $i < count($data['formation']); $i++)
    //         {
    //             if( !empty($data['formation'][$i]) or !empty($data['degree'][$i]) or !empty($data['institute'][$i])){
    //                 $formation = new Formation();

    //                 $formation->formation = $data['formation'][$i];
    //                 $formation->degree = $data['degree'][$i];
    //                 $formation->institute = $data['institute'][$i];
    //                 $formation->state = $data['state'][$i];

    //                 $formations[] = $formation;
    //             }
    //         }
    //     }

    //     return $formations;
    // }
}
