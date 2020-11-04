/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Sidebar');
//require('./components/Navigation');
//require('./components/Content');
//require('./components/Breadcrumb');
require('./components/Footer');


/*User*/
require('./components/Login');
require('./components/Register');
require('./components/Password');


/*Home*/
require('./components/Home');


/*Backend User*/
require('./components/backend/User');
require('./components/backend/Question');