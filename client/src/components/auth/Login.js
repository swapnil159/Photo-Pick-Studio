import React, {Component} from 'react';
import { Link } from 'react-router-dom';

class Login extends Component{

    constructor(){
        super()
        this.state = {
            username: '',
            password: ''
        }

        this.onChange = this.onChange.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
    }

    onChange = (e) =>{
        this.setState({[e.target.name]: e.target.value})
    }

    onSubmit = (e) =>{
        e.preventDefault();
        fetch('http://localhost/server/auth/login.php',{
            method: 'POST',
            body: JSON.stringify({
                username: this.state.username,
                password: this.state.password
            })
        })
        .then(res => res.json())
        .then(res => {
            if (res.loggedIn)
            {
                localStorage.setItem('profile_pic', res.profile_pic)
                localStorage.setItem('logged_in', res.loggedIn)
                localStorage.setItem('id', res.id)
                localStorage.setItem('username', this.state.username)
                localStorage.setItem('fname', res.fname)
                localStorage.setItem('lname', res.lname)
                localStorage.setItem('email', res.email)
                localStorage.setItem('gender', res.gender)
                this.props.history.push('/dashboard')
            }
            else
            {
                alert(res.message)
            }
        })
        .catch(error => {
            console.log(error)
        });
    }


    render(){
        return (
            <div className="container">
                <div className="row">
                    <div className="col-md-6 mt-5 mx-auto">
                        <form onSubmit={this.onSubmit}>
                            <h1 className="h3 mb-3 font-weight-normal">Please Sign in</h1>
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
                            <button
                                type="submit"
                                className="btn btn-lg btn-primary btn-block"
                            >
                            Sign in
                            </button>
                        </form>
                        <br /><br />
                        <span>
                            <Link to="/register" className="tags">Register Here</Link>
                            <Link to="/ForgotPassword" className="tags" style={{float: 'right'}}>Forgot Password?</Link>
                        </span>
                    </div>
                </div>
            </div>
        )
    }
}

export default Login;