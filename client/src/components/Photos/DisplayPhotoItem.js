import React, { Component } from 'react'

export class DisplayPhotoItem extends Component {
    render() {
        console.log(this.props.album)
        return (
            <div>
                <img src={process.env.PUBLIC_URL + this.props.album.path}
                alt="Can not be displayed"></img>
                <p>{ this.props.album.description }</p>
                <p>{ this.props.album.Date_Time }</p>
            </div>
        )
    }
}

export default DisplayPhotoItem
