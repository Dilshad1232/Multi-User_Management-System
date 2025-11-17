namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Admin: get all notifications
    public function all()
    {
        $notifications = Notification::with('user')->latest()->get();

        return response()->json([
            'status' => true,
            'data' => $notifications
        ]);
    }

    // Admin: send notification
    public function store(Request $request)
    {
        $request->validate(['message'=>'required|string']);

        $userIds = \App\Models\User::pluck('id');
        foreach($userIds as $id) {
            Notification::create(['user_id'=>$id,'message'=>$request->message]);
        }

        return response()->json(['status'=>true,'message'=>'Notification sent successfully']);
    }
}
