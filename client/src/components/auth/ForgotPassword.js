import React, { Component } from 'react'
import axios from 'axios'

export class ForgotPassword extends Component {
    
    constructor(){
        super();
        this.state = {
            username:'',
        }

        this.onChange = this.onChange.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
    }

    onChange = (e) => {
        this.setState({[e.target.name]: e.target.value})
    }

    onSubmit = (e) =>{
        e.preventDefault();
        
        const fd = new FormData();
        fd.append('username', this.state.username);
        for (var pair of fd.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
        }
        axios.post('http://localhost/server/auth/ForgotPassword.php', fd,
        ).then(res => {
            //localStorage.setItem('profile_pic', res.data.path)
            //console.log(res.data)
            //console.log(res.data.path)
            res.data.done ? this.props.history.push('/MatchOTP/' + this.state.username) 
            :
            alert("please try again")
        });
    }
    
    
    render() {
        return (
            <div className="container">
                <div className="row">
                    <div className="col-md-6 mt-5 mx-auto">
                        <form onSubmit={this.onSubmit}>
                            <h1 className="h3 mb-3 font-weight-normal">Forgot Password</h1>
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
                            <button
                                type="submit"
                                className="btn btn-lg btn-primary btn-block"
                            >
                            Send OTP
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        )
    }
}

export default ForgotPassword
