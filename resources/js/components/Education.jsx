import React, { Component } from 'react'
import ReactDOM from 'react-dom/client';
import axios from 'axios';

class Education extends Component {
    constructor(props) {
        super(props)
        this.state = {
            institution: '',
            graduate_at: '',
            added_at: '',
            advisor_id: ''
        }
    }

    changeHandler = (e) => {
        this.setState({ [e.target.name]: e.target.value })
    }
    submitHandler = (e) => {
        e.preventDefault()
        this.setState()
        console.log(this);
        axios.post('/api/add-education', this.state)
            .then(response => {
               window.location="/show"
            })
            .catch(error => {
                console.log(error)
            })
    }


    render() {
        const { institution, graduate_at, added_at, advisor_id } = this.state
        return (
            <div >
                <div>Plans</div>
                <form onSubmit={this.submitHandler}>
                    <span><b>institution</b> <input className='border border-black' type="text" name="institution" value={institution} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span><b>graduate_at</b> <input className='border border-black' type="text" name="graduate_at" value={graduate_at} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span><b>added_at</b> <input className='border border-black' type="date" name="added_at" value={added_at} onChange={this.changeHandler} /></span><br></br><br></br>
                    <span><b>advisor_id</b> <input className='border border-black' type="text" name="advisor_id" value={advisor_id} onChange={this.changeHandler} /></span><br></br><br></br>

                    <div> <input type="submit" className='border border-black cursor-pointer' /></div>
                </form>

            </div>

        );
    }
}


export default Education;



if (document.getElementById('education')) {
    const Index = ReactDOM.createRoot(document.getElementById("education"));

    Index.render(
        <React.StrictMode>
            <Education />
        </React.StrictMode>
    )
}
