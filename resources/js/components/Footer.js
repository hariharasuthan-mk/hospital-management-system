import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Footer extends Component {
    render() {
        return (
          <div className="container">
            <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.5
            </div>
            <strong>Copyright &copy; 2014-2020 Footer Label</strong> All rights reserved.
          </div>
        );
    }
}

if (document.getElementById('footer')) {
    ReactDOM.render(<Footer />, document.getElementById('footer'));
}
