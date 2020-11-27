<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class UsersTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    Member::create([
      'name' => 'Michel Berger',
      'email' => 'michel@berger.com',
      'password' => '123456789'
      ]);

    Member::create([
      'name' => 'Sebastian Vettel',
      'email' => 'sebastien@vettel.com',
      'password' => 'skuhskuhskuh'
    ]);
  }
}