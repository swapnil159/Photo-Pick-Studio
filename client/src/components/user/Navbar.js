import React, {Component} from 'react';
import { Link } from 'react-router-dom';

class Navbar extends Component{
    render(){
        return (
            <div>
                <nav className="navbar navbar-expand navbar-light bg-light">
                    <ul className="navbar-nav">
                        <li className="nav-item"><Link to="/logout">Logout</Link></li>
                        <li className="nav-item"><Link to="/create_album">CreateAlbum</Link></li>
                        <li className="nav-item"><Link to="/edit_profile">EditProfile</Link></li>
                        <li className="nav-item"><Link to="/dashboard">Dashboard</Link></li>
                        <li className="nav-item"><Link to="/ViewAlbums">View Albums</Link></li>
                    </ul>
                </nav>
            </div>
        )
    }
}

export default Navbar;