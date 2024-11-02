<?php

namespace Database\Seeders;

use App\Models\Indicator;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectIndicatorSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$subjects = [
			'Ekonomi' => ['Kemiskinan', 'Pengangguran'],
			'Pendidikan' => ['Tingkat Literasi', 'Partisipasi Sekolah'],
			'Kesehatan' => ['Angka Harapan Hidup', 'Gizi Buruk'],
			'Lingkungan' => ['Polusi Udara', 'Pengelolaan Limbah'],
			'Teknologi' => ['Akses Internet', 'Inovasi Teknologi'],
		];

		foreach ($subjects as $subjectName => $indicators) {
			$subject = Subject::create([
				'name' => $subjectName,
			]);

			foreach ($indicators as $indicatorName) {
				Indicator::create([
					'name' => $indicatorName,
					'subject_id' => $subject->id,
				]);
			}
		}
	}
}
