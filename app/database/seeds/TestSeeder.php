<?php
/**
 * User: User
 * Date: 29/10/2014
 * Time: 10:36
 */

class TestSeeder extends Seeder{


    public function run(){
        LinksTable::truncate();

        LinksTable::create([
            'name' => 'LUCA',
            'taxonomic_rank' => 0
        ]);

        $domainData = [
            'Archaea',
            'Eubacteria',
            'Eukaryota'
        ];
        foreach($domainData as $domain){

            LinksTable::create([
                'name' => $domain,
                'taxonomic_rank' => 1,
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
            LinksTable::create([
                'name' => $kingdom,
                'taxonomic_rank' => 2,
                'parent_id' => 4
            ]);
        }

        LinksTable::create([
            'name' => 'Eumetazoa',
            'taxonomic_rank' => 3,
            'parent_id' => 11
        ]);

        LinksTable::create([
            'name' => 'Deuterostomia',
            'taxonomic_rank' => 4,
            'parent_id' => 12
        ]);

        LinksTable::create([
            'name' => "Chordata",
            'taxonomic_rank' => 5,
            'parent_id' => 13
        ]);

        LinksTable::create([
            'name' => 'Vertebrata',
            'taxonomic_rank' => 6,
            'parent_id' => 14
        ]);

        LinksTable::create([
            'name' => 'Gnathostomata',
            'taxonomic_rank' => 7,
            'parent_id' => 15
        ]);

        LinksTable::create([
            'name' => 'Tetrapoda',
            'taxonomic_rank' => 8,
            'parent_id' => 16
        ]);

        LinksTable::create([
            'name' => 'Mammalia',
            'taxonomic_rank' => 9,
            'parent_id' => 17
        ]);

        LinksTable::create([
            'name' => 'Trechnotheria',
            'taxonomic_rank' => 10,
            'parent_id' => 18
        ]);

        LinksTable::create([
            'name' => 'Cladotheria',
            'taxonomic_rank' => 11,
            'parent_id' => 19
        ]);

        LinksTable::create([
            'name' => 'Zatheria',
            'taxonomic_rank' => 12,
            'parent_id' => 20
        ]);

        LinksTable::create([
            'name' => 'Tribosphenida',
            'taxonomic_rank' => 13,
            'parent_id' => 21
        ]);

        LinksTable::create([
            'name' => 'Theria',
            'taxonomic_rank' => 14,
            'parent_id' => 22
        ]);

        LinksTable::create([
            'name' => 'Placentalia',
            'taxonomic_rank' => 15,
            'parent_id' => 23
        ]);

        LinksTable::create([
            'name' => 'Exafroplacentalia',
            'taxonomic_rank' => 16,
            'parent_id' => 24
        ]);

        LinksTable::create([
            'name' => 'Boreoeutheria',
            'taxonomic_rank' => 17,
            'parent_id' => 25
        ]);

        LinksTable::create([
            'name' => 'Euarchontoglires',
            'taxonomic_rank' => 18,
            'parent_id' => 26
        ]);

        LinksTable::create([
            'name' => 'Euarchonta',
            'taxonomic_rank' => 19,
            'parent_id' => 27
        ]);

        LinksTable::create([
            'name' => 'Primatomorpha',
            'taxonomic_rank' => 20,
            'parent_id' => 28
        ]);

        LinksTable::create([
            'name' => 'Primates',
            'taxonomic_rank' => 21,
            'parent_id' => 29
        ]);

        LinksTable::create([
            'name' => 'Simiiformes',
            'taxonomic_rank' => 22,
            'parent_id' => 30
        ]);

        LinksTable::create([
            'name' => 'Catarrhini',
            'taxonomic_rank' => 23,
            'parent_id' => 31
        ]);

        LinksTable::create([
            'name' => 'Hominoidea',
            'taxonomic_rank' => 24,
            'parent_id' => 32
        ]);

        LinksTable::create([
            'name' => 'Hominidae',
            'taxonomic_rank' => 25,
            'parent_id' => 33
        ]);

        LinksTable::create([
            'name' => 'Homininae',
            'taxonomic_rank' => 26,
            'parent_id' => 34
        ]);

        LinksTable::create([
            'name' => 'Hominini',
            'taxonomic_rank' => 27,
            'parent_id' => 35
        ]);

        LinksTable::create([
            'name' => 'Hominina',
            'taxonomic_rank' => 28,
            'parent_id' => 36
        ]);

        LinksTable::create([
            'name' => 'Homo',
            'taxonomic_rank' => 29,
            'parent_id' => 37
        ]);

        LinksTable::create([
            'name' => 'H. Sapien',
            'taxonomic_rank' => 30,
            'parent_id' => 38
        ]);
    }
}