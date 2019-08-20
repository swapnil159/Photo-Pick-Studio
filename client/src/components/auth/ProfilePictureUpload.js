import React, { Component } from 'react'
import axios from 'axios';

export class ProfilePictureUpload extends Component {

    constructor(props) {
        super(props);
        this.state ={
            selectedFile:null
        }
    }

    fileChangedHandler = event => {
        this.setState({ selectedFile: event.target.files[0] })
    }

    uploadHandler = () => {
        if (this.state.selectedFile.size > 0){
            console.log(this.state.selectedFile)
            const fd = new FormData();
            fd.append('image', this.state.selectedFile, this.state.selectedFile.name);
            var headers = {
                'Content-Type': 'multipart/form-data',
            }
            axios.post('http://localhost/server/auth/ProfilePicUpload.php?username='+ 
            localStorage.getItem('username'), fd, {headers: headers} 
            ).then(res => {
                localStorage.setItem('profile_pic', res.data.path)
                this.props.history.push('/dashboard')
            });
        }
    }
    render() {
        const loggedIn = localStorage.getItem('logged_in')
        return (
            <div className="container">
                {
                    loggedIn ? 
                    (
                        <div>
                            <img src={localStorage.getItem('profile_pic')} style={{width: 200}}
                                alt="Can not be displayed"></img>
                            <input type="file" 
                                onChange={this.fileChangedHandler}
                                accept="image/*"
                            />
                            <button
                                type="submit"
                                className="btn btn-primary"
                                onClick={this.uploadHandler}
                            >
                            Upload
                            </button>
                            <a href='/dashboard'>Skip</a>
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

export default ProfilePictureUpload
