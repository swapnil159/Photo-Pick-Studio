import React, { Component } from 'react'
import {Link} from 'react-router-dom'

export class EditProfile extends Component {
    constructor(){
        super()
        this.state = {
            firstName: localStorage.getItem('fname'),
            lastName: localStorage.getItem('lname'),
            email: localStorage.getItem('email'),
            gender: localStorage.getItem('gender'),
            username: localStorage.getItem('username'),
            profile_pic: localStorage.getItem('profile_pic')
        }
        this.onChange = this.onChange.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
        this.remove = this.remove.bind(this);
    }

    onChange = (e) => {
        this.setState({[e.target.name]: e.target.value})
    }

    onSubmit = (e) =>{
        e.preventDefault();
        console.log(this.state)
        fetch('http://localhost/server/User_profiles/update_profile.php?username='+
        localStorage.getItem('username'),{
            method: 'POST',
            body: JSON.stringify({
                firstName: this.state.firstName,
                lastName: this.state.lastName,
                email: this.state.email,
                gender: this.state.gender,
            })
        })
        .then(res => res.json())
        .then(res => {
            if(res.updated) {
                localStorage.setItem('email', this.state.email)
                localStorage.setItem('gender', this.state.gender)
                localStorage.setItem('fname', this.state.firstName)
                localStorage.setItem('lname', this.state.lastName)
                this.props.history.push('/dashboard')
            }
            else{
                console.log(res.message)
            }
        })
        .catch(error => {
            console.log(error)
        });
    }

    remove(){
        fetch('http://localhost/server/Photos/DeleteProfilePic.php?username=' 
        + localStorage.getItem('username') + '&pic=' + localStorage.getItem('profile_pic') )
          .then(data => data.json())
          .then((data) => { 
            localStorage.setItem('profile_pic',data.profile_pic)
            this.setState({profile_pic: localStorage.getItem('profile_pic')})
        });
    }


    render(){
        const loggedIn = localStorage.getItem('logged_in')
        return( 
            <div className="container">
                {
                    loggedIn ?
                    (
                        <div className="row">
                            <div className="col-md-6 mt-5 mx-auto">
                                <img src={this.state.profile_pic} style={{width:200}}
                                    alt="Can not be displayed"></img>
                                <button onClick={this.remove}>Remove</button>
                                <Link to="/ProfilePictureUpload">Upload Profile Pic</Link>
                                <form noValidate onSubmit={this.onSubmit}>
                                    <h1 className="h3 mb-3 font-weight-normal">Update Profile</h1>
                                    <div className="form-group">
                                        <label htmlFor="firstName">First Name:</label>
                                        <input type="text"
                                            className="form-control"
                                            name="firstName"
                                            placeholder="Enter your first name"
                                            value={this.state.firstName}
                                            onChange={this.onChange}
                                            
                                        />
                                    </div>
                                    <br />
                                    <div className="form-group">
                                        <label htmlFor="lastName">Last Name:</label>
                                        <input type="text"
                                            className="form-control"
                                            name="lastName"
                                            placeholder="Enter your last name"
                                            value={this.state.lastName}
                                            onChange={this.onChange}
                                        />
                                    </div>
                                    <br />
                                    <div className="form-group">
                                        <label htmlFor="email">Email:</label>
                                        <input type="text"
                                            className="form-control"
                                            name="email"
                                            placeholder="Enter your email"
                                            value={this.state.email}
                                            onChange={this.onChange}
                                        />
                                    </div>
                                    <br />
                                    <div>
                                        <label htmlFor="gender">Gender:</label>
                                        <input className="with-gap"
                                            type="radio"
                                            value="male"
                                            name="gender"
                                            checked={this.state.gender === "male"}
                                            onChange={this.onChange}
                                        />
                                        <span>Male</span>
                                        <input className="with-gap"
                                            type="radio"
                                            value="female"
                                            name="gender"
                                            checked={this.state.gender === "female"}
                                            onChange={this.onChange}
                                        />
                                        <span>Female</span>
                                    </div>
                                    <br />
                                    <button
                                        type="submit"
                                        className="btn btn-lg btn-primary btn-block"
                                    >
                                    UPDATE
                                    </button>
                                </form>
                            </div>
                        </div>
                    )
                    :
                    (
                        this.props.history.push('/')
                    )
                }
            </div>
        )
    }
}

export default EditProfile
