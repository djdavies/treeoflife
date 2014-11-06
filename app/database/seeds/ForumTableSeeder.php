<?php


	class ForumTableSeeder extends Seeder {

		public function run(){
			ForumTopic::create(
				[
					'title' => 'General Discussion',
					'author_id' => 1
				]);

			ForumCategory::create(
				[
					'title' => 'Site Suggestions',
					'author_id' => 1,
					'topic_id' => 1
				]);

			ForumCategory::create(
				[
					'title' => 'Bugs',
					'author_id' => 1,
					'topic_id' => 1
				]);
		}
	}