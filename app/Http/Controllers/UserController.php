<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::search(request: $request);

        $n = $request->get('list', 10);

        $list = $query->paginate($n);

        $data = [
            'list' => $list,
        ];

        return view('pages.user.index', $data);
    }

    public function create(Request $request)
    {
        $user = new User;

        return $this->form($user);
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function show(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = [
            'user' => $user,
        ];

        return view('pages.user.show-user', $data);
    }

    public function edit(Request $request, $id)
    {

        $user = User::findOrFail($id);

        return $this->form($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->fill($data);

        $user->save();

        return redirect()->route(route: 'users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        User::destroy($id);

        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
    }

    /**
     * Visualizar a view de formulário
     *
     * @return \Illuminate\Contracts\View\View
     */
    private function form(User $user)
    {
        $data = [
            'user' => $user,
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
