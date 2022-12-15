import React, { Component } from 'react'
import ReactDOM from 'react-dom/client';
import axios from 'axios';

class Register extends Component {
    constructor(props)
    {
        super(props)
this.state={
    firstname:'',
    lastname:'',
    username:'',
    email:'',
    password:'',
    gender:'',
    city:'',
    postalCode:'',
    address:'',
    phone:''
}
    }

changeHandler = (e) =>{
    this.setState({[e.target.name]: e.target.value})
}
submitHandler = (e) =>{
    e.preventDefault()
    this.setState()
    console.log(this);
    axios.post('/api/users-register', this.state)
    .then(response=>{
console.log(response)
    })
.catch(error =>{
    console.log(error)
})
}


    render() {
      const {firstname,lastname,username,email,password,gender,city,postalCode,address,phone}=this.state
        return (
            <div >
                <div>Plans</div>
                    <form onSubmit={this.submitHandler}>
                        <span><b>firstname</b> <input type="text" name="firstname" value={firstname} onChange={this.changeHandler}/></span><br></br><br></br>
                        <span><b>lastname</b> <input type="text" name="lastname" value={lastname}  onChange={this.changeHandler} /></span><br></br><br></br>
                        <span><b>username</b>  <input type="text" name="username" value={username}  onChange={this.changeHandler} /></span><br></br><br></br>
                        <span> <b>email</b><input type="text" name="email" value={email}  onChange={this.changeHandler} /></span><br></br><br></br>
                        <span><b>password</b> <input type="text" name="password" value={password}  onChange={this.changeHandler} /></span><br></br><br></br>
                        <span><b>gender</b> <input type="text" name="gender" value={gender}  onChange={this.changeHandler} /></span><br></br><br></br>
                        <span><b>city</b> <input type="text" name="city" value={city}  onChange={this.changeHandler} /></span><br></br><br></br>
                        <span><b>postalCode</b> <input type="text" name="postalCode" value={postalCode}  onChange={this.changeHandler} /></span><br></br><br></br>
                        <span><b>address</b> <input type="text" name="address" value={address}  onChange={this.changeHandler} /></span><br></br><br></br>
                        <span><b>phone</b> <input type="text" name="phone" value={phone}  onChange={this.changeHandler} /></span><br></br><br></br>

                        <div> <input type="submit" /></div>
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
            <Register/>
        </React.StrictMode>
    )
}
