<?php
/**
 * User: User
 * Date: 29/10/2014
 * Time: 10:36
 */

class TestSeeder extends Seeder{


    public function run(){
        LinksTable::truncate();

        $domainData = [
            'Archaea',
            'Bacteria',
            'Eukaryota'
        ];
        {{ $i = 1;}}
        foreach($domainData as $domain){

            LinksTable::create([
                'name' => $domain,
                'taxonomic_rank' => 1
            ]);
            $i++;

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
        $j = 1;
        foreach($kingdomData as $kingdom){
            LinksTable::create([
                'name' => $kingdom,
                'taxonomic_rank' => 2,
                'parent_id' => 3
            ]);
            $j++;
        }
    }
}