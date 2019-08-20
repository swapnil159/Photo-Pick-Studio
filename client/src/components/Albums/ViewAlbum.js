import React, { Component } from 'react'
import AlbumPhoto from '.././Photos/AlbumPhoto'

class ViewAlbum extends Component {

    constructor(props) {
        super(props);
        this.state = {photos: []};
    }

    componentDidMount() {
        fetch('http://localhost/server/Photos/GetPhotos.php?username=' 
        + localStorage.getItem('username') + '&album=' + this.props.match.params.album )
          .then(data => data.json())
          .then((data) => { this.setState({ photos: data }) }); 
    }

    delPhoto = (id) => {
        console.log(id)
        fetch('http://localhost/server/Photos/DeletePhoto.php?username=' 
        + localStorage.getItem('username') + '&id=' + id ) 
          .then(data => data.json())
          .then((data) => { this.setState({ photos: data }) });
    }

    render() {
        const loggedIn = localStorage.getItem('logged_in')
        return (
            <div>
                {
                    loggedIn ? 
                    (
                        <div>
                            <h1>{this.props.match.params.album}</h1>
                            <AlbumPhoto photos={this.state.photos} delPhoto={this.delPhoto}></AlbumPhoto>
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

export default ViewAlbum
