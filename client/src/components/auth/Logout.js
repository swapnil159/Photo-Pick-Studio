import React, { Component } from 'react'

export class Logout extends Component {

    
    render() {
        localStorage.clear();
        return (
            <div>
                { this.props.history.push('/') }
            </div>
        )
    }
}

export default Logout
