<?php

class HSapianTreeTableSeeder extends Seeder{

	public function run(){
		/*
		
		
		$treeOfLife = [
			'hominids' => [
				'homos' => [
					'erectus',
					'sapien'
				]
			]
		];

		foreach ($treeOfLife as $familyName => $familyGenus) {
			// create the fam
			$fam = Family::create(['name' => $familyName]);
			foreach($familyGenus as $genusName => $genusSpecies) {
				$genus = $fam->genus()->create(['name' => $genusName]);
				foreach ($genusSpecies as $species) {
					$genus->species()->create(['name' => $species]);
				}
			}
		} 
		*/
			
		Domain::truncate();
		Kingdom::truncate();
		SubKingdom::truncate();
		Superphylum::truncate();
		Phylum::truncate();
		Subphylum::truncate();
		Infraphylum::truncate();
		Superclass::truncate();
		Classes::truncate();
		Superlegion::truncate();
		Legion::truncate();
		Sublegion::truncate();
		Infralegion::truncate();
		Subclass::truncate();
		Infraclass::truncate();
		Subcohort::truncate();
		Magnorder::truncate();
		Superorder::truncate();
		Grandorder::truncate();
		Mirorder::truncate();
		Order::truncate();
		Suborder::truncate();
		Infraorder::truncate();
		Parvorder::truncate();
		Superfamily::truncate();
		Family::truncate();
		Tribe::truncate();
		Subtribe::truncate();
		

		$dom = Domain::create(['name' => 'Eukaryota']);
		$king = $dom->kingdoms()->create(['name' => 'Animalia']);
		$subki = $king->subkingdom()->create(['name' => 'Eumetazoa']);
		$superph = $subki->superphylum()->create(['name' => 'Deuterostomia']);
		$phyl = $superph->phylum()->create(['name' => 'Chordata']);
		$subph = $phyl->subphylum()->create(['name' => 'Vertebrata']);
		$infrap = $subph->infraphylum()->create(['name' => 'Gnathostomata']);
		$supcla = $infrap->superclass()->create(['name' => 'Tetrapoda']);
		$cla = $supcla->classes()->create(['name' => 'Mammalia']);
		$supl = $cla->superlegion()->create(['name' => 'Trechnotheria']);
		$legi = $supl->legion()->create(['name' => 'Cladotheria']);
		$subl = $legi->sublegion()->create(['name' => 'Zatheria']);
		$infral = $subl->infralegion()->create(['name' => 'Tribosphenida']);
		$subcla = $infral->subclass()->create(['name' => 'Theria']);
		$infracl = $subcla->infraclass()->create(['name' => 'Placentalia']);
		$subco = $infracl->subcohort()->create(['name' => 'Exafroplacentalia']);
		$magno = $subco->magnorder()->create(['name' => 'Boreoeutheria']);
		$supero = $magno->superorder()->create(['name' => 'Euarchontoglires']);
		$grando = $supero->grandorder()->create(['name' => 'Euarchonta']);
		$miro = $grando->mirorder()->create(['name' => 'Primatomorpha']);
		$ord = $miro->order()->create(['name' => 'Primates']);
		$subor = $ord->suborder()->create(['name' => 'Haplorrhini']);
		$infrao = $subor->infraorder()->create(['name' => 'Simiiformes']);
		$parv = $infrao->parvorder()->create(['name' => 'Catarrhini']);
		$supfam = $parv->superfamily()->create(['name' => 'Hominoidea']);
		$fam = $supfam->family()->create(['name' => 'Hominidae']);
		$subfam = $fam->subfamily()->create(['name' => 'Homininae']);
		$tri = $subfam->tribe()->create(['name' => 'Hominini']);
		$subtri = $tri->subtribe()->create(['name' => 'hominina']);
		$gen1 = $subtri->genus()->create(['name' => 'Homo']);
		$gen1->species()->create([
			'name' => 'H. Sapien',
			'common_name' => 'Human',
			'lived_from' => '200000',
			'lived_to' => '0',
			'lived_where' => 'World Wide',
			'adult_height' => '2.7203',
			'adult_mass' => '635',
			'cranial_mass' => '1498.5'
		]);

	}
}