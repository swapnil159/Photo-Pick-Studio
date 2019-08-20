import React, { Component } from 'react'
import DisplayPhotoItem from './DisplayPhotoItem'

export class DisplayPhotos extends Component {
    render() {
        return  this.props.albums.map((album) => (
            <div>
                <DisplayPhotoItem album={album}></DisplayPhotoItem>
            </div>
        ));
    }
}

export default DisplayPhotos;
