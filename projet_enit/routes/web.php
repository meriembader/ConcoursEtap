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

////Route::get('login', function () {
//    return redirect('/fr');
//});
// logout
Route::post('/test', function () {
    $password_to_website = 'enitetap2019';
    $password = request('password_field');
    if ($password && $password === $password_to_website) {
        session(['password_entered' => true]);
        return redirect('home');
    }

    return back()->withInput()->withErrors(['password' => 'Mot de passe incorrect']);
})->name('test');


Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    return "Cache is cleared";
});


Route::post('get_age', 'CandidatController@get_age')->name('get_age');
Route::post('get_user', 'CandidatController@get_user')->name('get_user');
Route::get('/logout', 'ContactController@logout')->name('logout');
Route::get('refresh-captcha', 'CandidatController@refreshCaptcha')->name('captcha');

Route::get('/', 'CandidatController@index')->name('home.page');
Route::get('/json-codes/{city_id}', 'CandidatController@codes')->name('get.codes');



Route::group(['prefix' => '/{locale}', 'middleware' => ['setlocale']], function () {
    Route::post('/inscription', 'CandidatController@handleCandidatAdd')->name('handleCandidatAdd');
    Route::post('/candidate/register/complete', 'CandidatController@handleCandidatdeuxiemeAdd')->name('handleCandidatdeuxiemeAdd');

Route::post('/inscription', 'CandidatController@handleCandidatAdd')->name('handleCandidatAdd');
Route::post('/candidate/register/complete', 'CandidatController@handleCandidatdeuxiemeAdd')->name('handleCandidatdeuxiemeAdd');

    Route::get('/', 'CandidatController@index')->name('home.page');
    Route::get('/', 'PostController@showconcours')->name('showconcours');
    Route::get('/contact', 'ContactController@showContactPage')->name('showContactPage');
    Route::post('/contact', 'ContactController@handleContactAdd')->name('handleContactAdd');

// deuxieme inscrit
    Route::get('/candidate/register/complete', 'CandidatController@showCandidatdeuxiemeAdd')->name('showCandidatdeuxiemeAdd');
    Route::get('/candidate/register/complete/success', 'CandidatController@showCandidatdeuxiemeAdd')->name('showCandidatdeuxiemeAdd_up');
    Route::get('/candidate/register/done', 'CandidatController@showCandidatdeuxiemeAdd_done')->name('showCandidatdeuxiemeAdd_done');

// reset
    Route::get('/reset/password', 'CandidatController@showResetPassword')->name('showResetPassword');


//legal
    Route::get('/mention/Legale', 'ContactController@showLegal')->name('showLegal');

// Page Concours
    Route::get('/concours/list', 'PostController@showconcours')->name('showconcours');

//Login
    Route::get('/login', 'CandidatController@showLogin')->name('show.login');
    Route::post('/login', 'CandidatController@handleLogin')->name('handle.login');

    Route::get('/inscription', 'CandidatController@showCandidatAdd')->name('showCandidatAdd');

    Route::get('/update', 'scoreController@updateScore');


    Route::get('/candidate/result', 'scoreController@ShowResult')->name('ShowResult');

//send Mail
    Route::get('/send', 'MailController@sendMail');

});
//Route::get('/contact', 'ContactController@showContactPage')->name('showContactPage');

Route::group(['prefix' => '/{locale}', 'middleware' => ['setlocale', 'Enit']], function () {
    // Route::get('/contact', 'ContactController@showContactPage')->name('showContactPage');
});
Route::get('ficheinscription/pdf/{id}', 'CandidatController@generateficheinscription')->name('generateficheinscription');

Route::get('ficheinscriptionarabe/pdf/{id}', 'CandidatController@generateficheinscription_AR')->name('generateficheinscription_AR');
Route::get('generate/attachement/pdf/{id}', 'CandidatController@generateAttachement')->name('generateAttachement');


Route::post('/reset/password', 'CandidatController@handleResetPassword')->name('handleResetPassword');


