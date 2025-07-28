<?namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeatingOrder;

class SeatingOrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string',
            'reg_number' => 'required|string',
            'seating_number' => 'required|string',
            'room_number' => 'required|string',
        ]);

        SeatingOrder::create($validated);

        return response()->json(['message' => 'Seating order saved successfully.'], 201);
    }
}