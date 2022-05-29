<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\BedTypController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AddExpenseContorller;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomFeaturesController;
use App\Http\Controllers\HotelPaymentsController;
use App\Http\Controllers\CompanyDriverController;
use App\Http\Controllers\MultipleUploadController;
use App\Http\Controllers\VehicleDetailsController;
use App\Http\Controllers\AddExpenseTitleController;
use App\Http\Controllers\TransportationFeatureTitle;
use App\Http\Controllers\ControllerCountriesProvincesCities;
use App\Http\Controllers\TransportationFeatureTitleController;

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

//     Routes Using MainPageController and For Main Page

Route::get('/', [ MainPageController::class, 'loadMainPage' ])->name('LoadMainPage');
Route::get('/loadHotelPage', [ MainPageController::class, 'LoadHotelPage' ])->name('LoadHotelPage');

// Getting Countrie Wise Provinces and Province Wise Cities

Route::get('/get_provinces',[ControllerCountriesProvincesCities::class,'getProvinces']);
Route::get('/get_cities',[ControllerCountriesProvincesCities::class,'getCities']);
Route::get('/get_customer_cnic',[ControllerCountriesProvincesCities::class,'getCustomerCnic']);
Route::get('/loadHotelPage/filter/hotels',[MainPageController::class,'LoadFilterwiseHotels'])->name('filter.hotel.Details');
Route::get('/loadHotelPage/hotel/gallary/{id}',[MainPageController::class,'LoadHotelRoomsGallary'])->name('hotel.gallary');
Route::get('/loadHotelPage/filter/hotel/gallary/{id}',[MainPageController::class,'FilterHotelRoomsGallary'])->name('filter.hotel.gallary');

Auth::routes();

Route::get('/home', [ HomeController::class, 'index' ])->name('home');
Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

// Routes Using Authentication of Admin Must Be in this Route Group
Route::group([ 'middleware' => [ 'auth' ] ], function () {
    //        All Routes WIll be here
    Route::get('/Admin', [ AdminController::class, 'LoadAdmin' ])->name('adminPage');


    //    ClientController Routes
    Route::get('Admin/Client/add', [ ClientController::class, 'AddClient' ])->name('add.client');
    Route::get('Admin/Client/fillClientDetails/{id}', [ ClientController::class, 'FillClientDetails' ])->name('fill.client');
    Route::post('Admin/Client/editClientDetails/{id}', [ ClientController::class, 'EditClient' ])->name('edit.client');
    Route::get('Admin/Client/all', [ ClientController::class, 'AllClient' ])->name('all.client');
    Route::get('Admin/Client/Delete/{id}', [ ClientController::class, 'DeleteClient' ])->name('delete.client');
    Route::get('Admin/Client/active', [ ClientController::class, 'ActiveClient' ])->name('active.client');
    Route::post('/Admin/Client/store', [ ClientController::class, 'store' ])->name('client.store');
    Route::get('/Admin/Client/search/clients', [ ClientController::class, 'SearchEngine' ])->name('search.clients');

    // Hotel Controller Routes Will Be here
    Route::get('/Admin/Hotel/Add', [ HotelController::class, 'index' ])->name('add.hotel');
    Route::post('Admin/Hotel/Store', [ HotelController::class, 'store' ])->name('hotel.store');
    Route::post('Admin/Hotel/update/{id}', [ HotelController::class, 'update' ])->name('hotel.edit');
    Route::get('Admin/Hotel/details/{id}', [ HotelController::class, 'FillHotelDetails' ])->name('hotel.details');
    Route::get('Admin/Hotel/overall', [ HotelController::class, 'HotelDetails' ])->name('hotel.overall');
    Route::get('/Admin/Hotel/search', [ HotelController::class, 'SearchEngine' ])->name('search.hotel');


    //                            ReservationController Routes Will Be here

    Route::get('/Admin/Reservation/view', [ ReservationController::class, 'index' ])->name('reservation.view');
    Route::post('/Admin/Reservation/add', [ ReservationController::class, 'store' ])->name('reservation.add');
    Route::post('/Admin/Reservation/edit/{id}', [ ReservationController::class, 'update' ])->name('reservation.edit');
    Route::get('/Admin/Reservation/details/{id}/{room_id}/{client_id}', [ ReservationController::class, 'FillRerservationDetails' ])->name('reservation.details');
    Route::get('/Admin/Reservation/overall', [ ReservationController::class, 'AllReservations' ])->name('reservation.overall');
    Route::get('/Admin/Reservation/active', [ ReservationController::class, 'ActiveReservations' ])->name('reservation.active');
    Route::get('/Admin/Reservation/search', [ ReservationController::class, 'SearchEngine' ])->name('reservation.search');
    Route::get('/Admin/Reservation/customer/checkOut/', [ ReservationController::class, 'HotelCheckOutDetails' ])->name('reservation.checkout');
    Route::get('Admin/Reservation/customer/checkOut/{id}/{client_id}', [ ReservationController::class, 'FillCustomerCheckOutDetails' ])->name('reservation.checkout.add');
    Route::get('Admin/Reservation/customer/print/{id}/{client_id}', [ ReservationController::class, 'PrintCustomerCheckOutDetails' ])->name('reservation.checkout.print');

});


