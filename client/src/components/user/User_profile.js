import React, { Component } from 'react'
import ProfileItem from './Profile_item'

export class UserProfile extends Component {

    render() {
        return  this.props.profiles.map((profile) => (
            <div>
                <h3>
                <ProfileItem profile={profile} key={profile.id}></ProfileItem>
                </h3>
            </div>
        ));
    }
}

export default UserProfile;
