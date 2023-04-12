<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_categories')->delete();

        Category::insert([
            [	
            	'category_id'=>1,
            	'parent_id'=>NULL,
		        'name'=>'Occasion',
		        'description'=>'This is the occation cakes',
		        'meta_title'=>'Birthdays',
		        'meta_description'=>'This is Birthdays Category',
		        'meta_keyword'=>'Birthdays',
		        'image'=>'uploads/category/cakecat',
		        'slug'=>'occations',
		        'status'=>'1',
		        'top'=>1
            ],
            [	
            	'category_id'=>2,
            	'parent_id'=>NULL,
		        'name'=>'By Flavour',
		        'description'=>'This is cake by Falvour',
		        'meta_title'=>'By Flavour',
		        'meta_description'=>'This is a cake by flavour',
		        'meta_keyword'=>'This is a cake by flavour',
		        'image'=>'uploads/category/flavourcake.jpg',
		        'slug'=>'by-flavour',
		        'status'=>'1',
		        'top'=>1
            ],
            [	
            	'category_id'=>3,
            	'parent_id'=>NULL,
		        'name'=>'Festival Special',
		        'description'=>'This is Clothes/Ladies Category',
		        'meta_title'=>'Clothes/Ladies',
		        'meta_description'=>'This is Clothes/Ladies Category',
		        'meta_keyword'=>'Clothes/Ladies',
		        'image'=>'uploads/category/festival_especialcakes.jpg',
		        'slug'=>'festival-special',
		        'status'=>'1',
		        'top'=>1
            ],
            [	
            	'category_id'=>4,
            	'parent_id'=>NULL,
		        'name'=>'Relationship Special',
		        'description'=>'This is Relationship Special Category',
		        'meta_title'=>'Relationship Special',
		        'meta_description'=>'This is Relationship Special Category',
		        'meta_keyword'=>'Relationship Special',
		        'image'=>'uploads/category/relationship.jpeg',
		        'slug'=>'relationship-special',
		        'status'=>'1',
		        'top'=>1
            ],
            [	
            	'category_id'=>5,
            	'parent_id'=>NULL,
		        'name'=>'Desiner Cakes',
		        'description'=>'This is Desiner Cakes Category',
		        'meta_title'=>'Desiner Cakes',
		        'meta_description'=>'This is Desiner Cakes Category',
		        'meta_keyword'=>'Desiner Cakes',
		        'image'=>'uploads/category/designer.jpg',
		        'slug'=>'desiner-cakes',
		        'status'=>'1',
		        'top'=>1
            ],
            [
            	'category_id'=>7,
            	'parent_id'=>1,
		        'name'=>'Birthday Special ',
		        'description'=>'This is Birthday Special Category',
		        'meta_title'=>'Birthday Special',
		        'meta_description'=>'This is Birthday Special Category',
		        'meta_keyword'=>'Birthday Special',
		        'image'=>'',
		        'slug'=>'birthday-special',
		        'status'=>'1',
		        'top'=>0
            ],
            [	
            	'category_id'=>8,
            	'parent_id'=>1,
		        'name'=>'Anniversay Cakes',
		        'description'=>'This is Anniversay  Category',
		        'meta_title'=>'Anniversay ',
		        'meta_description'=>'This is Anniversay  Category',
		        'meta_keyword'=>'Anniversay',
		        'image'=>'',
		        'slug'=>'anniversay',
		        'status'=>'1',
		        'top'=>0
            ],
            [	
            	'category_id'=>9,
            	'parent_id'=>2,
		        'name'=>'Fruits Cake ',
		        'description'=>'This is Fruits Cake  Category',
		        'meta_title'=>'Fruits Cake ',
		        'meta_description'=>'This is Fruits Cake  Category',
		        'meta_keyword'=>'Fruits Cake ',
		        'image'=>'',
		        'slug'=>'fruit-cake',
		        'status'=>'1',
		        'top'=>0
            ],
            [	
            	'category_id'=>10,
            	'parent_id'=>2,
		        'name'=>'Eggless Cakes',
		        'description'=>'This is Eggless Cakes Category',
		        'meta_title'=>'Eggless Cakes',
		        'meta_description'=>'This is Eggless Cakes Category',
		        'meta_keyword'=>'Eggless Cakes',
		        'image'=>'',
		        'slug'=>'egg-cakes',
		        'status'=>'1',
		        'top'=>0
            ],
            [	
            	'category_id'=>11,
            	'parent_id'=>3,
		        'name'=>'Christmus Cakes',
		        'description'=>'This is Christmus Cakes  Category',
		        'meta_title'=>'Christmus Cakes ',
		        'meta_description'=>'This is Christmus Cakes  Category',
		        'meta_keyword'=>'Christmus Cakes ',
		        'image'=>'',
		        'slug'=>'christmus-cakes',
		        'status'=>'1',
		        'top'=>0
            ],
            [	
            	'category_id'=>12,
            	'parent_id'=>3,
		        'name'=>'Tihar/Diwali Cakes',
		        'description'=>'This is Tihar/Diwali  Category',
		        'meta_title'=>'Tihar/Diwali ',
		        'meta_description'=>'This is Tihar/Diwali  Category',
		        'meta_keyword'=>'Tihar/Diwali ',
		        'image'=>'',
		        'slug'=>'tihar-diwali',
		        'status'=>'1',
		        'top'=>0
            ],
            [	
            	'category_id'=>13,
            	'parent_id'=>4,
		        'name'=>'Cakes for Dad',
		        'description'=>'This is Cakes for Dad Category',
		        'meta_title'=>'Cakes for Dad ',
		        'meta_description'=>'This is Cakes for Dad  Category',
		        'meta_keyword'=>'Cakes for Dad',
		        'image'=>'',
		        'slug'=>'mobile',
		        'status'=>'1',
		        'top'=>0
            ],
            [	
            	'category_id'=>14,
            	'parent_id'=>4,
		        'name'=>'Cakes for Mom ',
		        'description'=>'This is Cakes for Dad  Category',
		        'meta_title'=>'Cakes for Dad ',
		        'meta_description'=>'This is Cakes for Dad  Category',
		        'meta_keyword'=>'Cakes for Dad ',
		        'image'=>'',
		        'slug'=>'cakes-for-dad',
		        'status'=>'1',
		        'top'=>0
            ],
            [	
            	'category_id'=>15,
            	'parent_id'=>5,
		        'name'=>'Footballer',
		        'description'=>'This is footballer Category',
		        'meta_title'=>'footballer ',
		        'meta_description'=>'This is footballer  Category',
		        'meta_keyword'=>'footballer',
		        'image'=>'',
		        'slug'=>'mobile',
		        'status'=>'1',
		        'top'=>0
            ],
            [	
            	'category_id'=>16,
            	'parent_id'=>5,
		        'name'=>'Cricketer ',
		        'description'=>'This is Cricketer  Category',
		        'meta_title'=>'Cricketer ',
		        'meta_description'=>'This is Cricketer  Category',
		        'meta_keyword'=>'Cricketer ',
		        'image'=>'',
		        'slug'=>'Cricketer',
		        'status'=>'1',
		        'top'=>0
            ]
            ,
          //   [	
          //   	'category_id'=>17,
          //   	'parent_id'=>6,
		        // 'name'=>'Mobile',
		        // 'description'=>'This is Mobile Category',
		        // 'meta_title'=>'Mobile ',
		        // 'meta_description'=>'This is Mobile  Category',
		        // 'meta_keyword'=>'Mobile',
		        // 'image'=>'',
		        // 'slug'=>'mobile',
		        // 'status'=>'1',
		        // 'top'=>0
          //   ],
          //   [	
          //   	'category_id'=>18,
          //   	'parent_id'=>6,
		        // 'name'=>'Watches ',
		        // 'description'=>'This is Watches  Category',
		        // 'meta_title'=>'Watches ',
		        // 'meta_description'=>'This is Watches  Category',
		        // 'meta_keyword'=>'Watches ',
		        // 'image'=>'',
		        // 'slug'=>'Watches',
		        // 'status'=>'1',
		        // 'top'=>0
          //   ],
          //   [	
          //   	'category_id'=>19,
          //   	'parent_id'=>NULL,
		        // 'name'=>'Anniversay Special',
		        // 'description'=>'This is Anniversay Special Category',
		        // 'meta_title'=>'Anniversay Special',
		        // 'meta_description'=>'This is Anniversay Special Category',
		        // 'meta_keyword'=>'Desiner Cakes',
		        // 'image'=>'uploads/category/aniversayspecial.jpeg',
		        // 'slug'=>'anniversay-special',
		        // 'status'=>'1',
		        // 'top'=>1
          //   ],
        ]);

    }
}
