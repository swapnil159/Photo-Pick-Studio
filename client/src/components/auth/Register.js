import React, { Component } from 'react';

class Register extends Component{
    constructor(){
        super()
        this.state = {
            firstName: '',
            lastName: '',
            email: '',
            gender: 'male',
            username: '',
            password: '',
            confirmPassword: '',
        }
        this.onChange = this.onChange.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
    }

    onChange = (e) => {
        this.setState({[e.target.name]: e.target.value})
    }

    onSubmit = (e) =>{
        e.preventDefault();
        console.log(this.state)
        fetch('http://localhost/server/auth/register.php',{
            method: 'POST',
            body: JSON.stringify({
                firstName: this.state.firstName,
                lastName: this.state.lastName,
                email: this.state.email,
                gender: this.state.gender,
                username: this.state.username,
                password: this.state.password,
                confirmPassword: this.state.confirmPassword
            })
        })
        .then(res => res.json())
        .then(res => {
            if(res.loggedIn) {
                localStorage.setItem('profile_pic', res.path)
                localStorage.setItem('logged_in', res.loggedIn)
                localStorage.setItem('id', res.id)
                localStorage.setItem('username', this.state.username)
                localStorage.setItem('email', this.state.email)
                localStorage.setItem('gender', this.state.gender)
                localStorage.setItem('fname', this.state.firstName)
                localStorage.setItem('lname', this.state.lastName)
                this.props.history.push('/ProfilePictureUpload')
            }
            else{
                alert("Something went wrong. Please try again")
            }
        })
        .catch(error => {
            console.log(error)
        });
    }


    render(){
        return( 
            <div className="container">
                <div className="row">
                    <div className="col-md-6 mt-5 mx-auto">
                        <form onSubmit={this.onSubmit}>
                            <h1 className="h3 mb-3 font-weight-normal">Please Register</h1>
                            <div className="form-group">
                                <label htmlFor="firstName">First Name:</label>
                                <input type="text"
                                    className="form-control"
                                    name="firstName"
                                    placeholder="Enter your first name"
                                    value={this.state.firstName}
                                    onChange={this.onChange}
                                    required
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
                                    required
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
                                    required
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
                                    required
                                />
                                <span>Male</span>
                                <input className="with-gap"
                                    type="radio"
                                    value="female"
                                    name="gender"
                                    checked={this.state.gender === "female"}
                                    onChange={this.onChange}
                                    required
                                />
                                <span>Female</span>
                            </div>
                            <br />
                            <div className="form-group">
                                <label htmlFor="username">Username:</label>
                                <input type="text"
                                    className="form-control"
                                    name="username"
                                    placeholder="Enter your username"
                                    value={this.state.username}
                                    onChange={this.onChange}
                                    required
                                />
                            </div>
                            <br />
                            <div className="form-group">
                                <label htmlFor="password">Password:</label>
                                <input type="password"
                                    className="form-control"
                                    name="password"
                                    placeholder="Enter your password"
                                    value={this.state.password}
                                    onChange={this.onChange}
                                    required
                                />
                            </div>
                            <br />
                            <div className="form-group">
                                <label htmlFor="password">Confirm Password:</label>
                                <input type="password"
                                    className="form-control"
                                    name="confirmPassword"
                                    placeholder="Confirm your password"
                                    value={this.state.confirmPassword}
                                    onChange={this.onChange}
                                    required
                                />
                            </div>
                            <br /><br /><br />
                            <button
                                type="submit"
                                className="btn btn-lg btn-primary btn-block"
                            >
                            Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        )
    }
}


export default Register;