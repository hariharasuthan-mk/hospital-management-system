import React, { Component } from 'react';
import ReactDOM from 'react-dom';

const sampleJSON = {
  "string": "Pluralsight",
  "number": 1,
  "true": true,
  "false": false,
  "null": null,
  "arrayOfStrings": ["a", "b", "c", "d"],
  "arrayOfNumbers": [1, 2, 3, 4, 5],
  "arrayOfBooleans": [true, false, true, false],
  "arrayOfObjects": [{ "a": 1 }, { "a": 2}],
  "object": {
    "anyKey": "anyValue"
  }
}

export default class Testcontent extends Component {

  constructor(props){
    super(props);
    const data = JSON.parse(props.data);
    //console.log(props);
    console.log(data);//alert(data);alert(data.title);

    this.state = {
        data: 'www.javatpoint.com'
     }

    this.handleEvent = this.handleEvent.bind(this);

  }

  handleEvent(){
   console.log(this.props);
 }

  render() {
        return (

      <section class="content">
      <div class="row">
              <div className="container">
                  <div className="row justify-content-center">
                      <div className="col-md-12">
                          <div className="card">
                              <div className="card-header">Example Component</div>

                              <div className="card-body">I'm an example {data}</div>

                              <div class="form-group">
                                  <label for="inputName">{data}</label>
                                <input type="text" id="inputName" class="form-control" />
                              </div>
                              <div>
                               <p>String : {sampleJSON.string}</p>
                               <p>Number : {sampleJSON.number}</p>
                               <p>Data   : {this.state.data}</p>
                             </div>

                             <button onClick={this.handleEvent}>Please Click</button>

                          </div>
                      </div>
                  </div>
              </div>

            </div>

        </section>

        );
    }
}

if (document.getElementById('testcontent')) {


    var data =  document.getElementById('testcontent').getAttribute('data');
    //alert('start'); alert(data);alert('end');
    ReactDOM.render(<Testcontent data={data} />, document.getElementById('testcontent'));

}
