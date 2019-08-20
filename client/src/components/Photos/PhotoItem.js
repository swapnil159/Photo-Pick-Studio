import React, { Component } from 'react'

class PhotoItem extends Component {
    render() {
        const id = this.props.photo.id;
        return (
            <div>
                <span>
                <img src={process.env.PUBLIC_URL + this.props.photo.path} 
                alt="Can not be displayed"></img>
                <p>{ this.props.photo.description }</p>
                <p>{ this.props.photo.Date_Time }</p>
                <button onClick={this.props.delPhoto.bind(this, id)} style={btnstyle}>x</button>
                </span>
            </div>
        )
    }
}

const btnstyle={
    background:'#ff0000',
    color: '#fff',
    padding :'5px 10px',
    borderRadius: '50%',
    cursor: 'pointer',
    float: 'right'

}


export default PhotoItem