// CRUD Poste
Route::group(['prefix' => 'portal/', 'middleware' => ['Enit']], function () {

    Route::get('/settings/email/text', 'MessageController@showMessage')->name('showEmailMessage');
    Route::post('/handle/email/save', 'MessageController@handleEditMessage')->name('handleEmailSave');

    Route::get('rejetected/list', 'MailController@rejetectedList')->name('rejetected.List');

// exporter Excel
    Route::get('/listcandidatexport/{type}', 'CandidatController@listCandidatExport')->name('listCandidat.export');


    Route::get('/password/history/show', 'CandidatController@getPasswordHistory')->name('get.password.history');


    Route::get('/diplomes/', 'CandidatController@diplomes')->name('diplomes.list');
    Route::get('/json-codes/{city_id}', 'CandidatController@codes')->name('get.codes');


    Route::get('/addposts', 'PostController@showPostAdd')->name('showPostAdd');
    Route::post('/addposts', 'PostController@handlepostAdd')->name('handlepostAdd');

    Route::get('/listposts', 'PostController@showPostList')->name('showPostList');
    Route::post('/listposts', 'PostController@handleAdddate')->name('handleAdddate');

    Route::get('/post/delete/{id}', 'PostController@deletePost')->name('deletePost');
    Route::get('/editpost/{id}', 'PostController@editPost')->name('editPost');
    Route::post('/editpost/{id}', 'PostController@updatePost')->name('updatePost');


    Route::get('/accepted/candidate', 'scoreController@acceptedCandidate')->name('accepted.candidate');
    Route::get('/improper/candidate/list', 'scoreController@improperCandidate')->name('improper.candidate');
    Route::get('/last/Selection/', 'scoreController@getLastSelection')->name('get.last.selection');
    Route::get('/accepted/conforme/candidate', 'scoreController@acceptedConformeCandidate')->name('accepted.conforme.candidate');
    Route::get('/accepted/final/candidate', 'scoreController@FinalacceptedCandidate')->name('accepted.final.candidate');
    Route::get('/candidature/History', 'scoreController@candidatureHistory')->name('historique.candidature');


    Route::get('/filter/accepted/candidate', 'scoreController@filtyerAcceptedCandidate')->name('filter.accepted.candidate');
    Route::get('/filter/accepted/conforme/candidate', 'scoreController@filtyerAcceptedConformeCandidate')->name('filter.accepted.conforme.candidate');

    Route::get('/filter/accepted/final/candidate', 'scoreController@filtyerFinalAcceptedCandidate')->name('filter.final.accepted.candidate');

    Route::get('/filter/list/candidate', 'scoreController@filtyerListCandidate')->name('filter.list.candidate');


    Route::post('/contact', 'ContactController@handleContactAdd')->name('handleContactAdd');

    Route::get('/list/contact', 'ContactController@getCantactList')->name('getCantactList');

//Note

    Route::get('/addnotes/{id}', 'scoreController@showNoteAdd')->name('showNoteAdd');
    Route::post('/addnotes/', 'scoreController@handleNoteAdd')->name('handleNoteAdd');

//Conformity

    Route::get('/addconformity/{id}', 'scoreController@showConformityAdd')->name('showConformityAdd');
    Route::post('/addconformity/', 'scoreController@handleConformityAdd')->name('handleConformityAdd');


// Send SMS
    Route::get('/send', 'Controller@sendSmsNotif');

//Auth::routes('false');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/__dashboard', 'Controller@getAllCandidatures')->name('candidatures.list');

// Contact


});
Route::get('/get/first/score/{id}', 'scoreController@calculateFirstScore')->name('get.first.score');
Route::get('/get/second/score/{id}', 'scoreController@calculateSecondScore')->name('get.second.score');


//legal
Route::get('/mention/Legale', 'ContactController@showLegal')->name('showLegal');
Route::get('/get/cloture/dates', 'ContactController@getClotureDates')->name('getClotureDates');
Route::get('/clotures/dates/save', 'ContactController@SaveDates')->name('SaveDates');

// Page Concours
Route::get('/affichageconcours', 'PostController@showconcours')->name('showconcours');

// logout
Route::get('logout', 'ContactController@logout')->name('logout');

//Login

Route::get('/diplomes/', 'CandidatController@diplomes')->name('diplomes.list');
Route::get('/json-codes', 'CandidatController@codes')->name('get.codes');
Route::get('/json-diplomes/{poste_id}', 'CandidatController@get_dip')->name('get.diplomes');


Route::get('/update', 'scoreController@updateScore');


Route::get('/send/{id}', 'MailController@sendMail')->name('sendMail');

// exporter Excel
Route::get('listcandidatexport/{post}/{keyword}', 'CandidatController@listCandidatExport')->name('listCandidat.export');
Route::get('first/listcandidatexport/{post}/{limit}', 'CandidatController@FirstSelectExport')->name('FirstSelectExport.export');
Route::get('final/listcandidatexport/{post}/{limit}', 'CandidatController@FinalSelectExport')->name('FinalSelectExport.export');
Route::get('liste/attente/listcandidatexport/{post}/{limit}', 'CandidatController@ListeAttenteExport')->name('ListeAttenteExport.export');
Route::get('export/rejected/{id}', 'CandidatController@exportRejected')->name('rejected.exports');
Route::get('export/selection/', 'CandidatController@exportSelection')->name('exportSelection');
Route::get('new/password', 'CandidatController@newPassword')->name('newpassword');

Route::get('rejected/sendmail/{post}', 'MailController@rejectedSendMail')->name('rejected.sendmail');

Route::get('send/mail/list/attente/{post}', 'MailController@ListeAttenteSendMail')->name('ListeAttenteExport.mail.send');
Route::get('send/mail/list/to/one/candidat/{id}', 'MailController@sendToOne')->name('sendToOne');
Route::get('send/global/mail', 'MailController@sendGlobalMail')->name('send.global.mail');
Route::get('send/prev/mail', 'MailController@sendPrevMail')->name('send.prev.mail');
