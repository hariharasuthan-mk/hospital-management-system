import React, { Component } from 'react';
import ReactDOM from 'react-dom';
//import Navigation from '../components/Navigation';


export default class Sidebar extends Component {

    constructor(props) {
        super(props);
        //console.log(this.props.currentusername);

        //alert(this.props.currentusername);
    }
    render() {
        return (

          <aside class="main-sidebar sidebar-dark-primary elevation-4">

          {/* Brand Logo */}
          <a href="" class="brand-link">
             <span class="brand-text font-weight-light">Admin Panel</span>
          </a>

          {/* Sidebar */}
          <div class="sidebar">
            {/* Sidebar user (optional) */}
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="../../dist/img/avatar.png" class="img-circle elevation-2" alt="User Image" />
              </div>
              <div class="info">
                <a href="#" class="d-block">Alexander Pierce </a>                
              </div>
            </div>

            {/* Sidebar Menu */}
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {/* Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library */}

                <li class="nav-header">Web Activity List</li>
                
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      User Dashboard
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/user-logout" class="nav-link">
                        <i class="fas fa fa-sign-in-alt mr-2"></i>
                        <p>User Signout </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/users" class="nav-link">
                        <i class="far fa fa-users nav-icon"></i>
                        <p>View All User </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/users/create" class="nav-link">
                        <i class="far fa-user nav-icon"></i>
                        <p>Add New User </p>
                      </a>
                    </li>

                  </ul>
                </li>

                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-cogs"></i>
                    <p>
                      User Roles
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/roles" class="nav-link active">
                        <i class="far fa fa-wrench nav-icon"></i>
                        <p>View User Roles</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/roles/create" class="nav-link ">
                        <i class="far fa fa-plus-square nav-icon"></i>
                        <p>Add User Role</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-hospital"></i>
                    <p>Hospitals
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/hospitals" class="nav-link">
                        <i class="far fas fa-medkit nav-icon"></i>
                        <p>View Hospitals</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/hospitals/create" class="nav-link">
                        <i class="far fa fa-plus-square nav-icon"></i>
                        <p>Add Hospital</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-hospital"></i>
                    <p>Departments
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/departments" class="nav-link">
                        <i class="far fas fa-medkit nav-icon"></i>
                        <p>View Departments</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/departments/create" class="nav-link">
                        <i class="far fa fa-plus-square nav-icon"></i>
                        <p>Add Department</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-hospital"></i>
                    <p>Questions
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/questions/create" class="nav-link">
                        <i class="far fas fa-medkit nav-icon"></i>
                        <p>Add Question</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/questions" class="nav-link">
                        <i class="far fas fa-medkit nav-icon"></i>
                        <p>View Question</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/answers" class="nav-link">
                        <i class="far fa fa-plus-square nav-icon"></i>
                        <p>View Answers</p>
                      </a>
                    </li>

                  </ul>
                </li>



                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Pages
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../examples/invoice.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Invoice</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/profile.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Profile</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/e-commerce.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>E-commerce</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/projects.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Projects</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/project-add.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Project Add</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/project-edit.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Project Edit</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/project-detail.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Project Detail</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/contacts.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Contacts</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                      Extras
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../examples/login.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Login</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/register.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Register</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/forgot-password.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Forgot Password</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/recover-password.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Recover Password</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/lockscreen.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lockscreen</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/legacy-user-menu.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Legacy User Menu</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/language-menu.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Language Menu</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/404.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Error 404</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/500.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Error 500</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/pace.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pace</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/blank.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Blank Page</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../starter.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Starter Page</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-header">Laravel Settings</li>
                <li class="nav-item">
                  <a href="/clear-cache" class="nav-link">
                    <i class="nav-icon fas fa-file text-warning"></i>
                    <p>Clear cache</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/view-clear" class="nav-link">
                    <i class="nav-icon fas fa-file text-primary"></i>
                    <p>view-clear</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/route-clear" class="nav-link">
                    <i class="nav-icon fas fa-puzzle-piece text-danger"></i>
                    <p>Clear Route cache</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/route-clear" class="nav-link">
                    <i class="nav-icon fas fa-file text-info"></i>
                    <p>Clear Config cache</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Reoptimized class loader</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Route cache</p>
                  </a>
                </li>
              </ul>
            </nav>
            {/* sidebar-menu */}
          </div>
          {/* /.sidebar */}
          </aside>

        );
    }
}

if (document.getElementById('adminsidebar')) {
    ReactDOM.render(<Sidebar />, document.getElementById('adminsidebar'));
}
