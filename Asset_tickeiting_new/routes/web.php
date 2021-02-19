<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('create_ticket_public', function () {
    return view('create_ticket_public');
});

    Route::get('view_ticket_public', function () {
        return view('view_ticket_public');
    });
    
        Route::get('ticket_result', function () {
            return view('ticket_result');
        });
        
        
            Route::get('segment_mgmt', function () {
                return view('segment_mgmt');
            });
                // region_mgmt
                Route::get('company_name_mgmt', function () {
                    return view('company_name_mgmt');
                });
                    
                    Route::get('region_mgmt', function () {
                        return view('region_mgmt');
                    });
                        
                        Route::get('location_mgmt', function () {
                            return view('location_mgmt');
                        });
                            Route::get('issue_cat_mgmt', function () {
                                return view('issue_cat_mgmt');
                            });
                                Route::get('ticket_type_mgmt', function () {
                                    return view('ticket_type_mgmt');
                                });
                                
                                    Route::get('ticketreq_view', function () {
                                        return view('ticketreq_view');
                                    });
                                
                                        Route::get('ticket_full_detailview', function () {
                                            return view('ticket_full_detailview');
                                        });
                                        
                                            Route::get('ticket_full_view_colse', function () {
                                                return view('ticket_full_view_colse');
                                            });
                                            
                                                Route::get('ticketreq_comp_view', function () {
                                                    return view('ticketreq_comp_view');
                                                });
                                                
                                                    Route::get('user_mgmt', function () {
                                                        return view('user_mgmt');
                                                    });
                                                        Route::get('report', function () {
                                                            return view('report');
                                                        });
                                                        
                                                            Route::get('Asset_assign', function () {
                                                                //return view('welcome');
                                                                return view('Asset_assign');
                                                            });
                                            
                                                                Route::get('Asset', function () {
                                                                    //return view('welcome');
                                                                    return view('Asset');
                                                                });
                                                                
                                                                    Route::get('Component_Create', function () {
                                                                        //return view('welcome');
                                                                        return view('Component_Create');
                                                                    });
                                                                        
                                                                        Route::get('Create_Accessory', function () {
                                                                            //return view('welcome');
                                                                            return view('Create_Accessory');
                                                                        });
                                                                            
                                                                            
                                                                            Route::get('Create_Consumable', function () {
                                                                                //return view('welcome');
                                                                                return view('Create_Consumable');
                                                                            });
                                                                                
                                                                                Route::get('Create_License', function () {
                                                                                    //return view('welcome');
                                                                                    return view('Create_License');
                                                                                });
                                                                                    Route::get('Asset_assign', function () {
                                                                                        //return view('welcome');
                                                                                        return view('Asset_assign');
                                                                                    });
                                                                                    
                                                                                        Route::get('Admin-Invoice-Upload', function () {
                                                                                            //return view('welcome');
                                                                                            return view('Admin-Invoice-Upload');
                                                                                        });
                                                                                            
                                                                                            Route::get('Admin-Close-Invoice', function () {
                                                                                                //return view('welcome');
                                                                                                return view('Admin-Close-Invoice');
                                                                                            });
                                                                                                
                                                                                                Route::get('Admin-New-User', function () {
                                                                                                    //return view('welcome');
                                                                                                    return view('Admin-New-User');
                                                                                                });
                                                                                                    
                                                                                                    Route::get('Admin-User-Manage', function () {
                                                                                                        //return view('welcome');
                                                                                                        return view('Admin-User-Manage');
                                                                                                    });
                                                                                                        Route::get('Mail-ID-Upload', function () {
                                                                                                            //return view('welcome');
                                                                                                            return view('Mail-ID-Upload');
                                                                                                        });
                                                                                                            
                                                                                                            Route::get('Email-ID-Management', function () {
                                                                                                                //return view('welcome');
                                                                                                                return view('Email-ID-Management');
                                                                                                            });
                                                                                                            
                                                                                                                Route::get('user_list_all', function () {
                                                                                                                    //return view('welcome');
                                                                                                                    return view('user_list_all');
                                                                                                                });
                                                                                                                    
                                                                                                                    Route::get('Invoice-Status', function () {
                                                                                                                        //return view('welcome');
                                                                                                                        return view('Invoice-Status');
                                                                                                                        
                                                                                                                    });
                                                                                                                        
                                                                                                                        Route::get('Admin-Detailed', function () {
                                                                                                                            //return view('welcome');
                                                                                                                            return view('Admin-Detailed');
                                                                                                                            
                                                                                                                        });
                                                                                                                        
                                                                                                                            Route::get('Asset_assign_full_view', function () {
                                                                                                                                //return view('welcome');
                                                                                                                                return view('Asset_assign_full_view');
                                                                                                                                
                                                                                                                            });
                                                                                                                        
                                                                                                                            
                                                                                                                                Route::get('Asset_assign_update', function () {
                                                                                                                                    //return view('welcome');
                                                                                                                                    return view('Asset_assign_update');
                                                                                                                                });
    
	Route::get('query_builder', function () {
     //return view('welcome');
    return view('query_builder');
    });
	Route::get('query_builder','Controller@query_builder_par');
	
	Route::get('query_builder_report_view', function () {
    return view('query_builder_report_view');
    });
	
        
        Route::post('/crate_tic', 'Controller@crate_tic_pub');
        
        Route::post('/view_tic', 'Controller@view_ticket');

        
        Route::post('/insert_seg', 'Controller@segment_insert');
        Route::post('/insert_compname', 'Controller@company_insert');
        
        Route::post('/insert_reg', 'Controller@reg_insert');
        Route::post('/insert_loc', 'Controller@loc_insert');
        Route::post('/insert_issuecat', 'Controller@issuecat_insert');
        Route::post('/insert_ticket_type', 'Controller@ticket_type_insert');
        Route::get('company_del/{id}','Controller@comp_del');
        Route::get('segment_del/{id}','Controller@seg_del');
        
        Route::get('region_del/{id}','Controller@reg_del');
        Route::get('location_del/{id}','Controller@loc_del');
        Route::get('issuecat_del/{id}','Controller@iss_del');
        Route::get('tictype_del/{id}','Controller@ticty_del');
        
        
        Route::get('ticket_req/{id}','Controller@ticketreq');
        Route::get('ticket_full_view/{id}','Controller@ticket_fullview');
        Route::post('/upd_tic', 'Controller@upd_ticket');
        Route::get('ticket_full_view_colse_c/{id}','Controller@ticket_full_view_colse_contr');
        
        Route::post('/reopen_tic', 'Controller@reopen_ticket');
        
        Route::get('ticket_req_com/{id}','Controller@ticketreq_com');
        Route::post('/insert_user', 'Controller@user_insert');
        
        Route::get('user_del/{id}','Controller@usr_del');
        
            Route::post('/report_set', 'Controller@report_select');
        
            Route::post('/back-asset-assign-upload', 'Controller@asset_assing_upl');
            Route::post('/back-asset-upload', 'Controller@invoice_upload');
            Route::post('/back-component-upload', 'Controller@component_upload');
            Route::post('/back-acessory-upload', 'Controller@accesory_upload');
            Route::post('/back-counsmable-upload', 'Controller@consume_upload');
            Route::post('/back-licence-upload', 'Controller@licence_upload');
            Route::post('/back-asset-assign-modify', 'Controller@asset_assign_modify');
            
            Route::post('/back_new_user', 'Controller@new_user');
            Route::post('/back_mailid_upload', 'Controller@mailid_upload');
            
            Route::post('/Inv_update', 'Controller@Inv_ud');
            /* Route::post('/Inv_update', function(){
             echo"yes its working to modify";
             }); */
            Route::post('/Usr_update', 'Controller@Usr_ud');
            
            
            Route::get('Admin-Close-Invoice','Controller@getdata_close');
            Route::get('Admin-User-Manage','Controller@getdata_users');
            Route::get('Email-ID-Management','Controller@getdata_email');
            
            Route::get('Asset','Controller@ad_pending');
            Route::get('Component_Create','Controller@compget');
            Route::get('Create_Accessory','Controller@acessget');
            Route::get('Create_Consumable','Controller@consuget');
            Route::get('Create_License','Controller@licenget');
            
            Route::get('Admin-Dashboard','Controller@get_asset');
            
            
            Route::get('/Asset_assi/{id}', 'Controller@asset_update');
            
            Route::get('/user_mod/{id}', 'Controller@user_mode_get');
            Route::get('/user_delete/{id}', 'Controller@user_del');
            
            /* Route::get('/user_mod/{id}', function(){
             echo"yes its working to modify users";
             }); */
            
            Route::get('/Admin-Detailed/{id}', 'Controller@admin_view');
            Route::get('/view_asset_assign/{id}', 'Controller@view_asset_assign_f');
            Route::get('/asset_del_view/{id}', 'Controller@asset_del_view_v');
			
			
			Route::post('/query_builder_submit', 'Controller@query_builder_submit_back');
			
            
            
        
        