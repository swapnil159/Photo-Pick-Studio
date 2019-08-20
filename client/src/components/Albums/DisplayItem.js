import React, { Component } from 'react'
import { Link } from 'react-router-dom';

export class DisplayItem extends Component {
    render() {
        return (
            <div>
                <Link to={"/Album/" + this.props.album.id}><h2>{ this.props.album.AlbumName }</h2></Link>
                <h2>{ this.props.album.AlbumDescription }</h2>
                <h2>{ this.props.album.Date_Time }</h2>
            </div>
        )
    }
}

export default DisplayItem
