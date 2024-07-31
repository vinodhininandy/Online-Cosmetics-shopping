<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return redirect()->route('customer.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.products.create');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
// Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
// Route::get('/customers/{customer_id}/edit', [CustomerController::class, 'edit']);
// Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('/customers/{customer}/print', [CustomerController::class, 'print'])->name('customers.print');
Route::post('/submit-phone', [PhoneNumberController::class, 'store'])->name('submit.phone');
// Route::post('/customers/{id}', 'CustomerController@update')->name('customers.update');
// Route::put('/customers/update',[CustomerController::class,'update']);

Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::post('/updateCustomer', [CustomerController::class, 'update'])->name('customers.update');
Route::post('/updateImage/{id}', 'CustomerController@updateImage');

// Product Routes
    // Product Routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/user/products', [ProductController::class, 'index'])->name('user.products.index');
    });
    
    
    
    
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
     
    
        // Define other admin routes here
    });
    
    
    Route::post('/products', [ProductAdminController::class, 'store'])->name('admin.products.store');
    
    Route::get('admin/products/create', [ProductAdminController::class, 'create'])->name('admin.products.create');
    Route::get('admin/products/index', [ProductAdminController::class, 'index'])->name('admin.products.index');
    Route::get('admin/products/edit', [ProductAdminController::class, 'edit'])->name('admin.products.edit');
    Route::put('admin/products/{products}', [ProductAdminController::class, 'update'])->name('admin.products.update');
    Route::delete('admin/products/destroy', [ProductAdminController::class, 'destroy'])->name('admin.products.destroy');
    
    
    
    
    Route::get('/cart', [CartController::class, 'index'])->name('user.cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('user.cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('user.cart.remove');
    
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('user.cart.update');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('user.cart.remove');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('user.checkout');
    Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/submit-payment', [PaymentController::class, 'submitPayment'])->name('payment.submit');
    Route::get('/payment/success', [PaymentController::class, 'showSuccessPage'])->name('payment.success');
    
    // Route to handle payment submission
   
Route::post('/payment/submit', [PaymentController::class, 'submitPayment'])->name('payment.submit');
    Route::get('/order/success', [OrderController::class, 'success'])->name('user.order.success');
    
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('products', ProductAdminController::class);
    });
   

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/admin', function () {
    return view('admin');
    Route::get('/admin/register', 'AdminController@register')->name('admin.register');

})->name('user');
Route::get('/user', function () {
    return view('user');
    Route::get('/user/register', 'UserController@register')->name('user.register');

})->name('user');

Route::get('/user', function () {
    return view('user');
})->name('user');

Route::get('/admin/register', [AdminController::class, 'showRegistrationForm'])->name('admin.register');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

//Route::get('/user/register', [UserController::class, 'showRegistrationForm'])->name('user.register');
//Route::get('/user/login', [UserController::class, 'showLoginForm'])->name('user.login');



// User Registration Routes
Route::get('/user/register', [UserController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/user/register', [UserController::class, 'register'])->name('user.register.submit');

// User Login Routes
Route::get('/user/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login.submit');



// Route to handle form submission


// Route to display the form


Route::get('/employees/create', function () {
    return view('employees.create');
})->name('employees.create');

// Route to handle the form submission and store the employee details
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

// Route to display the list of all employees
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

// Route to display a single employee's details
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');

// Routes that require authentication
Route::middleware('auth')->group(function () {
    // Route to display the authenticated user's employee details
    Route::get('/employee/details', [EmployeeController::class, 'showEmployeeDetails'])->name('employee.details');
});
Route::get('user/products/{id}', [ProductController::class, 'show'])->name('user.products.show');

// User Products Page
Route::middleware(['auth'])->group(function () {
    Route::get('/user/products/index', [UserController::class, 'showProducts'])->name('user.products');
});
Route::get('/checkout', [EmployeeController::class, 'showCheckout'])->name('checkout');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
