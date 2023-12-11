<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Set jumlah data yang ingin dibuat pada setiap eksekusi
        $batchSize = 500;

        // Hitung jumlah batch yang diperlukan
        $totalData = 100000;
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
            // Dapatkan ID Penulis dan kategory acak untuk batch saat ini
            $randomAuthorIdsArray = Author::select('id')->inRandomOrder()->pluck('id')->take($batchSize)->toArray();
            $randomCategoryIdsArray = Category::select('id')->inRandomOrder()->pluck('id')->take($batchSize)->toArray();
            
            // Gunakan metode factory dengan data acak yang sudah dipilih
            foreach( $randomAuthorIdsArray as $index => $AuthorId ) {
                Book::factory()->create([
                    'author_id' => $AuthorId,
                    'category_id' => $randomCategoryIdsArray[$index]
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
