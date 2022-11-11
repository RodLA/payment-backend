<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $query = "
        CREATE VIEW list_client AS
        SELECT users.first_name, users.last_name, users.dob, users.phone,
        users.email, users.address, COUNT(payments.user_id) as number_payments,
        SUM(payments.amount) as total_payments
        FROM users
        INNER JOIN payments
        ON users.id = payments.user_id
        GROUP BY users.id, users.first_name, users.last_name, users.dob,
        users.phone, users.email,users.address
        ORDER BY total_payments DESC;
        ";
        DB::unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $query = "DROP VIEW IF EXISTS list_client";
        DB::unprepared($query);
    }
};
