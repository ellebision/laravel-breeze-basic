<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; # 편리한 POST 값 유효성 검사 관련


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

# 페이지 이동 - 글쓰기
Route::get('/articles/create', function () {
    return view('/articles/create');
});

# 포스트 - 글쓰기
# CSRF 기능 때문에 그냥 post로 보내면 보안기능때문에 419 에러뜸 (중간에 공격자(해커)가 불특정 사용자의 정보를 갈취하거나 삽입하여 악용 -라라벨에서 POST, PUT, PATCH, DELETE 등의 요청에 방어기능을 작동시킴)
# 라라벨은 매 세션마다 이 CSRF 토큰을 생성하고 검증한다. 
Route::post('/articles', function (Request $request) {
    // 문자열이 비어있지 않고, 문자열, 10자 이내
    $request->validate([
        'input_1' => [
                                    'required',     # 비어있지 않아야 함
                                    'string',           # 문자열이어야함
                                    'max:9'             # 10자 이내
                                ],
    ]);
/* 
    $input_1 = $_POST ['input_1'];
    if (!$input_1){
        return redirect()->back();
    }
    if (!is_string($input_1)){
        return redirect()->back();
    }
    if(strlen($input_1) > 10){
        return redirect()->back();
    }
     */
    return '안녕';
});