Route::group([ 'middleware' => [ 'auth' ] ], function () {

    // Employees Controller Routes Will be here
    Route::get('Admin/Employee/add', [ EmployeeController::class, 'AddEmployee' ])->name('add.employee');
    Route::get('Admin/Employee/fillClientDetails/{id}', [ EmployeeController::class, 'FillEmloyeeDetails' ])->name('fill.employee');
    Route::post('Admin/Employee/editClientDetails/{id}', [ EmployeeController::class, 'EditEmployee' ])->name('edit.employee');
    Route::get('Admin/Employee/all', [ EmployeeController::class, 'AllEmployee' ])->name('all.employee');
    Route::get('Admin/Employee/Delete/{id}', [ EmployeeController::class, 'DeleteEmployee' ])->name('delete.employee');
    Route::get('Admin/Employee/active', [ EmployeeController::class, 'ActiveEmployee' ])->name('active.employee');
    Route::post('Admin/Employee/store', [ EmployeeController::class, 'store' ])->name('employee.store');
    Route::get('/Admin/Client/search/employees', [ EmployeeController::class, 'SearchEngine' ])->name('search.employees');

    //                              Expense Route Will Be Here
    Route::get('Admin/ExpenseTitle/add', [ AddExpenseTitleController::class, 'ShowExpenseTitle' ])->name('add.title');
    Route::post('Admin/ExpenseTitle/store', [ AddExpenseTitleController::class, 'store' ])->name('store.title');
    Route::get('Admin/Expense/Show', [ AddExpenseContorller::class, 'ShowExpense' ])->name('show.expense');
    Route::post('Admin/Expense/Add', [ AddExpenseContorller::class, 'AddExpense' ])->name('store.expense');
    Route::get('Admin/Expense/editExpense/{id}', [ AddExpenseContorller::class, 'EditExpense' ])->name('edit.expenses');
    Route::get('Admin/Expense/all', [ AddExpenseContorller::class, 'ListAllExpenses' ])->name('list.expenses');
    Route::get('Admin/Expense/search', [ AddExpenseContorller::class, 'SearchEngine' ])->name('expenses.search');
    Route::post('Admin/Expense/update/{id}', [ AddExpenseContorller::class, 'expenseUpdate' ])->name('expense.update');
    Route::get('Admin/Expense/delete/{id}', [ AddExpenseContorller::class, 'DeleteExpense' ])->name('delete.expense');

});


Route::group([ 'middleware' => [ 'auth' ] ], function () {

    // Rooms Controller Routes Will be here
    Route::get('Admin/Rooms/view', [ RoomController::class, 'index' ])->name('room.view');
    Route::get('Admin/Rooms/OverAllRooms', [ RoomController::class, 'AllRooms' ])->name('room.overall');
    Route::post('Admin/Rooms/add', [ RoomController::class, 'store' ])->name('room.add');
    Route::post('Admin/Rooms/edit/{id}', [ RoomController::class, 'update' ])->name('room.edit');
    Route::get('Admin/Rooms/details/{id}', [ RoomController::class, 'FillRoomDetails' ])->name('room.details');
    Route::get('/Admin/Rooms/search/rooms', [ RoomController::class, 'SearchEngine' ])->name('search.rooms');
    Route::get('/Admin/Rooms/active', [ RoomController::class, 'ActiveRooms' ])->name('room.active');
    Route::get('/Admin/Rooms/inActive', [ RoomController::class, 'InActiveRooms' ])->name('room.inActive');


    //    Route::get('/photos','App\Http\Controllers\MultipleUploadController@view')->name('photos');
    //    Route::post('photos/store','App\Http\Controllers\MultipleUploadController@store')->name('photos/store');

    Route::get('/Admin/Rooms/features/View', [ RoomFeaturesController::class, 'RoomFeaturesView' ])->name('room.features.view');
    Route::post('/Admin/Rooms/features/add', [ RoomFeaturesController::class, 'store' ])->name('features.store');
    Route::post('/Admin/Rooms/features/update/{id}', [ RoomFeaturesController::class, 'update' ])->name('features.update');
    Route::get('/Admin/Rooms/features/delete/{id}', [ RoomFeaturesController::class, 'destory' ])->name('features.delete');
    Route::get('/Admin/Rooms/features/all', [ RoomFeaturesController::class, 'AllFeatures' ])->name('features.all');
    Route::get('/Admin/Rooms/features/edit/{id}', [ RoomFeaturesController::class, 'FillRoomFeaturesDetails' ])->name('features.edit');
    Route::get('/Admin/Rooms/features/search', [ RoomFeaturesController::class, 'SearchRoomsFeatures' ])->name('features.search');

});

