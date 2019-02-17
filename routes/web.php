<?php

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

Route::get('/', array('before'=>'forcehttp',  function () {
    return view('auth/login');
}));

Route::get('/login/', array(
        'before'=>'forcehttps',
        'uses' => 'UserController@login')
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group([
    'prefix' => 'api/v1',
    'middleware' => [
        'auth'
    ]
], function () {
    Route::get('accounts/list', array('uses' => 'Backend\API\AccountController@getList'))->name('account.list');
    Route::get('campaigns/list', array('uses' => 'Backend\API\CampaignController@getList'))->name('campaign.list');
    Route::any('contact/pad', array('uses' => 'Backend\API\ContactController@postPad'))->name('contact.pad');
    Route::any('contact/apply', array('uses' => 'Backend\API\ContactController@postApply'))->name('contact.apply');
    Route::any('contact/discard', array('uses' => 'Backend\API\ContactController@postDiscard'))->name('contact.discard');
    Route::get('crmquery/list', array('uses' => 'Backend\API\CRMQueryController@getList'))->name('crmquery.list');
    Route::any('crmquery/execute', array('uses' => 'Backend\API\CRMQueryController@postExecute'))->name('crmquery.execute');
    Route::any('crmquery/save', array('uses' => 'Backend\API\CRMQueryController@postSave'))->name('crmquery.save');
    Route::get('pbx/list', array('uses' => 'Backend\API\PbxController@getList'))->name('pbx.list');
    Route::get('products/list', array('uses' => 'Backend\API\ProductController@getList'))->name('product.list');
    Route::get('servers/list', array('uses' => 'Backend\API\ServerController@getList'))->name('servers.list');
    Route::get('syslog/list', array('uses' => 'Backend\API\SyslogController@getList'))->name('syslog.list');
    Route::get('syslog/history', array('uses' => 'Backend\API\SyslogController@getHistory'))->name('syslog.history');
    Route::get('users/list', array('uses' => 'Backend\API\UserController@getList'))->name('users.list');
    Route::get('accountant/groups/list', array('uses' => 'Backend\API\GroupController@getList'))->name('accountant.groups.list');
    Route::get('accountant/companies/list', array('uses' => 'Backend\API\CompanyController@getList'))->name('accountant.companies.list');
    Route::get('accountant/nodes/list', array('uses' => 'Backend\API\NodeController@getList'))->name('accountant.nodes.list');
    
});

Route::group([
    'prefix' => 'accounts',
    'middleware' => [
        'auth', 'role:admin'
    ]
], function () {
    Route::get('/', 'Backend\Statical\AccountController@getList');
    Route::get('/list', 'Backend\Statical\AccountController@getList');
    Route::get('/create', 'Backend\Statical\AccountController@getCreate');
    Route::get('/edit/{ID}', 'Backend\Statical\AccountController@getEdit');
    Route::get('/delete', 'Backend\Statical\AccountController@getDelete');
    Route::post('/store', 'Backend\Statical\AccountController@postStore');
    Route::any('/update', 'Backend\Statical\AccountController@postUpdate');
    Route::post('/destroy/{ID}', 'Backend\Statical\AccountController@postDestroy');
    
});

Route::group([
    'prefix' => 'campaigns',
    'middleware' => [
        'auth', 'role:admin'
    ]
], function () {
    Route::get('/', 'Backend\Statical\CampaignController@getList');
    Route::get('/list', 'Backend\Statical\CampaignController@getList');
    Route::get('/create', 'Backend\Statical\CampaignController@getCreate');
    Route::get('/edit/{ID}', 'Backend\Statical\CampaignController@getEdit');
    Route::get('/delete', 'Backend\Statical\CampaignController@getDelete');
    Route::post('/store', 'Backend\Statical\CampaignController@postStore');
    Route::any('/update', 'Backend\Statical\CampaignController@postUpdate');
    Route::post('/destroy/{ID}', 'Backend\Statical\CampaignController@postDestroy');
    
});

Route::group([
    'prefix' => 'contact',
    'middleware' => [
        'auth'
    ]
], function () {
    Route::get('/', 'Backend\Statical\ContactController@getPad');    
    Route::get('/pad', 'Backend\Statical\ContactController@getPad');    
});

Route::group([
    'prefix' => 'crmquery',
    'middleware' => [
        'auth', 'role:admin'
    ]
], function () {
    Route::get('/', 'Backend\Statical\CRMQueryController@getList');
    Route::get('/list', 'Backend\Statical\CRMQueryController@getList');
    Route::get('/create', 'Backend\Statical\CRMQueryController@getCreate');
    Route::get('/edit/{ID}', 'Backend\Statical\CRMQueryController@getEdit');
    Route::get('/delete', 'Backend\Statical\CRMQueryController@getDelete');
    Route::get('/proof/{ID}/{SQL}', 'Backend\Statical\CRMQueryController@getProof');
    Route::post('/store', 'Backend\Statical\CRMQueryController@postStore');
    Route::post('/proof', 'Backend\Statical\CRMQueryController@postProof');
    Route::any('/update', 'Backend\Statical\CRMQueryController@postUpdate');
    Route::post('/destroy/{ID}', 'Backend\Statical\CRMQueryController@postDestroy');
    
});

Route::group([
    'prefix' => 'pbx',
    'middleware' => [
        'auth', 'role:admin'
    ]
], function () {
    Route::get('/', 'Backend\Statical\PbxController@getList');
    Route::get('/list', 'Backend\Statical\PbxController@getList');
    Route::get('/create', 'Backend\Statical\PbxController@getCreate');
    Route::get('/edit/{ID}', 'Backend\Statical\PbxController@getEdit');
    Route::get('/delete', 'Backend\Statical\PbxController@getDelete');
    Route::post('/store', 'Backend\Statical\PbxController@postStore');
    Route::any('/update', 'Backend\Statical\PbxController@postUpdate');
    Route::post('/destroy/{ID}', 'Backend\Statical\PbxController@postDestroy');
       
});

Route::group([
    'prefix' => 'products',
    'middleware' => [
        'auth', 'role:admin'
    ]
], function () {
    Route::get('/', 'Backend\Statical\ProductController@getList');
    Route::get('/list', 'Backend\Statical\ProductController@getList');
    Route::get('/create', 'Backend\Statical\ProductController@getCreate');
    Route::get('/edit/{ID}', 'Backend\Statical\ProductController@getEdit');
    Route::get('/delete', 'Backend\Statical\ProductController@getDelete');
    Route::post('/store', 'Backend\Statical\ProductController@postStore');
    Route::any('/update', 'Backend\Statical\ProductController@postUpdate');
    Route::post('/destroy/{ID}', 'Backend\Statical\ProductController@postDestroy');
    
});

Route::group([
    'prefix' => 'servers',
    'middleware' => [
        'auth', 'role:admin'
    ]
], function () {
    Route::get('/', 'Backend\Statical\ServerController@getList');
    Route::get('/list', 'Backend\Statical\ServerController@getList');
    Route::get('/create', 'Backend\Statical\ServerController@getCreate');
    Route::get('/edit/{ID}', 'Backend\Statical\ServerController@getEdit');
    Route::get('/delete', 'Backend\Statical\ServerController@getDelete');
    Route::post('/store', 'Backend\Statical\ServerController@postStore');
    Route::any('/update', 'Backend\Statical\ServerController@postUpdate');
    Route::post('/destroy/{ID}', 'Backend\Statical\ServerController@postDestroy');
    
});

Route::group([
    'prefix' => 'syslog',
    'middleware' => [
        'auth', 'role:admin'
    ]
], function () {
    Route::get('/', 'Backend\Statical\SyslogController@getList');
    Route::get('/list', 'Backend\Statical\SyslogController@getList');
    Route::get('/history', 'Backend\Statical\SyslogController@getHistory');
    Route::get('/edit', 'Backend\Statical\SyslogController@getEdit');
    Route::post('/destroy/{ID}', 'Backend\Statical\SyslogController@postDestroy');
    
});

Route::group([
    'prefix' => 'users',
    'middleware' => [
        'auth', 'role:admin'
    ]
], function () {
    Route::get('/', 'Backend\Statical\UserController@getList');
    Route::get('/list', 'Backend\Statical\UserController@getList');
    Route::get('/create', 'Backend\Statical\UserController@getCreate');
    Route::get('/edit/{ID}', 'Backend\Statical\UserController@getEdit');
    Route::post('/store', 'Backend\Statical\UserController@postStore');
    Route::any('/update', 'Backend\Statical\UserController@postUpdate');
    Route::post('/destroy/{ID}', 'Backend\Statical\UserController@postDestroy');
    
});

Route::group([
    'prefix' => 'groups'
], function () {
    Route::get('/', 'Backend\Statical\GroupController@getList');
    Route::get('groups', 'Backend\Statical\GroupController@getList');
    Route::get('create', 'Backend\Statical\GroupController@getCreate');
    Route::get('edit/{ID}', 'Backend\Statical\GroupController@getEdit');
    Route::post('store', 'Backend\Statical\GroupController@postStore');
    Route::any('update', 'Backend\Statical\GroupController@postUpdate');
    Route::post('destroy/{ID}', 'Backend\Statical\GroupController@postDestroy');
});

Route::group([
    'prefix' => 'companies'
], function () {
    Route::get('companies', 'Backend\Statical\CompanyController@getList');
    Route::get('create', 'Backend\Statical\CompanyController@getCreate');
    Route::get('edit/{ID}', 'Backend\Statical\CompanyController@getEdit');
    Route::post('store', 'Backend\Statical\CompanyController@postStore');
    Route::any('update', 'Backend\Statical\CompanyController@postUpdate');
    Route::post('destroy/{ID}', 'Backend\Statical\CompanyController@postDestroy');
});

Route::group([
    'prefix' => 'nodes'
], function () {
    Route::get('nodes', 'Backend\Statical\NodeController@getList');
    Route::get('create', 'Backend\Statical\NodeController@getCreate');
    Route::get('edit/{ID}', 'Backend\Statical\NodeController@getEdit');
    Route::post('store', 'Backend\Statical\NodeController@postStore');
    Route::any('update', 'Backend\Statical\NodeController@postUpdate');
    Route::post('destroy/{ID}', 'Backend\Statical\NodeController@postDestroy');
});

Route::group([
    'prefix' => 'accountant'
], function () {
    Route::get('index', 'Backend\Statical\AccountantController@getList');
    Route::get('create', 'Backend\Statical\AccountantController@getCreate');
    Route::get('edit/{ID}', 'Backend\Statical\AccountantController@getEdit');
    Route::post('store', 'Backend\Statical\AccountantController@postStore');
    Route::any('update', 'Backend\Statical\AccountantController@postUpdate');
    Route::post('destroy/{ID}', 'Backend\Statical\AccountantController@postDestroy');
});

Route::group([
    'prefix' => 'assistant'
], function () {
    Route::get('index', 'Backend\Statical\AssistantController@getList');
    Route::get('create', 'Backend\Statical\AssistantController@getCreate');
    Route::get('edit/{ID}', 'Backend\Statical\AssistantController@getEdit');
    Route::post('store', 'Backend\Statical\AssistantController@postStore');
    Route::any('update', 'Backend\Statical\AssistantController@postUpdate');
    Route::post('destroy/{ID}', 'Backend\Statical\AssistantController@postDestroy');
});

Route::group([
    'prefix' => 'report'
], function () {
    Route::get('/', 'Frontend\Statical\ReportController@getList');
    Route::get('/index', 'Frontend\Statical\ReportController@getList');
});

Route::group([
    'prefix' => 'errors'
    
], function () {
    Route::get('/unauthorized', 'Backend\Statical\UserController@getError');    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@index')->name('home');
//Route::get('/{slug?}', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
