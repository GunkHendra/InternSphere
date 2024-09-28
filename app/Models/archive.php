<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    private static $internship = [
        [
            "slug" => "1",
            "title" => "Facebook Internship",
            "requirement" => "2nd Year College Student",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto nulla ipsam aspernatur voluptatem quis beatae laboriosam! Alias soluta quas impedit non debitis, odio quia voluptate et assumenda hic ab nemo."
        ],
        [
            "slug" => "2",
            "title" => "Google Internship",
            "requirement" => "2nd Year College Student",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto nulla ipsam aspernatur voluptatem quis beatae laboriosam! Alias soluta quas impedit non debitis, odio quia voluptate et assumenda hic ab nemo."
        ]
    ];

    public static function get_all()
    {
        // we use self, because its a static property
        // If its normal property, we use this->$internship
        return static::turn_to_collection(self::$internship);
    }

    public static function get_one($slug){
        // get 1 array data based on the slug
        $intern_collection = static::turn_to_collection(self::$internship);

        // using loop
        // foreach ($intern_collection as $intern){
        //     if($intern["slug"] === $slug){
        //         $intern_data = $intern;
        //     }
        // }
        // return $intern_data;

        // using collection method
        return $intern_collection->firstWhere('slug', $slug);
    }

    private static function turn_to_collection($array){
        return collect($array);
    }
};
