<?php

use App\Livewire\Candidate\Index as CandidateIndex;
use App\Livewire\Candidate\Form as CandidateForm;
use App\Livewire\Candidate\Detail as CandidateDetail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// })->name('index');
Route::get('/', CandidateIndex::class)->name('index');
Route::get('/create', CandidateForm::class)->name('create');
Route::get('/edit/{id}', CandidateForm::class)->name('edit');
Route::get('/{id}/detail', CandidateDetail::class)->name('detail');
