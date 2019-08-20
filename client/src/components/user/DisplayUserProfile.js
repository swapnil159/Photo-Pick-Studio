import React, { Component } from 'react'

export class DisplayUserProfile extends Component {

    constructor(){
        super()
        this.state={
            FirstName:'',
            LastName:'',
            Email:'',
            Gender:''
        }
    }

    componentDidMount(){
        fetch('http://localhost/server/User_profiles/DisplayUserProfile.php?username=' 
        + this.props.user )
          .then(data => data.json())
          .then((data) => { 
              this.setState({FirstName: data.fname,
                LastName: data.lname,
                Email: data.email,
                Gender: data.gender
             })
           }); 
    }


    render() {
        return (
            <div>
                <table>
                    <tbody>
                    <tr>
                        <td><h3>First Name:</h3></td>
                        <td><h3>{this.state.FirstName}</h3></td>
                    </tr>
                    <tr>
                        <td><h3>Last Name:</h3></td>
                        <td><h3>{this.state.LastName}</h3></td>
                    </tr>
                    <tr>
                        <td><h3>Email:</h3></td>
                        <td><h3>{this.state.Email}</h3></td>
                    </tr>
                    <tr>
                        <td><h3>Gender:</h3></td>
                        <td><h3>{this.state.Gender}</h3></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        );
    }
}

export default DisplayUserProfile
