    <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function showUsers(){
        $users = User::paginate(10);
        return view('admin.users-managerment', ['users'=> $users]);
    }
}
