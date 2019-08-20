import React, { Component } from 'react'
import axios from 'axios'

export class EditAlbum extends Component {
    constructor(){
        super()
        this.state={
            AlbumName: '',
            AlbumDescription: '',
            cover: '',
            SelectedCover:null
        }

        this.onChange = this.onChange.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
        this.remove = this.remove.bind(this);
    }

    componentDidMount() {
        fetch('http://localhost/server/Albums/DisplayAlbum.php?id=' 
        + this.props.match.params.id )
          .then(data => data.json())
          .then((data) => { 
            this.setState({AlbumName: data[0].AlbumName, AlbumDescription: data[0].AlbumDescription,
            cover: data[0].cover})
        }); 
    }

    onChange = (e) => {
        this.setState({[e.target.name]: e.target.value})
    }

    onSubmit = (e) =>{
        e.preventDefault();
        
        const fd = new FormData();
        fd.append('AlbumName', this.state.AlbumName);
        fd.append('AlbumDescription', this.state.AlbumDescription);
        for (var pair of fd.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
        }
        axios.post('http://localhost/server/Albums/EditAlbum.php?id='+ 
        this.props.match.params.id, fd,
        ).then(res => {
            //localStorage.setItem('profile_pic', res.data.path)
            //console.log(res.data)
            //console.log(res.data.path)
            res.data.done ? this.props.history.push('/ViewAlbums') : console.log(res)
        });
    }

    fileChangedHandler = event => {
        this.setState({ SelectedCover: event.target.files[0] })
    }

    ChangeCover = (e) =>{
        e.preventDefault();
        
        const fd = new FormData();
        fd.append('image', this.state.SelectedCover, this.state.SelectedCover.name);
        for (var pair of fd.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
        }
        var headers = {
            'Content-Type': 'multipart/form-data',
        }
        axios.post('http://localhost/server/Photos/UploadCover.php?id='+ 
        this.props.match.params.id, fd, {headers: headers} 
        ).then(res => {
            //localStorage.setItem('profile_pic', res.data.path)
            //console.log(res.data)
            //console.log(res.data.path)
            //this.props.history.push('/AddPhotosToAlbum/'+this.state.AlbumName)
            this.setState({cover: res.data.path})
        });
    }


    remove(){
        fetch('http://localhost/server/Photos/DeleteCover.php?id=' 
        + this.props.match.params.id )
          .then(data => data.json())
          .then((data) => { 
            this.setState({cover: data.cover})
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
                                <img src={this.state.cover} alt="Can not be displayed"
                                style={{width: 200}}></img>
                                <br />
                                <button onClick={this.remove}>Remove</button>
                                <br />
                                <div>
                                    <input type="file" 
                                        onChange={this.fileChangedHandler}
                                    />
                                </div>
                                <button
                                    type="submit"
                                    className="btn btn-primary"
                                    onClick={this.ChangeCover}
                                >
                                Upload
                                </button>
                                <hr />
                                <form noValidate onSubmit={this.onSubmit}>
                                    <h1 className="h3 mb-3 font-weight-normal">Edit Album</h1>
                                    <div className="form-group">
                                        <label htmlFor="AlbumName">Album Name:</label>
                                        <input type="text"
                                            className="form-control"
                                            name="AlbumName"
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
                                    <button
                                        type="submit"
                                        className="btn btn-lg btn-primary btn-block"
                                    >
                                    Update
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

export default EditAlbum
