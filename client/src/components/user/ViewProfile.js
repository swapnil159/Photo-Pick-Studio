import React, { Component } from 'react'
import DisplayUserProfile from './DisplayUserProfile'
import DisplayUserAlbums from '../Albums/DisplayUserAlbums'

export class ViewProfile extends Component {
    render() {
        return (
            <div>
                <DisplayUserProfile user={this.props.match.params.username}></DisplayUserProfile>
                <hr />
                <DisplayUserAlbums user={this.props.match.params.username}></DisplayUserAlbums>
            </div>
        )
    }
}

export default ViewProfile
