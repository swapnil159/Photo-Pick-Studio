import React, { Component } from 'react'
import DisplayAlbumItem from './DisplayAlbumItem'

export class DisplayUserAlbums extends Component {


    constructor(){
        super()
        this.state={
            Albums:[]
        }
    }

    componentDidMount(){
        fetch('http://localhost/server/Albums/DisplayUserAlbums.php?username=' 
        + this.props.user )
          .then(data => data.json())
          .then((data) => { 
              this.setState({
                Albums: data
              });
            })
    }

    render() {
        return (
            <div>
                <DisplayAlbumItem user={this.props.user} albums={this.state.Albums}></DisplayAlbumItem>
            </div>
        )
    }
}

export default DisplayUserAlbums
