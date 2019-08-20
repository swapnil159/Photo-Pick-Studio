import React from 'react';
import { Switch, Route } from 'react-router-dom';
import Login from './auth/Login';
import Register from './auth/Register';
import Dashboard from './user/dashboard';
import Logout from './auth/Logout';
import CreateAlbum from './Albums/CreateAlbum';
import ProfilePictureUpload from './auth/ProfilePictureUpload';
import EditProfile from './user/EditProfile';
import AddPhotosToAlbum from './Photos/AddPhotosToAlbum';
import ViewAlbums from './Albums/ViewAlbums';
import ViewAlbum from './Albums/ViewAlbum';
import EditAlbum from './Albums/EditAlbum';
import ViewProfile from './user/ViewProfile';
import Album from './Albums/Album';
import ForgotPassword from './auth/ForgotPassword';
import MatchOTP from './auth/MatchOTP';

function Main() {
    return (
        <main>
            <Switch>
                <Route exact path='/' component={Login} />
                <Route exact path='/register' component={Register} />
                <Route exact path='/dashboard' component={Dashboard} />
                <Route exact path='/logout' component={Logout} />
                <Route exact path='/create_album' component={CreateAlbum} />
                <Route exact path='/ProfilePictureUpload' component={ProfilePictureUpload} />
                <Route exact path='/edit_profile' component={EditProfile} />
                <Route exact path='/AddPhotosToAlbum/:album' component={AddPhotosToAlbum} />
                <Route exact path='/ViewAlbums' component={ViewAlbums} />
                <Route exact path='/ViewAlbum/:album' component={ViewAlbum} />
                <Route exact path='/EditAlbum/:id' component={EditAlbum} />
                <Route exact path='/ViewProfile/:username' component={ViewProfile} />
                <Route exact path='/Album/:id' component={Album} />
                <Route exact path='/ForgotPassword' component={ForgotPassword} />
                <Route exact path='/MatchOTP/:username' component={MatchOTP} />
            </Switch>
        </main>
    );
}

export default Main;