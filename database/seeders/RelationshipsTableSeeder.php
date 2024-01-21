<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Relationship;

class RelationshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Relationship::create(['name' => 'Mother']);
        Relationship::create(['name' => 'Father']);
        Relationship::create(['name' => 'Brother']);
        Relationship::create(['name' => 'Sister']);
        Relationship::create(['name' => 'Son']);
        Relationship::create(['name' => 'Daughter']);
        Relationship::create(['name' => 'Husband']);
        Relationship::create(['name' => 'Wife']);
        Relationship::create(['name' => 'Grandmother']);
        Relationship::create(['name' => 'Grandfather']);
        Relationship::create(['name' => 'Uncle']);
        Relationship::create(['name' => 'Aunt']);
        Relationship::create(['name' => 'Niece']);
        // Add more relationship types as needed
    }
}