Route::group([ 'middleware' => [ 'auth' ] ], function () {

    //            <============Transportation Routes Will Be Here!============>
    //            <============Transportation Compnay Routes Routes Will Be Here!============>


    Route::get('Admin/Transport/Company/view', [ CompanyDetailsController::class, 'CompanyDetail' ])->name('company.view');
    Route::post('Admin/Transport/Company/add', [ CompanyDetailsController::class, 'StoreCompanyDetail' ])->name('add_company.detail');
    Route::post('Admin/Transport/Company/edit/{id}', [ CompanyDetailsController::class, 'Update' ])->name('company.edit');
    Route::get('Admin/Transport/Company/overall', [ CompanyDetailsController::class, 'CompanyDetails' ])->name('company.details');
    Route::get('Admin/Transport/Company/details/{id}', [ CompanyDetailsController::class, 'FillCompanyDetails' ])->name('fillCompany.details');


    //            <============Transportation Drivers Routes Routes Will Be Here!============>
    Route::get('Admin/Transport/Drivers/view', [ CompanyDriverController::class, 'index' ])->name('view.drivers');
    Route::get('Admin/Transport/Drivers/all', [ CompanyDriverController::class, 'allDrivers' ])->name('list.drivers');
    Route::post('Admin/Transport/Drivers/add', [ CompanyDriverController::class, 'store' ])->name('add_driver.detail');
    Route::get('Admin/Transport/Driver/delete/{id}', [ CompanyDriverController::class, 'destroy' ])->name('delete.driver');
    Route::get('Admin/Transport/Driver/update/{id}', [ CompanyDriverController::class, 'edit' ])->name('driver.edit');
    Route::post('Admin/Transport/Driver/edit/{id}', [ CompanyDriverController::class, 'update' ])->name('update.driver.detail');

    //              <============Transportation Features Title Routes Routes Will Be Here!============>

    Route::get('Admin/Transport/Feature/view', [ TransportationFeatureTitleController::class, 'ShowTransportationFeturesTitle'])->name('transportationfeature.view');
    Route::post('Admin/Transport/Feature/store', [TransportationFeatureTitleController::class, 'Store'])->name('store.title');
    Route::get('Admin/Transport/Feature/all', [TransportationFeatureTitleController::class, 'show'])->name('show.title');
    Route::get('Admin/Transport/Feature/edit/{id}', [TransportationFeatureTitleController::class, 'editview'])->name('transportation.title.edit');
    Route::post('Admin/Transport/Feature/update/{id}',[TransportationFeatureTitleController::class,'updateTitle'])->name('update.features.title');
    Route::get('Admin/Transport/Feature/delete/{id}', [TransportationFeatureTitleController::class,'destroy'])->name('tansportationfeature.title.delete');



    // Vehicle Types Routes Will Be here
    Route::get('Admin/Transport/Vehicle/VehicleTitle/view',[ VehicleTypeController::class,'index'])->name('Display.add.vehicle.title.view');
    Route::post('Admin/Transport/Vehicle/VehicleTitle/store',[ VehicleTypeController::class,'store'])->name('vehicle.type.store');
    Route::get('Admin/Transport/Vehicle/VehileTitle/listTitles',[VehicleTypeController::class,'allVehicleTypes'])->name('list.vehicle.title.type');
    Route::get('Admin/Transport/Vehicle/VehileTitle/edit/{id}',[VehicleTypeController::class,'editVehicleType'])->name('vehicle.title.edit');
    Route::post('Admin/Transport/Vehicle/VehileTitle/update/{id}',[VehicleTypeController::class,'update'])->name('vehicle.type.update');
    Route::get('Admin/Transport/Vehicle/VehileTitle/destroy/{id}',[VehicleTypeController::class,'destroy'])->name('vehicle.type.delete');


    //                  <============Vehicle Details Routes Routes Will Be Here!============>

    Route::get('Admin/Transportation/VehicleDetails/view',[ VehicleDetailsController::class, 'VehicleDetailsView'])->name('vehicleDetail.view');
    Route::post('Admin/Transportation/VehicleDetails/store', [VehicleDetailsController::class, 'StoreVehicleDetails'])->name('store.vehicle.details');
    Route::get('Admin/Transportation/VehicleDetails/editview/{id}', [VehicleDetailsController::class, 'FillVehicleDetails'])->name('fill.vehicle.details');
    Route::post('Admin/Transportation/VehicleDetails/update/{id}', [VehicleDetailsController::class, 'Update'])->name('Update.Vehicle.details');
    Route::get('Admin/Transportation/VehicleDetails/delete/{id}', [VehicleDetailsController::class, 'Destroy'])->name('delete.Vehicle.details');
    Route::get('Admin/Transportation/VehicleDetails/details', [VehicleDetailsController::class, 'AllVehicleDetails'])->name('view.vehicle.details');


});


