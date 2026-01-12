<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $query = User::search($request);

        $n = $request->get('limit', 10);

        $list = $query->paginate($n);

        $data = [
            'users' => $list
        ];

        return view('pages.user.index', $data);
    }

    public function create(Request $request)
    {

        $user = new User();

        return $this->form($user);
    }

    public function store(Request $request)
    {

    }

    public function show(Request $request, $id)
    {

    }

    public function edit(Request $request, $id)
    {

        $user = User::findOrFail($id);

        return $this->form($user);
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {

    }

    /**
     * Visualizar a view de formulário
     * @param User $user
     * @return \Illuminate\Contracts\View\View
     */
    private function form(User $user)
    {
        $data = [
            'user' => $user
        ];

        return view('pages.user.form', $data);
    }

    // public function index()
    // {
    //     $users = User::all();
    //     return response()->json($users, 200);
    // }

    // public function store(StoreUserRequest $request)
    // {
    //     $data = $request->validated();

    //     try {
    //         $user = new User();
    //         $user->fill($data);
    //         $user->password = bcrypt(123);
    //         $user->save();
    //         return response()->json($user,201);
    //     } catch (\Exception $e) {
    //         return response()->json(
    //             [
    //                 'message' => 'Falha ao inserir usuário!',
    //             ],
    //             400,
    //         );
    //     }
    // }
}
