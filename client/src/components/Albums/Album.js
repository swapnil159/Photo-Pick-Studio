import React, { Component } from 'react'
import DisplayPhotos from '../Photos/DisplayPhotos';

export class Album extends Component {

    constructor(props){
        super(props)
        this.state={
            albums: []
        }
    }

    componentDidMount(){
        fetch('http://localhost/server/Photos/DisplayPhotos.php?id=' 
        + this.props.match.params.id )
          .then(data => data.json())
          .then((data) => { 
              this.setState({
                albums: data
              });
            })
    }



    render() {
        return (
            <div>
                <DisplayPhotos albums={this.state.albums}></DisplayPhotos>
            </div>
        )
    }
}

export default Album