//SuperAdmin Routes Will Be Here

Route::group([ 'middleware' => [ 'auth' ] ], function () {

    // Room Reservation Payments Controller Routes Will be here
    Route::post('Admin/Hotel/payments/store/{id}/{client_id}', [ HotelPaymentsController::class, 'store' ])->name('hotel.payments.store');


});

//SuperAdmin Routes Will Be Here
Route::group([ 'middleware' => [ 'auth' ] ], function () {
    //        All Routes WIll be here
    Route::get('/SuperAdmin', [ SuperAdminController::class, 'LoadSuperAdmin' ])->name('SuperAdminPage');
    //Country Controller Routes
    Route::get('/SuperAdmin/Country/view', [ CountriesController::class, 'index' ])->name('country.view');
    Route::post('/SuperAdmin/Country/add', [ CountriesController::class, 'store' ])->name('country.add');
    Route::get('/SuperAdmin/Countries/Active', [ CountriesController::class, 'ActiveCountries' ])->name('country.list');

    // Province Controller Routes
    Route::get('/SuperAdmin/Province/view', [ ProvinceController::class, 'index' ])->name('province.view');
    Route::post('/SuperAdmin/Province/add', [ ProvinceController::class, 'store' ])->name('province.add');
    Route::get('/SuperAdmin/Province/all', [ ProvinceController::class, 'AllProvinces' ])->name('province.list');

    // Cities Controller Routes
    Route::get('/SuperAdmin/City/view', [ CityController::class, 'index' ])->name('city.view');
    Route::post('/SuperAdmin/City/add', [ CityController::class, 'store' ])->name('city.add');
    Route::get('/SuperAdmin/City/all', [ CityController::class, 'AllCities' ])->name('city.list');


    // Gender Controller Routes
    Route::get('/SuperAdmin/Gender/view', [ GenderController::class, 'index' ])->name('gender.view');
    Route::post('/SuperAdmin/Gender/add', [ GenderController::class, 'store' ])->name('gender.add');
    Route::get('/SuperAdmin/Gender/list', [ GenderController::class, 'AllGender' ])->name('gender.list');


    // Room type Controller Routes
    Route::get('/SuperAdmin/RoomType/view', [ RoomTypeController::class, 'index' ])->name('room_type.view');
    Route::post('/SuperAdmin/RoomType/add', [ RoomTypeController::class, 'store' ])->name('room_type.add');
    Route::get('/SuperAdmin/RoomType/list', [ RoomTypeController::class, 'show' ])->name('room_type.list');


    // Bed type Controller Routes
    Route::get('/SuperAdmin/BedType/view', [ BedTypController::class, 'index' ])->name('bed_type.view');
    Route::post('/SuperAdmin/BedType/add', [ BedTypController::class, 'store' ])->name('bed_type.add');
    Route::get('/SuperAdmin/BedType/list', [ BedTypController::class, 'show' ])->name('bed_type.list');


    // Features Title Controller Routes
    Route::get('/SuperAdmin/FeaturesTitle/view', [ RoomFeaturesController::class, 'FeaturesTitleView' ])->name('features.title.view');
    Route::post('/SuperAdmin/FeaturesTitle/add', [ RoomFeaturesController::class, 'storeFeatureTitles' ])->name('feature.title.add');

    //    Route::get('/testing',[RoomController::class, 'callPhotoController'])->name('photos');
});

