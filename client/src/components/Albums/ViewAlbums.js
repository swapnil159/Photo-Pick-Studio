import React, { Component } from 'react';
import UserAlbums from './UserAlbums';

class ViewAlbums extends Component {

    constructor(props) {
        super(props);
        this.state = {albums: []};
    }

    componentDidMount() {
        fetch('http://localhost/server/Albums/ViewAlbums.php?username=' 
        + localStorage.getItem('username') )
          .then(data => data.json())
          .then((data) => { this.setState({ albums: data }) }); 
    }

    delAlbum = (id) => {
        fetch('http://localhost/server/Albums/DeleteAlbum.php?username=' 
        + localStorage.getItem('username') + '&id=' + id ) 
          .then(data => data.json())
          .then((data) => { this.setState({ albums: data }) });
    }

    editAlbum = (id) => {
        console.log(id)
        this.props.history.push('/EditAlbum/'+id)
        /*fetch('http://localhost/server/Albums/DeleteAlbum.php?username=' 
        + localStorage.getItem('username') + '&id=' + id ) 
          .then(data => data.json())
          .then((data) => { this.setState({ albums: data }) });*/
    }

    render() {
        const loggedIn = localStorage.getItem('logged_in')
        return (
            <div>
                {
                    loggedIn ? 
                    (
                        <div>
                            <UserAlbums albums={this.state.albums} delAlbum={this.delAlbum}
                                editAlbum={this.editAlbum}>
                            </UserAlbums>
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

export default ViewAlbums
