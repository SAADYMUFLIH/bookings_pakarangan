<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER after_room_insert
            AFTER INSERT ON rooms
            FOR EACH ROW
            BEGIN
                INSERT INTO housekeeping_tasks (room_id,status, created_at, updated_at)
                VALUES (NEW.id,"dirty", NOW(), NOW());
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       // Hapus trigger jika perlu
       DB::unprepared('DROP TRIGGER IF EXISTS after_room_insert');
    }
};
