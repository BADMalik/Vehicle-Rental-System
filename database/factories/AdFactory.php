<?php

namespace Database\Factories;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $locations = ['pakistan','US','UK','Nigeria'];
            $index = array_rand($locations);
            $selectedIndex =$locations[$index];
            $user_id = User::all()->random()->id;
            // dd($user_id);
          $condition = ['Brand New','Old'];
        $indexOfCondition = array_rand($condition);
        $finalCondition=$condition[$indexOfCondition];
// dd($indexOfCondition);
        $objects = ['Bike','Boots','Car','Washing Machine','Truck','FYP','House','Plot'];
        $indexOfObject=array_rand($objects);
        $finalObject=$objects[$indexOfObject];
        return [
            'title'=>$finalObject,
            'description'=>$this->faker->realText(),
            'profile_picture'=>'dummy.jpg',
            'condition'=>$finalCondition,
            'user_id'=>$user_id,
            'location'=>$selectedIndex,
            "status"=>'approved'
        ];
    }
}
