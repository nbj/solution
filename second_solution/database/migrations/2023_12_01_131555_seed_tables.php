<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Seed Categories
        \App\Models\Category::createOrFirst(['title' => 'Konferencer'], [
            'title' => 'Konferencer',
        ]);

        \App\Models\Category::createOrFirst(['title' => 'Fyraftensmøder'], [
            'title' => 'Fyraftensmøder',
        ]);

        \App\Models\Category::createOrFirst(['title' => 'Webinarer'], [
            'title' => 'Webinarer',
        ]);

        // Seed Events
        \App\Models\Event::firstOrCreate(['id' => 1], [
            'category_id' => \App\Models\Category::where('title', 'Konferencer')->firstOrFail()->id,
            'title' => 'Årsmøde i turistforeningen',
            'start_date' => '2021-10-20 10:00:00',
        ]);

        \App\Models\Event::firstOrCreate(['id' => 2], [
            'category_id' => \App\Models\Category::where('title', 'Fyraftensmøder')->firstOrFail()->id,
            'title' => 'Den gode velkomst',
            'start_date' => '2021-09-19 10:00:00',
        ]);

        \App\Models\Event::firstOrCreate(['id' => 3], [
            'category_id' => \App\Models\Category::where('title', 'Konferencer')->firstOrFail()->id,
            'title' => 'Møder i en post-corona verden',
            'start_date' => '2021-11-01 10:00:00',
        ]);

        \App\Models\Event::firstOrCreate(['id' => 4], [
            'category_id' => \App\Models\Category::where('title', 'Webinarer')->firstOrFail()->id,
            'title' => 'Effektivitetsworkshop',
            'start_date' => '2021-11-01 10:00:00',
        ]);

        \App\Models\Event::firstOrCreate(['id' => 5], [
            'category_id' => \App\Models\Category::where('title', 'Fyraftensmøder')->firstOrFail()->id,
            'title' => 'Boost din bundlinje',
            'start_date' => '2021-12-02 10:00:00',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
