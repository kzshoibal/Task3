<?php

use App\Post;

use App\Category;

use App\Tag;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Categories ......
        $category1 = Category::create([
            'name' => 'News'
        ]);
        $category2 = Category::create([
            'name' => 'Updates'
        ]);
        $category3 = Category::create([
            'name' => 'Design'
        ]);
        $category4 = Category::create([
            'name' => 'Marketing'
        ]);
        $category5 = Category::create([
            'name' => 'Product'
        ]);
        $category6 = Category::create([
            'name' => 'Offers'
        ]);
        $category7 = Category::create([
            'name' => 'Partnership'
        ]);
        $category8 = Category::create([
            'name' => 'Hiring'
        ]);

        //Tags .......
        $tag1 = Tag::create([
            'name' => 'Job'
        ]);
        $tag2 = Tag::create([
            'name' => 'Customers'
        ]);
        $tag3 = Tag::create([
            'name' => 'Record'
        ]);
        $tag4 = Tag::create([
            'name' => 'Progress'
        ]);
        $tag5 = Tag::create([
            'name' => 'Freebie'
        ]);
        $tag6 = Tag::create([
            'name' => 'Offer'
        ]);
        $tag7 = Tag::create([
            'name' => 'Screenshot'
        ]);
        $tag8 = Tag::create([
            'name' => 'Milestone'
        ]);
        $tag9 = Tag::create([
            'name' => 'Version'
        ]);
        $tag10 = Tag::create([
            'name' => 'Design'
        ]);

        //Posts....
        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Aliquam ultricies sapien diam, at elementum est aliquam at. Donec eu maximus mauris.',
            'category_id' => $category1->id  
        ]);

        $post2 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Donec tincidunt, neque vitae finibus tristique.',
            'category_id' => $category4->id  
        ]);

        $post3 = Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Vivamus porta risus erat, sed imperdiet erat rutrum et.',
            'category_id' => $category3->id  
        ]);

        $post4 = Post::create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Nam nulla nulla, lacinia pretium dictum a.',
            'category_id' => $category8->id  
        ]);

        $post1->tags()->attach([$tag4->id, $tag8->id]);
        $post2->tags()->attach([$tag1->id, $tag5->id, $tag10->id]);
        $post3->tags()->attach([$tag10->id, $tag7->id]);
        $post4->tags()->attach([$tag1->id, $tag5->id]);

    }
}
