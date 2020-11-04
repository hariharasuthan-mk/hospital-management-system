import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Home extends Component {
  render() {
    return (


        <div class="container">
          <div class="jumbotron mt-3">
            <h1>Dashboard from reactjs</h1>
            <p class="lead">Home  page comes from react js home.js</p>
            <a class="btn btn-lg btn-primary" href="./users/20/contacts" role="button">For more, Go to settings</a>
          </div>
        </div>


    );
}
}
if (document.getElementById('home')) {
    ReactDOM.render(<Home />, document.getElementById('home'));
}
