<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Subscriber;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@gmail.com'),
        ]);

        // Contact::insert([
        //     [
        //         'full_name' => 'John Doe',
        //         'phone' => '123-456-7890',
        //         'email' => 'johndoe@example.com',
        //         'message' => 'Hello, I would like more information.',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Jane Smith',
        //         'phone' => '987-654-3210',
        //         'email' => 'janesmith@example.com',
        //         'message' => 'I have a question about your services.',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Alice Johnson',
        //         'phone' => '555-123-4567',
        //         'email' => 'alicej@example.com',
        //         'message' => 'Looking forward to your response.',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Bob Williams',
        //         'phone' => '444-987-6543',
        //         'email' => 'bobwilliams@example.com',
        //         'message' => 'Can you provide a quote for your services?',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Charlie Brown',
        //         'phone' => '333-222-1111',
        //         'email' => 'charlieb@example.com',
        //         'message' => 'Thank you for the great support!',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Charlie Brown',
        //         'phone' => '333-222-1111',
        //         'email' => 'charlieb@example.com',
        //         'message' => 'Thank you for the great support!',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Charlie Brown',
        //         'phone' => '333-222-1111',
        //         'email' => 'charlieb@example.com',
        //         'message' => 'Thank you for the great support!',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Charlie Brown',
        //         'phone' => '333-222-1111',
        //         'email' => 'charlieb@example.com',
        //         'message' => 'Thank you for the great support!',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Charlie Brown',
        //         'phone' => '333-222-1111',
        //         'email' => 'charlieb@example.com',
        //         'message' => 'Thank you for the great support!',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Charlie Brown',
        //         'phone' => '333-222-1111',
        //         'email' => 'charlieb@example.com',
        //         'message' => 'Thank you for the great support!',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Charlie Brown',
        //         'phone' => '333-222-1111',
        //         'email' => 'charlieb@example.com',
        //         'message' => 'Thank you for the great support!',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Charlie Brown',
        //         'phone' => '333-222-1111',
        //         'email' => 'charlieb@example.com',
        //         'message' => 'Thank you for the great support!',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Charlie Brown',
        //         'phone' => '333-222-1111',
        //         'email' => 'charlieb@example.com',
        //         'message' => 'Thank you for the great support!',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Charlie Brown',
        //         'phone' => '333-222-1111',
        //         'email' => 'charlieb@example.com',
        //         'message' => 'Thank you for the great support!',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'full_name' => 'Charlie Brown',
        //         'phone' => '333-222-1111',
        //         'email' => 'charlieb@example.com',
        //         'message' => 'Thank you for the great support!',
        //         'mark_as_read'=> false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ]);
        // Subscriber::factory(10)->create();
    }
}
