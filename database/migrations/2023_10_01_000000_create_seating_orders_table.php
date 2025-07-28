<?
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatingOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('seating_orders', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('reg_number');
            $table->string('seating_number');
            $table->string('room_number');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seating_orders');
    }
}