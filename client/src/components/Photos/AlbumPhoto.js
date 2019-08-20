import React, { Component } from 'react'
import PhotoItem from './PhotoItem'

export class AlbumPhoto extends Component {
    render() {
        return  this.props.photos.map((photo) => (
            <div>
                <PhotoItem key={photo.id} photo={photo} delPhoto={this.props.delPhoto}></PhotoItem>
            </div>
        ));
    }
}

export default AlbumPhoto
