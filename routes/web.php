<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;

//...folders
use App\Http\Controllers\Admin;
use App\Http\Controllers\Studio;
use App\Http\Controllers\Reporter;
use App\Http\Controllers\Streamer;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//flush cache
Route::get('/cache-clear', function () {
    Artisan::call('optimize:clear');
    return "Cache is cleared";
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return "Migrate";
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return "storage:link";
});







Route::get('/', function() {
    return redirect('/login');
})->name('home');

//home
//Route::get('/', [PagesController::class, 'home'])->name('home');


//------------------------------------------------------
//------------------------After Login-------------------
//------------------------------------------------------
Route::middleware(['auth', 'verified'])->group(function () {
	
	
	Route::post('/studio/contact-message', [ContactController::class, 'message'])->name('contact-message');

	Route::get('/user-view/{user}', [PagesController::class, 'userView'])->name('user.view');

	Route::get('/game/{game}/{slug}', [PagesController::class, 'gameView'])->name('game.view');

	Route::get('/publication/{publication}', [PagesController::class, 'publicationView'])->name('publication.view');

	Route::get('/news/{news}/{slug}', [Studio\NewsController::class, 'view'])->name('news.view');



	//files upload
	
	Route::post('/dropzone', [DropzoneController::class, 'index'])->name('dropzone');

	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

	//contact
	//...publication
	Route::prefix('contact')->group(function () {
		Route::controller(ContactController::class)->group(function () {
			Route::get('/', 'index')->name('contact.index');
			Route::get('/{user}', 'show')->name('contact.show');
			Route::post('/{user}/store', 'store')->name('contact.store');
		});
	});


	//user fav unfav
	Route::get('/favourite/user/{user}', [ContactController::class, 'favouriteAction'])->name('favourite.action');
	//game fav unfav
	Route::get('/favourite/game/{game}', [ContactController::class, 'favouriteGameAction'])->name('favourite.game.action');



	
	
	Route::prefix('profile')->group(function () {
		//profile
		Route::get('/', [ProfileController::class, 'index'])->name('profile');
		Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');

		//change-password
		Route::get('/change-password', [ProfileController::class, 'password'])->name('profile.password');
		Route::post('/change-password', [ProfileController::class, 'passwordUpdate'])->name('profile.password.update');
	});
	
	
    //admin
    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
		
        //...dashboard
        Route::get('/', [Admin\DashboardController::class, 'index'])->name('admin');
		
		//game tags
		Route::get('/game-tags', function () {
			$title = array(
				'title' => 'Game Tags',
				'active' => 'tags',
			);
			return view('admin.game-tags', compact('title'));
		})->name('admin.tags');
		
		
		//...publication
		Route::prefix('publication')->group(function () {
			Route::controller(Admin\PublicationController::class)->group(function () {
				Route::get('/', 'index')->name('admin.publication');
				Route::get('/create', 'create')->name('admin.publication.create');
				Route::post('/create/store', 'store')->name('admin.publication.store');
				Route::get('/{publication}/edit', 'edit')->name('admin.publication.edit');
				Route::patch('/{publication}/update', 'update')->name('admin.publication.update');
				Route::delete('/{publication}/destroy', 'destroy')->name('admin.publication.destroy');
			});
		});
		
		
		
		
	
	});
	
	//studio
    Route::group(['prefix' => 'studio', 'middleware' => ['role:studio']], function () {
		
        //...studio
        Route::get('/', [Studio\StudioController::class, 'index'])->name('studio');
        Route::post('/store', [Studio\StudioController::class, 'store'])->name('studio.store');
		
		//...games
		Route::prefix('games')->group(function () {
			Route::controller(Studio\GamesController::class)->group(function () {
				Route::get('/', 'index')->name('studio.games');
				Route::get('/create', 'create')->name('studio.games.create');
				Route::post('/create/store', 'store')->name('studio.games.store');
				Route::get('/{game}/edit', 'edit')->name('studio.games.edit');
				Route::get('/{game}/view', 'view')->name('studio.games.view');
				Route::patch('/{game}/update', 'update')->name('studio.games.update');
				Route::delete('/{game}/destroy', 'destroy')->name('studio.games.destroy');
			});
		});
		
		//...latest news
		Route::prefix('news')->group(function () {
			Route::controller(Studio\NewsController::class)->group(function () {
				Route::get('/', 'index')->name('studio.news');
				Route::get('/create', 'create')->name('studio.news.create');
				Route::post('/create/store', 'store')->name('studio.news.store');
				Route::get('/{news}/edit', 'edit')->name('studio.news.edit');
				Route::patch('/{news}/update', 'update')->name('studio.news.update');
				Route::delete('/{news}/destroy', 'destroy')->name('studio.news.destroy');
			});
		});
		
		
		//...listing
		Route::get('/listing', function () {
			$title = array(
				'title' => 'Listing',
				'active' => 'listing',
			);
			return view('studio.listing', compact('title'));
		})->name('studio.listing');
		
	
	});
	
	//reporter
    Route::group(['prefix' => 'reporter', 'middleware' => ['role:reporter']], function () {
		
        //...dashboard
        Route::get('/', [Reporter\ReporterController::class, 'index'])->name('reporter');
        Route::post('/store', [Reporter\ReporterController::class, 'store'])->name('reporter.store');
		
		
		//...listing
		Route::get('/listing', function () {
			$title = array(
				'title' => 'Listing',
				'active' => 'listing',
			);
			return view('reporter.listing', compact('title'));
		})->name('reporter.listing');
	
	});
	
	//streamer
    Route::group(['prefix' => 'streamer', 'middleware' => ['role:streamer']], function () {
		
        //...dashboard
        Route::get('/', [Streamer\StreamerController::class, 'index'])->name('streamer');
        Route::post('/store', [Streamer\StreamerController::class, 'store'])->name('streamer.store');
		
		
		//...listing
		Route::get('/listing', function () {
			$title = array(
				'title' => 'Listing',
				'active' => 'listing',
			);
			return view('streamer.listing', compact('title'));
		})->name('streamer.listing');
	});
	
	
 
});
