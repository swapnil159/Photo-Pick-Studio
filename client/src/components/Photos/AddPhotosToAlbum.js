import React, { Component } from 'react'
import axios from 'axios';

class AddPhotosToAlbum extends Component {

    constructor(props){
        super(props)
        this.state={
            PhotoDescription: 'No Description Provided',
            SelectedCover:null
        }
        this.onChange = this.onChange.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
    }

    onChange = (e) => {
        this.setState({[e.target.name]: e.target.value})
    }


    fileChangedHandler = event => {
        this.setState({ SelectedCover: event.target.files[0] })
    }

    onSubmit = (e) =>{
        e.preventDefault();
        
        const fd = new FormData();
        fd.append('PhotoDescription', this.state.PhotoDescription);
        fd.append('image', this.state.SelectedCover, this.state.SelectedCover.name);
        for (var pair of fd.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
        }
        
        var headers = {
            'Content-Type': 'multipart/form-data',
        }
        axios.post('http://localhost/server/Photos/AddPhotosToAlbum.php?username='+ 
        localStorage.getItem('username')+'&albumname='+this.props.match.params.album, fd, {headers: headers} 
        ).then(res => {
            //localStorage.setItem('profile_pic', res.data.path)
            console.log(res.data.done)
            window.location.reload();
            //console.log(res.data.path)
            //this.props.history.push('/AddPhotosToAlbum/'+this.props.match.params.album)
        });
    }

    render() {
        const loggedIn = localStorage.getItem('logged_in')
        return (
            <div className="container">
                {
                    loggedIn ?
                    (
                        <div className="row">
                            <div className="col-md-6 mt-5 mx-auto">
                            <h1>{this.props.match.params.album}</h1>
                                <form noValidate onSubmit={this.onSubmit}>
                                    <h1 className="h3 mb-3 font-weight-normal">Upload Photos</h1>
                                    <div className="form-group">
                                        <label htmlFor="PhotoDescription">Photo Description:</label>
                                        <input type="textbox"
                                            className="form-control"
                                            name="PhotoDescription"
                                            placeholder="Enter photo description"
                                            value={this.state.PhotoDescription}
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
                                    Upload
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

export default AddPhotosToAlbum;
