<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{

    $intern::create([
        'title' => 'Apple Internship',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi officia assumenda sit perferendis rem aliquam. Fugit nesciunt quas id minus repellendus veniam commodi eum pariatur optio molestiae quisquam officia asperiores veritatis quis nobis inventore eligendi dolore fugiat esse, voluptatem incidunt, praesentium temporibus.',
        'description' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi officia assumenda sit perferendis rem aliquam. Fugit nesciunt quas id minus repellendus veniam commodi eum pariatur optio molestiae quisquam officia asperiores veritatis quis nobis inventore eligendi dolore fugiat esse, voluptatem incidunt, praesentium temporibus. Culpa aliquam ad possimus odio exercitationem quas magnam, ipsum suscipit, voluptatum obcaecati reprehenderit. Magni alias aliquid commodi ex nostrum maiores. Rem accusamus iusto temporibus, enim neque dolores rerum repellat asperiores quae dolore! Voluptate veritatis enim, excepturi praesentium similique illo quae magnam perferendis et non expedita nihil cumque? Exercitationem, placeat aliquam! Praesentium quod pariatur ipsa, perferendis, perspiciatis minus dolorem quibusdam animi delectus fugit nobis deserunt ad ratione blanditiis? Libero, quia expedita perferendis, error dicta deleniti molestiae praesentium quos alias mollitia est, eos ipsum veniam quisquam eum tenetur dolores consequatur excepturi! Veritatis, eos. Nemo magnam expedita et quia ad facere ut neque, velit aperiam inventore aliquam id odio delectus esse.</p>'
    ])

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
