import React, { Component } from 'react'
import { Link } from 'react-router-dom';

export class ProfileItem extends Component {
    render() {
        return (
            <div>
                <img src={ this.props.profile.path }
                     alt="Not Found"
                     style={imgstyle}/> 
                <br />
                <Link to={"/ViewProfile/"+this.props.profile.name}>{this.props.profile.name}</Link>
            </div>
        )
    }
}

const imgstyle={
    width: 150
}

export default ProfileItem

