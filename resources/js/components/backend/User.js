import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import './User-Table.js';

export default class Userlist extends Component {
  render() {
    return (
        <div>
fdy
        User list comes here

      </div>
    );
}
}
if (document.getElementById('user-list')) {
    ReactDOM.render(<Userlist />, document.getElementById('user-list'));
    //alert("hello");
    //$('ul.nav-sidebar li:first').data("menu-open");
    //$('ul.nav-sidebar li:first a').addclass("active");
    //alert("hello");

}
