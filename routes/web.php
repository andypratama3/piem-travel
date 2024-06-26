<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\layouts\Blank;

use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\icons\MdiIcons;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\pages\AccountSettingsAccount;

use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\Access\RoleController;
use App\Http\Controllers\dashboard\Access\UserController;
use App\Http\Controllers\user_interface\TooltipsPopovers;



//Dashboard
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\dashboard\Access\PermissionsController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;

use App\Http\Controllers\dashboard\ProfileController as DashboardProfilController;
use App\Http\Controllers\dashboard\InvoiceController as DashboardInvoiceController;
//piem travel data
use App\Http\Controllers\dashboard\PiemTravel\ProductController as DashboardProductController;
use App\Http\Controllers\dashboard\PiemTravel\CategoryController as DashboardCategoryController;
use App\Http\Controllers\dashboard\PiemTravel\PassportController as DashboardPassportController;
//accesss
use App\Http\Controllers\dashboard\PiemTravel\SettingsController as DashboardSettingsController;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    Route::prefix('list')->group(function () {
        Route::resource('/product', DashboardProductController::class, ['names' => 'dashboard.list.product']);
        Route::get('datatable', [DashboardProductController::class, 'datatable'])->name('dashboard.list.product.datatable');
        Route::resource('kategori', DashboardCategoryController::class, ['names' => 'dashboard.list.kategori']);

    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [DashboardProfilController::class, 'index'])->name('dashboard.profile.index');
        Route::post('/profiles/photo/delete', [DashboardProfilController::class, 'deleteProfile'])->name('dashboard.profile.photo.delete');

        Route::resource('/settings', DashboardSettingsController::class, ['names' => 'dashboard.profile.settings']);
    });

    Route::prefix('access')->group(function () {
        Route::resource('roles', RoleController::class, [ 'names' => 'dashboard.access.roles']);
        Route::resource('permissions', PermissionsController::class, ['names' => 'dashboard.access.permissions']);
        Route::resource('users', UserController::class, ['names' => 'dashboard.access.users']);
    });

    Route::prefix('master-data')->group(function () {
        Route::resource('/passport', DashboardPassportController::class, ['names' => 'dashboard.piem-travel.passport']);
        Route::get('passports/datatable', [DashboardPassportController::class, 'dataTable'])->name('dashboard.piem-travel.passport.datatable');

    });

    //invoice
    Route::resource('/invoice', DashboardInvoiceController::class, ['names' => 'dashboard.invoice']);

});
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


// Main Page Route
Route::get('/', [LandingController::class, 'index'])->name('dashboard-analytics');


// User Authentication
// Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');




// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/icons-mdi', [MdiIcons::class, 'index'])->name('icons-mdi');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');
