import React, { Component } from 'react';
import AlbumItem from './AlbumItem';

export class UserAlbums extends Component {
    render() {
        return  this.props.albums.map((album) => (
            <h3>
                <AlbumItem key={album.id} album={album} delAlbum={this.props.delAlbum}
                editAlbum={this.props.editAlbum}></AlbumItem>
            </h3>
        ));
    }
}

export default UserAlbums
