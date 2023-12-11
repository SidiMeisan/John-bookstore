<?php

namespace Database\Seeders;

use App\Models\Rating;
use App\Models\Book;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Set jumlah data yang ingin dibuat pada setiap eksekusi
        $batchSize = 1000;

        // Hitung jumlah batch yang diperlukan
        $totalData = 500000;
        $totalBatches = ceil($totalData / $batchSize);

        // Informasikan tentang proses
        $this->command->info("Creating ratings");
        $this->command->info('Seeding started...');
        
        // Inisialisasi progress bar
        $output = new ConsoleOutput();
        $progressBar = new ProgressBar($output, $totalBatches);

        // Start progress bar
        $progressBar->start();

        // Loop untuk membuat data secara bertahap
        for ($i = 0; $i < $totalBatches; $i++) {
            // Dapatkan ID buku acak untuk batch saat ini
            $randomIdsArray = Book::select('id')->inRandomOrder()->pluck('id')->take(1000)->toArray();

            // Gunakan metode factory dengan data acak yang sudah dipilih
            foreach ($randomIdsArray as $randomId) {
                Rating::factory()->create([
                    'book_id' => $randomId,
                ]);
            }
            
            // Majukan progress bar        
            $progressBar->advance();
        }
        // Selesaikan progress bar
        $progressBar->finish();
        $this->command->info("\nSeeding completed!");
    }
}
