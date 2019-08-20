import React, { Component } from 'react'
import UserProfile from './User_profile'

export class Dashboard extends Component {
    constructor(props) {
        super(props);
        this.state = {profiles: []};
    }


    componentDidMount() {
        fetch('http://localhost/server/User_profiles/get_all_user_profiles.php?username=' 
        + localStorage.getItem('username') )
          .then(data => data.json())
          .then((data) => { this.setState({ profiles: data }) }); 
    }

    /*set_user = () =>{
        this.setlocalStorage.getItem('username')
    }*/

    render() {
        const isLoggedIn = localStorage.getItem('logged_in');
        const profile_pic = localStorage.getItem('profile_pic')
        //console.log(this.state.profiles)
        return (
            <div>
                <span>
                {isLoggedIn ? (
                     <img src={ profile_pic }
                     alt="Not Found" 
                     style={imgstyle}/> 
                ) : (
                    this.props.history.push('/')
                )}
                <h1>Welcome {localStorage.getItem('username')}</h1>
                </span>
                <hr></hr>
                <UserProfile profiles={this.state.profiles}>
                </UserProfile>
            </div>
        )
    }
}

const imgstyle={
    width: 150
}

export default Dashboard
