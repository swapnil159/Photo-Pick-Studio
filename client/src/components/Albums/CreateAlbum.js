import React, { Component } from 'react'
import axios from 'axios';

export class CreateAlbum extends Component {

    constructor(){
        super()
        this.state={
            AlbumName: '',
            AlbumDescription: '',
            SelectedCover:null
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
        fd.append('AlbumName', this.state.AlbumName);
        fd.append('AlbumDescription', this.state.AlbumDescription);
        if(this.state.SelectedCover)
        {
            fd.append('image', this.state.SelectedCover, this.state.SelectedCover.name);
        }
        for (var pair of fd.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
        }
        var headers = {
            'Content-Type': 'multipart/form-data',
        }
        axios.post('http://localhost/server/Albums/CreateAlbum.php?username='+ 
        localStorage.getItem('username'), fd, {headers: headers} 
        ).then(res => {
            //localStorage.setItem('profile_pic', res.data.path)
            //console.log(res.data.message)
            //console.log(res.data.path)
            this.props.history.push('/AddPhotosToAlbum/'+this.state.AlbumName)
        });
    }

    fileChangedHandler = event => {
        this.setState({ SelectedCover: event.target.files[0] })
    }

    render() {
        const loggedIn =localStorage.getItem('logged_in')
        return (
            <div className="container">
                { loggedIn ? (
                <div className="row">
                    <div className="col-md-6 mt-5 mx-auto">
                        <form noValidate onSubmit={this.onSubmit}>
                            <h1 className="h3 mb-3 font-weight-normal">Create Album</h1>
                            <div className="form-group">
                                <label htmlFor="AlbumName">Album Name:</label>
                                <input type="text"
                                    className="form-control"
                                    name="AlbumName"
                                    placeholder="Enter album name"
                                    value={this.state.AlbumName}
                                    onChange={this.onChange}
                                    
                                />
                            </div>
                            <br />
                            <div className="form-group">
                                <label htmlFor="AlbumDescription">Album Description:</label>
                                <input type="textbox"
                                    className="form-control"
                                    name="AlbumDescription"
                                    placeholder="Enter album description"
                                    value={this.state.AlbumDescription}
                                    onChange={this.onChange}
                                />
                            </div>
                            <br />
                            <div>
                                <input type="file" 
                                    onChange={this.fileChangedHandler}
                                />
                            </div>
                            <button
                                type="submit"
                                className="btn btn-lg btn-primary btn-block"
                            >
                            Create
                            </button>
                        </form>
                    </div>
                </div>
                ) : ( this.props.history.push('/') )}
            </div>
        )
    }
}

export default CreateAlbum
