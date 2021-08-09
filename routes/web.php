<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});


//  Auth::routes();
Auth::routes( ['register' => false] ); // to stop register


Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'namespace' => 'Admin' , 'middleware' => ['auth']  ] , function () {

    // Invoices
    Route::resource('Invoices', 'invoices\InvoicesController');
    Route::get('Invoice_Paid','invoices\InvoicesController@Invoice_Paid');
    Route::get('Invoice_UnPaid','invoices\InvoicesController@Invoice_UnPaid');
    Route::get('Invoice_Partial','invoices\InvoicesController@Invoice_Partial');
    // export excel
    Route::get('Invoices-Eport', 'invoices\InvoicesController@export');
    // Invoice
    Route::resource('Invoice', 'invoices\InvoiceController');
    Route::get('/InvoicesDetails/{id}', 'invoices\InvoiceController@show');
    Route::get('View_file/{invoice_number}/{file_name}', 'invoices\InvoiceController@open_file');
    Route::get('download/{invoice_number}/{file_name}', 'invoices\InvoiceController@get_file');
    Route::get('/edit_invoice/{id}', 'invoices\InvoiceController@edit');
    Route::get('/Status_show/{id}', 'invoices\InvoiceController@Status')->name('Status_show');
    Route::post('/Status_Update/{id}', 'invoices\InvoiceController@Status_Update')->name('Status_Update');
    Route::get('Print_invoice/{id}','invoices\InvoiceController@Print_invoice');
    // Archive
    Route::resource('Archive_Invoice', 'invoices\invoicesArchiveController');

    // add attachement
    Route::resource('InvoiceAttachments', 'attachement\attachmentController');
    Route::post('delete_file', 'attachement\attachmentController@destroy')->name('delete_file');

    // use ajax
    Route::get('/section/{id}', 'invoices\InvoiceController@getproducts');

    // sections
    Route::resource('Sections', 'sections\SectionsController');
    Route::resource('Section',  'sections\SectionController');

    // prodcuts
    Route::resource('Prodcuts', 'prodcuts\ProdcutsController');
    Route::resource('Prodcut',  'prodcuts\ProdcutController');

    // rules and permision
    Route::resource('Roles','roles\RoleController');
    Route::resource('Users','users\UserController');

    // reports_invoices
    Route::get('Reports', 'reports\ReportInvoicesController@index');
    Route::post('Search_invoices', 'reports\ReportInvoicesController@Search_invoices');
    // reports_customers
    Route::get('customers_report', 'reports\CustomersReportController@index')->name("customers_report");
    Route::post('Search_customers', 'reports\CustomersReportController@Search_customers');

    // read otifactions
    Route::get('MarkAsRead_all','invoices\InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');


    // Dashbord           Must Should Be Last
    Route::get('/{page}', 'admin\AdminContrller@index');
});
