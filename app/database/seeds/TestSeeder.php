<?php
/**
 * User: User
 * Date: 29/10/2014
 * Time: 10:36
 */

class TestSeeder extends Seeder{

    public function run(){

        Taxon::create([
            'name' => 'LUCA',
            'taxa_name' => 1
        ]);

        $domainData = [
            'Archaea',
            'Eubacteria',
            'Eukaryota'
        ];
        foreach($domainData as $domain){

            Taxon::create([
                'name' => $domain,
                'taxa_name' => 2,
                'parent_id' => 1
            ]);

        }

        $kingdomData = [
            'Amoebozoa',
            'Archaeplastida',
            'Chromalveolata',
            'Rhizaria',
            'Excavata',
            'Fungi',
            'Animalia'
        ];

        foreach($kingdomData as $kingdom){
            Taxon::create([
                'name' => $kingdom,
                'taxa_name' => 3,
                'parent_id' => 4
            ]);
        }

        Taxon::create([
            'name' => 'Eumetazoa',
            'taxa_name' => 4,
            'parent_id' => 11
        ]);

        Taxon::create([
            'name' => 'Deuterostomia',
            'taxa_name' => 5,
            'parent_id' => 12
        ]);

        Taxon::create([
            'name' => "Chordata",
            'taxa_name' => 6,
            'parent_id' => 13
        ]);

        Taxon::create([
            'name' => 'Vertebrata',
            'taxa_name' => 7,
            'parent_id' => 14
        ]);

        Taxon::create([
            'name' => 'Gnathostomata',
            'taxa_name' => 8,
            'parent_id' => 15
        ]);

        Taxon::create([
            'name' => 'Tetrapoda',
            'taxa_name' => 9,
            'parent_id' => 16
        ]);

        Taxon::create([
            'name' => 'Mammalia',
            'taxa_name' => 10,
            'parent_id' => 17
        ]);

        Taxon::create([
            'name' => 'Trechnotheria',
            'taxa_name' => 11,
            'parent_id' => 18
        ]);

        Taxon::create([
            'name' => 'Cladotheria',
            'taxa_name' => 12,
            'parent_id' => 19
        ]);

        Taxon::create([
            'name' => 'Zatheria',
            'taxa_name' => 13,
            'parent_id' => 20
        ]);

        Taxon::create([
            'name' => 'Tribosphenida',
            'taxa_name' => 14,
            'parent_id' => 21
        ]);

        Taxon::create([
            'name' => 'Theria',
            'taxa_name' => 15,
            'parent_id' => 22
        ]);

        Taxon::create([
            'name' => 'Placentalia',
            'taxa_name' => 16,
            'parent_id' => 23
        ]);

        Taxon::create([
            'name' => 'Exafroplacentalia',
            'taxa_name' => 17,
            'parent_id' => 24
        ]);

        Taxon::create([
            'name' => 'Boreoeutheria',
            'taxa_name' => 18,
            'parent_id' => 25
        ]);

        Taxon::create([
            'name' => 'Euarchontoglires',
            'taxa_name' => 19,
            'parent_id' => 26
        ]);

        Taxon::create([
            'name' => 'Euarchonta',
            'taxa_name' => 20,
            'parent_id' => 27
        ]);

        Taxon::create([
            'name' => 'Primatomorpha',
            'taxa_name' => 21,
            'parent_id' => 28
        ]);

        Taxon::create([
            'name' => 'Primates',
            'taxa_name' => 22,
            'parent_id' => 29
        ]);

        Taxon::create([
            'name' => 'Simiiformes',
            'taxa_name' => 23,
            'parent_id' => 30
        ]);

        Taxon::create([
            'name' => 'Catarrhini',
            'taxa_name' => 24,
            'parent_id' => 31
        ]);

        Taxon::create([
            'name' => 'Hominoidea',
            'taxa_name' => 25,
            'parent_id' => 32
        ]);

        Taxon::create([
            'name' => 'Hominidae',
            'taxa_name' => 26,
            'parent_id' => 33
        ]);

        Taxon::create([
            'name' => 'Homininae',
            'taxa_name' => 27,
            'parent_id' => 34
        ]);

        Taxon::create([
            'name' => 'Hominini',
            'taxa_name' => 28,
            'parent_id' => 35
        ]);

        Taxon::create([
            'name' => 'Hominina',
            'taxa_name' => 29,
            'parent_id' => 36
        ]);

        Taxon::create([
            'name' => 'Homo',
            'taxa_name' => 30,
            'parent_id' => 37
        ]);

        Taxon::create([
            'name' => 'H. Sapien',
            'taxa_name' => 31,
            'parent_id' => 38
        ]);
    }
}
