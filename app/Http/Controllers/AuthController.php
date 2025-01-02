<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    // Для POST запроса login
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));
    }

    public function register(Request $request): RedirectResponse
    {

        // Rules\Password::defaults()
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed'],
        ], [
            'name.required' => 'Поле имя обязательно для заполнения',
            'email.required' => 'Поле email обязательно для заполнения',
            'email.email' => 'Некорректный формат email',
            'email.unique' => 'Такой email уже зарегистрирован',
            'password.required' => 'Поле пароль обязательно для заполнения',
            'password.confirmed' => 'Пароли не совпадают'
        ]);

        $validator->validate();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }


    // Для POST запроса logout
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // указываем нужный маршрут
    }


    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();

        // Получаем только валидированные данные
        $validated = $request->validated();

        // Убираем password из массива если он пустой
        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        // Обновляем основные данные
        $user->fill($validated);

        // Хэшируем пароль только если он был передан
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return Redirect::route('profile')
            ->with('message', 'Профиль успешно обновлен');
    }
}
