import React, { Component } from 'react'
import ReactDOM from 'react-dom/client';
import axios from 'axios';

class Register extends Component {
    constructor(props) {
        super(props)
        this.state = {
            id:'',
            firstname: '',
            lastname: '',
            username: '',
            dob: '',
            email: '',
            password: '',
            gender: '',
            city: '',
            postalCode: '',
            address: '',
            phone: ''
        }
    }

    changeHandler = (e) => {
        this.setState({ [e.target.name]: e.target.value })
    }
    submitHandler = (e) => {
        e.preventDefault()
        this.setState()
        console.log(this);
        axios.post('/api/users-register', this.state)
            .then(response => {
               window.location="/show"
            })
            .catch(error => {
                console.log(error)
            })
    }


    render() {
        const { id,firstname, lastname, username, email, password, dob, gender, city, postalCode, address, phone } = this.state
        return (
            <div >
                <div>Register</div>
                <form onSubmit={this.submitHandler}>
                    <span><b>firstname</b> <input className='border border-black' type="text" name="firstname" value={firstname} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span><b>lastname</b> <input className='border border-black' type="text" name="lastname" value={lastname} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span><b>username</b>  <input className='border border-black' type="text" name="username" value={username} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span> <b>email</b><input className='border border-black' type="text" name="email" value={email} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span><b>password</b> <input className='border border-black' type="text" name="password" value={password} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span><b>gender</b> <input className='border border-black' type="text" name="gender" value={gender} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span><b>DOB</b> <input className='border border-black' type="date" name="dob" value={dob} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span><b>city</b> <input className='border border-black' type="text" name="city" value={city} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span><b>postalCode</b> <input className='border border-black' type="text" name="postalCode" value={postalCode} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span><b>address</b> <input className='border border-black' type="text" name="address" value={address} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span><b>phone</b> <input className='border border-black' type="text" name="phone" value={phone} onChange={this.changeHandler} /></span><br></br><br></br>

                    <div> <input type="submit" className='border border-black cursor-pointer' /></div>
                </form>

            </div>

        );
    }
}


export default Register;



if (document.getElementById('register')) {
    const Index = ReactDOM.createRoot(document.getElementById("register"));

    Index.render(
        <React.StrictMode>
            <Register />
        </React.StrictMode>
    )
}
