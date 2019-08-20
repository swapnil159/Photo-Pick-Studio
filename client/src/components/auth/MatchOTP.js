import React, { Component } from 'react'
import axios from 'axios'

export class MatchOTP extends Component {

    constructor(){
        super();
        this.state = {
            otp:'',
            password:''
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
        fd.append('password', this.state.password);
        fd.append('otp', this.state.otp);
        fd.append('username', this.props.match.params.username);
        for (var pair of fd.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
        }
        axios.post('http://localhost/server/auth/MatchOTP.php', fd,
        ).then(res => {
            //localStorage.setItem('profile_pic', res.data.path)
            //console.log(res.data)
            //console.log(res.data.path)
            res.data.done ? this.props.history.push('/') 
            : 
            alert("Something went wrong.")
        });
    }

    render() {
        return (
            <div>
                <div className="container">
                <div className="row">
                    <div className="col-md-6 mt-5 mx-auto">
                        <form noValidate onSubmit={this.onSubmit}>
                            <h1 className="h3 mb-3 font-weight-normal">{this.props.match.params.username}</h1>
                            <div className="form-group">
                                <label htmlFor="otp">OTP:</label>
                                <input type="text"
                                    className="form-control"
                                    name="otp"
                                    placeholder="Enter the otp"
                                    value={this.state.otp}
                                    onChange={this.onChange}
                                />
                            </div>
                            <div className="form-group">
                                <label htmlFor="password">Password:</label>
                                <input type="password"
                                    className="form-control"
                                    name="password"
                                    placeholder="Enter your new password"
                                    value={this.state.password}
                                    onChange={this.onChange}
                                />
                            </div>
                            <br />
                            <button
                                type="submit"
                                className="btn btn-lg btn-primary btn-block"
                            >
                            Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        )
    }
}

export default MatchOTP
