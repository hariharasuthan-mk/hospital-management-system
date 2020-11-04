import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Topnavigation extends Component {
  render() {


    var hello = this.context.router.route.location.pathname;



    return (
        <div>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="../../home" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>


        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#" >
               <i class="far fa-bell"></i>
               <span class="badge badge-danger navbar-badge">3</span>
             </a>
           </li>

          <li class="nav-item dropdown">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>

       </ul>

      </div>
    );
}
}
if (document.getElementById('topnavigation')) {
    ReactDOM.render(<Topnavigation />, document.getElementById('topnavigation'));
    alert('hello');
}
