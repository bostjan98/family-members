<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\FamilyMember;

class FamilyMemberFactory extends Factory
{
    protected $model = FamilyMember::class;

    public function definition()
    {
        $user = User::factory()->create();

        // Select a random name from the users table
        $relationUser = User::inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'name' => $relationUser->name, // Use the name of the selected user
            'relationship_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]),
            'relation_name_id' => $relationUser->id,
        ];
    }
}
