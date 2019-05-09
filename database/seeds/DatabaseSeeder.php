<?php

use Illuminate\Database\Seeder;
use App\Personage;
use App\Weapons;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //PERSONAGES
        DB::table('personages')->insert(
            [
                'name' => 'Frodo',
                'type' => 'Hobbit',
                'image' => 'frodo.png',
                'force' => '1',
                'dexterity' => '2',
                'magic' => '0',
                'hero' => true
            ]);
        DB::table('personages')->insert( [
            'name' => 'Sam',
            'type' => 'Hobbit',
            'image' => 'sam.png',
            'force' => '4',
            'dexterity' => '3',
            'magic' => '0',
            'hero' => true
        ]);
        DB::table('personages')->insert([
            'name' => 'Merry',
            'type' => 'Hobbit',
            'image' => 'merry.png',
            'force' => '3',
            'dexterity' => '2',
            'magic' => '0',
            'hero' => true
        ]);
        DB::table('personages')->insert([
            'name' => 'Pippin',
            'type' => 'Hobbit',
            'image' => 'pippin.png',
            'force' => '2',
            'dexterity' => '2',
            'magic' => '0',
            'hero' => true
        ]);
        DB::table('personages')->insert([
            'name' => 'Aragorn',
            'type' => 'Humano',
            'image' => 'aragorn.png',
            'force' => '8',
            'dexterity' => '5',
            'magic' => '1',
            'hero' => true
        ]);
        DB::table('personages')->insert([
            'name' => 'Boromir',
            'type' => 'Humano',
            'image' => 'boromir.png',
            'force' => '9',
            'dexterity' => '4',
            'magic' => '0',
            'hero' => true
        ]);
        DB::table('personages')->insert([
            'name' => 'Legolas',
            'type' => 'Elfo',
            'image' => 'legolas.png',
            'force' => '5',
            'dexterity' => '9',
            'magic' => '4',
            'hero' => true
        ]);
        DB::table('personages')->insert([
            'name' => 'Gimli',
            'type' => 'Anão',
            'image' => 'gimli.png',
            'force' => '8',
            'dexterity' => '3',
            'magic' => '0',
            'hero' => true
        ]);
        DB::table('personages')->insert([
            'name' => 'Gandalf',
            'type' => 'Mago',
            'image' => 'gandalf.png',
            'force' => '3',
            'dexterity' => '4',
            'magic' => '10',
            'hero' => true
        ]);
        DB::table('personages')->insert([
            'name' => 'Olho De Sauron',
            'type' => 'Mago',
            'image' => 'sauron.png',
            'force' => '100',
            'dexterity' => '100',
            'magic' => '1000',
            'hero' => false
        ]);
        DB::table('personages')->insert( [
            'name' => 'Uruk-Hai',
            'type' => 'Orc',
            'image' => 'uruk-hai.png',
            'force' => '10',
            'dexterity' => '7',
            'magic' => '0',
            'hero' => false
        ]);
        DB::table('personages')->insert([
            'name' => 'Snaga',
            'type' => 'Orc',
            'image' => 'Snaga.png',
            'force' => '4',
            'dexterity' => '6',
            'magic' => '0',
            'hero' => false
        ]);

        //WEAPONS
        DB::table('weapons')->insert([
            'name' => 'Espada curta',
            'image' => 'espada-curta.png',
            'force_min' => '1',
            'force_max' => '3',
            'dexterity_min' => '2',
            'dexterity_max' => '4',
            'magic_min' => '0',
            'magic_max' => '0',
            'limitation' => 'Força >= 2'
        ]);
        DB::table('weapons')->insert([
            'name' => 'Espada curta mágica',
            'image' => 'espada-curta-magica.png',
            'force_min' => '1',
            'force_max' => '3',
            'dexterity_min' => '2',
            'dexterity_max' => '4',
            'magic_min' => '1',
            'magic_max' => '1',
            'limitation' => 'Força >= 2'
        ]);
        DB::table('weapons')->insert( [
            'name' => 'Espada longa',
            'image' => 'espada-longa.png',
            'force_min' => '4',
            'force_max' => '6',
            'dexterity_min' => '1',
            'dexterity_max' => '1',
            'magic_min' => '0',
            'magic_max' => '0',
            'limitation' => 'Força >= 5'
        ]);
        DB::table('weapons')->insert([
            'name' => 'Duas espadas',
            'image' => 'duas-espada.png',
            'force_min' => '1',
            'force_max' => '3',
            'dexterity_min' => '4',
            'dexterity_max' => '6',
            'magic_min' => '0',
            'magic_max' => '0',
            'limitation' => 'Destreza >= 5'
        ]);
        DB::table('weapons')->insert([
            'name' => 'Arco curto',
            'image' => 'arco-curto.png',
            'force_min' => '1',
            'force_max' => '3',
            'dexterity_min' => '3',
            'dexterity_max' => '4',
            'magic_min' => '0',
            'magic_max' => '0',
            'limitation' => 'Destreza >= 4'
        ]);
        DB::table('weapons')->insert( [
            'name' => 'Arco longo',
            'image' => 'arco-longo.png',
            'force_min' => '3',
            'force_max' => '5',
            'dexterity_min' => '5',
            'dexterity_max' => '7',
            'magic_min' => '0',
            'magic_max' => '0',
            'limitation' => 'Destreza >= 7'
        ]);
        DB::table('weapons')->insert([
            'name' => 'Machados',
            'image' => 'machado.png',
            'force_min' => '4',
            'force_max' => '6',
            'dexterity_min' => '1',
            'dexterity_max' => '3',
            'magic_min' => '0',
            'magic_max' => '0',
            'limitation' => 'Força >= 5'
        ]);
        DB::table('weapons')->insert([
            'name' => 'Machado duplo',
            'image' => 'machado-duplo.png',
            'force_min' => '6',
            'force_max' => '8',
            'dexterity_min' => '0',
            'dexterity_max' => '2',
            'magic_min' => '0',
            'magic_max' => '0',
            'limitation' => 'Força >= 8'
        ]);
        DB::table('weapons')->insert([
            'name' => 'Cajado',
            'image' => 'cajado.png',
            'force_min' => '1',
            'force_max' => '1',
            'dexterity_min' => '0',
            'dexterity_max' => '0',
            'magic_min' => '8',
            'magic_max' => '10',
            'limitation' => 'Magia >= 10'
        ]);
        DB::table('weapons')->insert([
            'name' => 'Um Anel',
            'image' => 'um-anel.png',
            'force_min' => '100',
            'force_max' => '100',
            'dexterity_min' => '100',
            'dexterity_max' => '100',
            'magic_min' => '100',
            'magic_max' => '100',
            'limitation' => 'Somente o Frodo'
        ]);
        DB::table('weapons')->insert([
            'name' => 'Chamar Arwen',
            'image' => 'arwen.png',
            'force_min' => '0',
            'force_max' => '0',
            'dexterity_min' => '0',
            'dexterity_max' => '0',
            'magic_min' => '50',
            'magic_max' => '50',
            'limitation' => 'Somente o Aragorn'
        ]);

    }
}
