import React from "react" ;
import Particles from 'react-particles-js';
import ReactDOM from "react-dom";

export default class Particle extends React.Component{

    render(){
        return (
            <Particles params={{
                "particles": {
                    "number": {
                        "value": 200
                    },
                    "size": {
                        "value": 3
                    }
                },
                "interactivity": {
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        }
                    }
                }
            }}/>
        );
    };

}

if (document.getElementById('_particle')) {
    ReactDOM.render(
        <Particle /> ,
        document.getElementById('_particle')
    );
}
