import React, { Component } from 'react'
import { Link } from 'react-router-dom';

export class AlbumItem extends Component {
    render() {
        const id = this.props.album.id;
        return (
            <div>
                <div>
                <img src={this.props.album.cover} alt="Can not be displayed" style={imgs}></img>
                <Link to={"/ViewAlbum/" + this.props.album.AlbumName}>{ this.props.album.AlbumName }</Link>
                <p>{ this.props.album.AlbumDescription }</p>
                <p>{ this.props.album.Date_Time }</p>
                <button onClick={this.props.delAlbum.bind(this, id)} style={btnstyle}>x</button>
                <button onClick={this.props.editAlbum.bind(this, id)}>Edit</button>
                <Link to={"/AddPhotosToAlbum/" + this.props.album.AlbumName}>Add Photos</Link>
                </div>
            </div>
        )
    }
}

const btnstyle={
    background:'#ff0000',
    color: '#fff',
    padding :'5px 10px',
    borderRadius: '50%',
    cursor: 'pointer',
    float: 'right'

}

const imgs = {
    width: 200
}

export default AlbumItem
