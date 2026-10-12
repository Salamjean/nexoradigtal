<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
 * Content editable from the admin panel (/admin): company information, the six service pages,
 * the projects, the team and the messages sent through the contact page forms.
 */
return new class extends Migration
{
    public function up(): void
    {
        // Key / value company information (phones, emails, address, texts...)
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->timestamps();
        });

        // The six service pages: fixed slugs (the Figma layout depends on them), editable texts and images
        Schema::create('service_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->string('tab_label');
            $table->string('card_title')->nullable();
            $table->string('overview_title');
            $table->text('overview_text');
            $table->string('overview_image');
            $table->string('name');
            $table->string('title');
            $table->text('para1');
            $table->text('para2')->nullable();
            $table->string('image');
            $table->json('gallery');
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('period');
            $table->string('client');
            $table->string('provider')->default('NEXORA DIGITAL SARL');
            $table->string('image');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('roles');
            $table->string('photo');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20);
            $table->string('name');
            $table->string('email');
            $table->string('phone', 40)->nullable();
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->string('skills', 500)->nullable();
            $table->string('experience', 50)->nullable();
            $table->string('cv_path')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('service_pages');
        Schema::dropIfExists('settings');
    }
};
