import React, { Component } from 'react'
import DisplayItem from './DisplayItem'

export class DisplayAlbumItem extends Component {
    render() {
        return this.props.albums.map((album) =>(
            <div>
                <DisplayItem key={album.id} album={album}></DisplayItem>
            </div>
        ));
    }
}

export default DisplayAlbumItem
